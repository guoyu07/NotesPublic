H($('test'),'<div id="fmap"></div>');(function(){var m=new BMap.Map("fmap"),p=new BMap.Point(120.083163,29.336384),k=new BMap.Marker(p),w;m.centerAndZoom(p,13);m.enableScrollWheelZoom();m.addControl(new BMap.NavigationControl());m.addControl(new BMap.ScaleControl());m.addControl(new BMap.OverviewMapControl());m.addOverlay(k);w=new BMap.InfoWindow('<div class="fmap"><img src="http://www.v-get.com/www.v-getimg.com/i1/s3/50/1.gif" /><div><p>江东货运市场2区65号<br>龚惠玲 0579-85389328/85852929/13606893869<br>广西省(全州县→兴安县→灵川县 龙胜县→桂林市 雁山区→阳朔县→平乐县 恭城县 荔浦县 蒙山县→贺州市→梧州市→玉林市 贵港市 北海市 湛江市 钦州市)</p><p><a href="http://wuliu.v-get.com/1">http://wuliu.v-get.com/1</a></p></div></div>',{title:"义乌市江东龚大姐恒昌物流"});k.openInfoWindow(w);k.addEventListener($7,function(){this.openInfoWindow(w);});})();