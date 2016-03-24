<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../data/dbcache/class.php");
require("../../class/user.php");
require("../../data/dbcache/MemberLevel.php");
require("../../data/language/".$ecmslang."/pub/fun.php");

$link=db_connect();
$empire=new mysqlquery();
$enews=$_POST['enews'];
if($enews=="AjaxPl")//Ajax��������
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$saytext=$_POST['saytext'];
	$id=$_POST['id'];
	$classid=$_POST['classid'];
	$repid=$_POST['repid'];
	$nomember=$_POST['nomember'];
	$key=$_POST['key'];
	AddPl($username,$password,$nomember,$key,$saytext,$id,$classid,$repid,$_POST);
}
//ajax�����֤��
function ecmsCheckShowKeyAjax($varname,$postval,$dopr,$ecms=0){
	global $public_r;
	$r=explode(',',getcvar($varname,$ecms));
	$cktime=$r[0];
	$pass=$r[1];
	$val=$r[2];
	$time=time();
	if($cktime>$time||$time-$cktime>$public_r['keytime']*60)
	{
		echo 'OutKeytime';exit;
	}
	if(empty($postval)||$postval<>$val)
	{
		echo 'FailKey';exit;
	}
	$checkpass=md5(md5($postval.'EmpireCMS'.$cktime).$public_r['keyrnd']);
	if($checkpass<>$pass)
	{
		echo 'FailKey';exit;
	}
}
//��������
function AddPl($username,$password,$nomember,$key,$saytext,$id,$classid,$repid,$add){
	global $empire,$public_r,$class_r,$user_userid,$user_username,$user_password,$user_dopass,$user_tablename,$user_salt,$user_checked,$user_group,$dbtbpre,$level_r;
	
	$saytext = unescape($saytext);
	//��֤IP
	eCheckAccessDoIp('pl');
	$id=(int)$id;
	$repid=(int)$repid;
	$classid=(int)$classid;
	//��֤��
	$keyvname='checkplkey';
	if($public_r['plkey_ok'])
	{
		ecmsCheckShowKeyAjax($keyvname,$key,1);
	}
	$username=RepPostVar($username);
	$password=RepPostVar($password);
	$muserid=(int)getcvar('mluserid');
	$musername=RepPostVar(getcvar('mlusername'));
	$mgroupid=(int)getcvar('mlgroupid');
	if($muserid)//�ѵ�½
	{
		$username=$musername;
	}
	else
	{
		if(empty($nomember))//������
		{
			//����ת��
			$utfusername=doUtfAndGbk($username,0);
			$password=doUtfAndGbk($password,0);
			
			//����
			if(empty($user_dopass))
			{
				$password=md5($password);
			}
			if($user_dopass==3)//16λmd5
			{
				$password=substr(md5($password),8,16);
			}
			//˫��md5
			if($user_dopass==2)
			{
				$ur=$empire->fetch1("select ".$user_userid.",".$user_salt.",".$user_password.",".$user_checked.",".$user_group." from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
				$password=md5(md5($password).$ur[$user_salt]);
				$cuser=0;
				if($password==$ur[$user_password])
				{
					$cuser=1;
				}
				if(empty($ur[$user_userid]))
				{
					$cuser=0;
				}
			}
			else
			{
				$ur=$empire->fetch1("select ".$user_userid.",".$user_checked.",".$user_group." from ".$user_tablename." where ".$user_username."='$utfusername' and ".$user_password."='$password' limit 1");
				$cuser=0;
				if($ur[$user_userid])
				{
					$cuser=1;
				}
			}
			if(empty($cuser))
			{
				echo 'FailPassword';exit;//�û������������
			}
			if($ur[$user_checked]==0)
			{
				echo 'NotCheckedUser';exit;//�û������������
			}
			$muserid=$ur[$user_userid];
			$mgroupid=$ur[$user_group];
		}
		else
		{
			$muserid=0;
		}
	}
	if($public_r['plgroupid'])
	{
		if(!$muserid)
		{
			echo 'GuestNotToPl';exit;
		}
		if($level_r[$mgroupid][level]<$level_r[$public_r['plgroupid']][level])
		{
			echo 'NotLevelToPl';exit;//
		}
	}
	if(!trim($saytext)||!$id||!$classid)
	{
		echo 'EmptyPl'; exit;//�������ݲ�ȫ[����������]
	}
	//�����
	if(empty($class_r[$classid][tbname]))
	{
		echo 'ErrorUrl';exit;//�������ݲ�ȫ[����������]
	}
	if(strlen($saytext)>$public_r[plsize])
	{
		echo 'PlSizeTobig';exit;//��������̫��,������������
	}
	$saytime=date("Y-m-d H:i:s");
	$time=time();
	$pltime=getcvar('lastpltime');
	if($pltime)
	{
		if($time-$pltime<$public_r[pltime])
		{echo 'PlOutTime';exit;}
	}
	//�Ƿ�ر�����
	$r=$empire->fetch1("select classid,closepl from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid'");
	if(empty($r[classid]))
	{echo 'ErrorUrl';exit;}
	if($class_r[$r[classid]][openpl])
	{echo 'CloseInfoPl';exit;}
	//����Ϣ�ر�����
	if($r['closepl'])
	{
		echo 'CloseInfoPl';exit;
	}
	$sayip=egetip();
	$username=RepPostStr($username);
	$username=str_replace("\r\n","",$username);
	$saytext=nl2br(RepFieldtextNbsp(RepPostStr($saytext)));
	$pr=$empire->fetch1("select plclosewords,plf,plmustf,pldeftb from {$dbtbpre}enewspublic limit 1");
	if($repid)
	{
		if(trim($saytext)=="[quote]".$repid."[/quote]")
		{
			echo 'EmptyPl';exit;
		}
		$saytext=RepPlTextQuote($repid,$saytext,$pr);
	}
	//�����ַ�
	$saytext=ReplacePlWord($pr['plclosewords'],$saytext);
	//���
	if($class_r[$classid][checkpl])
	{$checked=1;}
	else
	{$checked=0;}
	$ret_r=ReturnPlAddF($add,$pr,0);
	//����
	$sql=$empire->query("insert into {$dbtbpre}enewspl(username,sayip,saytime,id,classid,checked,zcnum,fdnum,userid,isgood,stb) values('".$username."','$sayip','$saytime','$id','$classid','$checked',0,0,'$muserid',0,'$pr[pldeftb]');");
	$plid=$empire->lastid();
	//����
	$fsql=$empire->query("insert into {$dbtbpre}enewspl_data_".$pr['pldeftb']."(plid,classid,id,saytext".$ret_r['fields'].") values('$plid','$classid','$id','".addslashes($saytext)."'".$ret_r['values'].");");
	//��Ϣ���1
	$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set plnum=plnum+1 where id='$id'");
	$sql=$empire->query("update phome_enewsmember set userfen=userfen+2 where userid='$muserid'");
	//������󷢱�ʱ��
	$set1=esetcookie("lastpltime",time(),time()+3600*24);
	ecmsEmptyShowKey($keyvname);//�����֤��

    //�ʼ�֪ͨ
$remail=$empire->fetch1("select id,userid,title,ismember from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid'");
//if($remail[ismember]==1){
$content=' �װ�������: ���ã�

�����������Եe���������Զ����͵ġ������յ�����ʼ�������Ϊ����������վ������������µ����۶�������ʼ����ѹ��ܡ����в���֮�������뺣�����������û�з��ʹ����ǵ���վ����û�н��в��������������ʼ���������Ҫ�˶������������һ���Ĳ�����

����վ��飺
--------------------------------------------------
��������http://www.qyej520.com��������Ķ�д��ƽ̨ʼ����2011��3�£�Ŀǰ��֪��������������פ����ʵ��ǿ�ı༭����[������άά������ͤ���㣬ӱ~�ޱ]����ת���ʸߣ������Ͽɶȸߣ���ͬ�ж���ѧ��վ���нϸߵ�������ʵ����վ�����ߣ�����˫��Ӯ�����ֹ������������⣡��չ����PR��ٶ�Ȩ�ؽڽ�����������ʵ��������¼��������վ��Ŀǰ��Ծ��Ա�ﵽǧ�ˣ��������⣬���߿��ģ���˵������µĿںţ��������㷢���飬Ե�������ҳ�Ϊһ���ˣ�
--------------------------------------------------


����Ͷ�壬������Щ�£�
--------------------------------------------------��
1���ڱ༭����ʱ����˼�ҳ������۶ȣ����ⲻ�˳���25�֣�������ӱ���ٶ��������ظ���
����
2���ڱ༭���ݼ���У��������и�������280�ֳ������޿��У���Ϊ����Ŀҳ�����ۣ�ϣ���������⣩
����
3���ڱ༭��������ʱ��Ӧ������ߵ������Ű湤���Ű�û����ü��ɵ��Զ��Ű�ú����ύ��
����
4���ڱ༭�������ʱ���ٶȷ������³��ֶ����վ��������ܴӸ���������ѡȡ�����ڱ��������ı���
����
5������ϲ��������Ӧ�ö������ĺ�İٶȷ����߽��з���������
����
6���������Ľ���������ԭ����������Ӧ������������
����
7.�������ѣ���Ϊ������Ҫ�����Ͱ�������ʾ�����ϻ�Ա������Ϳ���Ӧ�ø������ۣ�
����
��չ�Ķ�����Ե���¹���ǳ̸������վ���Ƽ�ͷ����http://www.qyej520.com/html/438.html
--------------------------------------------------

��л���ķ��ʣ�ף��ʹ����죡��������飡

��Եe�ҹ�����  http://www.qyej520.com/

�������� ��άά������ͤ���㣬ӱ~�ޱ


--------�����Ǳ����յ���������Ϣ------------
��Ϣ���⣺'.$remail[title].' 
����ʱ�䣺'.date("Y-m-d H:i:s").'
�����ǳƣ�'.$username.'
������IP��'.egetip();

$rremail=$empire->fetch1("select username,email from ".$user_tablename." where userid='".$remail[userid]."'");
@include("../class/SendEmail.inc.php");
//EcmsToSendMail("��Ϣ�����ʼ���ַ","�ʼ�����","�ʼ�����")
$sm=EcmsToSendMail($rremail[email],"�������¡�$remail[title]����".$username."����",$content);
//}




	if($sql)
	{
		$reurl=DoingReturnUrl("../pl/?classid=$classid&id=$id",$_POST['ecmsfrom']);
		echo 'AddPlSuccess';exit;
	}
	else
	{echo 'DbError';exit;}
}

//�滻�ظ�
function RepPlTextQuote($repid,$saytext,$pr){
	global $public_r,$empire,$dbtbpre,$fun_r;
	$r=$empire->fetch1("select username,saytime,stb from {$dbtbpre}enewspl where plid='$repid'");
	$fr=$empire->fetch1("select saytext from {$dbtbpre}enewspl_data_".$r['stb']." where plid='$repid'");
	if($r[username])
	{
		if(!empty($fun_r['plincludewords']))
		{
			$ypost=str_replace('[!--saytime--]',$r[saytime],str_replace('[!--username--]',$r[username],$fun_r['plincludewords']));
		}
		else
		{
			$ypost="Originally posted by <i>".$r[username]."</i> at ".$r[saytime].":<br>";
		}
	}
	$include="<table border=0 width='100%' cellspacing=1 cellpadding=10 bgcolor='#cccccc'><tr><td width='100%' bgcolor='#FFFFFF' style='word-break:break-all'>".$ypost.RepYPlQuote($fr[saytext])."</td></tr></table>";
	$restr=str_replace("[quote]".$repid."[/quote]",$include,$saytext);
	return $restr;
}

//ȥ��ԭ����
function RepYPlQuote($text){
	$preg_str="/<table (.+?)<\/table>/is";
	$text=preg_replace($preg_str,"",$text);
	return $text;
}

//�����ַ�
function ReplacePlWord($plclosewords,$text){
	global $empire,$dbtbpre;
	if(empty($text))
	{
		return $text;
	}
	toCheckCloseWord($text,$plclosewords,'HavePlCloseWords');
	return $text;
}

//�����ֶ�
function ReturnPlAddF($add,$pr,$ecms=0){
	global $empire,$dbtbpre;
	$fr=explode(',',$pr['plf']);
	$count=count($fr)-1;
	$ret_r['fields']='';
	$ret_r['values']='';
	for($i=1;$i<$count;$i++)
	{
		$f=$fr[$i];
		$fval=RepPostStr($add[$f]);
		//����
		if(strstr($pr[plmustf],','.$f.','))
		{
			if(!trim($fval))
			{
				$chfr=$empire->fetch1("select fname from {$dbtbpre}enewsplf where f='$f' limit 1");
				$GLOBALS['msgmustf']=$chfr['fname'];
				printerror('EmptyPlMustF','',1);
			}
		}
		$fval=nl2br(RepFieldtextNbsp($fval));
		$ret_r['fields'].=",".$f;
		$ret_r['values'].=",'".addslashes($fval)."'";
	}
	return $ret_r;
}

//֧��/��������
function DoForPl($add){
	global $empire,$dbtbpre;
	$classid=(int)$add['classid'];
	$id=(int)$add['id'];
	$plid=(int)$add['plid'];
	$dopl=(int)$add['dopl'];
	$doajax=(int)$add['doajax'];
	if(!$classid||!$id||!$plid)
	{
		$doajax==1?ajax_printerror('','','ErrorUrl',1):printerror('ErrorUrl','',1);
	}
	//��������
	if(getcvar('lastforplid'.$plid))
	{
		$doajax==1?ajax_printerror('','','ReDoForPl',1):printerror('ReDoForPl','',1);
	}
	if($dopl==1)
	{
		$f='zcnum';
		$msg='DoForPlGSuccess';
	}
	else
	{
		$f='fdnum';
		$msg='DoForPlBSuccess';
	}
	$sql=$empire->query("update {$dbtbpre}enewspl set ".$f."=".$f."+1 where plid='$plid' and id='$id' and classid='$classid'");
	if($sql)
	{
		esetcookie('lastforplid'.$plid,$plid,time()+30*24*3600);	//��󷢲�
		if($doajax==1)
		{
			$nr=$empire->fetch1("select ".$f." from {$dbtbpre}enewspl where plid='$plid' and id='$id' and classid='$classid'");
			ajax_printerror($nr[$f],$add['ajaxarea'],$msg,1);
		}
		else
		{
			printerror($msg,$_SERVER['HTTP_REFERER'],1);
		}
	}
	else
	{
		$doajax==1?ajax_printerror('','','DbError',1):printerror('DbError','',1);
	}
}
function unescape($str) {
         $str = rawurldecode($str); 
         preg_match_all("/%u.{4}|&#x.{4};|&#d+;|.+/U",$str,$r); 
         $ar = $r[0]; 
         foreach($ar as $k=>$v) { 
                  if(substr($v,0,2) == "%u") 
                           $ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,-4))); 
                  elseif(substr($v,0,3) == "&#x") 
                           $ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,3,-1))); 
                  elseif(substr($v,0,2) == "&#") { 
                           $ar[$k] = iconv("UCS-2","GBK",pack("n",substr($v,2,-1))); 
                  } 
         } 
         return join("",$ar); 
}
?>