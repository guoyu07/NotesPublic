<?php
require('c.php');
$vc=$_POST['i'];
$A=$_POST['a'];
$B=$_POST['b'];
$p=$_POST['p'];
$S=$_POST['s'];
$P=md5($p);
$c=strtolower($vc);
$vs=$_SESSION['validcode'];
$s=strtolower($vs);
/*��ע��ҳ�Ѿ��ж����û��� �� �����Ψһ��*/
if($c==$s){
$sql='INSERT INTO m (a,b,p,s) VALUES ("'.$A.'","'.$B.'","'.$P.'",'.$S.')';
$t=mysql_query($sql);
if(!$t){die('ע������뷵������ע�ᣡ<script language="javascript" type="text/javascript">document.location.href="http://localhost:8080/v-get.com/shop/log.php"</script>');}
mysql_close($_c);
	
	
	
	
	}
else {echo '��֤�������������������<p><label>�Ƽ��ˣ�</label><input type="text" name="rv"/><a href="">�Ƽ��˽�����ʩ</a></p>';}

?>
