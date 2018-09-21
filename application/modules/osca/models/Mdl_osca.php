<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_osca extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}


	// GET SENIOR ON BRGY BY GENDER
	public function m_get_brgyserniorsbygender(){
		$sql = "SELECT
						 `b`.`brgyname` AS `brgyname`,
						 COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
	           COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`
	          FROM
	            `t_master` `t`
	          INNER JOIN `m_brgy` `b`
	            ON `t`.`brgyid` = `b`.`brgyid`
	            WHERE DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60'
	           GROUP BY  `brgyname`
	           ORDER BY `brgyname` ASC";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	public function m_count_pwds(){
		$sql = "SELECT
		 				`b`.`brgyname` AS `brgyname`,
						COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
						COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`
	          FROM
	            `t_master` `t`
	          INNER JOIN `m_brgy` `b`
	            ON `t`.`brgyid` = `b`.`brgyid`
	            WHERE
							`t`.`sectortag` LIKE '%PWD%'
	           GROUP BY  `brgyname`
	           ORDER BY `brgyname` ASC";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_count_soloparent(){
		$sql = "SELECT
		 				`b`.`brgyname` AS `brgyname`,
						COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
	           COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`
	          FROM
	            `t_master` `t`
	          INNER JOIN `m_brgy` `b`
	            ON `t`.`brgyid` = `b`.`brgyid`
	            WHERE
							`t`.`sectortag` LIKE '%SOLO PARENT%'
	           GROUP BY  `brgyname`
	           ORDER BY `brgyname` ASC";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_count_by_civilstatus(){
		$sql = "SELECT
							`b`.`brgyname` AS `brgyname`,
							COUNT(IF(`t`.`statusid` = '1',`t`.`masterid`,NULL)) AS 'single',
							COUNT(IF(`t`.`statusid` = '2',`t`.`masterid`,NULL)) AS 'married',
							COUNT(IF(`t`.`statusid` = '3',`t`.`masterid`,NULL)) AS 'widow',
							COUNT(IF(`t`.`statusid` = '4',`t`.`masterid`,NULL)) AS 'separated'
						FROM `t_master` `t`
						 INNER JOIN `m_brgy` `b`
							            ON `t`.`brgyid` = `b`.`brgyid`
						GROUP BY  `brgyname`
						ORDER BY `brgyname` ASC";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_count_cenior_by_agebracket(){
		$sql = "SELECT
		 `b`.`brgyid`,
		 `b`.`brgyname` AS `brgyname`,
		 CONCAT(`c`.`lname`,', ',`c`.`fname`,' ',`c`.`mname`) AS `scpresident`,
		 COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60' AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 < '70',
				IF(`t`.`sexid` = '1',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group1male`,

		  COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60' AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 < '70',
				IF(`t`.`sexid` = '2',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group1female`,

		  COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '70' AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 < '80',
				IF(`t`.`sexid` = '1',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group2male`,

		   COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '70' AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 < '80',
				IF(`t`.`sexid` = '2',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group2female`,

		  COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '80' AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 < '90',
				IF(`t`.`sexid` = '1',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group3male`,

		   COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '80' AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 < '90',
				IF(`t`.`sexid` = '2',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group3female`,


		  COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '90',
				IF(`t`.`sexid` = '1',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group4male`,

		   COUNT(
			IF(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '90',
				IF(`t`.`sexid` = '2',
					`t`.`masterid`,
					NULL
				),
				NULL
			)
		) AS `group4female`

	          FROM
	            `t_master` `t`
	          INNER JOIN `m_brgy` `b`
	            ON `t`.`brgyid` = `b`.`brgyid`
							LEFT JOIN `t_master` `c`
							ON `c`.`masterid` = `b`.`scpresident`
	           GROUP BY `brgyname`
	           ORDER BY `brgyname` ASC";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_seniors($brgyid){
		$sql = "SELECT
							`masterid`,
							`idNo`,
							CONCAT(`t`.`lname`,', ',`t`.`fname`,' ',`t`.`mname`) AS `fullname`,
							`b`.`brgyname` AS `Barangay`
					FROM
							`t_master` `t`
						INNER JOIN `m_brgy` `b`
							ON `t`.`brgyid` = `b`.`brgyid`
							WHERE DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60'
							AND
							`t`.`brgyid` = '$brgyid'
							";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_fernandino($brgyid){
		$sql = "SELECT
							`t`.`masterid`,
							`t`.`idNo`,
							`t`.`brgyid`,
							CONCAT(`t`.`lname`,', ',`t`.`fname`,' ',`t`.`mname`) AS `fullname`
					FROM
							`t_master` `t`
							WHERE
							`t`.`brgyid` = '$brgyid'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_tag_scpresident($brgyid,$data){
							$this->db->where('`brgyid`',$brgyid);
		$query = $this->db->update('`m_brgy`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_markdeceased($masterid,$data){
							$this->db->where('`masterid`',$masterid);
		$query = $this->db->update('`t_master`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update_orgmembers($orgmemberid,$data){
							$this->db->where('`id`',$orgmemberid);
		$query = $this->db->update('tbl_orgmembers',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_get_organization(){
		$sql = "SELECT
							`a`.`id`,
							`b`.`brgyid`,
							`b`.`brgyname`,
							`a`.`name`
						FROM `tbl_organizations` `a`
						INNER JOIN `m_brgy` `b` ON
							`b`.`brgyid` =  `a`.`brgyid`
						WHERE `a`.`deleted` = 'NO'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_get_organizationdetails($id){
		$sql = "SELECT
							`a`.`id`,
							DATE_FORMAT(`a`.`datefound`,'%M %l, %Y') AS `date`,
							`b`.`brgyid`,
							`b`.`brgyname`,
							`a`.`name`,
							COUNT(`c`.`id`) AS `totmember`
							FROM `tbl_organizations` `a`
							INNER JOIN `m_brgy` `b` ON
								`b`.`brgyid` =  `a`.`brgyid`
							INNER JOIN `tbl_orgmembers` `c` ON
								`c`.`orgid` = `a`.`id`
							WHERE `a`.`deleted` = 'NO'
								AND `a`.`id` = '$id'
								AND (`c`.`upto` = '1900-01-01' OR `c`.`upto` = '0000-00-00')";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_save_organization($data){
		$query = $this->db->insert('`tbl_organizations`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_save_orgmembers($data){
		$query = $this->db->insert('`tbl_orgmembers`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_get_orgmembers($orgid){
		$sql = "SELECT
						`a`.`id` AS `orgmemberid`,
						`a`.`masterid` AS `masterid`,
						CONCAT(`b`.`lname`,', ',`b`.`fname`,' ',`b`.`mname`) AS `fullname`,
						`b`.`idNo`,
						`a`.`designation`,
						`a`.`sector`,
						`a`.`seak`,
						`a`.`strainings`,
						`a`.`othertrainings`,
						`a`.`production`,
						`a`.`upto`,
						`a`.`marketing`
					FROM
						`tbl_orgmembers` `a`
					INNER JOIN `t_master` `b` ON
						`b`.`masterid` = `a`.`masterid`
					WHERE `a`.`deleted` = 'NO'
					AND `a`.`orgid` = '$orgid'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}
