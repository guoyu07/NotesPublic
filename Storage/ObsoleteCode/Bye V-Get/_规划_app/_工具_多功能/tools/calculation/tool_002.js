function gjjloan2(obj)
{

  var gryjce;//ס������������½ɴ��
  var poyjce;//��żס������������½ɴ��
  var grjcbl;//�ɴ����
  var pojcbl;//��ż�ɴ����
  var xy; //��������
  var fwzj;//�����ܼ�
  var fwxz;//��������
  var dknx;//������������
  var syhk; //���»����
  
  var dked;//��Ҫ������
  var hkfs;//���ʽ
  var bxhj; //��Ϣ�ϼ�
  var bxhj2; //��Ϣ�ϼƵȱ���

//�м����
 var gbl;
 var jtysr; //��ͥ������
 var r;//�»���
 var rb;
 var gjjdka;//ס�������������a
 var gjjdkb;//ס�������������b
 var gjjdkc;//ס�������������c

 

 gryjce=obj.mount2.value;
if(gryjce<=0){alert('ס������������½ɴ���Ϊ��,������');
                    obj.mount2.value='';return;}

 poyjce=obj.mount3.value;
if (obj.jcbl[0].checked==true){grjcbl=0.08;}
else {grjcbl=0.1;}

if (obj.p_bl[0].checked==true){pojcbl=0.08;}
else {pojcbl=0.1;}

if (obj.xz[0].checked==true){fwxz=0.9;}
else {fwxz=0.95;}

if (obj.xy[0].checked==true){xy=1.15;}
else if(obj.xy[1].checked==true){xy=1.3;}
else {xy=1;}

 
 fwzj=obj.mount.value;

if(fwzj<=0){alert('�����ܼ۲���Ϊ��,������');
                     obj.mount.value='';return;}
 
 dknx=Math.round(obj.mount10.value);
//alert(dknx);
if(dknx<=0){alert('�����������޲���Ϊ��,������');
                     obj.mount10.value='';return;}
 

 
 

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
gjjdka=Math.min(Math.round((jtysr-400)/r*10000*10)/10,400000);
gjjdkb=Math.round(gjjdka*xy*10)/10;
gjjdkc=Math.round(fwzj*fwxz*10)/10; 
//obj.ze2.value=gjjdka; //jtysr;
obj.ze2.value=Math.floor(Math.min(gjjdkb,gjjdkc)/10000*10)/10;

//����2
zgdk=obj.ze2.value; //��ߴ�����

dked=Math.round(obj.need.value*10)/10;

obj.need.value=dked;

if(dked==0){alert('��Ҫ�Ĵ����Ȳ���Ϊ��,������');
                     obj.need.value='';return;}
if(dked<0){alert('����Ĵ����Ȳ�����Ҫ��,������');
                     obj.need.value='';return;}
 

if(dked>zgdk){alert('���ܸ�����ߴ�����,����������');
                     obj.need.value='';return;}


hkfs=obj.select.value;

if(hkfs==1){
//obj.ze22.value=Math.ceil(dked*r*100)/100;
//==============================modify by xujianfei
var ylv_new ;

if(dknx>=1&&dknx<=5)
ylv_new = "0.00300";
else
ylv_new = "0.003375";


var ncm  = parseFloat(ylv_new) + 1;//n����
//alert(ncm);
var dknx_new = dknx*12;
//alert(dknx_new);
/*switch(dknx_new){         //�ȶ�𻹿ʽ���»������ձ� 
  case 1 : total_ncm = ncm;        break;
  case 2 : total_ncm = ncm*ncm;   break;
  case 3 : total_ncm = ncm*ncm*ncm;   break;
  case 4 : total_ncm = ncm*ncm*ncm*ncm;   break;
  case 5 : total_ncm = ncm*ncm*ncm*ncm*ncm;   break;
  case 6 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 7 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 8 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 9 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 10 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 11 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 12 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 13 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 14 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 15 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 16 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 17 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 18 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 19 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 20 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 21 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 22 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 23 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 24 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 25 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 26 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 27 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 28 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 29 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  case 30 : total_ncm = ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm*ncm;   break;
  }
  */
 

total_ncm = Math.pow(ncm, dknx_new) 
//==============================
/*
 var total = ((dked*10000*ylv_new*total_ncm)/(total_ncm-1))*1000;
//alert(total);
var total1 = (total.toString()).indexOf(".");
var total2 = (total.toString()).substring(0,total1);//
var total3 = (total2.toString()).substring(total2.length-1,total2.length);//���һλ
var total4 = parseInt((total2.toString()).substring(total2.length-2,total2.length-1));//������λ
//alert(total3);
if(parseInt(total3)>=5)
total4 = total4 + 1;
total2 = (total2.toString()).substring(0,total2.length-2)+total4.toString();
//alert(total2);
obj.ze22.value = parseFloat(total2)/100;
*/
obj.ze22.value = Math.round(((dked*10000*ylv_new*total_ncm)/(total_ncm-1))*100)/100;
var pp = Math.round(((dked*10000*ylv_new*total_ncm)/(total_ncm-1))*100)/100;

//=========================================================
gbl=Math.round(Math.ceil(dked*r*100)/100/jtysr*1000)/10;
obj.yj2.value=gbl;
//bxhj=Math.round(r*dked*dknx*12*100)/100;
bxhj = Math.round(pp*dknx*12*100)/100;
obj.lx2.value=bxhj;
}
else{

switch(dknx){         //�ȶ�𻹿ʽ���»������ձ� 
  case 1 : rb=3.60;        break;
  case 2 : rb=3.60;   break;
  case 3 : rb=3.60;     break;
  case 4 : rb=3.60;   break;
  case 5 : rb=3.60;   break;
  case 6 : rb=4.05;   break;
  case 7 : rb=4.05;   break;
  case 8 : rb=4.05;   break;
  case 9 : rb=4.05;   break;
  case 10 : rb=4.05;  break;
  case 11 : rb=4.05;   break;
  case 12 : rb=4.05;  break;
  case 13 : rb=4.05;  break;
  case 14 : rb=4.05;   break;
  case 15 : rb=4.05;  break;
  case 16 : rb=4.05;  break;
  case 17 : rb=4.05;  break;
  case 18 : rb=4.05;  break;
  case 19 : rb=4.05;  break;
  case 20 : rb=4.05;  break;
  case 21 : rb=4.05;  break;
  case 22 : rb=4.05;  break;
  case 23 : rb=4.05;  break;
  case 24 : rb=4.05;  break;
  case 25 : rb=4.05;  break;
  case 26 : rb=4.05;  break;
  case 27 : rb=4.05;  break;
  case 28 : rb=4.05;  break;
  case 29 : rb=4.05;  break;
  case 30 : rb=4.05;  break;
  }
syhk=Math.round((dked*10000/(dknx*12)+dked*10000*rb/(100*12))*100)/100;
obj.sfk2.value=syhk;
var yhke; //�»����
var bxhj; //��Ϣ�ϼ�
var dkys; //��������
var sydkze;//��ǰʣ������ܶ�
var yhkbj; //�»����
dkys=dknx*12;
yhkbj=dked*10000/dkys;

yhke=syhk;
sydkze=dked*10000-yhkbj;
bxhj=syhk;
for (var count=2;count<=dkys; ++count){
       
       //yhke=Math.round((dked*10000/(dknx*12)+sydkze*rb/(100*12))*100)/100;
yhke=dked*10000/dkys+sydkze*rb/1200;
sydkze-=yhkbj;
      bxhj+=yhke;
      
   
 }

obj.lx3.value= Math.round(bxhj*100)/100;
}












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
 