<?php
$hu = 'ids';
@require_once('header.php');
$result = '';
if('do' == $_POST['action']){
	if(false == IDCheck($_POST['idc'])){
		$result .= "��������ȷ��15��18λ���֤";
	}else{
		$idc = $_POST['idc'];
		$idc = substr($idc, 0, 6);
		$idc = substr(md5($idc), 8, 16);
		$lines = file ('info.txt');
		foreach ($lines as $line_num => $line) {
			list($bm,$dq) = explode('|',$line);
			if($bm == $idc){
				$result .= "��ַ��".$dq."<br>";
				$result .= "�Ա�".chksex($_POST['idc'])."<br>";
				$result .= "���գ�".chkbirthday($_POST['idc']);
				$get_it = 1;
				break;
			}
		}
		if(1 <> $get_it){
			$result .= "��ַ���Ҳ��������Ϣ��������������Щ��<br>";
			$result .= "�Ա�".chksex($_POST['idc'])."<br>";
			$result .= "���գ�".chkbirthday($_POST['idc']);
		}
	}
}
function  chksex($idc){
	$idclen=strlen($idc);
	if(15 == $idclen){
 		if(0 <> $idc[$idclen-1]%2){
 	 		return "��";
		}else{
   			return "Ů";
		}
	}elseif(18 == $idclen){
 		if(0 <> $idc[$idclen-2]%2){
 	 		return "��";
		}else{
   			return "Ů";
		}
	}  	
}
function  chkbirthday($idc){
	$idclen=strlen($idc);
	if(15 == $idclen){
   		$byear  = substr($idc,6,2);
		$bmonth = substr($idc,8,2);
		$bday   = substr($idc,10,2);
		return "19".$byear."��".$bmonth."��".$bday."��";
	}elseif(18 == $idclen){
   		$byear  = substr($idc,6,4);
		$bmonth = substr($idc,10,2);
		$bday   = substr($idc,12,2);
		return $byear."��".$bmonth."��".$bday."��";
	}  	
}
function IDCheck($e){
	$arrVerifyCode = explode(",","1,0,x,9,8,7,6,5,4,3,2");
	$Wi = explode(",","7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2");
	$Checker = explode(",","1,9,8,7,6,5,4,3,2,1,1");
	If(strlen($e) < 15 || strlen($e) == 16 || strlen($e) == 17 || strlen($e) > 18)return false;
	if(strlen($e) == 18){
		$ai = substr($e, 0, 17);
	}elseIf(strlen($e) == 15){
		$ai = $e;
		$ai = substr($ai, 0,6) & "19" & substr($ai, 6, 9);
	}
	$strYear  = substr($ai, 7, 4);
	$strMonth = substr($ai, 11, 2);
	$strDay   = substr($ai, 13, 2);
	if(checkdate($strMonth,$strDay,$strYear ))return false;
	for($i = 0;$i<17;$i++){	
		$TotalmulAiWi += substr($ai, $i, 1)*$Wi[$i];
	}
	$modValue = $TotalmulAiWi % 11;
	$strVerifyCode = $arrVerifyCode[$modValue];
	$ai .= $strVerifyCode;
	If(strlen($e) == 18 && $e <> $ai)return false;
	return $ai;
}
?>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>���֤����ֵ��ѯ</h1>
      <div class="box1" style="text-align:center;"> 
      <form action="" method="POST">
          <span class="info3" > ������Ҫ��ѯ�����֤�ţ�
           <input name="idc" type="text" id="idc" class="input" size="40" url="true" value="<?php echo $_POST['idc'];?>"/><input name="action" type="hidden" value="do">
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub" />
            </form>
          </span><div class="t" id="seo_result"><?php echo $result;?></div>
          <div style="width:100%">
              <div id="detail" class="info1">
<div id="result" class="div_whois">
<div class="t" style="display:none" id="seo_result">
</div>
     </div>
          </div>
          <div style="float:right; width:40%; text-align:right; padding-top:9px;">
          </div>
      </div>
  </div>
</div>
</div>
<div class="box">
  <div id="b_14">
    <h1>���߼��</h1>
    <div class="box1">
        <span class="info2">
         ��ѯ���֤���ڵء��Ա𼰳������ڡ�
        </span>
    </div>
  </div>
</div>
<?php @require_once('foot.php');?>