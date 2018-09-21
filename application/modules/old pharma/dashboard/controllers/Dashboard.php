<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dashboard');
    }

    public function index()
    {
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['title'] = 'Statistics';
            $data['content'] = 'dashboard/v_dashboard';
            $this->load->view('layouts/v_master', $data);
        } else {
            redirect('dashboard/statistics');
        }
    }

    public function bs()
    {
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['title'] = 'Statistics - BS';
            $data['content'] = 'dashboard/v_bs';
            $this->load->view('layouts/v_master', $data);
        } else {
          redirect('account');
        }
    }

    public function other()
    {
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['title'] = 'Statistics';
            $data['content'] = 'dashboard/v_others';
            $this->load->view('layouts/v_master', $data);
        } else {
          redirect('account');
        }
    }

    public function statistics()
    {
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'user') {
            $data['title'] = 'Statistics';
            $data['content'] = 'dashboard/v_rhu';
            $this->load->view('layouts/v_master', $data);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_rhu(){
        if ($this->session->userdata('accountId')) {
            if ($this->session->userdata('profile') == "admin") {
                $data['location'] = $this->input->get('location');
                // $data['location'] = 'CHO MAIN';
            } else {
                $data['location'] = $this->session->userdata('location');
            }
            $result = $this->mdl_dashboard->m_ajax_get_rhu($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_stat_dispense(){
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == "admin") {
            $result = $this->mdl_dashboard->m_ajax_get_stat_dispense();
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }


}


// SELECT YEAR(tr_date),
//   COUNT(CASE WHEN MONTH(tr_date) = '1' THEN tr_date END) AS Jan,
//   COUNT(CASE WHEN MONTH(tr_date) = 2 THEN tr_date END) AS Feb,
//   COUNT(CASE WHEN MONTH(tr_date) = 3 THEN tr_date END) AS Mar,
//   COUNT(CASE WHEN MONTH(tr_date) = 4 THEN tr_date END) AS Apr,
//   COUNT(CASE WHEN MONTH(tr_date) = 5 THEN tr_date END) AS May,
//   COUNT(CASE WHEN MONTH(tr_date) = 6 THEN tr_date END) AS Jun,
//   COUNT(CASE WHEN MONTH(tr_date) = 7 THEN tr_date END) AS Jul,
//   COUNT(CASE WHEN MONTH(tr_date) = 8 THEN tr_date END) AS Aug,
//   COUNT(CASE WHEN MONTH(tr_date) = 9 THEN tr_date END) AS Sep,
//   COUNT(CASE WHEN MONTH(tr_date) = 10 THEN tr_date END) AS October,
//   COUNT(CASE WHEN MONTH(tr_date) = 11 THEN tr_date END) AS Nov,
//   COUNT(CASE WHEN MONTH(tr_date) = 12 THEN tr_date END) AS December
// FROM tbl_transaction
// GROUP BY YEAR(tr_date);
