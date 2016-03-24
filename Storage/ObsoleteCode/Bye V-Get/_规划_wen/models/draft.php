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

class draft_class extends AWS_MODEL
{
	public function save_draft($item_id, $type, $uid, $data)
	{
		if (!$data)
		{
			return false;
		}
		
		if ($draft = $this->get_draft($item_id, $type, $uid))
		{
			$this->update('draft', array(
				'data' => serialize($data)
			), 'id = ' . intval($draft['id']));
			
			return $draft['id'];
		}
		else
		{
			$draft_id = $this->insert('draft', array(
				'uid' => intval($uid),
				'item_id' => intval($item_id),
				'type' => $type,
				'data' => serialize($data),
				'time' => time()
			));
			
			$this->update('users', array(
				'draft_count' => $this->get_draft_count($type, $uid)
			), 'uid = ' . intval($uid));
			
			return $draft_id;
		}
	}
	
	public function get_draft($item_id, $type, $uid)
	{
		$draft = $this->fetch_row('draft', "item_id = " . intval($item_id) . " AND uid = " . intval($uid) . " AND `type` = '" . $this->quote($type) . "'");
		
		if ($draft['data'])
		{
			$draft['data'] = unserialize($draft['data']);
		}
		
		return $draft;
	}
	
	public function get_draft_count($type, $uid)
	{
		return $this->count('draft', "uid = " . intval($uid) . " AND `type` = '" . $this->quote($type) . "'");
	}
	
	public function delete_draft($item_id, $type, $uid)
	{
		$this->delete('draft', "item_id = " . intval($item_id) . " AND uid = " . intval($uid) . " AND `type` = '" . $this->quote($type) . "'");
		
		$this->update('users', array(
			'draft_count' => $this->get_draft_count($type, $uid)
		), 'uid = ' . intval($uid));
		
		return true;
	}
	
	public function get_data($item_id, $type, $uid)
	{
		$draft = $this->get_draft($item_id, $type, $uid);
		
		return $draft['data'];
	}
	
	public function get_all($type, $uid, $page = null)
	{
		if ($draft = $this->fetch_all('draft', "uid = " . intval($uid) . " AND `type` = '" . $this->quote($type) . "'", 'time DESC', $page))
		{
			foreach ($draft AS $key => $val)
			{
				if ($val['data'])
				{
					$draft[$key]['data'] = unserialize($val['data']);
				}
			}
		}
		
		return $draft;
	}
}