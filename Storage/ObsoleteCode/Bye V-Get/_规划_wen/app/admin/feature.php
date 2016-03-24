<?php
/*
+--------------------------------------------------------------------------
|   Anwsion [#RELEASE_VERSION#]
|   ========================================
|   by Anwsion dev team
|   (c) 2011 - 2012 Anwsion Software
|   http://www.anwsion.com
|   ========================================
|   Support: zhengqiang@gmail.com
|   
+---------------------------------------------------------------------------
*/


if (!defined('IN_ANWSION'))
{
	die;
}

class feature extends AWS_CONTROLLER
{
	public function setup()
	{
		$this->model('admin_session')->init();

		TPL::assign('menu_list', $this->model('admin_group')->get_menu_list($this->user_info['group_id'], 304));
	}

	public function index_action()
	{
		$this->list_action();
	}

	public function list_action()
	{
		$feature_list = $this->model('feature')->get_feature_list(null, 'id DESC', $_GET['page'], $limit);
		
		$feature_count = $this->model('feature')->found_rows();
		
		$this->crumb(AWS_APP::lang()->_t('专题管理'), "admin/feature/list/");
		
		TPL::assign('pagination', AWS_APP::pagination()->initialize(array(
			'base_url' => get_setting('base_url') . '/?/admin/feature/list/',
			'total_rows' => $feature_count,
			'per_page' => 20,
			'direct_page' => TRUE
		))->create_links());
		
		TPL::assign('list', $feature_list);
		
		TPL::output("admin/feature/list");
	}
	
	public function edit_action()
	{
		$feature = $this->model('feature')->get_feature_by_id($_GET['feature_id']);
		
		$this->crumb(AWS_APP::lang()->_t('编辑专题'), "admin/feature/list/");
		
		TPL::assign('feature', $feature);
		
		TPL::output("admin/feature/edit");
	}
	
	public function topic_list_action()
	{
		$feature = $this->model('feature')->get_feature_by_id($_GET['feature_id']);
		
		$list = $this->model('topic')->get_topics_by_ids($this->model('feature')->get_topics_by_feature_id($_GET['feature_id']));
		
		$this->crumb(AWS_APP::lang()->_t('专题话题管理'), "admin/feature/list/");
		
		TPL::assign('feature', $feature);
		
		TPL::assign('list', $list);
		
		TPL::import_js(array(
			'admin/js/jquery.autocomplete.js',
		));
		
		TPL::output("admin/feature/topic_list");
	}
	
	public function add_topic_ajax_action()
	{
		$feature_id = intval($_GET['feature_id']);
		
		$topic_id = intval($_POST['topic_id']);
		
		if (!$feature_id)
		{
			H::ajax_json_output(AWS_APP::RSM(null, -1, AWS_APP::lang()->_t('专题不存在')));
		}
		
		if (!$topic_id)
		{
			if (!$topic_info = $this->model('topic')->get_topic_by_title($_POST['topic']))
			{
				H::ajax_json_output(AWS_APP::RSM(null, -1, AWS_APP::lang()->_t('话题不存在')));
			}
			
			$topic_id = $topic_info['topic_id'];
		}
		
		if ($this->model('feature')->add_topic($feature_id, $topic_id))
		{
			H::ajax_json_output(AWS_APP::RSM(null, 1, null));
		}
		else
		{
			H::ajax_json_output(AWS_APP::RSM(null, -1, AWS_APP::lang()->_t('话题已存在')));
		}
	}
	
	public function delete_topic_ajax_action()
	{
		$this->model('feature')->delete_topic($_GET['feature_id'], $_GET['topic_id']);
		
		H::ajax_json_output(AWS_APP::RSM(null, 1, null));
	}
	
	public function delete_feature_ajax_action()
	{
		$this->model('feature')->delete_feature($_POST['feature_id']);
		
		H::ajax_json_output(AWS_APP::RSM(null, 1, null));
	}

	public function save_ajax_action()
	{
		define('IN_AJAX', TRUE);
	
		$feature_id = intval($_GET['feature_id']);
		
		$title = $_POST['title'];
			
		if (empty($title))
		{
			H::ajax_json_output(AWS_APP::RSM(null, -1, AWS_APP::lang()->_t('专题标题不能为空')));
		}
		
		if ($feature_id)
		{
			$feature = $this->model('feature')->get_feature_by_id($feature_id);
		}
		
		if ($_POST['url_token'])
		{
			if (!preg_match("/^(?!__)[a-zA-Z0-9_]+$/i", $_POST['url_token']))
			{
				H::ajax_json_output(AWS_APP::RSM(null, '-1', AWS_APP::lang()->_t('专题别名只允许输入英文或数字')));
			}
			
			if (preg_match("/^[\d]+$/i", $_POST['url_token']) AND ($feature_id != $_POST['url_token']))
			{
				H::ajax_json_output(AWS_APP::RSM(null, '-1', AWS_APP::lang()->_t('专题别名不可以全为数字')));
			}
		
			if ($this->model('feature')->check_url_token($_POST['url_token'], $feature_id))
			{
				H::ajax_json_output(AWS_APP::RSM(null, '-1', AWS_APP::lang()->_t('专题别名已经被占用请更换一个')));
			}
		}
		
		if (! $feature_id)
		{		
			$feature_id = $this->model('feature')->add_feature($title, null, $_POST['is_scope']);

			if ($_POST['add_nav_menu'])
			{
				$this->model('menu')->add_nav_menu($title, htmlspecialchars($_POST['description']), 'feature', $feature_id);
			}
		}
	
		$update_data = array(
			'title' => $title,
			'description' => htmlspecialchars($_POST['description']),
			'css' => htmlspecialchars($_POST['css']),
			'url_token' => $_POST['url_token'],
			'is_scope' => intval($_POST['is_scope'])
		);
	
		if ($_FILES['icon']['name'])
		{
			AWS_APP::upload()->initialize(array(
				'allowed_types' => 'jpg,jpeg,png,gif',
				'upload_path' => get_setting('upload_dir') . '/feature',
				'is_image' => TRUE
			))->do_upload('icon');
			
			
			if (AWS_APP::upload()->get_error())
			{
				switch (AWS_APP::upload()->get_error())
				{
					default:
						H::ajax_json_output(AWS_APP::RSM(null, '-1', AWS_APP::lang()->_t('错误代码') . ': ' . AWS_APP::upload()->get_error()));
					break;
					
					case 'upload_invalid_filetype':
						H::ajax_json_output(AWS_APP::RSM(null, '-1', AWS_APP::lang()->_t('文件类型无效')));
					break;	
				}
			}
			
			if (! $upload_data = AWS_APP::upload()->data())
			{
				H::ajax_json_output(AWS_APP::RSM(null, '-1', AWS_APP::lang()->_t('上传失败, 请与管理员联系')));
			}

			foreach (AWS_APP::config()->get('image')->feature_thumbnail as $key => $val)
			{
				$thumb_file[$key] = $upload_data['file_path'] . $feature_id . "_" . $val['w'] . "_" . $val['h'] . '.jpg';
				
				AWS_APP::image()->initialize(array(
					'quality' => 90,
					'source_image' => $upload_data['full_path'],
					'new_image' => $thumb_file[$key],
					'width' => $val['w'],
					'height' => $val['h']
				))->resize();	
			}
			
			unlink($upload_data['full_path']);
			
			$update_data['icon'] = basename($thumb_file['min']);
		}
	
		$this->model('feature')->update_feature($feature_id, $update_data);
	
		H::ajax_json_output(AWS_APP::RSM(array(
			'url' => G_INDEX_SCRIPT . 'admin/feature/list/'
		), 1, null));
	
	}
}