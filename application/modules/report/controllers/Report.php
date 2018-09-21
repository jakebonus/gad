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
      if(!empty($this->session->userdata('accountId'))){

        $data['title'] = 'Report';
        $data['content'] = 'report/v_report';
        $this->load->view('layouts/v_master', $data);

      }else{
          redirect('account');
      }

    }


    public function get_brgyserniorsbygender(){
      $result = $this->mdl_report->m_get_brgyserniorsbygender();
      echo json_encode($result);
    }
    
    public function getTotal_sc(){
        $result = $this->mdl_report->m_getTotal_sc();
        
        foreach ($result as $r){
            
            $result = array('status' => 'yes', 'content' => $r->total);
        }
        
      echo json_encode($result);
    }
    

    public function get_brgypwdbygender(){
      $result = $this->mdl_report->m_count_pwds();
      echo json_encode($result);
    }
    
    
    public function get_countPwd(){
      $result = $this->mdl_report->m_countPwds();
       
      foreach ($result as $r){
                        $result = array('status' => 'yes', 'content' => $r->total);
        }
      echo json_encode($result);
    }

    public function get_brgysoloparentbygender(){
      $result = $this->mdl_report->m_count_soloparent();
      echo json_encode($result);
    }
    
    
    public function get_countSoloParent(){
      $result = $this->mdl_report->m_countSoloParent();
      
      foreach ($result as $r){
                        $result = array('status' => 'yes', 'content' => $r->total);
        }
      echo json_encode($result);
    }

    public function get_count_by_civilstatus(){
      $result = $this->mdl_report->m_count_by_civilstatus();
      echo json_encode($result);
    }

    public function get_countFernandinos(){
      $result = $this->mdl_report->m_get_count_fernandinos();
     
        foreach ($result as $r){
            
            $result = array('status' => 'yes', 'content' => $r->fernandinos);
        }
        
      echo json_encode($result);
    }
    public function get_count_cenior_by_agebracket(){
      $result = $this->mdl_report->m_count_cenior_by_agebracket();
      echo json_encode($result);
    }

    public function get_seniors($id){
      $result = $this->mdl_report->m_get_seniors($id);
      echo json_encode($result);
    }

    public function ajax_tag_scpresident(){
      $brgyid   = $this->input->post('mdl_brgyid');
      $data['scpresident'] = $this->input->post('mdl_masterid');
      if($this->mdl_report->m_tag_scpresident($brgyid,$data)){
        $result = array('status' => 'yes', 'content' => 'Success');
        echo json_encode($result);
      }else{
        $result = array('status' => 'no', 'content' => 'Failed');
        echo json_encode($result);
      }
    }

    public function brgy_organization() {
      if(!empty($this->session->userdata('accountId'))){

        $data['title'] = 'Barangay Organization';
        $data['content'] = 'report/v_organization';
        $this->load->view('layouts/v_master', $data);

      }else{
          redirect('account');
      }

    }

    public function get_organization(){
      $result = $this->mdl_report->m_get_organization();
      echo json_encode($result);
    }

    public function ajax_save_organization(){
      $data['brgyid'] = $this->input->post('mdl_brgy');
      $data['name'] = $this->input->post('mdl_name');
      $data['datefound'] = $this->input->post('mdl_datefound');
      if($this->mdl_report->m_save_organization($data)){
        $result = array('status' => 'yes', 'content' => 'Success');
        echo json_encode($result);
      }else{
        $result = array('status' => 'no', 'content' => 'Failed');
        echo json_encode($result);
      }
    }

    public function get_fernandino($id){
      $result = $this->mdl_report->m_get_fernandino($id);
      echo json_encode($result);
    }

    public function get_orgmembers($orgid){
      $result = $this->mdl_report->m_get_orgmembers($orgid);
      echo json_encode($result);
    }

    public function ajax_del_orgmembers(){
      $orgmemberid = $this->input->post('orgmemberid');
      $data['deleted'] = 'YES';
      if($this->mdl_report->m_del_orgmemebers($orgmemberid,$data)){
        $result = array('status' => 'yes', 'content' => 'Successfully deleted');
        echo json_encode($result);
      }else{
        $result = array('status' => 'no', 'content' => 'Failed to delete');
        echo json_encode($result);
      }
    }

    public function ajax_save_orgmembers(){

        $orgmemberid = $this->input->post('orgmemberid');


        $data['masterid']   = $this->input->post('masterid');

        if($data['masterid'] == ''){
          $data['name']   = strtoupper($this->input->post('membername'));
        }else{
          $data['name']   = strtoupper($this->input->post('name'));
        }
        

        $data['idno']   = $this->input->post('idno');
        $data['designation'] = $this->input->post('designation');
        $data['sector']     = $this->input->post('sector');
        $data['seak']       = $this->input->post('seak');
        $data['strainings'] = $this->input->post('strainings');
        $data['othertrainings'] = $this->input->post('othertrainings');
        $data['production']  = $this->input->post('production');
        $data['marketing']  = $this->input->post('marketing');
        $data['upto']  = $this->input->post('upto');

      if($orgmemberid != null || $orgmemberid != ''){
        //update
        if($this->mdl_report->m_update_orgmembers($orgmemberid,$data)){
          $result = array('status' => 'yes', 'content' => 'Successfully updated');
          echo json_encode($result);
        }else{
          $result = array('status' => 'no', 'content' => 'Failed');
          echo json_encode($result);
        }
      }else{
        // new
        $data['orgid']      = $this->input->post('orgid');
        if($this->mdl_report->m_save_orgmembers($data)){
          $result = array('status' => 'yes', 'content' => 'Success');
          echo json_encode($result);
        }else{
          $result = array('status' => 'no', 'content' => 'Failed');
          echo json_encode($result);
        }
      }

    }


    public function print_organization() {

      if(!empty($this->session->userdata('accountId'))){

        $data['title'] = 'Report';
        $data['content'] = 'report/v_print_organization';
        $this->load->view('layouts/v_master', $data);

      }else{
          redirect('account');
      }

    }

    public function ajax_get_organizationdetails() {

      $a = $this->input->get('id');
      $b = str_replace('On5FEx2CmP','',$a);
      $id = str_replace('vce1Pph3d9','',$b);

      // $data['org'] = $this->mdl_report->m_get_organizationdetails($id);
      $result = $this->mdl_report->m_get_orgmembers($id);
      echo json_encode($result);
    }

    public function ajax_get_orginfo() {

      $a = $this->input->get('id');
      $b = str_replace('On5FEx2CmP','',$a);
      $id = str_replace('vce1Pph3d9','',$b);

      $result = $this->mdl_report->m_get_organizationdetails($id);
      echo json_encode($result);
    }
    

}
