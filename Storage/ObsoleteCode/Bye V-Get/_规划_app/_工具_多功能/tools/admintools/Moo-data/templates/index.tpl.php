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
                	<input type="submit" class="bt" name="Submit" value="��ʼ��ѯ" hidefocus="true"  />
                </form>
                    <ul>
                        <li>Google PageRank�Ľ������:</li>
                    </ul>
                </div><div class="result" style="padding:5px; background:#fff;">
                	<table cellpadding="5" cellspacing="0" id="tab">
                        <tr><td align="left">
						<?php if($site) { ?>
							վ���prֵ��: <font color=red><stong>
							<?php if($pr) { ?><?php echo $pr;?><?php } else { ?>������������, ����prֵΪ��<?php } ?>
							</stong></font>
						<?php } else { ?>
							 ������Ҫ��ѯվ���URL��ַ
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
		                	<input type="submit" class="bt" name="Submit" value="��ʼ��ѯ" />
		                </form>
		                    <ul>
		                        <li>��ѯ�������:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left">
						<?php if($site) { ?>
<div id="so" style="display: block;">
	<div><span>��������</span><span>��¼���</span><span>��������</span></div>
	<div id="baidu" style="display: block;">
	<span><img align="absmiddle" src="Moo-templates/images/baidu.gif"/> <a target="_blank" href="http://www.baidu.com"> �ٶ�</a></span>
	<span><?php if($BaiduSite) { ?><a target="_blank" href="http://www.baidu.com/s?wd=site%3A<?php echo $site;?>"><?php echo $BaiduSite;?></a><?php } else { ?><font color=red>������¼</font><?php } ?></span>
	<span><?php if($BaiduDomain) { ?><a target="_blank" href="http://www.baidu.com/s?wd=domain%3A<?php echo $site;?>"><?php echo $BaiduDomain;?></a><?php } else { ?><font color=red>���޷�������</font><?php } ?></span></div>
	<div id="google" style="display: block;">
	<span><img align="absmiddle" src="Moo-templates/images/google.gif"/> <a target="_blank" href="http://www.google.com"> Google</a></span>
	<span><?php if($GoogleSite) { ?><a target="_blank" href="http://www.google.cn/search?complete=1&amp;hl=zh-CN&amp;client=pub-6137409832737925&amp;q=site%3A<?php echo $site;?>"><?php echo $GoogleSite;?></a><?php } else { ?><font color=red>������¼</font><?php } ?></span>
	<span><?php if($GoogleLink) { ?><a target="_blank" href="http://www.google.cn/search?complete=1&amp;hl=zh-CN&amp;client=pub-6137409832737925&amp;q=link%3A<?php echo $site;?>"><?php echo $GoogleLink;?></a><?php } else { ?><font color=red>���޷�������</font><?php } ?></span></div>
</div>
						<?php } else { ?>
							 ������Ҫ��ѯ��¼����ĵ���ַ, ����:www.kqiqi.com
							 <br />���ס:www.kqiqi.com��kqiqi.com�ǲ�ͬ��
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
		                	<input type="submit" class="bt" name="Submit" value="��ʼ��ѯ" />
							<br />
						<span style="margin-left: -270px;">
							<input type="radio" name="radiobutton" value="baidu" <?php if($SearchE !== 'google') { ?>checked="checked" <?php } ?> />�ٶ�
							<input type="radio" name="radiobutton" value="google" <?php if($SearchE == 'google') { ?>checked="checked" <?php } ?> />Google
						</span>
		                </form>
		                    <ul>
		                        <li>��ѯ�������:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left"><?php if($value) { ?>
							<?php if($BaiduP || $GoogleP) { ?>
							����վ <font color=green><?php echo $domain;?></font> �Ĺؼ���: <font color=red><strong><?php echo str_replace('+', ' ', $keyword);?></strong></font> ��<?php if($SearchE == 'google') { ?> <strong>Google</strong> <?php } else { ?> <strong>�ٶ�</strong> <?php } ?>��������������� <strong><?php echo $BaiduP; echo $GoogleP;?></strong>
							<?php } elseif ($BaiduP == '0' || $GoogleP == '0') { ?>
							���ź�, ����վ <font color=green><?php echo $domain;?></font> ��Ĺؼ���<font color=red><strong><?php echo str_replace('+', ' ', $keyword);?></strong></font> û�н�<?php if($SearchE == 'google') { ?> <strong>Google</strong> <?php } else { ?> <strong>�ٶ�</strong> <?php } ?>��ǰ100λ, �ӽ�Ŭ��Ŷ
							<?php } elseif (!$keyword) { ?>
								����������ĸ�ʽ�Ƿ���ȷ! ��ȷ�ĸ�ʽʵ��: <font color=blue>www.kqiqi.com:������</font>(��վ��ַ:�ؼ���)
							<?php } ?>
						<?php } else { ?>	
							 ����: <font color=blue>www.kqiqi.com:������ </font>(��վ��ַ:�ؼ���)
							 <br />ֻ������������ǰ100λ, �����󽫲����
							 <br />��ע��: kqiqi.com��www.kqiqi.com�ǲ�һ����
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
		                	<input type="submit" class="bt" name="Submit" value="��ʼ��ѯ" />
		                </form>
		                    <ul>
		                        <li>Alexa��Ϣ��ѯ�������:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left">
						<?php if($url) { ?>
							<?php if(!$isExist) { ?>�������Ϸ����߲�����!��������ȷ������<?php } else { ?><strong><?php echo $url;?></strong>Ŀǰ����������(traffic rank)��:<font color=red><strong> <?php echo $TRank;?></strong></font>
<div id="box">
<div id="title">��վ��ƽ����������ͼ [���ʱ��β鿴��Ӧʱ������]</div>
<div id="boxOutside">
<div class="boxInside"><a href="###" onclick="showrank(1);">����������</a></div>
<div class="boxInside"><a href="###" onclick="showrank(2);">����������</a></div>
<div class="boxInside"><a href="###" onclick="showrank(3);">һ��������</a></div>
<div class="boxInside"><a href="###" onclick="showrank(4);">���������</a></div>
<div class="boxInside2"><a href="###" onclick="showrank(5);">һ��������</a></div>
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
<div id="title">��ƽ��������������ͼ [���ʱ��β鿴��Ӧʱ������]</div>
<div id="boxOutside">
<div class="boxInside"><a href="###" onclick="showreachs(1);">����������</a></div>
<div class="boxInside"><a href="###" onclick="showreachs(2);">����������</a></div>
<div class="boxInside"><a href="###" onclick="showreachs(3);">һ��������</a></div>
<div class="boxInside"><a href="###" onclick="showreachs(4);">���������</a></div>
<div class="boxInside2"><a href="###" onclick="showreachs(5);">һ��������</a></div>
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
<div id="title">��ҳ�����������ͼ [���ʱ��β鿴��Ӧʱ������]</div>
<div id="boxOutside">
<div class="boxInside"><a href="###" onclick="showpageviews(1);">����������</a></div>
<div class="boxInside"><a href="###" onclick="showpageviews(2);">����������</a></div>
<div class="boxInside"><a href="###" onclick="showpageviews(3);">һ��������</a></div>
<div class="boxInside"><a href="###" onclick="showpageviews(4);">���������</a></div>
<div class="boxInside2"><a href="###" onclick="showpageviews(5);">һ��������</a></div>
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
							 ������Ҫ��ѯ������
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
                	<input type="submit" class="bt" name="Submit" value="��ʼ��ѯ" hidefocus="true"  />
                </form>
                    <ul>
                        <li>������ѯ��IP�����ַ����:</li>
                    </ul>
                </div><div class="result" style="padding:5px; background:#fff;">
                	<table cellpadding="5" cellspacing="0" id="tab">
                        <tr><td align="left">��ѯ���:<?php if($ip) { ?><?php echo convertip_full($ip, MOOPHP_ROOT.'/plugins/ipdata/wry.dat');?><?php } else { ?>������Ҫ��ѯ��IP��ַ!<?php } ?></tr>
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
		                	<input type="submit" class="bt" name="Submit" value="��ʼ��ѯ" />
		                </form>
		                    <ul>
		                        <li>whois��ѯ�������:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left"><?php if($domain) { ?><?php echo startwhois(); ?><?php } else { ?>������Ҫ��ѯ������<?php } ?></td></tr>
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
		                	<input type="submit" class="bt" name="Submit" value="��ʼת��" />
		                </form>
		                    <ul>
		                        <li>ת���������:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left">
						<?php if($url) { ?>
							http://<?php echo $HexUrl;?>
						<?php } else { ?>
							 ������Ҫ��ѯ��URL��ַ, ����:
							 <br />http://www.kqiqi.com ת�����:http://%77%77%77%2e%6b%71%69%71%69%2e%63%6f%6d%20
							 <br />��ͨ��ַת��Ϊ16���Ƶ���ַ,������ȫ��Ч�ķ��� 
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