<?php



$i=$_POST['i'];/*��Ʒid*/
$n=$_POST['n'];/*��Ʒ����*/
$p=$_POST['p'];/*��Ʒ�۸�*/
$j=$_POST['j'];/*��Ʒ����*/
$b=$_POST['b'];/*��Ʒ����*/
$m=$_POST['m'];/*��Ʒ����*/

echo $n;


echo '<table cellspacing="0" border="1" bordercolordark="#ffffff" bordercolorlight="#000000"><tr><th>��Ʒ����</th><th>����</th><th>�۸�</th><th>����</th><th>����</th><th>����</th><th>ȡ��</th></tr>



</table>';



if(isset($_SESSION['i']))
{echo '���ã�<a href="http://localhost:8080/v-get.com/shop/my.php">'.$_SESSION['u'].'</a>��<a href="http://localhost:8080/v-get.com/shop/lo.php">[�˳�]</a>';}
else {echo '<a href="http://localhost:8080/v-get.com/shop/log.php">��¼|ע��</a>';}




?>