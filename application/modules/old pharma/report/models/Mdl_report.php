<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_report extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function m_ajax_get_report($data) {
		$tr_location = $data['tr_location'];
		$tr_funding = $data['tr_funding'];
		$tr_program = $data['tr_program'];
		$start = $data['start'];
		$end = $data['end'];

		$tr_format = $data['tr_format'];

		$sql = "SELECT
				  `m`.`m_id`,
				  CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`,
				  `m`.`m_therapeutic_use`,
				  `m`.`m_dosage_form`,
				  `t`.`tr_funding`,
				  `t`.`tr_location`,
				  `t`.`tr_date`,
				  `t`.`tr_type`,
				  `m`.`m_set`,
				  `m`.`m_pcsper_set`,";

		if ($tr_format == 'a' || $tr_format == 'b') {
			$sql .="ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`)) AS `pcsper_set_x_qty`,
				ABS(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)) AS `box`,
				ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`)) AS `pcs`";
		} else {
			$sql .="SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) AS `pcsper_set_x_qty`,
				FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`) AS `box`,
				SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`) AS `pcs`";
		}

		$sql .="FROM
				  `tbl_transaction` `t`
				  LEFT JOIN `tbl_medicine` `m`
				    ON `m`.`m_id` = `t`.`tr_m_id`
				WHERE `t`.`tr_isdeleted` = '1'";

				if ($tr_program != '') {
					$sql .=" AND `t`.`tr_program` = '".$tr_program."'";
				}

				if ($tr_location != '') {
					$sql .=" AND `t`.`tr_location` = '".$tr_location."'";
				}
				if ($tr_funding != '') {
					$sql .=" AND `t`.`tr_funding` = '".$tr_funding."'";
				}

				if ($start != '' || $end != '') {
					$sql .=" AND `t`.`tr_date` BETWEEN CAST('".$start."' AS DATE) AND CAST('".$end."' AS DATE)";
				}

				if ($tr_format == 'a' || $tr_format == 'b') {
					$sql .=" AND `t`.`tr_type` IS NOT NULL";
				}

				if ($tr_format == 'a' || $tr_format == 'b') {
					$sql .= " GROUP BY `t`.`tr_m_id` HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) < 0";
				} else {
					$sql .= " GROUP BY `t`.`tr_m_id` HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0";
				}

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}

	public function m_ajax_get_exp_report($data) {
		$tr_location = $data['tr_location'];
		$tr_funding = $data['tr_funding'];
		$tr_program = $data['tr_program'];
		$start = $data['start'];
		$end = $data['end'];

		$sql = "SELECT
				  CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`,
				  `t`.`tr_lot_no`,
					(
					  CASE
						WHEN DATE(DATE_ADD(NOW(),INTERVAL 6 MONTH)) < `t`.`tr_expiration_date` THEN 'black'
						WHEN CURDATE() > `t`.`tr_expiration_date` THEN 'red'
						WHEN CURDATE() <= `t`.`tr_expiration_date` THEN 'DarkOrange'
					END) AS `remarks`,
				  DATE_FORMAT(`t`.`tr_expiration_date`,'%m/%d/%Y') AS `tr_expiration_date`,
				  -- `t`.`tr_type`,
				  `m`.`m_set`,
				  `m`.`m_pcsper_set`,
				  ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`)) AS `pcsper_set_x_qty`,
				ABS(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)) AS `box`,
				ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`)) AS `pcs`
				FROM
				  `tbl_transaction` `t`
				  LEFT JOIN `tbl_medicine` `m`
				    ON `m`.`m_id` = `t`.`tr_m_id`
				WHERE `t`.`tr_isdeleted` = '1'";

				if ($tr_program != '') {
					$sql .=" AND `t`.`tr_program` = '".$tr_program."'";
				}

				if ($tr_location != '') {
					$sql .=" AND `t`.`tr_location` = '".$tr_location."'";
				}
				if ($tr_funding != '') {
					$sql .=" AND `t`.`tr_funding` = '".$tr_funding."'";
				}

				if ($start != '' || $end != '') {
					$sql .=" AND `t`.`tr_date` BETWEEN CAST('".$start."' AS DATE) AND CAST('".$end."' AS DATE)";
				}

				$sql .= " AND `tr_lot_no` != 'N/A' GROUP BY `t`.`tr_m_id` ,`t`.`tr_lot_no`";

				if ($tr_program != '') {
					$sql .= " ,`t`.`tr_program`";
				}

				$sql .=" HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0 ORDER BY `m`.`m_name` ASC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}

	public function m_ajax_get_brgy_report($data) {
		$tr_location = $data['tr_location'];
		$tr_funding = $data['tr_funding'];
		$tr_program = $data['tr_program'];
		$start = $data['start'];
		$end = $data['end'];

		$sql = "SELECT
				CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`,
				`m`.`m_pcsper_set`,
				-- SUM(CASE WHEN `t`.`tr_brgy` ='ALASAS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `ALASAS`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='ALASAS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `ALASAS`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='BALITI' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `BALITI`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='BULAON' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `BULAON`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='CALULUT' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `CALULUT`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='DELA PAZ NORTE' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `DELA_PAZ_NORTE`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='DELA PAZ SUR' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `DELA_PAZ_SUR`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='DEL CARMEN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `DEL_CARMEN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='DEL PILAR' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `DEL_PILAR`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='DEL ROSARIO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `DEL_ROSARIO`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='DOLORES' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `DOLORES`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='JULIANA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `JULIANA`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='LARA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `LARA`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='LOURDES' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `LOURDES`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='MAIMPIS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `MAIMPIS`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='MAGLIMAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `MAGLIMAN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='MALINO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `MALINO`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='MALPITIC' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `MALPITIC`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='PANDARAS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `PANDARAS`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='PANIPUAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `PANIPUAN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='PULONG BULO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `PULONG_BULO`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='QUEBIAWAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `QUEBIAWAN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAGUIN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAGUIN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAN AGUSTIN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAN_AGUSTIN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAN FELIPE' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAN_FELIPE`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAN ISIDRO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAN_ISIDRO`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAN JOSE' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAN_JOSE`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAN JUAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAN_JUAN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAN NICOLAS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAN_NICOLAS`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SAN PEDRO CUTUD' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SAN_PEDRO_CUTUD`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SANTA LUCIA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SANTA_LUCIA`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SANTA TERESITA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SANTA_TERESITA`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SANTO NINO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SANTO_NINO`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SANTO ROSARIO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END)  / `m`.`m_pcsper_set`)+0 AS `SANTO_ROSARIO`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='SINDALAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `SINDALAN`,
				TRIM(SUM(CASE WHEN `t`.`tr_brgy` ='TELABASTAGAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) / `m`.`m_pcsper_set`)+0 AS `TELABASTAGAN`
			FROM
				`tbl_transaction` `t`
			LEFT JOIN `tbl_medicine` `m`
				ON `m`.`m_id` = `t`.`tr_m_id`
			WHERE `t`.`tr_isdeleted` = '1'
				AND `t`.`tr_type` = 'MIDWIFE'";

				if ($tr_program != '') {
					$sql .=" AND `t`.`tr_program` = '".$tr_program."'";
				}

				if ($tr_location != '') {
					$sql .=" AND `t`.`tr_location` = '".$tr_location."'";
				}
				if ($tr_funding != '') {
					$sql .=" AND `t`.`tr_funding` = '".$tr_funding."'";
				}

				if ($start != '' || $end != '') {
					$sql .=" AND `t`.`tr_date` BETWEEN CAST('".$start."' AS DATE) AND CAST('".$end."' AS DATE)";
				}

				$sql .=" GROUP BY `t`.`tr_m_id` HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) < 0 ORDER BY `m_name` ASC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}

	public function m_ajax_get_stockcard($data) {
		$tr_location = $data['tr_location'];
		$tr_funding = $data['tr_funding'];
		$tr_program = $data['tr_program'];

		$tr_m_id = $data['medicine'];

		$sql = 'SET @running_total:=0';
		$this->db->query($sql);

		$sql = "SELECT
					`tr_location`,
					`tr_funding`,
					`tr_program`,
					DATE_FORMAT(`tr_date`,'%m/%d/%Y') AS `tr_date`,
					-- CONCAT(DATE_FORMAT(`tr_date`,'%m/%d/%Y'),' ',`tr_unit`) AS `tr_date`,
					(CASE
						WHEN `t`.`tr_rs_no` IS NULL THEN 'IN'
						WHEN `t`.`tr_rs_no` LIKE '%A%' THEN 'AL'
						WHEN `t`.`tr_rs_no` LIKE '%D%' THEN 'DI'
					END) AS `TRAN`,
					IF(`t`.`tr_rs_no` IS NULL,'',`t`.`tr_rs_no`) AS `tr_rs_no`,
					IF(`t`.`tr_qty` > 0,
						(CASE
							WHEN `t`.`tr_rs_no` IS NULL THEN `t`.`tr_supplier`
							ELSE ''
						END),
						 CONCAT('[',`t`.`tr_location`,'] ',`tr_by`)
					) AS `RELEASED_BY`,
					IF(`t`.`tr_qty` < 0,
						(CASE
							WHEN `t`.`tr_rs_no` LIKE '%D%' THEN
								(CASE
									WHEN `t`.`tr_type` = 'WALK-IN' THEN CONCAT(`t`.`tr_fname`,' ',`t`.`tr_lname`)
									ELSE CONCAT('[',`t`.`tr_brgy`,']',`t`.`tr_fname`,' ',`t`.`tr_lname`)
								END)
							ELSE ''
						END),
						CONCAT('[',`t`.`tr_location`,'] ',`tr_by`)
					) AS `RECIEVED_BY`,
					IF(`t`.`tr_qty` * `t`.`tr_pcsper_set` > 0,`t`.`tr_qty` * `t`.`tr_pcsper_set`,'') AS `IN`,
					IF(`t`.`tr_qty` * `t`.`tr_pcsper_set` < 0,`t`.`tr_qty` * `t`.`tr_pcsper_set`,'') AS `OUT`,
					(@running_total := @running_total + (IF(`t`.`tr_qty` * `t`.`tr_pcsper_set` > 0,`t`.`tr_qty` * `t`.`tr_pcsper_set`,0) + IF(`t`.`tr_qty` * `t`.`tr_pcsper_set` < 0,`t`.`tr_qty` * `t`.`tr_pcsper_set`,0))) AS `BALANCE`
				FROM (
					SELECT `tr_id`,`tr_qty`,
						`tr_pcsper_set`,
						`tr_date`,
						`tr_unit`,
						`tr_rs_no`,
						`tr_supplier`,
						`tr_location`,
						`tr_by`,
						`tr_type`,
						`tr_fname`,
						`tr_lname`,
						`tr_brgy`,
						`tr_funding`,
						`tr_program`
					FROM `tbl_transaction`
					WHERE
						`tr_isdeleted` = '1'
					";
				if ($tr_m_id != '') {
					$sql .=" AND `tr_m_id` = '".$tr_m_id."'";
				}
				if ($tr_program != '') {
					$sql .=" AND `tr_program` = '".$tr_program."'";
				}
				if ($tr_funding != '') {
					$sql .=" AND `tr_funding` = '".$tr_funding."'";
				}
				if ($tr_location != '') {
					$sql .=" AND `tr_location` = '".$tr_location."'";
				}
				$sql .=" ) AS `t`";



		// if ($tr_program != '') {
		// 	$sql .=" AND `t`.`tr_program` = '".$tr_program."'";
		// }


        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}

	public function m_ajax_get_medicine_stockcard($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		if ($data['profile'] == 'admin') {
			$sql = "SELECT DISTINCT
						`m`.`m_id`,
					   	CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`
					FROM
					  `tbl_transaction` `t`
					   LEFT JOIN `tbl_medicine` `m`
						ON `m`.`m_id` = `t`.`tr_m_id`
						WHERE `tr_isdeleted` = '1'
					ORDER BY `m`.`m_name` ASC";
		} else {
			$sql = "SELECT DISTINCT
					`m`.`m_id`,
				   	CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`
				FROM
				  `tbl_transaction` `t`
				   LEFT JOIN `tbl_medicine` `m`
					ON `m`.`m_id` = `t`.`tr_m_id` WHERE `tr_isdeleted` = '1' AND `tr_location` = '".$location."'
				ORDER BY `m`.`m_name` ASC";
		}
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_balance($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		if ($data['profile'] == 'admin') {
			$sql = "SELECT
								`t`.`tr_location`,
                    CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`), ' [',`m`.`m_pcsper_set`,']s') AS `m_name`,
                    SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) AS `pcsper_set_x_qty`
                FROM
                  `tbl_transaction` `t`
                  LEFT JOIN `tbl_medicine` `m`
                    ON `m`.`m_id` = `t`.`tr_m_id`
                WHERE `t`.`tr_isdeleted` = '1'
                AND `t`.`tr_location` IN ('CHO MAIN','RHU 1','RHU 2','RHU 3','RHU 4','RHU 5','BS 1 - SINDALAN','BS 2 - NORTHVILLE','BS 3 - SAN JOSE','BS 4 - SAN NICOLAS','BS 5 - SAN AGUSTIN','ABTC','ALASAS STORAGE','NORTHVILLE STORAGE','HEMS','SOCIAL HYGIENE','EHSD')

                 GROUP BY `t`.`tr_m_id`, `t`.`tr_location`
                   HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) = 0
                  ORDER BY `t`.`tr_location`,`m`.`m_name` ASC";
		} else {
			$sql = "SELECT
								`t`.`tr_location`,
                    CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`), ' [',`m`.`m_pcsper_set`,']s') AS `m_name`,
                    SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) AS `pcsper_set_x_qty`
                FROM
                  `tbl_transaction` `t`
                  LEFT JOIN `tbl_medicine` `m`
                    ON `m`.`m_id` = `t`.`tr_m_id`
                WHERE `t`.`tr_isdeleted` = '1'
                AND `t`.`tr_location` = '".$location."'
                 GROUP BY `t`.`tr_m_id`, `t`.`tr_location`
                   HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) = 0
                  ORDER BY `t`.`tr_location`,`m`.`m_name` ASC";
		}

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_ajax_get_exp_noti($data) {
		$profile = $data['profile'];
		$location = $data['location'];

		if ($data['profile'] == 'admin') {
			$sql = "SELECT
						`t`.`tr_location`,
					  CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`), ' [',`m`.`m_pcsper_set`,']s') AS `m_name`,
					  `t`.`tr_lot_no`,
					  DATE_FORMAT(`t`.`tr_expiration_date`,'%m/%d/%Y') AS `tr_expiration_date`,
					  `m`.`m_set`,
					  `m`.`m_pcsper_set`,
					  ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`)) AS `pcsper_set_x_qty`,
					ABS(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)) AS `box`,
					ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`)) AS `pcs`
					FROM
					  `tbl_transaction` `t`
					  LEFT JOIN `tbl_medicine` `m`
					    ON `m`.`m_id` = `t`.`tr_m_id`
					WHERE `t`.`tr_isdeleted` = '1' AND CURDATE() > `t`.`tr_expiration_date` AND `t`.`tr_expiration_date` != '00/00/0000'
					GROUP BY `t`.`tr_m_id` ,`t`.`tr_lot_no`
					HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0
					ORDER BY `t`.`tr_location`,`m`.`m_name` ASC";
			} else {
				$sql = "SELECT
							`t`.`tr_location`,
						  CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`), ' [',`m`.`m_pcsper_set`,']s') AS `m_name`,
						  `t`.`tr_lot_no`,
						  DATE_FORMAT(`t`.`tr_expiration_date`,'%m/%d/%Y') AS `tr_expiration_date`,
						  `m`.`m_set`,
						  `m`.`m_pcsper_set`,
						  ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`)) AS `pcsper_set_x_qty`,
						ABS(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)) AS `box`,
						ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`)) AS `pcs`
						FROM
						  `tbl_transaction` `t`
						  LEFT JOIN `tbl_medicine` `m`
						    ON `m`.`m_id` = `t`.`tr_m_id`
						WHERE `t`.`tr_isdeleted` = '1' AND `t`.`tr_location` = '".$location."' AND CURDATE() > `t`.`tr_expiration_date` AND `t`.`tr_expiration_date` != '00/00/0000'
						GROUP BY `t`.`tr_m_id` ,`t`.`tr_lot_no`
						HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0
						ORDER BY `t`.`tr_location`,`m`.`m_name` ASC";
			}
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}


}
