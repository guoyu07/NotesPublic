<?php
/*
	More & Original PHP Framwork
	Copyright (c) 2007 - 2008 IsMole Inc.

	$Id: MooPHP.php 184 2008-05-22 06:13:57Z kimi $
*/


//note ����MooPHP��ܻ�������
define('IN_MOOPHP', TRUE);
//note MooPHP�ĺ��İ汾�����磺0.21 alpha
define('MOOPHP_VERSION', '0.91.178 alpha');
//note ���ڱ����ʵ��ļ�·�������磺D:\web\MooPHP\
define('MOOPHP_ROOT', substr(__FILE__, 0, -10));
//note ���ڱ����ʵ��ļ�URL�����磺http://www.ccvita.com/MooPHP
define('MOOPHP_URL', strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/'))).'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));
//note REQUEST_URI
define('REQUEST_URI', isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : (isset($_SERVER['argv']) ? $_SERVER['PHP_SELF'].'?'.$_SERVER['argv'][0] : $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING']));
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());

//note ��ֹ��ȫ�ֱ���ע��
if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])) {
	exit('Request tainting attempted.');
}

//note MooPHP��������
$_MooPHP = $_MooBlock = $_MooCacheConfig = $_MooClass = array();
//note ���ݿ���Ϣ��ʼ��
$dbHost = $dbName = $dbUser = $dbPasswd = $dbPconnect = '';

//note ����MooPHP�����ļ�
require_once MOOPHP_ROOT.'/MooConfig.php';

//note ����MooPHP���ó���
!defined('MOOPHP_ALLOW_BLOCK') && define('MOOPHP_ALLOW_BLOCK', TRUE);
!defined('MOOPHP_ALLOW_CACHE') && define('MOOPHP_ALLOW_CACHE', FALSE);
!defined('MOOPHP_ALLOW_MYSQL') && define('MOOPHP_ALLOW_MYSQL', FALSE);
!defined('MOOPHP_DATA_DIR') && define('MOOPHP_DATA_DIR', MOOPHP_ROOT.'./../Moo-data');
!defined('MOOPHP_TEMPLATE_DIR') && define('MOOPHP_TEMPLATE_DIR', '../Moo-templates');
!defined('MOOPHP_TEMPLATE_URL') && define('MOOPHP_TEMPLATE_URL', 'Moo-templates');

//note ����MooPHPCache�����ļ�
if(MOOPHP_ALLOW_BLOCK) {
	MOOPHP_ALLOW_CACHE && require_once MOOPHP_ROOT.'/MooCacheConfig.php';
	$cache = MooAutoLoad('MooCache');
}

//note ���ϵͳ��Ҫʹ��MYSQL�򣬳�ʼ��
if(MOOPHP_ALLOW_MYSQL) {
	$db = MooAutoLoad('MooMySQL');
	$db->connect($dbHost, $dbUser, $dbPasswd, $dbName, $dbPconnect, $dbCharset);
}

//note ��ʼ�����ñ���
$timestamp = time();

//note ��GPC�������а�ȫ����
if (!MAGIC_QUOTES_GPC) {
	$_GET = MooAddslashes($_GET);
	$_POST = MooAddslashes($_POST);
	$_COOKIE = MooAddslashes($_COOKIE);
	$_REQUEST = MooAddslashes($_REQUEST);
	$_SERVER = MooAddslashes($_SERVER);
	$_FILES = MooAddslashes($_FILES);
}

/**
* �Զ�����Ĭ�����ļ��������������ʼ��
* @param string $classname - ����
* @return class
*/
function MooAutoLoad($classname) {
	global $_MooClass;

	if(empty($_MooClass[$classname])) {
		require_once MOOPHP_ROOT.'/libraries/'.$classname.'.class.php';
		$_MooClass[$classname]= & new $classname;
		return $_MooClass[$classname];
	} else {
		return $_MooClass[$classname];
	}

}

/**
* Ϊ���������������ת��
* @param string $value - �ַ��������������
* @return array
*/
function MooAddslashes($value) {
	return $value = is_array($value) ? array_map('MooAddslashes', $value) : addslashes($value);
}

/**
* ģ�麯��
* @param string $type - ����
* @param string $name - ���������������
* @param string $param - ����
* @return array
*/
function MooBlock($param) {
	global $_MooClass;
	
	$_MooClass['MooCache']->getBlock($param);

}

/**
* �������Ĳü��ַ���
* @param string $string - ����ȡ���ַ���
* @param integer $length - ��ȡ�ַ����ĳ���
* @param string $dot - ���Ժ�׺
* @return string ���ش�ʡ�Ժű��ü��õ��ַ���
*/
function MooCutstr($string, $length, $dot = ' ...') {
	global $charset;

	if(strlen($string) <= $length) {
		return $string;
	}
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
	$strcut = '';
	if(strtolower($charset) == 'utf-8') {
		$n = $tn = $noc = 0;
		while($n < strlen($string)) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif (194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif (224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif (240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif (248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif ($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);
	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);

	return $strcut.$dot;
}

/**
* ��ȡ�����ļ�·����
* @param string $cacheFile - �����ļ���
* @return string ���ػ����ļ�����·��
*/
function MooCacheFile($cacheFileName) {

	$cacheFile = MOOPHP_DATA_DIR.'/cache/cache_'.$cacheFileName.'.php';

	if(!@file_exists($cacheFile)) {
		$_MooClass['MooCache']->setCache($cacheFileName);
	}
	return $cacheFile;

}

/**
* ��ȡGPC����������typeΪinteger�ı���ǿ��ת��Ϊ������
* @param string $key - Ȩ�ޱ��ʽ
* @param string $type - integer �������ͣ�string �ַ������ͣ�array ��������
* @param string $var - R $REQUEST������G $GET������P $POST������C $COOKIE����
* @return string ���ؾ������˻��߳�ʼ����GPC����
*/
function MooGetGPC($key, $type = 'integer', $var = 'R') {
	switch($var) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		case 'R': $var = &$_REQUEST; break;
	}
	switch($type) {
		case 'integer':
			$return = intval($var[$key]);
			break;
		case 'string':
			$return = isset($var[$key]) ? $var[$key] : NULL;
			break;
		case 'array':
			$return = isset($var[$key]) ? $var[$key] : array();
			break;
		default:
			$return = intval($var[$key]);
	}
	return $return;
}

/**
* �������ַ�ת�� HTML ��ʽ������<a href='test'>Test</a>ת��Ϊ&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
* @param string $value - �ַ��������������
* @return array
*/
function MooHtmlspecialchars($value) {
	return is_array($value) ? array_map('MooHtmlspecialchars', $value) : preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1', str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $value));
}

/**
* ����Ƿ���ȷ�ύ�˱� //debug �˺��������ڵ��Խ׶�
* @param string $var ��Ҫ���ı���
* @param string $allowget �Ƿ�����GET��ʽ
* @param string $seccodecheck ��֤�����Ƿ���
* @return �����Ƿ���ȷ�ύ�˱�
*/
function MooSubmit($var, $allowget = 0, $seccodecheck = 0) {

	if(empty($GLOBALS['_REQUEST'][$var])) {
		return FALSE;
	} else {
		global $_SERVER;
		if($allowget || ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) ||
			preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("/([^\:]+).*/", "\\1", $_SERVER['HTTP_HOST'])))) {
			return TRUE;
		} else {
			showmessage('submit_invalid');//debug �˴���ȱ��
		}
	}
}

/**
* ����ģ��
* @param string $file - ģ���ļ���
* @return string ���ر����ģ���ϵͳ����·��
*/
function MooTemplate($file) {

	$tplfile = MOOPHP_ROOT.MOOPHP_TEMPLATE_DIR.'/'.$file.'.htm';
	$objfile = MOOPHP_DATA_DIR.'/templates/'.$file.'.tpl.php';

	if(@filemtime($tplfile) > @filemtime($objfile)) {
		//note ����ģ�����ļ�
		$T = MooAutoLoad('MooTemplate');
		$T->complie($tplfile, $objfile);
	}

	return $objfile;
}

/**
* д�ļ�
* @param string $file - ��Ҫд����ļ���ϵͳ�ľ���·�����ļ���
* @param string $content - ѧҪд�������
* @param string $mod - д��ģʽ��Ĭ��Ϊw
* @param boolean $exit - ����д���Ƿ��жϳ���Ĭ��Ϊ�ж�
* @return boolean �����Ƿ�д��ɹ�
*/
function MooReadFile($file, $exit = TRUE) {
	if(!@$fp = @fopen($file, $mod)) {
		if($exit) {
			exit('MooPHP File :<br>'.$file.'<br>Have no access to write!');
		} else {
			return false;
		}
	} else {
		@$data = fread($fp,filesize($cachefile));
		fclose($fp);
		return $data;
	}
}

/**
* д�ļ�
* @param string $file - ��Ҫд����ļ���ϵͳ�ľ���·�����ļ���
* @param string $content - ѧҪд�������
* @param string $mod - д��ģʽ��Ĭ��Ϊw
* @param boolean $exit - ����д���Ƿ��жϳ���Ĭ��Ϊ�ж�
* @return boolean �����Ƿ�д��ɹ�
*/
function MooWriteFile($file, $content, $mod = 'w', $exit = TRUE) {
	if(!@$fp = @fopen($file, $mod)) {
		if($exit) {
			exit('MooPHP File :<br>'.$file.'<br>Have no access to write!');
		} else {
			return false;
		}
	} else {
		@flock($fp, 2);
		@fwrite($fp, $content);
		@fclose($fp);
		return true;
	}
}
