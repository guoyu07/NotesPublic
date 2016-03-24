<?php
/*
	More & Original PHP Framwork
	Copyright (c) 2007 - 2008 IsMole Inc.

	$Id: MooTemplate.class.php 184 2008-05-22 06:13:57Z kimi $
*/

!defined('IN_MOOPHP') && exit('Access Denied');

class MooTemplate {
	var $var_regexp = "\@?\\\$[a-zA-Z_][\\\$\w]*(?:\[[\w\-\.\"\'\[\]\$]+\])*";
	var $vtag_regexp = "\<\?php echo (\@?\\\$[a-zA-Z_][\\\$\w]*(?:\[[\w\-\.\"\'\[\]\$]+\])*)\;\?\>";
	var $const_regexp = "\{([\w]+)\}";

	/**
	 *  ��ģ��ҳ�����滻��д�뵽cacheҳ��
	 *
	 * @param string $tplfile ��ģ��Դ�ļ���ַ
	 * @param string $objfile ��ģ��cache�ļ���ַ
	 * @return string
	 */
	function complie($tplfile, $objfile) {

		$template = file_get_contents($tplfile);
		$template = $this->parse($template);
		$fp = fopen($objfile, 'w');
		fwrite($fp, $template);
		fclose($fp);

	}

	/**
	 *  ����ģ���ǩ
	 *
	 * @param string $template ��ģ��Դ�ļ�����
	 * @return string
	 */
	function parse($template) {

		$template = preg_replace("/\<\!\-\-\{(.+?)\}\-\-\>/s", "{\\1}", $template);//ȥ��htmlע�ͷ���<!---->
		$template = preg_replace("/\{($this->var_regexp)\}/", "<?php echo \\1;?>", $template);//�滻��{}�ı���
		$template = preg_replace("/\{($this->const_regexp)\}/", "<?php echo \\1;?>", $template);//�滻��{}�ĳ���
		$template = preg_replace("/(?<!\<\?php echo |\\\\)$this->var_regexp/", "<?php echo \\0;?>", $template);//�滻�ظ���<?php echo
		$template = preg_replace("/\{php (.*?)\}/ies", "\$this->stripvtag('<?php \\1?>')", $template);//�滻php��ǩ
		$template = preg_replace("/\{for (.*?)\}/ies", "\$this->stripvtag('<?php for(\\1) {?>')", $template);//�滻for��ǩ
		$template = preg_replace("/\{elseif\s+(.+?)\}/ies", "\$this->stripvtag('<?php } elseif (\\1) { ?>')", $template);//�滻elseif��ǩ
		for($i=0; $i<3; $i++) {
			$template = preg_replace("/\{loop\s+$this->vtag_regexp\s+$this->vtag_regexp\s+$this->vtag_regexp\}(.+?)\{\/loop\}/ies", "\$this->loopSection('\\1', '\\2', '\\3', '\\4')", $template);
			$template = preg_replace("/\{loop\s+$this->vtag_regexp\s+$this->vtag_regexp\}(.+?)\{\/loop\}/ies", "\$this->loopSection('\\1', '', '\\2', '\\3')", $template);
		}
		$template = preg_replace("/\{if\s+(.+?)\}/ies", "\$this->stripvtag('<?php if(\\1) { ?>')", $template);//�滻if��ǩ
		$template = preg_replace("/\{include\s+(.*?)\}/is", "<?php include \\1; ?>", $template);//�滻include��ǩ
		$template = preg_replace("/\{template\s+(\w+?)\}/is", "<?php include MooTemplate('\\1'); ?>", $template);//�滻template��ǩ
		$template = preg_replace("/\{block (.*?)\}/is", "<?php MooBlock(\"\\1\"); ?>", $template);//�滻block��ǩ
		$template = preg_replace("/\{else\}/is", "<?php } else { ?>", $template);//�滻else��ǩ
		$template = preg_replace("/\{\/if\}/is", "<?php } ?>", $template);//�滻/if��ǩ
		$template = preg_replace("/\{\/for\}/is", "<?php } ?>", $template);//�滻/for��ǩ
		$template = preg_replace("/$this->const_regexp/", "<?php echo \\1;?>", $template);//note {else} Ҳ���ϳ�����ʽ���˴�Ҫע���Ⱥ�˳??
		$template = preg_replace("/(\\\$[a-zA-Z_]\w+\[)([a-zA-Z_]\w+)\]/i", "\\1'\\2']", $template);//����ά�����滻�ɴ������ŵı�׼ģʽ
		$template = "<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>\r\n$template";

		return $template;
	}

	/**
	 * ������ʽƥ���滻
	 *
	 * @param string $s ��
	 * @return string
	 */
	function stripvTag($s) {
		return preg_replace("/$this->vtag_regexp/is", "\\1", str_replace("\\\"", '"', $s));
	}

	/**
	 * ��ģ���еĿ��滻��BLOCK����
	 *
	 * @param string $blockname ��
	 * @param string $parameter ��
	 * @return string
	 */
	function stripBlock($type, $name, $parameter) {
		return $this->stripvTag("<?php Mooblock(\"$type\", \"$name\", \"$parameter\"); ?>");
	}

	/**
	 * �滻ģ���е�LOOPѭ��
	 *
	 * @param string $arr ��
	 * @param string $k ��
	 * @param string $v ��
	 * @param string $statement ��
	 * @return string
	 */
	function loopSection($arr, $k, $v, $statement) {
		$arr = $this->stripvTag($arr);
		$k = $this->stripvTag($k);
		$v = $this->stripvTag($v);
		$statement = str_replace("\\\"", '"', $statement);
		return $k ? "<?php foreach((array)$arr as $k=>$v) {?>$statement<?php }?>" : "<?php foreach((array)$arr as $v) {?>$statement<?php } ?>";
	}
}