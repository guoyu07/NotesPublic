<?php
$hu = 'google';
@require_once('../header.php');
?>
<script type="text/javascript" src="ajax2.js"></script>
<script type="text/javascript">
 window.onload=function doseo() {
    if($('domain').value != ""){
	 	var a= $('selects').value; 
		$('seo_result').innerHTML = '&nbsp;<img src="../images/loading.gif" width="94" height="15" align="absmiddle" alt="���ڼ���,���Ժ�...&#10;�����ʱ��δ��Ӧ���볢�����²�ѯ"/> Loading...';
		$('seo_result').style.display = '';		
		makeRequest('domain='+$('domain').value+'&selects='+a+'&start='+$('start').value);
    }
}
</script>
<div class="main">
  <div class="box">
    <div id="c">
      <h1>Google��¼��ѯ</h1>
      <div class="box1" style="text-align:center;"> 
          <span class="info3" > ������Ҫ��ѯ��������
            <font color=green><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $_GET['domain'];?>"/>
            &nbsp;&nbsp;<select name="selects" id="selects" onchange="doseo();">
            <option <?php if($_GET['tbs']=='qdr:d') echo "selected";?> value="d">���24Сʱ��¼���</option>
            <option <?php if($_GET['tbs']=='qdr:w') echo "selected";?> value="w">���һ������¼���</option>
            <option <?php if($_GET['tbs']=='qdr:m') echo "selected";?> value="m">���һ������¼���</option>
            <option <?php if($_GET['tbs']=='qdr:y') echo "selected";?> value="y">���һ����¼���</option>
            <option <?php if($_GET['tbs']=='qdr:0') echo "selected";?> value="0">�ܹ���¼���</option>
            </select><input type="hidden" name="start" id="start" value="<?php echo $_GET['start'];?>">
            <input name="btnS" class="but" type="button" value="��ѯ"  id="sub" onclick="doseo();"/>
          </span>
           <div id="more" class="div_whois">
               ��ز�ѯ:
                 <a href="http://www.seoued.net/tool/alexa">Alexa��ѯ</a> 
<a href="http://whois.chinaccnet.com">whois��ѯ</a> 
<a href="http://ip.chinaccnet.com">����/IP��ѯ</a>
            </div>
          <div style="width:100%">
              <div id="detail" class="info1">
<div id="result" class="div_whois">
<div class="t" style="display:none" id="seo_result">
</div><div id="pageft"></div>
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
@require_once('../cache/google.php');
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
               <p>������Ϊվ���ṩָ��ʱ����Google������ָ����վ����¼�����������¼����ҳ��������ҳ�ľ���������������õ�����Google������������վ��¼�����
</p>  </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>