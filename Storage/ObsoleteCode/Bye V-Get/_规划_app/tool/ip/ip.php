<?php
$QQWry = new QQWry;
function get_real_ip(){
	$ip=false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
		for ($i = 0; $i < count($ips); $i++) {
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return $ip;
}
function is_ip($str) {
	$ip = explode(".", $str);
	if (count($ip)<4 || count($ip)>4) return 0;
	foreach($ip as $ip_addr) {
		if ( !is_numeric($ip_addr) ) return 0;
		if ( $ip_addr<0 || $ip_addr>255 ) return 0;
	}
	return 1;
}
$ip=$inip=$_POST['ip']?$_POST['ip']:$_GET['domain'];
preg_match('/((\w|-)+\.)+[a-z]{2,4}/i',$ip) ? $ip=gethostbyname($ip) : $ip;
if(is_ip($ip)){
	$ifErr=$QQWry->QQWry($ip);
	$ipp1 = $ip;
	$ipp2 = $QQWry->Country.$QQWry->Local;
}else
{
	$ipp2 = "��������ȷ��IP������.";
}
$gip=get_real_ip();
if (($_SERVER["HTTP_CLIENT_IP"]) or ($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ifErr=$QQWry->QQWry($gip);
	$ipp = "������ʵIP��".$gip."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����".$QQWry->Country.$QQWry->Local."<br/>";
	$gip=$_SERVER['REMOTE_ADDR'];
	$ifErr=$QQWry->QQWry($gip);
	$ipp = "���Ĵ���IP��".$gip."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����".$QQWry->Country.$QQWry->Local;
}
else{
	$ip=$_SERVER['REMOTE_ADDR'];
	$ifErr=$QQWry->QQWry($ip);
	$ips = "����IP�ǣ�".$ip."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ԣ�".$QQWry->Country.$QQWry->Local;
}
?>