// �汾 9104

writeCSS(scriptPath());

function scriptPath()
{
	var col = document.scripts;
	return col[col.length - 1].src;
}

function writeCSS(spath)
{
	var css = "";
	var hxlinkPath = "";
	var hxlink = "";
	var hxlinkdefault = "";
	// ��ȡ����������� CSS ���ơ�
	if (navigator.appName == "Microsoft Internet Explorer") {
		var sVer = navigator.appVersion;
		sVer = sVer.substring(0, sVer.indexOf("."));
		if (sVer >= 4) {
			document.writeln('<SCRIPT FOR="reftip" EVENT="onclick">window.event.cancelBubble = true;</SCRIPT>');
			document.writeln('<SCRIPT FOR="cmd_lang" EVENT="onclick">langClick(this);</SCRIPT>');
			document.writeln('<SCRIPT FOR="cmd_filter" EVENT=onclick>filterClick(this);</SCRIPT>');

			css = "vs70_5.css";
			hxlinkPath = "ms-help://Hx/HxRuntime/"
			hxlink = "HxLink.css";
			hxlinkdefault = "HxLinkDefault.css";
		}
		else
			css = "vs70_5.css";
			hxlinkPath = "ms-help://Hx/HxRuntime/"
			hxlink = "HxLink.css";
			hxlinkdefault = "HxLinkDefault.css";
	}

	// ���� CSS ����
	spath = spath.toLowerCase();
	spath = spath.replace(/vs70link.js/, "");
	// ���� Alink CSS
	document.writeln('<LINK REL="stylesheet" HREF="' + hxlinkPath + hxlink + '">');
	// CSS ��ű�λ��ͬһĿ¼�С�
	document.writeln('<LINK REL="stylesheet" HREF="' + spath + css + '">');
//	document.writeln('<LINK REL="stylesheet" HREF="' + spath + hxlinkdefault + '">');
}


