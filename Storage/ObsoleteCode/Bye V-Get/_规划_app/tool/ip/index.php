<?php
header("Content-Type:text/html;charset=GB2312");
$hu = 'ip';
@require_once('../header.php');
include_once('../friendlink/qqwry.php');
@require_once('ip.php');
?>
<script language="javascript" type="text/javascript">
window.onload=function dis(){
	if(document.getElementById("url").value != ""){
		document.getElementById("status").style.display = "";
	}
}
</script>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>IP��ѯ</h1>
<div class="box1" style="text-align:center;">
<form method="post" action="" name="ipfrom" onsubmit="return checkIP();">
<span class="info3" id="ipp"><?php echo $ips?>
</span>������IP��������
    <input name="ip" type="text" id="url" isget="false" url="true" class="input" size="40" value="<?php echo $inip?>" />
    <input name="button" isget="false" type="submit"  id="sub" class="but" value="�� ѯ" />
<INPUT TYPE="hidden" name="action" value="2">
           <div id="more" class="div_whois">
               ��ز�ѯ:
<a href="/tool/dels/dels.php?domain=seoued.net">����ɾ��ʱ��</a>
<a href="/tool/ip/?domain=seoued.net">IP��ѯ</a>
<a href="/tool/whois/?domain=seoued.net">WHOIS��ѯ</a>
            </div>
    <span id="status" style="display:none" class="info1" style="text-align:center;">
        
        <strong class="red"><?php echo $jieguo?>��ѯ���: <?php echo $inip?> ==>> <?php echo $ipp1?>  ==>> <a href="javascript:showAddress('<?php echo $ipp2?>');"><?php echo $ipp2?></a> </strong><br />        
         ��������������ʾ���� : ԭʼ�������� ==>> ��ȡ��IP��ַ ==>>IP������λ��<br />
   </span>
</FORM>
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
               ͨ���ù��߿��Բ�ѯָ��IP�������ַ��������������IP�������ַ�������ڹ��һ���У�������ȷ��ĳ�����ɣ�������ѧУ�ȣ�<br />
			   ����Ľ�������ο���
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>