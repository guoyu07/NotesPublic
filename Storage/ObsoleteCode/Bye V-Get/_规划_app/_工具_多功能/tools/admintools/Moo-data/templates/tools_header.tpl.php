<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title><?php echo $tpl_name; ?> - վ������</title>
<link href="<?php echo MOOPHP_TEMPLATE_URL;?>/sitetools.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php $url_name = $_SERVER['PHP_SELF']; $file_name = end(explode('/', $url_name)); ?>
<div id="top">
	<div class="top">
		<div style="float:right">
		<a href="index.php">��ҳ</a> |
	    <a href="pr.php" >prֵ��ѯ</a> |
		<a href="site.php" >��¼�뷴������</a> |
		<a href="position.php" >�鿴�ؼ�������</a> |
	    <a href="alexa.php" >Alexa��ѯ</a> |
		<a href="ip.php">ip�����ѯ</a> |
		<a href="whois.php" >whois��ѯ</a> |
	    <a href="hex.php" >��ַתHEX����</a> |
                   <a href="md5.php" >MD5����</a>
	</div>
			<a href="http://tools.kqiqi.com" >��վ��ҳ</a> |
	    <a href="http://tools.kqiqi.com/" >������ʵ�ò�ѯ����</a> |
<script>
function addfavorite()
{
   if (document.all)
   {
      window.external.addFavorite("http://tools.kqiqi.com/admintools/<?php echo $file_name; ?>", "<?php echo $tpl_name; ?> - վ������");
   }
   else if (window.sidebar)
   {
      window.sidebar.addPanel("<?php echo $tpl_name; ?> - վ������", "http://tools.kqiqi.com/admintools/<?php echo $file_name; ?>", "");
   }
} 
</script>
<a href="#" onclick="addfavorite()">�����ղؼ�</a>
	</div>
</div>
<div id="header"><a href="index.php"><img src="Moo-templates/images/logo.jpg" /></a></div>