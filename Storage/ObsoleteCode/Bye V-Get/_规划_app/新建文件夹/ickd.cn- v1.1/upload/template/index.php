<?php
	!defined('IN_TW') && exit('Access Denied');
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title><?php
if($index){echo $_config['info']['indextitle'];}else{echo $expInfo['textname'],'��ѯ - ',$_config['info']['sitename'];} ?></title>
<meta name="keywords" content="<?php if($index){echo $_config['info']['indexkeywords'];}else{echo $expInfo['textname'],$expInfo['seokeywords'];} ?>">
<meta name="description" content="<?php if($index){echo $_config['info']['indexdescription'];}else{echo '�����ݡ�iCKD.cn���ṩ',$expInfo['textname'],$expInfo['seodesc'],'����,',$expInfo['textname'],$expInfo['seodesc'],'����͵绰��ѯ��',$expInfo['textname'],'�绰��',$expInfo['tel'];} ?>">
<meta name="google-site-verification" content="-LqkCfg-ytcv9zh1okcZMaId2T3AGo5sv_awYoONQjY" />
<link href="<?=$_config['info']['siteurl']?>/img/common.css?ver=20110405" rel="stylesheet" type="text/css" />
<script src="<?=$_config['info']['siteurl']?>/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="<?=$_config['info']['siteurl']?>/js/common.js" type="text/javascript" language="javascript"></script>
<script language="javascript">
$(function() {
    $('#search-tabs>ul>li').each(function(index) {
        $(this).click(function(e, donotsubmit) {
            if (index == 0) {
                $('#search-form>span.c-t-l').hide();
            } else {
                $('#search-form>span.c-t-l').show();
            }
            $(this).siblings().removeClass('active');
            var a = $(this).addClass('active').find('a').blur().attr('href');
            $('#exp').val(a);
        });
    });
    $('#qform').submit(function() {
        var v = $.trim($('#q').val());
        if (!v || !(/^[\da-z]+$/i.exec(v))) {
            $('#q').focus();
            return false;
        }
        location = '<?=$_config['info']['siteurl']?>/' + $('#exp').val() + '-' + $.trim($('#q').val()) + '.html';
        return false
    });
    var expCo = '<?=$code?>' || 'ems';
    if (expCo) {
        $('li#' + expCo).trigger('click', 0);
    }
    $('#q').focus();
}); 
</script><!--GOOGLE END -->
</head><body>
<?php include TW_ROOT.'./template/top.php'; ?>
<div id="logo"><a href="<?=$_config['info']['siteurl']?>/" title="<?=$_config['info']['sitename']?>"><?=$_config['info']['sitename']?></a></div>
<div id="search-panel">
  <div id="search-tabs">
    <ul>
      <li id="ems"><a href="ems">EMS</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="sto"><a href="shentong">��ͨ</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="yto"><a href="yuantong">Բͨ</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="sf"><a href="shunfeng">˳��</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="tt"><a href="tiantian">����</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="yd"><a href="yunda">�ϴ�</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="cces"><a href="cces">CCES</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="ht"><a href="huitong">��ͨ</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="zto"><a href="zhongtong">��ͨ</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li id="zjs"><a href="zhaijisong">լ����</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
      <li><a href="more/">����&raquo;</a><span class="c-t-l"></span><span class="c-t-r"></span></li>
    </ul>
  </div>
  <div id="search-form"><span class="c-t-l"></span><span class="c-t-r"></span><span class="c-b-r"></span><span class="c-b-l"></span>
    <form id="qform" name="qform" method="post" action="#">
      <div id="q-wrap">
        <input type="text" name="q" id="q" autocomplete="off" />
      </div>
      <input type="submit" id="s-btn" value="��ѯ" />
      <input name="exp" id="exp" type="hidden" value="" />
    </form>
  </div>
</div>
<div id="google_ad" style="width:728px;margin:10px auto"></div>
<?php include TW_ROOT.'./template/footer.php'; ?>