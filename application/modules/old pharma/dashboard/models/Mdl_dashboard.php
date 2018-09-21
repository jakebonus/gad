<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_dashboard extends CI_Model
{
	public function __construct() {
        parent::__construct();
    }

    public function m_ajax_get_rhu($data) {
        $location = $data['location'];
        $sql = "SELECT 
                    -- `m`.`m_id`,
                    `m`.`m_name`,
                      -- `m`.`m_set`,
                      -- `m`.`m_pcsper_set`,
                      --  `t`.`tr_lot_no`,
                      -- DATE_FORMAT(`t`.`tr_expiration_date`,'%m.%d.%y') AS `tr_expiration_date`,
                      --  `t`.`tr_expiration_date`,
                       --  `t`.`tr_program`,
                       --  IFNULL(`t`.`tr_si_no`,'') AS `tr_si_no`,
                       -- IFNULL(`t`.`tr_dr_no`,'') AS `tr_dr_no`,
                       -- IFNULL(`t`.`tr_supplier`,'') AS `tr_supplier`,
                    SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) AS `pcsper_set_x_qty`
                    -- FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`) AS `box`,
                    -- SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`) AS `pcs`
                FROM
                  `tbl_transaction` `t` 
                  LEFT JOIN `tbl_medicine` `m` 
                    ON `m`.`m_id` = `t`.`tr_m_id` 
                WHERE `t`.`tr_isdeleted` = '1'
                AND `t`.`tr_location` = '".$location."'
                
                 GROUP BY `t`.`tr_m_id`
                  -- HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) > 0 
                  ORDER BY `m`.`m_name` ASC";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            return $query->result();            
        } else {
            return false;
        }
    }

    public function m_ajax_get_stat_dispense() {
        $sql = "SELECT
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jan' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_jan`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Feb' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_feb`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Mar' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_mar`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Apr' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_apr`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'May' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_may`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jun' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_jun`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jul' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_jul`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Aug' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_aug`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Sep' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_sep`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Oct' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_oct`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Nov' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_nov`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Dec' && `t`.`tr_location` = 'CHO MAIN') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `cho_dec`,
                  
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jan' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_jan`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Feb' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_feb`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Mar' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_mar`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Apr' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_apr`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'May' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_may`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jun' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_jun`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jul' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_jul`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Aug' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_aug`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Sep' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_sep`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Oct' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_oct`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Nov' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_nov`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Dec' && `t`.`tr_location` = 'RHU 1') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu1_dec`,

                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jan' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_jan`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Feb' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_feb`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Mar' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_mar`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Apr' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_apr`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'May' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_may`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jun' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_jun`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jul' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_jul`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Aug' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_aug`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Sep' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_sep`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Oct' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_oct`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Nov' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_nov`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Dec' && `t`.`tr_location` = 'RHU 2') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu2_dec`,

                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jan' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_jan`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Feb' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_feb`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Mar' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_mar`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Apr' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_apr`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'May' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_may`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jun' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_jun`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jul' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_jul`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Aug' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_aug`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Sep' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_sep`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Oct' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_oct`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Nov' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_nov`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Dec' && `t`.`tr_location` = 'RHU 3') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu3_dec`,

                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jan' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_jan`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Feb' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_feb`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Mar' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_mar`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Apr' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_apr`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'May' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_may`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jun' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_jun`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jul' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_jul`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Aug' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_aug`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Sep' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_sep`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Oct' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_oct`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Nov' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_nov`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Dec' && `t`.`tr_location` = 'RHU 4') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu4_dec`,

                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jan' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_jan`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Feb' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_feb`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Mar' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_mar`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Apr' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_apr`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'May' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_may`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jun' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_jun`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Jul' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_jul`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Aug' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_aug`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Sep' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_sep`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Oct' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_oct`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Nov' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_nov`,
                  ABS(SUM(CASE WHEN (DATE_FORMAT(`t`.`tr_addeddate`, '%b') = 'Dec' && `t`.`tr_location` = 'RHU 5') THEN `t`.`tr_qty` * `t`.`tr_pcsper_set` ELSE 0 END)) AS `rhu5_dec`
                
                FROM
                  `tbl_transaction` `t` 
                WHERE `t`.`tr_isdeleted` = '1' AND `t`.`tr_type` IS NOT NULL
                HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) < 0";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            return $query->result();            
        } else {
            return false;
        }
    }
}
