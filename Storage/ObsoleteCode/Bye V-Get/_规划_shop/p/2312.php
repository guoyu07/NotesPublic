<?php 
require('c.php');
$l=$_GET['l'];
$A=$_GET['a'];
/*a=$1&l=$2&b=$3&c=$4&g=$5&r=$6&e=$7&q=$8 */
$b=$_GET['b'];$c=$_GET['c'];$g=$_GET['g'];$q=$_GET['q'];$e=$_GET['e'];$r=$_GET['r'];
$SQL='SELECT * FROM c WHERE a='.$A;

if($b!='0'){$SQL.=' AND b='.$b;}
if($c!='0'){$SQL.=' AND c='.$c;}
if($g!='0'){$SQL.=' AND g='.$g;}
if($q!='0'){$SQL.=' AND q='.$q;}
if($e!='0'){$SQL.=' AND e='.$e;}
if($r!='0'){$SQL.=' AND r='.$r;}
/*��Ϊ����һ��ֻ����һ����������0�����Ա������ж�*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="../il.css" />
<link rel="shortcut icon" href="http://localhost:8080/v-get.com/i/shop.ico"  />
<link rel="stylesheet" type="text/css" href="http://localhost:8080/v-get.com/shop/il.css" />
<title>�յ�-���õ���</title>
</head>
<script type="text/javascript" src="http://localhost:8080/v-get.com/i/i.js"></script>
<script type="text/javascript" src="http://localhost:8080/v-get.com/i/hao/i.js"></script>
<body>
<div class="t"><div class="tc"><a href="http://localhost:8080/shop.v-get.com/" class="th">V-Get! ��ҳ</a><a href="" class="th">�ղ�V-Get!�̳�</a><span class="q" id="e"><a href="http://localhost:8080/v-get.com/shop/log.php">��¼|ע��</a></span></div></div>
<div class="w">
<?php include('http://localhost:8080/v-get.com/shop/c.htm');?>

<div class="v">
<?php include($l.'.html');?>

<div class="q r">
<div class="rt">
������
</div>
<div class="r2">
<!--����js�޸ĵ�ַ�ķ�ʽ�޸�-->
<h1>�յ� - ���õ���</h1>
<dl class="r2t"><dt class="p">Ʒ�ƣ�</dt><dd id="cb"><div><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-1-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-2-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-3-0-0-0-0-0.html">־��</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-4-0-0-0-0-0.html">�¿�˹</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-5-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-6-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-7-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-8-0-0-0-0-0.html">������</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-9-0-0-0-0-0.html">���</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-10-0-0-0-0-0.html">�������</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-11-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-12-0-0-0-0-0.html">TCL</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-13-0-0-0-0-0.html">����</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-14-0-0-0-0-0.html">С���</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-15-0-0-0-0-0.html">�¿�</a></div><div><a href="http://localhost:8080/shop.v-get.com/products/2312-16-0-0-0-0-0.html">����</a></div></dd></dl>
<dl><dt class="p">�۸�</dt><dd id="cr"><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">1-1999</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">2000-2999</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">3000-3999</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">4000-4999</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">5000-6999</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">7000����</a></dd></dl>
<dl><dt class="p">�յ����</dt><dd id="cc"><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����</a><a href="">�ڹ�ʽ</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����ʽ</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����յ�</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">�ƶ��յ�</a></dd></dl>
<dl><dt class="p">�յ����ܣ�</dt><dd id="cg"><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">��Ƶ��ů</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">������ů</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">��Ƶ����</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">���ٵ���</a></dd></dl>

<dl><dt class="p">���������</dt><dd id="cq"><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">1P(8-14�O)</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">1.5P(12-23�O)</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">2P(21-34�O)</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">2.5P(27-42�O)</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">3P(32-50�O)</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">5P(46-70�O)</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">5P����</a></dd></dl>
<dl><dt class="p">��Ч�ȼ���</dt><dd id="ce"><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">����</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">һ����Ч</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">������Ч</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">������Ч</a><a href="http://localhost:8080/shop.v-get.com/products/2312-0-0-0-0-0-0.html">�ļ���Ч</a></dd></dl>
</div>

<div class="o ct"><span class="p">����<a href="" class="cto">����</a><a href="">����</a><a href="">�۸�</a><a href="">������</a></span><span class="q"><a href="">��һҳ</a><a href="">��һҳ</a></span></div>
<div id="c" class="o">
<ul>
<?php 
$t2=mysql_query($SQL);
while($tr2=mysql_fetch_array($t2)){
	$h=$tr2['h'];$i=$tr2['i'];
	echo '<li>
<p><a href="http://localhost:8080/shop.v-get.com/product/2312'.$i.'.html" target="_blank"><img src="http://localhost:8080/v-get.com/i/shop/i160/'.$i.'.jpg" alt="'.$h.'" /></a></p>
<p><a href="#" target="_blank">'.$h.'</a></p>
<p class="f9">��'.$tr2['p'].'</p>
<p><a href="http://club.360buy.com/review/530670-1-1.html" target="_blank">����661������</a>(89%����)</p><p><a href="#" target="_blank">����</a><input value="��ע" type="button" /><input type="button" value="�Ա�"/></p></li>';
	
	}
?>

</ul>
</div>
</div>


</div>
<!--for v-->
<div class="o w4">
fdfdfs
</div>
<div class="b">
<p><a href="">��������</a>|<a href="">��ϵ����</a>|<a href="">�˲���Ƹ</a></p>
<p>Copyright&copy; ΢�̳� 2004-2012 | <a href="">��ICP֤041189��������Ʒ��Ӫ���֤ </a><a>������8�ž���������110101000001��</a></p>
<div class="bb"><a href=""><img src="108_40_zZOKnl.gif" /></a><a href=""><img src="108_40_OaNIwt.jpg" /></a><a href=""><img src="112_40_WvArIl.png" /></a></div>
</div>



</div>

</div>
<script type="text/javascript" language="javascript">X();
function r(){
var b=$("cb^A"),c=$("cc^A"),g=$("cg^A"),r=$("cr^A"),e=$("ce^A"),q=$("cq^A");
<?php echo 'C(b['.$b.'],"r2o");C(c['.$c.'],"r2o");C(r['.$r.'],"r2o");C(g['.$g.'],"r2o");C(q['.$q.'],"r2o");C(e['.$e.'],"r2o");
for(I=0;I<L(b);I++){b[I].href="http://localhost:8080/shop.v-get.com/products/2312-"+I+"-'.$c.'-'.$g.'-'.$r.'-'.$e.'-'.$q.'.html"}
for(I=0;I<L(c);I++){c[I].href="http://localhost:8080/shop.v-get.com/products/2312-'.$b.'-"+I+"-'.$g.'-'.$r.'-'.$e.'-'.$q.'.html"}
for(I=0;I<L(g);I++){g[I].href="http://localhost:8080/shop.v-get.com/products/2312-'.$b.'-'.$c.'-"+I+"-'.$r.'-'.$e.'-'.$q.'.html"}
for(I=0;I<L(r);I++){r[I].href="http://localhost:8080/shop.v-get.com/products/2312-'.$b.'-'.$c.'-'.$g.'-"+I+"-'.$e.'-'.$q.'.html"}
for(I=0;I<L(e);I++){e[I].href="http://localhost:8080/shop.v-get.com/products/2312-'.$b.'-'.$c.'-'.$g.'-'.$r.'-"+I+"-'.$q.'.html"}
for(I=0;I<L(q);I++){q[I].href="http://localhost:8080/shop.v-get.com/products/2312-'.$b.'-'.$c.'-'.$g.'-'.$r.'-'.$e.'-"+I+".html"}
';
?>

}
r();
var img=$('c^IMG');
for(I=0;I<L(img);I++){
E(img[I],'mouseover',function(){this.style.borderColor="#f90"});
E(img[I],'mouseout',function(){this.style.borderColor="#fff"});
}

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
