var O=false,I=true,$2='http://',$3=window,$4=document,$5=$3.location,$7="click",$8="mouseover",$9="mouseout";function $g(o,a,v){return T(v)?o.setAttribute(a,v):o.getAttribute(a)}function $l(s,d){return d?$r(s,/(https?\:\/\/)?([\w\-]+\.)*([\w\-]+\.(?:[a-z]{2}|aero|arpa|asia|com|coop|edu|gov|idv|info|int|net|org|pro|tel|mil|museum|mobi|name|travel)(\.[a-z]{2})?)([\/].*)?$/i,'$3'):s.toLowerCase()}function T(s,t){return(t>0)?(($l(typeof(s))==['','undefined','boolean','number','string','object','function'][t])?I:O):((s!=null&&L(s)>0)?I:O)}function $i(i){return parseInt(i)}function $o(f,t,i){return i?setInterval(f,t):((T(t,3))?setTimeout(f,t):(t?clearInterval(f):clearTimeout(f)))}function $p(s,p){return s.split(p)}function $r(s,a,b){return s.replace(/[\r\n]/g,'').replace(a,b)}function $s(x,f,l){return T(f,3)?x.substr(f,l):x[$i(Math.random()*L(x))]}function $x(s,x,f){return s.indexOf(x,f|0)}function D(o,b){o.style.display=b?'block':'none'}function L(s){return s?s.length:0}function IE(b){var w=$l(navigator.userAgent),s,r;(s=w.match(/msie ([\d.]+)/))?r='i'+s[1]:(s=w.match(/firefox\/([\d.]+)/))?r='f'+s[1]:(s=w.match(/chrome\/([\d.]+)/))?r='c'+s[1]:(s=w.match(/opera.([\d.]+)/))?r='o'+s[1]:(s=w.match(/version\/([\d.]+).*safari/))?r='s'+s[1]:0;return b?r:$p(r,'.')[0]}function S(o,a){return o.currentStyle?o.currentStyle[a]:$4.defaultView.getComputedStyle(o,O)[a]}function SP(o,x,y){var p="px";o.style.backgroundPositionX=x+p;o.style.backgroundPositionY=y+p;o.style.backgroundPosition=x+"px "+y+p}function $C(e,g,h,p){var o=$4.createElement(T(e)?e:'div'),a;if(T(g)){a=$p(g,'=');$g(o,a[0],a[1])}H(o,h);p=T(p,5)?p:$4.body;p.appendChild(o)}function Z(h){if(IE()!='i6'){$C(O,'id=z',h);A();E($('^a.zo')[0],$7,function(){D($('z'))})}}function $k(c,d,l){var r='';c+="=";l=l?l:$5.search;if($x(l,'?')<0)return O;F($p(l?($p(l,'?')[1]):($s($5.search,1)),'&'),function(i){if(c==$s(i,0,L(c)))r=$s(i,L(c));});return T(r)?(d?r:decodeURI(r)):O}function $K(o,s){F($p(s,","),function(k){if(T(k)){H(o,$r(H(o),RegExp("(>[^<]{0,})("+k+")([^>]{0,}<)","ig"),"$1<span class=\"f0\">$2</span>$3"))}})}function $D(i,r){var s=i+'a',a=$(s+'^a'),g,c;F(a,function(o,I){if(I>0)D(r[I]);E(o,$8,function(){g=this;F(a,function(v,j){c=C(v);D(r[j]);C(v,$r(c,RegExp('\s?'+s,'g'),''));if(v==g){D(r[j],1);C(v,$r(c+' ',/\s{2,}/g,' ')+s)}})})})}function C(o,s){if(T(s,4))o.className=s;else return o.className}function F(a,f,y,z){if(a)for(var i=y||0;i<(z||L(a));i++)f(a[i],i)}function E(o,t,f){if($4.addEventListener)o.addEventListener(t,f,O);else o.attachEvent('on'+t,function(){return f.call(o,$3.event)})}function H(o,s){if(!T(s,1))o.innerHTML=s;else return o.innerHTML}function $(i,o){var s=$p(i,'^'),a=s[0],g=function(x){return $4.getElementById(x)},r=T(a)?g(a):O;if(L(a)==0||g(a))if(T(s[1])){var c=$p(s[1],'.'),d=c[0],e=c[1],v=[];o=o?o:$4;o=r?r:o;r=o.getElementsByTagName(d);if(T(e)){F(r,function(o){F($p(C(o),' '),function(c){if(c==e){v=v.concat(o);return}})});r=v}}return r}function $L(l){var d='(v-get.com|weigeti.com)$';l=$r(l,/^https?\:\/\//,'');if(l.match(/^\w+\:\/\/.+$/))return l;if(!l.match(/.+\..+/))return '#';if(!$p(l,'/')[0].match(RegExp($r(d,'.','\.')))){l=encodeURIComponent(l);l='http://s.v-get.com/l?l='+l;}l=($s(l,0,4)=='http')?l:($2+l);return l}
function B(a,b,c,d,e){var i,g=$('eb');d=d?d:'#FFF';if(a){function f(o,u,v,w){if($s(u,0,1)=='#')o.style.backgroundColor=u;else if($x(C(o),w))C(o,$r(C(o),w,u));else C(o,C(o)+' '+u);if(v)o.style.color=v}F(a,function(o){if($l(o.tagName)=="input"){if(T(o.placeholder)){E(o,$7,function(){i=this;if(!T(i.value)){$g(i,'h',i.placeholder);i.placeholder="";f(i,b,c,d)}});E(o,$8,function(){f(this,b,c,d)});E(o,$9,function(){i=this;if(!T(i.value)){if(T($g(i,'h')))i.placeholder=$g(i,'h');f(i,d,e,b)}});}}else{E(o,$8,function(){f(this,b,c,d)});E(o,$9,function(){f(this,d,e,b)});}})}else{if(g)D(g,1);else{g=$4.createElement("div");$g(g,"id",'eb');$4.body.appendChild(g)}}}function A(o,t,y,z){var k='_blank',h,g,l,j="javascript:";F($((T(o)?o:'')+"^a"),function(i){h=i.href;g=i.target;l='s.v-get.com/l?l=';if($s(h,-1)=="#")i.href=j+"void(0)";else if(j!=$s(h,0,11)&&$p(h,"#")[0]!=$4.URL&&$g(i,k)!='_'&&(!T(g)||g==k||t=='_')){i.target=(L(t)>1)?t:k;$g(i,k,t);if($x(h,l)>0){h=$r(h,/%\w{2}/g,function(a){return String.fromCharCode($i('0x'+$s(a,1)))});i.href=$r(h,l,'')}if(L(i.title)<1)i.title=(!T(H(i))||/</.test(H(i)))?i.href:H(i);}},y,z)}function K(k,v,d){var x=$4.cookie,c,e,t=new Date();if(v){t.setDate(t.getDate()+d?d:9);$4.cookie=k+"="+escape(v)+";expires="+t.toGMTString()}else{if(T(x)){c=$x(x,k+"=");if(c!=-1){c=c+L(k)+1;e=$x(x,";",c);if(e==-1)e=L(x);return unescape(x.substring(c,e))}}return""}}function $A(l,v,o,f){var a=null,s,h;try{a=new XMLHttpRequest()}catch(e){try{a=new ActiveXObject("Msxml2.XMLHTTP")}catch(e){a=new ActiveXObject("Microsoft.XMLHTTP")}}a.onreadystatechange=function(){s=a.readyState;if(s==4||s=="complete"){h=a.responseText;if(o)H(o,h);if(f)f(h)}};a.open("POST",l,true);a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");a.send("v="+v)}function $m(o,g){var c,d='border',w='Width',z=g?w:'Height',x=g?'Left':'Top',y=g?'Right':'Bottom';function h(e){return $i($r(S(o,e),/(\d+)px/,'$1'))}c=h($l(z))+h(d+x+w)+h(d+y+w);return c>0?c:$i(g?o.offsetWidth:o.offsetHeight)}function M(o,p,v,t,e,f){var s=I,g=p%2,a=$('^li',o)[0],ps='scroll',d=ps+['Top','Left'][g],k,y,n=e?1:v;function x(x){x?(o[d]-=n):(o[d]+=n)}o[d]=0;E(o,$8,function(){if(e)return s=O;else{$o(y);k=$o(x,t,1)}});E(o,$9,function(){if(e)return s=I;else{$o(k);y=$o(function(){x(I)},t,1)}});if(e){var c=$m(a,g),l,w,u=$('^ul',o)[0],k=H(u),b,r,q=0,z=(p>0&&p<3)?I:O,h;F($('^li',o),function(o){q+=c});h=q*2+"px";g?(u.style.width=h):(u.style.height=h);H(u,k+k);w=o[ps+['Height','Width'][g]],j=z?w:0;o[d]=j/2;l=(T(f,3)?f:1)*c;b=function(){if(s){if(T(f,6))f(c);x(z)};y=$o(r,v,I)};r=function(){if(o[d]%l>0){x(z);if(z?(o[d]<1?I:O):(o[d]>=w/2?I:O))o[d]=j}else{$o(y);$o(b,t)}};$o(b,t)}}function $M(o,r,v,d,u){r=r?r:96;v=Math.PI/(v?v:324);d=d?d:300;u=u?u:200;var z=[],s=O,lasta=1,g=1,q=I,c=0,l=0,a=$('^a',o);function f(a,b,c){sa=Math.sin(a*v);ca=Math.cos(a*v);sb=Math.sin(b*v);cb=Math.cos(b*v);sc=Math.sin(c*v);cc=Math.cos(c*v)}
F(a,function(a){var i={};i.offsetWidth=a.offsetWidth;i.offsetHeight=a.offsetHeight;z.push(i)});f(0,0,0);var max=L(z),i=0,w=[],fr=$4.createDocumentFragment();F(a,function(a){w.push(a)});w.sort(function(){return Math.random()<0.5?1:-1});F(w,function(a){fr.appendChild(a)});o.appendChild(fr);F(z,function(b,i){var p=q?Math.acos(-1+(2*(i+1)-1)/max):(Math.random()*(Math.PI)),e=q?(Math.sqrt(max*Math.PI)*p):(Math.random()*(2*Math.PI));b.cx=r*Math.cos(e)*Math.sin(p);b.cy=r*Math.sin(e)*Math.sin(p);b.cz=r*Math.cos(p);a[i].style.left=b.cx+o.offsetWidth/2-b.offsetWidth/2+'px';a[i].style.top=b.cy+o.offsetHeight/2-b.offsetHeight/2+'px'});E(o,$8,function(){s=I});E(o,$9,function(){s=O});o.onmousemove=function(e){e=$3.event||e;c=e.clientX-(o.offsetLeft+o.offsetWidth/2);l=e.clientY-(o.offsetTop+o.offsetHeight/2);c/=5;l/=5};$o(p,30,I);function p()
{var m,b;if(s){m=(-Math.min(Math.max(-l,-u),u)/r)*9;b=(Math.min(Math.max(-c,-u),u)/r)*9}else{m=lasta*0.98;b=g*0.98}lasta=m;g=b;if(Math.abs(m)<=0.01&&Math.abs(b)<=0.01){return}
f(m,b,0);F(z,function(a){var j=a.cx,k=a.cy*sa+a.cz*ca,l=j*cb+k*sb,m=a.cy*ca+a.cz*(-sa),n=l*cc+m*(-sc),o=l*sc+m*cc,p=j*(-sb)+k*cb;a.cx=n;a.cy=o;a.cz=p;per=d/(d+p);a.x=(n*per)-(2);a.y=o*per;a.scale=per;a.alpha=per;a.alpha=(a.alpha-0.6)*(10/6)});F(z,function(g,i){var j=a[i];j.style.left=g.cx+(o.offsetWidth-g.offsetWidth)/2+'px';j.style.top=g.cy+(o.offsetHeight-g.offsetHeight)/2+'px';j.style.fontSize=Math.ceil(12*g.scale/2)+8+'px';j.style.filter="alpha(opacity="+100*g.alpha+")";j.style.opacity=g.alpha});w=[];F(a,function(a){w.push(a)});w.sort(function(a,b){if(a.cz>b.cz)return-1;else if(a.cz<b.cz)return 1;else return 0});F(w,function(a,i){a.style.zIndex=i})}}function N(t,z,d,f){d=d?d:'n';var q=d+'a^',p='px',n=$('^div.'+d),o=$(q+'a'),x=L(o),c=$(q+'a')[0],g=$i($r(S(c,'marginLeft'),p,'')),e=IE(),v=(e=='i6'||e=='i7')?I:O,u=(v||e=='i9')?I:O;if(v||x!=(L(n)))return;f=T(f,6)?f:function(a,b){if(C(a)!='no'){var h=$i($r(S(a,'height'),p,''));if(b){a.style.background="url("+$2+"tu.v-get.com/f.png) 0 -411px repeat-x";a.style.border="1px solid #94c9ed";a.style.borderBottomWidth="0";a.style.borderTopLeftRadius="3px";a.style.borderTopRightRadius="3px";a.style.width=($i($r(S(a,'width'),p,''))-2)+p;a.style.lineHeight=(u?(h-2):(h-6))+p}else{a.style.width=$m(a,1)+p;a.style.background="none";a.style.border="none";a.style.lineHeight=(u?h:(h-4))+p}}};function k(i){var m=$m($(q+'i')[0],1),r=i==0?0:-m,g=$i($r(S($(q+'a')[0],'marginLeft'),p,''));F($(q+'a'),function(a,k){r+=k<i?($m(a,1)+m):0});return i<Math.ceil(x/2)?(r+(i==0?0:(g*2*i+g*2))+g-1):((t?t:60)*i+(z?z:6))}F(o,function(a,i){var m=n[i];E(a,$8,function(){m.style.left=k(i)+p;f(a,I);if(L(H(m))>0)D(m,I);});E(a,$9,function(){f(a);D(m)});E(m,$8,function(){f(a,I);D(m,I)});E(m,$9,function(){f(a);D(m)});});}function J(l,f,o){var s=$4.createElement("script");s.type="text/javascript";if(s.readyState){s.onreadystatechange=function(){if(s.readyState=="loaded"||s.readyState=="complete"){s.onreadystatechange=null;if(f)f(s)}}}else{s.onload=function(){if(f)f(s)}}s.src=l;(o||$("^head")[0]).appendChild(s)}function $S(k,c){F(['s','+','.','-','?','(',')','{','}','[',']','$','^','*','!','=','\\'],function(r){k=$r(k,RegExp('\\'+r,'g'),'\\'+r);});return $r(k,/\\\\/g,'\\');}(function(){var i=0,e=!!($3.attachEvent&&!$3.opera),w=/webkit\/(\d+)/i.test(navigator.userAgent)&&(RegExp.$1<525),a=[];var r=function(){F(a,function(i){i()})},t;$4.ready=function(f){if(!e&&!w&&$4.addEventListener)return $4.addEventListener('DOMContentLoaded',f,O);if(a.push(f)>1)return;if(e)(function(){try{$4.documentElement.doScroll('left');r()}catch(err){$o(arguments.callee,0)}})();else if(w)t=$o(function(){if(/^(loaded|complete)$/.test($4.readyState))$o(t,I);r()},0,I);};})();function Q(){F($('^*'),function(o){var q=$g(o,'q'),x=$g(o,'o'),v=$g(o,'v'),l='><img src="'+$2;if(T(q)){var q=$p(q,'^'),s='',h='height="',w='" width="';for(var j in q){s+='<a target="_blank" href="';var c=$s(q[j],1);switch($s(q[j],0,1)){case'K':s+=$2+c+'" title="在线客服"'+l+'tu.v-get.com/g/qk.gif" '+h+'21'+w+'21';break;case'J':s+=$2+c+'" title="查看价格"'+l+'tu.v-get.com/g/qj.gif" '+h+'21'+w+'21';break;case'W':s+=$2+c+'" title="网址链接"'+l+'tu.v-get.com/g/qw.gif" '+h+'21'+w+'21';break;case'E':s+='mailto:'+c+'" title="发送邮件"'+l+'tu.v-get.com/g/qe.gif" '+h+'21'+w+'21';break;case'D':s+=$2+c+'" title="查看地图"'+l+'tu.v-get.com/g/qd.gif" '+h+'21'+w+'21';break;case'Q':s+=$2+'wpa.qq.com/msgrd?v=3&uin='+c+'&site=v-get&menu=yes'+'" title="QQ联系"'+l+'wpa.qq.com/pa?p=1:'+c+':45" '+h+'21'+w+'21';break;case'A':s+=$2+'www.taobao.com/webww/ww.php?ver=3&touid='+c+'&siteid=cntaobao&status=2&charset=utf-8'+'" title="阿里旺旺"'+l+'amos.alicdn.com/realonline.aw?v=2&uid='+c+'&site=cntaobao&s=2&charset=utf-8" '+h+'16'+w+'16';break;case'S':s+='skype:'+c+'?call" on-click="return skypeCheck();'+'"'+l+'mystatus.skype.com/smallicon/'+c+'" '+h+'16'+w+'16';break}s+='" /></a>'}H(o,s)}if('sidebar'==o.rel){E(o,$7,function(){var l=o.href,t=o.title;o.href='#';if($4.all)$3.external.addFavorite(l,t);else if($3.sidebar)$3.sidebar.addPanel(t,l,'');else {alert('请在链接页，使用CTRL+D加入搜藏，或点击浏览器☆状，使其变成★即可搜藏');o.href=(l==$5.href)?'#':l}})}if($i(v)>0){o.style.background="url("+$2+"tu.v-get.com/g.gif) 0 -"+(128+v*25)+"px no-repeat";o.href="#";o.style.width="16px";o.style.height="16px"}
if($i(x)>49)(function(){var i=3,e,y;for(i;i>-1;i--){e=Math.pow(6,i)*50;y=x/e;if(y>=1){o.style.width=$i(y)*16+"px";o.style.height="16px";o.style.background="url("+$2+"tu.v-get.com/h.gif) 0 -"+i*16+"px repeat-x";return O}x=x%e}})();if(C(o).match(/a\d+x\d+/)&&L($r(H(o),/\s/g,''))<1){AD=$r(C(o),/^(.+\s)?a(\d+x\d+)(\s.+)?$/,'$2');H(o,AD);J($2+'tp.v-get.com/j/i.php?a='+AD+'&i='+Math.random(),function(){H(o,AD)})}});}
Q();A();