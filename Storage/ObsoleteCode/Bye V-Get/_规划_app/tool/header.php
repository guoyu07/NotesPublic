<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<?php
 if($hu == 'js'){
 	$uu = 'JS����/���� - ';
 }elseif($hu == 'utf'){
 	$uu = 'UTF-8����ת������ - ';
 }elseif($hu == 'unicode'){
 	$uu = 'Unicode����ת������ - ';
 }elseif($hu == 'sharelink'){
 	$uu = '�������� - ';
 }elseif($hu == 'meta'){
 	$uu = 'META��Ϣ��� - ';
 }elseif($hu == 'mds'){
 	$uu = 'MD5���ܹ��� - ';
 }elseif($hu == 'ids'){
 	$uu = '���֤����ֵ��ѯ - ';
 }elseif($hu == 'htmlubb'){
 	$uu = 'HTML/UBB����ת������ - ';
 }elseif($hu == 'htmljs'){
 	$uu = 'HTML/JS��ת - ';
 }elseif($hu == 'eseach'){
 	$uu = '����֩�롢������ģ�⹤�� - ';
 }elseif($hu == 'density'){
 	$uu = '�ؼ����ܶȼ�� - ';
 }elseif($hu == 'countryym'){
 	$uu = '���������鿴 - ';
 }elseif($hu == 'yb'){
 	$uu = '�ʱ����Ų�ѯ - ';
 }elseif($hu == 'whois'){
 	$uu = '����Whois��ѯ���� - ';
 }elseif($hu == 'webs'){
 	$uu = '�����Ӽ��/ȫվPR��ѯ - ';
 }elseif($hu == 'ssyqsl'){
 	$uu = '����������¼��ѯ - ';
 }elseif($hu == 'ssyqfl'){
 	$uu = '�������淴������ - ';
 }elseif($hu == 'shouji'){
 	$uu = '��ѯ�ֻ���������� - ';
 }elseif($hu == 'seo'){
 	$uu = 'SEO�ۺϲ�ѯ - ';
 }elseif($hu == 'pr'){
 	$uu = 'PRֵ��ѯ - ';
 }elseif($hu == 'keys'){
 	$uu = '�ؼ���������ѯ - ';
 }elseif($hu == 'ip'){
 	$uu = 'IP��ѯ - ';
 }elseif($hu == 'google'){
 	$uu = 'Google��¼��ѯ - ';
 }elseif($hu == 'friends'){
 	$uu = '�������Ӳ�ѯ���� - ';
 }elseif($hu == 'friendlink'){
 	$uu = '��������IP��ѯ���� - ';
 }elseif($hu == 'dels'){
 	$uu = '����ɾ����ѯ - ';
 }elseif($hu == 'baidu'){
 	$uu = '�ٶ���¼��ѯ - ';
 }elseif($hu == 'outpr'){
 	$uu = 'PR���ֵ��ѯ - ';
 }elseif($hu == 'yuan'){
 	$uu = '�鿴��ҳԴ���� - ';
 }elseif($hu == 'unix'){
 	$uu = 'Unixʱ���(Unix timestamp)ת������ - ';
 }
?>
<title><?php echo $uu;?>վ����ѯ���ߣ�seo�� - ƻ����˺Ƥ������</title>
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
    <a href="http://www.seoued.net/daohang/" target="_blank"><b>��ַ��ȫ</b></a> |
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
  <div class="menu"><a href="/">������ҳ</a> <a href="/tool" class="select">վ������</a> 
   <a onmouseover="mouseover(this, 3)" onmouseout="mouseout()" style="cursor:pointer;">��վ��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 4)" onmouseout="mouseout()" style="cursor:pointer;">SEO��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 5)" onmouseout="mouseout()" style="cursor:pointer;">����/IP���ѯ</a> 
   <a onmouseover="mouseover(this, 6)" onmouseout="mouseout()" style="cursor:pointer;">����ת������</a> 
   <a onmouseover="mouseover(this, 7)" onmouseout="mouseout()" style="cursor:pointer;">��������</a>
	<a href="http://www.seoued.net/t/" target="_blank">΢����</a>
<a href="http://www.seoued.net/daohang/" target="_blank"><font color="red">��ַ����</font></a>
  </div>
  <!--sub menu-->
  <div id="menu3" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="/tool/alexa" target="_blank">ALEXA������ѯ</a></li>
    <li><a href="/tool/webs/webs.php" target="_blank">վ�����ӷ���</a></li>
    <li><a href="/tool/density.php">�ؼ����ܶȼ��</a></li>
    <li><a href="/tool/meta.php">META��Ϣ���</a></li>
    <li><a href="/tool/pr/outpr.php">PR���ֵ��ѯ</a></li>
    <li><a href="/tool/yuan.php">�鿴��ҳԴ����</a></li>
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
   