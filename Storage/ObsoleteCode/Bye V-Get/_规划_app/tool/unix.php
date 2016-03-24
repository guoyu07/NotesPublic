<?php
$hu = 'unix';
@require_once('header.php');
?>
<div class="main">
<script type="text/javascript" src="js/unixtime.js"></script>
<script type="text/javascript"> 
var chinazTopBarMenu = {
    create: function (target, menucontents) {
        if (!document.getElementById(menucontents)) {
            return;
        }
        var contents_wrap = document.getElementById(menucontents);
        var contents = contents_wrap.innerHTML;
        target.className += " hover";
        var dropdownmenu_wrap = document.createElement("div");
        dropdownmenu_wrap.className = "dropdownmenu-wrap";
        var dropdownmenu = document.createElement("div");
        dropdownmenu.className = "dropdownmenu";
        dropdownmenu.style.width = "auto";
        var dropdownmenu_inner = document.createElement("div");
        dropdownmenu_inner.className = "dropdownmenu-inner";
        dropdownmenu_wrap.appendChild(dropdownmenu);
        dropdownmenu.appendChild(dropdownmenu_inner);
        dropdownmenu_inner.innerHTML = contents;
        if (target.getElementsByTagName("div").length == 0) {
            target.appendChild(dropdownmenu_wrap);
        }
    },
    clear: function (target) {
        target.className = target.className.replace(" hover", "");
    }
}
</script>
   <div class="box">
      <div id="b_1">
        <h1><div class="titleft">Unixʱ���(Unix timestamp)ת������</div></h1>
           <div class="box1">
             <div >              
              <div style="color:green;font-size:14px;"><br/>
	���ڵ�Unixʱ���(Unix timestamp)��&nbsp;&nbsp;&nbsp;<span class="utspan" id="currentunixtime"></span> &nbsp; 
    <a href="unix.php"onclick="startTimer();"><img src="images/kaishi.gif" width="16" height="16" alt="��ʼ"/></a>&nbsp;
	<a href="unix.php" onclick="stopTimer();"><img src="images/tingzhi.gif" width="16" height="16" alt="ֹͣ"/></a>&nbsp;
	<a href="unix.php" onclick="currentTime();"><img src="images/shuaxin.gif" width="16" height="16" alt="ˢ��"/></a>&nbsp;
	</div><script type="text/javascript">currentTime();</script>
	<div > <br/>
        <div style="color:green;font-size:18px;font-weight:900;">Unixʱ���(Unix timestamp) �� ����ʱ��</div>
			<form name="unix2beijing" action="">
			    <font color="black">Unixʱ���(Unix timestamp)</font> 
			    <input type="text" name="timestamp" id="firstTimestamp" class="input" size="10" />
                <input type="button" value="ת��" onclick="unix2human();"class="but2" />
                <font color="black">����ʱ��</font> 
                <input type="text" name="result" size="25" class="input" readonly="readonly" />
		     </form>
		     <br/>
	   <div style="color:green;font-size:18px;font-weight:900;">����ʱ�� �� Unixʱ���(Unix timestamp)</div>
			<form name="beijing2unix" action="">
	            <font color="black">����ʱ��</font> 
	            <input type="text" class="input" size="2" name="year" maxlength="4"/> ��
				<input type="text" class="input" size="1"  name="month" maxlength="2"/> ��
				<input type="text" class="input" size="1"  name="day" maxlength="2"/> ��
				<input type="text" class="input" size="1"  name="hour" maxlength="2"/> ʱ
				<input type="text" class="input" size="1"  name="minute" maxlength="2"/> ��
				<input type="text" class="input" size="1"  name="second" maxlength="2"/> ��<input type="button" value="ת��" class="but2" onclick="human2unix();"/>
	            <font color="black">Unixʱ���</font> 
	            <input type="text" name="result" class="input" size="30" readonly="readonly"/>
			</form>
			<br/>
		<div style="color:green;font-size:14px;font-weight:900;">����ڲ�ͬ��������л�ȡ���ڵ�Unixʱ���(Unix timestamp)��</div>
		<table>
			<tr style="height:30px;">
				<td class="uttd">Java</td>
				<td style="width:500px;">time</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">JavaScript</td>
				<td style="width:500px;">
					Math.round(new Date().getTime()/1000)<br/>
					<span>getTime()������ֵ�ĵ�λ�Ǻ���</span>
				</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Microsoft .NET / C#</td>
				<td style="width:500px;">epoch = (DateTime.Now.ToUniversalTime().Ticks - 621355968000000000) / 10000000</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">MySQL</td>
				<td style="width:500px;">SELECT unix_timestamp(now())</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Perl</td>
				<td style="width:500px;">time</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">PHP</td>
				<td style="width:500px;">time()</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">PostgreSQL</td>
				<td style="width:500px;">SELECT extract(epoch FROM now())</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Python</td>
				<td style="width:500px;"><span>��</span> import time <span>Ȼ��</span> time.time()</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Ruby</td>
				<td style="width:500px;">
					<span>��ȡUnixʱ�����</span>Time.now <span>��</span> Time.new<br/>
					<span>��ʾUnixʱ�����</span>Time.now.to_i
				</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">SQL Server</td>
				<td style="width:500px;">SELECT DATEDIFF(s, '1970-01-01 00:00:00', GETUTCDATE())</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Unix / Linux</td>
				<td style="width:500px;">date +%s</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">VBScript / ASP</td>
				<td style="width:500px;">DateDiff("s", "01/01/1970 00:00:00", Now())</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">
					��������ϵͳ<br/>
					<span style="font-weight:normal;font-size:12px;">(���Perl����װ��ϵͳ��)</span>
				</td>
				<td style="width:500px;">
					<span>������״̬��</span>perl -e "print time"
				</td>
			</tr>
		</table>
		<br/>
		<div style="color:green;font-size:14px;font-weight:900;">����ڲ�ͬ���������ʵ��Unixʱ���(<i>Unix timestamp</i>) �� ��ͨʱ�䣿</div>
		<table class="getcurrentunixtimetable">
					<tr style="height:30px;">
						<td class="uttd">Java</td>
						<td style="width:500px;">String date = new java.text.SimpleDateFormat("dd/MM/yyyy HH:mm:ss").format(new java.util.Date(<u>Unix timestamp</u> * 1000))</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">JavaScript</td>
						<td style="width:500px;"><span>��</span> var unixTimestamp = new Date(<u>Unix timestamp</u> * 1000) <span>Ȼ��</span>	commonTime = unixTimestamp.toLocaleString()</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">Linux</td>
						<td style="width:500px;">date -d @<u>Unix timestamp</u></td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">MySQL</td>
						<td style="width:500px;">from_unixtime(<u>Unix timestamp</u>)</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">Perl</td>
						<td style="width:500px;"><span>��</span> my $time = <u>Unix timestamp</u> <span>Ȼ��</span>	my ($sec, $min, $hour, $day, $month, $year) = (localtime($time))[0,1,2,3,4,5,6]</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">PHP</td>
						<td style="width:500px;">date('r', <u>Unix timestamp</u>)</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">PostgreSQL</td>
						<td style="width:500px;">SELECT TIMESTAMP WITH TIME ZONE 'epoch' + <u>Unix timestamp</u>) * INTERVAL '1 second';</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">Python</td>
						<td style="width:500px;"><span>��</span> import time <span>Ȼ��</span> time.gmtime(<u>Unix timestamp</u>)</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">Ruby</td>
						<td style="width:500px;">Time.at(<u>Unix timestamp</u>)</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">SQL Server</td>
						<td style="width:500px;">DATEADD(s, <u>Unix timestamp</u>, '1970-01-01 00:00:00')</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">VBScript / ASP</td>
						<td style="width:500px;">DateAdd("s", <u>Unix timestamp</u>, "01/01/1970 00:00:00")</td>
					</tr>
					<tr style="height:30px;">
						<td class="uttd">
							��������ϵͳ<br/>
							<span style="font-weight:normal;font-size:12px;">(���Perl����װ��ϵͳ��)</span>
						</td>
						<td style="width:500px;">
							<span>������״̬��</span>perl -e "print scalar(localtime(<u>Unix timestamp</u>))"
						</td>
					</tr>
				</table>
				<br/>
		<div style="color:green;font-size:14px;font-weight:900;">����ڲ�ͬ���������ʵ����ͨʱ�� �� Unixʱ���(<i>Unix timestamp</i>)��</div>
		<table>
			<tr style="height:30px;">
				<td class="uttd">Java</td>
				<td style="width:500px;">long epoch = new java.text.SimpleDateFormat("<u>dd/MM/yyyy HH:mm:ss</u>").parse("01/01/1970 01:00:00");</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">JavaScript</td>
				<td style="width:500px;">var commonTime = new Date(Date.UTC(<u>year</u>, <u>month</u> - 1, <u>day</u>, <u>hour</u>, <u>minute</u>, <u>second</u>))</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">MySQL</td>
				<td style="width:500px;">
					SELECT unix_timestamp(<u>time</u>)<br/>
					<span>ʱ���ʽ: YYYY-MM-DD HH:MM:SS �� YYMMDD �� YYYYMMDD</span>
				</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Perl</td>
				<td style="width:500px;"><span>��</span> use Time::Local <span>Ȼ��</span>	my $time = timelocal($sec, $min, $hour, $day, $month, $year);</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">PHP</td>
				<td style="width:500px;">mktime(<u>hour</u>, <u>minute</u>, <u>second</u>, <u>day</u>, <u>month</u>, <u>year</u>)</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">PostgreSQL</td>
				<td style="width:500px;">SELECT extract(epoch FROM date('<u>YYYY-MM-DD HH:MM:SS</u>'));</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Python</td>
				<td style="width:500px;"><span>��</span> import time <span>Ȼ��</span> int(time.mktime(time.strptime('<u>YYYY-MM-DD HH:MM:SS</u>', '%Y-%m-%d %H:%M:%S')))</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">Ruby</td>
				<td style="width:500px;">Time.local(<u>year</u>, <u>month</u>, <u>day</u>, <u>hour</u>, <u>minute</u>, <u>second</u>)</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">SQL Server</td>
				<td style="width:500px;">SELECT DATEDIFF(s, '1970-01-01 00:00:00', <u>time</u>)</td>
			</tr>
			<tr>
				<td class="uttd">Unix / Linux</td>
				<td style="width:500px;">date +%s -d"Jan 1, 1970 00:00:01"</td>
			</tr>
			<tr style="height:30px;">
				<td class="uttd">VBScript / ASP</td>
				<td style="width:500px;">DateDiff("s", "01/01/1970 00:00:00", <u>time</u>)</td>
			</tr>
		</table>
      </div>                     
<script type="text/javascript">    var timeNow = new Date(); document.getElementById("firstTimestamp").value = Math.round(timeNow.getTime() / 1000);</script>
        </div>
      </div>
   </div>
 </div>
<div class="box">
<div id="b_14">
<h1>���߼��</h1>
<div class="box1">
<span class="info2"> 
<p>ʲô��Unixʱ���(Unix timestamp)�� Unixʱ���(Unix timestamp)�����Unixʱ��(Unix time)��POSIXʱ��(POSIX time)����һ��ʱ���ʾ��ʽ������Ϊ�Ӹ�������ʱ��1970��01��01��00ʱ00��00���������ڵ���������Unixʱ���������ʹ����Unixϵͳ����Unixϵͳ�У�Ҳ�������������ϵͳ�б�������
</p>
</span>
</div>
</div>
<?php @require_once('foot.php');?>