(function(){var z=$('wtz'),t=$('wt'),s=$('ws');
E(t,$8,function(){H(this,'[切换城市]');});E(t,$9,function(){H(this,$g(this,'wtz'));});

var w=I;

E(s,$8,function(){if(w)this.style.backgroundPosition="0px -106px"});
E(s,$9,function(){if(w)this.style.backgroundPosition="0 -78px"});
E(s,$7,function(){this.style.backgroundPosition="0 -134px";w=O});
E($('^body')[0],'mousedown',function(){s.style.backgroundPosition="0 -78px";w=I});

E($('wt'),$7,function(){D(z,1);});

E($('^a.pr')[0],$7,function(){D(z)});
E($('^div.v')[0],$7,function(){D(z)});

F($('^td',z),function(o){E(o,$7,function(){F($('^td',this.parentNode.parentNode),function(t){C(t,'')});C(this,'wtzo');var a=$('^td.wtzo')[0],b=$('^td.wtzo')[1],h=H(a)+$s(H(b),0,2),k='['+h+']';
H($('^span',z)[0],h);
s.action=$2+$g(a,'wtz')+'.wuliu.v-get.com/'+$g(b,'wtz')+'/';
H(t,k);t.setAttribute('wtz',k);s.sk.placeholder='搜索'+h;});

E(o,$8,function(){C(this,C(this)||''+' wtzv')});E(o,$9,function(){C(this,$r(C(this),' wtzv',''));})});
E(s,$7,function(){D(z);});})();