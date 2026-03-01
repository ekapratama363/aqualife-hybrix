<?php

class Menu_backend_model extends CI_Model {

	function get_parent_menu($parentId, $id_user, $id_grup){
		$this->db->select('core_menu.coreMenuId, core_menu.coreMenuName, core_menu.coreMenuUrl, core_menu.coreMenuIcon, core_menu.coreMenuTitle, core_menu.coreParentId, Deriv1.Count');
        $this->db->from('core_role');
        $this->db->join('core_user', 'core_role.coreRoleGroup = core_user.coreUserGroupId');
		$this->db->join('core_menu', 'core_role.coreRoleMenu = core_menu.coreMenuId');
        $this->db->join('(SELECT coreParentId, COUNT(*) AS COUNT FROM `core_menu` GROUP BY coreParentId) as Deriv1', 'core_menu.coreMenuId = Deriv1.coreParentId','LEFT');
		$this->db->where('core_menu.coreParentId', $parentId);
        $this->db->where('core_role.coreRoleGroup', $id_grup);
		$this->db->where('core_user.coreUserId', $id_user);
		$this->db->where('core_role.coreRoleActive','1');
		$this->db->order_by('core_menu.coreMenuSort');
        $query = $this->db->get();
        return $query->result();
	}

	function get_menu_id($menuUri){
		$query = $this->db->get_where('core_menu',array('coreMenuUrl' => $menuUri));
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				return $row->coreMenuId;
			}
		}else{
				return FALSE;
		}
	}

	function get_authority_grup($id_menu, $id_grup, $id_user){
		$this->db->select('core_menu.coreMenuId, core_menu.coreMenuName, core_menu.coreMenuUrl');
        $this->db->from('core_role');
        $this->db->join('core_user', 'core_role.coreRoleGroup = core_user.coreUserGroupId');
		$this->db->join('core_menu', 'core_role.coreRoleMenu = core_menu.coreMenuId');
        $this->db->where('core_role.coreRoleGroup', $id_grup);
		$this->db->where('core_user.coreUserId', $id_user);
		$this->db->where('core_role.coreRoleActive','1');
		$this->db->where('core_menu.coreMenuId', $id_menu);
		$this->db->order_by('core_menu.coreMenuSort');
        $query = $this->db->get();
		
		//echo "<pre>".$this->db->last_query()."</pre>"; die();
        
        if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	//function for breadcrumb
	function get_parent_menu_breadcrumb($uri){
		$query = $this->db->get_where('core_menu',array('coreMenuUrl' => $uri));
		return $query->result();
	}

	function get_parent_menu_id_breadcrumb($id){
		$query = $this->db->get_where('core_menu',array('coreMenuId' => $id));
		return $query->result();
	}
	
}