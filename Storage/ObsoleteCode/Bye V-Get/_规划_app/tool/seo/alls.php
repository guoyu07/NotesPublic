<?php
eval('$__file__=__FILE__;');
define('ROOT_PATH',$__file__ ? dirname($__file__).'/' : './');
//�������淴�����Ӽ���¼
include '../robot.php';
require '../global.php';
$domain = $_POST['domain']?$_POST['domain']:$_GET['domain'];
$domain = strtolower($domain);
$domain = $domain?$domain:'seoued.net';
is_domain($domain) or exit( "<script language=javascript>alert('��������ȷ��������');location.href='alls.php';</script>");
//META��Ϣ�����
$url = 'http://'.trim($domain);
$content = @file_get_contents($url);
$charset = "/charset=(.*)/";
preg_match($charset,$content,$charsetarr);
$charset2 = strtolower(substr($charsetarr[1],0,2));
if($charset2 != 'gb'){
	require_once('require/chinese.php');
	$chs     = new Chinese('utf-8','GB2312');
	$content = $chs->Convert($content);
}
$pat1  = "/<title>(.*)<\/title>/si";
preg_match_all($pat1, $content, $array);
$title = $array[1][0];
$tt    = $title?mb_strlen($title,'gbk'):'0';
$pat2  = "/meta content=\"(.+)\" name=\"keywords\"/Ui";
$pat4  = "/meta name=\"keywords\" content=\"(.+)\"/Ui";
preg_match_all($pat2, $content, $array2);
preg_match_all($pat4, $content, $array4);
$keywords = $array2[1][0]?$array2[1][0]:$array4[1][0];
$k    = $keywords?mb_strlen($keywords,'gbk'):'0';
$pat3 = "/<meta content=\"(.+)\" name=\"description\"/Ui";
$pat5 = "/<meta name=\"description\" content=\"(.+)\"/Ui";
preg_match_all($pat3, $content, $array3);
preg_match_all($pat5, $content, $array5);
$description = $array3[1][0]?$array3[1][0]:$array5[1][0];
$d = $description?mb_strlen($description,'gbk'):'0';
//����֩�롢������ģ��
$bods = "/<body>(.*)<\/body>/is";
preg_match_all($bods, $content, $array4);
$pat4 = "/>(.*)</U";
preg_match_all($pat4, $array4[0][0], $array5);
$body = "";
for($i=0;$i<sizeof($array5[1]);$i++){
	$body .= $array5[1][$i]." ";
}
$pat44 = "/>(.*)</Us";
preg_match_all($pat44, $array4[0][0], $array55);
$body2 = "";
for($i=0;$i<sizeof($array55[1]);$i++){
	$body2 .= $array55[1][$i]." ";
}
//�ؼ����ܶ�
$keys  = explode(',',$array2[1][0]);
if($keys[0]){
	$keyss = "<br/><table border=1 width=100% bordercolordark=#FFFFFF cellspacing=0 cellpadding=0 bordercolorlight=#BBD7E6><tr bgcolor=#D8F0FC><td>�ؼ���</td><td>����Ƶ��</td><td>2%�Q�ܶȨQ8%</td><td>�ٶ�����</td><td>Google����</td></tr>";
	$body2 = preg_replace(array("/\s/","<br/>"),array("",),$body2);
	for($t=0;$t<sizeof($keys);$t++){
		$keys[$t]  = preg_replace(array("/\s/","<br/>"),array("",),$keys[$t]);
		$keys1 = "/".$keys[$t]."/";
		preg_match_all($keys1,$body2,$densti);
		$a1 = mb_strlen($body2,'gbk');
		$a2 = mb_strlen($keys[$t],'gbk');
		$a3 = sizeof($densti[0]);
		$a4 = $a2*$a3;
		$a5 = @(round($a4/$a1*100,1)."%");
		$text     = $keys[$t];
		$output   = '';
		$tab_text = str_split($text); 
		foreach ($tab_text as $id=>$char){
		  $hex = dechex(ord($char));
		  $output .= '%' . $hex;
		}
		$keyss .= "<tr><td><div id=keys".$t.">".$keys[$t]."</div></td><td>".$a3."</td><td>".$a5."</td><td><div name=cha1 id=cha".$t."><a href=http://www.baidu.com/s?wd=".$output." target=_blank>�鿴</a></div></td><td><a href=http://www.google.com.hk/search?q=".$output." target=_blank>�鿴</a></td></tr>";
		@unlink($densti);
	}
	$keyss .= "</table>";
}
//PR
@require_once('../pr/prfunction.php');
$PR = '<img src="../images/pagerank'.GetPR($domain).'.gif" align="absmiddle" /> '.$domain;
$body = strlen($body)>800 ? substr($body,0,800).'��������' : $body;
@require_once('../cache.php');
if(file_exists("../cache/seo.php")){
	@require_once("../cache/seo.php");
    $urls = filehave($urls,$domain);
}else{
	$urls = fileno($domain);
}
writeover("../cache/seo.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title><?php echo $domain;?>��SEO�ۺϲ�ѯ-վ������ - ƻ����˺Ƥ������ Powered by www.seoued.net</title>
<link href="http://www.seoued.net/tool/images/toolsite.css" rel="stylesheet" type="text/css" />
<script src="http://www.seoued.net/tool/images/globals.js" type="text/javascript"></script>
<script src="http://www.seoued.net/tool/images/home.js" type="text/javascript"></script>
<script type="text/javascript">
function $(ID) {
	return document.getElementById(ID);
}
	var xmlHttp;
	function creatXMLHttpRequest() {
		if(window.ActiveXObject) {
			xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
		} else if(window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
	}

	function startRequest() {
		var queryString;
		var domain = document.getElementById('domain').value;
		queryString = "domain=" + domain;
		creatXMLHttpRequest();
		xmlHttp.open("POST","?action=do","true");
		xmlHttp.onreadystatechange = handleStateChange;
		xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
		xmlHttp.send(queryString);
	}

	function handleStateChange() {
		if(xmlHttp.readyState == 1) {
			document.getElementById('result').style.cssText = "";
			document.getElementById('result').innerText = "Loading...";
		}
		if(xmlHttp.readyState == 4) {
			if(xmlHttp.status == 200) {
				document.getElementById('result').style.cssText = "";
				var allcon =  xmlHttp.responseText;
				document.getElementById('result').innerHTML = allcon;
			}
		}
	}

function copyToClipboard(txt) {   
     if(window.clipboardData) {   
         window.clipboardData.clearData();   
         window.clipboardData.setData("Text", txt);   
     } else if(navigator.userAgent.indexOf("Opera") != -1) {   
          window.location = txt;   
     } else if (window.netscape) {   
          try {   
               netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");   
          } catch (e) {   
               alert("��������ܾ���\n�����������ַ������'about:config'���س�\nȻ��'signed.applets.codebase_principal_support'����Ϊ'true'");   
          }
          var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
          if (!clip)
               return;
          var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);   
          if (!trans)   
               return;   
          trans.addDataFlavor('text/unicode');   
          var str = new Object();   
          var len = new Object();   
          var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
          var copytext = txt;   
          str.data = copytext;   
          trans.setTransferData("text/unicode",str,copytext.length*2);   
          var clipid = Components.interfaces.nsIClipboard;   
          if (!clip)   
               return false;   
          clip.setData(trans,null,clipid.kGlobalClipboard);
     }   
}
function killErrors() {
return true;
}
window.onerror = killErrors;

</script>
</head>
<body>
<div class="wrap"> 
<div class="top-nav">
    <div class="top-menu">
    <a href="http://www.seoued.net/" target="_parent">ʯ��ׯseo</a> | 
    <a href="http://www.seoued.net/daohang" target="_blank"><b>��ַ��ȫ</b></a> |
    <a href="http://www.seoued.net/t/" target="_blank">΢����</a> | 
    <a href="http://www.seoued.net/tool/" target="_blank">վ������</a> | 
    <a href="http://www.28sem.com/" target="_blank">28sem</a> |
	<a href="http://www.seoued.net/share" target="_blank">ƻ���ƹ�</a> |
	<a href="http://www.yanbaicai.com" target="_blank">�԰ײ�����</a> | 
	<a href="http://idc.l-sky.cn" target="_blank"><font color="red">��۸�������������.. </font></a>
    </div>
 </div>
  <div class="top">
    <div class="topbanner"></div>
    <div class="banneright">
<ul><li><a href="/" target="_blank"><font color="blue">�е��Ƽ�������3600Ԫ/��</font></a></li>
<li><a href="/" target="_blank"><font color="red">�е��Ƽ�1.3G�����ռ�199Ԫ</font></a></li>
<li><a href="/" target="_blank"><font color="blue">�е��Ƽ��ⱸ����ۿռ�����</font></a></li>
</ul>
	</div>
  </div>
  <div class="menu"><a href="http://www.seoued.net/">��ҳ</a> <a href="http://www.seoued.net/tool/" class="select">վ������</a> 
   <a onmouseover="mouseover(this, 3)" onmouseout="mouseout()" style="cursor:pointer;">��վ��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 4)" onmouseout="mouseout()" style="cursor:pointer;">SEO��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 5)" onmouseout="mouseout()" style="cursor:pointer;">����/IP���ѯ</a> 
   <a onmouseover="mouseover(this, 6)" onmouseout="mouseout()" style="cursor:pointer;">����ת������</a> 
   <a onmouseover="mouseover(this, 7)" onmouseout="mouseout()" style="cursor:pointer;">��������</a>
	<a href="/" target="_blank"></a>
<a href="/" target="_blank"><font color="red"></font></a>
  </div>
  <!--sub menu-->
  <div id="menu3" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://www.seoued.net/tool/alexa" target="_blank">ALEXA������ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/webs/webs.php" target="_blank">վ�����ӷ���</a></li>
    <li><a href="http://www.seoued.net/tool/density.php">�ؼ����ܶȼ��</a></li>
    <li><a href="http://www.seoued.net/tool/meta.php">META��Ϣ���</a></li>
    <li><a href="http://www.seoued.net/tool/pr/outpr.php">PR���ֵ��ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/yuan.php">�鿴��ҳԴ����</a></li>
    </ul>
  </div>
  <div id="menu4" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://www.seoued.net/tool/friends/friends.php">�������Ӽ��</a></li>
    <li><a href="http://www.seoued.net/tool/keys/keys.php">�ؼ���������ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/baidu/baidu.php">�ٶȽ�����¼</a></li>
    <li><a href="http://www.seoued.net/tool/google/google.php">Google��¼</a></li>
    <li><a href="http://www.seoued.net/tool/ssyqsl/ssyqsl.php">��վ��¼��ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/ssyqfl/ssyqfl.php">�������Ӳ�ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/pr/pr.php">PR��ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/esearch.php">������ģ��</a></li>
    </ul>
  </div>
  <div id="menu5" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://www.seoued.net/tool/dels/dels.php">����ɾ��ʱ��</a></li>
    <li><a href="http://www.seoued.net/tool/ip/">IP��ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/whois/">WHOIS��ѯ</a></li>
    <li><a href="http://www.seoued.net/tool/friendlink/friendlink.php">��������IP��ѯ</a></li>
    </ul>
   </div>
   <div id="menu6" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href="http://www.seoued.net/tool/mds.php?mds=md5">MD5����</a></li>
      <li><a href="http://www.seoued.net/tool/js.php">JS����/����</a></li>
      <li><a href="http://www.seoued.net/tool/htmljs.php">HTML/JS��ת</a></li>
      <li><a href="http://www.seoued.net/tool/unicode.php">Unicodeת��</a></li>
      <li><a href="http://www.seoued.net/tool/utf.php">Utf-8����ת��</a></li>
      <li><a href="http://www.seoued.net/tool/htmlubb.php">HTML/UBB��ת</a></li>
      <li><a href="http://www.seoued.net/tool/unix.php">Unixʱ���ת��</a></li>
     </ul>
   </div>
    <div id="menu7" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href="http://www.seoued.net/tool/ids.php">���֤�����ѯ</a></li>
      <li><a href="http://www.seoued.net/tool/shouji/index.php">�ֻ����������</a></li>
      <li><a href="http://www.seoued.net/tool/yb/yb.php">�ʱ����Ų�ѯ</a></li>
      <li><a href="http://www.seoued.net/tool/countryym.php">������������</a></li>
     </ul>
   </div> 
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript">
window.onload=function ajaxs(){	
	for(var i=1;i<7;i++){
	   talktoServer('ajax.php?action=a'+i+'&lurl='+$('domain').value,'a'+i,"html");
	}
}
</script>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>SEO�ۺϲ�ѯ</h1>
      <div class="box1" style="text-align:center;"> 
      <form action="" method="POST">
          <span class="info3" > ������Ҫ��ѯ��������
           <font color="green"><b>HTTP://</b></font> <input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $domain;?>"/>
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub"/>
            </form>
          </span>
<div class="t" id="seo_result">
<?php echo $PR;?>
<br/>
<table border="1" width="100%" bordercolordark="#FFFFFF" cellspacing="0" cellpadding="0" bordercolorlight="#BBD7E6">
<tr bgcolor=#D8F0FC><td colspan="5">�ٶ����</td></tr>
<tr><td>��<?php echo $domain;?>����ҳ</td><td>�ٶȿ���</td><td>������¼</td><td>���һ��</td><td>���һ��</td></tr>
<tr><td><span id="a1">&nbsp;<img src="../images/loading2.gif"></span></td><td><span id="a2">&nbsp;<img src="../images/loading2.gif"></span></td><td><span id="a3">&nbsp;<img src="../images/loading2.gif"></span></td><td><span id="a4">&nbsp;<img src="../images/loading2.gif"></span></td><td><span id="a5">&nbsp;<img src="../images/loading2.gif"></span></td></tr>
</table>
<br/>
<span id="a6"><table border=1 width=100% bordercolordark=#FFFFFF cellspacing=0 cellpadding=0 bordercolorlight=#BBD7E6>
<tr bgcolor=#D8F0FC><td colspan="9">��ַ<a href="<?php echo "http://".$domain;?>"><?php echo "http://".$domain;?></a>�ڸ��������������¼��ѯ���</td></tr>
<tr><td>��������</td><td>�ȸ�</td><td>�ٶ�</td><td>�Ż�</td><td>�ѹ�</td><td>��Ӧ</td><td>�е�</td><td>����</td></tr>
<tr><td>��¼����</td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td></tr>
<tr><td>��������</td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td><td><img src="../images/loading2.gif"></td></tr>
</table></span>
<br/>
<table border="1" width="100%" bordercolordark="#FFFFFF" cellspacing="0" cellpadding="0" bordercolorlight="#BBD7E6"><tr bgcolor=#D8F0FC><td colspan="4">��ַ<a href="<?php echo "http://www.".$domain?>"><?php echo "http://www.".$domain?></a>META��Ϣ���������:</td></tr>
<tr><td width="20%">��ǩ</td><td width="10%">���ݳ���</td><td width="50%">����</td><td width="20%">�Ż�����</td></tr>
<tr><td>���⣨Title��</td><td><?php echo $tt;?>���ַ�</td><td>&nbsp;<?php echo $title;?></td><td>һ�㲻����80���ַ�</td></tr>
<tr><td>�ؼ��ʣ�KeyWords��</td><td><?php echo $k;?>���ַ�</td><td>&nbsp;<?php echo $keywords;?></td><td>һ�㲻����100���ַ�</td></tr>
<tr><td>������Description��</td><td><?php echo $d;?>���ַ�</td><td>&nbsp;<?php echo $description;?></td><td>һ�㲻����200���ַ�</td></tr>
</table>
<?php echo $keyss;?>
<br/>
<table border="1" width="100%" bordercolordark="#FFFFFF" cellspacing="0" cellpadding="0" bordercolorlight="#BBD7E6">
<tr bgcolor=#D8F0FC><td>����֩�롢������ģ��</td></tr>
<tr><td><?php echo $body; ?> &nbsp; <a href="../esearch.php?domain=<?php echo $domain;?>" target="_blank">����鿴ȫ��</a></td></tr>
</table>
</div>
</div>
<div id="b_14">
<h1>�����ѯ��</h1>
<div class="box1">
<span class="info2"> 
<table>
<tr><td align="left" style= "word-wrap:break-word;word-break:break-all">
<?php
@require_once('../cache/seo.php');
if($urls){
foreach ($urls as $key=>$v){
	echo "<a href=http://www.seoued.net/tool/seo/alls.php?domain=".$urls[$key].">".$urls[$key]."</a>&nbsp;&nbsp;";
}}?></td></tr>
</table>
</span>
</div>
<div class="box">
  <div id="b_14">
    <h1>���߼��</h1>
    <div class="box1">
        <span class="info2">SEO�ۺϲ�ѯ</span>
    </div>
  </div>
</div>
<?php @require_once('../foot.php');?>