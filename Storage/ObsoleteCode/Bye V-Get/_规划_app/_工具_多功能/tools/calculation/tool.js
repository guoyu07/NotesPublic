function gjjloan1(obj)
{
  var sqje;//����������
  var sqnx;//������������
  var select; //���ʽ
  
  var yjhk;//�¾������
  var bxhj;//���ʽ

var syhk;//�ջ����
  var bxhj2; //��Ϣ�ϼƵȱ���

//�м����
 var gbl;
 var jtysr; //��ͥ������
 var r;//�»���
 var gjjdka;//ס�������������a
 var gjjdkb;//ס�������������b
 var gjjdkc;//ס�������������c

 

 gryjce=obj.sqje.value;
if(gryjce<=0){alert('�����������Ϊ��,������');
                     obj.sqje.value='';return;}

/* poyjce=obj.sqnx.value;
if (obj.jcbl[0].checked==true){grjcbl=0.08;}
else {grjcbl=0.1;}

if (obj.p_bl[0].checked==true){pojcbl=0.08;}
else {pojcbl=0.1;}

if (obj.xz[0].checked==true){fwxz=0.9;}
else {fwxz=0.95;}

if (obj.xy[0].checked==true){xy=1.3;}
else if(obj.xy[1].checked==true){xy=1.15;}
else {xy=1;}


 
 fwzj=obj.hkfs.value;

if(fwzj<=0){alert('�����ܼ۲���Ϊ��,������');
                     obj.mount.value='';return;}
  */
 dknx=Math.round(obj.sqnx.value);

if(dknx<=0){alert('�����������޲���Ϊ��,������');
                     obj.sqnx.value='';return;}
if(dknx>30){alert('�����������޲��ܴ���30��,����������');
                     obj.sqnx.value='';return;}
 
hkfs=obj.select.value;

 var ylv_new ;
if(dknx>=1&&dknx<=5)
ylv_new = "0.003975";
else
ylv_new = "0.004200";

 if(hkfs==1)
 { 	



var ncm  = parseFloat(ylv_new) + 1;//n����
//alert(ncm);
var dknx_new = dknx*12;

total_ncm = Math.pow(ncm, dknx_new) 

var dked = obj.sqje.value;

//======
/*var total = ((dked*ylv_new*total_ncm)/(total_ncm-1))*1000;//alert(total);

var total1 = (total.toString()).indexOf(".");
var total2 = (total.toString()).substring(0,total1);//
var total3 = (total2.toString()).substring(total2.length-1,total2.length);//���һλ
var total4 = parseInt((total2.toString()).substring(total2.length-2,total2.length-1));//������λ
//alert(total3);
if(parseInt(total3)>=5)
total4 = total4 + 1;
total2 = (total2.toString()).substring(0,total2.length-2)+total4.toString();
//alert(total2);
obj.yjhk.value = parseFloat(total2)/100;
*/
obj.yjhk.value = Math.round(((dked*ylv_new*total_ncm)/(total_ncm-1))*100)/100;
var pp = Math.round(((dked*ylv_new*total_ncm)/(total_ncm-1))*100)/100;
//================================
//obj.bxhj.value = Math.round((parseFloat(total2)/100)*dknx*12*100)/100;
obj.bxhj.value = Math.round(pp*dknx*12*100)/100;


//=================================
 	
 
 	
 	
}else{
var dked = obj.sqje.value;
//obj.syhk.value =dked/(dknx*12)+dked*0.003975;
//alert(dked/(dknx*12)+dked*0.003975);
//================
switch(dknx){         //�ȶ�𻹿ʽ���»������ձ� 
  case 1 : rb=4.77;        break;
  case 2 : rb=4.77;   break;
  case 3 : rb=4.77;     break;
  case 4 : rb=4.77;   break;
  case 5 : rb=4.77;   break;
  case 6 : rb=5.040;   break;
  case 7 : rb=5.040;   break;
  case 8 : rb=5.040;   break;
  case 9 : rb=5.040;   break;
  case 10 : rb=5.040;  break;
  case 11 : rb=5.040;   break;
  case 12 : rb=5.040;  break;
  case 13 : rb=5.040;  break;
  case 14 : rb=5.040;   break;
  case 15 : rb=5.040;  break;
  case 16 : rb=5.040;  break;
  case 17 : rb=5.040;  break;
  case 18 : rb=5.040;  break;
  case 19 : rb=5.040;  break;
  case 20 : rb=5.040;  break;
  case 21 : rb=5.040;  break;
  case 22 : rb=5.040;  break;
  case 23 : rb=5.040;  break;
  case 24 : rb=5.040;  break;
  case 25 : rb=5.040;  break;
  case 26 : rb=5.040;  break;
  case 27 : rb=5.040;  break;
  case 28 : rb=5.040;  break;
  case 29 : rb=5.040;  break;
  case 30 : rb=5.040;  break;
}

//var syhk=Math.round((dked/(dknx*12)+dked*rb/(100*12))*100)/100;
var syhk = dked/(dknx*12)+dked*rb/1200;
obj.syhk.value= Math.round(syhk*100)/100;
//alert(syhk);
var yhke; //�»����
var bxhj = 0; //��Ϣ�ϼ�
var dkys; //��������
var sydkze;//��ǰʣ������ܶ�
var yhkbj; //�»����
dkys=dknx*12;

yhkbj=dked/dkys;

yhke=syhk;
sydkze=dked-yhkbj;
bxhj=syhk;
for (var count=2;count<=dkys; ++count){
       
       //yhke=Math.round((dked*10000/(dknx*12)+sydkze*rb/(100*12))*100)/100;
yhke=dked/dkys+sydkze*rb/1200;
sydkze-=yhkbj;
      bxhj+=yhke;
      
   
 }

//alert(bxhj);


/*var total = bxhj*1000;
//alert((total.toString()).indexOf("."));
if((total.toString()).indexOf(".")>0){
var total1 = (total.toString()).indexOf(".");
var total2 = (total.toString()).substring(0,total1);//
//alert(total2);
var total3 = (total2.toString()).substring(total2.length-1,total2.length);//���һλ
var total4 = parseInt((total2.toString()).substring(total2.length-2,total2.length-1));//������λ
//alert(total3);
if(parseInt(total3)>=5)
total4 = total4 + 1;
total2 = (total2.toString()).substring(0,total2.length-2)+total4.toString();
obj.bxhj2.value = parseFloat(total2)/100;
}else{
//obj.bxhj2.value = parseFloat(total.toString().substring(0,total.length-1))/1000;
alert((total.toString()).substring(0,total.toString().length-1));
}*/
//alert(total2);


obj.bxhj2.value= Math.round(bxhj*100000,5)/100000;
//alert(obj.bxhj2.value);
 }
 
 
 
 /*
 

switch(dknx){         //�¾����������
  case 1 : r=852.14;        break;
  case 2 : r=432.4710697;   break;
  case 3 : r=293.46378;     break;
  case 4 : r=224.0050146;   break;
  case 5 : r=182.3656265;   break;
  case 6 : r=156.6797508;   break;
  case 7 : r=136.9183397;   break;
  case 8 : r=122.1254826;   break;
  case 9 : r=110.6449335;   break;
  case 10 : r=101.4829378;  break;
  case 11 : r=94.0070996;   break;
  case 12 : r=87.79581584;  break;
  case 13 : r=82.55720217;  break;
  case 14 : r=78.0827649;   break;
  case 15 : r=74.21960416;  break;
  case 16 : r=70.85304091;  break;
  case 17 : r=67.89537559;  break;
  case 18 : r=65.27839391;  break;
  case 19 : r=62.94823917;  break;
  case 20 : r=60.86182298;  break;
  case 21 : r=58.98426138;  break;
  case 22 : r=57.28701034;  break;
  case 23 : r=55.74648753;  break;
  case 24 : r=54.34303869;  break;
  case 25 : r=53.06015214;  break;
  case 26 : r=51.88385442;  break;
  case 27 : r=50.80224037;  break;
  case 28 : r=49.80510385;  break;
  case 29 : r=48.88364483;  break;
  case 30 : r=48.03023512;  break;
  }

jtysr=Math.ceil((gryjce/grjcbl+poyjce/pojcbl)*10)/10;
if(jtysr<=400){alert('��ͥ���������400�������ϴ�������');
                     return;}

gjjdka=Math.min(Math.round((jtysr-400)/r*10000*10)/10,400000);
gjjdkb=Math.round(gjjdka*xy*10)/10;
gjjdkc=Math.round(fwzj*fwxz*10)/10; 
//obj.ze2.value=gjjdka; //jtysr;
obj.ze2.value=Math.floor(Math.min(gjjdkb,gjjdkc)/10000*10)/10;

zgdk=obj.ze2.value; //��ߴ�����




*/








//�����������ߴ�����

/*
˵�� 
��ͥ�����룽ס������������½ɴ��½ɴ����+��żס������������½ɴ��½ɴ����

ס�������������a������ͥ�����룭400���µȶ�����»����ÿ��Ԫ�»����Ҳ�����40��Ԫ

���ڸ������õȼ�ΪAAA�ģ�ס�������������b��ס�������������a��130��

���ڸ������õȼ�ΪAA�ģ�ס�������������b��ס�������������a��115��

���ڸ������õȼ������ģ�ס�������������b��ס�������������a

�Է�������Ϊ��Ʒ���ڷ��ģ�ס�������������c�������ܼۡ�90��

�Է�������Ϊ�����ģ�ס�������������c�������ܼۡ�95��

��ߴ�����d��min��b��c��

�ȶ�������ʽ��

 
�ȶ�𻹿ʽ

���»����=P/��n��12��+����ܶ��I

���У�PΪ�����IΪ�����ʣ�nΪ�������ޡ�
 

  */

}
