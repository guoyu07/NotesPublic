<?php
$hu = 'yb';
@require_once('../header.php');
set_time_limit(0);
$q    = trim($_GET['q']); //�ؼ���
$page = intval($_GET['p']); //ҳ��
if($page==0) $page = 1;
$r_num   = 0; //�������
$p_num   = 40; //ÿҳ�������������
$result  = "";
$shengpy = array('B','T','H','S','N','L','J','H','S','J','Z','A','F','J','S','H','H','H','G','G','H','C','S','G','Y','X','S','G','Q','N','X','X','A','T');
$sheng = array('����','���','�ӱ�','ɽ��','���ɹ�','����','����','������','�Ϻ�','����','�㽭','����','����','����','ɽ��','����','����','����','�㶫','����','����','����','�Ĵ�','����','����','����','����','����','�ຣ','����','�½�','���','����','̨��');
if($q){	
	if (!@file_exists($keydb)){
		$dreamdb = file("pc.dat");//��ȡ�����ļ�
		$count   = count($dreamdb);//��������
		for($i=0; $i<$count; $i++) {
			$keyword    = explode(" ",$q);//��ֹؼ���
			$dreamcount = count($keyword);//�ؼ��ָ���
			$detail     = explode("\t",$dreamdb[$i]);
			for ($ai=0; $ai<$dreamcount; $ai++){
				switch ($_GET['w']){
					case "sheng":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[0]\");");break;
					case "diqu":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[1]\");");break;
					case "shi":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[2]\");");break;
					case "cun":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[3]\");");break;
					case "youbian":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[4]\");");break;
					case "quhao":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[5]\");");break;
					default:
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$dreamdb[$i]\");");break;
				}
				if(($found)){
					$r_num++;
					if(fmod($r_num, $p_num)==0) $r .= "\n";
					$r .= '<tr height="24"><td><a href="?q='.urlencode($detail[0]).'&w=sheng">'.$detail[0].'</a></td><td><a href="?q='.urlencode($detail[1]).'&w=diqu">'.$detail[1].'</a></td><td><a href="?q='.urlencode($detail[2]).'&w=shi">'.$detail[2].'</a></td><td><a href="?q='.urlencode($detail[3]).'&w=cun">'.$detail[3].'</a></td><td><a href="?q='.$detail[4].'&w=youbian">'.$detail[4].'</a></td><td><a href="?q='.trim($detail[5],"\n\r").'&w=quhao">'.trim($detail[5],"\n\r").'</a></td></tr>';
					if($r_num>=$p_num*($page-1)+1 && $r_num<=$p_num*$page){
						$result .= '<tr height="24"><td><a href="?q='.urlencode($detail[0]).'&w=sheng">'.$detail[0].'</a></td><td><a href="?q='.urlencode($detail[1]).'&w=diqu">'.$detail[1].'</a></td><td><a href="?q='.urlencode($detail[2]).'&w=shi">'.$detail[2].'</a></td><td><a href="?q='.urlencode($detail[3]).'&w=cun">'.$detail[3].'</a></td><td><a href="?q='.$detail[4].'&w=youbian">'.$detail[4].'</a></td><td><a href="?q='.trim($detail[5],"\n\r").'&w=quhao">'.trim($detail[5],"\n\r").'</a></td></tr>';
					}
					break;
				}
			}
			$p = ceil($r_num/$p_num); //���ʵ��ҳ��
		}		
		$fp = @fopen($keydb,"a");
		@fwrite($fp,$r_num."\n".$r);
		@fclose($fp);
	}else{
		$dreamdb=file($keydb);
		$r_num = trim($dreamdb[0],"\n\r");
		$p = ceil($r_num/$p_num); //���ʵ��ҳ��
		if($page>$p) $page=$p;
		$result = $dreamdb[$page];
	}
	for($i=1; $i<=$p; $i++){
		$post_l .= '<a href="?q='.urlencode($q).'&p='.$i;
		if($_GET['w']) $post_l .= '&act='.$_GET['w'];
		if($i==$page){
			$post_l .= '"><font color="red">['.$i.']</font></a> ';
		}else{
			$post_l .= '">['.$i.']</a> ';
		}
	}
	$post_l = '<tr><td align="center" style="font-size:14px;padding:10px;" bgcolor="#F0F0F0">��ҳ��'.$post_l.' (����'.$r_num.'����ÿҳ'.$p_num.'��)</td></tr>';
	$result = '<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid #98A7B8;"><tr><td style="background:#F0F0F0;padding:0 5px;color:#014198;" height="26" valign="middle"><b>�ҵ�'.$r_num.'���� <a href="./?q='.urlencode($q).'"><font color="#c60a00">'.$q.'</font></a> ��ص��ʱ�����</b></td></tr><tr><td><table cellpadding="4" cellspacing="4" width="100%" style="text-align:center"><tr style="text-align:center;font-weight:bold;" height="26" bgcolor="#efefef"><td width="80">ʡ</td><td>����</td><td>����</td><td>�����</td><td width="80">��������</td><td width="60">�绰����</td></tr>'.$result.'</table></td></tr>'.$post_l.'</table>';
}
switch ($_GET['w']){
	case "sheng":
		$qw = "ʡ��: ";	break;
	case "diqu":
		$qw = "����: ";	break;
	case "shi":
		$qw = "����: ";  break;
	case "cun":
		$qw = "������: ";break;
	case "youbian":
		$qw = "�ʱ�: ";  break;
	case "quhao":
		$qw = "����: ";  break;
	default:break;
}
if($q){
	echo "<title>".$qw.$q." - ���������������Ų�ѯ 5Glive.com</title>";
	echo '<meta name="keywords" content="'.$q.','.$q.'�ʱ�,'.$q.'����,'.$q.'��������,'.$q.'�绰����,��ѯ" />';
	echo '<meta name="description" content="'.$q.'�����������Ų�ѯwww.5glive.com�����ʱ����Ų�ѯϵͳӵ��'.$q.'��ȫ���µ��ʱ��������ݣ�6������������Բ�ѯ'.$q.'��ȷ��'.$q.'�Ľֵ�������ʱ����ţ�֧��ģ����ѯ������ʡ����������������������ɲ鵽'.$q.'����ʱ����ţ�Ҳ�������ʱ�����ŷ������λ�á�" />';
}else{
	echo "<title>���������������Ų�ѯ 5Glive.com</title>";
	echo '<meta name="keywords" content="����,�ʱ�,��������,����,�绰����,��ѯ" />';
	echo '<meta name="description" content="���������������Ų�ѯwww.5glive.com�����ʱ����Ų�ѯϵͳӵ��ȫ����ȫ���µ��ʱ��������ݣ�6������������Բ�ѯ��ȷ���ֵ�������ʱ����ţ�֧��ģ����ѯ������ʡ����������������������ɲ鵽����ʱ����ţ�Ҳ�������ʱ�����ŷ������λ�á�" />';
}
?>
<div class="main">
          <div class="box">
            <div id="c">
              <h1>�ʱ����Ų�ѯ</h1>
              <div class="box1" style="text-align:center;">             
                  </span><div class="t" id="seo_result">
<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid #98A7B8;" id="top"><tr><td align="center" style="font-size:12px;padding:0 0 10px 0;line-height:150%;">     <form action="" method="get" name="f1">
            <span class="info3" > ������Ҫ��ѯ�ĳ������ƣ�
            <input name="q" type="text" id="q" class="input" size="40" url="true" onmouseover="this.select()" value="<?php echo $q ?>"/><input name="a" type="hidden" id="a" value="search">
            <input name="btnS" class="but" type="submit" value="��ʼ��ѯ"  id="sub" />
          </form>��ѯʡ����������������������ʱ����ȥ��<font color="red">ʡ���ش�</font>��׺<br>���ѯ������ʡ���������롰���ϡ���֧���ʱ�����ŷ������λ��<br>����<a href="?q=%BA%FE%C4%CF&w=sheng">����</a> <a href="?q=%B3%A4%C9%B3&w=diqu">��ɳ</a> <a href="?q=%B3%A4%C9%B3%CA%D0&w=shi">��ɳ��</a> <a href="?q=%D3%EA%BB%A8%CD%A4&w=cun">�껨ͤ</a> <a href="?q=410004&w=youbian">410004</a> <a href="?q=0731&w=quhao">0731</a></td></tr>
<tr><td style="background:#F0F0F0;padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b>�߼���ѯ</b></td></tr><tr><td align="center" valign="middle" style="padding:20px;">
<table style="font-size:14px;" width="100%" align="center">
<tr>
<td width="50%"><form action="" method="get" name="f1">������ʡ���飺<select name="q" id="q" style="width:100px">
<?php
$count = count($sheng);
for($i=0;$i<$count;$i++){
	echo '<option value="'.$sheng[$i].'"';
	if($_GET['w']=="sheng" && $sheng[$i]==$q) echo ' selected';
	echo '>'.$shengpy[$i].' '.$sheng[$i].'</option>';
}
?>
</select><input name="w" id="w" type="hidden" value="sheng" /> <input type="submit" value=" ���� " /></form></td><td width="50%"><form action="" method="get" name="f1">�����������飺<input name="q" id="q" type="text" size="18" delay="0" value="<?php if($_GET['w']=="diqu") echo $q; ?>" style="width:100px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" onmouseover="this.select()" /><input name="w" id="w" type="hidden" value="diqu" /> <input type="submit" value=" ���� " /></form></td>
</tr>
<tr>
<td><form action="" method="get" name="f1">�����������飺<input name="q" id="q" type="text" size="18" delay="0" value="<?php if($_GET['w']=="shi") echo $q; ?>" style="width:100px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" onmouseover="this.select()" /><input name="w" id="w" type="hidden" value="shi" /> <input type="submit" value=" ���� " /></form></td><td><form action="" method="get" name="f1">����������飺<input name="q" id="q" type="text" size="18" delay="0" value="<?php if($_GET['w']=="cun") echo $q; ?>" style="width:100px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" onmouseover="this.select()" /><input name="w" id="w" type="hidden" value="cun" /> <input type="submit" value=" ���� " /></form></td>
</tr>
<tr>
<td><form action="" method="get" name="f1">�������ʱ�飺<input name="q" id="q" type="text" size="18" delay="0" value="<?php if($_GET['w']=="youbian") echo $q; ?>" style="width:100px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" onmouseover="this.select()" /><input name="w" id="w" type="hidden" value="youbian" /> <input type="submit" value=" ���� " /></form></td><td><form action="" method="get" name="f1">���������Ų飺<input name="q" id="q" type="text" size="18" delay="0" value="<?php if($_GET['w']=="quhao") echo $q; ?>" style="width:100px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" onmouseover="this.select()" /><input name="w" id="w" type="hidden" value="quhao" /> <input type="submit" value=" ���� " /></form></td>
</tr>
</table>
</td></tr></table><br />
<?php
if($q!=""){
	echo $result;
}else{	
	echo $result;
?>
<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid #98A7B8;"><tr><td style="background:#F0F0F0;padding:0 5px;color:#014198;" height="26" valign="middle"><b>���ʡ�����Ʋ�ѯ</b></td></tr><tr><td align="center">
<div style="font-size:middle;">
<div style="position:relative; width: 500px; height: 500px;">
<p><img alt="�й���ͼ" longdesc="../images/map.gif" src="../images/map.gif" width="578" height="478" /></p>
<div style="position:absolute; left: 0px; top: 0px; width: 500px; height: 438px;"></div>
<div style="position:absolute; left:276px; top: 305px; width: 46px; height: 11px;"><a href="?q=�Ĵ�&w=sheng" title="�Ĵ�">�Ĵ�</a></div>
<div style="position:absolute; left:335px; top: 320px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:418px; top: 174px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:437px; top: 196px; width: 46px; height: 11px;"><a href="?q=���&w=sheng" title="���">���</a></div>
<div style="position:absolute; left:494px; top: 289px; width: 46px; height: 11px;"><a href="?q=�Ϻ�&w=sheng" title="�Ϻ�">�Ϻ�</a></div>
<div style="position:absolute; left:123px; top: 285px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:113px; top: 158px; width: 46px; height: 11px;"><a href="?q=�½�&w=sheng" title="�½�">�½�</a></div>
<div style="position:absolute; left:197px; top: 229px; width: 46px; height: 11px;"><a href="?q=�ຣ&w=sheng" title="�ຣ">�ຣ</a></div>
<div style="position:absolute; left:394px; top: 263px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:400px; top: 204px; width: 46px; height: 11px;"><a href="?q=�ӱ�&w=sheng" title="�ӱ�">�ӱ�</a></div>
<div style="position:absolute; left:262px; top: 384px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:327px; top: 360px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:378px; top: 221px; width: 46px; height: 11px;"><a href="?q=ɽ��&w=sheng" title="ɽ��">ɽ��</a></div>
<div style="position:absolute; left:485px; top: 154px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:509px; top: 124px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:320px; top: 224px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:461px; top: 263px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:479px; top: 321px; width: 46px; height: 11px;"><a href="?q=�㽭&w=sheng" title="�㽭">�㽭</a></div>
<div style="position:absolute; left:445px; top: 294px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:458px; top: 358px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:429px; top: 335px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:344px; top: 270px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:218px; top: 180px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:336px; top: 178px; width: 50px; height: 11px;"><a href="?q=���ɹ�&w=sheng" title="���ɹ�">���ɹ�</a></div>
<div style="position:absolute; left:355px; top: 398px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:440px; top: 230px; width: 46px; height: 11px;"><a href="?q=ɽ��&w=sheng" title="ɽ��">ɽ��</a></div>
<div style="position:absolute; left:388px; top: 303px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:383px; top: 348px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:407px; top: 395px; width: 46px; height: 11px;"><a href="?q=�㶫&w=sheng" title="�㶫">�㶫</a></div>
<div style="position:absolute; left:363px; top: 456px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:509px; top: 76px; width: 46px; height: 11px;"><a href="?q=������&w=sheng" title="������">������</a></div>
<div style="position:absolute; left:451px; top: 403px; width: 46px; height: 11px;"><a href="?q=���&w=sheng" title="���">���</a></div>
<div style="position:absolute; left:420px; top: 415px; width: 46px; height: 11px;"><a href="?q=����&w=sheng" title="����">����</a></div>
<div style="position:absolute; left:498px; top: 386px; width: 46px; height: 11px;"><a href="?q=̨��&w=sheng" title="̨��">̨��</a></div>
<div style="position:absolute; left: 254px; top: 93px; width: 120px; height: 20px; color:#669933; font-size: 16px;">����ʡ�����ƽ����ѯ</div>
</div>
</div>
</td></tr></table>
<?php
}
?>
</div>
 <div style="width:100%">
       <div id="detail" class="info1">
<div id="result" class="div_whois">
<div class="t" style="display:none" id="seo_result">
</div>
</div>
          </div>
          <div style="float:right; width:40%; text-align:right; padding-top:9px;">
          </div>
      </div>
  </div>
</div>
</div>
<div class="box">
  <div id="b_14">
    <h1>���߼��</h1>
    <div class="box1">
        <span class="info2">
      <p style="line-height:150%">���ʱ����Ų�ѯϵͳӵ��<strong>ȫ����ȫ���µ��ʱ���������</strong>��6������������Բ�ѯ��ȷ���ֵ�������ʱ����ţ�֧��ģ����ѯ������ʡ����������������������ɲ鵽����ʱ����ţ�Ҳ�������ʱ�����ŷ������λ�á�<br>�����ҹ������ļ���λ�����ƣ�ǰ��λ��ʾʡ���С�������������λ��������������λ�����ء��У������λ����Ͷ���ʾ֣������λ�Ǵ������������ĸ�Ͷ����Ͷ�ݵģ���Ͷ������λ�á�<br>�������磺�������롰410004������41���������ʡ����00������ʡ�᳤ɳ����04����������Ͷ������ </p>
        </span>
    </div>
  </div>
</div>
<?php @require_once('../foot.php');?>