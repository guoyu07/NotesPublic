<?php
$hu = 'utf';
@require_once('header.php');
?>
<div class="main"> 
<script type="text/javascript"> 
function ConvUtf(obj,btn){
   document.getElementById("result").value=obj.value.replace(/[^\u0000-\u00FF]/g,function($0){return escape($0).replace(/(%u)(\w{4})/gi,"&#x$2;")});
}
function ResChinese(obj,btn)
{
   document.getElementById("content").value=unescape(obj.value.replace(/&#x/g,'%u').replace(/;/g,''));
}
function preview() {
	var win = window.open();
	win.document.open('text/html', 'replace');
	win.document.writeln(content.value);
	win.document.close();
}
</script>
   <div class="box">
      <div id="b_1">
        <h1><div class="titleft">UTF-8����ת������</div></h1>
           <div class="box1">
             <div class="info1">              
               <div align="center" style="padding-top:10px;">
                <textarea id="content" name="content" style="width:850px;height:150px;border:1px solid #c5e2f2;overflow:visible;" cols="20" rows="15">�뽫��Ҫת���ĺ�������ճ�������[���ڼ��������⣬��ת������ֻ����IE��ʹ�ã�FIREFOX��Ч]</textarea>
                </div>
                <div style="margin-left:2px;padding:2px 0px 0px 0px;">
                <input class="but2" id="conv" type="button" style="width:150px;" value="���� ת�� UTF-8 ��" onclick="ConvUtf(content,this);"/>
                <input class="but2" id="res" type="button" style="width:150px;" value="UTF-8 ��ԭ ���� ��" onclick="ResChinese(result,this);" />
               </div>
               <div align="center">
                <textarea id="result" name="result" style="width:850px;height:150px;border:1px solid #c5e2f2;overflow:visible;" rows="15"></textarea>
              </div>
               <div style="margin-left:2px;padding:2px 0px 0px 0px;">
               <input class="but2" id="pre" type="button" value="Ԥ��ת������" onclick="preview();" />
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
<p>UTF-8����ת��</p>
</span>
</div>
</div>
<?php @require_once('foot.php');?>