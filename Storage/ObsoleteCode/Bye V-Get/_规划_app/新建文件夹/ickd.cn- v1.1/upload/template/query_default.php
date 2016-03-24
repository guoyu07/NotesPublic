<?php
	!defined('IN_TW') && exit('Access Denied');
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php if($expNo){echo $expNo, '���� - ';} echo $expInfo[ 'title']; ?> - <?=$_config[ 'info'][ 'sitename']?></title>
    <meta name="keywords" content="<?php echo ($expNo?$expNo.',':''),$expInfo['keywords'];?>" />
    <meta name="description" content="<?php if($expNo){echo $expInfo['textname'],'���ţ�',$expNo,'���顣';} echo $expInfo['description']; ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=gbk" />
    <meta name="google-site-verification" content="-LqkCfg-ytcv9zh1okcZMaId2T3AGo5sv_awYoONQjY" />
    <link href="img/common.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript" language="javascript"></script>
    <script language="javascript">
var __ready=false;
(function($) {
    $(function() {
		$('#submitbutton').val('��ѯ').attr('disabled', false);
		window['__ready']=true;
		function ajaxSearch(){
            if (!/^[a-z\d]{5,}$/i.test($.trim($('#mailNo').val()))) {
                $('#mailNo').focus();
                return false;
            }
            if ($('#v_input') && !/^[a-z\d#\$@]+$/i.test($('#v_input').val())) {
                $('#v_input').focus();
                return false;
            }
            $('#submitbutton').val('��ѯ��').attr('disabled', true);
            $('#sg,#tp,#ajax_html').hide();
            $('#ajax_loading').show();
            var data = $('#queryForm').formSerialize(); <?php
            if ($debug) {
                echo "return true;";
            } ?>$.post('query.do', data, showResult, 'json');
            return false;
		}
        function atachEvent() {
            var i = document.getElementById('v_input');
            var no = $.trim($('#mailNo').val());
            if (!no) {
                $('#mailNo').focus();
            } else if (i) {
                i.focus();
            } else {
                setTimeout(ajaxSearch,10);
            }
        };
        atachEvent();
        $('#queryForm').submit(ajaxSearch);
        function showResult(json) {
            $('#submitbutton').val('��ѯ').attr('disabled', false);
            $('#ajax_loading').hide(); <?php
            if ($code == 'ems') { ?>$.get('<?=$_config['info']['siteurl']?>/<?=$code?>-' + $.trim($('#mailNo').val()) + '-ajax.html',
                function(data) {
                    $('#formContent').html(data);
                    atachEvent();
                }); <?php
            } else { ?>
                var img = document.getElementById('vImage');
                if (img) {
                    changeImage(img);
                } <?php
            } ?>
            var tiphtml = '�´ο�ֱ��ʹ�� <span id="s_url">';
            var url = '<?php echo $_config['info']['siteurl'],'/',$expName,'-';?>' + $.trim($('#mailNo').val()) + '.html';
            tiphtml += url;
            tiphtml += '</span>  ���в�ѯ����<a href="javascript:void(0);" onclick="addFav(\'' + url + '\')">�ղ�</a>��';
            var html = '';
            /*Parse JSON*/
            if (json.status == 1 && (json.data.length > 0 || (json.html && json.html.length > 0))) {
                if (json.data.length > 0) {
                    html = '<table class="json_data">';
                    html += '<tr><td width="150" class="bluebg">����</td><td class="bluebg">�ص�͸��ٽ���</td></tr>';
                    var d = json.data;
                    for (var i = 0,
                    l = d.length; i < l; i++) {
                        html += '<tr><td>' + d[i].time + '</td><td>' + d[i].context + '</td></tr>';
                    }
                    html += '</table>';
                }
                if (json.html && json.html.length > 0) {
                    html += json.html;
                }
            } else {
                tiphtml += '<br>�Բ��𣬲�ѯ���ִ��������������ʾ��<br>' + json.message + '<br>ע�⣺�ڲ�ѯ�߷�ʱ���ܻ�������ٻ�������������β�ѯ�����ǵ�<a href="<?=$expInfo['url ']?>" target="_blank"><?=$expInfo['textname ']?></a>�ٷ���վ��ѯ��';
                $('#sg').show();
            }
            $('#tp').html(tiphtml).show();
            $('#ajax_html').html(html).show();
        };
		$('#showExps').click(function() {
			$('#moreexp').slideToggle('300',
			function() {
				if ($('#showexptext').text() == '������ݲ�ѯ') {
					$('#showexptext').text('���ز���');
				} else {
					$('#showexptext').text('������ݲ�ѯ');
				}
			});
			$('#showmoreexp').toggleClass('showmoreexp');
		});
                /*End Of Function*/
            });
        })(jQuery);
        function changeImage(o) {
            var u = o.src;
            u = u.replace(/\&t=(.*?)$/, '');
            o.src = u + '&t=' + Math.random();
            $('#v_input').val('').focus();
        }
    </script>
</head>
<body>
<?php include TW_ROOT.'./template/top.php'; ?>
<div class="header">
  <div style="width:960px; margin:auto; position: relative;">
    <div id="slogo"><a href="<?=$_config['info']['siteurl']?>/" title="<?=$_config['info']['sitename']?>">��ݲ�ѯ</a></div>
    <div id="tbanner">
      <script type="text/javascript">google_ad_client = "ca-pub-3195725015930868";google_ad_slot = "7358662348";google_ad_width = 728;google_ad_height = 90;</script>
      <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    </div>
  </div>
</div>
<div class="main">
  <div class="l">
    <div class="nav"><span style="float:right"><?php if($expInfo['outlets']){printf('<a href="/outlets/%s.html">%s�����ѯ</a>',$expInfo['spellname'],$expInfo['textname']);}?></span>����ǰλ�ã�<a href="<?=$_config['info']['siteurl']?>/">��ݲ�ѯ</a>&raquo;<a href="<?=$expInfo['spellname']?>.html"><?=$expInfo['textname']?>���Ų�ѯ</a><?php if($expNo){ ?>&raquo;<?=$expNo?>����<?php } ?>
    </div>
    <!--Ad Here <div></div> -->
    <?php if($expInfo['note']){ ?>
    <div id="warning">���棺
      <?=$expInfo['note']?>
    </div>
    <?php } ?>
    <div class="sbox">
      <div id="explogo"><a href="<?=$expInfo['url']?>" style=" background-image:url(img/logo/<?=$expInfo['code']?>.jpg); " target="_blank" title="��<?=$expInfo['textname']?>�ٷ���վ" rel="nofollow">
        <?=$expInfo['textname']?>
      </a></div>
      <div>
        <div style="float:right; margin-left: 5px; border: 1px solid #ddd; height: 60px; width: 575px; font-size: 15px; line-height: 150%; vertical-align: middle;">
          <form action="query.do" method="post" id="queryForm">
            <div style="padding:2px 5px;"><span id="formContent">
              <?php require TW_ROOT.'./template/query_form.php';?>
              </span>
              <input name="button" type="submit" class="btn" id="submitbutton" style="width:65px;" value="��ѯ" />
              <img src="img/ajaxloading.gif" width="16" height="16" id="ajax_loading" alt="��ݲ�ѯ��" title="��ݲ�ѯ��" /></span></div>
          </form>
          <div style="color:#333; padding: 0 5px; border-top: 2px solid #FFF;">�ͷ��绰��
            <?=$expInfo['tel']?>
            <g:plusone size="small"></g:plusone>
          </div>
        </div>
      </div>
    </div>
    <div class="m">
      <div class="tip" id="tp">ע�⣺�ڲ�ѯ�߷�ʱ���ܻ�������ٻ�������������Ժ��ѯ�����ǵ�<a href="<?=$expInfo['url']?>" target="_blank">
        <?=$expInfo['textname']?>
      </a>�ٷ���վ��ѯ��</div>
      <div id="sg" style="padding:10px;"><strong>��������:</strong>
        <ol style="padding:0 0 0 40px; margin:0;">
          <li>
			��˶������еĵ����Ƿ�Ϊ<span style="color:#F00; font-weight:bold"><?=$expInfo['textname']?>����</span>��
		  </li>
          <?php if($expInfo['nodesc']){ echo '<li><strong>',$expInfo['nodesc'],'��</strong></li>';} ?>
          <li>�շ��Ŀ�ݣ���ʱ�ڶ���ſɲ鵽��</li>
          <li>��ʷ����һ��ʱ����ʧЧ��</li>
          <li>[LP]��ͷ�����Ա��ڲ����ţ����˵�����ſɲ�ѯ��</li>
        </ol>
      </div>
      <div class="result" id="ajax_html"></div>
      <!--Ad Here <div></div> -->
    </div>
  </div>
  <div class="r">
    <div class="c" style="padding:15px 0 1px 10px;">
      <div class="h">��ѯ�������</div>
      <div id="elist">
        <ul>
          <?php
		  $i=0;
		foreach($allexpress as $row){
			if($row['ord']==0)continue;
			if($i===15){
				echo '</ul><div style="line-height:24px;height:24px;cursor:pointer;" id="showExps"><span id="showmoreexp" class="showmoreexp"></span><span id="showexptext">������ݲ�ѯ</span></div><div id="moreexp" style="display:none;"><ul id="moreexpli">';
			}
			echo '<li><a href="',$row['spellname'],'.html">',$row['textname'],'��ѯ</a></li>';
			++$i;
		}
	  ?>
          <li><a href="more/">������ݹ�˾</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div style="clear:both; border-top:1px solid #dedede;"></div>
</div>
<?php require TW_ROOT.'./template/footer.php'; ?>