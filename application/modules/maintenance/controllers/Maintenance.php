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

    public function cswd(){
      if(!empty($this->session->userdata('accountId'))){

          $data['title'] = 'Maintenance';
          $data['content'] = 'maintenance/v_services';
          $this->load->view('layouts/v_master', $data);

      }else{
          redirect('account');
      }
    }

    public function get_cswd_services(){
      $officeid = '11'; //cswd id
      $result =  $this->mdl_maintenance->m_get_services($officeid);
      echo json_encode($result);
    }

    public function ajax_save(){
      $serviceID = $this->input->post('serviceID');
      $data['description'] = $this->input->post('description');
      $data['moredetails'] = $this->input->post('moredetails');
      $data['sector']     = $this->input->post('sector');

      if($serviceID == '' || $serviceID == null) {
        $data['officeid']     = '11';
        if($this->mdl_maintenance->m_save($data)){
          $result = array('status' => 'yes', 'content' => 'Success!');
        }else{
          $result = array('status' => 'no', 'content' => 'Failed!');
        }
      }else{
        if($this->mdl_maintenance->m_update($serviceID,$data)){
          $result = array('status' => 'yes', 'content' => 'Success!');
        }else{
          $result = array('status' => 'no', 'content' => 'Failed!');
        }
      }

      echo json_encode($result);
    }

}
