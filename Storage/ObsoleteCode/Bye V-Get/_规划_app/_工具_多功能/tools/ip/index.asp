<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%
'============================
   '����SQL�Ƿ��ַ�
   'Num 0һ�� 1����
   '============================
   Function CheckStr(Strer,Num)
        Dim Shield,w
	    If Strer = "" Or IsNull(Strer) Then Exit Function
	    Select Case Num
		  Case 0
			Strer = Trim(Strer)
			Strer = Replace(Strer,CHR(39),"&#39;")     '������
            Strer = Replace(Strer,CHR(34),"&quot;")    '˫����
            Strer = Replace(Strer,CHR(32),"&nbsp;")    '�ո�
            Strer = Replace(Strer,CHR(60),"&lt;")      '<
            Strer = Replace(Strer,CHR(62),"&gt;")      '>
            Strer = Replace(Strer,vbCrLf,"<br>")       
		  Case 1
	        If IsNumeric(Strer) = 0 Then
	          Response.Write "��������"
		      Response.End
	        End If
			Strer = Int(Strer)
		  Case 2'�ı����ύ
			Strer = Replace(Strer,CHR(39),"&#39;")     '������
            Strer = Replace(Strer,CHR(34),"&quot;")    '˫����
            Strer = Replace(Strer,CHR(32),"&nbsp;")    '�ո�
            Strer = Replace(Strer,CHR(60),"&lt;")      '<
            Strer = Replace(Strer,CHR(62),"&gt;")      '>
            Strer = Replace(Strer,vbCrLf,"<br>")       
		  Case 3'�ı�����ʾ
			Strer = Replace(Strer,"&#39;",CHR(39))     '������
            Strer = Replace(Strer,"&quot;",CHR(34))    '˫����
            Strer = Replace(Strer,"&nbsp;",CHR(32))    '�ո�
            Strer = Replace(Strer,"&lt;",CHR(60))      '<
            Strer = Replace(Strer,"&gt;",CHR(62))      '>
            Strer = Replace(Strer,"<br>",vbCrLf)
          
          Case 4'�滻�ַ�(<script><//script><iframe></iframe>)
             Strer = Replace(Strer,"script"," ")
	         Strer = Replace(Strer,"SCRIPT"," ")
             Strer = Replace(Strer,"iframe", " ")
	         Strer = Replace(Strer,"IFRAME", " ")

		End Select

	   ' Shield = Split(KM_Kill,"|")
	   ' For w=0 To Ubound(Shield)
		  'If Shield(w) <> "" Then
            'Strer=Replace(Strer,Split(Shield(w),"=")(0),Split(Shield(w),"=")(1))
		  'End If
		
	    'Next
	    CheckStr = Strer
   End Function
   %>
   
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>IP��ַ��ѯ-������ʵ�ò�ѯ����</title>
<meta name="keywords" content="ip,IP��ѯ,IP��ַ��ѯ">
<meta content="��ip,IP��ѯ,IP��ַ��ѯ!" name="description" />
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {margin:0; padding:0;background: #FFF url('../images/top3.gif') repeat-x top; font-size:12px;color:#666}
.style1 {font-size: 14px}
-->
</style>
</HEAD>
<BODY>
<table width="960" height="75" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="264" rowspan="2" align="center"><a href="../index.html">
	<img src="../images/logo.gif" width="224" height="38" border="0" /></a></td>
    <td height="24" valign="top">
	<table width="321" height="24" border="0" align="right" cellpadding="0" cellspacing="0" background="../images/top2.gif">
       <tr>
          <td align="center" class="cwhite12"><a href="#" class="cwhite12">tools.kqiqi.com</a>��<a href="#" OnClick='this.style.behavior="url(#default#homepage)";this.setHomePage("http://tools.kqiqi.com");' class="cwhite12">��Ϊ��ҳ</a> | <a href="#" onClick="window.external.AddFavorite('http://tools.kqiqi.com','������ʵ�ò�ѯ����');" class="cwhite12">�ղر�վ</a></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table height="38" border="0" cellpadding="0" cellspacing="0" style="margin-left:5px">
      <tr align="center">
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../index.html" class="navfh2">�ס�ҳ</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../admin/index.html" class="navfh2">վ������</a></td>
          <td width="88" background="../images/nav2.gif" style="padding-top:5px"><a href="../query/index.html" class="navfh1">��ѯ����</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../calculation/index.html" class="navfh2">���㹤��</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../password/index.html" class="navfh2">���ܽ���</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../conversion/index.html" class="navfh2">ת������</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../color/index.html" class="navfh2">��ɫ����</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../web/index.html" class="navfh2">���縨��</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../picture/index.html" class="navfh2">ͼƬ����</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../others/index.html" class="navfh2">��������</a></td>
        </tr>
    </table></td>
  </tr>
</table>
<script language="javascript" src="../js/others_top.js"></script>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mainbg1">
  <tr valign="top">
    <td width="20">��</td>
    <td width="190">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" height="10">

</td>
</tr>
      <tr>
        <td width="75%">
		<img src="../images/t9.gif" width="32" height="32" align="absmiddle" />��<span class="navfh1">�����б�</span></td>
        <td width="25%">��</td>
      </tr>
    </table>
     <table width="100%"  border="0" cellpadding="0" cellspacing="0" background="../images/t12.gif" class="mar5">
        <tr>
          <td height="10"> </td>
        </tr>
      </table>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" class="mar5">
      <tr>
        <td>��
 <div id="menu">
 <div class="box">
    <a href="http://cy.kqiqi.com" target="_blank">�����ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>

  <div class="box">
    <a href="../query/Wnl.html">������
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
    <div class="box">
    <a href="../ip">IP��ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/shengxiao.html">��Ф��ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/bazi.html">�������ֲ�ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/mark.html">��־��ȫ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/xingzuo.html">�������ձ�
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/ems.html">�����ݲ�ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
<div class="box">
    <a href="../query/nannv.html">������Ů��ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
<div class="box">
    <a href="../query/dianhua.html">���õ绰����
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
<div class="box">
    <a href="../query/chepai.html">���ƺ����ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
<div class="box">
    <a href="../query/weizhang.html">ȫ��������ͨΥ�²�ѯ��
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
<div class="box">
    <a href="../query/worldtime.html">����ʱ���ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/funv.html">��Ů��ȫ�ڲ�ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/yuansu.html">Ԫ�����ڱ�
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/health.html">������ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/zipcode.html">�ʱ�͵绰����
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
  <div class="box">
    <a href="../query/id.html">���֤�����ڵ�
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
    <div class="box">
    <a href="../tel">(�ֻ�/�绰)������
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
    <div class="box">
    <a href="../query/train.html">�г�ʱ�̲�ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
    <div class="box">
    <a href="../query/sudu.html">���������ٶȲ���
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>
   <div class="box">
    <a href="../query/keywords.html">�ؼ����ܶȲ�ѯ
      <span class="left"></span>
      <span class="right"></span>
    </a>
  </div>

</div>
       </td>
      </tr>
    </table>

      <table width="100%" height="17"  border="0" cellpadding="0" cellspacing="0" background="t2.gif" class="mar5">
        <tr>
          <td> </td>
        </tr>
      </table>
     
    </td>
    <td width="27">��</td>
    <td width="700">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
      <td height="10" colspan="2">
      </td>
      </tr>
        <tr>
         <td width="40"><img src="../images/ip.gif" width="32" height="32"> </td>
          <td><span class="navfh1">IP��ѯ</span></td>
        </tr>
      </table>
      <hr size="1" style="color:#E3E8E9" />
      <table width="100%"  border="0" cellpadding="3" cellspacing="1">
              <tr>
          <td>
          <SCRIPT LANGUAGE="JavaScript">
<!--
function checkIP()
{
	var ipArray,ip,j;
	ip = document.ipform.ip.value;
	
	if(/[A-Za-z_-]/.test(ip)){
		if(!/^([\w-]+\.)+((com)|(net)|(org)|(gov\.cn)|(info)|(cc)|(com\.cn)|(net\.cn)|(org\.cn)|(name)|(biz)|(tv)|(cn)|(mobi)|(name)|(sh)|(ac)|(io)|(tw)|(com\.tw)|(hk)|(com\.hk)|(ws)|(travel)|(us)|(tm)|(la)|(me\.uk)|(org\.uk)|(ltd\.uk)|(plc\.uk)|(in)|(eu)|(it)|(jp))$/.test(ip)){
			alert("������ȷ��IP��");
			document.ipform.ip.focus();
			return false;
		}
	}
	else{
		ipArray = ip.split(".");
		j = ipArray.length
		if(j!=4)
		{
			alert("������ȷ��IP��");
			document.ipform.ip.focus();
			return false;
		}

		for(var i=0;i<4;i++)
		{
			if(ipArray[i].length==0 || ipArray[i]>255)
			{
				alert("������ȷ��IP��");
				document.ipform.ip.focus();
				return false;
			}
		}
	}
}
//-->
</SCRIPT>
<FORM METHOD=POST ACTION="index.asp" name="ipform" onsubmit="return checkIP();">
<table width="100%"  border="0"  align="center" cellpadding="4" cellspacing="1">
<tr>
<td bgcolor="#95e2ff">
<p align="center">IP��ַ��ѯ
</td>
</tr>
  <tr>
    <td>������IP��ַ��
    <input name="ip" type="text" value="" size="31">
    <input type="submit" value="��ѯ" class="button1">
    ����IP�ǣ�<%=request.ServerVariables("REMOTE_ADDR")%>
    </td>
  </tr>
  <tr>
<td bgcolor="#95e2ff">
<p align="center">��ѯ���
</td>
</tr>
<tr>
    <td>��Ҫ��ѯ��IP���ԣ�
  <font color="red">
<%
clientip=CheckStr(request("ip"),0)
If clientip ="" Then 
clientip = Request.ServerVariables("REMOTE_ADDR")
'else
'clientip = Request.ServerVariables("HTTP_X_FORWARDED_FOR")
end if


Function getIpvalue(clientIP)'�õ��ͻ��� ��IPת���ɳ����ͣ�����ֵgetIpvalue
On Error Resume Next
Dim strIp,array_Ip
strIp=0
array_Ip = Split(clientIP,".")
If UBound(array_Ip)<>3 Then
getIpvalue=0
Exit Function
End If
For i=0 To 3
strIp=strIp+(CInt(array_Ip(i))*(256^(3-i)))
Next
getIpvalue=strIp
If Err Then getIpvalue=0
End Function 

Set CONN=Server.CreateObject("ADODB.Connection")
CONN.Open "DRIVER={Microsoft Access Driver (*.mdb)};DBQ="&Server.Mappath("IP.mdb")
IpValue=getIpvalue(clientIP)
SQL = "SELECT * FROM [IP] WHERE StartIP<=" & IpValue & " AND EndIP>=" & IpValue
Set RsIp = CONN.Execute ( SQL )
If RsIp.bof and RsIp.eof then
UrlCity="δ֪"
Else
UrlCity=RsIp.Fields.Item("Country").Value
UrlCity1=RsIp.Fields.Item("local").Value

End If
Set Conn = Nothing
RsIp.close
Set RsIp=Nothing
response.write ""&UrlCity&""&UrlCity1&""
%>
</font>
</td>
  </tr>

</font>
</td>
  </tr>
  <tr>
<td bgcolor="#95e2ff">
</td>
</tr>
  <tr>
  <td>
            <script type="text/javascript" src="../js/wz.js"></script>
         <script type="text/javascript" src="../js/Copy.js"></script>
  </td>
  </tr>
 
</table>

</FORM>


          
          </td>
        </tr>
        </table>


      <br />
      </td>
    <td width="20">��</td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mainbg2">
  <tr>
    <td height="25"></td>
  </tr>
</table>

<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mainbg2">
  <tr>
    <td><table width="920"  border="0" align="center" cellpadding="0" cellspacing="20" class="bottombg">
       <tr>
        <td align="center">
          Copyright &copy; <a href="http://tools.kqiqi.com/">������ʵ�ò�ѯ����</a> All rights reserved - <a href="../map.html">��վ��ͼ</a> - <a href="../contact.html">��ϵ����</a> - <script language="javascript" src="../js/bottom.js"></script>
          </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
 
   
   
  
