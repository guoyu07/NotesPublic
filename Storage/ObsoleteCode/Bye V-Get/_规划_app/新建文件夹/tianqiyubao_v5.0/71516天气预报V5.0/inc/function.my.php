<?php
function alert($message = '', $url = '-1')
{
    $str  = '<script language="javascript">';
    if ('' != $message) {
    	$str .= 'alert('.$message.');';
    }

    if ($url != '-1') {
    	$str .= 'location.href="'.$url.'";';
    }
    else {
        $str .= 'history.go(-1);';
    }

    $str .= '</script>';
    echo $str;
    exit;
}

function getWeatherImage($type)
{
    $type = trim($type);
    $images = array('����'=>'3.png', '�󵽱���'=>'23.png', '������'=>'4.png',  '��������б���'=>'5.png', '����'=>'1.png', '����'=>'10.png',  '��'=>'18.png', '����'=>'8.png', '�е�����'=>'22.png', '����'=>'9.png',  '����'=>'11.png', '��'=>'2.png', 'С��'=>'7.png','��'=>'0.png',
                    '��ɳ'=>'30.png', 'С������'=>'21.png','���ѩ'=>'6.png','Сѩ'=>'14.png','��ѩ'=>'13.png','��ѩ'=>'15.png','С����ѩ'=>'26.png','����'=>'19.png','�е���ѩ'=>'27.png','��ѩ'=>'16.png','�󵽱�ѩ'=>'28.png','�ش���'=>'12.png', '��ѩ'=>'17.png','ɳ����'=>'20.png','���굽����'=>'24.png','���굽�ش���'=>'25.png','����'=>'29.png','ǿɳ����'=>'31.png');
    $chartype = CHARSET == 'gbk'?iconv('utf-8','gbk',$type):$type;
    if(array_key_exists($chartype,$images))
    	return '<img align=\'absmiddle\' src=\'images/tianqibig/'.$images[$chartype].'\' style=\'border:0;\'/>';
    else
    	return $type;
}

function getTodayLivingImage($type)
{
    $type = trim($type);
    //$images = array('����'=>'3/01.gif', '����'=>'3/02.gif', '��ͨ'=>'3/03.gif', '������Ⱦ��ɢ����'=>'3/04.gif', '·��'=>'3/05.gif', 'ϴ��'=>'3/06.gif', '��ɡ'=>'3/07.gif', '������'=>'3/08.gif', '���ʶ�'=>'3/09.gif','��ð'=>'3/10.gif', '��ɹ'=>'3/11.gif', '����'=>'3/12.gif', '��ױ'=>'3/13.gif', '����'=>'3/14.gif', 'Լ��'=>'3/15.gif', '����'=>'3/16.gif', '���'=>'3/17.gif', '����'=>'3/18.gif', 'ҹ����'=>'3/19.gif', '�˶�'=>'3/20.gif');
    $images = array('����'=>'3/01.gif', '����'=>'3/02.gif', '��ͨ'=>'3/03.gif', '������Ⱦ��ɢ����'=>'3/04.gif', '·��'=>'3/05.gif', 'ϴ��'=>'3/06.gif', '��ɡ'=>'3/07.gif', '������'=>'3/08.gif');
    return $images[$type];
}


function array_utf8_to_gbk(&$array)
{
	if(!is_array($array)){
		$array = iconv('utf-8', 'gbk//IGNORE', $array);
		return $array;
	}
    foreach ($array as &$arr)
    {
        if (is_array($arr)) {
        	$arr = array_utf8_to_gbk($arr);
        }
        else {
            $arr = iconv('utf-8', 'gbk//IGNORE', $arr);
        }
    }
    return $array;
}

function array_gbk_to_utf8(&$array)
{
    if(CHARSET == 'utf8')return $array;
    if(is_array($array))
    foreach ($array as &$arr)
    {
        if (is_array($arr)) {
        	$arr = array_gbk_to_utf8($arr);
        }
        else {
            $arr = iconv('gbk', 'utf-8', $arr);
        }
    }
    return $array;
}

function array_map_trim(&$array)
{
    foreach ($array as &$arr) {
        if (is_array($arr)) {
        	$arr = array_map_trim($arr);
        }
        else {
            $arr = trim($arr);
        }
    }
    return $array;
}
//fsockopen
function get_contents_by_socket($url)
{
	$params = parse_url($url);
	$host = isset($params['host']) ? $params['host'] : '';
	$path = isset($params['path']) ? $params['path'] : '';
	$query = isset($params['query']) ? $params['query'] : '';
	$fp = @fsockopen($host, 80, $errno, $errstr, 15);
	if (!$fp){
		return false;
	}else{
		$get_info = false;
		$result = '';
		$out = "GET /" . $path . '?' . $query . " HTTP/1.0\r\n";
		$out .= "Host: $host\r\n";
		$out .= "Connection: Close\r\n\r\n";
		@fwrite($fp, $out);
		$http_200 = preg_match('/HTTP.*200/', @fgets($fp, 1024));
		if (!$http_200){
			return false;
		}
		while (!@feof($fp)){
			if ($get_info){
				$result .= @fread($fp, 1024);
			}else{
				if (@fgets($fp, 1024) == "\r\n"){
					$get_info = true;
				}
			}
		}
		@fclose($fp);
		return $result;
	}
}
//Զ�̻�ȡ
function getContent($url)
{
	if(function_exists('file_get_contents')){
		if(!get_cfg_var('allow_url_fopen')){
			return false;
		}
		$context = stream_context_create(array('http' => array('timeout' =>15)));
		$data = @file_get_contents($url, false, $context);
	}elseif(function_exists('curl_init')){
		if(!isset($ch)){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url );
			curl_setopt($ch, CURLOPT_TIMEOUT,15);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0' );
		}
		$data = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($http_code != '200'){
			return false;
		}
	}elseif(function_exists('fsockopen')){
		$data = get_contents_by_socket($url);
	}else{
		return false;
	}
	return $data;
}