<?php
$hu = 'ssyqfl';
@require_once('../header.php');
?>
<script type="text/javascript" src="ajax2.js"></script>
<script type="text/javascript">
 window.onload=function doseo() {
 	var len = document.getElementsByName("searchtype").length;
	var j   = '';
	for(var i=1;i<=len;i++){
	  if ($('searchtype'+i).checked){
        j = j+$('searchtype'+i).value+',';
      }
	}
	j = j.substr(0,j.length-1);	
	if(($('che').value) != j){
	  $('che').value = j;
	}	
	$('seo_result').innerHTML = '&nbsp;<img src="../images/loading.gif" width="94" height="15" align="absmiddle" alt="���ڼ���,���Ժ�...&#10;�����ʱ��δ��Ӧ���볢�����²�ѯ"/> Loading...';
	$('seo_result').style.display = '';	
	makeRequest('domain='+$('domain').value+'&che='+$('che').value);
}
function CheckAll(form){
for (var i=0;i<form.elements.length;i++){
	var e = form.elements[i];
	e.checked == true ? e.checked = false : e.checked = true;
}
}
 function checkEngines2(zt) {
   if(zt){
   	for(var k=1;k<5;k++){
   		$('searchtype'+k).checked = true;
   	}
   }else{
   	for(var k=1;k<5;k++){
   		$('searchtype'+k).checked = false;
   	}
   }
}
</script>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>�������淴������</h1>
      <div class="box1" style="text-align:center;"> 
       <input type="hidden" value="<?php echo $_POST['che1'];?>" id="che" name="che">
          <span class="info3" > ������Ҫ��ѯ��������
            <font color="green"><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $domain = $_POST['dom1']?$_POST['dom1']:'chinaccnet.com';?>"/>
            <input name="btnS" class="but" type="button" value="��ѯ"  id="sub" onclick="doseo();"/>
          </span>
           <input id="searchtype1" type="checkbox" name="searchtype" value="1" <?php if(strpos($_POST['che1'],'1') !== false) echo "checked";?>/><label for="site1">�ٶ�</label>
        <input id="searchtype2" type="checkbox" name="searchtype" value="2" <?php if(strpos($_POST['che1'],'2') !== false) echo "checked";?>/><label for="site2">Google</label>
        <input id="searchtype3" type="checkbox" name="searchtype" value="3" <?php if(strpos($_POST['che1'],'3') !== false) echo "checked";?>/><label for="site4">�Ż�</label>
        <input id="searchtype4" type="checkbox" name="searchtype" value="4" <?php if(strpos($_POST['che1'],'4') !== false) echo "checked";?>/><label for="site16">�е�</label>
         <input id="chk2" name="chk2" type="checkbox" checked="checked" onclick="checkEngines2(this.checked);" />
<label for="chk">ȫѡ</label>
<div class="t" style="display:none" id="seo_result">
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
<div id="b_14">
<h1>�����ѯ��</h1>
<div class="box1">
<span class="info2"> 
<table>
<tr><td align="left" style= "word-wrap:break-word;word-break:break-all">
<?php
@require_once('../cache/ssyqfl.php');
if($urls){
foreach ($urls as $key=>$v){
	echo "<a href=http://".$urls[$key]." target=_blank>".$urls[$key]."</a>&nbsp;&nbsp;";
}}?></td></tr>
</table>
</span>
</div>
    <div class="box">
      <div id="b_14">
        <h1>���߼��</h1>
        <div class="box1">
            <span class="info2">
               <p>ͨ�������߿��Կ��ٲ�ѯ���������������վ�ķ�������������</p>
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>