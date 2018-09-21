<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends MX_Controller
{
    //============ CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_report');
    }

    public function index() {
  		if ($this->session->userdata('accountId')) {
  			$data['title'] = 'Report';
              $data['content'] = 'report/v_index';
              $this->load->view('layouts/v_master', $data);
  		 } else {
  			redirect('account');
  		}
    }

    public function ajax_get_report() {
        if ($this->session->userdata('accountId')) {
            // $data['tr_location'] = $this->input->post('tr_location');
            $data['tr_location'] = ($this->session->userdata('profile') == "admin" ? $this->input->get('tr_location') : $this->session->userdata('location'));
            $data['tr_funding'] = $this->input->get('tr_funding');
            $data['tr_program'] = $this->input->get('tr_program');
            $data['start'] = $this->input->get('start');
            $data['end'] = $this->input->get('end');
            $data['tr_format'] = $this->input->get('tr_format');

            if($this->mdl_report->m_ajax_get_report($data))
            {
                $result = $this->mdl_report->m_ajax_get_report($data);
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
                echo json_encode($result);
            }
        } else {
            redirect('account');
        }
    }

    public function expirationdate() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = 'Expiration Date';
            $data['content'] = 'report/v_expirationdate';
            $this->load->view('layouts/v_master', $data);
         } else {
            redirect('account');
        }
    }

    public function ajax_get_exp_report() {
        if ($this->session->userdata('accountId')) {
            // $data['tr_location'] = $this->input->post('tr_location');
            $data['tr_location'] = ($this->session->userdata('profile') == "admin" ? $this->input->get('tr_location') : $this->session->userdata('location'));
            $data['tr_funding'] = $this->input->get('tr_funding');
            $data['tr_program'] = $this->input->get('tr_program');
            $data['start'] = $this->input->get('start');
            $data['end'] = $this->input->get('end');

            if($this->mdl_report->m_ajax_get_exp_report($data))
            {
                $result = $this->mdl_report->m_ajax_get_exp_report($data);
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
                echo json_encode($result);
            }
        } else {
            redirect('account');
        }
    }

    public function barangay() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = 'Barangay';
            $data['content'] = 'report/v_brgy';
            $this->load->view('layouts/v_master', $data);
         } else {
            redirect('account');
        }
    }

    public function ajax_get_brgy_report() {
        if ($this->session->userdata('accountId')) {
            // $data['tr_location'] = $this->input->post('tr_location');
            $data['tr_location'] = ($this->session->userdata('profile') == "admin" ? $this->input->get('tr_location') : $this->session->userdata('location'));
            $data['tr_funding'] = $this->input->get('tr_funding');
            $data['tr_program'] = $this->input->get('tr_program');
            $data['start'] = $this->input->get('start');
            $data['end'] = $this->input->get('end');

            if($this->mdl_report->m_ajax_get_brgy_report($data))
            {
                $result = $this->mdl_report->m_ajax_get_brgy_report($data);
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
                echo json_encode($result);
            }
        } else {
            redirect('account');
        }
    }

    public function stockcard() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = 'Stock Card';
            $data['content'] = 'report/v_stockcard';
            $this->load->view('layouts/v_master', $data);
         } else {
            redirect('account');
        }
    }

    public function ajax_get_stockcard() {
        if ($this->session->userdata('accountId')) {
            // $data['tr_location'] = $this->input->post('tr_location');
            $data['tr_location'] = ($this->session->userdata('profile') == "admin" ? $this->input->get('tr_location') : $this->session->userdata('location'));
            $data['tr_funding'] = $this->input->get('tr_funding');
            $data['tr_program'] = $this->input->get('tr_program');
            $data['medicine'] = $this->input->get('medicine');

            if($this->mdl_report->m_ajax_get_stockcard($data))
            {
                $result = $this->mdl_report->m_ajax_get_stockcard($data);
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
                echo json_encode($result);
            }
        } else {
            redirect('account');
        }
    }

    //STOCK CARD REPORT
    public function ajax_get_medicine_stockcard(){
        if ($this->session->userdata('accountId')) {
            $data['profile'] = $this->session->userdata('profile');
            $data['location'] = $this->session->userdata('location');
            $result = $this->mdl_report->m_ajax_get_medicine_stockcard($data);
            echo json_encode($result);
        } else {
            redirect('account');
        }
    }

    //BALANCE
    public function ajax_get_balance(){
        if ($this->session->userdata('accountId')) {
          $data['profile'] = $this->session->userdata('profile');
          $data['location'] = $this->session->userdata('location');
          $result = $this->mdl_report->m_ajax_get_balance($data);
          echo json_encode($result);
        } else {
            redirect('account');
        }
    }

    //EXPIRI
    public function ajax_get_exp_noti(){
        if ($this->session->userdata('accountId')) {
          $data['profile'] = $this->session->userdata('profile');
          $data['location'] = $this->session->userdata('location');
          $result = $this->mdl_report->m_ajax_get_exp_noti($data);
          echo json_encode($result);
        } else {
            redirect('account');
        }
    }

}



// SELECT
//     -- `m`.`m_id`,
//     CONCAT(`m`.`m_name`,' ',LOWER(`m`.`m_dosage_form`)) AS `m_name`,
//     -- `m`.`m_therapeutic_use`,
//     -- `m`.`m_dosage_form`,
//     --  `t`.`tr_funding`,
//     -- `t`.`tr_location`,
//     -- `t`.`tr_date`,
//     -- `t`.`tr_type`,
//     -- `m`.`m_set`,
//     -- `m`.`m_pcsper_set`,
//     -- `t`.`tr_brgy`,
//     -- ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`)) AS `pcsper_set_x_qty`,
//     -- ABS(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)) AS `box`,
//     -- ABS(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) -(FLOOR(SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) / `m`.`m_pcsper_set`)*`m`.`m_pcsper_set`)) AS `pcs`

//     SUM(CASE WHEN `t`.`tr_brgy` ='ALASAS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `ALASAS`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='BALITI' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `BALITI`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='BULAON' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `BULAON`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='CALULUT' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `CALULUT`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='DELA PAZ NORTE' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `DELA_PAZ_NORTE`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='DELA PAZ SUR' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `DELA_PAZ_SUR`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='DEL CARMEN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `DEL_CARMEN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='DEL PILAR' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `DEL_PILAR`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='DEL ROSARIO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `DEL_ROSARIO`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='DOLORES' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `DOLORES`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='JULIANA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `JULIANA`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='LARA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `LARA`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='LOURDES' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `LOURDES`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='MAIMPIS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `MAIMPIS`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='MAGLIMAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `MAGLIMAN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='MALPITIC' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `MALPITIC`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='PANDARAS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `PANDARAS`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='PANIPUAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `PANIPUAN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='PULONG BULO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `PULONG_BULO`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='QUEBIAWAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `QUEBIAWAN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAGUIN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAGUIN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAN AGUSTIN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAN_AGUSTIN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAN FELIPE' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAN_FELIPE`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAN ISIDRO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAN_ISIDRO`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAN JOSE' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAN_JOSE`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAN JUAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAN_JUAN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAN NICOLAS' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAN_NICOLAS`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SAN PEDRO CUTUD' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SAN_PEDRO_CUTUD`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SANTA LUCIA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SANTA_LUCIA`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SANTA TERESITA' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SANTA_TERESITA`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SANTO NINO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SANTO_NINO`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SANTO ROSARIO' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SANTO_ROSARIO`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='SINDALAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `SINDALAN`,
//     SUM(CASE WHEN `t`.`tr_brgy` ='TELABASTAGAN' THEN ABS((`t`.`tr_qty` * `t`.`tr_pcsper_set`)) END) AS `TELABASTAGAN`
// FROM
//     `tbl_transaction` `t`
// LEFT JOIN `tbl_medicine` `m`
//     ON `m`.`m_id` = `t`.`tr_m_id`
// WHERE `t`.`tr_isdeleted` = '1'
//     AND `t`.`tr_type` = 'BHS'

// GROUP BY `t`.`tr_m_id` HAVING SUM(`t`.`tr_qty` * `t`.`tr_pcsper_set`) < 0
// ORDER BY `m_name` ASC
