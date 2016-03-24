<?php if(!defined('HDWIKI_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('admin_header');?>
<script type="text/javascript" src="js/popWindow.js"></script>
<script type="text/javascript">
var getSize = function (datatype){
	url='index.php?admin_main-datasize-'+datatype;
	$("#"+datatype).html('查询中,请稍后......');
	$.get(url, function(data){
		$("#"+datatype).html(data);
	});
}
<?php if($show_upgrade) { ?>
$(function(){
	$('#new_release_info').text('正在检查新版本...');
	$.get('index.php?admin_upgrade-check', function(data){
		if(isNaN(data)) {
			$('#new_release_info').text('暂时没有升级包');
		} else {
			$('#new_release_info').html('找到'+data+'个升级包').css('color', 'red');
			$('#new_release_info').html($('#new_release_info').html()+' <a href="index.php?admin_upgrade">点此升级</a>')
			divDance('new_release_info');
		}
	});
	
});
<?php } ?>
</script>
<div class="sy">
	<h4 class="col-h5">HDwiki后台管理中心</h4>
	<h3 class="col-h3">安全提示</h3>
	<ul class="col-ul p-l30">
		<li>建议您将config.php文件属性设置为644（linux/unix）或只读（NT） </li>
		<li>建议您定期更换超级管理员密码，以保证账号安全 </li>
		<li>建议您定期到官方论坛了解hdwiki最新动态及最新补丁 </li>
	</ul>
	<p class="dcl"><span>待处理事项</span>：<?php if($newunewd_on) { ?><a href="index.php?admin_edition-newusernewdoc">首次编辑审核</a><?php } else { ?><a href="index.php?admin_doc">审核词条</a><?php } ?><a href="index.php?admin_user">审核用户</a><a href="index.php?admin_comment">审核评论 </a></p>
	<h3 class="col-h3">管理员</h3>
	<p class="gly p-10 p-b10 p-l30">
		<?php foreach((array)$adminlist as $admin) {?>
		<a href="index.php?user-space-<?php echo $admin['uid']?>" target="_blank"><?php echo $admin['username']?></a>
		<?php } ?>
	</p>
	
	<h3 class="col-h3">服务器信息</h3>
	<ul class="col-ul p-l30 p-b10">
		<li>HDwiki程序版本 HDWiki V<?php echo HDWIKI_VERSION?>  release <?php echo HDWIKI_RELEASE?> <span id="new_release_info"></span><a href="http://kaiyuan.hudong.com/down.php" target="_blank" class="m-lr10">查看最新版本</a><a href="http://kaiyuan.hudong.com/bbs/" target="_blank">专业支持与服务</a></li>
		<li>服务器系统及版本 <?php echo $sys['server']?></li>
		<li>服务器 MySQL 版本 <?php echo $sys['mysql']?></li>
		<li>系统安装路径 <?php echo HDWIKI_ROOT?></li>
		<li>数据库大小&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dbsize?></li>
		<li>附件大小&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="attsize"><a href="javascript:void(0);" onclick="getSize('attsize')">[详情]</a></span></li>
		<li>上传图片大小&nbsp;&nbsp;<span id="uploadsize"><a href="javascript:void(0);" onclick="getSize('uploadsize')">[详情]</a></span></li>
		<li>当前词条总数<a href="index.php?admin_doc"  class="m-l8">[详情]</a></li>
		<li>当前图片总数<a href="index.php?admin_image"  class="m-l8">[详情]</a></li>
		<li><a href="index.php?admin_log-phpinfo">点击查看更多服务器信息</a></li>
	</ul>

	<h3 class="col-h3">HDwiki开发团队</h3>
	<ul class="col-ul p-l30 team">
		<li>版权所有 互动在线（北京） 科技有限公司</li>
		<li class="link_gray">系统架构师 <a href="http://hi.baidu.com/songdenggao" target="_blank">lovewiki</a> </li>
		<li class="link_gray">开发与支持团队 <a href="http://hi.baidu.com/songdenggao" target="_blank">lovewiki</a>
											 <a href="http://hi.baidu.com/jobs_lee" target="_blank">jobs</a>
											 <a href="javascript:void(0)" target="_blank">绚烂</a>
											 <a href="http://i.baike.com/yejingran" target="_blank">夜静然</a>
											 <a href="http://dushii.blog.163.com/blog/" target="_blank">雪鹏</a>
											 <a href="javascript:void(0)" target="_blank">Walker</a>
											 <a href="http://www.rjf.cc/" target="_blank"> truk</a>
											 <a href="http://riverlet.me/" target="_blank">小河</a>
		</li>
		<li class="link_gray">界面与用户体验团队  <a href="http://i.baike.com/aadesign/index" target="_blank">杨羊羊</a><a href="http://i.baike.com/banma" target="_blank">萧萧班马</a><a href="http://i.baike.com/wenyanwen/index" target="_blank">会游泳的鱼</a> </li>
		<li class="link_gray">感谢贡献者 </li>
		<li>相关链接 <a href="http://www.baike.com" target="_blank">公司网站</a>,  <a href="http://kaiyuan.hudong.com/sq/authorize.html" target="_blank">购买授权</a>,  <a href="http://kaiyuan.hudong.com/template.php" target="_blank">模板</a>,  <a href="http://kaiyuan.hudong.com/plugin.php" target="_blank">插件</a>,  <a href="http://kaiyuan.hudong.com/product.php" target="_blank">产品</a>, <a href="http://kaiyuan.hudong.com/bbs/" target="_blank"> 讨论区</a></li>
	</ul>
</div>
<?php include $this->gettpl('admin_footer');?>
