<?php
header("content-Type: text/html; charset=GB2312");
define('IN_SEO','IN_SEO');
include_once('../global.php');
$action = $_GET['action'];
$lurl   = $_GET['lurl'];
$haves  = "http://www.baidu.com/s?wd=%22".$lurl."%22";
$cnt=0;
while($cnt < 10 && ($havesa=@file_get_contents($haves))===FALSE){$cnt++;}
$pp = "/�ҵ������ҳ(.*)ƪ/";
if($action == 'a1'){
	preg_match($pp,$havesa,$ar1);
	echo "<a href=".$haves." target=_blank>".$ar1[1]."</a>";
}elseif($action == 'a2'){
	$baids = "/<font color=\"#008000\">(.*)<\/font> - <a href=\"(.*)\"  target=\"_blank\"  class=\"m\">�ٶȿ���<\/a>/Usi";
	preg_match($baids,$havesa,$kuaizhao);
	$times = "/\d{4}-\d{1,2}-\d{1,2}/";
	preg_match($times,$kuaizhao[0],$btime);
	echo "<a href=http://www.baidu.com/s?wd=".$lurl." target=_blank>".$btime[0]."</a>";
}elseif($action == 'a3'){
	$s1 = 'http://www.baidu.com/s?wd=site%3A'.$lurl.'&lm=1';
	$cnt=0;
    while($cnt < 10 && ($c1=@file_get_contents($s1))===FALSE){$cnt++;}	
	preg_match($pp,$c1,$a1);
	echo "<a href=".$s1." target=_blank>".$a1[1]."</a>";
}elseif($action == 'a4'){
	$s2 = 'http://www.baidu.com/s?wd=site%3A'.$lurl.'&lm=7';
	$cnt=0;
    while($cnt < 10 && ($c2=@file_get_contents($s2))===FALSE){$cnt++;}
	preg_match($pp,$c2,$a2);
	echo "<a href=".$s2." target=_blank>".$a2[1]."</a>";
}elseif($action == 'a5'){
	$s3 = 'http://www.baidu.com/s?wd=site%3A'.$lurl.'&lm=30';	
	$cnt=0;
	while($cnt < 10 && ($c3=@file_get_contents($s3))===FALSE){$cnt++;}
	preg_match($pp,$c3,$a3);
	echo "<a href=".$s3." target=_blank>".$a3[1]."</a>";
}elseif($action == 'a6'){
	include 'robot.php';
	$jobs = array();
	$jobs[0] = "google";
	$jobs[1] = "baidu";
	$jobs[2] = "yahoo";
	$jobs[3] = "sogou";
	$jobs[4] = "so163";	
	$jobs[5] = "vnet";
	$jobs[6] = "soso";
	$result = "<table border=1 width=100% bordercolordark=#FFFFFF cellspacing=0 cellpadding=0 bordercolorlight=#BBD7E6>	<tr bgcolor=#D8F0FC><td colspan=9>��ַ<a href=http://".$lurl." target=_blank>http://".$lurl."</a>�ڸ��������������¼��ѯ���</td></tr><tr><td>��������</td><td>�ȸ�</td><td>�ٶ�</td><td>�Ż�</td><td>�ѹ�</td><td>��Ӧ</td><td>�е�</td><td>����</td></tr><tr><td>��¼����</td>";
	for ($i = 0; $i < sizeof($jobs); $i++)	{		
		eval('$__file__=__FILE__;');
		define('ROOT_PATH',$__file__ ? dirname($__file__).'/' : './');
		$cnt=0;
	    while($cnt < 5 && ($content2[$i]=@file_get_contents($ROBOT[$jobs[$i]]['site_url'].$lurl))===FALSE){$cnt++;}		        if($i == 2 || $i==4 || $i==5){
			require_once('require/chinese.php');
			$chs = new Chinese('utf-8','GB2312');
			$content[$i] = $chs->Convert($content[$i]);
		}
		if(preg_match($ROBOT[$jobs[$i]]['site_pattern'],$content2[$i],$matches2[$i])) $site_info2[$i] = $matches2[$i][1];		
		$site_info2[$i] = $site_info2[$i]?$site_info2[$i]:'--';
		$result .= '<td><a href="'.$ROBOT[$jobs[$i]]['site_url'].$lurl.'" target="_blank">'.$site_info2[$i].'</a></td>';
	}
	$result .= "</tr><tr><td>��������</td>";
	for ($j = 0; $j < sizeof($jobs); $j++)	{
		$cnt=0;
	    while($cnt < 10 && ($content[$j]=@file_get_contents($ROBOT[$jobs[$j]]['link_url'].$lurl))===FALSE){$cnt++;}		
		eval('$__file__=__FILE__;');
		define('ROOT_PATH',$__file__ ? dirname($__file__).'/' : './');		
		if($j == 2 || $j==4 || $j==5){
			require_once('require/chinese.php');
			$chs = new Chinese('utf-8','GB2312');
			$content[$j] = $chs->Convert($content[$j]);
		}
		$site_info[$j] = $site_info[$j]?$site_info[$j]:'--';
		if(preg_match($ROBOT[$jobs[$j]]['link_pattern'],$content[$j], $matches[$j])) $site_info[$j] = $matches[$j][1];	
		$result .= '<td><a href="'.$ROBOT[$jobs[$j]]['link_url'].$lurl.'" target="_blank">'.$site_info[$j].'</a></td>';
	}
	$result .= "</tr></table>";
	echo $result;
}
?>