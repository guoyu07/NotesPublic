<?php
@require_once('header.php');
@include_once('friendlink/qqwry.php');
@include_once('ip/ip.php');
?>
<script language="javascript">
 function chec(){
 	var dom = $('Site_Domain').value;
 	$('dom').value = dom;
 	var len =document.getElementsByName("searchtype").length;
 	var j = '';
 	for(var i=1;i<=len;i++){
 		if ($('searchtype'+i).checked)
 		{
 			j = j+$('searchtype'+i).value+',';
 		}
 	}
 	j = j.substr(0,j.length-1);
 	$('choosea').value = j;
 }
 function checs(){
 	var dom = $('Link_Domain').value;
 	$('dom1').value = dom;
 	var len =document.getElementsByName("searchtypes").length;
 	var j = '';
 	for(var i=1;i<=len;i++){
 		if ($('searchtypes'+i).checked)
 		{
 			j = j+$('searchtypes'+i).value+',';
 		}
 	}
 	j = j.substr(0,j.length-1);
 	$('che1').value = j;
 }
 function radis(){
 	for(var t=0;t<4;t++){
 		if($('md'+t).checked){
 			$('Md5Type').value=t;
 		}
 	}
 }
 function ss(){
 	window.location.href="seo/alls.php?domain="+$('addr_more').value;
 }
 function checkEngines(zt) {
   if(zt){
   	for(var k=1;k<8;k++){
   		$('searchtype'+k).checked = true;
   	}
   }else{
   	for(var k=1;k<8;k++){
   		$('searchtype'+k).checked = false;
   	}
   }
}
 function checkEngines2(zt) {
   if(zt){
   	for(var k=1;k<5;k++){
   		$('searchtypes'+k).checked = true;
   	}
   }else{
   	for(var k=1;k<5;k++){
   		$('searchtypes'+k).checked = false;
   	}
   }
}
</script>
<div class="main">
    <div class="box">
      <div id="b_1">
        <div id="Show_User_Ip">
        <div class="sotopleft"><?php echo $ips?></div>
        </div>
        <div class="box1" style="text-align:center;">
         <div style="padding:5px 0; font-size:15px;"> <font color="green"><b>HTTP://</b></font> <input name="addr_more" type="text" id="addr_more" url="true" class="input" size="35" onKeyDown="if(event.keyCode==13) ss();" />
         </div>
           <input onclick="window.open('dels/dels.php?domain='+getid('addr_more').value)" name="button" type="button" class="but" value="����ɾ��ʱ��" />
           <input onclick="window.open('baidu/baidu.php?domain='+getid('addr_more').value)" type="button" class="but" value="�ٶ���¼"  />
          <input onclick="window.open('whois/?domain='+getid('addr_more').value)" name="button" type="button" class="but" value="Whois ��ѯ" />
          <input onclick="window.open('ip/?domain='+getid('addr_more').value)" name="button" type="button" class="but" value="IP ��ѯ" />
          <input onclick="window.open('pr/pr.php?domain='+getid('addr_more').value)" name="button" type="button" class="but" value="PR ��ѯ" />
          <input onclick="window.open('http://www.seoued.net/tool/alexa/?domain='+getid('addr_more').value)" name="button" type="button" class="but" value="Alexa ����" />
          <input onclick="window.open('friends/friends.php?domain='+getid('addr_more').value)" name="button" type="button" class="but" value="�������Ӽ��" />
          <input onclick="window.open('seo/alls.php?domain='+getid('addr_more').value);" name="button" type="button" class="but" value="SEO�ۺϲ�ѯ" style=" color:#eb6100;" />
        </div>
	  </div>
      </div>
    </div>    
    <div class="box" id="Content_0">
    <div class="col">
    <div id="b_2">   
              <h1>����������¼�����ѯ</h1>         
              <form action="ssyqsl/ssyqsl.php" method="POST">
              <input type="hidden" name="dom" id="dom">
              <input type="hidden" name="choosea" id="choosea">
              <div class="box1">��վ��ַ��<input name="Site_Domain" id="Site_Domain" type="text" url="true" class="input" size="30" value=""/>
              <input name="button" type="submit" class="but" value="��ѯ" onclick="chec();"/>
	          <span class="info">
	            <input id="searchtype1" type="checkbox" name="searchtype" value="1" checked="checked" /><label for="site1">�ٶ�</label>
	            <input id="searchtype2" type="checkbox" name="searchtype" value="2" checked="checked" /><label for="site2">Google</label>
	            <input id="searchtype3" type="checkbox" name="searchtype" value="3" checked="checked" /><label for="site4">�Ż�</label>
	            <input id="searchtype4" type="checkbox" name="searchtype" value="4" checked="checked" /><label for="site8">����</label>
	            <input id="searchtype5" type="checkbox" name="searchtype" value="5" checked="checked" /><label for="site16">�е�</label>
	            <input id="searchtype6" type="checkbox" name="searchtype" value="6" checked="checked" /><label for="site32">��Ӧ</label>
	            <input id="searchtype7" type="checkbox" name="searchtype" value="7" checked="checked" /><label for="site8192">�ѹ�</label>
	            <input id="chk" name="chk" type="checkbox" checked="checked" onclick="checkEngines(this.checked);" />
<label for="chk">ȫѡ</label>              
              </span>
              </div>
              </form>
            </div>		
    </div>    	  
    <div class="col2">
    <form action="ssyqfl/ssyqfl.php" method="POST">
    <div id="b_3">
              <h1>�������淴�����������ѯ</h1>
            <div class="box1">��վ��ַ��<input name="ctl00$Main$Link_Domain" id="Link_Domain" type="text" url="true" class="input" size="30"  value="" />
              <input type="hidden" name="dom1" id="dom1">
              <input type="hidden" name="che1" id="che1">
                  <input name="button2" type="submit" class="but" value="�� ѯ" onclick="checs();"/>
                  <span class="info">
                    <input type="checkbox" id="searchtypes1" name="searchtypes" value="1" checked="checked" /><label for="link1">�ٶ�</label>
                    <input id="searchtypes2" type="checkbox" name="searchtypes" value="2" checked="checked" /><label for="link2">Google</label>
                    <input id="searchtypes3" type="checkbox" name="searchtypes" value="3" checked="checked" /><label for="link4">�Ż�</label>
                    <input id="searchtypes4" type="checkbox" name="searchtypes" value="4" checked="checked" /><label for="link16">�е�</label>
                    <input id="chk2" name="chk2" type="checkbox" checked="checked" onclick="checkEngines2(this.checked);" />
<label for="chk">ȫѡ</label>
              </div>
              </form>
            </div>	
    </div>	   	  
    </div>
    <div class="box" id="Content_1">
    <div class="col">
    <div id="b_4">
              <h1>�ؼ���������ѯ</h1>
              <div class="box1">��վ��ַ��<input name="s" id="s" url="true" type="text" class="input" size="30"/>
              &nbsp;&nbsp;<select name="t" id="ctl00_Main_SEnginType" style="width:90px; height:26px;"> 
                 <option selected="selected" value="1">Baidu</option> 
                 <option value="2">Google</option>
                 </select>
             <br/> ��&nbsp;&nbsp;��&nbsp;�ʣ�<input name="kw" id="kw" type="text" class="input" size="30" />
              <input onclick="window.open('keys/keys.php?domain='+getid('s').value+'&keys='+getid('kw').value+'&val='+getid('ctl00_Main_SEnginType').value);"  name="button" type="button" class="but" value="�� ѯ" />
              </div>             
            </div>	
    </div>
    <div class="col2">
    <div id="b_5">
              <h1>ҳ��ؼ����ܶȲ�ѯ</h1>
              <div class="box1">��վ��ַ��<input name="DAddress" id="durl" url="true" type="text" class="input" size="30" value=""  /><br />
	      ��&nbsp;&nbsp;��&nbsp;�ʣ�<input name="DKeyWords" words="true" id="DKeyWords" type="text" class="input" size="30" />
	      <input name="button" type="button" onclick="window.open('density.php?keys='+getid('DKeyWords').value+'&url='+getid('durl').value)" class="but" value="�� ѯ" />
          </div>
            </div>		
    </div>	 	   	  
    </div>
<div style="clear:both;"></div>
<div style="margin-top:-5px!import; margin-top:0px;margin-bottom:5px;">
<div style="clear:both;"></div>
</div>
<div class="box" id="Content_2">
<form action="mds.php" method="POST">
  <div id="b_11">
      <h1>MD5����</h1><input type="hidden" name="Md5Type" id="Md5Type">     
      <div class="box1">�����������ܵ��ַ�����<input name="mds" id="mds" type="text" class="input" size="43" />
          <input id="md0" name="Md5Types" value="0" checked="checked" type="radio"/><label for="md32l">32λ[��]</label>
          <input id="md1" name="Md5Types" value="1" type="radio" /><label for="md32s">32λ[С]</label>
          <input id="md2" name="Md5Types" value="2" type="radio" /><label for="md16l">16λ[��]</label>
          <input id="md3" name="Md5Types" value="3" type="radio" /><label for="md16s">16λ[С]</label>
          <input name="" class="but" type="submit" onclick="radis();" value="�� ��" />
      </div>          
    </div>
    </form>
</div>
<div class="box" id="Content_3">
  <div class="col">	
    <div id="b_6">
      <h1>��������ģ��ץȡҳ��</h1>      
      <div class="box1">ҳ���ַ��<input url="true" name="txtSiteUrl" id="txtSiteUrl" type="text" class="input" size="30" value=""/>
       <input name="button" type="button" onclick="window.open('esearch.php?domain='+getid('txtSiteUrl').value)" class="but" value="�� ѯ" />
      </div>      
    </div>			
    <div id="b_7">
      <h1>�ַ���ASCII�� ת������</h1>
      <div class="box1">����һ���ַ���<input name="asciitxt" id="asciitxt" type="text" class="input" size="25"  />
      <input name="button" type="button" class="but" onclick="var v=document.getElementById('asciitxt').value;if(v&&v.length>0){alert('�ַ���'+v.charAt(0)+' ��ASCII��Ϊ��'+v.charCodeAt(0));}" value="��ʾ�ü�ֵ" />	      
      </div>
    </div>
  </div>
  <div class="col2">	
    <div id="b_8">
      <h1>��ҳ META ��Ϣ���</h1>          
      <div class="box1">ҳ���ַ��<input name="txtSiteUrl" id="metaurl" url="true" type="text" class="input"  size="30" value=""  />
      <input name="button" type="button" onclick="window.open('meta.php?domain='+getid('metaurl').value)" class="but" value="�� ѯ" />
      </div>          
    </div>		
    <div id="b_13">
      <h1>����������/ȫվPR��ѯ</h1>
      <form id="formlink" action="/Links/Default.aspx" method="post" target="_blank">
      <div class="box1">��վ��ַ��<input name="DAddress" id="linkurl" url="true" type="text" class="input" size="30" value=""/>
      <input name="button" type="button" onclick="window.open('webs/webs.php?domain='+getid('linkurl').value)" class="but" value="�� ѯ" />      
     </div>
    </form>
  </div>
  </div>	  	  
</div>
<div class="box">
  <div id="b_15">
    <h1>������������</h1>  
  </div>
</div>
</div>
<?php @require_once('foot.php');?>