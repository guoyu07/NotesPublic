function trans()
{
var intInputValue,intOutputValue,tempValue;
intInputValue=document.transform.source_num.value;
tempValue=intInputValue/document.transform.target.options[document.transform.target.selectedIndex].value;
intOutputValue=tempValue*document.transform.source.options[document.transform.source.selectedIndex].value;
intOutputValue=Math.round(intOutputValue*100)/100;
document.transform.target_num.value=intOutputValue;
if(document.transform.target_num.value=="NaN"){
	document.transform.source_num.value=0;
}
setTimeout("trans()",100);
}
function date()
{
	var a = new Date();
	var y,m,d;
	y = a.getFullYear();
	m = a.getMonth();
	d = a.getDate();
	document.write(y);
	document.write('-');
	document.write(m+1);
	document.write('-');
	document.write(d);
}

document.write('<form method=post action=javascript:trans() name=transform>��ǰ���ڣ�');
date();
document.write('<br /><br /><select name=source>');
document.write('<option value=100 selected>�����</option><option value=1564.01>Ӣ��</option><option value=1111.73>ŷԪ</option><option value=826.41>��Ԫ</option><option value=730.05>��ʿ����</option><option value=694.26>���ô�Ԫ</option><option value=624.14>�Ĵ�����Ԫ</option><option value=596.83>������Ԫ</option><option value=505.68>�¼���Ԫ</option><option value=149.64>�������</option><option value=136.2>Ų������</option><option value=121.58>������</option><option value=106.35>�۱�</option><option value=103.22>����Ԫ</option><option value=21.14>̩����</option><option value=14.75>���ɱ�����</option><option value=8.0999>��Ԫ</option>');
document.write('</select><input type=text name=source_num size=16 value=100 /><br /><br />�һ�Ϊ��<br /><br /><select name=target>');
document.write('<option value=100 selected>�����</option><option value=1564.01>Ӣ��</option><option value=1111.73>ŷԪ</option><option value=826.41>��Ԫ</option><option value=730.05>��ʿ����</option><option value=694.26>���ô�Ԫ</option><option value=624.14>�Ĵ�����Ԫ</option><option value=596.83>������Ԫ</option><option value=505.68>�¼���Ԫ</option><option value=149.64>�������</option><option value=136.2>Ų������</option><option value=121.58>������</option><option value=106.35>�۱�</option><option value=103.22>����Ԫ</option><option value=21.14>̩����</option><option value=14.75>���ɱ�����</option><option value=8.0999>��Ԫ</option>');
document.write('</select><input type=text name=target_num size=16 readonly value=0>');
document.write('</form>');
document.write('<span class=cs ><font color=red>��վ�ṩ�Ļ��ʶһ������ο���ʵ�ʻ����밴���չ���Ϊ׼</font></span><br>');
trans();
