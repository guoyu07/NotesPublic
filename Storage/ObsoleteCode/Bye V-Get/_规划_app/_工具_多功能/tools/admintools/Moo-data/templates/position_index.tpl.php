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
							 ����: <font color=blue>www.kqiqi.com:������</font>(��վ��ַ:�ؼ���)
							 <br />ֻ������������ǰ100λ, �����󽫲����
							 <br />��ע��: kqiqi.com��www.kqiqi.com�ǲ�һ����
						<?php } ?></td></tr>
	                    </table>
	                 </div>
              </div>
       </div>      
	</div>
</div>
<?php include MooTemplate("tools_footer"); ?>