<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>
<?php include MooTemplate("tools_header"); ?>
<div id="tab1">
	<div id="page">   
       <div class="toolbox">
            <div class="title">
				<div><?php echo $tpl_name; ?> </div>
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
<?php include MooTemplate("tools_footer"); ?>