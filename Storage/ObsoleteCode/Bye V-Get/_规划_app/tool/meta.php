<?php
$hu = 'meta';
eval('$__file__=__FILE__;');
define('ROOT_PATH',$__file__ ? dirname($__file__).'/' : './');
require('global.php');
$domain =  $_POST['domain']? $_POST['domain']:$_GET['domain'];
if($domain){
	is_domain($domain) or exit( "<script language=javascript>alert('��������ȷ��������');location.href='meta.php';</script>");
	$url      = 'http://'.trim($domain);
	$content  = @file_get_contents($url);
	$charset  = "/charset=(.*)/";
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
	$t     = $title?mb_strlen($title,'gbk'):'0';
	$pat2  = "/meta content=\"(.+)\" name=\"keywords\"/Ui";
	$pat4  = "/meta name=\"keywords\" content=\"(.+)\"/Ui";
	preg_match_all($pat2, $content, $array2);
	preg_match_all($pat4, $content, $array4);	
	$keywords = $array2[1][0]?$array2[1][0]:$array4[1][0];
	$k        = $keywords?mb_strlen($keywords,'gbk'):'0';
	$pat3     = "/<meta content=\"(.+)\" name=\"description\"/Usi";
	$pat5     = "/<meta name=\"description\" content=\"(.+)\"/Usi";
	preg_match_all($pat3, $content, $array3);
	preg_match_all($pat5, $content, $array5);
	$description = $array3[1][0]?$array3[1][0]:$array5[1][0];
	$d = $description?mb_strlen($description,'gbk'):'0';	
	@require_once('cache.php');
	if(file_exists("cache/meta.php")){
		@require_once("cache/meta.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("cache/meta.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
@require_once('header.php');
?>
<script language="javascript">
window.onload = function dis(){
	if(document.getElementById('domain').value != ''){
		document.getElementById('metaresult').style.display = "";
	}
}
</script>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>META��Ϣ���</h1>
      <div class="box1" style="text-align:center;"> 
	  <form action="" method="post"><br />
          <span class="" > ������Ҫ��ѯ��������
            <font color="green"><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $domain;?>"/>
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub" />
          </span>
	  </form><br />
<div id="metaresult" style="display:none">
		  <table border="0" cellspacing="1" cellpadding="1" width="100%" class="tbox">
<tr><td width="20%">��ǩ</td><td width="15%">���ݳ���</td><td width="45%">����</td><td width="20%">�Ż�����</td></tr>
<tr><td>���⣨Title��</td><td><?php echo $t;?>���ַ�</td><td>&nbsp;<?php echo $title;?></td><td>һ�㲻����80���ַ�</td></tr>
<tr><td>�ؼ��ʣ�KeyWords��</td><td><?php echo $k;?>���ַ�</td><td>&nbsp;<?php echo $keywords;?></td><td>һ�㲻����100���ַ�</td></tr>
<tr><td>������Description��</td><td><?php echo $d;?>���ַ�</td><td>&nbsp;<?php echo $description;?></td><td>һ�㲻����200���ַ�</td></tr>
</table><br />
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
@require_once('cache/meta.php');
if($urls){
foreach ($urls as $key=>$v){
	echo "<a href=http://".$urls[$key]." target=_blank>".$urls[$key]."</a>&nbsp;&nbsp;";
}}?></td></tr>
</table>
</span>
</div>
    <div class="box">
      <div id="b_14">
        <h1>���߼��</h1>
        <div class="box1">
            <span class="info2">
               ͨ�������߿��Կ��ټ����ҳ��META��ǩ���������⡢�ؼ��ʡ��������Ƿ�����������������¼
            </span>
        </div>
 </div>
</div>
<?php @require_once('foot.php');?>