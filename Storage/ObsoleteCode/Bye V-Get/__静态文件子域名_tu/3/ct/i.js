
/* id.onsubmit=function(){};  后面逗号不能删掉 */

(function(){
//用于n的下滑




A('na','_self');


/*  JS处理 目录的 hover*/
//  /tuoyun-4/   /tuoyun/s?sk=上海市
F($('na^a'),function(a){C(a,a.href==$r($5.href,/^(.+[a-z]+)[\-\d]*\/.*/,'$1/')?"no":'');});


/*  JS处理 关键词匹配变红，必须放在上面，下面有对$('c')的操作*/
if($k('sk')){
F($p($r($k('sk'),/(^[\s,]*)|([\s,]*$)/g,''),"+"),function(k){if(T(k)){H($("c"),$r(H($("c")),RegExp("(>[^<]{0,})("+k+")([^>]{0,}<)","ig"),"$1<span class=\"f0\">$2</span>$3"))}})}


var iw='',lk=$2+$3.location.host;

/* 这里仅针对本地对location.href调取为localhost执行 */lk='http://localhost/yiwu.wuliu.v-get.com';/* 这里仅针对本地对location.href调取为localhost执行 */
/* 下面是非主页执行的，http://yiwu.wuliu.v-get.com/ 的  lp 是 '/'   所以长度可能是1 也可能是0 */
M($('ar1'),0,1,3000,I,4);M($('ar3'),0,1,3001,I,4);


if(L($('cs').sk.value)>0){$('cs').sk.style.color="#333"}
E($('cs').sk,'input',function(){if(T(this.value))this.style.color="#333";else this.style.color="#BBB"});

E($('cscr'),$7,function(){


var a=1,k=$('cs').sk,sc='',cd=$('csc^div')[0];

function d(){B();D(cd,1)}
function f(o){if(T(H(o))){if(L(k.value)>15)k.value='';k.value+=' '+H(o)};D($('csc^div')[0]);D($('eb'))}
function u(s){H($('csc^tbody')[1],'<tr>'+s+'</tr>');B($('csc^td'),'#DFEDFE','','#fff','');}

//热门搜索采用连接模式，这样可以热门全部

if(!T(iw)&&(a==1||a==5)){

H(cd,H(cd)+'<table class="csc"><thead><tr><th colspan="5">其他省市</th></tr></thead><tbody></tbody></table>');
//ajax不可调用非本网址 
//$A($2+$('scity').value+'.wuliu.v-get.com/a/iw.json'
$A(lk+'/a/pc.json','',O,function(h){
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


/* cs搜索 c部分 */

var cc=$('^div.sc')[0],co='',ch='';
/* 当可以调用js的节目，就使用带c选项的 */
$('cs').sk.style.width="231px";D(cc,I);
F($('^a',$('^li',$('^div.c3')[0])[1]),function(a){
var h=a.href,k=$k('sk'),c=$k('sc','',h);
a.href=k?$r(h,'s?sc','s?sk='+k+'&sc'):h;
/* c （填充部分） 和 $k('sc')都有 false的时候 下面不能用三元，因为还有其他匹配的时候*/
if(c&&c==$k('sc'))co=H(a)+'<input type="hidden" name="sc" value="'+c+'">';
if($i(c)>0){ch+='<li sc="'+c+'">'+H(a)+'</li>';}
});
H(cc,'<div>'+co+'</div><ul><li style="background:none;height:31px;line-height:31px"></li>'+ch+'</ul>');

E(cc,$8,function(){D($('^ul',cc)[0],I)});E(cc,$9,function(){D($('^ul',cc)[0])});
F($('^li',cc),function(l){
E(l,$7,function(){
if(T($g(l,'sc'))){H($('^div',cc)[0],H(l)+'<input type="hidden" name="sc" value="'+$g(l,'sc')+'">');}else{H($('^div',cc)[0],'');}
D($('^ul',cc)[0]);
});
E(l,$8,function(){if(l.style.background!='none')l.style.backgroundColor="#E4EFFF"});
E(l,$9,function(){if(l.style.background!='none')l.style.backgroundColor="#FFF";});
});


/* cs搜索 c部分 */




F($('^a.h2r'),function(e,i){
E(e,$8,function(){this.style.backgroundPosition="0 -955px"});
E(e,$9,function(){if($('^div.cz')[i].style.display!="block"){this.style.backgroundPosition="0 -930px"}});
E(e,$7,function(){var z=this,x=$g(z,'b'),o=$('^div.cz')[i];if(o.style.display!="block"){
//这里是本地，这里需要注意 cs的 action 
$A(lk+"/a/ajax_co.php",x,o,function(){A('c','_blank')});


D(o,1)}else{D(o);z.style.backgroundPosition="0 -930px"}})}); 

F($('^div.cf'),function(o){if(o){E(o,$8,function(){var x=this;x.style.backgroundColor="#E4EFFF"});E(o,$9,function(){var x=this;x.style.backgroundColor=''})}});

function v(o,t){o.style.visibility=t?'visible':'hidden'};

F($('^div.cv'),function(o){if(o){E(o,$8,function(){var x=this;F($('^a',x),function(a){v(a,1)});x.style.backgroundColor="#E4EFFF"});E(o,$9,function(){var x=this;v($('^a',x)[1]);v($('^a',x)[2]);v($('^a.h2r',x)[0]);x.style.backgroundColor=''})}});

var dca=$('dc^a'),dci=$('dc^img'),doa=$('do^a');
H($('dk'),'<a href="'+dca[0].href+'">'+dci[0].alt+'</a>');

function MD(h,n){var a=$('do^a'),l=L(a);if(n==0||n)$('d').scrollTop=n*h;else {n=$('d').scrollTop/h;if(n==l-1)n=0;else n++}H($('dk'),'<a href="'+dca[n].href+'">'+dci[n].alt+'</a>');F(a,function(o){C(o,'')});C(a[n],'do')} ;

F(doa,function(a,i){E(a,$8,function(){MD($m($('^li',$('d'))[0],0),i)})});
	M($('d'),0,1,5000,I,MD);
	//时间不能设定为一样，否则有问题
	M($('^div.dfl')[0],0,60,5001,I);})()

	



})();

