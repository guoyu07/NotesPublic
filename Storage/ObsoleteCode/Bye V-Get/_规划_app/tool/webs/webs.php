<?php
$hu = 'webs';
@require_once('../header.php');
?>
<script language='javascript' src="../js/ajax.js"></script>
<script type="text/javascript" src="ajax2.js"></script>
<script language="javascript">
window.onload=function doseo() {
    if($('domain').value != ""){
		$('seo_result').style.display = "";		
		$('seo_result').innerHTML = '&nbsp;<img src="../images/loading.gif" width="94" height="15" align="absmiddle" alt="���ڼ���,���Ժ�...&#10;�����ʱ��δ��Ӧ���볢�����²�ѯ"/> Loading...';
		$('seo_result').style.display = '';
		makeRequest('domain='+$('domain').value+'&val='+$('selects').value);
		$('testlinkstatus').innerHTML="<input class=\"but\" type=\"button\" value=\"��ʼ����\" onclick=\"javascript:ceshi(0);\" />";
    }
}
function ceshi(i){
    var sizes = $('counts').value;
    i++;
    if(i<=sizes){
		$('testlinkstatus').style.display="none";
		$('test'+i).style.display="";
		talktoServer('testlink.php?testlink='+$('link'+i).innerHTML,'test'+i,"html");
		setTimeout("ceshi("+i+")",800);
    }else{
    	var die=0;
    	for(var k=1;k<sizes;k++){
    		fl = $('test'+k).innerHTML;
    		var re = new RegExp('^(.*> �� <.*)$');
			  	if(fl.match(re)){
				   die++;
				   }
    	}
    	var res = "������ɣ���վ�������ӣ�"+sizes+"���������ӣ�"+die+"����";
    	alert(res);
    	$('testlinkstatus').innerHTML=res;
    	$('testlinkstatus').style.display="";
    }
}
</script>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>�����Ӽ��/ȫվPR��ѯ</h1>
      <div class="box1" style="text-align:center;">
          <span class="info3" > ������Ҫ��ѯ��������
           <font color="green"><b>HTTP://</b></font> <input name="domain" type="text" id="domain" class="input" size="25" url="true" value="<?php echo $_GET['domain'];?>"/>&nbsp;&nbsp;<select onchange="doseo()" id="selects"><option value="1">��������</option><option value="2">վ������</option><option value="3">վ������</option></select>
            <input name="btnS" class="but" type="submit" value="��ʾ����"  id="sub" onclick="doseo()"/>&nbsp;&nbsp;
          
		  <div id="seo_result" style="display:none">
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
@require_once('../cache/webs.php');
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
               <p>ͨ�������߿��Կ��ٲ�����վ�������ӡ������� - Ҳ����Ч���ӣ�����Щ���ɴﵽ�����ӡ�һ����վ���������Ӳ���ʲô���£�����һ����վ������ڴ����������ӣ��ؽ����������վ����������������������֩����ͨ���������������������̫�������޷����������¼ҳ����������٣����������վ�����������е�Ȩ�ػ��󽵵͡��ò�ѯ���Ա���ָ����ҳ���������ӣ�������ÿ�����ӵ���Ч�ԣ��ҳ������ӡ� </p> </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>