

(function(){
var iw='';
M($('ar1'),0,1,3000,I,4);M($('ar3'),0,1,3001,I,4);
$('cs').onsubmit=function(){var k=this.sk,v;$S(k);v=k.value;if(T(v)){v=$r(v,'襄樊','襄阳');v=$r(v,'礼陵','醴陵');v=$r(v,'拖运','托运');k.value=v;this.submit()}}

E($('cscr'),$7,function(){


var a=1,k=$('cs').sk,sc='',cd=$('^div.csd')[0];

function d(){B();D(cd,1)}
function f(o){if(T(H(o))){$S(k);if(L(k.value)>15)k.value='';k.value+=' '+H(o)};D($('csc^div')[0]);D($('eb'))}
function u(s){H($('csc^tbody')[1],'<tr>'+s+'</tr>');B($('csc^td'),'#DFEDFE','','#fff','');}

//热门搜索采用连接模式，这样可以热门全部

if(!T(iw)&&(a==1||a==5)){
H(cd,H(cd)+'<table class="csc"><thead><tr><th colspan="5">其他省市</th></tr></thead><tbody></tbody></table>');
//ajax不可调用非本网址 
//$A($2+$('scity').value+'.wuliu.v-get.com/a/iw.json'
$A($2+'localhost/www.v-get.com/wuliu/a/pc.json','',O,function(h){
var r,n,c1=$('csc^table')[1];iw=eval("("+h+")").w;r=function(){sc='',n=0;F(iw,function(v,i){sc+='<td p="'+v.i+'" i="'+i+'">'+v.s+v.a+'</td>';if(n<4)n++;else {sc+='</tr><tr>';n=0}});u(sc);
H($('csc^th')[1],'其他省市');f2();}
r();d();
function f2(){
F($('^td',c1),function(o){E(o,$7,function(){var g=$g(this,'p'),m=H(this),l=$s(m,0,(L(m)-1));
if(L(g)==2){n=1;/*这里因为开头要放一个省，所以*/sc='<td>'+l+'</td>';
F(iw[$g(this,'i')].c,function(e,ei){sc+='<td>';for(var y in e){sc+=e[y]};sc+='</td>';if(n<4)n++;else {sc+='</tr><tr>';n=0}});
u(sc);
H($('^th',c1)[0],l+'<a href="javascript:void(0)">[其他省份]</a>');
F($('^td',c1),function(j){E(j,$7,function(){f(this)})})

E($('^a',c1)[0],$7,r);

} 

else f(this)})})
}
});
}
else d();

A('csc','_self');

E($('^a.pr',$('csc^div')[0])[0],$7,f);

});




F($('^a.h2r'),function(e,i){
E(e,$8,function(){this.style.backgroundPosition="0 -955px"});
E(e,$9,function(){if($('^div.cz')[i].style.display!="block"){this.style.backgroundPosition="0 -930px"}});
E(e,$7,function(){var z=this,x=$g(z,'b'),o=$('^div.cz')[i];if(o.style.display!="block"){$A($2+"localhost/"+$('scity').value+".wuliu.v-get.com/j/ajax_wuliu",x,o,function(){A('c','_blank')});D(o,1)}else{D(o);z.style.backgroundPosition="0 -930px"}})}); 


function v(o,t){o.style.visibility=t?'visible':'hidden'};

F($('^div.cv'),function(o){E(o,$8,function(){var x=this;F($('^a',x),function(a){v(a,1)});x.style.backgroundColor="#E4EFFF"});E(o,$9,function(){var x=this;v($('^a',x)[1]);v($('^a',x)[2]);v($('^a.h2r',x)[0]);x.style.backgroundColor=''})});



H($('dc'),'');
var MK=[{"l":$2+'yiwu.wuliu.v-get.com/tuoyun/s?sc=2&sk=',"p":$2+"localhost/www.v-getimg.com/i8/238x215/wuliu_yiwu_0.jpg","k":'浙江最大货运市场——江东货运市场'},{"l":$2+'yiwu.wuliu.v-get.com/tuoyun/s?sc=2&sk=%E7%A6%8F%E5%BB%BA',"p":$2+"localhost/www.v-getimg.com/i8/238x215/wuliu_yiwu_1.jpg","k":'义乌泰达托运，泉州、福州'},{"l":$2+'yiwu.wuliu.v-get.com/banjia/',"p":$2+"localhost/www.v-getimg.com/i8/238x215/wuliu_yiwu_2.jpg","k":'义乌捷锐搬家，钢琴搬运'},{"l":$2+'yiwu.wuliu.v-get.com/banjia/',"p":$2+"localhost/www.v-getimg.com/i8/238x215/wuliu_yiwu_3.jpg","k":'义乌四喜搬家，用心服务'},{"l":$2+'yiwu.wuliu.v-get.com/tuoyun/s?sc=2&sk=%E5%B9%BF%E4%B8%9C',"p":$2+"localhost/www.v-getimg.com/i8/238x215/wuliu_yiwu_4.jpg","k":'义乌托运到广东，一路顺风'}];
H($('dk'),'<a href="'+MK[0].l+'">'+MK[0].k+'</a>');
function MD(h,n){var a=$('do^a'),l=L(a);if(n==0||n)$('d').scrollTop=n*h;else {n=$('d').scrollTop/h;if(n==l-1)n=0;else n++}H($('dk'),'<a href="'+MK[n].l+'">'+MK[n].k+'</a>');F(a,function(o){C(o,'')});C(a[n],'do')} ;
for(var i=0;i<5;i++){
	var a=$('do^a'),k=MK[i],r=k.l;
	a[i].href=r;E(a[i],$8,function(){for(i=0;i<5;i++)if(a[i]==this)MD(215,i)});
	$('dc').innerHTML+='<li><a href="'+r+'"><img src="'+k.p+'" /></a></li>'}
	M($('d'),0,1,5000,I,MD);
	//时间不能设定为一样，否则有问题
	M($('^div.dfl')[0],0,60,5001,I);
	
	

A('n','_self');

})();

