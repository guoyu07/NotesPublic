<?php
set_time_limit(15);
include_once 'config.php';
include_once 'inc/function.my.php';
include_once 'inc/function.inc.php';
include_once 'inc/filecache.class.php';
ini_set('date.timezone', 'Asia/Shanghai');
ini_set('display_errors', 'off');
class weatherController{
	public function getWeatherAction(){
		$city = isset($_GET['ccity']) ? $_GET['ccity'] : '';
		if($city != ''){
			$cityName = $this->getCityName($city);
		}else{
        if(isset($_COOKIE['s_prov']) && isset($_COOKIE['s_city']) && isset($_COOKIE['dcity']) && $_COOKIE['dcity'] != ''){
        	$provinceId = $_COOKIE['s_prov'];
        	$cityId = $_COOKIE['s_city'];
            $city = $_COOKIE['dcity'];
            $cityName = $this->getCityName($city);
            if(CHARSET == 'utf8')
            	$cityName = iconv('gbk','utf-8',$cityName);
        }else {
			$fp = fopen('inc/arr.php','rb');
			$con = fread($fp,filesize('inc/arr.php'));
	        $provinces = unserialize($con);
			fclose($fp);
			$fp = fopen('inc/newAllArrs.php','rb');
			$con = fread($fp,filesize('inc/newAllArrs.php'));
	        $citys = unserialize($con);
			fclose($fp);
            $ip = getIP();
            $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip;
            $rs = file_get_contents($url);
            $z_arr = explode('	',$rs);
            if(count($z_arr)>=5){
                $province = $z_arr[4];
                $cityName = $z_arr[5];
                $back = $this->getzone2($province,$cityName);
                $province = $back[0];
                $cityName = $back[1];
                $districtName = $cityName;
                $provinceId = array_search($province, $provinces);
                $cityArray = $citys[$provinceId];
                if(CHARSET=='gbk')
                	$cityArray = array_utf8_to_gbk($cityArray);
                $cityId    = array_search($cityName, $cityArray['level1']);
                $areaId    = array_search($districtName, $cityArray['level2'][$cityId]);
                $pageId    = isset($cityArray['level3'][$areaId]) ? $cityArray['level3'][$areaId] : '';

                $city = $pageId;
            }
            if ('' == $city) {
	        	$city = 101010100;
	        	$cityName = '����';
        	}
				$provinceId = isset($provinceId)?$provinceId:'01';
				$cityId = isset($cityId)?$cityId:'0101';
				setcookie("dcity",$city,time()+60*60*24*365, '/');
				setcookie("s_prov",$provinceId,time()+60*60*24*365, '/');
				setcookie("s_city",$cityId,time()+60*60*24*365, '/');
				//setcookie("tuancity",zh2pinyin($cityName),time()+60*60*24*365, '/','.71516.cn');
			}
		}
		$new_cache = new FileCache();
		$wdata = $new_cache->getTianqiCache('data/cache/',$city.'w.data',60*60*2);
		if($wdata !== false){
			$cachedata = unserialize($wdata);
		}else{
			$weatherinfo = array();
			$cachedata = array();
			$content = file_get_contents('http://m.weather.com.cn/data/'.$city.'.html');
			if($content){
				$weatherinfo = json_decode($content,TRUE);
				if(count($weatherinfo)){
					for($i=1;$i<=12;$i++){
						$img = $weatherinfo['weatherinfo']['img_title'.$i];
						$img = getWeatherImage($img);
						$weatherinfo['weatherinfo']['img'.$i] = $img;
					}
					$cachedata = $weatherinfo;
					$weatherinfo = serialize($weatherinfo);
		    	$new_cache->setTianqiCache('data/cache/',$city.'w.data',$weatherinfo);
				}
			}
		}
		$callback=isset($_GET['callback'])?$_GET['callback']:'getWeather';
		echo "{$callback}(".json_encode($cachedata).")";
	}

	public function getZoneInfoAction(){
			$returnarr = array();
			$type = isset($_GET['type'])?$_GET['type']:0;
			$provinceId = isset($_GET['pid'])?$_GET['pid']:'';
			$cityId = isset($_GET['cid'])?$_GET['cid']:'';

			$fp = fopen('inc/arr.php','rb');
			$con = fread($fp,filesize('inc/arr.php'));
	        $provinces = unserialize($con);
			fclose($fp);
			$fp = fopen('inc/newAllArrs.php','rb');
			$con = fread($fp,filesize('inc/newAllArrs.php'));
	        $citys = unserialize($con);
			fclose($fp);
        
        if ($type == 2) {
          $cityArray  = $citys[$provinceId];
        	$city2      = $cityArray['level2'][$cityId];
        	$newcity = array();
        	foreach($city2 as $key => $value){
        		$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
        		if($piny){
	        		$piny = strtoupper(substr($piny,0,1));
	        		$newcity[$cityArray['level3'][$key]] = $piny.' '.$value;
	        	}else
        			$newcity[$cityArray['level3'][$key]] = $value;
        	}
        	
        	$city2 = $newcity;

        	$returnarr = array(array('id'=>'city2', 'value'=>$city2));
        }else if ($type == 1) {
        	$cityArray  = $citys[$provinceId];
        	$city1      = $cityArray['level1'];
        	foreach($city1 as $key => $value){
        		$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
        		if($piny){
	        		$piny = strtoupper(substr($piny,0,1));
	        		$city1[$key] = $piny.' '.$value;
	        	}else
        			$city1[$key] = $value;
        	}
        	$city1key   = array_keys($cityArray['level1']);
        	$cityId     = array_shift($city1key);
        	$city2      = $cityArray['level2'][$cityId];

        	$newcity = array();
        	foreach($city2 as $key => $value){
        		$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
        		if($piny){
	        		$piny = strtoupper(substr($piny,0,1));
	        		$newcity[$cityArray['level3'][$key]] = $piny.' '.$value;
	        	}else
        			$newcity[$cityArray['level3'][$key]] = $value;
        		
        	}
        	
        	$city2 = $newcity;
        	$returnarr = array(array('id'=>'city1', 'value' => $city1), array('id'=>'city2', 'value'=>$city2));
        }else if ($type == 0) {
        	$provinceId = isset($_GET['p']) ? $_GET['p'] : '';
        	$cityId = isset($_GET['c']) ? $_GET['c'] : '';
        	if($provinceId =='' || $cityId==''){
	        	if(isset($_COOKIE['s_prov']) && isset($_COOKIE['s_city']) && isset($_COOKIE['dcity'])){
	        		$provinceId = $_COOKIE['s_prov'];
	        		$cityId = $_COOKIE['s_city'];
	        		$county = $_COOKIE['dcity'];
	        		$cityArray = array_utf8_to_gbk($citys[$provinceId]);
	        	}else{
        			$provinceId = '01';
			    	$cityId = '0101';
						$ip = getIP();
						$url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip;
			      $rs = file_get_contents($url);
			      $z_arr = explode('	',$rs);
			      if(count($z_arr)>=5){
			        $province = $z_arr[4];
			        $cityName = $z_arr[5];
			        $back = $this->getzone2($province,$cityName);
			        $province = $back[0];
			        $cityName = $back[1];
							$districtName = $cityName;
			
							$provinceId = array_search($province, $provinces);
							$cityArray = array_utf8_to_gbk($citys[$provinceId]);
							$_cityId    = array_search($cityName, $cityArray['level1']);
							$cityId    = array_search($districtName, $cityArray['level2'][$_cityId]);
						}
						$county = '';
	        	}
        	}else{
        		$cityArray = array_utf8_to_gbk($citys[$provinceId]);
        	}
        	
        	$cityArray  = $citys[$provinceId];
	        	$city1  = isset($cityArray['level1']) ? $cityArray['level1'] : array();
	        	foreach($city1 as $key => $value){
	        		$piny = zh2pinyin(trim($value));
	        		$city1[$key] = strtoupper(substr($piny,0,1)).' '.$value;
	        	}
				$cityArray['level1'] = isset($cityArray['level1']) ? $cityArray['level1'] : array();
	        	$city1key   = array_keys($cityArray['level1']);
	        	if(!isset($_COOKIE['s_prov']) || !isset($_COOKIE['s_city']) || !isset($_COOKIE['dcity'])){
	        		$cityId     = array_shift($city1key);
	        	}
	        	
	        	$city2      = isset($cityArray['level2'][$cityId])?$cityArray['level2'][$cityId]:array();
	
	        	$newcity = array();
	        	foreach($city2 as $key => $value){
	        		$piny = zh2pinyin(trim($value));
	        		$newcity[$cityArray['level3'][$key]] = strtoupper(substr($piny,0,1)).' '.$value;
	        	}
	        	$city2 = $newcity;
        	
        	foreach($provinces as $key => $value){
			    		if(CHARSET=='utf8')
			        	$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
			        else
			        	$piny = zh2pinyin(trim($value));
			    		$provinces[$key] = strtoupper(substr($piny,0,1)).' '.$value;
			    	}

    			$returnarr = array(array('id'=>'prov','value'=>$provinceId),array('id'=>'city','value'=>array_gbk_to_utf8($provinces)),array('id'=>'city1', 'value' => array_gbk_to_utf8($city1)), array('id'=>'city2', 'value'=>array_gbk_to_utf8($city2)),array('id'=>'cityid','value'=>$cityId),array('id'=>'countyid','value'=>$county));
        }
        $callback=isset($_GET['callback'])?$_GET['callback']:'getZoneInfo';
			echo "{$callback}(".json_encode($returnarr).")";

    }


    // ����cityid����cityname
    function getCityName($cityid){
    	$path = '';
			$fp = fopen('inc/newAllArrs.php','rb');
			$con = fread($fp,filesize('inc/newAllArrs.php'));
	        $citys = unserialize($con);
			fclose($fp);
    	foreach($citys as $pkey => $allcity){
    		$allcity = array_utf8_to_gbk($allcity);
    		foreach($allcity['level1'] as $key => $cityName){
	        $areaId    = array_search($cityName, $allcity['level2'][$key]);
	        $pageId    = isset($allcity['level3'][$areaId]) ? $allcity['level3'][$areaId] : '';
	        if($pageId == $cityid)return $cityName;
	        
	        $city2      = $allcity['level2'][$key];
        	foreach($city2 as $key2 => $value2){
        		if($allcity['level3'][$key2] == $cityid)return $value2;
        	}
	        
	    	}
    	}
    	return '';
    }
    function getzone2($prv,$city){
			$returnarr = array();
			$citys = array(
			'������'=>'������',
			'����'=>'����',
			'����'=>'����',
			'�ӱ�'=>'ʯ��ׯ',
			'ɽ��'=>'̫ԭ',
			'ɽ��'=>'����',
			'�ຣ'=>'����',
			'����'=>'����',
			'����'=>'����',
			'����'=>'֣��',
			'����'=>'�Ͼ�',
			'�Ĵ�'=>'�ɶ�',
			'����'=>'�人',
			'����'=>'�Ϸ�',
			'�㽭'=>'����',
			'����'=>'��ɳ',
			'����'=>'�ϲ�',
			'����'=>'����',
			'����'=>'����',
			'̨��'=>'̨��',
			'����'=>'����',
			'�㶫'=>'����',
			'����'=>'����',
			'�Ϻ�'=>'�Ϻ�',
			'����'=>'����',
			'���'=>'���',
			'����'=>'����',
			'���'=>'���',
			'����'=>'����',
			'�½�'=>'��³ľ��',
			'���ɹ�'=>'���ͺ���',
			'����'=>'����',
			'����'=>'����',
			'����'=>'����'
			);
			if($prv==''){
				$returnarr[] = '����';
				$returnarr[] = '����';
			}else if($city==''){
				foreach($citys as $key => $row){
					if($key == $prv){
						$returnarr[] = $key;
						$returnarr[] = $row;
					}
				}
			}else{
				$returnarr[] = $prv;
				$returnarr[] = $city;
			}
			return $returnarr;
		}
    function getzone($zone){
			$returnarr = array();
			$city = array(
			'������'=>'������',
			'����'=>'����',
			'����'=>'����',
			'�ӱ�'=>'ʯ��ׯ',
			'ɽ��'=>'̫ԭ',
			'ɽ��'=>'����',
			'�ຣ'=>'����',
			'����'=>'����',
			'����'=>'����',
			'����'=>'֣��',
			'����'=>'�Ͼ�',
			'�Ĵ�'=>'�ɶ�',
			'����'=>'�人',
			'����'=>'�Ϸ�',
			'�㽭'=>'����',
			'����'=>'��ɳ',
			'����'=>'�ϲ�',
			'����'=>'����',
			'����'=>'����',
			'̨��'=>'̨��',
			'����'=>'����',
			'�㶫'=>'����',
			'����'=>'����',
			);
			$others = array(
			'�Ϻ�',
			'����',
			'���',
			'����',
			'���',
			'����'
			);
			$o2 = array(
			'��³ľ��'=>'�½�',
			'���ͺ���'=>'���ɹ�',
			'����'=>'����',
			'����'=>'����',
			'����'=>'����'
			);
			if (preg_match('/([^^]*?)ʡ([^^]*?)��/', $zone, $areaInfo)){
				$returnarr[] = $areaInfo[1];
				$returnarr[] = $areaInfo[2];
			}elseif(preg_match('/([^^]*?)ʡ/', $zone, $areaInfo)){
				$returnarr[] = $areaInfo[1];
				if(!empty($city[$areaInfo[1]]))
					$returnarr[]=$city[$areaInfo[1]];
			}else{
				$prv = $ct = '';
				foreach($others as $v){
					if(strpos($zone,$v)!==false){
						$prv = $v;
						$ct = $v;
					}
				}
				foreach($o2 as $key => $v){
					if(strpos($zone,$v)!==false){
						$prv = $v;
						$ct = substr($zone,strlen($v));
						if(substr($ct,strlen($ct)-2)=="��" || substr($ct,strlen($ct)-2)=="��")
							$ct = substr($ct,0,strlen($ct)-1);
						if($ct==""){
							$ct = $key;
						}
					}
				}
				if($prv==""){
					$prv = $ct = "����";
				}
				$returnarr[] = $prv;
				$returnarr[] = $ct;
			}
			return $returnarr;
		}
}
$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "weatherController";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('���Ӵ���');