(function(){var s='',f=$('f'),cc=$('^div.cc')[0];H(cc,$r($r(H(cc),/([^<])\//g,'$1 / '),/省\(([^\)]+)\)([\s<])/g,'省（$1）<br>$2'));H(f,H(f)+'<h2 h="网点地图"></h2><div id="map"></div>');
var h=$p(H(f),/<h2 h="[^"]+">[^<]*<\/h2>/g),m=$3.location.hash,bm=(m!='#ditu')?I:O,d=$('d');

function t(i){H(f,h[i]);i++;if(i==L(h)){(function(){var a=$p($g(d,'p'),','),t=$('^a',$('^div.ct')[0]),g=$('^img',$('^div.ci')[0])[0]?$('^img',$('^div.ci')[0])[0].src:'',m=new BMap.Map("map"),p=new BMap.Point(a[0],a[1]),k=new BMap.Marker(p),w;m.centerAndZoom(p,13);m.enableScrollWheelZoom();m.addControl(new BMap.NavigationControl());m.addControl(new BMap.ScaleControl());m.addControl(new BMap.OverviewMapControl());m.addOverlay(k);w=new BMap.InfoWindow('<div class="map"><img width="50" height="50" class="q" src="http://tp.v-get.com/j/3/yiwu/50/'+(/200\/\d+\.jpg/.test(g)?$r(g,/.+\/(\d+)\.jpg$/,'$1'):0)+'.gif" /><div class="p mapc"><p>'+$r(H(cc),/\/\s+[^\s<>]+([\s<])/g,'$1')+'</p><p><a href="'+H(t[3])+'">'+H(t[3])+'</a></p></div></div>',{title:$r(H(t[0]),/.+[市县](.+)/,'$1')});k.openInfoWindow(w);k.addEventListener($7,function(){this.openInfoWindow(w);});})()}}


// t 地图的html，暂时只用坐标
//js 对array操作不需要再等于了
h[1]=h[0]+h[1];h.shift();//移除最前一个元素并返回该元素值，数组中元素自动前移

F($('f^h2'),function(o,i){s+='<a href="#" '+(i==0?'style="border-width:1px" ':'')+((i==0&&bm)?'class="do"':'')+'>'+$g(o,'h')+'</a>'});
H(d,s);
bm?t(0):t(L(h)-1);
//H($('f'),bm?h[0]:t);
F($('d^a'),function(a,i){E(a,$8,function(){F($('d^a'),function(b){C(b,'')});t(i);C(a,'do');});}); 



})();

