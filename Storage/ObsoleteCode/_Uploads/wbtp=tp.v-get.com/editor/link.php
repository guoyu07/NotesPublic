<?php
//�Ա����ݵ��ַ���Ҫ����Ҫ����addslashes()��Ҫ�ȿ���php.ini��û�п���magic_quotes_gpc������Ѿ������ˣ��Ͳ���Ҫʹ�ã�PHP���Զ�addslashes()����' " \ \0 ��
// ������ڲ������ݿ⣬����Ҫ��"ת�壬���������post��ȥ���Ͳ��ܣ�����Ҫ��stripslashes() ��Ĭ��ת�巴��
$GMQG=get_magic_quotes_gpc()?TRUE:FALSE;

if(isset($_POST['fevgtsid'])&&isset($_POST['feh'])){
$CID=$_POST['fevgtsid'];$A=$_POST['fea'];$B=$_POST['feb'];$C=$_POST['fec'];

$E=$_POST['fee'];

$H=$_POST['feh'];$D=$_POST['fed'];$K=$_POST['fek'];$F=$_POST['fef'];$G=$_POST['feg'];
$USER=$_POST['fevgtusr'];$N=$_POST['fen'];$M=$_POST['fem'];$PASS=$_POST['fevgtpass'];$T=$_POST['fet'];$TM=$_POST['fett'];$editorClass=$_POST['fevgtuc'];$FL=$_POST['fevgtfl'];$FUNIT=$_POST['fevgtfu'];
$IMGS=$_POST['feimgsql'];
$back=$_POST['comes'];
//$H=str_replace("'","&#39;",$H);$H=str_replace('"',"&#34;",$H);

//post_data��Ҫת�壬���������ǲ�������ı༭��������һ�ɱ�� &#39;
//$F=str_replace("'","&#39;",$F);$D=str_replace("'","&#39;",$D); $N=str_replace("'",'&#39;',$N);
// ȡ���Զ���addslashes()

$urlF=$GMQG?stripslashes($F):$F;
$urlN=$GMQG?stripslashes($N):$N;
// ������Ҫ���뵽���ݿ⣬������Ҫת��
$F=$GMQG?$F:addslashes($F);
$N=$GMQG?$F:addslashes($N);






require('user.php');
$Auser=$Usercheck[$USER];
$Apass=$Auser[0];

if($Apass!=$PASS){echo 'Your Password is wrong!';exit;}
$CUS=$CUScheck[$CID];
$VGETID=$CUS[0];
//&#39; ����&��  ����Ĵ����и������Ҫ�Դ��ݵĽ��� urlencode
$urlG=urlencode($G);$urlM=urlencode($M);$urlH=urlencode($H);$urlF=urlencode($urlF);$urlD=urlencode($D);$urlN=urlencode($urlN);$urlT=urlencode($T);$urlK=urlencode($K);
$post_data='g='.$urlG.'&m='.$urlM.'&n='.$urlN.'&fl='.$FL.'&funit='.$FUNIT.'&a='.$A.'&b='.$B.'&c='.$C.'&e='.$E.'&h='.$urlH.'&editorclass='.$editorClass.'&d='.$urlD.'&k='.$urlK.'&f='.$urlF.'&t='.$urlT.'&tm='.$TM.'&user='.$USER.'&vgetid='.$VGETID;
//�����Զ���ļ���curl������ѡ��file_get_contents������ȡ�����ļ�������ѡ����curl�Ƕ�socket��װ��Ĺ��ߣ������������socket
//����socket��֧�ֶ��̣߳�����ͬ������༭�ͻ�����⣬������curl�ȽϺ�
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_URL,$CUS[1]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	 ob_start();  
	curl_exec($ch);
	$result=ob_get_contents(); 
	ob_end_clean(); 
if($result=='v'){$OK=1;}else {$OK=0;}

header('location: '.$back);exit();



/* Ϊ�˱���༭��ͻ��Ӵ����༭׫д�����´��ݵ�����e.v-get.com  Ȼ��ģ��PHP���ݸ��ͻ���վ����ֻҪ����ñ��ص�curl �Ϳ����� */

/* 
grant all privileges on editor.* to EDTvgt301mo03@localhost identified by 'F1ckU01Dwcl';
 */
$Qc=mysql_connect('hdm-094.hichina.com','hdm0940519','MySQL0img1314');mysql_select_db('hdm0940519_db',$Qc);mysql_query('set names utf8');

//�滻���������洫��ֵ��
//��$Fǰ���Ѿ�ת��Ϊ \"�ˣ��� <> ��mysql ����С�ڣ���������� "insert ... 

$TB='vgt_w'.$CID;
//������8��
if(empty($IMGS{7})){$P=0;}else {$P=1;
$VGT_T='vgt_t'.$CID;
//��ֹsqlע�룬�Լ� ��\" �滻����Ϊ���ݹ�����"����\"
$imgs=array('\\','\'');
$IMGS=str_replace($imgs,'',$IMGS);
$Qsi="UPDATE $VGT_T set u=1 WHERE $IMGS";
mysql_query($Qsi) or die ('Update IMG failed: '.mysql_error());
}

$Qs="INSERT INTO $TB (cid,co,a,b,c,h,d,k,f,n,m,t,fl,fu,user,ok,p) VALUES ($CID,$editorClass,'$A','$B','$C','$H','$D','$K','$F','$N','$M','$T',$FL,$FUNIT,'$USER',$OK,$P)";
mysql_query($Qs) or die ('Insert Into E.V-Get.com Aritle failed: '.mysql_error());

//Զ�̷�������ת����  file:///C: 
header('location: '.$back);exit();
}
else {header('location: http://e.v-get.com/');}
?>