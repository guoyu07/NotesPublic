<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>
<?php include MooTemplate("tools_header"); ?>
<div id="tab1">
	<div id="page">   
              <div class="toolbox">
            	<div class="title">
                	<div><?php echo $tpl_name_array['0']; ?></div>
                </div><div class="inner" style="display:block"><div class="jsform">
                <form method="post" action="pr.php" onsubmit="this.action='pr.php?site='+getElementById('site').value;">
                	<input type="text" class="it" size="36" name="site" id="site" value="<?php echo $site;?>" />
                	<input type="submit" class="bt" name="Submit" value="开始查询" hidefocus="true"  />
                </form>
                    <ul>
                        <li>Google PageRank的结果如下:</li>
                    </ul>
                </div><div class="result" style="padding:5px; background:#fff;">
                	<table cellpadding="5" cellspacing="0" id="tab">
                        <tr><td align="left">
						<?php if($site) { ?>
							站点的pr值是: <font color=red><stong>
							<?php if($pr) { ?><?php echo $pr;?><?php } else { ?>该域名不存在, 或者pr值为空<?php } ?>
							</stong></font>
						<?php } else { ?>
							 请输入要查询站点的URL地址
						<?php } ?>
						</td>
						</tr>
                    </table>
                </div></div></div>      
	</div>   
</div>
<div id="tab1">
	<div id="page">   
       <div class="toolbox">
            <div class="title">
				<div><?php echo $tpl_name_array['1']; ?></div>
			</div>
									
             <div class="inner" style="display:block">
		             	<div class="jsform">
		                <form method="post" action="site.php" onsubmit="this.action='site.php?site='+getElementById('site').value;">
		                	<input type="text" class="it" size="36" name="site" id="site" value="<?php echo $site;?>"/>
		                	<input type="submit" class="bt" name="Submit" value="开始查询" />
		                </form>
		                    <ul>
		                        <li>查询结果如下:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left">
						<?php if($site) { ?>
<div id="so" style="display: block;">
	<div><span>搜索引擎</span><span>收录情况</span><span>反向链接</span></div>
	<div id="baidu" style="display: block;">
	<span><img align="absmiddle" src="Moo-templates/images/baidu.gif"/> <a target="_blank" href="http://www.baidu.com"> 百度</a></span>
	<span><?php if($BaiduSite) { ?><a target="_blank" href="http://www.baidu.com/s?wd=site%3A<?php echo $site;?>"><?php echo $BaiduSite;?></a><?php } else { ?><font color=red>暂无收录</font><?php } ?></span>
	<span><?php if($BaiduDomain) { ?><a target="_blank" href="http://www.baidu.com/s?wd=domain%3A<?php echo $site;?>"><?php echo $BaiduDomain;?></a><?php } else { ?><font color=red>暂无反向链接</font><?php } ?></span></div>
	<div id="google" style="display: block;">
	<span><img align="absmiddle" src="Moo-templates/images/google.gif"/> <a target="_blank" href="http://www.google.com"> Google</a></span>
	<span><?php if($GoogleSite) { ?><a target="_blank" href="http://www.google.cn/search?complete=1&amp;hl=zh-CN&amp;client=pub-6137409832737925&amp;q=site%3A<?php echo $site;?>"><?php echo $GoogleSite;?></a><?php } else { ?><font color=red>暂无收录</font><?php } ?></span>
	<span><?php if($GoogleLink) { ?><a target="_blank" href="http://www.google.cn/search?complete=1&amp;hl=zh-CN&amp;client=pub-6137409832737925&amp;q=link%3A<?php echo $site;?>"><?php echo $GoogleLink;?></a><?php } else { ?><font color=red>暂无反向链接</font><?php } ?></span></div>
</div>
						<?php } else { ?>
							 请输入要查询收录情况的的网址, 例如:www.kqiqi.com
							 <br />请记住:www.kqiqi.com和kqiqi.com是不同的
						<?php } ?>
						</td>	
	                        </tr>
	                    </table>
	                 </div>
              </div>
       </div>      
	</div>
</div>
<div id="tab1">
	<div id="page">   
       <div class="toolbox">
            	<div class="title">
								<div><?php echo $tpl_name_array['2']; ?> </div>
							</div>
									
             <div class="inner" style="display:block">
		             	<div class="jsform">
		                <form method="post" action="position.php">
		                	<input type="text" class="it" size="36" name="value" id="value" value="<?php echo $value;?>" />
		                	<input type="submit" class="bt" name="Submit" value="开始查询" />
							<br />
						<span style="margin-left: -270px;">
							<input type="radio" name="radiobutton" value="baidu" <?php if($SearchE !== 'google') { ?>checked="checked" <?php } ?> />百度
							<input type="radio" name="radiobutton" value="google" <?php if($SearchE == 'google') { ?>checked="checked" <?php } ?> />Google
						</span>
		                </form>
		                    <ul>
		                        <li>查询结果如下:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left"><?php if($value) { ?>
							<?php if($BaiduP || $GoogleP) { ?>
							您网站 <font color=green><?php echo $domain;?></font> 的关键词: <font color=red><strong><?php echo str_replace('+', ' ', $keyword);?></strong></font> 在<?php if($SearchE == 'google') { ?> <strong>Google</strong> <?php } else { ?> <strong>百度</strong> <?php } ?>搜索结果中排名第 <strong><?php echo $BaiduP; echo $GoogleP;?></strong>
							<?php } elseif ($BaiduP == '0' || $GoogleP == '0') { ?>
							很遗憾, 您网站 <font color=green><?php echo $domain;?></font> 里的关键字<font color=red><strong><?php echo str_replace('+', ' ', $keyword);?></strong></font> 没有进<?php if($SearchE == 'google') { ?> <strong>Google</strong> <?php } else { ?> <strong>百度</strong> <?php } ?>的前100位, 加紧努力哦
							<?php } elseif (!$keyword) { ?>
								请检查您输入的格式是否正确! 正确的格式实例: <font color=blue>www.kqiqi.com:客齐齐</font>(网站地址:关键字)
							<?php } ?>
						<?php } else { ?>	
							 例如: <font color=blue>www.kqiqi.com:客齐齐 </font>(网站地址:关键字)
							 <br />只检索搜索引擎前100位, 再往后将不检测
							 <br />请注意: kqiqi.com和www.kqiqi.com是不一样的
						<?php } ?></td></tr>
	                    </table>
	                 </div>
              </div>
       </div>      
	</div>
</div>
<script>
showrank=function(item) {
	for(var i=1;i<=5;i++) {
		if( i == item) {
			document.getElementById("rank" + i).style.display="block";
		} else {
			document.getElementById("rank" + i).style.display="none";
		}
	}
}
showreachs=function(item) {
	for(var i=1;i<=5;i++) {
		if( i == item) {
			document.getElementById("reachs" + i).style.display="block";
		} else {
			document.getElementById("reachs" + i).style.display="none";
		}
	}
}
showpageviews=function(item) {
	for(var i=1;i<=5;i++) {
		if( i == item) {
			document.getElementById("pageviews" + i).style.display="block";
		} else {
			document.getElementById("pageviews" + i).style.display="none";
		}
	}
}
</script>
<div id="tab1">
	<div id="page">   
       <div class="toolbox">
            <div class="title">
				<div><?php echo $tpl_name_array['3']; ?> </div>
			</div>
									
             <div class="inner" style="display:block">
		             	<div class="jsform">
		                <form method="post" action="alexa.php"  onsubmit="this.action='alexa.php?url='+getElementById('url').value;">
		                	<input type="text" class="it" size="36" name="url" id="url" value="<?php echo $url;?>"/>
		                	<input type="submit" class="bt" name="Submit" value="开始查询" />
		                </form>
		                    <ul>
		                        <li>Alexa信息查询结果如下:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left">
						<?php if($url) { ?>
							<?php if(!$isExist) { ?>域名不合法或者不存在!请输入正确的域名<?php } else { ?><strong><?php echo $url;?></strong>目前的流量排名(traffic rank)是:<font color=red><strong> <?php echo $TRank;?></strong></font>
<div id="box">
<div id="title">网站日平均排名走势图 [点击时间段查看相应时段曲线]</div>
<div id="boxOutside">
<div class="boxInside"><a href="###" onclick="showrank(1);">六个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showrank(2);">三个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showrank(3);">一个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showrank(4);">半个月数据</a></div>
<div class="boxInside2"><a href="###" onclick="showrank(5);">一星期数据</a></div>
</div>
<div class="clear"></div>
<div id="boxAlexa">
<div id=rank1><img src="http://traffic.alexa.com/graph?w=750&h=280&r=6m&y=t&u=<?php echo $url;?>"></div>
<div id=rank2 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=3m&y=t&u=<?php echo $url;?>"></div>
<div id=rank3 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=1m&y=t&u=<?php echo $url;?>"></div>
<div id=rank4 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=15.0m&y=t&u=<?php echo $url;?>"></div>
<div id=rank5 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=7.0&y=t&u=<?php echo $url;?>"></div>
</div>
</div>
<div id="box">
<div id="title">日平均访问人数走势图 [点击时间段查看相应时段曲线]</div>
<div id="boxOutside">
<div class="boxInside"><a href="###" onclick="showreachs(1);">六个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showreachs(2);">三个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showreachs(3);">一个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showreachs(4);">半个月数据</a></div>
<div class="boxInside2"><a href="###" onclick="showreachs(5);">一星期数据</a></div>
</div>
<div class="clear"></div>
<div id="boxAlexa">
<div id=reachs1><img src="http://traffic.alexa.com/graph?w=750&h=280&r=6m&y=r&u=<?php echo $url;?>"></div>
<div id=reachs2 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=3m&y=r&u=<?php echo $url;?>"></div>
<div id=reachs3 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=1m&y=r&u=<?php echo $url;?>"></div>
<div id=reachs4 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=15.0m&y=r&u=<?php echo $url;?>"></div>
<div id=reachs5 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=7.0&y=r&u=<?php echo $url;?>"></div>
</div>
</div>
<div id="box">
<div id="title">日页面浏览量走势图 [点击时间段查看相应时段曲线]</div>
<div id="boxOutside">
<div class="boxInside"><a href="###" onclick="showpageviews(1);">六个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showpageviews(2);">三个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showpageviews(3);">一个月数据</a></div>
<div class="boxInside"><a href="###" onclick="showpageviews(4);">半个月数据</a></div>
<div class="boxInside2"><a href="###" onclick="showpageviews(5);">一星期数据</a></div>
</div>
<div class="clear"></div>
<div id="boxAlexa">
<div id=pageviews1><img src="http://traffic.alexa.com/graph?w=750&h=280&r=6m&y=p&u=<?php echo $url;?>"></div>
<div id=pageviews2 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=3m&y=p&u=<?php echo $url;?>"></div>
<div id=pageviews3 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=1m&y=p&u=<?php echo $url;?>"></div>
<div id=pageviews4 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=15.0m&y=p&u=<?php echo $url;?>"></div>
<div id=pageviews5 style="display: none"><img src="http://traffic.alexa.com/graph?w=750&h=280&r=7.0&y=p&u=<?php echo $url;?>"></div>
</div>
</div>
							<?php } ?>
						<?php } else { ?>
							 请输入要查询的域名
						<?php } ?>
						</td>					
	                        </tr>
	                    </table>
	                 </div>
              </div>
       </div>      
	</div>
</div>
<div id="tab1">
	<div id="page">   
              <div class="toolbox">
            	<div class="title">
                	<div><?php echo $tpl_name_array['4']; ?></div>
                </div><div class="inner" style="display:block"><div class="jsform">
                <form method="post" action="ip.php" onsubmit="this.action='ip.php?ip='+getElementById('ip').value;">
                	<input type="text" class="it" size="36" name="ip" id="ip" value="<?php echo $ip;?>" />
                	<input type="submit" class="bt" name="Submit" value="开始查询" hidefocus="true"  />
                </form>
                    <ul>
                        <li>您所查询的IP物理地址如下:</li>
                    </ul>
                </div><div class="result" style="padding:5px; background:#fff;">
                	<table cellpadding="5" cellspacing="0" id="tab">
                        <tr><td align="left">查询结果:<?php if($ip) { ?><?php echo convertip_full($ip, MOOPHP_ROOT.'/plugins/ipdata/wry.dat');?><?php } else { ?>请输入要查询的IP地址!<?php } ?></tr>
                    </table>
                </div></div></div>      
	</div>   
</div>
<div id="tab1">
	<div id="page">   
       <div class="toolbox">
            	<div class="title">
								<div><?php echo $tpl_name_array['5']; ?></div>
							</div>
									
             <div class="inner" style="display:block">
		             	<div class="jsform">
		                <form method="post" action="whois.php"  onsubmit="this.action='whois.php?domain='+getElementById('domain').value;">
		                	<input type="text" class="it" size="36" name="domain" id="domain" value="<?php echo $domain;?>"/>
		                	<input type="submit" class="bt" name="Submit" value="开始查询" />
		                </form>
		                    <ul>
		                        <li>whois查询结果如下:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left"><?php if($domain) { ?><?php echo startwhois(); ?><?php } else { ?>请属于要查询的域名<?php } ?></td></tr>
	                    </table>
	                 </div>
              </div>
       </div>      
	</div>
</div>
<div id="tab1">
	<div id="page">   
       <div class="toolbox">
            <div class="title">
				<div><?php echo $tpl_name_array['6']; ?> </div>
			</div>
									
             <div class="inner" style="display:block">
		             	<div class="jsform">
		                <form method="post" action="hex.php" onsubmit="this.action='hex.php?url='+getElementById('url').value;">
		                	<input type="text" class="it" size="36" name="url" id="url" value="<?php echo $url;?>"/>
		                	<input type="submit" class="bt" name="Submit" value="开始转换" />
		                </form>
		                    <ul>
		                        <li>转换结果如下:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left">
						<?php if($url) { ?>
							http://<?php echo $HexUrl;?>
						<?php } else { ?>
							 请输入要查询的URL网址, 例如:
							 <br />http://www.kqiqi.com 转换结果:http://%77%77%77%2e%6b%71%69%71%69%2e%63%6f%6d%20
							 <br />普通网址转换为16进制的网址,两者完全等效的访问 
						<?php } ?>
						</td>	
	                        </tr>
	                    </table>
	                 </div>
              </div>
       </div>      
	</div>
</div>
<?php include MooTemplate("tools_footer"); ?>