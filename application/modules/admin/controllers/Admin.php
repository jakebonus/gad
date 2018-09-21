<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MX_Controller
{
    //============ CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_admin');
    }

    public function index() {
        if(!empty($this->session->userdata('accountId'))){
          $data['title'] = 'Masterlist';
          $data['content'] = 'admin/v_masterlist';
          $this->load->view('layouts/v_master', $data);

        }else{
          redirect('account');
        }
    }

    public function ajax_get_fernandino(){
            $data['txt_search'] = $this->input->get('txt_search');
            $data['txt_in'] = $this->input->get('txt_in');
            $data['txt_brgy'] = $this->input->get('txt_brgy');
            $data['gender'] = $this->input->get('gender');
            $data['sector'] = $this->input->get('sector');
            $result = $this->mdl_admin->m_ajax_get_fernandino($data);
            echo json_encode($result);
    }

    public function ajax_tag_fernandino(){
        
            $data['masterid'] = $this->input->post('masterid');
            $data['sectortag'] = $this->input->post('sectortag');
            $data['specify'] = $this->input->post('specify');

            if($data['sectortag'] == 'SOLO PARENT'){
              $data['soloparentnumdate'] =  $this->input->post('soloparentnumdate');
              
              $data['name'] = $this->input->post('name');
              $data['relation'] = $this->input->post('relation');
              $data['bdate'] = $this->input->post('bdate');
            }

            if($data['sectortag'] == 'PWD'){
              $data['pwdnumdate'] =$this->input->post('pwdnumdate');
              $data['name'] = $this->input->post('name');
              $data['tin'] = $this->input->post('tin');
              $data['contactnum'] = $this->input->post('contactnum');
              $data['disabilitydesc'] = $this->input->post('disabilitydesc');
            }
            
            if($result = $this->mdl_admin->m_tag_fernandino($data)){
                foreach($result as $r){
                    $pwdnum = $r->pwdnum;
                    $sectortag = $r->sector;
                    $soloparentnum = $r->soloparentnum;
                    $seniorctrlno = $r->seniorctrlno;
                }
              // $num = $arr_pwdnum['num'];
              $result = array('status' => 'yes',
                              'content' => 'Tagged as '.$data['sectortag'],
                              'pwdnum' => $pwdnum,
                              'sectortag' => $sectortag,
                              'soloparentnum' => $soloparentnum,
                              'seniorctrlno' => $seniorctrlno);
            }else{
              $result = array('status' => 'no', 'content' => 'Failed to tag as '.$data['sectortag']);
            }
            echo json_encode($result);
       }


        public function seniorlist() {
          if(!empty($this->session->userdata('accountId'))){
                $data['title'] = 'Services';
                $data['content'] = 'admin/v_seniorlist';
                $this->load->view('layouts/v_master', $data);
          }else{
            redirect('account');
          }
        }

        public function get_seniorlist(){

          $data['ftr_gender']   = $this->input->get('ftr_gender');
          $data['ftr_brgy']     = $this->input->get('ftr_brgy');
          if($this->input->get('ftr_agefrom') == ''){
              $data['ftr_agefrom']  = 'ALL';
          }else{
              $data['ftr_agefrom']  = $this->input->get('ftr_agefrom');
          }
          if($this->input->get('ftr_ageto') == ''){
              $data['ftr_ageto']  = 'ALL';
          }else{
              $data['ftr_ageto']  = $this->input->get('ftr_ageto');
          }
          if($this->input->get('ftr_seniorid') == ''){
              $data['ftr_seniorid']  = 'ALL';
          }else{
              $data['ftr_seniorid']  = $this->input->get('ftr_seniorid');
          }

          $result = $this->mdl_admin->m_get_seniorlist($data);
          echo json_encode($result);
        }

        public function get_sernior_service(){
          $servicetype = 'SENIOR CITIZEN';
          $result = $this->mdl_admin->m_get_service($servicetype);
          echo json_encode($result);
        }

        public function get_serviceavailed($masterid){
          // $masterid = $this->input->get('masterid');
          $result = $this->mdl_admin->m_get_serviceavailed($masterid);
          echo json_encode($result);
        }

        public function save_serviceavailed(){
            
//          $data['servicesector']  = $this->input->post('servicesector');
          $data['serviceid'] = $this->input->post('serviceid');
          $data['masterid'] = $this->input->post('masterid');
          $data['dateavailed'] = $this->input->post('dateavailed');
          $data['remarks'] = $this->input->post('remarks');
          
          
          $data['datesave'] = date('Y-m-d');
          $data['saveby'] = $this->session->userdata('accountId');

          if($this->mdl_admin->m_save_serviceavailed($data)){
            $result = array('status' => 'yes', 'content' => 'Success');
          }else{
            $result = array('status' => 'no', 'content' => 'Failed');
          }
          echo json_encode($result);
        }

        public function pwdlist() {
          if(!empty($this->session->userdata('accountId'))){

                $data['title'] = 'Services';
                $data['content'] = 'admin/v_pwdlist';
                $this->load->view('layouts/v_master', $data);
              }else{
                redirect('account');
              }
        }

        public function get_pwdlist(){

          $data['ftr_gender']   = $this->input->get('ftr_gender');
          $data['ftr_brgy']     = $this->input->get('ftr_brgy');
          if($this->input->get('ftr_agefrom') == ''){
              $data['ftr_agefrom']  = 'ALL';
          }else{
              $data['ftr_agefrom']  = $this->input->get('ftr_agefrom');
          }
          if($this->input->get('ftr_ageto') == ''){
              $data['ftr_ageto']  = 'ALL';
          }else{
              $data['ftr_ageto']  = $this->input->get('ftr_ageto');
          }
          
          if($this->input->get('ftr_idno') == ''){
              $data['ftr_idno']  = 'ALL';
          }else{
              $data['ftr_idno']  = $this->input->get('ftr_idno');
          }
          
          if($this->input->get('ftr_pwdnum') == ''){
              $data['ftr_pwdnum']  = 'ALL';
          }else{
              $data['ftr_pwdnum']  = $this->input->get('ftr_pwdnum');
          }

          $result = $this->mdl_admin->m_get_pwdlist($data);
          echo json_encode($result);
        }

        public function get_pwd_service(){
          $servicetype = 'PWD';
          $result = $this->mdl_admin->m_get_service($servicetype);
          echo json_encode($result);
        }


        public function soloparentlist() {
          if(!empty($this->session->userdata('accountId'))){

            $data['title'] = 'Services';
            $data['content'] = 'admin/v_soloparentlist';
            $this->load->view('layouts/v_master', $data);

          }else{
            redirect('account');
          }
        }

        public function get_soloparentlist(){

          $data['ftr_gender']   = $this->input->get('ftr_gender');
          $data['ftr_brgy']     = $this->input->get('ftr_brgy');
          if($this->input->get('ftr_agefrom') == ''){
              $data['ftr_agefrom']  = 'ALL';
          }else{
              $data['ftr_agefrom']  = $this->input->get('ftr_agefrom');
          }
          if($this->input->get('ftr_ageto') == ''){
                      $data['ftr_ageto']  = 'ALL';
          }else{
              $data['ftr_ageto']  = $this->input->get('ftr_ageto');
          }
          if($this->input->get('ftr_idno') == ''){
              $data['ftr_idno']  = 'ALL';
          }else{
              $data['ftr_idno']  = $this->input->get('ftr_idno');
          }
          $result = $this->mdl_admin->m_get_soloparentlist($data);
          echo json_encode($result);
        }

        public function get_soloparent_service(){
          $servicetype = 'SOLO PARENT';
          $result = $this->mdl_admin->m_get_service($servicetype);
          echo json_encode($result);
        }

        public function ajax_depende($a,$b){

          $id = $a;
          $type = $b;
          $result = $this->mdl_admin->m_get_depende($id,$type);
          echo json_encode($result);
        }

        public function ajax_get_fernandino_info(){
          $idno = $this->input->post('idno');
          $masterid = $this->input->post('masterid');
          if($result = $this->mdl_admin->m_get_fernandino_info($masterid)){
              $data = str_replace(array('[', ']'), '', htmlspecialchars(json_encode($result), ENT_NOQUOTES));
              echo $data;
          }else{

          }
        }
        
        public function pwdreport(){
            if(!empty($this->session->userdata('accountId'))){

            $data['title'] = 'PWD REPORT';
            $data['content'] = 'admin/v_pwdreport';
            $this->load->view('layouts/v_master', $data);

          }else{
            redirect('account');
          }
            
        }
        
    public function pwdsummary(){
       if(!empty($this->session->userdata('accountId'))){
        $data['title'] = 'Report';
        $data['content'] = 'admin/v_pwdsummary';
        $this->load->view('layouts/v_master', $data);
      }else{
          redirect('account');
      }
    }
    
    public function ajax_getPWDYearIssue(){
        $result =  $this->mdl_admin->m_getPWDYearIssue();
         echo json_encode($result);
    }
    
    public function ajax_getPWDByCivilStatus(){
         $result =  $this->mdl_admin->m_getPWDByCivilStatus();
         echo json_encode($result);
    }
    
    public function ajax_getPWDByDisabilityType(){
         $result =  $this->mdl_admin->m_getPWDByDisabilityType();
         echo json_encode($result);
    }
    
    public function ajax_getPWDByAgeBracket(){
         $result =  $this->mdl_admin->m_getPWDByAgeBracket();
         echo json_encode($result);
    }
    
    public function soloparentreports(){
       if(!empty($this->session->userdata('accountId'))){
        $data['title'] = 'Report';
        $data['content'] = 'admin/v_soloparentreports';
        $this->load->view('layouts/v_master', $data);
      }else{
          redirect('account');
      }
    }
    
    public function ajax_getSPPerBrgy(){
         $result =  $this->mdl_admin->m_getSPPerBrgy();
         echo json_encode($result);
    }
    
      public function ajax_getSPYearIssue(){
        $result =  $this->mdl_admin->m_getSPYearIssue();
         echo json_encode($result);
    }
    
      
    public function ajax_getSPByCause(){
         $result =  $this->mdl_admin->m_getSPByCause();
         echo json_encode($result);
    }
}
