<?php
define('IN_SEO', TRUE);
$hu = 'keys';
header("Content-Type:text/html;charset=gb2312");
require 'function.php';
$domain = $_POST['domain']?$_POST['domain']:$_GET['domain'];
$keys   = $_POST['keys']?$_POST['keys']:$_GET['keys'];
$val    = $_POST['val']?$_POST['val']:$_GET['val'];
$pn     = intval($_GET['pn']);
$rn     = intval($_POST['rn']?$_POST['rn']:$_GET['rn']);
!$val && $val=1;
!$rn  && $rn=10;
$keysa  = explode(" ",$keys);
$output = '';
$ara    = array();
for($k=0;$k<sizeof($keysa);$k++){
	if(!preg_match('/(\w).*/',$keysa[$k],$arrk)){
		$output   = '';
		$tab_text = str_split($keysa[$k]);
		foreach ($tab_text as $id=>$char){
		  $hex    = dechex(ord($char));
		  $output.= '%' . $hex;
	    }
	}else{
		$output = $keysa[$k];
	}
	array_push($ara,$output);
}
$output = implode("+",$ara);
if($val == 1){  
  $ROBOT['baidu']['site_url'] = 'http://www.baidu.com/s?wd='.$output."&rn=".$rn."&pn=".$pn;
  $job = "baidu";
}else{ 
  $ROBOT['google']['site_url'] = 'http://www.google.com/search?hl=zh-CN&q='.$output."&num=".$rn."&start=".$pn;
  $job = "google";
}
$domain = strtolower($domain);
if($domain){
	is_domain($domain) or exit( "<script language=javascript>alert('��������ȷ��������');location.href='keys.php';</script>");
	$result = get_seo_info($domain,$job,$pn,$keys,$val,$output,$rn);
	!empty($result) or exit('Invalid Request');
}
@require_once('../header.php');
if($domain){
	@require_once('../cache.php');
	if(file_exists("../cache/keys.php")){
		@require_once("../cache/keys.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("../cache/keys.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
?>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>�ؼ���������ѯ</h1>
      <div class="box1" style="text-align:center;"> 
      <form method="POST" action="">
          <span class="info3" ><select name="val" id="val" style="width:60px; height:26px;"> 
         <option value="1"<?php if($val==1){echo "selected";}?>>Baidu</option> 
         <option value="2"<?php if($val==2){echo "selected";}?>>Google</option>
         </select>&nbsp;&nbsp;������ؼ��ʣ�<input type="text" id="keys" name="keys" value="<?php echo $keys;?>" size="20" class="input"><input type="hidden" name="pn" id="pn" value="<?php echo $pn;?>">&nbsp;&nbsp;������������
            <font color="green"><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="20" url="true" value="<?php echo $domain?>"/>
            <select name="rn" style="width:110px; height:26px;">
            <option value=10 <?php if($rn==10){echo "selected";}?>>ÿҳ��ʾ10��</option>
            <option value=20 <?php if($rn==20){echo "selected";}?>>ÿҳ��ʾ20��</option>
            <option value=50 <?php if($rn==50){echo "selected";}?>>ÿҳ��ʾ50��</option>
            <option value=100 <?php if($rn==100){echo "selected";}?>>ÿҳ��ʾ100��</option>
            </select>
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub"/>
          </span></form>
          <div style="width:100%">
              <div id="detail" class="info1">
<div id="result" class="div_whois">
	<div class="t" id="seo_result"><?php echo $result;?>
	</div>
</div> <div id="more" class="div_whois">
               ��ز�ѯ:
                 <a href="http://www.seoued.net/tool/alexa">Alexa��ѯ</a> 
<a href="http://whois.chinaccnet.com">whois��ѯ</a> 
<a href="http://ip.chinaccnet.com">����/IP��ѯ</a>
            </div>
              </div>
              <div style="float:right; width:40%; text-align:right; padding-top:9px;">
              </div>
          </div>
      </div>
    </div>
  </div><div id="b_14">
<h1>�����ѯ��</h1>
<div class="box1">
<span class="info2"> 
<table>
<tr><td align="left" style= "word-wrap:break-word;word-break:break-all">
<?php
@require_once('../cache/keys.php');
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
             <p>ͨ���ؼ���������ѯ�����Կ��ٵõ���ǰ��վ�Ĺؼ�����Baidu/Google��¼�����������</p>
            <p>��Щ�ؼ����ڸ��ص������ǲ�һ���ģ�����ͨ��˵�Ĺؼ��ֵ������������磺���š��˲ŵȺܶࡣ���Բ��ṩ����ص�ķ������ṩ��Ҳ�ѯ</p>
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>