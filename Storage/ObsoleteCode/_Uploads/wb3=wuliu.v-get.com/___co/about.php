<?php $Qc=mysql_connect('localhost','GSco9cm30x1','Bt49cE3ox02K');mysql_select_db('vwuliu',$Qc);mysql_query('set names utf8');$lk=$_GET['l'];$LK=explode('.',$lk);$E=$LK[0];$Qq=mysql_query('SELECT b,h,he,k,a,i,r,q,lt,x,y,z,zz,t,adt,tj FROM co WHERE e="'.$E.'" LIMIT 1');$Qr=mysql_num_rows($Qq);if($Qr==0){header('Location: http://wuliu.v-get.com/');exit();}$Qa=mysql_fetch_array($Qq);$B=$Qa['b'];$H=$Qa['h'];$K=$Qa['k'];$Z=$Qa['z'];$LT=$Qa['lt'];$TA=$Qa['adt'];$now=time();$ad=($TA>$now)?false:true;echo '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title>关于',$H,'_',$Z,'_',$K,'_商务物流网_V-Get!</title><meta name="keywords" content="',$K,'" /><meta name="description" content="',$H,'主要经营',$Z,$Qa['a'],'"/>';?><link href="http://tu.v-get.com/i.css" type="text/css" rel="stylesheet" /><link href="http://tu.v-get.com/3/co/i.css" type="text/css" rel="stylesheet"/><script type="text/javascript" src="http://tu.v-get.com/i.js"></script></head><body><div id="t"><div class="po"><a href="http://wuliu.v-get.com/">商务物流网</a>-<?php echo $LT,'<span><a href="http://',$E,'.wuliu.v-get.com/logistics/">网站地图</a>-<a href="#" rel="sidebar">收藏</a></span>';?></div></div><div class="o w"><div class="u"><div class="p il fo"><a href="http://<?php echo $lk,'"><img height="70" width="70" src="http://tp.v-get.com/j/3/co/70/',$E,'.gif" alt="',$H;?>"/></a></div><div class="p ir"><?php echo '<h1>',$H,'</h1><p>',$Qa['he'],'</p>';?></div><div class="o"></div></div><div id="n"><div class="a na"><?php echo '<a href="http://',$E,'.wuliu.v-get.com/">首页</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/about.html" class="no">关于我们</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/services.html">服务项目</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/honor.html">企业荣誉</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/certificate.html">诚信认证</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/exhibition.html">视觉展厅</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/news.html">新闻公告</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/faq.html">常见问题</a><i></i><a href="http://',$E,'.wuliu.v-get.com/logistics/contact.html">联系我们</a><i></i>';?></div></div><div class="o mh"></div><?php echo $ad?'<div class="mg a960x60"><script type="text/javascript">var cpro_id="u1248199"</script><script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div>':'';?><div class="v"><div class="p l"><div class="ff l1"><h2><?php echo '<a href="http://',$E,'.wuliu.v-get.com/">',$H,'</a>';?></h2><ul><?php echo '<li>企业名称：',$H,'</li><li>法人代表：<a href="http://',$E,'.wuliu.v-get.com/logistics/contact.html">',$Qa['x'],'</a>　<span q="',$Qa['q'],'"></span></li><li>物流性质：',$Qa['y'],'</li><li>经营范围：',$Z,'</li><li>注册时间：',$Qa['t'],'</li></ul><div class="l1c"><a href="#">企业工商认证</a></div><h6>行业资质：</h6><p>',$Qa['zz'],'</p>';?><div class="fo"><?php echo '<a href="http://',$E,'.wuliu.v-get.com/" rel="sidebar" class="ig">收藏本站</a>';?></div></div><div id="bdshare"></div><div class="l2"><ul><?php echo '<li class="r2t"><a href="http://',$E,'.wuliu.v-get.com/logistics/certificate.html"><span>企业认证</span> &nbsp; Authenticate</a></li><li><a href="http://',$E,'.wuliu.v-get.com/logistics/services.html"><span>公司业务</span> &nbsp; Our Services</a></li><li><a href="http://',$E,'.wuliu.v-get.com/logistics/faq.html"><span>常见问题</span> &nbsp; F.A.Q</a></li><li><a href="#"><span>最新公告</span> &nbsp; BBS &amp; News</a></li>';?></ul></div><?php if($ad){echo '<div class="ff mg l3"><h4>',$LT,'</h4><ul>';require('../ct/'.$B.'.htm');echo '</ul></div><div class="a200x200"><script type="text/javascript">var cpro_id="u1189528";</script><script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div>';}?><div class="ff l3"><h4>联系我们</h4><ul><?php echo '<li>公　司：',$H,'</li>',$Qa['r'],'<li>联系我：<span q="',$Qa['q'],'"></span></li><li>网　址：<a href="http://',$E,'.wuliu.v-get.com/">',$E,'.wuliu.v-get.com</a></li>';?></ul></div></div><div class="q r"><div class="o mh"></div><div class="m cc"><div>您现在的位置：<?php echo '<a href="http://',$E,'.wuliu.v-get.com/">',$H,'</a>';?> &gt; 关于我们</div></div><div class="mf"><div class="ct1"><?php $Qqc=mysql_query('SELECT * FROM coc WHERE e="'.$E.'" LIMIT 1');while($Qac=mysql_fetch_array($Qqc)){$cH=$Qac['h'];$cB=$Qac['b'];$cA=$Qac['a'];$cA*=25;$cAa=$cA-24;$cC=$Qac['c'];$cC*=15;$cCa=$cC-14;echo '<table><tr><th colspan="4">',$cH,'</th></tr><tr><td class="fq">经营物流性质：</td><td>',$Qa['y'],'</td><td class="fq">主营物流业务：</td><td>',$Z,'</td></tr><tr><td class="fq">注册资金：</td><td>人民币  ',$Qac['m'],' 万元 <span class="f0">[已认证]</span></td><td class="fq">工商登记号：</td><td>',$Qac['j'],' <span class="f0">[已认证]</span></td></tr><tr><td class="fq">法人代表：</td><td>',$Qa['x'],' <span class="f0">[已认证]</span></td><td class="fq">注册日期：</td><td>',$Qa['t'],' <span class="f0">[已认证]</span></td></tr><tr><td class="fq">注册地址：</td><td>',$Qac['l'],' <span class="f0">[已认证]</span></td><td class="fq">物流公司类型：</td><td>',$Qac['w'],' <span class="f0">[已认证]</span></td></tr><tr><td class="fq">执照期限：</td><td>',$Qac['t'],' <span class="f0">[已认证]</span></td><td class="fq">发证机关：</td><td>',$Qac['u'],' <span class="f0">[已认证]</span></td></tr><tr><th colspan="4">',$cB,'物流公司发展动态</th></tr><tr><td class="fq">年营业额：</td><td>',$Qac['v'],'</td><td class="fq">持有物流品牌：</td><td>',$cB,'</td></tr><tr><td class="fq">员工人数：</td><td>',$cAa,' - ',$cA,' 人 <span class="f0">[已认证]</span></td><td class="fq">配送车辆：</td><td>',$cCa,' - ',$cC,' 辆 <span class="f0">[已认证]</span></td></tr><tr><td class="fq">财务结算方式：</td><td>',$Qac['r'],'</td><td class="fq"></td><td></td></tr><tr><th colspan="4">',$cB,'物流公司详细信息</th></tr><tr><td class="fq">服务项目：</td><td>',$Qac['s'],'</td><td class="fq">经营区域：</td><td>',$Qac['p'],'</td></tr><tr><td class="fq">物流相关服务：</td><td>',$Qac['q'],'</td><td class="fq">是否配货上门：</td><td>',$Qac['g'],'</td></tr><tr><td class="fq">优势物流服务：</td><td>',$Qac['o'],'</td><td class="fq">目标客户群体：</td><td>',$Qac['k'],'</td></tr></table>';}echo '</div><div class="cfi p"><img src="http://tp.v-get.com/j/3/co/300x200/',$E,'.jpg" width="300" height="200" alt="',$cH,'" /></div>',$Qa['i'];?></div></div><div class="o mh"></div></div><script type="text/javascript">var cpro_id="u1346844"</script><script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script><div class="b"><p class="bn"><?php echo '<a href="http://',$E,'.wuliu.v-get.com/logistics/about.html">关于我们</a>|<a href="http://',$E,'.wuliu.v-get.com/logistics/contact.html">联系我们</a>|<a href="#">人才招聘</a>|<a href="http://',$E,'.wuliu.v-get.com/logistics/contact.html">合作加盟</a>|<a href="http://wuliu.v-get.com/">广告服务</a>|<a href="#">合作伙伴</a>|<a href="#">微公益</a>|<a href="http://',$E,'.wuliu.v-get.com/logistics/contact.html">投诉建议</a>|<a href="http://',$E,'.wuliu.v-get.com/logistics/">网站地图</a>|<a href="#">法律声明</a>';?></p><p><a href="http://wuliu.v-get.com/">商务物流网</a> 授权企业站</p><p>Copyright &copy; 2012-2013<a href="http://www.v-get.com/">V-Get.com</a>All Right Reserved.</p><div class="ba a"><a href="http://s.v-get.com/l?l=www.saic.gov.cn/"></a><a href="http://s.v-get.com/l?l=www.cnnic.cn"></a><a href="http://s.v-get.com/l?l=www.cyberpolice.cn"></a><a href="http://s.v-get.com/l?l=www.szfw.org"></a></div></div></div><div class="pn"><script type="text/javascript">J("http://tu.v-get.com/3/co/i.js");<?php echo $Qa['tj'];?></script></div><script type="text/javascript">var cpro_id="u1344600"</script><script src="http://cpro.baidustatic.com/cpro/ui/f.js" type="text/javascript"></script></body></html>