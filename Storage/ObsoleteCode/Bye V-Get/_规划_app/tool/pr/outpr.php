<?php
define('IN_SEO','IN_SEO');
$hu = 'outpr';
@include_once('../global.php');
$outs   = $ali = array();
$domain = $_POST['domain']?$_POST['domain']:$_GET['domain'];
if($domain){
	is_domain($domain) or exit( "<script language=javascript>alert('��������ȷ��������');location.href='outpr.php';</script>");
	@require_once('../cache.php');
	if(file_exists("../cache/cache.php")){
		@require_once("../cache/cache.php");
        $urls = filehave($urls,$url);
	}else{
		$urls = fileno($url);
	}
	writeover("../cache/cache.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
@require_once('prfunction.php');
$result = '&nbsp;&nbsp<img src="../images/pagerank'.GetPR($domain).'.gif" align="absmiddle" /> ';
$code   = @file_get_contents( 'http://'.$domain);
$pat1   = "/<a(.*?)<\/a>/i";
preg_match_all($pat1, $code, $array);
$urlsname = $array[0];
$pq = '/ href=["\']?([^>"\' ]+)["\']?\s*[^>]*>(.*)<\/a>/si';
for($i=0;$i<sizeof($urlsname);$i++){
	preg_match($pq,$urlsname[$i],$b);
	if($b[2] && strpos($b[1],'javascript') === false){
		if(strpos($b[1],'http') === false){
			$b[1] =  'http://'.$domain.'/'.$b[1];
		}
		if(strpos($b[1],"http://www.".$domain) === false && strpos($b[1],"http://".$domain) === false){
			array_push($outs,$b[1]);
		}
	}
}
$per = "/http:\/\/(.*)/";
for($j=0;$j<sizeof($outs);$j++){
	preg_match_all($per,$outs[$j],$arr);
	$arr10 = explode('/',$arr[1][0]);
	array_push($ali,$arr10[0]);
}
$ali = array_unique($ali);
@require_once('../header.php');
if($domain){
	@require_once('../cache.php');
	if(file_exists("../cache/outpr.php")){
		@require_once("../cache/outpr.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("../cache/outpr.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
?>
<div class="main"> 
<style type="text/css"> 
#contenthtml{ margin:2px;}
#contenthtml ul{ border:1px solid #669BCC;  height:122px;width:120px; float:left; margin-left:-1px; overflow:hidden; }
#contenthtml ul li{ border-bottom:1px solid #669BCC; line-height:30px; height:30px; overflow:hidden; list-style:none;}
#contenthtml ul li img{ padding-top:0px !important;padding-top:7px; }
#contenthtml .head{ background-color:#D4E6F7; }
</style>
<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJMzA5OTkyODkyZGQ=" />
</div>
 <script language="javascript">
window.onload=function dis(){
  if(document.getElementById("domain").value !=""){
    document.getElementById("diss").style.display="";
  }
}
document.getElementById("domain").focus();
document.getElementById("domain").select();
function exec() {
    var pr = document.getElementById("pr").value;
    var linkcount = document.getElementById("linkcount").value;
    var val = (1 - 0.85) + 0.85 * (parseFloat(pr) / parseFloat(linkcount));
    alert(val);
}
</script>
<div class="box">
   <div id="b_1">
     <h1><div class="titleft"><a href="#">PR���ֵ��ѯ</a></div></h1>
     <div class="box1"  style="text-align:center;">
     <form action="" method="POST">
        <div class="info3">������Ҫ��ѯ��������
            <font color="green"><b>HTTP://</b></font><input name="domain" id="domain" type="text" url="true" class="input" value="<?php echo $domain;?>" size="50"/>
            <input type="submit" class="but" value="�� ѯ"/></form> <br />�ֶ���ѯ�� ��������<input type="text" isget="false" id="linkcount"  style="width:50px;"/> PRֵ��<input isget="false" type="text" style="width:25px;" maxlength=2 id="pr" /> <input type="button" isget="false" onclick="exec()" class="but" style="height:25px;" value=" ���� " />
        </div>
        <table border=0 cellpadding=0 cellspacing=0 align="center" style="margin-bottom:10px;">
         <tr>
           <td>
				<div id="contenthtml">
					<div id="diss" style="display:none">
						<ul>
						    <li class="head">����</li><li>PRֵ</li><li>�ⲿ������</li><li>PR���ֵ</li>
						</ul>
						<ul>
							<li class='head'><?php echo $domain;?></li>
							<li><?php echo $result;?></li>
							<li><?php echo sizeof($ali);?></li>
							<li><?php echo round(((1 - 0.85) + 0.85 * ($c / sizeof($ali))),2);?></li>
						</ul>
					</div>
			</div>
		  </td>
		 </tr>
		</table>
		<div style="clear:both"></div>
        </div>
    </div>
</div> 
<br/>
<div id="b_14">
<h1>�����ѯ��</h1>
<div class="box1">
<span class="info2"> 
<table>
<tr><td align="left" style= "word-wrap:break-word;word-break:break-all">
<?php
@require_once('../cache/outpr.php');
if($urls){
foreach ($urls as $key=>$v){
	echo "<a href=http://".$urls[$key]." target=_blank>".$urls[$key]."</a>&nbsp;&nbsp;";
}}?></td></tr>
</table>
</span>
</div>
<input type="hidden" name="q" id="q" />
<div class="box">
<div id="b_14">
<h1>���߼��</h1>
<div class="box1">
<span class="info2"> 
<p >��ѯ��վ��PR���ֵ,PR���ֵ�������������ӵ�PRֵ�����㹫ʽ��(1 - 0.85) + 0.85 * (PRֵ / ������)</p>
</span>
</div>
</div>
<?php @require_once('../foot.php');?>