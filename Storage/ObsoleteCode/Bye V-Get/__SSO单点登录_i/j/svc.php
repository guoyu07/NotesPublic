<?php 
include('../c/vc_sql.php');	//��֤��д�����ݿ�
session_start();
header("Content-type: image/png"); 
//�������ɫ��ֽ 
$im = @imagecreatetruecolor(70, 24) or die("����ͼ��ʧ��"); 
//��ȡ������ɫ 
$background_color = imagecolorallocate($im, 255, 255, 255); 
//��䱳����ɫ(�������������Ͱ) 
imagefill($im,0,0,$background_color); 
//��ȡ�߿���ɫ 
//$border_color = imagecolorallocate($im,200,200,200); 
//�����Σ��߿���ɫ200,200,200 
//imagerectangle($im,0,0,69,23,$border_color); 

//������ҫ������ȫ����1��0 
//for($i=2;$i<22;$i++){ 
//��ȡ�����ɫ 
//$line_color = imagecolorallocate($im,rand(200,255),rand(200,255),rand(200,255)); 
//���� 
//imageline($im,2,$i,47,$i,$line_color); 
//} 
//imageline ( resource$image , int$x1 , int$y1 , int$x2 , int$y2 , int$color )
//imageline() �� color ��ɫ��ͼ�� image �д����� x1��y1 �� x2��y2��ͼ�����Ͻ�Ϊ 0, 0����һ���߶Ρ� 

//��ȡ���������ɫ 
$line_color = imagecolorallocate($im,rand(50,180),rand(50,180),rand(50,180)); 
imageline($im,0,rand(2,24),70,rand(0,24),$line_color); 
imageline($im,rand(2,70),0,rand(0,70),24,$line_color); 

//����ӡ��ȥ������ a-zA-Z0-9���������echo str_shuffle("ABCEFGgIJ4KLpNOPQRSTUVWXZabcHdefhMijDklmnoqrstuvwxyz01235Y6789");�Ϳ��Ի�ȡ�����˵��ַ�
//��Ϊ����ֻ��10��������Ϊ�˱�֤���ֿ�����ʾ������д���ݣ���20��
//$k='vWEy2ifRYUJ5spG2LrSZDAu8d4bBKjz6mel06VQ13HP89g5XFqCkIowx10Ta437NOMctn79h';
//��������λ��������ʿ��������Խ��ϣ���֤���ģ�°ٶȣ��ô����ֵľͺ�
$k='0123456789';

$S='';
//д������ִ� 

//���������С $font_size=18; 
$K=$k[rand(0,9)];$x=18*rand(0,3);
$mix = imagecolorallocate($im,200,200,200);
imagechar($im,12,$x,rand(1,4),$K,$mix); 

for($i=0;$i<4;++$i){ 
$K=$k[rand(0,9)];$S.=$K;
//x λ��
$x=18*$i+4;
//������ 

imagechar($im,18,$x,rand(1,4),$K,$line_color); 
} 

//��ʾͼƬ 
imagepng($im); 
$_SESSION['svc']=$S;
//����ͼƬ 
imagedestroy($im); 
?> 
