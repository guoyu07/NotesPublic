//ASCII ת�� Unicode
function AsciiToUnicode() {
	if (parseFloat(ScriptEngineMajorVersion() + '.' + ScriptEngineMinorVersion()) < 5.5){ 
	alert('���Ľű�����汾���ͣ�������Ϊ5.5����'); 
	return; 
	}
	if (content.value == '') { 
	alert('�ı�����û�д��룡'); 
	return; 
	}
	result.value = '';
	for (var i=0; i<content.value.length; i++)
	result.value += '&#' + content.value.charCodeAt(i) + ';';
	document.getElementById('content').focus();
}

//Unicode ת�� ASCII
function UnicodeToAscii() { 
	var code = content.value.match(/&#(\d+);/g);
	if (code == null) { 
	alert('�ı�����û�кϷ���Unicode���룡'); document.getElementById('content').focus();
	return; 
	}
	result.value = '';
	for (var i=0; i<code.length; i++)
	result.value += String.fromCharCode(code[i].replace(/[&#;]/g, ''));
	document.getElementById('content').focus();
}
function preview() {
	var win = window.open();
	win.document.open('text/html', 'replace');
	win.document.writeln(result.value);
	win.document.close();
}

function copy(obj)
{
  var Result=document.getElementById(obj).value;
  if(Result=="")
  {
    return ;
  }
  else 
  {
  window.clipboardData.setData("Text",Result); 
  document.getElementById(obj).select(); 
  window.alert('�Ѹ��Ƴɹ���');
  }
}