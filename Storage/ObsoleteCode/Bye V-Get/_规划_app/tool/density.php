<?php
$hu      = 'density';
$domain  = $_POST['domain']?$_POST['domain']:$_GET['url'];
$keys    = $_POST['keys']?$_POST['keys']:trim($_GET['keys']);
if($domain){
	$bods    = "/<body(.*)<\/body>/is";
	$content = @file_get_contents("http://".$domain);
	preg_match_all($bods, $content, $array);	
	$pat = "/>(.*)</Us";
	preg_match_all($pat, $array[0][0], $arr);
	$a = '';
	for($i=0;$i< sizeof($arr[1]);$i++){
		if($arr[1][$i]){
		$a .= $arr[1][$i];
		}
	}
	$a     = preg_replace(array("/\s/","<br/>"),array("",),$a);
	$keys  = preg_replace(array("/\s/","<br/>"),array("",),$keys);
	$keys1 = "/".$keys."/";
	preg_match_all($keys1,$a,$densti);
	$a1 = mb_strlen($a,'gbk');
	$a2 = mb_strlen($keys,'gbk');
	$a3 = sizeof($densti[0]);
	$a4 = $a2*$a3;
	$a5 = @(round($a4/$a1*100,1)."%");
	$text = $content?"ҳ���ı��ܳ��ȣ�".$a1."�ַ�<br/>�ؼ��ַ����ȣ�".$a2."�ַ�<br/>�ؼ��ֳ���Ƶ�ʣ�".$a3."��<br/>�ؼ��ַ��ܳ��ȣ�".$a4."�ַ�<br/>�ܶȽ�����㣺".$a5."<br/>�ܶȽ���ֵ��2%�Q�ܶȨQ8%":"����������ȷ�������͹ؼ����ٽ��в�ѯ��";	
	@require_once('cache.php');
	if(file_exists("cache/density.php")){
		@require_once("cache/density.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("cache/density.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
@require_once('header.php');
?>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>�ؼ����ܶȼ��</h1>
      <div class="box1" style="text-align:center;"> 
      <form action="" method="POST">
          <span class="info3" > ������Ҫ��ѯ��������
           <font color="green"><b>HTTP://</b></font> <input name="domain" type="text" id="domain" class="input" size="30" value="<?php echo $domain;?>"/>&nbsp;&nbsp;�ؼ��֣�<input name="keys" id="keys" value="<?php echo $keys;?>" size="30" class="input">
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub"/>
          </span></form>
<div>
<?php echo $text;?>
</div>
          <div style="width:100%">
              <div style="float:right; width:40%; text-align:right; padding-top:9px;">
              </div>
          </div>
      </div>
    </div>
  </div>  
<div id="b_14">
<h1>�����ѯ��</h1>
<div class="box1">
<span class="info2"> 
<table>
<tr><td align="left" style= "word-wrap:break-word;word-break:break-all">
<?php
@require_once('cache/density.php');
if($urls){
foreach ($urls as $key=>$v){
	echo "<a href=http://".$urls[$key]." target=_blank>".$urls[$key]."</a>&nbsp;&nbsp;";
}
}?></td></tr>
</table>
</span>
</div>
    <div class="box">
      <div id="b_14">
        <h1>���߼��</h1>
        <div class="box1">
            <span class="info2">
               ͨ�������߿��Կ��ټ��ҳ��ؼ��ʳ��ֵ��������ܶȣ����ʺ�֩�������
            </span>
        </div>
      </div>
</div>
<?php @require_once('foot.php');?>