<?php
$hu = 'pr';
@require_once('../header.php');
?>
<script language="javascript" src="../js/ajax.js"></script>
<script language="javascript">
window.onload=function doajax(){
	var domain = $('domain').value;
	var xz = 0;
	if($('ejym').checked == true){
		var xz = 1;
	}
	$('seo_result').innerHTML = '&nbsp;<img src="../images/loading.gif" width="94" height="15" align="absmiddle" alt="���ڼ���,���Ժ�...&#10;�����ʱ��δ��Ӧ���볢�����²�ѯ"/> Loading...';
	talktoServer('donow.php?domain='+domain+'&xz='+xz,'seo_result',"html");
}
</script>
<div class="main">
<div class="box">
<div id="c">
  <h1>PRֵ��ѯ</h1>
  <div class="box1" style="text-align:center;"> 
  <form action='' method='post'>
      <span class="info3" >������Ҫ��ѯ��������
       <font color="green"><b>HTTP://</b></font>
<textarea rows="5" cols="50" style="border: 1px solid rgb(126, 157, 185); background-color: white;" id="domain"  name="domain" autocomplete="off">
<?php echo $_GET['domain'];?>
</textarea><input type="checkbox" id="ejym" value="1"/>��ѯ��������(����á�,������)
        <input name="btnS" class="but" type="button" value="��ѯ" id="sub" onclick="doajax();"/>
        </form>
      </span><div class="t"  id="seo_result">
</div>
      <div style="width:100%"><div>
<div>
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
          PRֵȫ��ΪPageRank(��ҳ����)��ȡ��Google�Ĵ�ʼ��LarryPage������Google�������㷨��������ʽ����һ���֣���Google����������ʶ��ҳ�ĵȼ�/��Ҫ�Ե�һ�ַ�������Google��������һ����վ�ĺû���Ψһ��׼�������������Title��ʶ��Keywords��ʶ��������������֮��Googleͨ��PageRank�����������ʹ��Щ���ߡ��ȼ�/��Ҫ�ԡ�����ҳ���������������վ��������������Ӷ�����������������Ժ�������
        </span>
    </div>
  </div>
</div>
<?php @require_once('../foot.php');?>