<?php
define('IN_SEO','IN_SEO');
$url = trim($_POST["domain"]?$_POST["domain"]:$_GET["domain"]);
$url = $url?$url:'seoued.net';
$string = file_get_contents("http://data.alexa.com/data/+wQ411en8000lA?cli=10&dat=s&ver=7.0&url=$url");
header("content-Type: text/html; charset=GB2312");
$pat4 = "/POPULARITY URL=\"(.+)\" TEXT=\"(.+)\"\/>/Ui";
preg_match_all($pat4, $string, $array);	
$wordpm2 = $array[2][0]?$array[2][0]:'none';

$string = iconv("UTF-8","GB2312",$string);
$pat1   = "/ HOST=\"(.+)\"/i";
preg_match_all($pat1, $string, $array);
$selurl = $array[1][0]?$array[1][0]:'û�м�¼';

$pat5 = "/LINKSIN NUM=\"(.+)\"/i";
preg_match($pat5, $string, $array);
$weblink = $array[1]?$array[1]:'0';

$pat6 = "/DATE=\"(.+)\" DAY=\"(.+)\" MONTH=\"(.+)\" YEAR=\"(.+)\"/i";
preg_match_all($pat6, $string, $array);
$sldate = $array[1][0]?$array[1][0]:'û�м�¼';

$pat7 = "/CAT ID=\"(.+)\" TITLE=\"(.+)\" CID=\"(.+)\"/i";
preg_match_all($pat7, $string, $array);
if($array[1][0]){
   $a  = array_reverse(explode('/',$array[1][0]));
   $aa = $a[1].'/'.$a[0];
}
$ml = $aa?$aa:'��վδ������ѷ����Ŀ¼��¼';

$pat8 = "/SPEED TEXT=\"(.+)\" PCT=\"(.+)\"/i";
preg_match_all($pat8, $string, $array);
$speedtext = $array[1][0]?$array[1][0]:'û�м�¼';
$speedpct  = $array[2][0]?$array[2][0]:'û�м�¼';

$pat9 = "/LANG LEX=\"(.+)\"/i";
preg_match_all($pat9, $string, $array);
$country = $array[1][0]?$array[1][0]:'����';

$pat10 = "/OWNER NAME=\"(.+)\"/i";
preg_match_all($pat10, $string, $array);
$owner = $array[1][0]?$array[1][0]:'����';

$pat11= "/EMAIL ADDR=\"(.+)\"/i";
preg_match_all($pat11, $string, $array);
$email = $array[1][0]?$array[1][0]:'����';

$pat12 = "/NUMBER=\"(.+)\"/i";
preg_match_all($pat12, $string, $array);
$phone = $array[1][0]?$array[1][0]:'����';

$pat13 = "/ADDR STREET=\"(.+)\" CITY/i";	
preg_match_all($pat13, $string, $array);
$addr = $array[1][0]?$array[1][0]:'����';

$pat14 = "/DESC=\"(.+)\"/i";
preg_match_all($pat14, $string, $array);
$site = $array[1][0]?$array[1][0]:"��վ�㻹û����ALEXA�ύ�κν�����Ϣ��<a href=http://www.alexa.com/data/details/contact_info?url=".$selurl." target=_blank><font color=#ff0000>&nbsp;>>>�����ύ��Ϣ<<<&nbsp;</font></a>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Robots" content="All"  />
<meta name="Keywords" content="alexa,����,��ѯ" />
<meta name="Description" content="רҵ�ṩ����ALEXA����������ѯ����" />
<base onmouseover="window.status='����ALEXA����������ѯ�������е�������������ṩ';return true">
<title><?php echo $selurl?>��Alexa��վ��������������������ҳ���������ѯ|����ALEXA������ѯ�������е�������������ṩ</title>
<link rel="stylesheet" href="images/Style.css" type="text/css" media="all" />
<script src="ajax.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">
function killErrors() {
return true;
}
window.onerror = killErrors;
var Sys_LoadStart=new Date();
window.onload=function ajaxs(){
	 var domain = document.getElementById('domain').value;
	 talktoServer('ajaxs.php?action=rangs&domain='+domain,'changestext',"html");   
     talktoServer('ajaxs.php?action=sonvisits&domain='+domain,'changestext2',"html");
     talktoServer('ajaxs.php?action=visits&domain='+domain,'changestext3',"html");   
}
</SCRIPT>
</head>
<body>
<!--ͷ�����뿪ʼ-->
<div class="colspan">
<div class="title"><a href="">����Alexa��վ����������������ѯϵͳPoweredBy�е���������</a> | �Ƽ���<a href="http://www.seoued.net">ʯ��ׯseo</a> <a href="http://idc.l-sky.cn">��Ȼ����</a> <a href="http://www.yanbaicai.com" target="_blank">�԰ײ�����</a> <a href="http://www.28sem.com" target="_blank">��װӪ���߻�</a> <a title="�Ѳ�ѯ��ַ�ӵ��ղؼУ��Է����Ժ��ѯ��" onClick="window.external.addFavorite('','��վALEXA������ѯ')">�����ղؼ�</a></div>
<div class="data">
<form name="form1" action="" method="POST"> 
<table width="780" cellspacing="0">
	<tr>
		<td>
������Ҫ��ѯ����ַ: HTTP://WWW. <input type="text" style="border:1px solid #999900;padding:3px;font-weight:bold;font-size:15px" id="domain" name="domain" size="28" id="url" value="<?php echo $selurl?>" onKeyDown="if(event.keyCode==13)document.form1.submit();" class="input_form"><script>document.alexasearch.domain.focus()</script><input type="submit" value="�� ѯ" name="submit" class="submit_button" id="sub" style="margin-top:9px;padding-top:2px;width:100px;height:27px">&nbsp;&nbsp;
</td>
	</tr>	
</table>
</form>
</div>
</div>
<!--False-->
<div id="text_ad">��ӭ��ʹ���� �е��������� ����ṩ�����İ�ALEXA��ѯ����</div>
<!--ͷ���������-->
<div class="colspan"> 
	<div class="title">��վ <b><font color="#FFFF00">www.<?php echo $selurl?></font></b> �� Alexa ��ȫ���ۺ������� <b><font color="#FFFF00"><?php echo $wordpm2?></font></b> λ</div> 
	<div class="data">
		<table width="780" cellspacing="0" class="DoubleColorTable">
	<tr>
		<td colspan="7">ֻ�ṩALEXA������ѯ����������ѯ������ALEXA������ALEXA�������ף�����ͬ�͹����κ�������Ϊ��</td>
	</tr>
	<tr>
		<td width="210" height="155" rowspan="7"><div id="view_pic"><a href="http://www.chinaccnet.com" target="_blank"><Img Src="images/No_Pic.gif" border="0" width="202" height="147"></a></div></td>
		<td width="66">վ������:</td>
		<td width="100" align="left" title="<?php echo $selurl?>"><?php echo $selurl?></td>
		<td width="66">��վվ��:</td>
		<td width="100" align="left" title="<?php echo $owner?>"><?php echo $owner?></td>
		<td width="66">��������:</td>
		<td width="174" align="left" title="<?php echo $email?>"><?php echo $email?></td>
	</tr>
	<tr>
		<td width="66">�ۺ�����:</td>
		<td width="100" align="left"><span id="Rank"><?php echo $wordpm2?></span></td>
		<td width="66">��������:</td>
		<td width="100" align="left"><span id="NextRank"><?php echo $wordpm2?></span></td>
		<td width="66">��¼����:</td>
		<td width="174" align="left"><?php echo $sldate?></td>
	</tr>
	<tr>
		<td width="66">��������:</td>
		<td width="100" align="left"><?php echo $country?></td>
		<td width="66">���뷽ʽ:</td>
		<td width="100" align="left">����</td>
		<td width="66">�����ٶ�:</td>
		<td width="174" align="left" title="ҳ��ƽ������ʱ��<?php echo $speedtext?>Ms,��62%����վ�����ٶȿ졣���ۣ��ٶ�������"><?php echo $speedtext?> Ms      /      <?php echo $speedpct?>��</td>
	</tr>
	<tr>
		<td width="66">��������:</td>
		<td width="100" align="left">NO</td>
		<td width="66">��������:</td>
		<td width="100" align="left" title="������ֲ鿴��ϸ��������վ��"><a href="http://www.alexa.com/data/ds/linksin?q=link:<?php echo $selurl?>" target="_blank"><?php echo $weblink?></a> ��</td>
		<td width="66">��ϵ�绰:</td>
		<td width="174" align="left" title="<?php echo $phone?>"><?php echo $phone?></td>
	</tr>
	<tr>
		<td width="66">��ϸ��ַ:</td>
		<td width="500" colspan="5" align="left" title="<?php echo $addr?>"><?php echo $addr?></td>
	</tr>
	<tr>
		<td width="66">��վ���:</td>
		<td width="500" colspan="5" align="left" title="<?php echo $site?>��">
		<font color="D4D4D4"><?php echo $site?></font></td>
	</tr>
	<tr>
		<td width="66" style="color:#ff0000;">վ���Ƽ�:</td>
		<td width="260" colspan="3" align="left"><a href="http://www.seoued.net" target="_blank"><font style="color:#ff0000;font-weight:bold;">ʯ��ׯseo</font></a>  <a href="http://idc.l-sky.cn" target="_blank"><font style="color:#ff0000;font-weight:bold;">��Ȼ����</font></a> <a href="http://www.yanbaicai.com" target="_blank"><font style="color:#ff0000;font-weight:bold;">�԰ײ�����</font></a></td>
		<td width="66">����Ŀ¼:</td>
		<td width="174" align="left" title="<?php echo $ml?>"><?php echo $ml?></td>
	</tr>
	<tr>
		<td><a href="http://www.alexa.com/edit/index/seoued.net" target="_blank">�޸���Ϣ</a> | <a href="http://www.alexa.com/data/details/editor?type=rl&url=seoued.net" target="_blank">�ύ����</a></td> 
		<td colspan="6"><div><a href="whois/index.php?domain=<?php echo $selurl?>" target="_blank" style="cursor:hand"><font color="#ff0000">Whois��Ϣ��ѯ</font></a> | <a href="http://tool.chinaccnet.com/ip/?ip=<?php echo $selurl?>" target="_blank">������IP��ѯ</a></div></td>
	</tr>
</table>
	</div> 
</div> 
<div id="text_ad2">��ӭ��ʹ���� �е��������� ����ṩ�����İ�ALEXA��ѯ����</div> 
<div class="colspan">  
	<div class="title">վ�� <strong><?php echo $selurl?></strong> �� Alexa ������ѯ���  | <a href="http://www.alexa.com/data/details/traffic_details/chinaccnet.com" target="_blank">Alexa�ٷ�����</a></div> 
  <div class="data"  id="changestext">
  		<table width="780" cellspacing="0">
			<tr>
				<td width="12%" class="project_left">��������</td>
				<td width="12%" class="project">�����仯����</td>
				<td width="12%" class="project">һ��ƽ������</td>
				<td width="12%" class="project">�����仯����</td>
				<td width="12%" class="project">һ��ƽ������</td>
				<td width="12%" class="project">�����仯����</td>
				<td width="12%" class="project">����ƽ������</td>
				<td width="12%" class="project">�����仯����</td>
			</tr>
<?php if($url=='chinaccnet.com'){
?>
			<tr height="40">
				<td class="rank_left" id="ranks1">--</td>
				<td class="rank" id="ranks2">--</td>
				<td class="rank" id="ranks3">52,701</td>
				<td class="rank" id="ranks4"><img src=images/Up_arrow.gif border=0><font color=#FF0000>29,873 </font></td>
				<td class="rank" id="ranks5">72,450</td>
				<td class="rank" id="ranks6"><img src=images/Down_arrow.gif border=0><font color=#FF0000>4,699 </font></td>
				<td class="rank" id="ranks7"><?php echo $wordpm2?></td>
				<td class="rank" id="ranks8"><img src=images/Down_arrow.gif border=0><font color=#FF0000>23,130 </font></td>
			</tr>
<?php }else{
?>
  			<tr height="40">
				<td class="rank_left" id="ranks1"><img src="images/Load.gif" /></td>
				<td class="rank" id="ranks2"><img src="images/Load.gif" /></td>
				<td class="rank" id="ranks3"><img src="images/Load.gif" /></td>
				<td class="rank" id="ranks4"><img src="images/Load.gif" /></td>
				<td class="rank" id="ranks5"><img src="images/Load.gif" /></td>
				<td class="rank" id="ranks6"><img src="images/Load.gif" /></td>
				<td class="rank" id="ranks7"><?php echo $wordpm2?></td>
				<td class="rank" id="ranks8"><img src="images/Load.gif" /></td>
			</tr>
<?php }
?>
		</table>
	</div>
 </div>
 <div id="pic_ad">��ӭ��ʹ���� �е��������� ����ṩ�����İ�ALEXA��ѯ����</div> 
 <div class="colspan"> 
	<div class="title">��վ��ƽ��Alexa��������ͼ <font color="#FF0099" onmousemove="this.color='#FF0000';" onmouseout="this.color='#FF0099';" >[���ʱ��β鿴��Ӧʱ������]</font></div> 
	<div class="data">
		<table width="780" cellspacing="0">
			<tr>
				<td class="project_left"><a OnClick="document.all.rank1.style.display='';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='none';" style="cursor:hand">������ƽ����������</a></td>
				<td class="project"><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='none';"style="cursor:hand">������ƽ����������</a></td>
				<td class="project"><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='';document.all.rank4.style.display='none';document.all.rank5.style.display='none';"style="cursor:hand">һ����ƽ����������</a></td>
				<td class="project"><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='';document.all.rank5.style.display='none';"style="cursor:hand">�����ƽ����������</a></td>
				<td class="project"><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='';"style="cursor:hand">һ����ƽ����������</a></td>
			</tr>
			<tr>
				<td colspan="5" class="rank_left">
<div id="rank1"><img width="700px" height="280px" src="http://traffic.alexa.com/graph?w=700&h=280&r=6m&y=t&u=<?php echo $url?>" alt=" ���������ͼƬ���뵥���Ҽ�ѡ�� [��ʾͼƬ] "></div>
<div id="rank2" style="display:none"><img width="700px" height="280px" src="http://traffic.alexa.com/graph?w=700&h=280&r=3m&y=t&u=<?php echo $url?>" alt=" ���������ͼƬ���뵥���Ҽ�ѡ�� [��ʾͼƬ] "></div>
<div id="rank3" style="display:none"><img width="700px" height="280px" src="http://traffic.alexa.com/graph?w=700&h=280&r=1m&y=t&u=<?php echo $url?>" alt=" ���������ͼƬ���뵥���Ҽ�ѡ�� [��ʾͼƬ] "></div>
<div id="rank4" style="display:none"><img width="700px" height="280px" src="http://traffic.alexa.com/graph?w=700&h=280&r=15.0m&y=t&u=<?php echo $url?>" alt=" ���������ͼƬ���뵥���Ҽ�ѡ�� [��ʾͼƬ] "></div>
<div id="rank5" style="display:none"><img width="700px" height="280px" src="http://traffic.alexa.com/graph?w=700&h=280&r=7.0m&y=t&u=<?php echo $url?>" alt=" ���������ͼƬ���뵥���Ҽ�ѡ�� [��ʾͼƬ] "></div>
</td>
			</tr>
		</table>
	</div> 
</div>
<div id="pic_ad">��ӭ��ʹ���� �е��������� ����ṩ�����İ�ALEXA��ѯ����</div>
<div class="colspan"> 
	<div class="title">Alexa ͳ�Ƶ� <strong><?php echo $selurl?></strong> ������վ�� �����ʱ��� �� �˾�ҳ������� �б�</div> 
	<div class="data" id="changestext2"> 

	</div> 
</div>
<div class="colspan"> 
	<div class="title">Alexa ͳ�Ƶ� <strong><?php echo $selurl?></strong> ����/�������������ʱ��� �б�</div> 
	<div class="data" id="changestext3">
	</div> 
</div>
<div class="colspan"> 
	<div class="title">����Alexa��ѯϵͳʹ��˵������ذ���</div> 
	<div class="data">
		<table width="780" cellspacing="0">
			<tr>
				<td class="rank_left">
����Alexa��վ������������Amazon.com�ٷ���Ϊ�������վ����ѯ�Լ���վ�������ݣ���վ�Ѿ����������ݾ���������ʾ�����ݸ�Alexa����ͬ������ӭ���ʹ�ã�<br/> 
				</td>
			</tr>
		</table>
	</div> 
</div>
<div id="bottom">
	<div class="bottom_title"></div> 
		<table width="100%" cellspacing="0">
			<tr>
				<td width="100%" class="bottom_nav"><a href="" OnClick="this.style.behavior='url(#default#homepage)';this.setHomePage('')">��Ϊ��ҳ</a> �� <a OnClick="javascript:window.external.addFavorite('','����Alexa��ѯ')" style="cursor: hand;">�����ղ�</a> �� <a href="http://www.seoued.net/about">��ϵվ��</a> �� <a href="http://download.alexa.com/?amzn_id=chinawebmas0b-20" target="_blank">����������</a></td>
			</tr>
			<tr>
				<td height="20"></td>
			</tr>
			<tr>
				<td class="copyrights">ҳ��ִ��ʱ��:125 Ms<script language="JavaScript">var Sys_LoadEnd=new Date();var Sys_LoadTime=0;Sys_LoadTime=(Sys_LoadEnd - Sys_LoadStart);document.write('&nbsp;&nbsp;ҳ��װ��ʱ��:'+Sys_LoadTime+' Ms&nbsp;&nbsp;');</script>
			<tr>
				<td height="30" id="alexa"></td>
			</tr>
				</td>
			</tr>
		</table>
</div></body></html>
<div style="display:none"><script src="http://s5.cnzz.com/stat.php?id=2805830&web_id=2805830" language="JavaScript"></script></div>