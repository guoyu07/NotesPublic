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
		                <form method="post" action="md5.php">
		                	<input type="text" class="it" size="36" name="md5" value="<?php echo $md5;?>"/>
		                	<input type="submit" class="bt" name="Submit" value="开始计算" />
		                <p>
		                	<input type="radio" name="radio" value="c32" <?php if(!$_POST['radio'] || $_POST['radio'] == c32 ) { ?>checked="checked"<?php } ?> />32位大写
		                	<input type="radio" name="radio" value="l32" <?php if($_POST['radio'] == l32 ) { ?>checked="checked"<?php } ?> />32位小写
		                	<input type="radio" name="radio" value="c16" <?php if($_POST['radio'] == c16 ) { ?>checked="checked"<?php } ?> />16位大写
		                	<input type="radio" name="radio" value="l16" <?php if($_POST['radio'] == l16 ) { ?>checked="checked"<?php } ?> />16位小写
		                </p>
		                </form>
		                    <ul>
		                        <li>计算结果如下:</li>
		                    </ul>
		               </div>
	                 <div class="result" style="padding:5px; background:#fff;">
	                	<table cellpadding="5" cellspacing="0" id="tab">
	                        <tr><td align="left"><?php echo $md5_result; ?></td></tr>
	                    </table>
	                 </div>
              </div>
       </div>      
	</div>
</div>
<?php include MooTemplate("tools_footer"); ?>