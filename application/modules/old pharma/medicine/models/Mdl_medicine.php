<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_medicine extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

	public function m_ajax_get_allmedicine() {
		$sql = "SELECT 
				  `m_id`,
				  `m_name`,
				  `m_dosage_form`,
				  `m_therapeutic_use`,
				  `m_set`,
				  `m_pcsper_set` 
				FROM
				  `tbl_medicine` 
				WHERE `m_isdeleted` = '1'
				ORDER BY `m_name` ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}

	public function m_ajax_msave($data) {
		if($this->db->insert('tbl_medicine',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function m_ajax_medit($data) {
		$id = $data['m_id'];
		unset($data['m_id']);
		$this->db->where('m_id', $id);
		if($this->db->update('tbl_medicine',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function m_get_item_details($id) {
		$sql = "SELECT * FROM `tbl_add` WHERE `ad_id` = '".$id."'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
}
