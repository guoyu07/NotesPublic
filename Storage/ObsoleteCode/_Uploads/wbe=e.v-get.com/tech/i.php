<?php
$QC=mysql_connect('localhost','Atc23ODw0d','E2Y0u3lVpg0x');mysql_select_db('ve',$QC);mysql_query('set names utf8');
$SQ=$_GET['sq'];$asq=array('host'=>array('a=1','主机域名','主机域名资讯包括域名注册,域名交易,虚拟主机,Linux系统配置,服务器配置,DNS,免费虚拟主机,VPS主机,FTP服务器,云主机电信服务器租用和托管。'),'web'=>array('a=2','网站建设','网站建设教程适用于为您提供网站美工,Web前端开发,PHP教程,MySQL教程,ASP.Net等网站设计教程,为您提供最佳的免费网站建设方案。及时更新最新网站运营资讯,全方位获取网站技术资源。'),'soho'=>array('a=3','SOHO托管',''),'sem'=>array('a=4','网络营销','优秀的网络营销案例如同企业营销的灯塔，企业网络营销方案可以借鉴前者的技巧。E维站长论坛旨沟通企业与网络营销师，提供在线网络营销课程，促进企业制定网络营销策略迎战商场。'),'vi'=>array('a=5','视觉设计',''),'soft'=>array('a=6','应用软件',''),'programmer'=>array('a=7','程序猿笑话','程序员经常熬夜加班、没有女朋友、矮挫穷的代表，常被戏称程序猿或者苦逼IT男。程序猿笑话都是程序员对拥有很高的智商，却毫无建树或者没有女朋友窘境的自嘲，程序猿是屌丝的代名词。'),'union'=>array('a=8','网赚联盟',''),'notice'=>array('a=9','E维公告',''),'pc'=>array('b=1','电脑硬件',''),'social'=>array('b=2','社交论坛',''),'shop'=>array('b=3','电子商务',''),'game'=>array('b=4','游戏娱乐',''),'mv'=>array('b=5','音乐视频',''),'smart'=>array('b=6','网络技术',''),'home'=>array('b=7','生活信息',''),'vertical'=>array('b=8','垂直网站',''),'se'=>array('b=9','搜索引擎',''),'news'=>array('c=1','业内资讯',''),'pioneer'=>array('c=2','创业访谈',''),'ensure'=>array('c=3','网络维权',''),'trend'=>array('c=4','趋势传言',''),'master'=>array('c=5','站长经验',''),'good'=>array('c=6','优秀推荐',''),'safe'=>array('c=7','安全防护',''),'manage'=>array('c=8','运营管理',''),'program'=>array('c=9','技术资源',''));$ASQ=$asq[$SQ];unset($asq);
if(count($ASQ)<1){header('HTTP/1.1 404 Not Found');header("status: 404 Not Found");include 'a/404.php';exit();}
$ASQ0=$ASQ[0];$ASQ1=$ASQ[1];
$sp=empty($_GET['sp'])?1:$_GET['sp'];$Qp=($sp-1)*20;
$Qq=mysql_query('SELECT i,t,h,g,d FROM f2013 WHERE '.$ASQ0.' ORDER BY i DESC LIMIT '.$Qp.',20',$QC);
$Qy=mysql_query('SELECT COUNT(*) FROM f2013 WHERE '.$ASQ0);
$Qz=mysql_fetch_array($Qy);
$Qt=$Qz[0];$Pz=ceil($Qt/20);
?><!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><link href="http://tu.v-get.com/i.css" rel="stylesheet" type="text/css" /><link href="http://tu.v-get.com/8/i.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://tu.v-get.com/f.css" /><link rel="stylesheet" type="text/css" href="http://tu.v-get.com/8/tech/f.css" /><?php echo '<title>',$ASQ1,'_E维站长之家_V-Get!</title><meta name="keywords" content="',$ASQ1,',SEO,站长之家,网络营销,PHP教程"/><meta name="description" content="',$ASQ[2],'"/>';?></head><body><div class="t"><strong>V-Get! <a href="http://e.v-get.com/z/">网站地图</a><a href="http://e.v-get.com/w3c/">W3C</a><a href="http://e.v-get.com/w3cschool/">W3CSchool</a></strong><span><a href="http://e.v-get.com/js/"><img src="http://tu.v-get.com/g/ft1.gif" alt="微推荐"/></a>|<a href="http://e.v-get.com/i/">站长论坛</a>|<a href="http://e.v-get.com/services/">代理分销</a>|<a href="http://e.v-get.com/open/">网站开源</a>|<a href="http://m.e.v-get.com/">手机版</a></span></div><div class="w"><div class="u"><div class="p i"></div><div class="q g"><div class="s"><form action="http://e.v-get.com/s" target="_blank"><div class="p"><input type="radio" name="ie" checked="checked"/><label>百度</label><input type="radio" name="ie" value="utf-8"/><label>有趣</label></div><div class="q"><input type="text" placeholder="请输入关键词" class="sk" name="sk"/><input class="ss" type="submit" value=""/></div></form></div></div><div class="o"></div></div><div id="n"><div id="na"><a href="http://e.v-get.com/">首页</a><i></i><a href="http://e.v-get.com/tech/" class="no">站长之家</a><i></i><a href="http://e.v-get.com/web/">网站建设</a><i></i><a href="http://e.v-get.com/host/">主机域名</a><i></i><a href="http://e.v-get.com/sem/">网络营销</a><i></i><a href="http://e.v-get.com/soho/">SOHO托管</a><i></i><a href="http://e.v-get.com/vi/">网站美工</a><i></i><a href="http://e.v-get.com/w3c/">编程手册</a><i></i><a href="http://e.v-get.com/tool/">站长工具</a></div></div><div class="o mh"></div><div class="mg"><script type="text/javascript">var cpro_id="u1346844"</script><script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div><div class="v"><div class="l"><div class="vb1c"><?php
echo '<div class="m mb">您的位置：<a href="http://e.v-get.com/">首页</a>&nbsp;&gt;&gt;&nbsp;<a href="http://e.v-get.com/tech/">站长之家</a>&nbsp;&gt;&gt;&nbsp;<a href="http://e.v-get.com/tech/',$SQ,'_1.html">',$ASQ1,'</a><span></span></div>';
while($Qa=mysql_fetch_array($Qq)){
$T=$Qa['t'];$t=strtotime($T);$t=date('Ymd/His',$t);
$G=$Qa['g'];
echo '<h2><a href="http://e.v-get.com/tech/top',$G,'_1.html" class="fg',$G,'" title="推荐"></a><a href="http://e.v-get.com/tech/',$t,$Qa['i'],'.html">',$Qa['h'],'</a><i>',$T,'</i></h2><p>',$Qa['d'],'</p>';
}

 if($Pz>1){ switch ($sp){ case 1:echo '<div class="pg"><a class="po">首页</a><a class="po">前一页&lt;</a>第<i>1</i>页<a href="http://e.v-get.com/tech/',$SQ,'_',($sp+1),'.html" target="_self">&gt;下一页</a><a href="http://e.v-get.com/tech/',$SQ,'_',$Pz,'.html" target="_self">共',$Pz,'页</a></div>';break; case $Pz:echo '<div class="pg"><a href="http://e.v-get.com/tech/',$SQ,'_1.html" target="_self">首页</a><a href="',($sp>2?('http://e.v-get.com/tech/'.$SQ.'_'.($sp-1).'.html'):('http://e.v-get.com/tech/'.$SQ.'_1.html')),'" target="_self">前一页&lt;</a>第<i>',$sp,'</i>页<a class="po">&gt;下一页</a><a class="po">第<i>',$sp,'</i>页</a></div>';break; default:echo '<div class="pg"><a href="http://e.v-get.com/tech/',$SQ,'_1.html" target="_self">首页</a><a href="',($sp>2?('http://e.v-get.com/tech/'.$SQ.'_'.($sp-1).'.html'):('http://e.v-get.com/tech/'.$SQ.'_1.html')),'" target="_self">前一页&lt;</a>第<i>',$sp,'</i>页<a href="http://e.v-get.com/tech/',$SQ,'_',($sp+1),'.html" target="_self">&gt;下一页</a><a href="http://e.v-get.com/tech/',$SQ,'_',$Pz,'.html" target="_self">第<i>',$Pz,'页</i></a></div>';break; } } 


?></div></div><div class="r"><div class="f mg"><h4><a href="http://e.v-get.com/tech/top8_1.html">每日推荐</a></h4><div class="ai a"><a href="http://e.v-get.com/tech/20131108/1700321130.html"><img src="http://tp.v-get.com/j/8/f/techf110x90_1.gif" width="110" height="90" alt="即拍即发的图文IM？iOS版 Context 上线 App Store" /><br>即拍即发图文IM？iOS版 Cont</a><a href="http://e.v-get.com/tech/20131107/1434421129.html"><img src="http://tp.v-get.com/j/8/f/techf110x90_2.gif" width="110" height="90" alt="创业团队是如何建成的"/><br>创业团队是如何建</a></div><div class="o"></div><ul><li><a href="http://e.v-get.com/tech/20131106/1434261128.html">Memcache 缓存提供网站性能原理</a></li><li><a href="http://e.v-get.com/tech/20131106/1155391127.html">Windows 下 PHP Memcache 缓存配置与使用方法</a></li><li><a href="http://e.v-get.com/tech/20131106/0938431126.html">自比乔布斯的CEO邓亚萍：即刻搜索宣布倒闭</a></li><li><a href="http://e.v-get.com/tech/20131106/0049511124.html">360搜索市场份额目标提至25% 大力发展移动互联网搜索</a></li><li><a href="http://e.v-get.com/tech/20131105/1629131119.html">百度搜索官方：网站被黑和站点安全</a></li><li><a href="http://e.v-get.com/tech/20131105/1601131118.html">百度搜索认为什么样的网站更有抓取和收录价值</a></li><li><a href="http://e.v-get.com/tech/20131105/1222031123.html">新浪微博开放粉丝通自助渠道 半年发展上万家中小企业</a></li></ul></div><div class="f mg"><h4><a href="http://e.v-get.com/tech/ensure_1.html">网络维权</a></h4><div class="ai a"><a href="http://e.v-get.com/tech/20131031/2348181078.html"><img src="http://tp.v-get.com/j/8/f/techf110x90_3.gif" width="110" height="90" alt="广告联盟养400个色情站 获千万暴利" /><br>广告联盟养400</a><a href="http://e.v-get.com/tech/20131029/0109261020.html"><img src="http://tp.v-get.com/j/8/f/techf110x90_4.gif" width="110" height="90" alt="搜索引擎应为“付费推广”负责吗？"/><br>搜索引擎应为“付</a></div><div class="o"></div><ul><li><a href="http://e.v-get.com/tech/20131029/0106291019.html">公安部查处5家涉嫌传销网站：涉案金额超5亿元 </a></li><li><a href="http://e.v-get.com/tech/20131027/213401998.html">没有盗版Windows，中国人本来能用上廉价的国产软件</a></li><li><a href="http://e.v-get.com/tech/20131027/193952989.html">草根站长 Godaddy 注册网站域名被盗经历</a></li><li><a href="http://e.v-get.com/tech/20131027/193203988.html">域名与商标： 说说域名仲裁那点事</a></li><li><a href="http://e.v-get.com/tech/20131027/192624987.html">微信“摇”到美女开房 宜宾男子宾馆遭抢劫</a></li><li><a href="http://e.v-get.com/tech/20131027/192448986.html">京东被控借促销卖假眼霜 用户退货却遇检测难</a></li><li><a href="http://e.v-get.com/tech/20131026/165642957.html">淘宝购电视机被骗1.6万元 钱款全进游戏点卡 </a></li></ul></div><div class="rv mg r4"><h4><a href="http://e.v-get.com/tech/game_1.html">大家爱看</a></h4><a href="http://e.v-get.com/tech/20131108/1731351131.html" class="ai"><img src="http://tp.v-get.com/j/8/f/techf90x60_1.gif" width="90" height="60" alt="屌丝男苦学变黑客 侵入腾讯游戏获利300多万"/><p>屌丝男苦学变黑客 侵入腾讯游戏获利</p></a><div class="o mh"></div><a href="http://e.v-get.com/tech/20131031/2251591069.html" class="ai"><img src="http://tp.v-get.com/j/8/f/techf90x60_2.gif" width="90" height="60" alt="Google正式发布新扁平Logo，去除顶部黑色导航栏"/><p>Google正式发布新扁平Logo，去除顶</p></a><div class="o mh"></div><a href="http://e.v-get.com/tech/20131031/2237181067.html" class="ai"><img src="http://tp.v-get.com/j/8/f/techf90x60_3.gif" width="90" height="60" alt="浅谈腾讯VI视觉的关系设计"/><p>浅谈腾讯VI视觉关系设计</p></a><div class="o mh"></div><a href="http://e.v-get.com/tech/20131029/0306071036.html" class="ai"><img src="http://tp.v-get.com/j/8/f/techf90x60_4.gif" width="90" height="60" alt="“黑客”攻击棋牌网站收“保护费” 四小伙被抓"/><p>“黑客”攻击棋牌网站收“保护费” </p></a><div class="o mh"></div><div class="o"></div></div><div class="f rv mg r5"><h4><a href="http://e.v-get.com/tech/safe_1.html">安全运营</a></h4><ul><li><a href="http://e.v-get.com/tech/20131108/1731351131.html">屌丝男苦学变黑客 侵入腾讯游戏获利300多万</a></li><li><a href="http://e.v-get.com/tech/20131101/0150491093.html">域名商所为？部分国际域名被泛解析挂博彩、挂广告</a></li><li><a href="http://e.v-get.com/tech/20131031/2311331072.html">Facebook 宕机事件详细技术内幕</a></li><li><a href="http://e.v-get.com/tech/20131031/2258551070.html">如家酒店客户开房记录被第三方存储漏洞</a></li><li><a href="http://e.v-get.com/tech/20131029/0306071036.html">“黑客”攻击棋牌网站收“保护费” 四小伙被抓</a></li><li><a href="http://e.v-get.com/tech/20131028/0206461005.html">为什么文件上传表单是主要的PHP安全威胁</a></li><li><a href="http://e.v-get.com/tech/20131028/0144241004.html">你的PHP代码够安全吗？</a></li><li><a href="http://e.v-get.com/tech/20131027/2148111000.html">在Chrome浏览器中保存的密码有多不安全？</a></li><li><a href="http://e.v-get.com/tech/20131027/213617999.html">在硬盘留下后门，重装系统都不能清除病毒</a></li></ul></div><div class="f rv mg r6"><h4><a href="http://e.v-get.com/tech/smart_1.html">社交移动</a></h4><h3><a href="http://e.v-get.com/tech/20131108/1700321130.html">即拍即发图文IM？iOS版 Context 上线 </a></h3><a href="http://e.v-get.com/tech/20131108/1700321130.html" class="ai"><img src="http://tp.v-get.com/j/8/f/techf90x60_5.gif" width="90" height="60" alt="即拍即发的图文IM？iOS版 Context 上线 App Store"/><p>最近 IM 在国内是非常火，今天美国又有一款名为“Con…</p></a><div class="o"></div><ul><li><a href="http://e.v-get.com/tech/20131105/1222031123.html">新浪微博开放粉丝通自助渠道 半年发展上万家中小企业</a></li><li><a href="http://e.v-get.com/tech/20131105/0614321117.html">Windows下 Xdebug PHP 性能调试工具配置与使用方法</a></li><li><a href="http://e.v-get.com/tech/20131105/0521511116.html">编写高性能PHP代码总结</a></li><li><a href="http://e.v-get.com/tech/20131105/0217131115.html">Linux下MySQL服务器级优化技巧</a></li><li><a href="http://e.v-get.com/tech/20131104/1939421114.html">阿里来往遭微信“封杀” 过度营销惹的祸</a></li><li><a href="http://e.v-get.com/tech/20131104/1857171112.html">解决IE6从Nginx服务器下载图片不Cache的Bug</a></li></ul></div><div class="f rfa mg"><h4><a href="http://e.v-get.com/tech/good_1.html">热门推荐</a></h4><div class="a"><a href="http://e.v-get.com/tech/20131104/0627221106.html">Nerdydata 网站源代码的搜索引擎</a><a href="http://e.v-get.com/tech/20131028/0218321006.html">国内常用的5款PHP CMS评测</a><a href="http://e.v-get.com/tech/20131026/055016944.html">百度推荐全新推出，让流量涨的更猛些</a><a href="http://e.v-get.com/tech/20131026/045637943.html">百度分享、加网、Bshare 第三方社交分享工具评比</a><a href="http://e.v-get.com/tech/20131024/041718833.html">谷歌站长工具新功能：教你查看网站排名是否被人工干预</a><a href="http://e.v-get.com/tech/20131001/1301421046.html">百度分享：中国最大的分享工具</a><a href="http://e.v-get.com/tech/20130915/032508747.html">WordPress 全球最大的PHP CMS 系统</a><a href="http://e.v-get.com/tech/20130915/021844746.html">Joomla! CMS 世界第二大PHP CMS内容管理系统</a><a href="http://e.v-get.com/tech/20130914/070036745.html">EmpireCMS 帝国备份王同款PHP CMS产品</a><a href="http://e.v-get.com/tech/20130914/062436744.html">DedeCMS (织梦CMS内容管理系统)热门国产PHP CMS系统</a><a href="http://e.v-get.com/tech/20130913/033441742.html">PHPCMS 最火的国产PHP CMS 系统</a><a href="http://e.v-get.com/tech/20130911/050704741.html">热荐：非常有趣的打飞机游戏，可以消灭所有网页内容</a></div><div class="o"></div></div><script type="text/javascript">var cpro_id="u1150316";</script><script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div><div class="o mh"></div></div><div class="b"><p class="bn"><a href="http://e.v-get.com/z/about.html">关于我们</a>|<a href="http://e.v-get.com/i/">站长论坛</a>|<a href="#">合作分销</a>|<a href="#">人才招聘</a>|<a href="http://e.v-get.com/z/link.html">友情链接</a>|<a href|<a href="#">合作加盟</a>|<a href="#">广告服务</a>|<a href="#">合作伙伴</a>|<a href="http://e.v-get.com/i/topic-56-1.html">投诉建议</a>|<a href="http://e.v-get.com/z/">网站地图</a>|<a href="http://m.e.v-get.com/">手机浏览</a></p><p><a href="http://e.v-get.com/">E维科技</a> 版权所有</p><p>Copyright &copy; 2008-2013<a href="http://www.v-get.com/">V-Get.com</a>All Rights Reserved.</p></div></div><script type="text/javascript" src="http://tu.v-get.com/i.js"></script><div class="pn"><script type="text/javascript">J("http://tu.v-get.com/8/i.js");var _bdhmProtocol=(("https:"== document.location.protocol)?" https://":" http://");document.write(unescape("%3Cscript src='"+_bdhmProtocol+"hm.baidu.com/h.js%3F2cdfc5c1af66f6603163203248653a5e' type='text/javascript'%3E%3C/script%3E"));</script></div><script type="text/javascript">var cpro_id="u1344600"</script><script src="http://cpro.baidustatic.com/cpro/ui/f.js" type="text/javascript"></script></body></html>