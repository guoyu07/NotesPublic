<?php
header("Content-Type:text/html;charset=GB2312");
error_reporting(7);
set_time_limit(300);
$hu = 'dels';
$domain = trim($_POST['domain']?$_POST['domain']:$_GET['domain']);
$domain = strtolower($domain);
if(substr($domain,0,7) == "http://") {
	$domain = str_replace("http://","",$domain);
}
if(substr($domain,0,4) == "www.") {
	$domain = str_replace("www.","",$domain);
}
if($_POST['btnS']){
	preg_match("/<div class=\"lyTableInfoWrap\">(.+?)<\/div>/is", @file_get_contents('http://www.xinnet.cn/Modules/agent/serv/pages/domain_whois.jsp?domainNameWhois='.$domain.'&noCode=noCode'), $whois); 
	$result1 = $whois[0];
	$pat  = "/Status:\s+?(.*)<br\/>/Usi";
	$pat1 = "/Creation Date:\s+?(.*)<br\/>/Usi";
	$pat11 = "/Registration Date:\s+?(.*)<br\/>/Usi";
	$pat2 = "/Expiration Date:\s+?(.*)<br\/>/Usi";
	preg_match_all($pat, $result1, $array);
	preg_match_all($pat1, $result1, $array1);
	preg_match_all($pat11, $result1, $array11);	
	preg_match_all($pat2, $result1, $array2);
	$result  = $array[0][0];
	$result1 = $array1[0][0]?$array1[0][0]:$array11[0][0];
	$result2 = $array2[0][0];
	$results = $result.$result1.$result2;
	$result  = str_replace("Status","����״̬",$result);
	$results = str_replace("-jan","-1",$results);
	$results = str_replace("-feb","-2",$results);
	$results = str_replace("-mar","-3",$results);
	$results = str_replace("-apr","-4",$results);
	$results = str_replace("-may","-5",$results);
	$results = str_replace("-jun","-6",$results);
	$results = str_replace("-jul","-7",$results);
	$results = str_replace("-aug","-8",$results);
	$results = str_replace("-sep","-9",$results);
	$results = str_replace("-oct","-10",$results);
	$results = str_replace("-nov","-11",$results);
	$results = str_replace("-dec","-12",$results);	
	$b  = "/\d{1,2}-\d{1,2}-\d{4}/";
	$b1 = "/\d{4}-\d{1,2}-\d{1,2}/";
	preg_match_all($b,$results,$arrays);
	preg_match_all($b1,$results,$arrays1);
	$arrays00 = $arrays[0][0]?$arrays[0][0]:$arrays1[0][0];
	$creates = strtotime($arrays00);
	$create  = date('Y-m-d',$creates);
	$arrays01 =$arrays[0][1]?$arrays[0][1]:$arrays1[0][1];
	$overs   = strtotime($arrays01);
	$over    = date('Y-m-d',$overs);
	$nows    = time();
	$exits   = $nows - $creates;
	$starts  = strtotime('1970-7-1');
	$dels    = date('Y-m-d',$overs+(65*3600*100-$starts));
	$dels2   = strtotime($dels) -$nows;
	$day     = floor($dels2/3600/24);
	$dels2   = $dels2-$day*3600*24;
	$hour    = floor($dels2/3600);
	$dels2   = $dels2-$hour*3600;
	$minute  = floor($dels2/60);
	$second1 = $dels2-$minute*60;
	$dels22  = $day."��".$hour."Сʱ".$minute."��".$second1."��";
	$eyear   = floor($exits/3600/24/365);
	$exits   = $exits-$eyear*365*24*3600;
	$emonth  = floor($exits/3600/24/30);
	$exits   = $exits-$emonth*30*24*3600;
	$eday    = floor($exits/3600/24);
	$edels22 = $eyear."��".$emonth."��".$eday."��";
	if($create == '1970-01-01'){
		$result = '<font color=red><b>���ӷ�����ʧ�ܣ����������Ƿ���ȷ��</b></font>';
	}else{	
	$result  = $result."�������䣺".$edels22."<br/>��������ʱ�� :".$create.'<br/>��������ʱ�� :'.$over."<br/>����ɾ��ʱ�䣺".$dels."<br/>����ɾ������ʱ:".$dels22;
	}
}
@require_once('../header.php');
if($domain){
	@require_once('../cache.php');
	if(file_exists("../cache/dels.php")){
		@require_once("../cache/dels.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("../cache/dels.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
?>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>����ɾ����ѯ</h1>
      <div class="box1" style="text-align:center;">
      <form action="" method="POST">
          <span class="info3" > ������Ҫ��ѯ��������
            <font color="green"><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $domain;?>"/>
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub">
          </span>
          </form>
           <div id="more" class="div_whois">
               ��ز�ѯ:
<a href="/tool/dels/dels.php?domain=seoued.net">����ɾ��ʱ��</a>
<a href="/tool/ip/?domain=seoued.net">IP��ѯ</a>
<a href="/tool/whois/?domain=seoued.net">WHOIS��ѯ</a>
            </div>
          <div style="width:100%">
              <div id="detail" class="info1">
<div id="result" class="div_whois">
<?php echo $result;?>
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
@require_once('../cache/dels.php');
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
.com .net .org�ȹ�������ɾ��ʱ�䣬ͨ�����������ں�ĵ�65��75�죬�賿2��30���һ�ɾ��<br />
����������ɾ��ʱ�䣬ͨ�����������ں�ĵ�15��16�죬�賿4��30��ɾ��<br />
������ʾ������ɾ��ʱ������ο���лл��<br />
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>