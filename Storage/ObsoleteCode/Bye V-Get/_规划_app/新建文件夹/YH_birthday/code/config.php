<?php
require 'Textclass.php';
$servername  = 'localhost';
$dbusername  = 'root'; //root�޸�Ϊ���ݿ��˻���
$dbpassword  = '111111'; //�޸�Ϊ���ݿ�����
$dbname  = 'digsky0_chengyu'; //�������ݿ����ơ�
$db = mysql_connect($servername, $dbusername,$dbpassword);
mysql_query("set names'gbk'");
mysql_select_db($dbname,$db) or die ('�����������ݿ⣡');
require 'smarty/libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir = "smarty/templates/templates"; //ģ���ļ�Ŀ¼
$smarty->compile_dir = "smarty/templates/templates_c";
$smarty->config_dir = "smarty/templates/config";
$smarty->cache_dir = "smarty/templates/cache";
$smarty->caching = false;
?>