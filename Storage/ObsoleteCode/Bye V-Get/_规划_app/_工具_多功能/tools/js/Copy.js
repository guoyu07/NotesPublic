
// �Զ� COPY ���뿪ʼ
function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}
function JM_cc(ob){
	var obj=MM_findObj(ob); if (obj) { 
	obj.select();js=obj.createTextRange();js.execCommand("Copy");}
	alert("�Ѿ����Ƴɹ������ϴ���QQ��MSN���Ѱɣ�");
}

// �Զ� COPY �������
document.write('<p align="center"><a onClick=JM_cc("page_url") href="http://tools.kqiqi.com">�ǵý��˹����Ƽ����������Ҫ���ˣ�</a>  <a href="http://fusion.google.com/add?feedurl='+window.location.href+'"><img src="http://buttons.googlesyndication.com/fusion/add.gif" width="104" height="17" border="0" alt="Add to Google"></a></p><p align="center"><input name="page_url"  onmouseover="this.focus()" onfocus="this.select()" value="'+window.location.href+'" size="36"> <input type="hidden" name="page_url2" value="'+window.location.href+' ����'+window.document.title+'"> <input  type="button" name="Button"  class="button2" value="���Ƶ�ַ" onClick=JM_cc("page_url")> <input  type="button" name="Button"  class="button2" value="���Ƶ�ַ������"  onClick=JM_cc("page_url2")></p>');