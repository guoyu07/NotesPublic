<?php
$hu = 'htmlubb';
@require_once('header.php');
?>
<div class="main"> 
<script src="js/Html_Ubb.js" type="text/javascript"></script>
<div class="box">
    <div id="b_1">
        <h1><div class="titleft">HTML/UBB����ת������</div></h1>
        <div class="box1" style="text-align:center">
            <div class="info1"> 
                 <div class="Gbtop">
                    <div class="WStop1">
                    <div class="WStop2">HTMLԴ����ת��UBB���빤��</div>
                    </div>
                    <div style="padding:5px;"> 
                      <div class="WSIn">
                        <div class="WSTitle">�뽫 <strong>Html</strong> Դ���뿽�����������:</div>
                        <div class="WSt">
                            <textarea id="Hsource" onfocus="htmltoubb()" onkeyup="htmltoubb()"style=" border:1px solid #c5e2f2; width:800px; height:150px; overflow:visible;"></textarea>
                        </div>
                        <span  class="WSTitle">�����������Ӧ�� <strong>UBB</strong> ����: </span> <br />
                        <span  class="WSt">
                            <textarea id="Uresult" style=" border:1px solid #c5e2f2; width:800px; height:150px; overflow:visible;"></textarea>
                       </span>
                      </div>
                      </div>
                </div>
                <div class="Gbtop">
                   <div class="WStop1">
                     <div class="WStop2">UBBԴ����ת��HTML���빤��</div>
                   </div>
                   <div style="padding:5px;"> 
                      <div class="WSIn">
                         <span class="WSTitle">�뽫 <strong>UBB</strong> Դ���뿽�����������:</span><br />
                         <span class="WSt">
                            <textarea id="Usource" onfocus="ubbtohtml()" onkeyup="ubbtohtml()" style=" border:1px solid #c5e2f2; width:800px; height:150px; overflow:visible;"></textarea>
                         </span>
                        <span class="WSTitle">�����������Ӧ�� <strong>Html</strong> ����: </span><br />
                        <span class="WSt">
                           <textarea id="Hresult" style=" border:1px solid #c5e2f2; width:800px; height:150px; overflow:visible;"></textarea>
                        </span>
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
<p>UBBԴ����ת��HTML����</p>
</span>
</div>
</div>
<?php @require_once('foot.php');?>