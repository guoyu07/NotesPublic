<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>
<?php include MooTemplate("tools_header"); ?>
<div id="tab1">
	<div id="page">   
              <div class="toolbox">
            	<div class="title">
                	<div><?php echo $tpl_name; ?></div>
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
<?php include MooTemplate("tools_footer"); ?>