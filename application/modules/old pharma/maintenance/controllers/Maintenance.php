<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Maintenance extends MX_Controller
{
    //============ CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_maintenance');
    }

    public function index() {
        // if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['title'] = 'Transaction list';
            $data['content'] = 'maintenance/v_index';
            $this->load->view('layouts/v_master', $data);
        // } else {
        //     redirect('account');
        // }
    }

    // GET TRANSACTION RECORDS
    public function ajax_get_all_transaction(){
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['start'] = $this->input->get('start');
            $data['end'] = $this->input->get('end');
            $data['tr_risno'] = $this->input->get('tr_risno');
            $data['m_name'] = $this->input->get('m_name');
            $data['tr_brgy'] = $this->input->get('tr_brgy');
            $data['t_risno'] = $this->input->get('t_risno');
            if ($result = $this->mdl_maintenance->m_ajax_get_all_transaction($data)) {
              // $result = array('status' => 'yes', 'content' => $result);
              echo json_encode($result);
            } else {
      				$result = array('status' => 'no', 'content' => 'No record found!');
      				echo json_encode($result);
      			}
        } else {
            redirect('account');
        }
    }

    public function ajax_get_all_trans_brgy(){
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            if ($result = $this->mdl_maintenance->m_ajax_get_all_trans_brgy()) {
              // $result = array('status' => 'yes', 'content' => $result);
              echo json_encode($result);
            } else {
      				$result = array('status' => 'no', 'content' => 'No record found!');
      				echo json_encode($result);
      			}
        } else {
            redirect('account');
        }
    }

    //DELETE AJAX
    public function ajax_tdelete() {
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data1['delpassword'] =  $this->input->post('delpassword');

            $data = array(
                'tr_isdeleted'    => '0',
                'tr_id'           => $this->input->post('tr_id'),
                'tr_deletedby'    => $this->session->userdata('accountId'),
                'tr_deleteddate'  => date('Y-m-d H:i:s'),
            );

            if ($this->session->userdata('password') == sha1(md5($data1['delpassword']. 'c[x]t!@n[*]{7hndv}'))) {
              if($this->mdl_maintenance->m_ajax_tedit($data))
              {
                  $result = array('status' => 'yes','content'=> 'Deleted Successfully!');
                  echo json_encode($result);
                  exit();
              } else {
                  $result = array('status' => 'no','content'=> 'Failed to delete. Please try again!');
                  echo json_encode($result);
                  exit();
              }
            } else {
              $result = array('status' => 'no','content'=> 'Invalid Password!');
              echo json_encode($result);
              exit();
            }

        } else {
            redirect('account');
        }
    }

}
