
<?php 
class phpthumb_ico { 
    function phpthumb_ico() {return true;} 
    function GD2ICOstring(&$gd_image_array) { 
        foreach ($gd_image_array as $key => $gd_image) { 
            $ImageWidths[$key]  = ImageSX($gd_image); 
            $ImageHeights[$key] = ImageSY($gd_image); 
            $bpp[$key]          = ImageIsTrueColor($gd_image) ? 32 : 24; 
            $totalcolors[$key]  = ImageColorsTotal($gd_image); 
            $icXOR[$key] = ''; 
            for ($y = $ImageHeights[$key] - 1; $y >= 0; $y--) { 
                for ($x = 0; $x < $ImageWidths[$key]; $x++) { 
                    $argb = $this->GetPixelColor($gd_image, $x, $y); 
                    $a = round(255 * ((127 - $argb['alpha']) / 127)); 
                    $r = $argb['red']; 
                    $g = $argb['green']; 
                    $b = $argb['blue']; 
                    if ($bpp[$key] == 32) { 
                        $icXOR[$key] .= chr($b).chr($g).chr($r).chr($a); 
                    } elseif ($bpp[$key] == 24) { 
                        $icXOR[$key] .= chr($b).chr($g).chr($r); 
                    } 
                    if ($a < 128) { 
                        @$icANDmask[$key][$y] .= '1'; 
                    } else { 
                        @$icANDmask[$key][$y] .= '0'; 
                    } 
                } 
                // mask bits are 32-bit aligned per scanline 
                while (strlen($icANDmask[$key][$y]) % 32) { 
                    $icANDmask[$key][$y] .= '0'; 
                } 
            } 
            $icAND[$key] = ''; 
            foreach ($icANDmask[$key] as $y => $scanlinemaskbits) { 
                for ($i = 0; $i < strlen($scanlinemaskbits); $i += 8) { 
                    $icAND[$key] .= chr(bindec(str_pad(substr($scanlinemaskbits, $i, 8), 8, '0', STR_PAD_LEFT))); 
                } 
            } 
        } 
        foreach ($gd_image_array as $key => $gd_image) { 
            $biSizeImage = $ImageWidths[$key] * $ImageHeights[$key] * ($bpp[$key] / 8); 
            // BITMAPINFOHEADER - 40 bytes 
            $BitmapInfoHeader[$key]  = ''; 
            $BitmapInfoHeader[$key] .= "\x28\x00\x00\x00";                              // DWORD  biSize; 
            $BitmapInfoHeader[$key] .= $this->LittleEndian2String($ImageWidths[$key], 4);      // LONG   biWidth; 
            // The biHeight member specifies the combined 
            // height of the XOR and AND masks. 
            $BitmapInfoHeader[$key] .= $this->LittleEndian2String($ImageHeights[$key] * 2, 4); // LONG   biHeight; 
            $BitmapInfoHeader[$key] .= "\x01\x00";                                      // WORD   biPlanes; 
               $BitmapInfoHeader[$key] .= chr($bpp[$key])."\x00";                          // wBitCount; 
            $BitmapInfoHeader[$key] .= "\x00\x00\x00\x00";                              // DWORD  biCompression; 
            $BitmapInfoHeader[$key] .= $this->LittleEndian2String($biSizeImage, 4);            // DWORD  biSizeImage; 
            $BitmapInfoHeader[$key] .= "\x00\x00\x00\x00";                              // LONG   biXPelsPerMeter; 
            $BitmapInfoHeader[$key] .= "\x00\x00\x00\x00";                              // LONG   biYPelsPerMeter; 
            $BitmapInfoHeader[$key] .= "\x00\x00\x00\x00";                              // DWORD  biClrUsed; 
            $BitmapInfoHeader[$key] .= "\x00\x00\x00\x00";                              // DWORD  biClrImportant; 
        } 
        $icondata  = "\x00\x00";                                      // idReserved;   // Reserved (must be 0) 
        $icondata .= "\x01\x00";                                      // idType;       // Resource Type (1 for icons) 
        $icondata .= $this->LittleEndian2String(count($gd_image_array), 2);  // idCount;      // How many images? 
        $dwImageOffset = 6 + (count($gd_image_array) * 16); 
        foreach ($gd_image_array as $key => $gd_image) { 
            // ICONDIRENTRY   idEntries[1]; // An entry for each image (idCount of 'em) 
            $icondata .= chr($ImageWidths[$key]);                     // bWidth;          // Width, in pixels, of the image 
            $icondata .= chr($ImageHeights[$key]);                    // bHeight;         // Height, in pixels, of the image 
            $icondata .= chr($totalcolors[$key]);                     // bColorCount;     // Number of colors in image (0 if >=8bpp) 
            $icondata .= "\x00";                                      // bReserved;       // Reserved ( must be 0) 
            $icondata .= "\x01\x00";                                  // wPlanes;         // Color Planes 
            $icondata .= chr($bpp[$key])."\x00";                      // wBitCount;       // Bits per pixel 
            $dwBytesInRes = 40 + strlen($icXOR[$key]) + strlen($icAND[$key]); 
            $icondata .= $this->LittleEndian2String($dwBytesInRes, 4);       // dwBytesInRes;    // How many bytes in this resource? 
            $icondata .= $this->LittleEndian2String($dwImageOffset, 4);      // dwImageOffset;   // Where in the file is this image? 
            $dwImageOffset += strlen($BitmapInfoHeader[$key]); 
            $dwImageOffset += strlen($icXOR[$key]); 
            $dwImageOffset += strlen($icAND[$key]); 
        } 
        foreach ($gd_image_array as $key => $gd_image) { 
            $icondata .= $BitmapInfoHeader[$key]; 
            $icondata .= $icXOR[$key]; 
            $icondata .= $icAND[$key]; 
        } 
        return $icondata; 
    } 
    function LittleEndian2String($number, $minbytes=1) { 
        $intstring = ''; 
        while ($number > 0) { 
            $intstring = $intstring.chr($number & 255); 
            $number >>= 8; 
        } 
        return str_pad($intstring, $minbytes, "\x00", STR_PAD_RIGHT); 
    } 
    function GetPixelColor(&$img, $x, $y) { 
        if (!is_resource($img)) { 
            return false; 
        } 
        return @ImageColorsForIndex($img, @ImageColorAt($img, $x, $y)); 
    } 
}  




if(isset($_POST['action'])&&$_POST['action'] == 'make'){  
    if(isset($_FILES['upimage']['tmp_name'])&&$_FILES['upimage']['tmp_name']&&is_uploaded_file($_FILES['upimage']['tmp_name'])){ 
	    $tem=$_FILES['upimage']['tmp_name'];
	/*$_FILES['myFile']['tmp_name'] �ļ����ϴ����ڷ���˴������ʱ�ļ�����һ����ϵͳĬ�ϡ�������php.ini��upload_tmp_dir ָ�������� putenv() ���������ǲ������õġ�
*/
       // $fileext=array("image/jpeg","image/gif","image/png");if(!in_array($_FILES['upimage']['type'],$fileext)){echo "���ϴ����ļ���ʽ����ȷ ��֧�� jpg��gif��png";}  
        if($im=@imagecreatefrompng($tem) or $im=@imagecreatefromgif($tem) or $im=@imagecreatefromjpeg($tem)){  
            $info=@getimagesize($tem);/*������������ȡ�� GIF��JPEG �� PNG ���� WWW ��ͼƬ�ĸ��������Ҫ��װ GD library�Ϳ���ʹ�ñ����������ص��������ĸ�Ԫ�ء���������ĵ�һ��Ԫ�� (����ֵ 0) ��ͼƬ�ĸ߶ȣ���λ������ (pixel)���ڶ���Ԫ�� (����ֵ 1) ��ͼƬ�Ŀ�ȡ�������Ԫ�� (����ֵ 2) ��ͼƬ���ļ���ʽ����ֵ 1 Ϊ GIF ��ʽ�� 2 Ϊ JPEG/JPG ��ʽ��3 Ϊ PNG ��ʽ�����ĸ�Ԫ�� (����ֵ 3) ΪͼƬ�ĸ�����ַ�����height=xxx width=yyy��*/
			//if(!is_array($info)){echo "ͼ�θ�ʽ����";}
			$height=$info[0];$width=$info[1];$type=$info[2];
			$s=$_POST['s'];
			switch ($info[2]){
            case IMAGETYPE_GIF:$image = imagecreatefromgif($tem);break;
            case IMAGETYPE_JPEG:$image = imagecreatefromjpeg($tem);break;
            case IMAGETYPE_PNG:$image = imagecreatefrompng($tem);break;
            default:echo 'ֻ֧�ָ�ʽΪPNG��GIF��JPEG��ͼƬ';return false;
            }
            switch ($s){
			case 1:$resize_im=@imagecreatetruecolor(16,16);$ht=16;$wd=16;break;
			case 2:$resize_im=@imagecreatetruecolor(32,32);$ht=32;$wd=32;break;
			case 3:$resize_im=@imagecreatetruecolor(48,48);$ht=48;$wd=48;break;
			case 9:$resize_im=@imagecreatetruecolor($height,$width);$ht=$height;$wd=$width;break;
			default:$resize_im=@imagecreatetruecolor(16,16);$ht=16;$wd=16;
			}
            if($height==$ht&&$width=$wd){$gd_image_array=array($im);}
	        else{imagecopyresampled($resize_im,$im,0,0,0,0,$ht,$wd,$height,$width);$gd_image_array=array($resize_im);}
			$icon=new phpthumb_ico();  
            $icon_data=$icon->GD2ICOstring($gd_image_array);  
			$r=date("ymdhis").rand(1,1000).'.ico';
            $filename=$_SERVER['DOCUMENT_ROOT'].'/v-get.com/app/b/'.$r;  
            file_put_contents($filename,$icon_data);
			
		   echo '<p>����ICONͼƬԤ��ͼ��<iframe src="http://localhost:8080/v-get.com/app/b/'.$r.'" id="c"  marginheight="0" marginwidth="0" frameborder="0" scrolling="no" height="'.$wd.'" width="'.$ht.'" style="display:none"></iframe><img src="http://localhost:8080/v-get.com/temp/'.$r.'" /></p><p><a href="#" onclick=c.document.execCommand("SaveAs")>����'.$ht.'*'.$wd.'px ͼ��</a>�����ٱ���ICO�����ŵ�ͼƬ��&rarr;�һ�&rarr;ͼƬ���Ϊ��</p>';  
            
        }
        else{echo "���ɴ��������ԣ�";}  
    }      
}  
?>