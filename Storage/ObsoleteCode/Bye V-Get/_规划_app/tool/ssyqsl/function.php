<?php
@require_once('../global.php');
function get_seo_info($domain,$che){
	global $ROBOT;
	$che = explode(',',$che);
	$ch  = array_combine($che,$che);
	$content   = '';
	$site_info = '';
	$link_info = '';
	$jobs    = array();
	$jobs[1] = "baidu";
	$jobs[2] = "google";
	$jobs[3] = "yahoo";
	$jobs[4] = "soso";
	$jobs[5] = "vnet";
	$jobs[6] = "so163";
	$jobs[7] = "sogou";
	$a = '<table border=1 width=100% bordercolordark=#FFFFFF cellspacing=0 cellpadding=0 bordercolorlight=#BBD7E6>	<tr bgcolor=#D8F0FC><td colspan=9>��ַ<a href=http://'.$domain.' target=_blank>http://'.$domain.'</a>�ڸ��������������¼��ѯ���</td></tr><tr><td>��������</td>';
	for ($i = 1; $i <= sizeof($jobs); $i++) {
		if($ch[$i]){
			$a .= "<td>".$ROBOT[$jobs[$i]]['name']."</td>";
		}
	}
	$a .= "</tr><tr><td>��¼����</td>";
	for ($i = 1; $i <= sizeof($jobs); $i++) {
		if($ch[$i]){
			eval('$__file__=__FILE__;');
			define('ROOT_PATH',$__file__ ? dirname($__file__).'/' : './');
			$content[$i] = get_content($ROBOT[$jobs[$i]]['site_url'].$domain);
			if($i==3 || $i==5 || $i==6){
				require_once('require/chinese.php');
				$chs = new Chinese('utf-8','GB2312');
				$content[$i] = $chs->Convert($content[$i]);
			}
			if(empty($content[$i])) return 'Unkown Error...';
			if(preg_match($ROBOT[$jobs[$i]]['site_pattern'], $content[$i], $matches[$i])) $site_info[$i] = $matches[$i][1];        $site_info[$i] = $site_info[$i]?$site_info[$i]:'--';
			$a .= '<td><a href="'.$ROBOT[$jobs[$i]]['site_url'].$domain.'" target="_blank">'.$site_info[$i].'</a></td>';
		}
	}
	$a .= "</tr><tr><td>��ز�ѯ</td><td colspan=7 align=left><a href=../ip/index.php?domain=".$domain." target=_blank>IP��ַ��ѯ</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=../pr/pr.php?domain=".$domain." target=_blank>PR��ѯ</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=../whois/index.php?domain=".$domain." target=_blank>����Whois��ѯ</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=http://www.seoued.net/tool/alexa target=_blank>Alexa������ѯ</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=../friends/friends.php?domain=".$domain." target=_blank>�������Ӳ�ѯ</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=../friendlink/friendlink.php?domain=".$domain." target=_blank>��������IP��ѯ</a></td></tr></table>";
	return $a;
}
?>