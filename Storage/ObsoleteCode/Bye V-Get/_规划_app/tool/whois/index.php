<?php
header("Content-Type:text/html;charset=GB2312");
$domain = trim($_POST['domain']);
$domain = strtolower($domain);
if(!$domain && $_GET['domain']){
	$domain = strtolower(trim($_GET['domain']));
}
$domain = $domain?$domain:'seoued.net';
if($domain){
	@require_once('../cache.php');
	if(file_exists("../cache/whoischace.php")){
		@require_once("../cache/whoischace.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("../cache/whoischace.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
if(substr($domain,0,7) == "http://") {
	$domain = str_replace("http://","",$domain);
}
if(substr($domain,0,4) == "www.") {
	$domain = str_replace("www.","",$domain);
}
if($domain){
	preg_match("/<div class=\"lyTableInfoWrap\">(.+?)<\/div>/is", @file_get_contents('http://www.xinnet.cn/Modules/agent/serv/pages/domain_whois.jsp?domainNameWhois='.$domain.'&noCode=noCode'), $whois);
	$result = $whois[0];
	$result = str_replace("Billing Contact","������ϵ",$result);
	$result = str_replace("Technical Contact","������ϵ",$result);
	$result = str_replace("Administrative Contact","��������ϵ",$result);
	$result = str_replace("Expiration Date","����ʱ��",$result);
	$result = str_replace("Updated Date","����ʱ��",$result);
	$result = str_replace("Creation Date","����ʱ��",$result);
	$result = str_replace("Status","״̬",$result);
	$result = str_replace("Name Server","DNS������",$result);
	$result = str_replace("Referral URL","�����վ",$result);
	$result = str_replace("Registrar:","ע����:",$result);
	$result = str_replace("Whois Server:","����������:",$result);
	$result = str_replace("no data found!"," ",$result);
	$result = str_replace("-jan","-1��",$result);
	$result = str_replace("-feb","-2��",$result);
	$result = str_replace("-mar","-3��",$result);
	$result = str_replace("-apr","-4��",$result);
	$result = str_replace("-may","-5��",$result);
	$result = str_replace("-jun","-6��",$result);
	$result = str_replace("-jul","-7��",$result);
	$result = str_replace("-aug","-8��",$result);
	$result = str_replace("-sep","-9��",$result);
	$result = str_replace("-oct","-10��",$result);
	$result = str_replace("-nov","-11��",$result);
	$result = str_replace("-dec","-12��",$result);
	$resul2 = "���ʴ���վ��<a href=http://".$domain.">http://".$domain."</a><br/>".$result;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title><?php echo $domain;?>��Whois��Ϣ-վ����ѯ���ߣ�seo�� - ƻ����˺Ƥ������ www.seoued.net</title>
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
  <div class="menu"><a href="http://www.seoued.net/">������ҳ</a> <a href="http://www.seoued.net/tool/" class="select">վ������</a> 
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
    <li><a href="www.seoued.net/tool/alexa" target="_blank">ALEXA������ѯ</a></li>
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
<div class="main">
  <div class="box">
    <div id="c">
      <h1><a href="http://www.seoued.net/tool/whois/">����Whois��ѯ����</a></h1>
      <div class="box1" style="text-align:center;"> 
      <form action="" method="POST">
          <span class="info3" > ������Ҫ��ѯ��������
            <font color="green"><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $domain?>" onkeydown="if(event.keyCode==13)startRequest();"/>
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub"/>
          </span></form>
           <div id="more" class="div_whois">
               ��ز�ѯ:
<a href="/tool/dels/dels.php?domain=seoued.net">����ɾ��ʱ��</a>
<a href="/tool/ip/?domain=seoued.net">IP��ѯ</a>
<a href="/tool/whois/?domain=seoued.net">WHOIS��ѯ</a>
            </div>
          <div style="width:100%">
              <div id="detail" class="info1">
<div id="result" class="div_whois">
<?php echo $resul2;?>
</div>
              </div>
              <div style="float:right; width:40%; text-align:right; padding-top:9px;">
              </div>
          </div>
      </div>
    </div>
  </div>
<div id="b_14">
<h1>�����ѯ��</h1>
<div class="box1">
<span class="info2"> 
<table>
<tr><td align="left" style= "word-wrap:break-word;word-break:break-all">
<?php
@require_once('../cache/whoischace.php');
if($urls){
foreach ($urls as $key=>$v){
	echo "<a href=http://www.seoued.net/tool/whois/index.php?domain=".$urls[$key].">".$urls[$key]."</a>&nbsp;&nbsp;";
}}?></td></tr>
</table>
</span>
</div>
    <div class="box">
      <div id="b_14">
        <h1>���߼��</h1>
        <div class="box1">
            <span class="info2">
               <p>Whois ����˵������һ��������ѯ�����Ƿ��Ѿ���ע�ᣬ�Լ�ע����������ϸ��Ϣ�����ݿ⣨�����������ˡ�����ע���̡�����ע�����ں͹������ڵȣ���ͨ������Whois��ѯ�����Բ�ѯ������������ϵ��ʽ���Լ�ע��͵���ʱ��,������ <b style="color:Red;">http://www.seoued.net/tool/whois/</b> ���ʣ�</p>
            
            <p><b>������������ɾ������ʵʩ�Ľ��ͣ�</b></p>
            <p>����������</p>
            <p>(1) ���ڵ�����ͣ�����������72Сʱδ���ѣ����޸�����DNSָ����ҳ�棨ͣ�ţ���38���ڣ������Զ����ѡ����Ѻ�ϵͳ�Զ�
�ָ�ԭ����DNS��ˢ��ʱ������24��48Сʱ��</p>
            <p>&nbsp;(2) 39-70�죬������������ڣ�Redemption�������ڼ������޷��������ֹ���أ�
            </p>
            <p>(3) 75�죬����������ɾ������������ע�ᡣ</p>
            <p>����������</p>
            <p>(1) ���ڵ�����ͣ�����������72Сʱδ���ѣ����޸�����DNSָ��
      ���ҳ�棨ͣ�ţ���35���ڣ������Զ����ѡ�
            </p>
            <p>(2) ���ں�36��48�죬������13��ĸ߼�����ڣ����ڼ������޷���
     ����ؼ۸�����1500Ԫ/����Ӣ��500Ԫ/����
            </p>
            <p>(3) ���ں�48�����δ���ѵģ���������ʱ��ɾ���� 
            </p>
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>