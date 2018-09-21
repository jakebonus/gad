<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_admin extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

	public function m_ajax_get_fernandino($data) {

		$search = $data['txt_search'];
		$in 		= $data['txt_in'];
		$from 	= $data['txt_brgy'];
		$gender 	= $data['gender'];
		$sector 	= strtolower($data['sector']);

		$sql = 'SELECT
							`t`.`masterid`,
							`t`.`idNo`,
							`t`.`lname`,
							`t`.`fname`,
							`t`.`mname`,
							`t`.`sector`,
							CONCAT(`t`.`lname`,", ",`t`.`fname`," ",`t`.`mname`) AS fullname,
							DATE_FORMAT(`t`.`birthdate`,"%c/%e/%Y") AS `birthdate`,
							DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, "%Y-%m-%d"))/365 AS edad,
							`b`.`brgyname` AS `brgyname`
						FROM
							`t_master` `t`
						INNER JOIN `m_brgy` `b`
							ON `t`.`brgyid` = `b`.`brgyid`';

		if ($from != '') {
			$sql .=' WHERE `b`.`brgyid` =  "'.$from.'"';

			switch ($in) {
				case 'lastname':
						$sql .=' AND `lname` =  "'.$search.'"';
					break;
				case 'firstname':
						$sql .=' AND `fname` =  "'.$search.'"';
					break;
				case 'middlename':
						$sql .=' AND `mname` =  "'.$search.'"';
					break;
			}
		} else {
			switch ($in) {
				case 'id':
					if ($search != '') {
						$sql .=' WHERE `idNo` =  "'.$search.'"';
						break;
					}
				case 'lastname':
						$sql .=' WHERE `lname` =  "'.$search.'"';
					break;
				case 'firstname':
						$sql .=' WHERE `fname` =  "'.$search.'"';
					break;
				case 'middlename':
						$sql .=' WHERE `mname` =  "'.$search.'"';
					break;
			}
		}

		if($gender != ''){
					$sql .=' AND `sexid` =  "'.$gender.'"';
		}

		if($sector != ''){
			switch($sector){
				case 'senior citizen':
						$sql .=" AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60'";
				break;
				case 'solo parent':
						$sql .=" AND `sector` = '".$sector."'";
				break;
				case 'pwd':
						$sql .=" AND `sector` = '".$sector."'";
				break;
			}
		}


		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
  //
	// public function m_ajax_get_brgy() {
	// 	$sql = 'SELECT
	// 						`brgyid` AS `id`,
	// 						`brgyname`	AS `name`
	// 					FROM
	// 						`m_brgy`
	// 			';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function m_ajax_get_precint() {
	// 	$sql = 'SELECT
	// 						DISTINCT(`pprecintNo`)	AS `id`,
	// 						`pprecintNo` AS `name`
	// 					FROM
	// 						`precint`
	// 			';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	//get subdivision
	// public function m_ajax_get_subdivision() {
	// 	$sql = 'SELECT
	// 						DISTINCT(TRIM(`subdivision`)) AS `name`
	// 					FROM
	// 						`t_master`
	// 					WHERE
	// 						`subdivision` != ""
	// 					ORDER BY `subdivision` ASC';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	//get religion
	// public function m_ajax_get_religion() {
	// 	$sql = 'SELECT
	// 						DISTINCT(TRIM(`religion`)) AS `name`
	// 					FROM
	// 						`t_master`
	// 					WHERE
	// 						`religion` != ""
	// 					ORDER BY `religion` ASC';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	//get occupation
	// public function m_ajax_get_occupation() {
	// 	$sql = 'SELECT
	// 						DISTINCT(TRIM(`occupation`)) AS `name`
	// 					FROM
	// 						`t_master`
	// 					WHERE
	// 						`occupation` != "" AND `occupation` != "N/A" AND CHAR_LENGTH(`occupation`) >= "3"
	// 					ORDER BY `occupation` ASC';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	//get street
	// public function m_ajax_get_street() {
	// 	$sql = 'SELECT
	// 						DISTINCT(TRIM(`street`)) AS `name`
	// 											FROM
	// 												`t_master`
	// 											WHERE
	// 												`street` != "" AND `street` != "N/A" AND CHAR_LENGTH(`street`) >= "4"
	// 											ORDER BY `street` ASC';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	//get birhtplace
	// public function m_ajax_get_birthplace() {
	// 	$sql = 'SELECT
	// 						DISTINCT(TRIM(`birthplace`)) AS `name`
	// 											FROM
	// 												`t_master`
	// 											WHERE
	// 												`birthplace` != "" AND `birthplace` != "N/A" AND CHAR_LENGTH(`birthplace`) >= "4"
	// 											ORDER BY `birthplace` ASC';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	//get skills
	// public function m_ajax_get_skills() {
	// 	$sql = 'SELECT
	// 						DISTINCT(TRIM(`skills`)) AS `name`
	// 											FROM
	// 												`t_master`
	// 											WHERE
	// 												`skills` != "" AND `skills` != "N/A" AND CHAR_LENGTH(`skills`) >= "4"
	// 											ORDER BY `skills` ASC';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function m_ajax_get_fernandino($data) {
  //
	// 	$search = $data['txt_search'];
	// 	$in 		= $data['txt_in'];
	// 	$from 	= $data['txt_brgy'];
  //
	// 	$sql = 'SELECT
	//             `t`.`masterid`,
	//             `t`.`idNo`,
	//             `t`.`lname`,
	//             `t`.`fname`,
	//             `t`.`mname`,
	// 						`t`.`sector`,
	// 						CONCAT(`t`.`lname`,", ",`t`.`fname`," ",`t`.`mname`) AS fullname,
	// 						DATE_FORMAT(`t`.`birthdate`,"%c/%e/%Y") AS `birthdate`,
	// 						DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, "%Y-%m-%d"))/365 AS edad,
	//             `b`.`brgyname` AS `brgyname`
	//           FROM
	//             `t_master` `t`
	//           INNER JOIN `m_brgy` `b`
	//             ON `t`.`brgyid` = `b`.`brgyid`';
  //
	// 	if ($from != '') {
	// 		$sql .=' WHERE `b`.`brgyid` =  "'.$from.'"';
  //
	// 		switch ($in) {
	// 			case 'lastname':
	// 					$sql .=' AND `lname` =  "'.$search.'"';
	// 				break;
	// 			case 'firstname':
	// 					$sql .=' AND `fname` =  "'.$search.'"';
	// 				break;
	// 			case 'middlename':
	// 					$sql .=' AND `mname` =  "'.$search.'"';
	// 				break;
	// 		}
	// 	} else {
	// 		switch ($in) {
	// 			case 'id':
	// 				if ($search != '') {
	// 					$sql .=' WHERE `idNo` =  "'.$search.'"';
	// 					}
	// 				break;
	// 			case 'lastname':
	// 					$sql .=' WHERE `lname` =  "'.$search.'"';
	// 				break;
	// 			case 'firstname':
	// 					$sql .=' WHERE `fname` =  "'.$search.'"';
	// 				break;
	// 			case 'middlename':
	// 					$sql .=' WHERE `mname` =  "'.$search.'"';
	// 				break;
	// 		}
	// 	}
  //
  //
	// 	// if ($in == 'id') {
	// 	// 	$sql .='WHERE `idNo` =  "'.$search.'"';
	// 	// } else {
	// 	// 	if ($from != '') {
	// 	// 		$sql .='WHERE `b`.`brgyid` =  "'.$from.'"  ';
	// 	// 	}
  //   //
	// 	// 	switch ($in) {
	// 	// 		case 'lastname':
	// 	// 				$sql .=' AND `lname` =  "'.$search.'"';
	// 	// 			break;
	// 	// 		case 'firstname':
	// 	// 				$sql .=' AND `fname` =  "'.$search.'"';
	// 	// 			break;
	// 	// 		case 'middlename':
	// 	// 				$sql .=' AND `mname` =  "'.$search.'"';
	// 	// 			break;
	// 	// 		default:
	// 	// 			$sql .='';
	// 	// 				break;
	// 	// 	}
	// 	// }
  //
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }


	//==================== OLD ================================//
	// public function m_ajax_get_lotno($data) {
	// 	$profile = $data['profile'];
	// 	$location = $data['location'];
  //
	// 	if ($data['profile'] == 'admin') {
	// 		$sql = 'SELECT DISTINCT
	// 				  (`tr_lot_no`) AS `value`
	// 				FROM
	// 				  `tbl_transaction`
	// 				WHERE `tr_isdeleted` = "1"
	// 				ORDER BY `tr_lot_no` ASC
	// 				';
	// 	} else {
	// 		$sql = 'SELECT DISTINCT
	// 			  (`tr_lot_no`) AS `value`
	// 			FROM
	// 			  `tbl_transaction` WHERE `tr_location` = "'.$location.'" AND `tr_isdeleted` = "1"
	// 			ORDER BY `tr_lot_no` ASC
	// 			';
	// 	}
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function m_ajax_get_m_dosage_form() {
	// 	$sql = 'SELECT DISTINCT
	// 			  (`m_dosage_form`) AS `value`
	// 			FROM
	// 			  `tbl_medicine`
	// 			WHERE `m_isdeleted` = "1"
	// 			ORDER BY `m_dosage_form` ASC
	// 			';
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }
  //
	// public function m_ajax_get_program($data) {
	// 	$profile = $data['profile'];
	// 	$location = $data['location'];
  //
	// 	if ($data['profile'] == 'admin') {
	// 		$sql = 'SELECT DISTINCT
	// 				  (`tr_program`) AS `value`
	// 				FROM
	// 				  `tbl_transaction`
	// 				WHERE `tr_program` != "N/A" AND `tr_isdeleted` = "1"
	// 				ORDER BY `tr_program` ASC
	// 				';
	// 	} else {
	// 		$sql = 'SELECT DISTINCT
	// 			  (`tr_program`) AS `value`
	// 			FROM
	// 			  `tbl_transaction` WHERE `tr_program` != "N/A" AND `tr_location` = "'.$location.'" AND `tr_isdeleted` = "1"
	// 			ORDER BY `tr_program` ASC
	// 			';
	// 	}
	// 	$query = $this->db->query($sql);
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }
  //
	// public function m_ajax_search($data) {
	// 	$tr_location = $data['tr_location'];
	// 	$tr_funding = $data['tr_funding'];
	// 	$medicine = $data['medicine'];
	// 	$tr_lot_no = $data['tr_lot_no'];
	// 	$tr_program = $data['tr_program'];
  //
	// 	$sql = "SELECT
	// 			   `m`.`m_id`,
	// 			  CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`,
	// 			  -- `t`.`tr_funding`,
	// 			  (
	// 				CASE
	// 					WHEN DATE(DATE_ADD(NOW(),INTERVAL 6 MONTH)) < `t`.`tr_expiration_date` THEN 'black'
	// 					WHEN CURDATE() > `t`.`tr_expiration_date` THEN 'red'
	// 					WHEN CURDATE() <= `t`.`tr_expiration_date` THEN 'DarkOrange'
	// 				END) AS `remarks`,
	// 			  `m`.`m_set`,
	// 			  `m`.`m_pcsper_set`,
	// 			  `t`.`tr_lot_no`,
	// 			  -- DATE_FORMAT(`t`.`tr_expiration_date`,'%m.%d.%y') AS `tr_expiration_date`,
	// 			  `t`.`tr_expiration_date`,
	// 			   `t`.`tr_program`,
	// 			   IFNULL(`t`.`tr_si_no`,'') AS `tr_si_no`,
	// 			   IFNULL(`t`.`tr_dr_no`,'') AS `tr_dr_no`,
	// 			   IFNULL(`t`.`tr_supplier`,'') AS `tr_supplier`,
	// 			SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) AS `pcsper_set_x_qty`,
	// 			FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`) AS `box`,
	// 			SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`) AS `pcs`
	// 			FROM
	// 			  `tbl_transaction` `t`
	// 			  LEFT JOIN `tbl_medicine` `m`
	// 			    ON `m`.`m_id` = `t`.`tr_m_id`
	// 			WHERE `t`.`tr_isdeleted` = '1'";
  //
	// 	if ($tr_location != '') {
	// 		$sql .=" AND `t`.`tr_location` = '".$tr_location."'";
	// 	}
	// 	if ($tr_funding != '') {
	// 		$sql .=" AND `t`.`tr_funding` = '".$tr_funding."'";
	// 	}
	// 	if ($tr_lot_no != '') {
	// 		$sql .=" AND `t`.`tr_lot_no` = '".$tr_lot_no."'";
	// 	}
  //
	// 	if ($tr_program == '' ) {
	// 		$sql .=" AND `t`.`tr_program` IS NOT NULL";
	// 	} else {
	// 		$sql .=" AND `t`.`tr_program` = '".$tr_program."'";
	// 	}

		// if ($medicine != '') {
		// 	$sql .=" AND `m`.`m_id` = '".$medicine."'";
		// 	$sql .= " GROUP BY `t`.`tr_lot_no`, `t`.`tr_m_id`, `t`.`tr_program` HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0";
		// } else {
		// 	if ($tr_lot_no != '') {
		// 		$sql .= " GROUP BY `t`.`tr_lot_no`, `t`.`tr_m_id`, `t`.`tr_program` HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0";
		// 	} else {
		// 		$sql .= " GROUP BY `t`.`tr_m_id`, `t`.`tr_program` HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0";
		// 	}
		// }

	// 	if ($medicine != '') {
	// 		$sql .=" AND `m`.`m_id` = '".$medicine."'";
	// 	}
  //
	// 	$sql .= " GROUP BY `t`.`tr_m_id`";
  //
	// 	if ($medicine != '') {
	// 		$sql .= " ,`t`.`tr_lot_no`";
	// 	} else {
	// 		if ($tr_lot_no != '') {
	// 			$sql .= " ,`t`.`tr_lot_no`";
	// 		}
	// 	}
  //
	// 	if ($tr_program != '') {
	// 		$sql .= " ,`t`.`tr_program`";
	// 	}
  //
	// 	$sql .= " HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0 ORDER BY `t`.`tr_expiration_date` ASC";
  //
  //       $query = $this->db->query($sql);
  //       if ($query->num_rows() > 0) {
  //           return $query->result();
  //       } else {
  //           return false;
  //       }
	// }
}


// SELECT
//   `t`.`tr_id`,
//   `m`.`m_name`,
//   `m`.`m_dosage_form`,
//   `m`.`m_set`,
//   `m`.`m_pcsper_set`,
//   `t`.`tr_pcsper_set`,
//   `t`.`tr_qty`,
//  SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) AS `pcsper_set_x_qty`,
//  FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`) AS `box`,
// SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`) AS `pcs`
// FROM
//   `tbl_transaction` `t`
//   LEFT JOIN `tbl`tbl_transaction`_medicine` `m`
//     ON `m`.`m_id` = `t`.`tr_m_id`
// WHERE `t`.`tr_isdeleted` = '1'

// GROUP BY `t`.`tr_m_id`
