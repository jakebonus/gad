<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_profile extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

	public function m_ajax_save($data)
	{
		if($this->db->insert('tbl_add',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function m_get_add()
	{
		$sql = "SELECT * FROM `tbl_add`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
   
}
