<?php 
require('c.php');
$i=$_GET['i'];
/*�϶���ͬһ��ҳ�棬��Ϊ����ѯ��Ʒ�ñ��룬������ַ���̶ܹ�*/
$t=mysql_query('SELECT * FROM c WHERE i='.$i);
$tr=mysql_fetch_array($t);
$k=$tr['k'];
$w=$tr['w'];/*����g*/
if($w>1000){$w/=1000;$W=$w.'kg';}
else {$W=$w.'g';}
$A=$tr['a'];/*ͨ��ҳ���ȡ*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="i.css" />
<link rel="shortcut icon" href="http://localhost:8080/v-get.com/i/favicon.ico"  />
<link rel="stylesheet" type="text/css" href="http://localhost:8080/v-get.com/shop/i.css" />
<title><?php echo $k;?></title>
</head>
<script type="text/javascript" src="http://localhost:8080/v-get.com/i/i.js"></script>
<script type="text/javascript" src="http://localhost:8080/v-get.com/i/hao/i.js"></script>
<body>
<div class="t"><div class="tc"><a href="http://localhost:8080/shop.v-get.com/" class="th">V-Get! ��ҳ</a><a href="" class="th">�ղ�V-Get!�̳�</a><span class="q" id="e"><a href="http://localhost:8080/v-get.com/shop/log.php">��¼|ע��</a></span></div></div>
<div class="w">
<div class="u">
<div class="p i"><a href="http://localhost:8080/shop.v-get.com/" title="�����Ѳؼ�"><img src="logo.jpg" /></a></div>
<div class="p u2"><a href=""><img src="123_75_cdqAKv.gif" /></a></div>
<div class="p s">
<form action="#" method="get">
<span><input type="text" name="k" id="k"/><input type="submit" value="V-Get!" class="ss"/></span>
<p><a href="">���Ų�Ʒ��</a><a href="">iPhone 4S</a><a href="">��ʿͨLH531</a></p>
</form></div>
<div class="ur">
<div id="ur"><span>ȥV��������</span>
<div>dfsdafsafsdfsafsdfsd</div>

</div>


</div>
</div>


<div class="o n">
<div class="p" id="nl"><a href="#" class="nl">΢��Ʒ����</a><div class="p l" id="d">
<div class="od">
<h2><em><a href="#">ͼ��</a>|<a href="">����</a></em><span><a href="">����</a><a href="">����</a></span></h2>
<div class="or">
<ul><li><a href="#">����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="#">���õ���</a></em><span><a href="">�յ�</a><a href="">����</a><a href="">������</a></span></h2>
<div class="or">
<ul><li><a href="#">1����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="#">�ֻ�����</a></em><span><a href="">iPhone 4s</a><a href="">��ֵ</a></span></h2>
<div class="or">
<ul><li><a href="#">2����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="#">���ԡ��칫</a></em><span><a href="">����</a><a href="">iPad 2</a></span></h2>
<div class="or">
<ul><li><a href="#">3����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="#">�Ҿ�</a>|<a href="">����</a></em><span><a href="">����</a><a href="">�;�</a></span></h2>
<div class="or">
<ul><li><a href="#">4����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="#">����Ьñ</a></em><span><a href="">Ůװ</a><a href="">��װ</a></span></h2>
<div class="or">
<ul><li><a href="#">5����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="">���ݻ�ױ</a></em><span><a href="">ϴ����</a><a href="">��ױ</a></span></h2>
<div class="or">
<ul><li><a href="#">6����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="">���</a>|<a href=>�ӱ��鱦</a></em><span><a href="">GUCCI</a><a href="">PRADA</a></span></h2>
<div class="or">
<ul><li><a href="#">6����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="">����</a>|<a href=>�Խ���</a></em><span><a href="">������</a><a href="">���г�</a></span></h2>
<div class="or">
<ul><li><a href="#">6����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="">������Ʒ</a></em><span><a href="">GPS����</a><a href="">��ˮ</a></span></h2>
<div class="or">
<ul><li><a href="#">6����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="">ĸӤ��Ʒ</a></em><span><a href="">�и�װ</a><a href="">�̷�</a></span></h2>
<div class="or">
<ul><li><a href="#">6����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>


<div class="od">
<h2><em><a href="">ʳƷ����</a></em><span><a href="">ˮ��</a><a href="">�԰׽�</a></span></h2>
<div class="or">
<ul><li><a href="#">6����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>

<div class="od">
<h2><em><a href="">����Ʊ��</a></em><span><a href="">��Ʊ</a><a href="">��Ʊ</a></span></h2>
<div class="or">
<ul><li><a href="#">6����ƻ�</a><a href="">������</a></li></ul>
</div>
</div>
<p><a href=>ȫ����ƷĿ¼</a></p>
</div></div><div class="p nr"><a href="#" class="no">��ҳ</a><a href=#>Ʒ��ֱ��</a><a href=#>�Ź�</a><a href=#>��������</a><a href="">�ݳ�Ʒ</a></div>
</div>

<div class="o v">

<div class="p l lt">
<h2>���õ���</h2>
<h3>��ҵ�</h3>
<ul><li><a href="">�յ�</a><a href="">ƽ�����</a></li><li><a href="">�յ�</a><a href="">ƽ�����</a></li></ul>
<h3>�������</h3>
<ul><li><a href="">�յ�</a><a href="">ƽ�����</a></li><li><a href="">�յ�</a><a href="">ƽ�����</a></li></ul>
<h3>��������</h3>
<ul><li><a href="">�յ�</a><a href="">ƽ�����</a></li><li><a href="">�յ�</a><a href="">ƽ�����</a></li></ul>
</div>


<div class="q r">
<?php

echo '<h1>'.$k.'<span class="fr">'.$tr['d'].'</span></h1>';
?>
<div class="rv">
<div class="p ri">
<div id="c"><img src="http://localhost:8080/v-get.com/i/shop/i2/<?php echo $i;?>_0.jpg" /></div>
<div>
<div class="p rii ril"></div>
<div id="ci" class="p">
<ul><li><img src="http://localhost:8080/v-get.com/i/shop/i1/<?php echo $i;?>_0.jpg" /></li><li><img src="http://localhost:8080/v-get.com/i/shop/i1/<?php echo $i;?>_1.jpg" /></li><li><img src="http://localhost:8080/v-get.com/i/shop/i1/<?php echo $i;?>_2.jpg" /></li><li><img src="http://localhost:8080/v-get.com/i/shop/i1/<?php echo $i;?>_3.jpg" /></li><li><img src="http://localhost:8080/v-get.com/i/shop/i1/<?php echo $i;?>_4.jpg" /></li></ul>
</div>
<div class="p rii rir"></div>
</div>


</div>
<div class="p rg">
<div class="rgt">
<ul>
<li>��Ʒ���룺<?php echo $A.$i;?></li>
<li>΢&nbsp;��&nbsp;�ۣ�<b class="fr">��<?php echo $tr['p'];?></b></li>
<li>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�棺�Ϻ� �л�</li>
<li>��Ʒ���֣�<span class="rgi"><span></span><a href="">(����鿴����)</a></span></li>
<li>�����ۣ�<span class="fr">���Żݣ�<?php echo $tr['o'];?>Ԫ</span></li>
</ul>
</div>
<div class="rgb">
<form action="http://localhost:8080/v-get.com/shop/o.php" method="post">
<p><input type="hidden" value="3323" name="i" /><input type="hidden" value="���ţ�Hisense��LED39K200 39Ӣ�� խ�߽���LED���ӣ���ɫ��" name="n" /><input type="hidden" value="2999.00" name="p" /><input type="hidden" name="j" value="0" /><input type="hidden" name="b" value="0" />��Ҫ��<input type="text" value="1" name="m" class="rk"/>��</p>
<p><input type="submit" value="����V����" class="rs rs1"/><a href="">�ղ�</a></p>
</form>
</div>
</div>

</div>


<div class="o c">
<div class="ct">
<h2 id="ct"><a href="javascript:void(0)" class="cto">��Ʒ����</a><a href="javascript:void(0)">������</a><a href="javascript:void(0)">�ۺ��嵥</a></h2>
<ul>
<li>��Ʒ���ƣ�<?php echo $k;?></li>
<li>��Ʒë�أ�<?php echo $W;?>&nbsp;&nbsp;</li>
<li>�ϼ�ʱ�䣺<?php echo $tr['t'];?></li>
</ul>
</div>
<div class="cb">
<?php echo $tr['e'];?>
<!---->
</div>

</div>




</div>
</div>
<!--for v-->
<div class="o w4">
fdfdfs
</div>
<div class="o b">
<p><a href="">��������</a>|<a href="">��ϵ����</a>|<a href="">�˲���Ƹ</a></p>
<p>Copyright&copy; ΢�̳� 2004-2012 | <a href="">��ICP֤041189��������Ʒ��Ӫ���֤ </a><a>������8�ž���������110101000001��</a></p>
<div class="bb"><a href=""><img src="108_40_zZOKnl.gif" /></a><a href=""><img src="108_40_OaNIwt.jpg" /></a><a href=""><img src="112_40_WvArIl.png" /></a></div>
</div>



</div>

</div>
<script type="text/javascript" language="javascript">X();
E($('nl'),'mouseover',function(){D($('d'),1)});
E($('nl'),'mouseout',function(){D($('d'))});
var li=$('ci^LI');
for(I=0;I<L(li);I++)
{E(li[I],'mouseover',function(){C(this,'rio');for(I=0;I<L(li);I++){if(li[I].className=='rio')$('c^IMG')[0].src=$('c^IMG')[0].src.replace(/_\d+\.jpg/,'_'+I+'.jpg')}});
E(li[I],'mouseout',function(){C(this,'')});
}

var ca=$('ct^A'),lca=L(ca);for(I=1;I<lca;I++){D($('c'+I))}
for(I=0;I<lca;I++){E(ca[I],'click',function(){for(I=0;I<lca;I++){C(ca[I],'');D($('c'+I));if(ca[I]==this){C(this,'cto');D($('c'+I),1)}}});
	
	}


/*function Add(f){
	var b=1,k='v_od13',json=CG(k)||'',i=f.i.value,m=f.m.value;
	if(L(json)>0){ 
     var js=json.substr(1).split(';');json='';
	for(I=0;I<L(js);I++){
		
		var arr=js[I].split(','),a0=arr[0],a5=$i(arr[5]);
    	if(a0==i){b=0;if($3.confirm('����ѡ������Ʒ'+a5+'����ȷ���ٹ���'+m+'����'))a5+=$i(m);for(x=1;x<L(arr)-1;x++)a0+=','+arr[x];json+=';'+a0+','+a5;}
		else json+=';'+js[I];
     }
	}
	
	if(b)json+=';'+i+','+f.n.value+','+f.p.value+','+f.j.value+','+f.b.value+','+m;
	CS(k,json,9);
	if($3.confirm('ȥ���ﳵ���㣿'))$3.open('http://localhost:8080/v-get.com/shop/o.html');
	}
*/
A('http://localhost:8080/v-get.com/shop/lg.php','','e');

</script>
</body>
</html>
