<?php
$hu = "unicode";
@require_once('header.php');
?>
<div class="main">
<script src="images/globals.js?ver=20100621" type="text/javascript"></script>
<script src="js/Unicode.js" type="text/javascript"></script>
<div class="box">
<div id="b_1">
    <h1><div class="titleft">Unicode����ת������</div></h1>
    <div class="box1">
         <div class="info1">
             <div class="WStop">
                <div class="WStop1">
                 <div class="WStop2">Unicode ת�� ASCII��ASCII ת�� Unicode</div>
                </div>
                <div style="padding:5px;"> 
                 <div class="WSIn">
                    <div class="WSt">
                        <textarea id="content" name="content" style=" border:1px solid #c5e2f2; width:800px; height:150px; overflow:visible;">�������Ҫת��������ճ�������[���ڼ��������⣬��ת������ֻ����IE��ʹ�ã�FIREFOX��Ч]</textarea>
                    </div>
	                <div class="WSt1">
	                    <input class="but2" type="button" style="width:150px;" value="ASCII ת�� Unicode��" onclick="AsciiToUnicode();"/>
	                    <input class="but2" type="button" style="width:150px;" value="Unicode ת�� ASCII��" onclick="UnicodeToAscii();"/>
	                    <input class="but2" type="button" value=" �� �� " onclick="copy('result')" />
	                    <input class="but2" type="button" value="��ս��" onclick="result.value=''" />
		            </div>
                    <div class="WSt">
                        <textarea id="result" name="result" style=" border:1px solid #c5e2f2; width:800px; height:150px; overflow:visible;"></textarea>
                    </div>
                     <div class="WSt1">
	                    <input type="button" value="Ԥ��ת������" onclick='preview()' class="but2" />
	                </div>
                 </div>
            </div>
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
 <p>Unicode����ת��</p> 
</span>
</div>
</div>
<?php @require_once('foot.php');?>