<?php
define('IN_SEO', TRUE);
header("Content-Type:text/html;charset=gb2312");
require 'function.php';
error_reporting(E_ERROR);
set_time_limit(0);
isset($_SERVER['HTTP_REFERER']) or exit('Invalid Request');
preg_match("/".$_SERVER['HTTP_HOST']."/i", $_SERVER['HTTP_REFERER']) or exit('Access Denied');
$ROBOT['site_url']     = 'http://www.google.com/search?hl=zh-CN&q=site%3A';
$ROBOT['site_pattern'] = "/���(.*) �����/";
@extract($_POST);
$domain = $domain?$domain:'chinaccnet.com';
$domain = strtolower($domain);
is_domain($domain) or exit('��������ȷ��������');
if($domain){
	@require_once('../cache.php');
	if(file_exists("../cache/google.php")){
		@require_once("../cache/google.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("../cache/google.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
$result = get_seo_info($domain,$selects,$start);
echo $result;
?>