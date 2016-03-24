var tflag = 1;
if(tflag){
var cs_prov = getCookie('cs_prov');
var cs_city = getCookie('cs_city');
var ccity = getCookie('ccity');
loadJS("weather2.php?a=getZoneInfo&type=0&p="+cs_prov+"&c="+cs_city);
loadJS("weather2.php?a=getWeather&ccity="+ccity);
SetCookie('ccity','');
SetCookie('cs_city','');
SetCookie('cs_prov','');
	tflag=0;
}

function getZoneInfo(json){
	var str = '<select style="width:80px;" id="province" onchange="getcity(this.value)">';
	for(var key in json[1].value){
		if(cs_prov == ''){
			if(json[0].value==key)
				str += "<option value='"+key+"' selected>"+json[1].value[key]+"</option>";
			else
				str += "<option value='"+key+"'>"+json[1].value[key]+"</option>";
		}else{
			if(cs_prov==key)
				str += "<option value='"+key+"' selected>"+json[1].value[key]+"</option>";
			else
				str += "<option value='"+key+"'>"+json[1].value[key]+"</option>";
		}
	}
	str += '</select>';
	$('prv').innerHTML=str;
	str = '';
	str += '<select id="city" style="width:80px;" onchange="getzone(this.value)">';
	for(var key in json[2].value){
		if(cs_city==''){
			if(json[4].value==key)
				str += "<option value='"+key+"' selected>"+json[2].value[key]+"</option>";
			else
				str += "<option value='"+key+"'>"+json[2].value[key]+"</option>";
		}else{
			if(cs_city==key)
				str += "<option value='"+key+"' selected>"+json[2].value[key]+"</option>";		
			else
				str += "<option value='"+key+"'>"+json[2].value[key]+"</option>";
		}
	}
	str += '</select>';
	$('ct').innerHTML=str;
	str = '';
	str += '<select id="zone" style="width:80px;" onchange="set(0)">';
	for(var key in json[3].value){
		if(ccity==''){
			if(json[5].value==key)
				str += "<option value='"+key+"' selected>"+json[3].value[key]+"</option>";
			else
				str += "<option value='"+key+"'>"+json[3].value[key]+"</option>";
		}else{
			if(ccity==key)
				str += "<option value='"+key+"' selected>"+json[3].value[key]+"</option>";
			else
				str += "<option value='"+key+"'>"+json[3].value[key]+"</option>";
		}
	}
	str += '</select>';
	$('zn').innerHTML=str;
}
function set(id){
var p = $('province').value;
var city = $('city').value;
var zone = $('zone').value;
if(id==1){
SetCookie('dcity',zone);
SetCookie('s_city',city);
SetCookie('s_prov',p);
SetCookie('ccity','');
SetCookie('cs_city','');
SetCookie('cs_prov','');
alert("���óɹ���");
}else{
SetCookie('ccity',zone);
SetCookie('cs_city',city);
SetCookie('cs_prov',p);
window.location.reload();
}
}
function getcity(p){
	loadJS("weather2.php?a=getZoneInfo&type=1&pid="+p+"&callback=getcityFun");
}

function getzone(p){
	loadJS("weather2.php?a=getZoneInfo&type=2&cid="+p+"&pid="+$('province').value+"&callback=getzoneFun");
}
function getcityFun(json){
	var str='';
	for(var key in json[0].value){
		str += "<option value='"+key+"'>"+json[0].value[key]+"</option>";
	}
	str = '<select id="city" style="width:80px;" onchange="getzone(this.value)">'+str+'</select>';
	$('ct').innerHTML=str;
	str = '';
	str += '<select id="zone" style="width:80px;" onchange="set(0)">';
	for(var key in json[1].value){
		str += "<option value='"+key+"'>"+json[1].value[key]+"</option>";
	}
	str += '</select>';
	$('zn').innerHTML=str;
}
function getzoneFun(json){
	str = '';
	str += '<select id="zone" style="width:80px;" onchange="set(0)">';
	for(var key in json[0].value){
		str += "<option value='"+key+"'>"+json[0].value[key]+"</option>";
	}
	str += '</select>';
	$('zn').innerHTML=str;
	set(0);
}
function img_re(s){
var r=/tianqibig/g,r1=/20px/g,str='';
str = s.replace(r,'tianqibig');
str = str.replace(r1,'46px');
return str;
}
function wsplit(w){
var ww;
ww = w.split("~");
if(ww[0]>ww[1]){
ww[2]="#ff0000";
ww[3]="#4899be";
}else{
ww[2]="#4899be";
ww[3]="#ff0000";
}
return ww;
}
function getWeather(json){

var s=s1=s2=s3=s4=s5='', d = new Date();
var now='��ǰʱ�䣺';
now+= d.getHours() + ':';
var month = d.getMonth()+1;
var day=d.getDate();
var m = d.getMinutes();
if(m<10)m='0'+m;
now+= m;
var weekday=new Array(7);
 weekday[0]="<font color='red'>������</font>" ;
 weekday[1]="����һ";
 weekday[2]="���ڶ�";
 weekday[3]="������";
 weekday[4]="������";
 weekday[5]="������";
 weekday[6]="<font color='green'>������</font>";
s += weekday[d.getDay()];
s1 += weekday[(d.getDay()+1)%7];
s2 += weekday[(d.getDay()+2)%7];
s3 += weekday[(d.getDay()+3)%7];
s4 += weekday[(d.getDay()+4)%7];
s5 += weekday[(d.getDay()+5)%7];
var str='';var rb='tianqibig';var r='/tianqibig/g';var img1,img3,img5,img7,img9,img11;
img1=img_re(json.weatherinfo.img1);
img3=img_re(json.weatherinfo.img3);
img5=img_re(json.weatherinfo.img5);
img7=img_re(json.weatherinfo.img7);
img9=img_re(json.weatherinfo.img9);
img11=img_re(json.weatherinfo.img11);
temp1 = wsplit(json.weatherinfo.temp1);
temp2 = wsplit(json.weatherinfo.temp2);
temp3 = wsplit(json.weatherinfo.temp3);
temp4 = wsplit(json.weatherinfo.temp4);
temp5 = wsplit(json.weatherinfo.temp5);
temp6 = wsplit(json.weatherinfo.temp6);
str+='<div class="tqshow1"><h3>����('+s1+')</h3><ul><li class="tqpng">'+img3+'</li><li><font color="'+temp2[2]+'">'+temp2[0]+'</font>~<font color="'+temp2[3]+'">'+temp2[1]+'</font></li><li>'+json.weatherinfo.weather2+'</li><li style="height:18px;overflow:hidden">'+json.weatherinfo.wind2+'</li></ul></div>';
str+='<div class="tqshow1"><h3>����('+s2+')</h3><ul><li class="tqpng">'+img5+'</li><li><font color="'+temp3[2]+'">'+temp3[0]+'</font>~<font color="'+temp3[3]+'">'+temp3[1]+'</font></li><li>'+json.weatherinfo.weather3+'</li><li style="height:18px;overflow:hidden">'+json.weatherinfo.wind3+'</li></ul></div>';
str+='<div class="tqshow1"><h3>'+s3+'</h3><ul><li class="tqpng">'+img7+'</li><li><font color="'+temp4[2]+'">'+temp4[0]+'</font>~<font color="'+temp4[3]+'">'+temp4[1]+'</font></li><li>'+json.weatherinfo.weather4+'</li><li style="height:18px;overflow:hidden">'+json.weatherinfo.wind4+'</li></ul></div>';
str+='<div class="tqshow1"><h3>'+s4+'</h3><ul><li class="tqpng">'+img9+'</li><li><font color="'+temp5[2]+'">'+temp5[0]+'</font>~<font color="'+temp5[3]+'">'+temp5[1]+'</font></li><li>'+json.weatherinfo.weather5+'</li><li style="height:18px;overflow:hidden">'+json.weatherinfo.wind5+'</li></ul></div>';
str+='<div class="tqshow1"><h3>'+s5+'</h3><ul><li class="tqpng">'+img11+'</li><li><font color="'+temp6[2]+'">'+temp6[0]+'</font>~<font color="'+temp6[3]+'">'+temp6[1]+'</font></li><li>'+json.weatherinfo.weather6+'</li><li style="height:18px;overflow:hidden">'+json.weatherinfo.wind6+'</li></ul></div>';
$('detail').innerHTML=str;
//var t_day = month+'��'+day+'��'+s;

var today='<h2>'+json.weatherinfo.city+'('+json.weatherinfo.city_en+')</h2><div class="jttq"><div class="tqshow"><ul><li class="tqpng">'+img1+'</li><li class="fon14 fB"><span id="t_temp"><font color="'+temp1[2]+'">'+temp1[0]+'</font>~<font color="'+temp1[3]+'">'+temp1[1]+'</font></span></li><li class="cDRed">'+json.weatherinfo.weather1+'</li><li style="height:18px;overflow:hidden">'+json.weatherinfo.wind1+'</li></ul><input type="hidden" value="'+json.weatherinfo.city+'" id="t_city"></div></div>';           
$('today').innerHTML=today; 
var index_uv = {"ǿ":{"col":"red","cont":"�����߷���ǿ������Ϳ��SPF20���ҡ�PA++�ķ�ɹ����Ʒ��������10����14�㱩¶���չ��¡�"},"�е�":{"col":"green","cont":"���е�ǿ�������߷������������ʱ����Ϳ��SPF����15��PA+�ķ�ɹ����Ʒ����ñ�ӡ�̫������"},"��ǿ":{"col":"red","cont":"������������������ʱ��Ҫ��ȡһ���ķ�����ʩ"},"��":{"col":"green","cont":"������ǿ�Ƚ������������ǰͿ��SPF��12-15֮�䡢PA+�ķ�ɹ����Ʒ��"},"����":{"col":"green","cont":"���Բ���ȡ��ʩ"},"��ȱ":{"col":"green","cont":"������ȱ"},"":{"col":"green","cont":"������ȱ"}};
var index_xc = {"����":{"col":"red","cont":"����ϴ����δ��24Сʱ�����꣬����ڴ��ڼ�ϴ������ˮ��·�ϵ���ˮ���ܻ��ٴ�Ū�����İ�����"},"����":{"col":"green","cont":"����ϴ����δ�������������������Ϻã��ʺϲ�ϴ������������ơ���������������ĳ������սྻ��"},"������":{"col":"green","cont":"������ϴ����δ��һ�����꣬������С����ϴһ�µ����������ܱ���һ�졣"},"�ϲ���":{"col":"red","cont":"�ϲ���ϴ����δ��һ�����꣬�����ϴ����ִ���ϴ������Ҫ���������۹�������׼����"},"":{"col":"green","cont":"������ȱ"}};
var index_tr = {"������":{"col":"green","cont":"�������ʣ�����������¶����ˣ��Ǹ�������Ŷ���������������������Σ������Ծ�������ܴ���Ȼ�ķ�⡣"},"һ��":{"col":"green","cont":"�������ʣ��������ƣ��¶����˵������󣬿��ܶ����ĳ��в���һ����Ӱ�죬�������ע����硣"},"������":{"col":"red","cont":"������������ܶ����ĳ��в���һ����Ӱ�죬�������ע����硣"},"�ܲ�����":{"col":"red","cont":"����������ܲ����������"},"����":{"col":"green","cont":"�����꣬�¶����ˣ���ϸ�����������һ��������ɲ�Ҫ��������ϣ����ǵó���ҪЯ����ߡ�"},"������":{"col":"green","cont":"�������ʣ��������ơ����ȵ����Դ��ܻ���Щ���ȵĸо������������Σ����Կ������ڴ���Ȼ���÷���С�"},"��ȱ":{"col":"green","cont":"������ȱ"},"�ϲ���":{"col":"red","cont":"Ԥ����С�꣬��������󣬿��ܶ����ĳ��в���һ����Ӱ�죬���������Σ��������ע����籣ů��"},"":{"col":"green","cont":"������ȱ"}};
var index_co = {"������":{"col":"green","cont":"����������ã������������������£���о�������ˬ�����ʣ����ƫ�ȡ�"},"�ϲ�����":{"col":"red","cont":"�����������������£�Ӧ��е��Ƚϲ���ˬ�Ͳ����ʡ�"},"������":{"col":"red","cont":"�����������������£�Ӧ��е�����ˬ�Ͳ����ʡ�"},"�ܲ�����":{"col":"red","cont":"����������ã���������������е����ȣ��ܲ����ʡ� "},"����":{"col":"green","cont":"���첻̫��Ҳ��̫�䣬�������������������������������£�Ӧ��е��Ƚ���ˬ�����ʡ�"},"��ȱ":{"col":"green","cont":"������ȱ"},"":{"col":"green","cont":"������ȱ"}};
var index_cl = {"����":{"col":"green","cont":"�������ʣ��������£����������Ĵ��ʱ�������鲻ͬ����ε����ǻ����μӻ��⽡����"},"������":{"col":"green","cont":"�糿�������������˳������������Դ󣬳���ʱ��ע��ѡ��ܷ�ĵص㣬����ӭ�������"},"�ϲ���":{"col":"red","cont":"�����ϴ󣬽ϲ��˳�������������������Ⱥ�ʵ����ٳ���ʱ�䣬����������������ѡ��ܷ�ĵص㡣"},"����":{"col":"red","cont":"�����ϴ󣬽ϲ��˳�������������������Ⱥ�ʵ����ٳ���ʱ�䣬����������������ѡ��ܷ�ĵص㡣"},"�ܲ���":{"col":"red","cont":"�����ϴ󣬺ܲ��˳�����"},"��ȱ":{"col":"green","cont":"������ȱ"},"":{"col":"green","cont":"������ȱ"}};
var index_ls = {"����":{"col":"green","cont":"�������ƣ����ճ��㣬������ɹ���Ͻ��Ѿ�δ�������������������һ��̫����ζ���ɣ�"},"��̫����":{"col":"red","cont":"ż���Ľ�����ܻ���ʪ��ɹ�������̫������ɹ������ʱע�������仯��"},"������":{"col":"red","cont":"�������ʪ��ɹ�������������ɹ������ʱע�������仯��"},"�ܲ�����":{"col":"red","cont":"�������ʪ��ɹ������ܲ�������ɹ������ʱע�������仯��"},"��������":{"col":"green","cont":"�������ʣ������ů����������������������ùɱ������ɹ����"},"��ȱ":{"col":"green","cont":"������ȱ"},"":{"col":"green","cont":"������ȱ"}};
var index_d = {"����":"green","����":"green","����":"red","��":"red","����":"red","��":"red","ů":"red","��":"green"};
if(json.weatherinfo.index_uv!==undefined){
var zhishu='';
zhishu+='<div class="zhzsbd"><ul><li>������ָ����<span style="color:'+index_uv[json.weatherinfo.index_uv]["col"]+'">'+json.weatherinfo.index_uv+'</span></li>';zhishu+='<li>����ָ����<span style="color:'+index_d[json.weatherinfo.index]+'">'+json.weatherinfo.index+'</span></li>';zhishu+='<li>ϴ��ָ����<span style="color:'+index_xc[json.weatherinfo.index_xc]["col"]+'">'+json.weatherinfo.index_xc+'</span></li>';zhishu+='<li>����ָ����<span style="color:'+index_tr[json.weatherinfo.index_tr]["col"]+'">'+json.weatherinfo.index_tr+'</span></li>';zhishu+='<li>���ʶȣ�<span style="color:'+index_co[json.weatherinfo.index_co]["col"]+'">'+json.weatherinfo.index_co+'</span></li>';zhishu+='<li>����ָ����<span style="color:'+index_cl[json.weatherinfo.index_cl]["col"]+'">'+json.weatherinfo.index_cl+'</span></li></ul></div>';zhishu+='<div class="lifezs"><ul><li><b>���ճ�����ʾ�� <span class="cRed">'+json.weatherinfo.index+'</span></b>'+json.weatherinfo.index_d+'<span><a target="_blank" href="http://www.71516.cn/tianqi/" class="cBlue">��'+json.weatherinfo.city+'��һ���������� &raquo;</a></span></li></ul><idiv>';zhishu+='<div style="clear:both"></div>';$('zhishu').innerHTML=zhishu;}$('tj').src = 'http://js.users.51.la/3568862.js';};