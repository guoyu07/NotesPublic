<?php
eval('$__file__=__FILE__;');
define('ROOT_PATH',$__file__ ? dirname($__file__).'/' : './');
header("Content-Type:text/html;charset=gb2312");
require_once('../global.php');
$domain = strtolower($_POST['domain']);
$val    = $_POST['val'];
is_domain($domain) or exit('��������ȷ��������');
if($domain){
	@require_once('../cache.php');
	if(file_exists("../cache/webs.php")){
		@require_once("../cache/webs.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("../cache/webs.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
$url     = 'http://'.trim($domain);
$pat1    = "/<a(.*?)<\/a>/i";
$code    = @file_get_contents($url);
$charset = "/charset=(.*)/";
preg_match($charset,$code,$charsetarr);
$charset2 = strtolower(substr($charsetarr[1],0,2));
if($charset2 != 'gb'){
	require_once('require/chinese.php');
	$chs  = new Chinese('utf-8','GB2312');
	$code = $chs->Convert($code);
}
preg_match_all($pat1, $code, $array);
$urlsname = $ulink = $name = $outs = array();
$urlsname = $array[0];
if($val == '2'){
	for($i=0;$i<sizeof($urlsname);$i++){
		$pq = '/ href=["\']?([^>"\' ]+)["\']?\s*[^>]*>(.*)<\/a>/si';
		preg_match($pq,$urlsname[$i],$b);
		if($b[2] && strpos($b[1],'javascript') === false){
			if(strpos($b[2],'img') !== false){
				$b[2] = 'ͼƬ����';
			}
			if(strpos($b[1],'http') === false){
				$b[1] = $url.'/'.$b[1];
			}
			if(strpos($b[1],"http://".$domain) !== false ){
				array_push($outs,$b[1]);
				array_push($ulink,$b[1]);
				array_push($name,$b[2]);
			}
		}
	}
	$counts  = sizeof($outs);
	$outslen = '0';
	$inslen  = sizeof($outs);
}elseif($val == '3'){
	for($i=0;$i<sizeof($urlsname);$i++){
		$pq = '/ href=["\']?([^>"\' ]+)["\']?\s*[^>]*>(.*)<\/a>/si';
		preg_match($pq,$urlsname[$i],$b);
		if($b[2] && strpos($b[1],'javascript') === false){
			if(strpos($b[2],'img') !== false){
				$b[2] = 'ͼƬ����';
			}
			if(strpos($b[1],'http') === false){
				$b[1] = $url.'/'.$b[1];
			}
			if(strpos($b[1],"http://".$domain) === false ){
				array_push($outs,$b[1]);
				array_push($ulink,$b[1]);
				array_push($name,$b[2]);
			}
		}
	}
	$counts  = sizeof($outs);
	$outslen = sizeof($outs);
	$inslen  = '0';
}else{
	for($i=0;$i<sizeof($urlsname);$i++){
		$pq = '/ href=["\']?([^>"\' ]+)["\']?\s*[^>]*>(.*)<\/a>/si';
		preg_match($pq,$urlsname[$i],$b);
		if($b[2] && strpos($b[1],'javascript') === false){
			if(strpos($b[2],'img') !== false){
				$b[2] = 'ͼƬ����';
			}
			if(strpos($b[1],'http') === false){
				$b[1] = $url.'/'.$b[1];
			}
			if(strpos($b[1],"http://".$domain) === false ){
				array_push($outs,$b[1]);
			}
			array_push($ulink,$b[1]);
			array_push($name,$b[2]);
		}
	}
	$counts  = sizeof($ulink);
	$outslen = sizeof($outs);
	$inslen  = $counts - $outslen;
}
$t = "����Ѱ���ӣ�".$counts." ��,վ�����ӣ�".$inslen."  ��,��վ���ӣ�".$outslen."  ��<span id=testlinkstatus> <input class=but type=button value=��ʼ���� onclick=javascript:ceshi(0); /></span>";
?>
<table border="1" width="100%" bordercolordark="#FFFFFF" cellspacing="0" cellpadding="0" bordercolorlight="#BBD7E6">
<tr><td colspan="2"><?php echo $t;?></td></tr>
<?php
for($j=0;$j<$counts;$j++){
?>
<tr align="left"><td><?php echo $j+1;?></td><td>[<?php echo $name[$j];?>]&nbsp;<a href="<?php echo $ulink[$j];?>" target="_blank"><span name="weblinks" id="link<?php echo $j+1;?>"><?php echo $ulink[$j];?></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="test<?php echo $j+1;?>" style="display:none"></span></td></tr>
<?php
}
?><input type="hidden" value="<?php echo $counts;?>" id="counts">
</table>