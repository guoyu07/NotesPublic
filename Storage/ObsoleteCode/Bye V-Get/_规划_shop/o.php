<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<style type="text/css">
<!--
*{padding:0;margin:0}
body {background:#fff;font-size:12px;color: #333;font-family:"Tahoma","SimSun"}
.w,.tc{margin: 0px auto; overflow: hidden; width: 990px}
.t{background:url(i.png)}
img{ border:0}.q{float:right}
/*������Ա��ܶ�����*/
/*Hͷ��css*/
.t{margin: 0px auto;LINE-HEIGHT: 26px;HEIGHT: 26px;border-bottom:#dadada 1px solid}
.t a{padding:0 3px}
.t{background:url(i.png)}
#a th{font-size:14px}
#a th a{font-size:12px;font-weight:400}
#a tr,.v1 th{height:28px;line-height:28px;}
#a input{ border:#fff 1px solid; background:0;height:20px}
#a .sa{width:500px}
.c{ border:1px #ccc solid; padding:0}
.c th{ background:#fff4d7}
.c th,.c td{width:80px; text-align:center; border:#ccc solid; border-width:0 1px 1px 0}
.c .n{width:300px}
.t img{}
.c input{width:30px; text-align:center}
.c img{height:50px;width:50px;}
.f2{font-weight:800;color:#F00}
.cb td{ text-align:right}
-->
</style>
<title>V-Get! ΢�̳�-΢������ѡ����Ʒ�л���������Ʒ����Vʱ���Ĺ��������Get!</title>
</head>
<script type="text/javascript" src="http://localhost:8080/v-get.com/i/i.js"></script>
<script type="text/javascript" src="http://localhost:8080/v-get.com/i/hao/i.js"></script>
<body>
<div class="t"><div class="tc"><a href="" class="th">�ղ�V-Get!�̳�</a><span class="q" id="e"><a href="http://localhost:8080/v-get.com/shop/log.php">��¼|ע��</a></span></div></div>
<div class="w">
<form action="http://localhost:8080/v-get.com/shop/pay.php" method="post">
<?php
$pi=$_POST['i'];
$pn=$_POST['n'];
$pm=$_POST['m'];
$pp=$_POST['p'];
$pb=$_POST['b'];
$pj=$_POST['j'];
$pt=$p*$m;
if(isset($_SESSION['ma'])){
 echo '<table id="a">
<tr><th width="100">�ջ�����Ϣ</th><th><a href="http://û��jsʱ�޸��ջ���" onclick="javascipt:a(this);return false" id="b">[�޸�]</a></th></tr>
<tr><td class="q">�ջ���������</td><td><input type="text" value="'.$_SESSION['mn'].'"/></td></tr>
<tr><td class="q">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ַ��</td><td><input type="text" value="'.$_SESSION['md'].'" class="sa"/></td></tr>
<tr><td class="q">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td><td><input type="text" value="'.$_SESSION['mc'].'"/></td></tr>
<tr><td class="q">�̶��绰��</td><td><input type="text" value="0'.$_SESSION['mf'].'"/></td></tr>
<tr><td class="q">Email��</td><td><input type="text" value="'.$_SESSION['mb'].'"/></td></tr>
<tr><td class="q">QQ��</td><td><input type="text" value="'.$_SESSION['mq'].'"/></td></tr>
<tr><td class="q">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ࣺ</td><td><input type="text" value="'.$_SESSION['mo'].'"/></td></tr>
</table>	
	';
	}
else {
echo '�𾴵Ŀͻ����ã�����δ��¼V-Get! �����������ʱ��������ϸ��д�����ջ��˵�������Ϣ�����ǽ���������ʱ��Ϣ������������Ѿ�ע��΢�̳ǣ����¼����лл��';}


echo '
<table cellspacing="0"  class="c">
<tr><th>��Ʒ���</th><th colspan="2">��Ʒ����</th><th>΢����</th><th>����</th><th>���ͻ���</th><th>����</th><th>ɾ����Ʒ</th></tr>
<tr><td><input type="hidden" value="'.$pi.'" name="pi[]"/>'.$pi.'</td><td><a href=""><img src="http://localhost:8080/v-get.com/shop/imgs/1_2.jpg" /></a></td><td class="n"><input type="hidden" value="'.$pn.'" /><a href="">'.$pn.'</a></td><td><input type="hidden" value="'.$pp.'" /><span class="f2">��'.$pp.'</span></td><td>'.$pb.'</td><td>'.$pj.'</td><td><input type="text" value="'.$pm.'" /></td><td><a href="">ɾ��</a></td>
</tr>
<tr class="cb"><th colspan="8"> �ܼۣ�<span class="f2">��'.$pt.'</span>Ԫ</th></tr>
</table>
';
?>
</form>
</div>

<script language="javascript" type="text/javascript">

var i=$('a^INPUT');
for(I=0;I<L(i);I++){
	var o=i[I]; 
	o.readOnly=$1;
	E(o,'mouseover',function(){this.title="˫���޸�"});
	E(o,'dblclick',function(){H($('b'),'[ȷ��]');this.readOnly=$0;this.style.borderColor='#cc0';});
	}
	
function a(o){var i=$('a^INPUT'),o;
	if(H(o)=='[�޸�]'){H(o,'[ȷ��]');
	for(I=0;I<L(i);I++){o=i[I];o.readOnly=$0;o.style.borderColor='#cc0';}}
	else {H(o,'[�޸�]');
		for(I=0;I<L(i);I++){o=i[I];o.readOnly=$1;o.style.borderColor='#fff'}
		
		
		}
	}

A('http://localhost:8080/v-get.com/shop/lg.php','','e');
</script>

</body></html>