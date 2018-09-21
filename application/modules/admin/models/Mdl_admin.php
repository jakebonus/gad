<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_admin extends CI_Model {

	public function __construct() {
		parent::__construct();
		// $ci = &get_instance();
		// $this->db_access = $ci->load->database('db_access', TRUE);
	}

		// GET SENIOR LIST
		public function m_get_seniorlist($data){
			$sql = "SELECT
						`masterid`,
						`idNo`,
						CONCAT(`t`.`lname`,', ',`t`.`mname`,' ',`t`.`fname`) AS `fullname`,
						`s`.`name` AS `Sex`,
						DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 AS `Age`,
						`t`.`lotblk` AS `Lot/Blk`,
						`t`.`street` AS `Street`,
						`t`.`subdivision` AS `Subdivision`,
						`t`.`purok` AS `Purok`,
						 `b`.`brgyname` AS `Barangay`
		          FROM
		            `t_master` `t`
		          INNER JOIN `m_brgy` `b`
		            ON `t`.`brgyid` = `b`.`brgyid`
		            INNER JOIN `m_sex` `s`
		            ON `t`.`sexid` = `s`.`sexid`
		            -- WHERE DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60'
		            WHERE `t`.`sector` = 'SENIOR CITIZEN'";

			if($data['ftr_gender'] != 'ALL'){
					 $sql .=  "  AND `t`.`sexid` = '".$data['ftr_gender']."'";
			}

			if($data['ftr_brgy'] != 'ALL'){
					 $sql .=  "  AND `t`.`brgyid` = '".$data['ftr_brgy']."'";
			}

			if($data['ftr_agefrom'] != 'ALL' && $data['ftr_ageto'] != 'ALL'){
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) BETWEEN '".$data['ftr_agefrom']."' AND '".$data['ftr_ageto']."'";
			}elseif ($data['ftr_agefrom'] != 'ALL' && $data['ftr_ageto'] == 'ALL') {
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= '".$data['ftr_agefrom']."'";
			}elseif ($data['ftr_agefrom'] == 'ALL' && $data['ftr_ageto'] != 'ALL') {
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) <= '".$data['ftr_ageto']."'";
			}

			if($data['ftr_seniorid'] != 'ALL'){
					 $sql .=  "  AND `t`.`seniorctrlno` = '".$data['ftr_seniorid']."'";
			}

		  $sql .=  " ORDER BY `brgyname` ASC";

			$query = $this->db->query($sql);
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		// GET PWD LIST
		public function m_get_pwdlist($data){
			$sql = "

                            SELECT  `t`.`masterid`,
                                    `t`.`idNo`,
                                    `t`.`pwdnum`,
                                    `t`.`lname`,
                                    `t`.`mname`,
                                    `t`.`fname`,
                                    DATE_FORMAT(`t`.`birthdate`, '%Y-%m-%d') as `birthdate`,
                                    `t`.`disabilitytype`,
                                    `t`.`disabilitydesc`,
                                    `e`.`educname`,
                                    `t`.`occupation`,
                                    `t`.`contactname`,
                                    `t`.`contactrel`,
                                    `t`.`contactno`,
                                    CONCAT(COALESCE(`t`.`lotblk`,''),' ',COALESCE(`t`.`street`,''),' ',COALESCE('PUROK ',`t`.`purok`,''),' ',COALESCE(`t`.`subdivision`,'')) AS `address`,
                                    CONCAT(`t`.`lname`,', ',`t`.`mname`,' ',`t`.`fname`) AS `fullname`,
                                    `s`.`name` AS `Sex`,
                                    `cs`.`name` AS `civilstatus`,
                                    DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 AS `Age`,
                                    `t`.`lotblk` AS `Lot/Blk`,
                                    `t`.`street` AS `Street`,
                                    `t`.`subdivision` AS `Subdivision`,
                                    `t`.`purok` AS `Purok`,
                                    DATE_FORMAT(`t`.`pwdnumdate`,'%Y') AS `year`,
                                     DATE_FORMAT(`sa`.`dateavailed`,'%Y') AS `renew`,
                                     `t`.`philhealthnum`,
                                     `b`.`brgyname` AS `Barangay`
		          FROM
		            `t_master` `t`
		          INNER JOIN `m_brgy` `b`
		            ON `t`.`brgyid` = `b`.`brgyid`
		            INNER JOIN `m_sex` `s`
                                ON `t`.`sexid` = `s`.`sexid`
		            INNER JOIN `m_status` `cs`
                                ON `t`.`statusid` = `cs`.`statusid`
		           
		            INNER JOIN `m_educ` `e`
		            ON `t`.`educid` = `e`.`educid`
                            
                            LEFT JOIN (SELECT `said`,`servicename`,`masterid`,MAX(`dateavailed`) AS `dateavailed` 
				FROM 
					`tbl_serviceavailed` 
				WHERE 
					`deleted` = 'NO' 
                                  AND `servicename` = 'PWD ID'
				GROUP BY 
					`masterid`
				) AS `sa` 
				
                            ON `t`.`masterid` = `sa`.`masterid`
                        

		            WHERE
				`t`.`sector` = 'PWD'";

			if($data['ftr_gender'] != 'ALL'){
					 $sql .=  "  AND `t`.`sexid` = '".$data['ftr_gender']."'";
			}

			if($data['ftr_brgy'] != 'ALL'){
					 $sql .=  "  AND `t`.`brgyid` = '".$data['ftr_brgy']."'";
			}

			if($data['ftr_agefrom'] != 'ALL' && $data['ftr_ageto'] != 'ALL'){
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) BETWEEN '".$data['ftr_agefrom']."' AND '".$data['ftr_ageto']."'";
			}elseif ($data['ftr_agefrom'] != 'ALL' && $data['ftr_ageto'] == 'ALL') {
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= '".$data['ftr_agefrom']."'";
			}elseif ($data['ftr_agefrom'] == 'ALL' && $data['ftr_ageto'] != 'ALL') {
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) <= '".$data['ftr_ageto']."'";
			}

			if($data['ftr_idno'] != 'ALL'){
					 $sql .=  "  AND `t`.`idNo` = '".$data['ftr_idno']."'";
			}
                        
                        
			if($data['ftr_pwdnum'] != 'ALL'){
					 $sql .=  "  AND `t`.`pwdnum` = '".$data['ftr_pwdnum']."'";
			}

		  $sql .=  " ORDER BY `brgyname` ASC";

			$query = $this->db->query($sql);
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}

		// GET SOLOPARENT LIST
		public function m_get_soloparentlist($data){
			$sql = "SELECT
						`masterid`,
						`idNo`,
						CONCAT(`t`.`lname`,', ',`t`.`mname`,' ',`t`.`fname`) AS `fullname`,
						`s`.`name` AS `Sex`,
						DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 AS `Age`,
						`t`.`lotblk` AS `Lot/Blk`,
						`t`.`street` AS `Street`,
						`t`.`subdivision` AS `Subdivision`,
						`t`.`purok` AS `Purok`,
						`b`.`brgyname` AS `Barangay`,
						`t`.`soloparentnum`,
						`c`.`name` AS `civilstatus`,
						date(`t`.`birthdate`) AS `birthdate`,
						`t`.`spreason`
		          FROM
		            `t_master` `t`
		          INNER JOIN `m_brgy` `b`
		            ON `t`.`brgyid` = `b`.`brgyid`
							INNER JOIN `m_status` `c`
			           ON `c`.`statusid` = `t`.`statusid`
		          INNER JOIN `m_sex` `s`
		            ON `t`.`sexid` = `s`.`sexid`
		            -- WHERE
								-- 		`t`.`sectortag` LIKE '%SOLO PARENT%'
								 WHERE `t`.`sector` = 'SOLO PARENT'";

			if($data['ftr_gender'] != 'ALL'){
					 $sql .=  "  AND `t`.`sexid` = '".$data['ftr_gender']."'";
			}

			if($data['ftr_brgy'] != 'ALL'){
					 $sql .=  "  AND `t`.`brgyid` = '".$data['ftr_brgy']."'";
			}

			if($data['ftr_agefrom'] != 'ALL' && $data['ftr_ageto'] != 'ALL'){
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) BETWEEN '".$data['ftr_agefrom']."' AND '".$data['ftr_ageto']."'";
			}elseif ($data['ftr_agefrom'] != 'ALL' && $data['ftr_ageto'] == 'ALL') {
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= '".$data['ftr_agefrom']."'";
			}elseif ($data['ftr_agefrom'] == 'ALL' && $data['ftr_ageto'] != 'ALL') {
				$sql .=	" AND FLOOR(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) <= '".$data['ftr_ageto']."'";
			}

			if($data['ftr_idno'] != 'ALL'){
					 $sql .=  "  AND `t`.`idNo` = '".$data['ftr_idno']."'";
			}

		  $sql .=  " ORDER BY `brgyname` ASC";

			$query = $this->db->query($sql);
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}


	public function m_count_senior_citizens(){
		$sql = "SELECT
						 `b`.`brgyname` AS `brgyname`,
						 	CASE `t`.`sexid`
								WHEN '1' THEN
									COUNT( `t`.`masterid`)
							END AS `male`,
						 	CASE `t`.`sexid`
								WHEN '2' THEN
									COUNT( `t`.`masterid`)
							END AS `female`
					    FROM
					      `t_master` `t`
					    INNER JOIN `m_brgy` `b`
					    	ON `t`.`brgyid` = `b`.`brgyid`
					    WHERE DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60'
					    	GROUP BY  `sexid`,`brgyname`
					    	ORDER BY `brgyname` ASC";

		$query = $this->input->post($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_count_pwds(){
		$sql = "SELECT
		 				`b`.`brgyname` AS `brgyname`,
	           COUNT( `t`.`masterid`)  AS `count`
	          FROM
	            `t_master` `t`
	          INNER JOIN `m_brgy` `b`
	            ON `t`.`brgyid` = `b`.`brgyid`
	            WHERE
							`t`.`sector` = 'PWD'
	           GROUP BY  `brgyname`
	           ORDER BY `brgyname` ASC";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	// tag on sector
	public function m_tag_fernandino($data){

				$masterid 	= $data['masterid'];
				$sectortag 	= $data['sectortag'];
				$specify 		= $data['specify'];
				

				if($data['sectortag'] == 'SOLO PARENT'){
					$sp['masterid'] = $data['masterid'];
					$sp['name'] 		= $data['name'];
					$sp['relation'] = $data['relation'];
					$sp['bdate'] 		= $data['bdate'];
				}

				if($data['sectortag'] == 'PWD'){
					$tc_name 				= $data['name'];
					$tc_tin				= $data['tin'];
					$tc_contactnum 	= $data['contactnum'];
				}

		if($sectortag == 'PWD'){
                    
                    $disabilitydesc = $data['disabilitydesc'];
                    $pwdnumdate = $data['pwdnumdate'];
                    
			$sql_get_brgycode = "SELECT
                                            LPAD(`b`.`pwdbrgycode`,3,0) AS pwdbrgycode
                                            FROM `t_master` `a`
                                            INNER JOIN `m_brgy` `b` ON
						`a`.`brgyid` = `b`.`brgyid`
                                            WHERE `a`.`masterid` = '$masterid'";
			$query_get_brgycode = $this->db->query($sql_get_brgycode);
			$brgycode = $query_get_brgycode->result();
			$pwdbrgycode = $brgycode[0]->pwdbrgycode;

			$sql_get_series = "SELECT
                                        	IF(LPAD(MAX(SUBSTRING_INDEX(SUBSTRING_INDEX(`a`.`pwdnum`, '-', 4),'-',-1)) + 1,4,0) IS NULL,'0001',LPAD(MAX(SUBSTRING_INDEX(SUBSTRING_INDEX(`a`.`pwdnum`, '-', 4),'-',-1)) + 1,4,0)) AS pwdnum
                                            FROM `t_master` `a`
                                            WHERE
					SUBSTRING_INDEX(SUBSTRING_INDEX(`a`.`pwdnum`, '-', 3),'-',-1) = '$pwdbrgycode'";
			$query_get_series = $this->db->query($sql_get_series);
			$series = $query_get_series->result();
			$pwdnum = $series[0]->pwdnum;
			$a = '03-5416-'.$pwdbrgycode.'-'.$pwdnum;
//                        `a`.`pwdnum` = '$a',
			$sql = "UPDATE `t_master` `a`
                                    SET
                                        `a`.`sector` = '$sectortag',
                                         `a`.`pwdnum` =  IF(`a`.`pwdnum` IS NULL OR `a`.`pwdnum` = '',  '$a',  `a`.`pwdnum`),
					
					`a`.`pwdnumdate` = '$pwdnumdate',
					`a`.`disabilitydesc` = '$disabilitydesc',
					`a`.`disabilitytype` = '$specify',
					`a`.`tc_name` = '$tc_name',
					`a`.`tc_tin` = '$tc_tin',
					`a`.`tc_contactnum` = '$tc_contactnum'
				WHERE `masterid` = '$masterid'";
						// SET `sectortag` = IF(`sectortag` LIKE '%$sectortag%',`sectortag`, CONCAT(`sectortag`,',','$sectortag')),
			$query = $this->db->query($sql);
			$arr_num =array("num"=>"$a");


			$sql_get_details = "SELECT
						`sector`,
						`pwdnum`,
						`soloparentnum`,
						`seniorctrlno`
                                    	FROM `t_master`
					WHERE `masterid` = '$masterid'";
				$query_get_details =  $this->db->query($sql_get_details);

			if($query && $query_get_details->num_rows() == 1){
				return $query_get_details->result();
			}else{
				return false;
			}
		}

		if($sectortag == 'SOLO PARENT'){
                    
                    $soloparentnumdate =  $data['soloparentnumdate'];
                    
			$sql_get_series = "SELECT
                                    	LPAD(MAX(SUBSTRING_INDEX(SUBSTRING_INDEX(`a`.`soloparentnum`, '-', 3),'-',-1)) + 1,3,0) AS `soloparentnum`
					FROM `t_master` `a`
					WHERE
						SUBSTRING_INDEX(SUBSTRING_INDEX(`a`.`soloparentnum`, '-', 1),'-',-1) = YEAR(CURDATE())";
			$query_get_series = $this->db->query($sql_get_series);
			$series = $query_get_series->result();
			$soloparentnum = $series[0]->soloparentnum;
			$a = date('Y').'-'.$soloparentnum;
			$sql = "UPDATE `t_master` `a`
				SET
                                        `a`.`sector` = '$sectortag',
                                        `a`.`soloparentnumdate` = '$soloparentnumdate',
                                        `a`.`soloparentnum` =  IF(`a`.`soloparentnum` IS NULL OR `a`.`soloparentnum` = '', '$a',  `a`.`soloparentnum`),
					`a`.`spreason` = '$specify'
							WHERE `masterid` = '$masterid'";
			$query = $this->db->query($sql);
			$arr_num =array("num"=>"$a");

			$query_insert_dependents = $this->db->insert('`tbl_dependents`',$sp);


					$sql_get_details = "SELECT
							`sector`,
							`pwdnum`,
							`soloparentnum`,
							`seniorctrlno`
							FROM `t_master`
							WHERE `masterid` = '$masterid'";
						$query_get_details =  $this->db->query($sql_get_details);


			if($query && $query_get_details->num_rows() == 1 && $query_insert_dependents){
				return $query_get_details->result();
			}else{
				return false;
			}
		}
	}

	public function m_ajax_get_fernandino($data) {

		$search 	= $data['txt_search'];
		$in 			= $data['txt_in'];
		$from 		= $data['txt_brgy'];
		$gender 	= $data['gender'];
		$sector 	= strtolower($data['sector']);

		$sql = 'SELECT
	            `t`.`masterid`,
	            `t`.`idNo`,
	            `t`.`lname`,
	            `t`.`fname`,
	            `t`.`mname`,
                    `t`.`sector`,
                    `t`.`sectortag`,
                    `t`.`pwdnum`,
                    `t`.`soloparentnum`,
                    `t`.`seniorctrlno`,
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
						// $sql .=" AND DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365 >= '60'";
						$sql .=" AND `sector` = '".$sector."'";
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

	public function m_get_service($servicetype) {

		$sql = "SELECT
						*
						FROM `m_services`
						WHERE `officeid` = '11'
						AND `sector` = '$servicetype'";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_serviceavailed($masterid) {

		$sql = "SELECT
						CONCAT(`b`.`lname`,', ',`b`.`fname`,' ',`b`.`mname`) AS fullname,
						`said`,
						`c`.`description` AS `service`,
						`c`.`sector` AS `sector`,
						`a`.`remarks`,
						`a`.`dateavailed`
					FROM `tbl_serviceavailed` `a`
					INNER JOIN	`t_master` `b` ON
						`b`.`masterid` = `a`.`masterid`
					INNER JOIN `m_services` `c` ON
						`c`.`serviceID` = `a`.`serviceid`
					WHERE
						`a`.`deleted` = 'NO'
						AND
						`a`.`masterid` = '$masterid'";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_get_depende($id,$type) {

		if($type == 'SOLO%20PARENT'){
			$sql = "SELECT
							`name` AS `fullname`,
							CONCAT(`relation`,' - ',DATEDIFF(CURRENT_DATE, STR_TO_DATE(`bdate`, '%Y-%m-%d'))/365) AS details
						FROM `tbl_dependents`
						WHERE
							`deleted` = 'NO'
							AND
							`masterid` = '$id'";
		}

		if($type == 'PWD'){
			$sql = "SELECT
							`tc_name` AS `fullname`,
							CONCAT(`tc_tin`,' - ',`tc_contactnum`) AS details
						FROM `t_master`
						WHERE
							`masterid` = '$id'";
		}

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}

	public function m_save_serviceavailed($data) {
                $sql =  "SELECT `sector`,
                                `description` 
                        FROM 
                            `m_services` 
                        WHERE `serviceID` = '".$data['serviceid']."'";
                
                
                $getServiceDetails = $this->db->query($sql);
                
                
//                print_r($getServiceDetails);
                foreach($getServiceDetails->result() as $a){
                    $data['servicesector'] = $a->sector;
                    $data['servicename'] = $a->description;
                    
                }
                
                
		$query = $this->db->insert('`tbl_serviceavailed`',$data);
		// $query = $this->db->query($sql);
		if($query)
		{
			return true;
		} else {
			return false;
		}
	}

	public function m_get_fernandino_info($masterid) {
		$sql = "SELECT
						`a`.`idNo` as `idno`,
						`a`.`pwdnum`,
						`a`.`soloparentnum`,
						`a`.`sector`,
						CONCAT(`a`.`lname`,', ',`a`.`fname`,' ',IF(`a`.`mname` IS NULL,'',`a`.`mname`)) AS `fullname`,
						CONCAT(`a`.`lotblk`,' ',`a`.`street`,' ',`a`.`purok`,' ',`a`.`subdivision`,`b`.`brgyname`) AS `address`,
						`a`.`disabilitytype`,
						DATE_FORMAT(`a`.`birthdate`,'%c/%e/%Y') AS `birthdate`,
						`a`.`bloodtype`,
						`a`.`contactname`,
						`a`.`contactno`,
						`a`.`tc_name`,
						`a`.`tc_tin`,
						`a`.`tc_contactnum`,
						`c`.`name` as `gender`
		 				FROM `t_master` `a`
						INNER JOIN `m_brgy` `b` ON
							`a`.`brgyid` = `b`.`brgyid`
						INNER JOIN `m_sex` `c` ON
							`a`.`sexid` = `c`.`sexid`
						WHERE `a`.`masterid` = '$masterid'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
        
        public function m_getPWDYearIssue(){
            
            $sql = "SELECT
                        IF(DATE_FORMAT(`t`.`pwdnumdate`,'%Y') = '1900','Blank',DATE_FORMAT(`t`.`pwdnumdate`,'%Y'))AS `yearissue`,
                        COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
                         COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`,
			COUNT( `t`.`masterid`) AS `total`				
                        FROM `t_master` `t`
                        INNER JOIN `m_brgy` `b`
                                                                        ON `t`.`brgyid` = `b`.`brgyid`
                        WHERE `t`.`isdeleted` = 'no' AND `sector` = 'PWD'
                        GROUP BY DATE_FORMAT(`t`.`pwdnumdate`,'%Y')";
            $query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
            
        }
        
        public function m_getPWDByCivilStatus(){
            
            $sql = "SELECT
                        `s`.`name` AS `civilstatus`,
                        COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
	           COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`,
			COUNT( `t`.`masterid`) AS `total`				
                        FROM `t_master` `t`
                        INNER JOIN `m_brgy` `b`
			ON `t`.`brgyid` = `b`.`brgyid`
		INNER JOIN `m_status` `s`
			ON `t`.`statusid` = `s`.`statusid`
                        WHERE `t`.`isdeleted` = 'no' AND `sector` = 'PWD'
                        GROUP BY `s`.`name`";
            $query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
            
        }

          
        public function m_getPWDByDisabilityType(){
            
            $sql = "SELECT
                            `t`.`disabilitytype`,
                            COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
                                      COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`,

                           COUNT( `t`.`masterid`) AS `total`				
                   FROM `t_master` `t`
                   WHERE `t`.`isdeleted` = 'no' AND `sector` = 'PWD'
                   GROUP BY `t`.`disabilitytype`";
            $query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
            
        }
          
        public function m_getPWDByAgeBracket(){
            
            $sql = "SELECT

	COUNT(IF(
			(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) < 10 ,
			`t`.`masterid`,
		NULL)
	 )AS `10below`,

	COUNT(IF(
			(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= 10 
		AND 	(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) <= 19,
			`t`.`masterid`,
		NULL)
	 )AS `10-19`,

	 COUNT(IF(
			(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= 20 
		AND 	(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) <= 29,
			`t`.`masterid`,
		NULL)
	 )AS `20-29`,
	 
	COUNT(IF(
			(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365)  >= 30 
		AND 	(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365)  <= 39,
			`t`.`masterid`,
		NULL)
	 )AS `30-39`,
	 
	COUNT(IF(
			(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= 40
		AND 	(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) <= 49,
			`t`.`masterid`,
		NULL)
	 )AS `40-49`,
	 
	 COUNT(IF(
			(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= 50
		AND 	(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) <= 59,
			`t`.`masterid`,
		NULL)
	 )AS `50-59`,

	 
	COUNT(IF(
			(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`t`.`birthdate`, '%Y-%m-%d'))/365) >= 60 ,
			`t`.`masterid`,
		NULL)
	 )AS `sc`

FROM `t_master` `t`
WHERE `t`.`isdeleted` = 'no' AND `sector` = 'PWD'";
            $query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
            
        }
        
        public function m_getSPPerBrgy(){
            $sql = "SELECT
                        `b`.`brgyname` AS `brgyname`,
                        COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
                        COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`,
                          (COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL))+COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL))) AS `total`        
                 FROM
                        `t_master` `t`
                 INNER JOIN `m_brgy` `b`
                         ON `t`.`brgyid` = `b`.`brgyid`
                WHERE
                        `t`.`sector` = 'SOLO PARENT'
                GROUP BY  `brgyname`
                ORDER BY `brgyname` ASC";    
            
            $query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
        }
        
         public function m_getSPYearIssue(){
            
            $sql = "SELECT
                        IF(DATE_FORMAT(`t`.`soloparentnumdate`,'%Y') = '1900','Blank',DATE_FORMAT(`t`.`soloparentnumdate`,'%Y'))AS `yearissue`,
                        COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
                         COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`,
			COUNT( `t`.`masterid`) AS `total`				
                        FROM `t_master` `t`
                        INNER JOIN `m_brgy` `b`
                                ON `t`.`brgyid` = `b`.`brgyid`
                        WHERE `t`.`isdeleted` = 'no' AND `sector` = 'SOLO PARENT'
                        GROUP BY DATE_FORMAT(`t`.`soloparentnumdate`,'%Y')";
            $query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
            
        }
        
                
        public function m_getSPByCause(){
            
            $sql = "SELECT
                            `t`.`spreason`,
                            COUNT(IF(`t`.`sexid` = '1',`t`.`masterid`,NULL)) AS `male`,
                                      COUNT(IF(`t`.`sexid` = '2',`t`.`masterid`,NULL)) AS `female`,

                           COUNT( `t`.`masterid`) AS `total`				
                   FROM `t_master` `t`
                   WHERE `t`.`isdeleted` = 'no' AND `sector` = 'SOLO PARENT'
                   GROUP BY `t`.`spreason`";
            $query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
            
        }
}
