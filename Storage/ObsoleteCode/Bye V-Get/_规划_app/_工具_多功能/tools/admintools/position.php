<?php
/*
	More & Original PHP Framwork
	Copyright (c) 2007 - 2008 IsMole Inc.

	$Id: whois.php 204 2008-05-22 10:15:09Z hao32 $
*/

//note ����MooPHP���
require dirname(__FILE__) . '/MooPHP/MooPHP.php';
require dirname(__FILE__) . '/MooPHP/Global.function.php';

$tpl_name = '�鿴�Լ���վ�����������е�����';
$SearchE = MooGetGPC('radiobutton', 'string'); //hao32 note ���radio��ֵ
$value = MooGetGPC('value', 'string');
$value2 = explode(':', $value);
$domain = $value2[0];
$domain = strtolower(str_replace('http://', '', $domain));
$domain = strip_tags($domain);
//$domain = !preg_match("/^www\./", $domain) ? 'www.'.$domain : $domain;//����ƥ�䲻�˶�����������hao32.com.cn
$keyword = $value2[1];
$keyword = str_replace(' ', '+', $keyword);
if($value && $domain && $keyword) {
	if($SearchE == 'baidu') {
		$buffer = @file_get_contents('http://www.baidu.com/s?tn=baiduadv&rn=100&q1=' . "$keyword", 'r');
		if($buffer) {		
			$buffer = substr($buffer, 0, strpos($buffer, '<font color=#008000>' . $domain));
			$BaiduP = substr_count($buffer, 'target="_blank"><font size="3">');
		}
	}
	if($SearchE == 'google') {
		$buffer = @file_get_contents('http://www.google.cn/search?aq=f&complete=1&num=100&client=pub-6137409832737925&newwindow=1&q=' . $keyword, 'r');	
		if($buffer) {	
			$buffer = substr($buffer, 0, strpos($buffer, '<span class=a>' . $domain));
			$GoogleP = substr_count($buffer, '<div class=g>');
		}
	}
}
include MooTemplate("position_index");
