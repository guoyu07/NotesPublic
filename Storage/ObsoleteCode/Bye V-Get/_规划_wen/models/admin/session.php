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

class admin_session_class
{	
	public function init()
	{
		$skip_controller = array(
			'login',
			'login_process_ajax',
		);
		
		if (in_array($_GET['act'], $skip_controller))
		{
			return true;
		}
		
		$admin_info = H::decode_hash(AWS_APP::session()->admin_login);
		
		if (!($admin_info['uid'] == USER::get_client_uid() AND $admin_info['UA'] == $_SERVER['HTTP_USER_AGENT'] AND $admin_info['ip'] == $_SERVER['REMOTE_ADDR'] AND AWS_APP::session()->permission['is_administortar']))
		{
			unset(AWS_APP::session()->admin_login);
			
			HTTP::redirect(get_setting('base_url') . '/?/admin/login/url-' . base64_encode($_SERVER['REQUEST_URI']));
		}
		
		TPL::import_clean();
		
		if (defined('SYSTEM_LANG'))
		{
			TPL::import_js(get_setting('base_url') . '/language/' . SYSTEM_LANG . '.js');
		}
		
		TPL::import_js(array(
			'js/jquery.js',
			'js/jquery.form.js',
			'js/functions.js',
			'js/plug_module/plug-in_module.js',
			'admin/js/admin_functions.js',
			'admin/js/global.js',
			'admin/js/jquery.date_input.js'
		));
				
		TPL::import_css(array(
			'admin/css/default/admin.css',
			'js/plug_module/style.css',
			'admin/css/date_input.css'
		), false);
	}
	
	public function set_admin_login($uid)
	{
		AWS_APP::session()->admin_login = H::encode_hash(array(
			'uid' => $uid,
			'UA' => $_SERVER['HTTP_USER_AGENT'],
			'ip' => $_SERVER['REMOTE_ADDR']
		));
	}
	
	public function admin_logout()
	{
		if (isset(AWS_APP::session()->admin_login))
		{
			unset(AWS_APP::session()->admin_login);
		}
	}
}
