<?php 
/*-------------------------------------------------------------
**�������������ڸ�ָ��ͼƬ�ӵײ�ˮӡ����ռ��ͼƬ��ʾ���򣩵��Զ����࣬�贴���������
**������2007-10-09
**���£�2007-10-09
**˵����1����Ҫgd��֧�֣���Ҫiconv֧�֣�php5�Ѿ��������ü��أ�
        2��ֻ�ʺ��������͵�ͼƬ��jpg/jpeg/gif/png���������Ͳ�����
        3��ע��ͼƬ����Ŀ¼�����Ա����д
        4�����÷�����
            $objImg = new MyWaterDownChinese();
            $objImg->Path = "images/";
            $objImg->FileName = "1.jpg";
            $objImg->Text = "HAHAKONGJIAN[url]HTTP://HI.BAIDU.COM/LYSONCN[/url]";
            $objImg->Font = "./font/simhei.ttf";
            $objImg->Run();
**��Ա������
----------------------------------------------------------------*/
class MyWaterDownChinese{
          var $Path = "./"; //ͼƬ����Ŀ¼����ڵ��ô����ҳ������·��
          var $FileName = "prod_img.gif"; //ͼƬ�����֣���"1.jpg"
          var $Text = "fdfd";   //ͼƬҪ���ϵ�ˮӡ���֣�֧������
          var $TextColor = "#ffffff"; //���ֵ���ɫ��gifͼƬʱ��������ɫֻ��Ϊ��ɫ
          var $TextBgColor = "#000000"; //���ֵı���������ɫ
          var $Font = "c://windows//fonts//simhei.ttf"; //����Ĵ��Ŀ¼�����·��
          var $OverFlag = true; //�Ƿ�Ҫ����ԭͼ��Ĭ��Ϊ���ǣ�������ʱ���Զ���ԭͼ�ļ�����+"_water_down"����"1.jpg"=> "1_water_down.jpg"
          var $BaseWidth = 200; //ͼƬ�Ŀ������Ҫ>=200���Ż����ˮӡ���֡�
         
//------------------------------------------------------------------
//���ܣ���Ĺ��캯��(php5.0���ϵ���ʽ)
//��������
//���أ���
function __construct(){;}

//------------------------------------------------------------------
//���ܣ������������(php5.0���ϵ���ʽ)
//��������
//���أ���
function __destruct(){;}
//------------------------------------------------------------------

//------------------------------------
//���ܣ��������к�������ͼƬ����ˮӡ
//��������
//���أ���
function Run()
{
    if($this->FileName == "" || $this->Text == "")
        return;
    //����Ƿ�װGD��
    if(false == function_exists("gd_info"))
    {
        echo "ϵͳû�а�װGD�⣬���ܸ�ͼƬ��ˮӡ.";
        return;
    }
    //�������롢���ͼƬ·����
    $arr_in_name = explode(".",$this->FileName);
    //
    $inImg = $this->Path.$this->FileName;
    $outImg = $inImg;
    $tmpImg = $this->Path.$arr_in_name[0]."_tmp.".$arr_in_name[1]; //��ʱ�����ͼƬ������Ҫ
    if(!$this->OverFlag)
        $outImg = $this->Path.$arr_in_name[0]."_water_down.".$arr_in_name[1];
    //���ͼƬ�Ƿ����
    if(!file_exists($inImg))
        return ;
    //���ͼƬ������
    $groundImageType = @getimagesize($inImg); 
    $imgWidth = $groundImageType[0]; 
    $imgHeight = $groundImageType[1];
    $imgType = $groundImageType[2];
    if($imgWidth < $this->BaseWidth) //С�ڻ�����ȣ�������
        return;
    
    //ͼƬ����jpg/jpeg/gif/pngʱ��������
    switch($imgType)
    {
         case 1: 
              $image = imagecreatefromgif($inImg); 
              $this->TextBgColor = "#ffffff"; //gifͼƬ����ֻ��Ϊ�ڣ����Ա�����ɫ������Ϊ��ɫ
              break; 
         case 2: 
              $image = imagecreatefromjpeg($inImg);
              break; 
         case 3: 
              $image = imagecreatefrompng($inImg);
              break; 
         default: 
              return;
              break;
    }
    //������ɫ
    $color = @imagecolorallocate($image,hexdec(substr($this->TextColor,1,2)),hexdec(substr($this->TextColor,3,2)),hexdec(substr($this->TextColor,5,2))); //������ɫ
    //����һ���յ�ͼƬ�����ĸ߶��ڵײ�����ˮӡ�߶�
    $newHeight = $imgHeight+20;
    $objTmpImg = @imagecreatetruecolor($imgWidth,$newHeight);
    $colorBg = @imagecolorallocate($objTmpImg,hexdec(substr($this->TextBgColor,1,2)),hexdec(substr($this->TextBgColor,3,2)),hexdec(substr($this->TextBgColor,5,2))); //������ɫ    
    //���ͼƬ�ı�����ɫ
    @imagefill ($objTmpImg,0,0,$colorBg);
    //��ԭͼcopy����ʱͼƬ��
    @imagecopy($objTmpImg,$image,0,0,0,0,$imgWidth,$imgHeight);
    //����Ҫд���ˮӡ���ֶ���
    $objText = $this->createText($this->Text);
    //����Ҫд���ˮӡ���ֵ�λ��
    $x = 5;
    $y = $newHeight-5;
    //д������ˮӡ
    @imagettftext($objTmpImg,10,0,$x,$y,$color,$this->Font,$objText);    
    //�����µ�ͼƬ����ʱͼƬ
    switch($imgType)
    {
         case 1: 
              imagegif($objTmpImg,$tmpImg);
              break; 
         case 2: 
              imagejpeg($objTmpImg,$tmpImg);
              break; 
         case 3: 
              imagepng($objTmpImg,$tmpImg);
              break; 
         default: 
              return;
              break;
    }    
    //�ͷ���Դ
    @imagedestroy($objTmpImg);
    @imagedestroy($image);
    //���������ļ�
    if($this->OverFlag)
    {
        //����ԭͼ
        @unlink($inImg);
        @rename($tmpImg,$outImg);
    }
    else
    {
        //������ԭͼ
        @rename($tmpImg,$outImg);
    }
}

//--------------------------------------
//���ܣ�����ˮӡ���ֶ���
//��������
//���أ�������ˮӡ���ֶ���
function createText($instring)
{
   $outstring="";
   $max=strlen($instring);
   for($i=0;$i<$max;$i++)
   {
       $h=ord($instring[$i]);
       if($h>=160 && $i<$max-1)
       {
           $outstring .= "&#".base_convert(bin2hex(iconv("gb2312","ucs-2",substr($instring,$i,2))),16,10).";";
           $i++;
       }
       else
       {
           $outstring .= $instring[$i];
       }
   }
   return $outstring;
}

}//class
?>
