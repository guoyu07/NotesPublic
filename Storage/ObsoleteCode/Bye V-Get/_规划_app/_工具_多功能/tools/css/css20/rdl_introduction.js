var sProductName='Rainer\'s Handbook';
var sTrademark='Rainer\'s Handbook';
var sHomeURL='mailto:rainersu@hotmail.com?subject=Hello , Rainer ...';
var sCopyrightCh='������Ʒ����Ȩ����';
var sCopyrightEn='&copy;2002 Rainer Su . All rights reserved .';
var sClearEvents='event.returnValue=false;return false;';
var oMenuBar;
var arrActiveMenus=new Array();
var sBlurColor='#FFFFFF';
var sHoverColor='#FFCC00';
var sSubImage='url(images/rdl_submenu.gif)';
var sMenuBorder='1px solid #FFFFFF';
var iOffsetLeft=0;
var iBaseZIndex=4;
var sDefaultItemCode='return false;';

var arrMenuBarItems=new Array(
new Array('','','return false;'),
new Array('��ʽ�������ֲ� ','index.htm',sDefaultItemCode),
new Array('��','','return false;'),
new Array('��¼','index.htm',sDefaultItemCode),
new Array('��','','return false;'),
new Array('�ҵ�����','index.htm',sDefaultItemCode),
new Array('��','','return false;'),
new Array('����','index.htm',sDefaultItemCode),
new Array(' ','','return false;')
);

var arrMenus5=new Array(
new Array('rainersu@hotmail.com','mailto:rainersu@hotmail.com','','border')
);

var arrMenus7=new Array(
new Array('���ڴ��ֲ�','rdl_readme.html','','border'),
new Array('��ʽ����','rdl_css.html','',''),
new Array('�����û�Э��','rdl_rain1977.html','','')
);

var arrMenus3=new Array(
new Array('��ɫ��(Color Tables)','z_color.html','','border'),
new Array('�豸����(Media Types)','z_media.html','',''),
new Array('�����ı����ַ�ʵ��','z_symbol.html','',''),
new Array('���Դ���(Language Codes)','z_languagecodes.html','',''),
new Array('�ַ���ʶ��','z_charset.html','',''),
new Array('��������ʵ��','z_additional.html','',''),
new Array('ISO Latin-1�ַ���','z_iso.html','','')
);

var arrMenus1=new Array(
new Array('���  Introduction','submenu','window.location="l_introduction.html";return false;','border'),
new Array('����  Properties','submenu','window.location="l_properties.html";return false;',''),
new Array('ѡ���  Selectors','l_selectors.html','',''),
new Array('α��  Pseudo-Classes','l_pseudoclasses.html','',''),
new Array('α����  Pseudo-Elements','l_pseudoelements.html','',''),
new Array('�˾�  Filters','submenu','window.location="l_filters.html";return false;',''),
new Array('��λ Units','submenu','window.location="l_units.html";return false;',''),
new Array('����  At-Rules','l_atrules.html','',''),
new Array('����  Declaration','l_declarations.html','','')
);

var arrMenus16=new Array(
new Array('����  Length','d_length.html','','border'),
new Array('��ɫ  Color','d_color.html','',''),
new Array('�Ƕ�  Angle','d_angle.html','',''),
new Array('ʱ��  Time','d_time.html','',''),
new Array('Ƶ��  Frequency','d_frequency.html','','')
);

var arrMenus15=new Array(
new Array('�����˾�  Procedural Surfaces','d_surfaces.html','','border'),
new Array('��̬�˾�  Static Filters','d_static.html','',''),
new Array('ת���˾�  Transitions','d_transitions.html','','')
);

var arrMenus10=new Array(
new Array('��ʽ����','rdl_css.html',sDefaultItemCode,'border')
);

var arrMenus11=new Array(
new Array('����  Font','d_font.html','','border'),
new Array('�ı�  Text','d_text.html','',''),
new Array('����  Background','d_background.html','',''),
new Array('��λ  Positioning','d_positioning.html','',''),
new Array('�ߴ�  Dimensions','d_dimensions.html','',''),
new Array('����  Layout','d_layout.html','',''),
new Array('�ⲹ��  Margins','d_margins.html','',''),
new Array('����  Outlines','d_outlines.html','',''),
new Array('�߿�  border','d_border.html','',''),
new Array('����  Generated Content','d_content.html','',''),
new Array('�ڲ���  Paddings','d_paddings.html','',''),
new Array('�б�  Lists','d_lists.html','',''),
new Array('���  table','d_table.html','',''),
new Array('������  Scrollbar','d_scrollbar.html','',''),
new Array('��ӡ  Printing','d_printing.html','',''),
new Array('����  Aural','d_aural.html','',''),
new Array('����  Classification','d_classification.html','','')
);


function showMenu(e){
event.cancelBubble=true;
var oItem=event.srcElement;
if (oItem.id.indexOf('idItem')==-1) return;
if (oItem.href.length>4) oItem.style.color=sHoverColor;

var sTempID=oItem.id.replace('Item','Menu');
var oMenu=document.getElementById(sTempID);
if (oMenu==null) return;

var oTempElement=oItem;
if (oItem.parentElement==oMenuBar) {var iTop=oTempElement.offsetHeight;var iLeft=0+iOffsetLeft;}
else {var iLeft=oTempElement.offsetWidth+iOffsetLeft;var iTop=0;}

while (oTempElement!=null){
iTop+=oTempElement.offsetTop;
iLeft+=oTempElement.offsetLeft;
oTempElement=oTempElement.parentElement;
}

with(oMenu.style) {
posTop=iTop;
posLeft=iLeft;
display='block';
}

var iMenuBarPlace=oMenuBar.offsetLeft+oMenuBar.offsetWidth;
var iMenuPlace=iLeft+oMenu.offsetWidth;
//document.title=iMenuBarPlace+','+iMenuPlace;

if (iMenuPlace>=iMenuBarPlace){
var arrTemp=oMenu.id.split('_');
if (arrTemp.length>2) {
var sMenuID=oMenu.id.slice(0,oMenu.id.length-2);
var oParentMenu=document.getElementById(sMenuID);
if (oParentMenu!=null) {iLeft=oParentMenu.offsetLeft-oMenu.offsetWidth-iOffsetLeft;}
}
else  {
iLeft=iMenuBarPlace-oMenu.offsetWidth+iOffsetLeft;
}
oMenu.style.posLeft=iLeft;
}

}



function hideMenu(e){

event.cancelBubble=true;

var oToElement=event.toElement;
if (oToElement==null || oToElement.id.indexOf('idItem')==-1) {clearMenus();return;}

var oSrcElement=event.srcElement;
oSrcElement.style.color=sBlurColor;
var sMenuID=oSrcElement.id.replace('Item','Menu');
var oMenu=document.getElementById(sMenuID);
if (oMenu!=null && !oMenu.contains(oToElement)) oMenu.style.display='none';
if (oMenu!=null && oMenu.contains(oToElement)) oSrcElement.style.color=sHoverColor;

if (oSrcElement.id.length>oToElement.id.length) {var sLID=oSrcElement.id;sSID=oToElement.id;}
else {var sLID=oToElement.id;sSID=oSrcElement.id;}
//document.title=sLID+'-'+sSID

if (sLID.length-sSID.length>3) {clearMenus();return;}  /* �������Ӳ˵����Ӳ˵�ֱ���Ƶ�menubar�ϵ���Ŀʱ��BUG */

var sItemID=sLID.slice(0,sLID.length-2);
var oItem=document.getElementById(sItemID);

if (sSID.indexOf(sItemID)!=-1) {
if (oItem!=null) oItem.style.color=sHoverColor;
return;
}

var sMenuID=sItemID.replace('Item','Menu');
//document.title=sLID+'-'+sSID+'-'+sMenuID
var oMenu=document.getElementById(sMenuID);

if (oMenu!=null) oMenu.style.display='none';
if (oItem!=null) oItem.style.color=sBlurColor;

}



function clearMenus(){

var collAnchors=document.anchors;

for (n=0;n<collAnchors.length;n++) {
if (collAnchors[n].className=='cssMenuA') collAnchors[n].style.color=sBlurColor;
}

for (m=0;m<arrActiveMenus.length;m++){
document.all(arrActiveMenus[m]).style.display='none';
}

}



function createMenu(sValue,arrItems,iWidth){

var oTempMenu=document.createElement('<div id=idMenu_'+sValue+'>');
document.body.appendChild(oTempMenu);
arrActiveMenus[arrActiveMenus.length]=oTempMenu.id;    /* ��JScript5.5+�п���ʹ��arrActiveMenus.push(oTempMenu.id); */

with (oTempMenu) {
className='cssMenu';
style.posWidth=iWidth;
style.zIndex=iBaseZIndex+id.length;
onselectstart=ondragstart=new Function(sClearEvents);
}

for (i=0;i<arrItems.length;i++){
var oTempA=document.createElement('<a id=idItem_'+sValue+'_'+i.toString()+'>');
oTempMenu.appendChild(oTempA);
with (oTempA) {
className='cssMenuA';
style.posWidth=iWidth;
innerText=arrItems[i][0];
href=arrItems[i][1];
if (href=='submenu') style.backgroundImage=sSubImage;
if (arrItems[i][3]=='border') style.borderTop=sMenuBorder;
onmouseover=showMenu;
onmouseout=hideMenu;
if (arrItems[i][2]!='') onclick=new Function(arrItems[i][2]);
}
}

}



function createMenuBar(){

oMenuBar=document.createElement('<div id=idMenuBar nowrap>');
document.body.appendChild(oMenuBar);

for (i=0;i<arrMenuBarItems.length;i++){
var oTempA=document.createElement('<a id=idItem_'+i.toString()+'>');
oMenuBar.appendChild(oTempA);
with (oTempA) {
className='cssMenuA';
innerText=arrMenuBarItems[i][0];
if (arrMenuBarItems[i][1]!='') href=arrMenuBarItems[i][1];
onmouseover=showMenu;
onmouseout=hideMenu;
if (arrMenuBarItems[i][2]!='') onclick=new Function(arrMenuBarItems[i][2]);
}
}

}


function window.onload(){

with (document) {defaultCharset=charset='gb2312';title=sProductName;}

var oContent=document.all('idContent');

var oFootnote=document.createElement('<div id="idFootnote">');
oContent.appendChild(oFootnote);
var oCopyright=document.createElement('<div id="idCopyright">');
oContent.appendChild(oCopyright);
oCopyright.innerHTML=sCopyrightEn;
oCopyright.insertAdjacentText('beforeBegin',sCopyrightCh);

createMenu('1',arrMenus1,200);
createMenu('3',arrMenus3,200);
createMenu('5',arrMenus5,200);
createMenu('7',arrMenus7,180);
createMenu('1_0',arrMenus10,200);
createMenu('1_1',arrMenus11,190);
createMenu('1_5',arrMenus15,210);
createMenu('1_6',arrMenus16,170);
createMenuBar();

}



/**************************************
 ����(Rainer Su)��Ȩ���У���������Ȩ����
**************************************/