<?php
//session_start();

require('c.php');
$A=$_POST['k'];
$p=$_POST['w'];
$P=md5($p);
echo $A.'<br/>'.$P;
$s=mysql_query('SELECT b,n,c,d,f,o,q FROM m where a="'.$A.'" AND p="'.$P.'"');
$q=mysql_fetch_array($s);
if($q){$_SESSION['ma']=$A;$_SESSION['mb']=$q['b'];$_SESSION['mc']=$q['c'];$_SESSION['mn']=$q['n'];$_SESSION['md']=$q['d'];$_SESSION['mf']=$q['f'];$_SESSION['mo']=$q['o'];$_SESSION['mq']=$q['q'];setcookie(session_name(),session_id(),time()+604800,'/');/*����session����Ϊ7�죻һ��Ϊ86400*/echo '<script language="javascript" type="text/javascript">window.open("http://localhost:8080/shop.v-get.com/")</script>';}
else {die( '��¼ʧ��');}

/*
unset($_SESSION['views']);unset() ���������ͷ�ָ���� session ������
session_destroy()�������� session������ʧȥ�����Ѵ洢�� session ���ݡ�

*/
?>
