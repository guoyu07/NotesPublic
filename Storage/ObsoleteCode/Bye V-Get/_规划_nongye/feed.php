<?php
require('c.php');
/*�г����۸���Ϣ�����ߵ��򣺰�ũ��Ʒ�����๩�赥��������(�й�)ũó��-ũ��Ʒ�����г���nongmao.v-get.com����wuliu��Щ�����Ӧ�̺�������*/
$n=array('�̡̳����� ��ţ ����','����','����','Ʒ��','����','�ؾ�','����','����','�ٿ�','����');
$C=$_GET['c'];
$c=($C<1)?'':'c='.$C.' AND';
$B=$_GET['b'];
$b=($B<1)?'':'b='.$B.' AND';
$p=$_GET['p'];

$w=$c.$b.' a=1';
$pl='http://localhost:8080/nongye.v-get.com/feed-'.$B.'-'.$C;

$WT="SELECT COUNT(i) FROM c WHERE $w";

$QT=mysql_fetch_array(mysql_query($WT));
$PT=$QT[0];$pT=ceil($PT/24);
$P=($p-1)*24;
$W="SELECT * FROM c WHERE $w LIMIT $P,24";
$q=mysql_query($W);
$ps='';
if($pT>1){
$pp=$p-1;$pn=$p+1;$p0=1;$p9=$pT+1;	
if($p>1){$ps='<a href="'.$pl.'-'.$pp.'/">��һҳ</a>';}
/*if($pT>5){if($p<3){$p9=6;}else if($p>$pT-2){$p0=$pT-4;}else{$p0=$p-2;$p9=$p+3;}}
for($I=$p0;$I<$p9;$I++){if($I==$p){$px='class="po"';}else{$px='';}echo '<a href="'.$pl.'-'.$I.'/" '.$px.'>'.$I.'</a>';}*/
$ps.='<a class="po">'.$p.'</a>';
if($p<$pT){$ps.='<a href="'.$pl.'-'.$pn.'/">��һҳ</a>';}
}
//echo mb_convert_encoding ("�Ա�", "HTML-ENTITIES", "gb2312");    //�����&#20320;&#22909;
//echo mb_convert_encoding ("&#20320;&#22909;", "gb2312", "HTML-ENTITIES");    //��������   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="gb2312"><head><title>��ֳ<?php echo $n[$B]?></title>
<!--�����������г��������ļ����Ժ���˵-->
<meta content="text/html; charset=gb2312" http-equiv="content-type" />
<meta name="keywords" content="��ó ���� ���� ��Դ ��Դ" />
<link href="http://localhost:8080/v-get.com/c/favicon.ico" type="image/ico" rel="shortcut icon" />
<!--�ҿ��ö��վ�������ף�Ѹ�ף�css�ļ���д��ҳ���ڲ�����һ���ǵ���дһ��css�ļ���ҳ�����ã�����������ʲô�������Ҿ��ÿ�������Ч�ʵ�����ɣ����Ϻ����һ����л���ˡ���Ȼ��������һ��ҳ���һ���������������ˣ�����ֳɶ���ļ�������Ҫ�ü������������ɣ�Ҳ����˵������԰�css��������һ�������£������Ϳ���ͬ��������վ��ȥ����ҳ��Ͷ�Ӧ��css�ļ�����ͺñȴ�����վ����ͼƬ�����ڵ����������£��Է�̯ҳ�������ѹ������Ȼ�������ֻ��һ�ε�css���������ã����Ƕ����ȽϺá�gb2312������ ������ң����Ծ��Լ������ĵ�ҳ�����gb2312 -->
<link rel="stylesheet" type="text/css" href="shengchu.css" />
<link rel="stylesheet" type="text/css" href="http://localhost:8080/v-get.com/nongye/shengchu.css" />
</head>
<script type="text/javascript" src="http://localhost:8080/v-get.com/c/c.js"></script>
<script type="text/javascript" src="http://localhost:8080/v-get.com/i/wuliu/ajax_index.js"></script>
<body>
<div class="w">
<div class="t">
<a href="http://www.v-get.com/"><strong>V-Get!</strong></a><a href="#">��ó</a>-<a href="#">��Ѷ</a>-<a href="#">����</a>-<a href="#">�̷�</a>-<a href="#">�̾�</a>-<a href="">����</a>-<a href="">����</a><span class="q"><a href="">��¼</a></span>
</div>


<div class="u">
<div class="p i"><a title="��ǣ�������ӷ��㣡" href="#"><img src="http://localhost:8080/v-get.com/i/i.gif" /></a></div>
<div class="q g">
<div class="gt">
<ul>
<li><a href="ci1.php">����</a><a href="">����</a><a href="">�Ƽ�</a><a href="">����</a></li><li><a href="ci3.php">�豸</a><a href="">�豸</a><a href="">��</a><a href="">��Ӧ</a><a href="">�ƾ�</a></li><li><a href="i.htm?bb=0">�ۺ�</a><a href="i1.htm?bb=1">����</a><a href="i2.htm?bb=2">԰��</a><a href="i3.htm?bb=3">������</a></li>
</ul>
<ul><li><a href="ci2.php">��Ʊ</a><a href="">��Ʊ</a><a href="#">��Ʊ</a><a href="http://localhost:8080/v-get.com/p.v-get.com/c.php">�˹�</a></li><li><a href="http://localhost:8080/v-get.com/c.php">���</a><a href="http://localhost:8080/v-get.com/c.php?a=3">����</a><a href="http://localhost:8080/v-get.com/c.php?a=1">���</a><a href="">���</a><a href="">����</a></li><li>fsafsfsdfs
</li>
</ul>
</div>
<div class="gb">
 <!--�����Ϳ��ռ��ؼ���/����ʡ�������*2�������*1-->
   <a href="#"><b>����</b></a>
   <a href="../search.php">������ʾ</a>
   <a href="i.php?a=3">����</a>
   <a href="i.php?a=3157">��������</a>
   <a href="../_liandong.php">��������</a>
   <a href="i.php">��ҳ��ֿ�</a>
   <a href="#">�Ϻ������ѧ</a>
   <a href="#">�Ϻ�������ѧ</a>
   <a href="#">������ҵ��ѧ</a>
   <a href="#">��Ů</a>
   <a href="#">��������ʹ�ϵѧԺ</a>
   <a href="#">����</a>
</div>
</div>
<!--end of class=G-->
</div>
<div class="w3">
<div class="p w3l"><img src="http://localhost:8080/v-get.com/i/wuliu/a/ci7gg1.gif" /></div>
<div class="q w3r"><ul><li><a href="#">6Сʱ����ѧӢ����ؾ�--�������</a></li>
<li><a href="#">6Сʱ����ѧӢ����ؾ�--�������</a></li>
<li><a href="#"><span class="f9">6Сʱ����ѧӢ����ؾ�--�������</span></a></li>
<li><a href="#">6Сʱ����ѧӢ����ؾ�--�������</a></li>
</ul></div></div>


<DIV class="o n"><div class="p"><A href="http://localhost:8080/farm.v-get.com/feed/">��ҳ</A><A href="http://localhost:8080/farm.v-get.com/feed-1-<?php echo $C;?>/">����</A><A href="http://localhost:8080/farm.v-get.com/feed-2-<?php echo $C;?>/">�����г�</A><A href="http://localhost:8080/farm.v-get.com/feed-3-<?php echo $C;?>/">ѡ������</A><A href="http://localhost:8080/farm.v-get.com/feed-4-<?php echo $C;?>/">��������</A><A href="http://localhost:8080/farm.v-get.com/feed-5-<?php echo $C;?>/">��ֳ�ؾ�</A><a href="http://localhost:8080/farm.v-get.com/feed-6_<?php echo $C;?>/">����</a><A href="http://localhost:8080/farm.v-get.com/feed-7-<?php echo $C;?>/">�ӹ�����</A><A href="http://localhost:8080/farm.v-get.com/feed-8-<?php echo $C;?>/">�����ٿ�</a><A href="http://localhost:8080/farm.v-get.com/feed-9-<?php echo $C;?>/">��ֳ����</A></div><form class="q ns" action="a.php" method="post"><div id="nss" class="p"><label>����</label><ul><li value=1>���</li><li value=2>�ִ�</li><li value=4>���</li><li value=5>����</li><li value=6>��Դ</li><li value=7>����</li><li value=8>����</li></ul></div>
<input type="hidden" id="ZZZZZ" value=3>
<input type="text" name="" class="nsk"/>
<input type="image" class="nss" src="http://localhost:8080/v-get.com/i/yule/nss.png" /></form>
</div>


<div class="o e">
<span class="el"><a href="#">ý��ͷ��</a></span>
<div id="m0">
<ul id="m0c">
<li><a href="#">ý��ͷ�������29�����֣����԰����ܶණ���������</a></li>
<li><a href="#">��һ�ж���Ϊ��ʲô��Ҫ�뿪�ң�</a></li>
<li><a href="#">1111111111111�ң�</a></li>
<li><a href="#">222222222222��</a></li>
<li><a href="#">333333333333333��</a></li>
<li><a href="#">444444444444444�ң�</a></li>
<li><a href="#">5555555555</a></li>
<li><a href="#">5555555666666�ң�</a></li>
</ul>
</div>
<span><a href="2033/">��ע</a></span>
<div id="m1">
<ul id="m1c">
<li><a href="#">�ȵ��ע�������14������</a></li>
<li><a href="#">����������ˣ�</a></li>
<li><a href="#">�������������</a></li>
<li><a href="#">����������֣�</a></li>
<li><a href="#">����������Ʋʡ�</a></li>
<li><a href="#">�Ǻ��ϵĽ�����</a></li>
<li><a href="#">��Ϧ���е�����</a></li>
<li><a href="#">���������Ӱ��</a></li>
</ul></div>

<form action="#" class="q"><input type="text" class="es0" value="������ؼ���" name="word"/> <input type="submit" class="es1"  value="����" /></form>
 <select><option>����</option><option>����</option><option>����</option></select>
</div>

<!--id=ln1   height=1144-->

<!--����class=l-->
<div class="w6"> <img src="http://localhost:8080/v-get.com/i/wuliu/a/zzidc980.gif" /> </div>
<div class="v">
<div class="p l">
<!--d height:244px-->

<div class="d">
<div id="d">
<ul id="dc">
<li><a href="1"><img src="http://localhost:8080/v-get.com/c/farm/a/d1202050912170.jpg" /></a></li>
</ul>
</div>
<div id="dk"><a href="">1.�˻�������һ·�ɾ�����</a></div><div class="db"></div>
<div class="df"><a href="#">����������������ë</a><span id="do"><a href="#" class="do">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a></span></div>
</div>

<!------------ѭ���ṹ--->
<div class="lw">
<ul><li><a href="#" class="br">��������������,������Σ������ʾ����</a> </li>

<li>[<a href="#">Σ������</a>]<a href="#">�������,��ν��δ����ciq</a></li>
</ul>
</div>

<div class="lw">
<h2><a href="#" class="p">��Ϣ�ƹ�</a><a class="q" href="#">����&gt;&gt;</a></h2>
<ul class="l3c">
<li><a href="#">����30�ֳ�����������</a></li>
<li><a href="#">����3λ���ڵ���������λ</a></li>
<li><a href="#">����3λ���ڵ���������λ</a></li>
<li><a href="#">����3λ���ڵ���������λ</a></li>
<li><a href="#">��Ӧ��3λ���ڵ���������λ</a></li>
<li><a href="#">��Ӧ��3λ���ڵ���������λ</a></li>
<li><a href="#">��Ӧ��3λ���ڵ���������λ</a></li>
<li><a href="#">��Ӧ��3λ���ڵ���������λ</a></li>
</ul>
</div>
<div class="l4"><!--88px-->
<img src="http://localhost:8080/v-get.com/i/wuliu/a/l.gif" />
</div>
<div class="lw">
<h2><a href="#" class="p">���ű���</a><a class="q" href="#">����&gt;&gt;</a></h2>
<div class="l5t">
<dl><dt><a href="#"><img src="http://localhost:8080/v-get.com/i/wuliu/a/a6.jpg" /></a></dt>
  <dd><span><a href="#"><font color="#000000"><b>��ӭups��פv-get��������</b></font></a></span><br /><span>�永2��532��Ԫ����׷��4240�򣬶���7000���ʻ򷿲�<a class="mo2" href="#">[��ϸ]</a></span></dd>
</dl>
</div>
<ul class="l_b">
  <li><a href="#"><font color="#990000">����</font>��Ҫ�齨�й����ġ�������õ�������˾</a> </li>
  <li><a href="2011-02/1520032"><font color="#0000ff">˳���ٵ�</font>����ʵ�ݡ����˳����ȥ</a></li>
  <li><a href="2011-02/1520032"><del>Բͨ����</del>��ʵ��ԲͨԱ������ͻ����</a></li>
  <li><a href="2011-02/1520032"><font color="#ff6633">������</font>����ף�����������ܲ�</a></li>
  <li><a href="2011-02/1520032"><font color="#00ff00">�κ����</font>������죬���ڼκ����¾Ӵ��Ż�</a></li>
  </ul>
 </div>



 </div>
<!--class=l����-->
 
 

<div class="p c">

<div class="cw cs">
<form action="javascript:void(0)" onsubmit="javascript:form();return">

<label id="z0" for="zb">����</label><input type="hidden" id="zb" value="000"/>
<select id="sa"  onchange="ajax_c()"><option></option><option value="1">����</option><option value="2">�۸�</option><option value="3">ѡ������</option><option value="4">��������</option><option value="5">��ֳ��ʽ</option><option value="6">����</option><option value="7">�ӹ�����</option><option value="8">�����ٿ�</option><option value="9">��ֳ����</option></select>
<input type="text" id="sk" onmouseover="this.focus();this.select()"/>

<input type="submit" class="csb" value="" /></form>



</form>


</div>
<div class="cv"><a href="#"><img src="http://localhost:8080/v-get.com/i/wuliu/a/qywlgd.gif" /></a></div>
<div class="c3">
<a href="http://localhost:8080/nongye.v-get.com/feed-0-1-1/" class="a1">����</a><a href="#" class="a1">��</a><a href="#" class="a3">ţ</a>
</div>
<?php 
echo '<div id="pt" class="pg">';
echo $ps;
echo '</div>';
?>
<div class="cw" id="c">
<ul>
<?php 
while($Q=mysql_fetch_array($q)){echo '<li><span>['.$n[$Q['b']].']</span><a href="http://localhost:8080/nongye.v-get.com/feed/'.$Q['i'].'.html">'.$Q['h'].'</a></li>';}?>
</ul>
</div>

<?php 
echo '<div id="p" class="pg">';
echo $ps;
echo '</div>';
?>
</div>

<div class="q r">

<div class="rw">
<h2><a href="" class="p">��������</a><a class="q" href="">����&gt;&gt;</a></h2>
<ul class="rtt">
  <li><img src="http://localhost:8080/v-get.com/i/g/s11.gif" /><a href="#" class="rtbt">������ҵ����Ҫ����������Ϣ</a></li>
  <li><img src="http://localhost:8080/v-get.com/i/g/s16.gif" /><a href="#">���Ǹ��ˣ���ҪѰ����������</a></li>
</ul>
<ul id="a3">
      <li><a href="#">�ɱ䶯90ģ����</a></li>
      <li><a href="#">����һ��̨ʽ���ɾ���ҵӦ�� </a></li>
      <li><a href="#">�㻹����һ���Կ���ô��</a></li>
      <li><a href="#">�㻹����һ���Կ���ô��</a></li>   
</ul>
</div>



<div class="rw">
<h2><a href="" class="p">��ҵչ̨</a><a class="q" href="">����&gt;&gt;</a></h2>
<div class="rt_t">
<dl>
  <dt><a href=""><img src="http://localhost:8080/v-get.com/i/wuliu/a/rg.jpg" border="0" /></a></dt>
   <dd><span><a href=""><font color="000000"><b>����Ʒ�� �ٴ�ȫ��</b></font></a></span></br>
      <span>5.12���������tnt�й�������չ��һϵ�о����ж���</span><a class="mo2" href="">[��ϸ]</a>
  </dd>
</dl>
</div>
<ul class="rt_b">
  <li><a href="5089-1-1" target="_blank">�й������������������һ</a> </li>
  <li><a href="4239-1-1" target="_blank">����Խ��Խ��ȫ ���ڷ��ٰ�ȫ��</a> </li>
</ul></div><!--ʱ�䣺2011-03-13 15:01:40-->


<div class="rw">
<h2><a href="" class="p">���Ż�Ա</a><a class="q" href="">����&gt;&gt;</a></h2>
<ul class="rt_a">
  <li><a href="#">���ڹ�������ˣ��㶫����ר��</a></li>
  <li><a href="#">����С�����˴�</a> <a href="#">���������ר��</a></li>
  <li><a href="#">���ں�ƽ������˾</a><a href="#">�����ٴ���</a></li>
  <li><a href="#">���ڽ�ʯ����ó��˾</a><a href="#">����ʯ������</a></li>
  <li><a href="#">�����ʴﴬ��</a><a href="#">���ڽ�����</a></li>
  <li><a href="#">���ڱش��ң�ȫ�еͼ۳�����¾�</a></li>
</ul></div>


<div id="a4"><!--width:210px ;height =70;��ߴ���λ72n-2-->
<ol>
<li><a href=""><img src="http://localhost:8080/v-get.com/i/wuliu/a/r2.gif" /></a></li>
<li class="rb2"><a href="">�������ǹ��</a></li>
<li><a href=""><img src="http://localhost:8080/v-get.com/i/wuliu/a/r3.gif" /></a></li>
<li class="rb2"><a href="">�������ǹ��</a></li>


</ol>
</div>
</div>

</div>


<div class="banner" id="a5">
<img src="http://localhost:8080/v-get.com/i/wuliu/a/w8.jpg" />
</div>
<ul id="gg4_1">
  <li><a href="" title='�˼�&quot;����&quot;������'>���д�߸�����</a></li>
  <li><a href="35442" title="�����Ը�˫��Ů��">�����Ը�˫��Ů��</a></li>
  <li><a href="41782" title="�㳵�����ɫ�ջ�">�㳵�����ɫ�ջ�</a></li>
  <li><a href="49107" title="�������λ�ĳ�ģ">�������λ�ĳ�ģ</a></li>
  <li><a href="58241" title="�崿�Ŀ�����girl">�崿�Ŀ�����girl</a></li>
  <li><a href="#" title="�Ʒ�Ů�������ջ�">�Ʒ�Ů�������ջ�</a></li>
  <li><a href="#" title="��/��/���������ģ">��/��/���������ģ</a></li>
  <li><a href="#" title="��/��/���������ģ">��/��/���������ģ</a></li>
  <li><a href="#" title="��/��/���������ģ">��/��/���������ģ</a></li>
</ul>
<!--�̶�9��<7����ģʽ-->
<div class="a6"></div>
<div class="b">
<div class="b1">
|<a href="siteinfo/about">�ҵ������</a>
|<a href="siteinfo/copyright">��Ȩ����</a>
|<a href="hezuo/siteinfo">������</a>
|<a href="siteinfo/contact">��ϵ����</a>
|<a href="siteinfo/subscribe">������־Ȧ</a>
|<a href="siteinfo/job">�������Ƹ</a>
|<a href="sitemap">��վ����</a>|
</div>
<ul>
<li><a href="siteinfo/servicelicense">������������Ϣ�������֤</a>
<a href="http://www.miibeian.gov.cn/"> ��icp��10216229��</a></li>
<li><a href="siteinfo/tvlicense">���㲥���ӽ�Ŀ������Ӫ���֤��((��ý)�ֵ�179��)</a></li>
<li><a href="siteinfo/vpermits">���紫��������Ŀ���֤(0108322)</a></li>
<li><a href="siteinfo/icp">��������Ϣ����ҵ��Ӫ���֤��090455</a></li>
<li><a href="siteinfo/druglicense">������ҩƷ��Ϣ�����ʸ�֤��(��)-��Ӫ��-2009-0016</a></li>
<li><a href="siteinfo/tellicense">��ֵ����ҵ�����֤ b2-20090462</a></li>
<li><a href="siteinfo/culture">�����Ļ���Ӫ���֤�������ġ�2010��221�ţ�</a></li>
<li><a href="siteinfo/healthcare">������ҽ�Ʊ�����Ϣ����(��������[2010]��0056��)</a></li>
<li><a href="siteinfo/publication">�������������֤���³���֤��������085�ţ�</a></li>
</ul>
<p>copyright &copy; 2007-2011 magwu inc. all right reserved ��Ȩ����<a href="#" ><img src="#" /></a></p>
</div>


<div id="ec"></div>
<div id="eb"></div>
<div id="z"></div>
<div id="b"></div>
</div>
<script language="javascript" type="text/javascript">
<?php echo 'P('.$p.','.$pT.',"'.$pl.'");';?>

H($('dc'),'');
var MK=[{"l":'http://localhost:8080/farm.v-get.com/feed/29.html',"p":"http://localhost:8080/v-get.com/c/farm/a/d1202050912170.jpg","k":'��ï����ɽ��ɽ ��г����"���"'},{"l":'http://localhost:8080/farm.v-get.com/feed/30.html',"p":"http://localhost:8080/v-get.com/c/farm/a/d1202050912171.jpg","k":'����������ġ�����Ʒ�ơ���ɽ��'},{"l":'http://localhost:8080/farm.v-get.com/feed/3.html',"p":"http://localhost:8080/v-get.com/c/farm/a/d110523095309448.jpg","k":'��ι����ģ����'},{"l":'http://localhost:8080/farm.v-get.com/feed/22.html',"p":"http://localhost:8080/v-get.com/c/farm/a/d0706180000009.jpg","k":'�߳�����ɽ�����������'},{"l":'http://localhost:8080/farm.v-get.com/feed/19.html',"p":"http://localhost:8080/v-get.com/c/farm/a/d1201030844480.jpg","k":'Ҷ������"��"��Ƭ'}];
for(I=0;I<5;I++){
	var a=$('do^A'),k=MK[I],r=k.l;
	a[I].href=r;
	E(a[I],$8,function(){for(I=0;I<5;I++)if(a[I]==this)MD(I)});
	$('dc').innerHTML+='<li><a href="'+r+'"><img src="'+k.p+'" /></a></li>';
	}
M('d',218,5,5000,MD);


$A();
nss_init();
var zn=9;
input(zn);


M('m0',16,30,3000);


Q();B('#eee','^tr');

M('m1',16,30,3000);
M('m2',28,40,3000);/*id,�߶ȣ��ٶȣ����ʱ��*/

</script>
</body></html>
