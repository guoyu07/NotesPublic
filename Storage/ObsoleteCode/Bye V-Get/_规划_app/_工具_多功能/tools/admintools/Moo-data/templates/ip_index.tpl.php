<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>
<?php include MooTemplate("tools_header"); ?>
<div id="tab1">
	<div id="page">   
              <div class="toolbox">
            	<div class="title">
                	<div><?php echo $tpl_name; ?></div>
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
<?php include MooTemplate("tools_footer"); ?>