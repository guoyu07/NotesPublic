<?php
/*
	More & Original PHP Framwork
	Copyright (c) 2007 - 2008 IsMole Inc.

	$Id: whois.php 204 2008-05-22 10:15:09Z hao32 $
*/

//note ����MooPHP���
require dirname(__FILE__) . '/MooPHP/MooPHP.php';
require dirname(__FILE__) . '/MooPHP/Global.function.php';

$tpl_name = 'alexa��Ϣ��ѯ';

$url = MooGetGPC('url', 'string');
$url = str_replace('http://', '', $url);
$url = str_replace('www.', '', $url);
if($url) {	
	$AlexaUrl = 'http://xml.alexa.com/data?cli=10&dat=nsa&ver=quirk-searchstatus&url=' . $url;
	$AlexaContent = file_get_contents($AlexaUrl);
	preg_match('/<POPULARITY[^>]*URL[^>]*TEXT[^>]*\"([0-9]+)\"/i', $AlexaContent, $re);
	//���traffic rankֵ
	$TRank = $re[1];
	// note �ж��ǲ��Ǵ���POPULARITY
	$isExist = preg_match('/POPULARITY/i', $AlexaContent);
}

include MooTemplate("alexa_index");
