<%
'******************************
'����Alexa������ѯϵͳV2008[��������alixixi.comԭ��]���°�,���ALEXA�ٷ����ݻ�����������!
'˵����index.asp,ȡ�ùٷ�XMLվ����Ϣ
'	   ajaxloading.asp,XMLHTTP�ɼ��ٷ�ҳ����Ϣ,ȥ����������,��ʽ�����������JS��ʽ����index.asp
'���ߣ���������
'QQȺ��17701495
'���ڣ�2007/11/10
'��ҳ��www.alixixi.com
'��ʾ��http://alexa.alixixi.com
'���������߱����Ա���������а�Ȩ��ע����Ϣ����Ӱ�����ִ��Ч��,����ԭ������,�޸�ʱ�뱣������Ϣ.
'******************************
Dim domain,Url,Url1,strPage,StrPage1
Dim xmldom,SD,SITE,dimg
domain = request.QueryString("url")
if domain = "" then domain = "baidu.com"
If Not iswww(domain) Then
response.write "<script>alert('���������ַ��Ч�����������룡')</script>"
domain = "baidu.com"
End if
host = "tools.kqiqi.com/alexa"
if left(domain,7)="http://" then
	domain=right(domain,len(domain)-7)
end if
if instr(domain,"/")<>0 then
	domain=left(domain,instr(domain,"/")-1)
end if
on error resume Next
Function iswww(strng)
    iswww = false
    Dim regEx, Match
    Set regEx = New RegExp
    regEx.Pattern = "^\w+((-\w+)|(\.\w+))*[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$" 
    regEx.IgnoreCase = True
    Set Match = regEx.Execute(strng)
    if match.count then iswww= true
End Function

Function GetPage(Path)
        t = GetBody(Path)
        GetPage=BytesToBstr(t,"UTF-8")
End function

Function GetPage2(Path)
        t = GetBody(Path)
        GetPage2=BytesToBstr(t,"GB2312")
End function

Function GetBody(url) 
        on error resume next
        Set Retrieval = CreateObject("Microsoft.XMLHTTP") 
        With Retrieval 
        .Open "Get", url, False, "", "" 
        .Send 
        GetBody = .ResponseBody
        End With 
        Set Retrieval = Nothing 
End Function

function fget(str)
select case trim(str)
	case ""
	fget = "--"
	case else
	fget = str
end select
end function
Function BytesToBstr(body,Cset)
        dim objstream
        set objstream = Server.CreateObject("adodb.stream")
        objstream.Type = 1
        objstream.Mode =3
        objstream.Open
        objstream.Write body
        objstream.Position = 0
        objstream.Type = 2
        objstream.Charset = Cset
        BytesToBstr = objstream.ReadText 
        objstream.Close
        set objstream = nothing
End Function

Function FixStr(ByVal str, ByVal start, ByVal last, ByVal n)
Dim strTemp
On Error Resume Next
If InStr(str, start) > 0 Then
Select Case n
Case 0
strTemp = Right(str, Len(str) - InStr(str, start) - Len(start) + 1)
strTemp = Left(strTemp, InStr(strTemp, last) - 1)
Case Else
strTemp = Right(str, Len(str) - InStr(str, start) + 1)
strTemp = Left(strTemp, InStr(strTemp, last) + Len(last) - 1)
End Select
Else
strTemp = ""
End If
FixStr = strTemp
End Function
Function Comma(str) 
If Not(IsNumeric(str)) Or str = 0 Then 
Result = 0 
ElseIf Len(Fix(str)) < 4 Then 
Result = str 
Else 
Pos = Instr(1,str,".") 
If Pos > 0 Then 
Dec = Mid(str,Pos) 
End if 
Res = StrReverse(Fix(str)) 
LoopCount = 1 
While LoopCount <= Len(Res) 



TempResult = TempResult + Mid(Res,LoopCount,3) 
LoopCount = LoopCount + 3 
If LoopCount <= Len(Res) Then 
TempResult = TempResult + "," 
End If 
Wend 
Result = StrReverse(TempResult) + Dec 
End If 
Comma = Result 
End Function 

Function lens(txt, length)
        Dim x, y, ii
        txt = Trim(txt)
        x = Len(txt)
        y = 0
        If x >= 1 Then
            For ii = 1 To x
                If Asc(Mid(txt, ii, 1)) < 0 Or Asc(Mid(txt, ii, 1)) > 255 Then
                    y = y + 2
                Else
                    y = y + 1
                End If
                If y >= length Then
                    txt = Left(Trim(txt), ii-3) & "..."
                    Exit For
                End If
            Next
            lens = txt
        Else
            lens = ""
        End If
End Function


Url = "http://data.alexa.com/data/?cli=10&dat=snba&ver=7.0&url="&Domain
strPage = GetPage(Url)
set xmldom=server.createobject("MSXML2.DOMDocument")   
xmldom.loadXML(strPage)
Set SD = xmldom.documentElement.selectSingleNode("SD")
Set SITE = xmldom.documentElement.selectSingleNode("DMOZ")
Dim ADDR
Dim CREATED
Dim PHONE
Dim OWNER
Dim EMAIL
Dim LANG
Dim LINKSIN
Dim SPEED
Dim POPULARITY
Dim RANK
Dim CHILD
Dim REACH
Set ADDR = SD.selectSingleNode("ADDR")
Set CREATED = SD.selectSingleNode("CREATED")
Set PHONE = SD.selectSingleNode("PHONE")
Set OWNER = SD.selectSingleNode("OWNER")
Set EMAIL = SD.selectSingleNode("EMAIL")
Set LANG = SD.selectSingleNode("LANG")
Set LINKSIN = SD.selectSingleNode("LINKSIN")
Set SPEED = SD.selectSingleNode("SPEED")
Set POPULARITY = SD.selectSingleNode("POPULARITY")
Set RANK = SD.selectSingleNode("RANK")
Set CHILD = SD.selectSingleNode("CHILD")
Set REACH = SD.selectSingleNode("REACH")

Dim SITEINFO
Dim CATS
Dim SiteTitle
Dim	SiteDesc
Dim Cat
Set SITEINFO = SITE.selectSingleNode("SITE")
Set CATS = SITEINFO.selectSingleNode("CATS").selectSingleNode("CAT")
SiteTitle = SITEINFO.attributes(1).value
SiteDesc = SITEINFO.attributes(2).value
Cat = CATS.attributes(1).value

Dim COUNTRY
Dim ZIP
Dim STATE
Dim CITY
Dim STREET
STREET = ADDR.attributes(0).value
CITY = ADDR.attributes(1).value
ZIP = ADDR.attributes(2).value
STATE = ADDR.attributes(3).value
COUNTRY = ADDR.attributes(4).value

Dim	xDate
Dim	xPhone
Dim	xOwner
Dim	xEmail
Dim	xLex
Dim	xCode
Dim	xLinksin
Dim	xSpeed
Dim	xPct
Dim	xPopularity
Dim	xRank
Dim	xChild
Dim	xReach		
xDate = CREATED.attributes(0).value
xPhone = PHONE.attributes(0).value
xOwner = OWNER.attributes(0).value
xEmail	 = EMAIL.attributes(0).value
xLex	 = LANG.attributes(0).value
xCode = LANG.attributes(1).value
xLinksin = LINKSIN.attributes(0).value
xSpeed	 = SPEED.attributes(0).value
xPct	 = SPEED.attributes(1).value
xPopularity = POPULARITY.attributes(1).value
xPopularity = Comma(xPopularity)
xRank = RANK.attributes(0).value
if instr(xRank,"-")>0 then
dimg = "<img src=""skin/up_arrow.gif"" align=absmiddle width=18 height=16 />"
else
dimg = "<img src=""skin/down_arrow.gif"" align=absmiddle width=18 height=16 />"
end if
xRank = replace(xRank,"+","")
xRank = replace(xRank,"-","")
xRank = Comma(xRank)

xChild = CHILD.attributes(0).value
xReach = REACH.attributes(0).value		

Public Function RemoveHtml(byval strContent)
	Dim objReg ,strTmp
	If strContent="" OR ISNull(strContent) Then Exit Function
		
	Set objReg=new RegExp
	objReg.IgnoreCase =True
	objReg.Global=True
	objReg.Pattern="<(.[^>]*)>"
	strTmp=objReg.Replace(strContent, "")
	Set objReg=Nothing
	RemoveHtml=strTmp
	strTmp=""
End Function

Dim SitePic
Dim pm6,pm3,pm1,pday15,pday7
Dim tmp1
Dim t_arr
Dim t_day,t_wk1,t_m3,t_m3_change

pm6 = "http://traffic.alexa.com/graph?w=700&h=280&r=6m&y=t&u="&Domain
pm3 = "http://traffic.alexa.com/graph?w=700&h=280&r=3m&y=t&u="&Domain
pm1 = "http://traffic.alexa.com/graph?w=700&h=280&r=1m&y=t&u="&Domain
pday15 = "http://traffic.alexa.com/graph?w=700&h=280&r=15.0m&y=t&u="&Domain
pday7 = "http://traffic.alexa.com/graph?w=700&h=280&r=7.0m&y=t&u="&Domain

set tnames = request.cookies("dnames")
if isnull(tnames) or len(trim(tnames))=0 then
	tnames = domain&"|"
else
	if instr(tnames,domain)>0 then
		names = replace(tnames,domain&"|","")
	else
		tnames = domain&"|"&tnames
	end if
end If

ttnames = split(tnames,"|")
tmpncontent = ""

if ubound(ttnames)>5 then
	for tat=0 to 4
		tmpncontent = tmpncontent&ttnames(tat)&"|"
	next
else
	tmpncontent=tnames
end If

response.cookies("dnames") = trim(tmpncontent)
response.cookies("dnames").expires = now()+1

%>

<html>
<head>
<title>������alexa��ѯϵͳ,alexa������ѯ,alexa traffic rank,<%=SiteTitle%>��<%=domain%>��Alexa������ѯ</title>
<META http-equiv="Content-Type" content="text/html; charset=gb2312">
<META http-equiv="Content-Language" content="gb2312">
<meta http-equiv="Keywords" content="������Alexa������ѯ,Alexa����,Alexa����,Alexa��ѯ,Alexa��Ϣ,����,����,������,ҳ�������,��������,<%=SiteTitle%>��Alexa������Ϣ,<%=domain%>">
<meta name="description" content="������alexa��ѯ,alexa����,alexa������ѯ,alexa����������ѯ,alexa ��վ������ѯ,alexa��վ����,ȫ��alexa������ѯ,alexa������ѯ,��վalexa������ѯ,alexa������,alexa����������ѯ,alexa traffic rank,alexa��ѯ,alexa����" />
<link href="skin/style.css" rel="stylesheet" type="text/css" />
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<script language=JavaScript src="js/scroll.js"></script>
<style type="text/css">
<!--
body {margin:0; padding:0;background: #FFF url('../images/top3.gif') repeat-x top; font-size:12px;color:#666}
.style1 {font-size: 14px}
-->
</style>
</head>
<body>
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
          <td width="88" background="../images/nav2.gif" style="padding-top:5px"><a href="index.html" class="navfh1">վ������</a></td>
          <td width="88" background="../images/nav1.gif" style="padding-top:5px"><a href="../query/index.html" class="navfh2">��ѯ����</a></td>
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

<DIV id=lovexin1 class="body" style='Z-INDEX: 10; LEFT: 6px; POSITION: absolute; TOP: 117px; width: 108;'><div style="background:#E8F5FE;height:18px;font-size:12px;font-weight:bold;" onClick='javascript:window.hide()'>�����ѯ��¼</div>
<div><ul>	<%
		Set fso = CreateObject("Scripting.FileSystemObject")
	  Set f = fso.OpenTextFile( server.MapPath("cache.asp"), 1, True)
	  if f.AtEndOfStream=false then
	  	content = f.readline()
	  end if
	  f.close
	  if fso.fileexists(server.MapPath("cache.asp"))=true then
	  	fso.deletefile(server.MapPath("cache.asp"))
	  end if
	  Set f = fso.OpenTextFile( server.MapPath("cache.asp"), 8, True)
	  if isnull(content) or len(trim(content))=0 then
	  	content = domain&"|"
	  else
	  	if instr(content,domain)>0 then
	  		set content = replace(content,domain&"|","")
	  	else
	  		content = domain&"|"&content
	  	end if
	  end if
	  names = split(content,"|")
	  tmpcontent = ""
	  for tt=0 to ubound(names)-1
	  if tt<15 then
	  	tmpcontent = tmpcontent&names(tt)&"|"
	  end if
	  %>
	  <li><a href="Index.asp?url=<%=names(tt)%>" title="www.<%=names(tt)%>"><%=names(tt)%></a></li>
	  <%
		next
		f.write(trim(tmpcontent))
		f.close
		set f = nothing
	%>	
</ul></DIV>
</DIV>
<DIV id=lovexin2 class="body" style='Z-INDEX: 10; right: 2px; POSITION: absolute; TOP: 117px; width: 108;;overflow:hidden'><div style="background:#E8F5FE;height:18px;font-size:12px;font-weight:bold;" onClick='javascript:window.hide()'>����ע��վ��</div>
<div>
<ul>
<%
		for ttt=0 to ubound(ttnames)-1
		%>
		<li><a href="index.asp?url=<%=ttnames(ttt)%>" title="www.<%=ttnames(ttt)%>"><%=ttnames(ttt)%></a></li>
		<%
		next
%>

</ul>
</div>
</DIV>

<div class="body" style="padding:5px;margin-top:8px;background-color:#E8F5FE;">
  <form action="" method="get" style="padding:0;margin:0;">
    Alexa������ѯ����ַ��http://
    <input name="url" type="text" style="width:300px" value="<%=domain%>">
    <input type="submit" value="�� ѯ"> &nbsp;<a href="http://www.kqiqi.com/" style="color:red;" target="_blank">������Ϣ����</a>
  </form>
</div>

<div class="th">��վ <%=domain%> ��Alexa�����ۺ���Ϣ</div>
<div class="body" style="padding-top:10px;height:190px;">
  <div style="float:left;width:230;text-align:center;">
    <!--site img-->
   <a href="http://www.kqiqi.com" target="_blank"><img src="skin/nopic.gif" border="0"></a>
	<div style="margin-top:8px;">
    <a href="http://thumbnails.alexa.com/update.php?url=<%=domain%>" target="_blank">��������ͼ</a> | <a href="http://www.alexa.com/data/details/contact_info?url=<%=domain%>" target="_blank">�޸���Ϣ</a> | <a href="http://www.alexa.com/data/details/editor?type=rl&url=<%=domain%>" target="_blank">�ύ����</a></div>
    <!--site img-->
  </div>
  <div style="float:right;width:520;text-align:left;">
    <div id="siteinfo">
      <table width="100%" cellpadding="1" cellspacing="1">
        <TR>
          <TD width="85" align="right" noWrap bgColor="#f3f8fc">վ������:</TD>
          <TD width="178" title="<%=SiteTitle%>"><a href="http://<%=domain%>" target=_blank><%=SiteTitle%></a></TD>
          <TD width="79" align="right" nowrap bgColor="#f3f8fc">��վ����:</TD>
          <TD width="163" title="<%=domain%>"><strong><%=domain%></strong></TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc" title="alexa�ۺ�����">�ۺ�����:</TD>
          <TD title="<%=xPopularity%>"><A title="�鿴Alexa�ٷ���Ϣ" href="http://www.alexa.com/data/details/traffic_details?q=&url=<%=domain%>" target="_blank"><%=fget(xPopularity)%></A></TD>
          <TD align="right" nowrap bgColor="#f3f8fc" title="�����µ������仯����">�����仯:</TD>
          <TD id="NextRank" title="�����µ������仯����"><%=dimg&fget(xRank)%></TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc">��������:</TD>
          <TD title="<%=COUNTRY%>"><%=fget(COUNTRY)%></TD>
          <TD align="right" nowrap bgColor="#f3f8fc">���뷽ʽ:</TD>
          <TD title="<%=xCode%>"><%=fget(xCode)%></TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc">��վվ��:</TD>
          <TD title="<%=xOwner%>"><%=fget(xOwner)%></TD>
          <TD align="right" nowrap bgColor="#f3f8fc">��������:</TD>
          <TD title="<%=xEmail%>"><%=fget(xEmail)%></TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc">�����ٶ�:</TD>
          <TD nowrap title="<%=xSpeed%>Ms/<%=xPct%>��"><%=fget(xSpeed)%>Ms/<%=fget(xPct)%>��</TD>
          <TD align="right" nowrap bgColor="#f3f8fc">��������:</TD>
          <TD nowrap title="<%=xLinksin%>"><A href="http://www.alexa.com/data/ds/linksin?q=link:<%=domain%>/&url=<%=domain%>" target="_blank"><%=fget(xLinksin)%></A> ��</TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc">��¼����:</TD>
          <TD nowrap title="<%=xDate%>"><%=fget(xDate)%></TD>
          <TD align="right" nowrap bgColor="#f3f8fc">��ϵ�绰:</TD>
          <TD title="<%=xPhone%>" noWrap><%=fget(xPhone)%></TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc">��ϸ��ַ:</TD>
          <TD title="<%=STREET%> <%=CITY%>" colSpan="3"><%=fget(lens(STREET&CITY,65))%></TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc">��վ���:</TD>
          <TD title="<%=SiteDesc%>" colSpan="3"><%=fget(lens(SiteDesc,69))%></TD>
        </TR>
        <TR>
          <TD align="right" nowrap bgColor="#f3f8fc">����Ŀ¼:</TD>
          <TD title="<%=Cat%>" colSpan="3"><%=fget(Cat)%></TD>
        </TR>
      </table><font color=red>�ٷ���ַ:<a href="http://www.kqiqi.com/" target="_blank">http://www.kqiqi.com/</a></font></a>
    </div>
  </div>
</div>
<div class="th">վ�� <%=SiteTitle%> �� Alexa ������ѯ���</div>
<div class="body1">
  <div class="x bg2">��������������Ϣ��Traffic Rank for <%=domain%></div>
  <div class="mainbar">
    <div class="title" style="width:150px">��������</div>
    <div class="title" style="width:152px">һ��ƽ��</div>
    <div class="title" style="width:152px">����ƽ��</div>
    <div class="title" style="width:152px">���±仯����</div>
    <div class="title2" style="width:152px">�ۺ������仯</div>
  </div>
  <div class="mainbar2">
    <div id="RankToday" class="title" style="width:150px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="RankwkAvg" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="RankmosAvg" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="AllRank" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="RankmosChange" class="title2" style="width:150px"><%=dimg&fget(xRank)%></div>
  </div>


  <div class="x bg2">ÿ�������з�������Reach for <%=domain%></div>
  <div class="mainbar">
    <div class="title" style="width:150px">��������</div>
    <div class="title" style="width:152px">һ��ƽ��</div>
    <div class="title" style="width:152px">����ƽ��</div>
    <div class="title" style="width:152px">���±仯����</div>
    <div class="title2" style="width:152px">�ۺ������仯</div>
  </div>
  <div class="mainbar2">
    <div id="ReachToday" class="title" style="width:150px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ReachwkAvg" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ReachmosAvg" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ReachmosChange" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ReachAllChange" class="title2" style="width:150px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
  </div>

  <div class="x bg2">ÿ���������ҳ����Page Views per user for <%=domain%></div>
  <div class="mainbar">
    <div class="title" style="width:150px">��������</div>
    <div class="title" style="width:152px">һ��ƽ��</div>
    <div class="title" style="width:152px">����ƽ��</div>
    <div class="title" style="width:152px">���±仯����</div>
    <div class="title2" style="width:152px">�ۺ������仯</div>
  </div>
  <div class="mainbar2">
    <div id="ViewsToday" class="title" style="width:150px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ViewswkAvg" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ViewsmosAvg" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ViewsmosChange" class="title" style="width:152px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
    <div id="ViewsAllChange" class="title2" style="width:150px"><img src="skin/loading.gif" width="16" height="16" border="0"></div>
  </div>

</div>

<div class="th"> <%=SiteTitle%> �������Alexa��������Ϣͳ��</div>
<div class="body1">
  <div class="x bg2"> <%=SiteTitle%> ����վ�㱻���ʱ���</div>
  <div class="mainbar">
    <div class="title" style="width:374px">������</div>
    <div class="title2" style="width:374px">���ʱ���</div>
  </div>
  <span id="more"><img src="skin/loading.gif" width="16" height="16" border="0"></span>
</div>

<div class="th">��վ��ƽ����������ͼ [���ʱ��β鿴��Ӧʱ������]</div>
<div class="mainbar">
  <div class="title" style="width:150px"><a style="CURSOR: hand" onClick="document.all.rank1.style.display='';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='none';">����������</a></div>
  <div class="title" style="width:152px"><a style="CURSOR: hand" onClick="document.all.rank1.style.display='none';document.all.rank2.style.display='';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='none';">����������</a></div>
  <div class="title" style="width:152px"><a style="CURSOR: hand" onClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='';document.all.rank4.style.display='none';document.all.rank5.style.display='none';">һ��������</a></div>
  <div class="title" style="width:152px"><a style="CURSOR: hand" onClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='';document.all.rank5.style.display='none';">���������</a></div>
  <div class="title2" style="width:150px"><a style="CURSOR: hand" onClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='';">һ��������</a></div>
</div>
<div class="mainbar2" style="padding:10 0 10 0;height:300px">
  <div id=rank1><img src="http://traffic.alexa.com/graph?w=750&h=280&r=6m&y=t&u=<%=domain%>"></div>
  <div id=rank2 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=3m&y=t&u=<%=domain%>"></div>
  <div id=rank3 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=1m&y=t&u=<%=domain%>"></div>
  <div id=rank4 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=15.0m&y=t&u=<%=domain%>"></div>
  <div id=rank5 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=7.0&y=t&u=<%=domain%>"></div>
</div>
<div class="th">��ƽ��������������ͼ [���ʱ��β鿴��Ӧʱ������]</div>
<div class="mainbar">
  <div class="title" style="width:150px"><a style="cursor: hand" onClick="document.all.reachs1.style.display='';document.all.reachs2.style.display='none';document.all.reachs3.style.display='none';document.all.reachs4.style.display='none';document.all.reachs5.style.display='none';">����������</a></div>
  <div class="title" style="width:152px"><a style="cursor: hand" onClick="document.all.reachs1.style.display='none';document.all.reachs2.style.display='';document.all.reachs3.style.display='none';document.all.reachs4.style.display='none';document.all.reachs5.style.display='none';">����������</a></div>
  <div class="title" style="width:152px"><a style="cursor: hand" onClick="document.all.reachs1.style.display='none';document.all.reachs2.style.display='none';document.all.reachs3.style.display='';document.all.reachs4.style.display='none';document.all.reachs5.style.display='none';">һ��������</a></div>
  <div class="title" style="width:152px"><a style="cursor: hand" onClick="document.all.reachs1.style.display='none';document.all.reachs2.style.display='none';document.all.reachs3.style.display='none';document.all.reachs4.style.display='';document.all.reachs5.style.display='none';">���������</a></div>
  <div class="title2" style="width:150px"><a style="cursor: hand" onClick="document.all.reachs1.style.display='none';document.all.reachs2.style.display='none';document.all.reachs3.style.display='none';document.all.reachs4.style.display='none';document.all.reachs5.style.display='';">һ��������</a></div>
</div>
<div class="mainbar2" style="padding:10 0 10 0;height:300px">
  <div id=reachs1><img src="http://traffic.alexa.com/graph?w=750&h=280&r=6m&y=r&u=<%=domain%>"></div>
  <div id=reachs2 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=3m&y=r&u=<%=domain%>"></div>
  <div id=reachs3 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=1m&y=r&u=<%=domain%>"></div>
  <div id=reachs4 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=15.0m&y=r&u=<%=domain%>"></div>
  <div id=reachs5 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=7.0m&y=r&u=<%=domain%>"></div>
</div>
<div class="th">��ҳ�����������ͼ [���ʱ��β鿴��Ӧʱ������]</div>
<div class="mainbar">
  <div class="title" style="width:150px"><a style="cursor: hand" onClick="document.all.pageviews1.style.display='';document.all.pageviews2.style.display='none';document.all.pageviews3.style.display='none';document.all.pageviews4.style.display='none';document.all.pageviews5.style.display='none';">����������</a></div>
  <div class="title" style="width:152px"><a style="cursor: hand" onClick="document.all.pageviews1.style.display='none';document.all.pageviews2.style.display='';document.all.pageviews3.style.display='none';document.all.pageviews4.style.display='none';document.all.pageviews5.style.display='none';">����������</a></div>
  <div class="title" style="width:152px"><a style="cursor: hand" onClick="document.all.pageviews1.style.display='none';document.all.pageviews2.style.display='none';document.all.pageviews3.style.display='';document.all.pageviews4.style.display='none';document.all.pageviews5.style.display='none';">һ��������</a></div>
  <div class="title" style="width:152px"><a style="cursor: hand" onClick="document.all.pageviews1.style.display='none';document.all.pageviews2.style.display='none';document.all.pageviews3.style.display='none';document.all.pageviews4.style.display='';document.all.pageviews5.style.display='none';">���������</a></div>
  <div class="title2" style="width:150px"><a style="cursor: hand" onClick="document.all.pageviews1.style.display='none';document.all.pageviews2.style.display='none';document.all.pageviews3.style.display='none';document.all.pageviews4.style.display='none';document.all.pageviews5.style.display='';">һ��������</a></div>
</div>
<div class="mainbar2" style="padding:10 0 10 0;height:300px">
  <div id=pageviews1><img src="http://traffic.alexa.com/graph?w=750&h=280&r=6m&y=p&u=<%=domain%>"></div>
  <div id=pageviews2 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=3m&y=p&u=<%=domain%>"></div>
  <div id=pageviews3 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=1m&y=p&u=<%=domain%>"></div>
  <div id=pageviews4 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=15.0m&y=p&u=<%=domain%>"></div>
  <div id=pageviews5 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=7.0m&y=p&u=<%=domain%>"></div>
</div>
<div style="margin-top:12px">
  <!--copyright-->
  <%timer2 = timer
thetime=cstr(int(((timer2-timer1)*10000 )+0.5)/10)
response.write "��ҳִ�й�����"&thetime&"����"
%>
  <br>
  Copyright&copy;2008 <a href="http://tools.kqiqi.com" target="_blank">tools.kqiqi.com</a> All Rights Reserved ��Ȩ���С�������alexa��ѯ <script language="javascript" src="../js/bottom.js"></script>
  <!--copyright-->
</div>
<script language="javascript" type="text/javascript" src="ajaxloading.asp?url=<%=domain%>&dayrank=<%=xRank%>"></script>
</body>
</html>
