<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_maintenance extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

	public function m_ajax_get_all_transaction($data) {
		$tr_risno = $data['tr_risno'];
		$m_name = $data['m_name'];
		$tr_brgy = $data['tr_brgy'];
		$start = $data['start'];
		$end = $data['end'];
		$t_risno = $data['t_risno'];

		$sql = "SELECT
					-- (CASE
					-- 	WHEN `t`.`tr_rs_no` LIKE '%I-%' THEN 'color-i'
					-- 	WHEN `t`.`tr_rs_no` LIKE '%D-%' THEN 'color-d'
					-- 	WHEN `t`.`tr_rs_no` LIKE '%A-%' THEN 'color-a'
					-- END) AS `remarks`,
						CONCAT(`tr_pcsper_set`,' [',`tr_unit`,']') AS `t_package`,
				  	ABS(`tr_qty`) AS `tr_qty`,
						`t`.`tr_id`,
						`t`.`tr_rs_no`,
						CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`),' [',`m`.`m_pcsper_set`,']s') AS `m_name`,
						`t`.`tr_lot_no`,
						`t`.`tr_location`,
						CONCAT(`t`.`tr_fname`,' ',`t`.`tr_lname`) AS `recvby`,
						`t`.`tr_brgy`,
						CONCAT(`a`.`a_fname`,' ',`a`.`a_lname`) AS `addedby`,
						DATE_FORMAT(`t`.`tr_addeddate`, '%m/%d/%Y %h:%i %p') AS `addeddate`
					FROM `tbl_transaction` `t`
					LEFT JOIN `tbl_medicine` `m`
						ON `m`.`m_id` = `t`.`tr_m_id`
					LEFT JOIN `tbl_account` `a`
						ON `a`.`a_id` = `t`.`tr_addedby` WHERE";

		if ($start != '' || $end != '') {
			$sql .=" `t`.`tr_date` BETWEEN CAST('".$start."' AS DATE) AND CAST('".$end."' AS DATE) AND";
		}
		if ($tr_risno != "") {
			$sql .=" `t`.`tr_rs_no` LIKE '%".$tr_risno."%' AND";
		}

		if ($t_risno != "") {
			$sql .=" `t`.`tr_rs_no` = '".$t_risno."' AND";
		}
		if ($tr_brgy != "") {
			$sql .=" `t`.`tr_brgy` = '".$tr_brgy."' AND";
		}
		if ($m_name != "") {
			$sql .=" `t`.`tr_m_id` = '".$m_name."' AND";
		}
		$sql .=" `t`.`tr_isdeleted` = '1' ORDER BY `t`.`tr_id` DESC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}

	public function m_ajax_get_all_trans_brgy() {
		$sql = 'SELECT DISTINCT
				  (`tr_brgy`) AS `value`
				FROM
				  `tbl_transaction`
				WHERE `tr_isdeleted` = "1"
				ORDER BY `tr_brgy` ASC
				';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	// public function m_ajax_msave($data) {
	// 	if($this->db->insert('tbl_medicine',$data)) {
	// 		return TRUE;
	// 	} else {
	// 		return FALSE;
	// 	}
	// }
	//
	public function m_ajax_tedit($data) {
		$id = $data['tr_id'];
		unset($data['tr_id']);
		$this->db->where('tr_id', $id);
		if($this->db->update('tbl_transaction',$data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	//
	// public function m_get_item_details($id) {
	// 	$sql = "SELECT * FROM `tbl_add` WHERE `ad_id` = '".$id."'";
  //       $query = $this->db->query($sql);
  //       if ($query->num_rows() > 0) {
  //           return $query->result();
  //       } else {
  //           return false;
  //       }
	// }
}
