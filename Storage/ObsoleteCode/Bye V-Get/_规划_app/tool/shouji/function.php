<?php
function getphone($phone){
	$dbpath = "befo/";	
	$len    = strlen($phone);
	if ( $len < 7 ){
	return "�ֻ��������7λ";
	}
	$par = "[0-9]";
	for ($i=0;$i<$len;$i++){
		if(!ereg($par,substr($phone,$i,1) ) ){
		return "�ֻ�����ֻ��Ϊ����";
		}
	}	
	$sub   = substr($phone,0,3);
	$sunum = readover($dbpath.$sub.".txt");
	if ($sunum){
		$num    = ltrim(substr($phone,3,4),"0");
		$search = file($dbpath.$sub.".txt");		
		$tmp    = $search[$num];
		$result = substr($tmp,strpos($tmp,"=")+1,strlen($tmp)-strpos($tmp,"=")-2);
		return (strlen($result)>1)?$result:"������";
	}else{
	return "�ݲ�֧��$sub";
	}
}
function readover($filename,$method="rb") {	
	strpos($filename,'..')!==false && exit('Forbidden');
	if ($handle = @fopen($filename,$method)) {
		flock($handle,LOCK_SH);
		$filedata=@fread($handle,filesize($filename));
		fclose($handle);
	}
	return $filedata;
}
?>