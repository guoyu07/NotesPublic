<?php
$hu = 'shouji';
@require_once('../header.php');
if (isset($_POST["action"])){
	if ("search"==$_POST["action"] ){
		require ('function.php');
		$phone  = (isset($_POST["phone"]))?$_POST["phone"]:die ("�뷵��");
		$result = "���ѯ���ֻ�����<font color=red>".$phone."</font>����<font color=red>".getphone($phone)."</font>";
	 }
}
?>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>��ѯ�ֻ����������</h1>
      <div class="box1" style="text-align:center;"> 
      <form action="" method="POST">
          <span class="info3" > ������Ҫ��ѯ���ֻ��ţ�
           <input name="phone" type="text" id="phone" class="input" size="40" url="true" value="<?php echo $_POST['phone'];?>"/><input name="action" type="hidden" value="search">
            <input name="btnS" class="but" type="submit" value="��ʼ��ѯ"  id="sub" />
            </form>
          </span><div class="t" id="seo_result"><?php echo $result;?>
</div>
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
            �����ֻ�����ǰ��λ������ȫ�����뼴�ɲ�ѯ�ֻ���������ء�
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>