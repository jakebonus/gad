<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_inventory extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function m_ajax_get_medicine() {
		$sql = "SELECT DISTINCT `m_id`,
					CONCAT(`m_name`,' ',LOWER(`m_dosage_form`)) AS `m_name`,
					`m_dosage_form`,
					`m_set`,
					`m_pcsper_set`
				FROM
				  `tbl_medicine`
				WHERE `m_isdeleted` = '1'
				ORDER BY `m_name` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	//INVENTORY - IN
	public function m_ajax_savein($data, $arr_count){
		$data1 = array();
		for ($i = 0 ; $arr_count > $i; $i++) {
			$data1[] = array(
				'tr_rs_no' => $data['tr_rs_no'],
				'tr_location' => $data['tr_location'],
				'tr_funding' => $data['tr_funding'],
				'tr_program' => $data['tr_program'],
				'tr_si_no' => $data['tr_si_no'],
				'tr_dr_no' => $data['tr_dr_no'],
				'tr_by' => $data['tr_by'],
				'tr_supplier' => $data['tr_supplier'],
				'tr_date' => $data['tr_date'],
				'tr_addedby' => $data['tr_addedby'],
				'tr_m_id' => $data['tr_m_id'][$i],
				'tr_lot_no' => strtoupper($data['tr_lot_no'][$i]),
				'tr_expiration_date' => $data['tr_expiration_date'][$i],
				'tr_unit' => $data['tr_unit'][$i],
				'tr_pcsper_set' => $data['tr_pcsper_set'][$i],
				'tr_qty' => $data['tr_qty'][$i]
			);
		}

		if ($this->db->insert_batch('`tbl_transaction`', $data1)) {
			return true;
		} else {
			return false;
		}
	}

	public function m_ajax_record_in() {
		$sql = "SELECT
					`t2`.`tr_rs_no` AS `tr_rs_no`,
					`t2`.`tr_supplier` AS `tr_supplier`,
					`t2`.`tr_location` AS `SOURCE`,
					`t1`.`tr_location` AS `DESTINATION`,
					`t2`.`tr_funding` AS `tr_funding`,
					`t2`.`tr_program` AS `tr_program`,
					`t2`.`tr_by` AS `ALLOCATE_BY`,
					`t1`.`tr_by` AS `RECEIVED_BY`,
					-- `t2`.`tr_date` AS `tr_date`
					DATE_FORMAT(`t2`.`tr_date`,'%c/%e/%Y') AS `tr_date`,
					UPPER(CONCAT(`a`.`a_fname`,' ',`a`.`a_lname`)) AS `a_name`
				FROM
					tbl_transaction t1
				INNER JOIN tbl_transaction t2
					ON `t1`.`tr_rs_no` = `t2`.`tr_rs_no`
				INNER JOIN tbl_account a
					ON `t1`.`tr_addedby` = `a`.`a_id`
					-- WHERE t1.tr_location != t2.tr_location AND `t1`.`tr_rs_no` LIKE '%I-%'
				WHERE `t1`.`tr_rs_no` LIKE '%I-%' AND `t1`.`tr_isdeleted` = '1' AND `t2`.`tr_isdeleted` = '1'
				GROUP BY `t1`.`tr_rs_no`";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	//INVENTORY - ALLOCATION
	public function m_ajax_saveallocation($data, $arr_count){
		$data1 = array();

		for ($i = 0 ; $arr_count > $i; $i++) {
			$data1[] = array(
				'tr_location' => $data['tr_location'],
				'tr_funding' => $data['tr_funding'],
				'tr_program' => $data['tr_program'],
				'tr_rs_no' => $data['tr_rs_no'],
				'tr_by' => $data['tr_allocateby'],
				'tr_date' => $data['tr_date'],
				'tr_addedby' => $data['tr_addedby'],
				'tr_m_id' => $data['tr_m_id'][$i],
				'tr_lot_no' => $data['tr_lot_no'][$i],
				'tr_expiration_date' => $data['tr_expiration_date'][$i],
				'tr_unit' => $data['tr_unit'][$i],
				'tr_pcsper_set' => $data['tr_pcsper_set'][$i],
				'tr_si_no' => ($data['tr_si_no'][$i] != "" ? $data['tr_si_no'][$i] : NULL),
				'tr_dr_no' => ($data['tr_dr_no'][$i] != "" ? $data['tr_dr_no'][$i] : NULL),
				'tr_supplier' => ($data['tr_supplier'][$i] != "" ? $data['tr_supplier'][$i] : NULL),
				'tr_qty' => -abs($data['tr_qty'][$i])
			);
		}

		for ($i = 0 ; $arr_count > $i; $i++) {
			$data1[] = array(
				'tr_location' => $data['tr_destination'],
				'tr_funding' => $data['tr_funding'],
				'tr_program' => $data['tr_program'],
				'tr_rs_no' => $data['tr_rs_no'],
				'tr_by' => $data['tr_by'],
				'tr_date' => $data['tr_date'],
				'tr_addedby' => $data['tr_addedby'],
				'tr_m_id' => $data['tr_m_id'][$i],
				'tr_lot_no' => $data['tr_lot_no'][$i],
				'tr_expiration_date' => $data['tr_expiration_date'][$i],
				'tr_unit' => $data['tr_unit'][$i],
				'tr_pcsper_set' => $data['tr_pcsper_set'][$i],
				'tr_si_no' => ($data['tr_si_no'][$i] != "" ? $data['tr_si_no'][$i] : NULL),
				'tr_dr_no' => ($data['tr_dr_no'][$i] != "" ? $data['tr_dr_no'][$i] : NULL),
				'tr_supplier' => ($data['tr_supplier'][$i] != "" ? $data['tr_supplier'][$i] : NULL),
				'tr_qty' => $data['tr_qty'][$i]
			);
		}

		if ($this->db->insert_batch('`tbl_transaction`', $data1)) {
			return true;
		} else {
			return false;
		}
	}

	public function m_ajax_record_allocation() {
		$sql = "SELECT
					`t2`.`tr_rs_no` AS `tr_rs_no`,
					`t2`.`tr_location` AS `SOURCE`,
					`t1`.`tr_location` AS `DESTINATION`,
					`t2`.`tr_funding` AS `tr_funding`,
					`t2`.`tr_program` AS `tr_program`,
					`t2`.`tr_by` AS `ALLOCATE_BY`,
					`t1`.`tr_by` AS `RECEIVED_BY`,
					-- `t2`.`tr_date` AS `tr_date`
					DATE_FORMAT(`t2`.`tr_date`,'%c/%e/%Y') AS `tr_date`
				FROM
					tbl_transaction t1
				INNER JOIN tbl_transaction t2
					ON `t1`.`tr_rs_no` = `t2`.`tr_rs_no`
					WHERE `t1`.`tr_location` != `t2`.`tr_location` AND `t1`.`tr_rs_no` LIKE '%A-%' AND `t1`.`tr_isdeleted` = '1' AND `t2`.`tr_isdeleted` = '1'
				GROUP BY `t1`.`tr_rs_no`";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_risno($data) {
		$str = $data['str'];
		$sql = 'SELECT DISTINCT
				  (`tr_rs_no`) AS `value`
				FROM
				  `tbl_transaction`
				WHERE
					`tr_rs_no` LIKE "%'.$str.'%" AND `tr_isdeleted` = "1"
				ORDER BY `tr_rs_no` ASC
				';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_location($data) {
		$str = $data['str'];
		$sql = 'SELECT DISTINCT
				  (`tr_location`) AS `value`
				FROM
				  `tbl_transaction`
				WHERE
					`tr_rs_no` LIKE "%'.$str.'%" AND `tr_isdeleted` = "1"
				ORDER BY `tr_location` ASC
				';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_fund($data) {
		$str = $data['str'];
		$sql = 'SELECT DISTINCT
				  (`tr_funding`) AS `value`
				FROM
				  `tbl_transaction`
				WHERE
					`tr_rs_no` LIKE "%'.$str.'%" AND `tr_isdeleted` = "1"
				ORDER BY `tr_funding` ASC
				';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_program($data) {
		$str = $data['str'];
		$sql = 'SELECT DISTINCT
				  (`tr_program`) AS `value`
				FROM
				  `tbl_transaction`
				WHERE
					`tr_rs_no` LIKE "%'.$str.'%" AND `tr_isdeleted` = "1"
				ORDER BY `tr_program` ASC
				';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	//INVENTORY - DISPENSE
	public function m_ajax_record_dispense($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		$sql = "SELECT
			`tr_location`,
			`tr_funding`,
			 `tr_program`,
			 `tr_fc_id`,
			 `tr_sc_id`,
			`tr_rs_no`,
			CONCAT(`tr_fname`, ' ', `tr_lname`) AS `name`,
			`tr_type`,
			`tr_brgy`,
			`tr_by`,
			-- `tr_date`,
			DATE_FORMAT(`tr_date`,'%c/%e/%Y') AS `tr_date`,
			CASE
				WHEN `tr_type` LIKE 'WALK-IN' THEN CONCAT(`tr_fname`,' ',`tr_lname`)
				WHEN `tr_type` LIKE 'CITY-EMPLOYEE' THEN CONCAT('[',`t`.`tr_type`,'] ',`t`.`tr_fname`,' ',`t`.`tr_lname`)
				ELSE CONCAT('[',`t`.`tr_brgy`,'] ',`t`.`tr_fname`,' ',`t`.`tr_lname`)
			END AS `DESTINATION`
		FROM
			`tbl_transaction` `t`";

		if ($data['profile'] == 'admin') {
			$sql .=" WHERE
				`tr_rs_no` LIKE '%D%'
				AND `tr_isdeleted` = '1'";
		} else {
			$sql .=" WHERE
			`tr_rs_no` LIKE '%D%'
			AND `tr_location` = '".$location."'
			AND `tr_isdeleted` = '1'";
		}

		$sql .=" GROUP BY `tr_rs_no`";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_savedispense($data, $arr_count){
		$data1 = array();
		for ($i = 0 ; $arr_count > $i; $i++) {
			$data1[] = array(
				'tr_location' => $data['tr_location'],
				'tr_funding' => $data['tr_funding'],
				'tr_program' => $data['tr_program'],
				'tr_fc_id' => $data['tr_fc_id'],
				'tr_sc_id' => $data['tr_sc_id'],
				'tr_fname' => $data['tr_fname'],
				'tr_mname' => $data['tr_mname'],
				'tr_lname' => $data['tr_lname'],
				'tr_type' => $data['tr_type'],
				'tr_brgy' => $data['tr_brgy'],
				'tr_by' => $data['tr_by'],
				'tr_rs_no' => $data['tr_rs_no'],
				'tr_date' => $data['tr_date'],
				'tr_addedby' => $data['tr_addedby'],
				'tr_m_id' => $data['tr_m_id'][$i],
				'tr_lot_no' => $data['tr_lot_no'][$i],
				'tr_expiration_date' => $data['tr_expiration_date'][$i],
				'tr_unit' => $data['tr_unit'][$i],
				'tr_pcsper_set' => $data['tr_pcsper_set'][$i],
				'tr_si_no' => ($data['tr_si_no'][$i] != "" ? $data['tr_si_no'][$i] : NULL),
				'tr_dr_no' => ($data['tr_dr_no'][$i] != "" ? $data['tr_dr_no'][$i] : NULL),
				'tr_supplier' => ($data['tr_supplier'][$i] != "" ? $data['tr_supplier'][$i] : NULL),
				'tr_qty' => -abs($data['tr_qty'][$i])
			);
		}

		if ($this->db->insert_batch('`tbl_transaction`', $data1)) {
			return true;
		} else {
			return false;
		}
	}

	public function m_ajax_search_risno($data) {
		$format = $data['format'];
		$sql = "SELECT DISTINCT
				lpad(SUBSTRING_INDEX(`tr_rs_no`,'-',-1) + 1,4,'0') AS `series`
				FROM
				  `tbl_transaction`
				WHERE
					SUBSTRING_INDEX(`tr_rs_no`,'-',2)  = '".$format."'
					ORDER BY SUBSTRING_INDEX(`tr_rs_no`,'-',-1) DESC
					LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_d_risno($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		if ($data['profile'] == 'admin') {
			$sql = "SELECT DISTINCT
					  (`tr_rs_no`) AS `value`
					FROM
					  `tbl_transaction`
					WHERE
						`tr_rs_no` LIKE '%D-%' AND `tr_isdeleted` = '1'
					ORDER BY `tr_rs_no` ASC
					";
		} else {
			$sql = "SELECT DISTINCT
					  (`tr_rs_no`) AS `value`
					FROM
					  `tbl_transaction`
					WHERE
						`tr_rs_no` LIKE '%D-%' AND `tr_location` = '".$location."' AND `tr_isdeleted` = '1'
					ORDER BY `tr_rs_no` ASC
					";
		}
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_d_location() {
		$sql = "SELECT DISTINCT
				  (`tr_location`) AS `value`
				FROM
				  `tbl_transaction`
				WHERE
					`tr_rs_no` LIKE '%D-%' AND `tr_isdeleted` = '1'
				ORDER BY `tr_location` ASC
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_d_destination($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		if ($data['profile'] == 'admin') {
		$sql = "SELECT DISTINCT
				 	 CASE
						WHEN `tr_type` LIKE 'WALK-IN' THEN CONCAT(`tr_fname`,' ',`tr_lname`)
						ELSE CONCAT('[',`tr_brgy`,'] ',`tr_fname`,' ',`tr_lname`)
					END AS `value`
				FROM
				  `tbl_transaction`
				WHERE
					`tr_rs_no` LIKE '%D-%' AND `tr_isdeleted` = '1'
				ORDER BY `tr_location` ASC
				";
		} else {
			$sql = "SELECT DISTINCT
				 	 CASE
						WHEN `tr_type` LIKE 'WALK-IN' THEN CONCAT(`tr_fname`,' ',`tr_lname`)
						ELSE CONCAT('[',`tr_brgy`,'] ',`tr_fname`,' ',`tr_lname`)
					END AS `value`
				FROM
				  `tbl_transaction`
				WHERE
					`tr_rs_no` LIKE '%D-%' AND `tr_location` = '".$location."' AND `tr_isdeleted` = '1'
				ORDER BY `tr_location` ASC
				";
		}
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_d_fund($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		if ($data['profile'] == 'admin') {
			$sql = "SELECT DISTINCT
					  (`tr_funding`) AS `value`
					FROM
					  `tbl_transaction`
					WHERE
						`tr_rs_no` LIKE '%D-%' AND `tr_isdeleted` = '1'
					ORDER BY `tr_funding` ASC
					";
		} else {
			$sql = "SELECT DISTINCT
					  (`tr_funding`) AS `value`
					FROM
					  `tbl_transaction`
					WHERE
						`tr_rs_no` LIKE '%D-%' AND `tr_location` = '".$location."' AND `tr_isdeleted` = '1'
					ORDER BY `tr_funding` ASC
					";
		}
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_d_program($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		if ($data['profile'] == 'admin') {
			$sql = "SELECT DISTINCT
					  (`tr_program`) AS `value`
					FROM
					  `tbl_transaction`
					WHERE
						`tr_rs_no` LIKE '%D-%' AND `tr_isdeleted` = '1'
					ORDER BY `tr_program` ASC
					";
		} else {
			$sql = "SELECT DISTINCT
					  (`tr_program`) AS `value`
					FROM
					  `tbl_transaction`
					WHERE
						`tr_rs_no` LIKE '%D-%' AND `tr_location` = '".$location."' AND `tr_isdeleted` = '1'
					ORDER BY `tr_program` ASC
					";
		}
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	//PRINT - SEARCH RECORD
	public function m_ajax_search_record($data) {
		$tr_rs_no = $data['tr_rs_no'];
		$tr_location = $data['tr_location'];

		$sql = "SELECT
				  `tr_rs_no`,
				  `tr_pcsper_set`,
				  `tr_unit`,
				  ABS(`tr_qty`) AS `tr_qty`,
				  CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`,
				  `tr_lot_no`,
				  DATE_FORMAT(`tr_expiration_date`,'%c/%e/%Y') AS `tr_expiration_date`,
				  (
					  CASE
						WHEN DATE(DATE_ADD(NOW(),INTERVAL 6 MONTH)) < `tr_expiration_date` THEN 'black'
						WHEN CURDATE() > `tr_expiration_date` THEN 'red'
						WHEN CURDATE() <= `tr_expiration_date` THEN 'DarkOrange'
					END) AS `remarks`
				FROM
				  `tbl_transaction`
				  LEFT JOIN `tbl_medicine` `m`
    				ON `m`.`m_id` = `tr_m_id`
				WHERE `tr_rs_no` = '".$tr_rs_no."'
				  AND `tr_location` = '".$tr_location."' AND `tr_isdeleted` = '1'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	//GET NAME
	public function m_ajax_get_name($data) {
		$location = $data['location'];
		$sql = "SELECT
							DISTINCT(CONCAT(`tr_fname`,' ',`tr_lname`)) AS `fullname`,
							`tr_fname`,
							`tr_lname`
						FROM `tbl_transaction`
						WHERE `tr_fname` IS NOT NULL
							AND `tr_location` = '".$location."'
							AND `tr_isdeleted` = '1'
						ORDER BY `fullname` ASC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}


}
