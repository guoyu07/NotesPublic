<?php
$url = $_SERVER['PHP_SELF']; 
$filename= substr( $url , strrpos($url , '/')+2,-4); 
if(!isset($_GET['sure'])){
echo '<a href="?sure=ok">确定更新e.v-get.com/host/'.$filename.'.html ？</a>';
exit;
}
require '../_/global.php';$QC=mysql_connect('localhost',constant('db_user'),constant('db_pass'));mysql_select_db(constant('database'),$QC);mysql_query('set names utf8');
$file=constant('uploadFile').'host/'.$filename.'.html';
$fp=fopen($file,'w+');if(is_writable($file)==false) {die("文件没有找到");exit;}
else{$id_out='';
$text=constant('CSSJS').'<link rel="stylesheet" type="text/css" href="'.constant('LTU_8').'ir.css" /><title>虚拟主机_虚拟空间_免费虚拟主机_E维科技_V-Get!</title><meta name="keywords" content="虚拟主机,免费虚拟主机,虚拟空间,虚拟主机空间"/><meta name="description" content="义乌虚拟主机领先供应商——E维科技为义乌中小企业提供快速、稳定、安全的高性价比或免费虚拟主机空间租用服务，并提供强大的虚拟主机控制面板功能。E维科技，一切只为网络营销！"/>';

$text.=TUN('host');
$text.='<div class="m mb">当前位置：<a href="'.constant('LK').'">E维科技</a> &gt;&gt; <a href="'.constant('LK').'host/">主机域名</a> &gt;&gt; 域名注册查询</div><div class="v"><div class="p f l"><div class="lv" id="d"><h4 class="lh">主机域名</h4><ul><li><a href="'.constant('LK').'host/domain.html">域名注册查询</a></li><li><a href="'.constant('LK').'host/free.html">免费虚拟主机<img width="28" height="20" src="'.constant('LTU').'g/hot1.gif"/></a></li><li><a href="'.constant('LK').'host/virtual.html" class="do">FTP服务器空间<img width="28" height="20" src="'.constant('LTU').'g/hot2.gif"/></a></li><li><a href="'.constant('LK').'host/vps.html">VPS主机服务器</a></li><li><a href="'.constant('LK').'host/cloud.html">传统独享云主机<img width="28" height="20" src="'.constant('LTU').'g/hot3.gif"/></a></li><li><a href="'.constant('LK').'host/server.html">服务器托管租用</a></li><li><a href="'.constant('LK').'host/icp_beian.html">工信部域名备案</a></li></ul></div><div class="lc"><h4>购买流程</h4><ul><li><a href="'.constant('LK').'web/service.html">a. 客户选择主机类型</a></li><li class="lc2"></li><li><a href="'.constant('LK').'host/domain.html">b. 联系客服付费</a></li><li class="lc2"></li><li><a href="'.constant('LK').'host/">c. 获取主机账号</a></li><li class="lc2"></li><li><a href="'.constant('LK').'web/service_b2.html">d. 查询使用指南</a></li></ul></div><div class="lv mb"><h4>主机资讯</h4><ul>';
$Qq=mysql_query('SELECT i,h,t FROM f2013 WHERE (h LIKE "%虚拟主机%" OR h LIKE "%FTP%" OR f LIKE "%虚拟主机%" OR f LIKE "%FTP主机%" OR f LIKE "%FTP%") '.$id_out.' ORDER BY t DESC LIMIT 10');
while($Qa=mysql_fetch_array($Qq)){
$I=$Qa['i'];$id_out.=' AND i!='.$I;$T=$Qa['t'];$t=strtotime($T);$t=date('Ymd/His',$t);
$text.='<li><a href="'.constant('LK').'tech/'.$t.$I.'.html">'.SUB($Qa['h'],13).'</a></li>';}

$text.='</ul></div><div><h4>帮助中心</h4><div id="lii"><p><a href="http://e.v-get.com/open/php-frame.html">框架大全</a><a href="http://e.v-get.com/">源码下载</a></p><p class="lic"><a href="http://e.v-get.com/open/php-social.html">论坛源码</a><a href="http://e.v-get.com/tech/u/SEO_1.html">SEO教程</a></p><p><a href="http://e.v-get.com/open/php-shop.html">PHP商城</a><a href="http://e.v-get.com/open/php-soft.html">开发软件</a></p><p class="lic"><a href="http://e.v-get.com/tech/">码农笑话</a><a href="http://e.v-get.com/s?sk=Discuz">Discuz !</a></p></div></div></div><div class="q r"><style type="text/css"></style><div class="rt mb"><img src="'.constant('LTP_8').'728x90/h1.jpg" width="728" height="90" alt="E维科技专业主机服务商"/></div><table><tr><th></th><th>入门型</th><th>普及型</th><th>优惠型</th><th>标准型</th><th>增强型</th><th>经典型</th></tr><tr><td>一年价格</td><td><span class="f0">89</span> 元</td><td><span class="f0">179</span> 元</td><td><span class="f0">269</span> 元</td><td><span class="f0">359</span> 元</td><td><span class="f0">449</span> 元</td><td><span class="f0">539元</span></td></tr><tr><td>演示地址</td><td><a href="#">点击进入</a></td><td><a href="#">点击进入</a></td><td><a href="#">点击进入</a></td><td><a href="#">点击进入</a></td><td><a href="#">点击进入</a></td><td><a href="#">点击进入</a></td></tr><tr><td><span class="f0">需要备案</span></td><td><a href="'.constant('LK').'host/icp_beian.html">备案教程</a></td><td><a href="'.constant('LK').'host/icp_beian.html">备案教程</a></td><td><a href="'.constant('LK').'host/icp_beian.html">备案教程</a></td><td><a href="'.constant('LK').'host/icp_beian.html">备案教程</a></td><td><a href="'.constant('LK').'host/icp_beian.html">备案教程</a></td><td><a href="'.constant('LK').'host/icp_beian.html">备案教程</a></td></tr><tr><td>购买</td><td><a href="#?id=1"><img src="'.constant('LTU').'g/fs2.gif"></a></td><td><a href="#?id=3"><img src="'.constant('LTU').'g/fs2.gif"></a></td><td><a href="#?id=5"><img src="'.constant('LTU').'g/fs2.gif"></a></td><td><a href="#?id=6"><img src="'.constant('LTU').'g/fs2.gif"></a></td><td><a href="#?id=9"><img src="'.constant('LTU').'g/fs2.gif"></a></td><td><a href="#?id=26"><img src="'.constant('LTU').'g/fs2.gif"></a></td></tr><tr><td>操作系统</td><td class="wintb">WIN03</td><td class="wintb">WIN03</td><td class="wintb">WIN03</td><td class="wintb">WIN03</td><td class="wintb">WIN03</td><td class="one_right wintb">WIN03</td></tr><tr><td>Web空间</td><td>100M</td><td>300M</td><td>500M</td><td>700M</td><td>1000M</td><td>1500M</td></tr><tr><td>子站点</td><td>无</td><td>无</td><td>无</td><td>无</td><td>1</td><td>1</td></tr><tr><td>Access数据库</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>SQL数据库</td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td>200M</td><td>300M</td></tr><tr><td>Mysql数据库</td><td><span class="yn yn0"></span></td><td>50M</td><td>100M</td><td>150M</td><td>200M</td><td>300M</td></tr><tr><td>IIS并发连接</td><td>50</td><td>60</td><td>80</td><td>100</td><td>不限</td><td>不限</td></tr><tr><td><span class="f0">绑定域名</span></td><td>2个</td><td>2个</td><td>3个</td><td>3个</td><td>5个</td><td>5个</td></tr><tr><td><span class="f0">网页木马查杀</span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td><span class="f0">目录/恶意文件监控</span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td><span class="f0">畸形目录/文件监控</span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td><span class="f0">SQL注入防护</span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td><span class="f0">可选机房(电信/网通)</span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td><span class="f0">白名单审核</span></td><td><span class="f0">无</span></td><td><span class="f0">无</span></td><td><span class="f0">无</span></td><td><span class="f0">无</span></td><td><span class="f0">无</span></td><td><span class="f0">无</span></td></tr><tr><td>流量</td><td>不限</td><td>不限</td><td>不限</td><td>不限</td><td>不限</td><td>不限</td></tr><tr><td>CPU</td><td>5%</td><td>10%</td><td>10%</td><td>20%</td><td>20%</td><td>30%</td></tr><tr><td>退款需知</td><td><a href="#">点击查看</a></td><td><a href="#">点击查看</a></td><td><a href="#">点击查看</a></td><td><a href="#">点击查看</a></td><td><a href="#">点击查看</a></td><td><a href="#">点击查看</a></td></tr><tr><td>开发票</td><td>加收10％税点</td><td>加收10％税点</td><td>加收10％税点</td><td>加收10％税点</td><td>加收10％税点</td><td>加收10％税点</td></tr><tr><td>虚拟主机租用协议</td><td><a href="#">下载</a></td><td><a href="#">下载</a></td><td><a href="#">下载</a></td><td><a href="#">下载</a></td><td><a href="#">下载</a></td><td><a href="#">下载</a></td></tr><tr><td><span class="f0">下载</span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td></tr><tr class="vh3rc"><th colspan="7">主机功能</th></tr><tr><td><strong class="f0">ISAPI_rewrite伪静态</strong></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>产品自由升级</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>ASP+Access</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>PHP5</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>脚本程序支持VBS/JS</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>FTP管理</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>JMAIL 邮件发送组件</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>支持FSO读写</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>动易组件</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>AspUpload 上传组件</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>AspJpeg 图片组件</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>Zend 加速器</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>ASP.NET</td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td><td><span class="yn yn0"></span></td></tr><tr class="vh3rc"><th colspan="7">php模块支持</th></tr><tr><td width="145">基本</td><td colspan="6">Calendar, DOM, date, filter, hash/ session, standard/tokenizer, Reflection, SPL, suhosin, Json,   pcntl, PCRE</td></tr><tr><td width="145">网络</td><td colspan="6">curl, ftp, sockets</td></tr><tr><td width="145">图形/文字</td><td colspan="6">gd, gettext, ctype, mbstring, iconv</td></tr><tr><td width="145">数据库</td><td colspan="6">PDO, pdo_sqtdte, pdo_sqtdte, SQLite, mysql, mysqtd</td></tr><tr><td width="145">xml解析</td><td colspan="6">xmlreader, xmlwriter, SimpleXML, tdbxml</td></tr><tr><td width="145">优化/加密</td><td colspan="6">Zend Optimizer</td></tr><tr><td width="145">压缩</td><td colspan="6">zip, ztdb</td></tr><tr class="vh3rc"><th colspan="7">ASP组件支持</th><tr><td width="145">基本</td><td colspan="6">FSO, ADODB.Stream, Adodb.Connection</td></tr><tr><td width="145">图形/文字</td><td colspan="6">ASPJpeg.dll</td></tr><tr><td width="145">上传</td><td colspan="6">AspUpload.dll</td></tr><tr><td width="145">邮件</td><td colspan="6">JMail.dll</td></tr><tr><td width="145">伪静态</td><td colspan="6">Hetdcon ISAPI_Rewrite2.dll, Hetdcon ISAPI_Rewrite3.dll</td></tr><tr><td width="145">网站专有</td><td colspan="6">动易</td></tr><tr class="vh3rc" ><th colspan="7">网站管理</th></tr><tr><td>用户自助管理</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>日志自助下载</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>自定义错误页</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>rar在线解压</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>设置默认首页</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>查看空间使用情况</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>主机自动开通</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>密码自助修改</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>设置空间状态</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>FTP在线web上传</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr class="vh3rc"><th colspan="7">安全性</th></tr><tr><td>杀毒软件实时防护</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>12G防火墙系统</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>防ARP防火墙系统</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr class="vh3rc"><th colspan="7">售后服务</th></tr><tr><td>QQ、全国免费电话支持</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>24x7x365在线有问必答</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>24x7x365电话技术支持</td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td><td><span class="yn yn1"></span></td></tr><tr><td>详细介绍/购买</td><td><a href="#?id=1"><img src="'.constant('LTU').'g/fs1.gif" width="61" height="23" alt="购买"></a></td><td><a href="#?id=3"><img src="'.constant('LTU').'g/fs1.gif" width="61" height="23" alt="购买"></a></td><td><a href="#?id=5"><img src="'.constant('LTU').'g/fs1.gif" width="61" height="23" alt="购买"></a></td><td><a href="#?id=6"><img src="'.constant('LTU').'g/fs1.gif" width="61" height="23" alt="购买"></a></td><td><a href="#?id=9"><img src="'.constant('LTU').'g/fs1.gif" width="61" height="23" alt="购买"></a></td><td><a href="#?id=26"><img src="'.constant('LTU').'g/fs1.gif" width="61" height="23" alt="购买"></a></td><tr></table></div>'.constant('BOTTOM').'<div class="pn"><script type="text/javascript">'.JI0().constant('TONGJI').'</script></div></body></html>';
file_put_contents($file,$text);
}