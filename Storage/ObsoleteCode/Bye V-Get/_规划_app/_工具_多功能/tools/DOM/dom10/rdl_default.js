
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
new Array('�ĵ�����ģ�������ֲ� ','index.htm',sDefaultItemCode),
new Array('��','','return false;'),
new Array('��¼','index.htm',sDefaultItemCode),
new Array('��','','return false;'),
new Array('�ҵ�����','index.htm',sDefaultItemCode),
new Array('��','','return false;'),
new Array('����','index.htm',sDefaultItemCode),
new Array(' ','','return false;')
);

var arrMenus5=new Array(
new Array('dhtmlet@hotmail.com','mailto:dhtmlet@hotmail.com','','border')
);

var arrMenus7=new Array(
new Array('���ڴ��ֲ�','rdl_readme.html','','border'),
new Array('�����û�Э��','rdl_rain1977.html','','')
);

var arrMenus3=new Array(
new Array('��ɫ��  Color Table','rdl_color.html','','border')
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

createMenu('3',arrMenus3,180);
createMenu('5',arrMenus5,180);
createMenu('7',arrMenus7,160);
createMenuBar();

}


/* Part of RDL(TM) - Written by Rain1977 */
/* HomeSite: http://www.dhtmlet.com  E-Mail: rainer@mail.hf.ah.cn */