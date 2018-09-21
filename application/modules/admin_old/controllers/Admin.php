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
            $data['title'] = 'Masterlist';
            $data['content'] = 'admin/v_masterlist';
            $this->load->view('layouts/v_master', $data);

    }

    // GET FERNANDINO LIST FILTER
    public function ajax_get_fernandino(){
        $data['txt_search'] = $this->input->get('txt_search');
        $data['txt_in'] = $this->input->get('txt_in');
        $data['txt_brgy'] = $this->input->get('txt_brgy');
        $data['gender'] = $this->input->get('gender');
        $data['sector'] = $this->input->get('sector');
      $result = $this->mdl_admin->m_ajax_get_fernandino($data);
      echo json_encode($result);
    }


    //GET BARANGAY
    // public function ajax_get_brgy(){
    //   $result = $this->mdl_admin->m_ajax_get_brgy();
    //   echo json_encode($result);
    // }

    // public function ajax_get_precint(){
    //   $result = $this->mdl_admin->m_ajax_get_precint();
    //   echo json_encode($result);
    // }

    //get subdivision
    // public function ajax_get_subdivision(){
    //   if ($this->mdl_admin->m_ajax_get_subdivision()) {
    //     $result = array('status' => 'yes','content'=> $this->mdl_admin->m_ajax_get_subdivision());
    //     echo json_encode($result);
    //   } else {
    //     $result = array('status' => 'no','content'=> false);
    //     echo json_encode($result);
    //   }
    // }

    //get religion
    // public function ajax_get_religion(){
    //   if ($this->mdl_admin->m_ajax_get_religion()) {
    //     $result = array('status' => 'yes','content'=> $this->mdl_admin->m_ajax_get_religion());
    //     echo json_encode($result);
    //   } else {
    //     $result = array('status' => 'no','content'=> false);
    //     echo json_encode($result);
    //   }
    // }

    //get occupation
    // public function ajax_get_occupation(){
    //   if ($this->mdl_admin->m_ajax_get_occupation()) {
    //     $result = array('status' => 'yes','content'=> $this->mdl_admin->m_ajax_get_occupation());
    //     echo json_encode($result);
    //   } else {
    //     $result = array('status' => 'no','content'=> false);
    //     echo json_encode($result);
    //   }
    // }

    //get street
    // public function ajax_get_street(){
    //   if ($this->mdl_admin->m_ajax_get_street()) {
    //     $result = array('status' => 'yes','content'=> $this->mdl_admin->m_ajax_get_street());
    //     echo json_encode($result);
    //   } else {
    //     $result = array('status' => 'no','content'=> false);
    //     echo json_encode($result);
    //   }
    // }

    //get street
    // public function ajax_get_birthplace() {
    //   if ($this->mdl_admin->m_ajax_get_birthplace()) {
    //     $result = array('status' => 'yes','content'=> $this->mdl_admin->m_ajax_get_birthplace());
    //     echo json_encode($result);
    //   } else {
    //     $result = array('status' => 'no','content'=> false);
    //     echo json_encode($result);
    //   }
    // }

    //get skill
    // public function ajax_get_skills() {
    //   if ($this->mdl_admin->m_ajax_get_skills()) {
    //     $result = array('status' => 'yes','content'=> $this->mdl_admin->m_ajax_get_skills());
    //     echo json_encode($result);
    //   } else {
    //     $result = array('status' => 'no','content'=> false);
    //     echo json_encode($result);
    //   }
    // }



    //=========================================OLD

    // public function ajax_get_lotno(){
    //     if ($this->session->userdata('accountId')) {
    //         $data['profile'] = $this->session->userdata('profile');
    //         $data['location'] = $this->session->userdata('location');
    //         $result = $this->mdl_admin->m_ajax_get_lotno($data);
    //         echo json_encode($result);
    //     } else {
    //         redirect('account');
    //     }
    // }

    // public function ajax_get_m_dosage_form(){
    //     if ($this->session->userdata('accountId')) {
    //         $result = $this->mdl_admin->m_ajax_get_m_dosage_form();
    //         echo json_encode($result);
    //     } else {
    //         redirect('account');
    //     }
    // }

    // public function ajax_get_program(){
    //     if ($this->session->userdata('accountId')) {
    //         $data['profile'] = $this->session->userdata('profile');
    //         $data['location'] = $this->session->userdata('location');
    //         $result = $this->mdl_admin->m_ajax_get_program($data);
    //         echo json_encode($result);
    //     } else {
    //         redirect('account');
    //     }
    // }

    //SEARCH TRANSACTION RECORDS
    // public function ajax_search() {
    //     if ($this->session->userdata('accountId')) {
    //         // $data['tr_location'] = $this->input->post('tr_location');
    //         $data['tr_location'] = ($this->session->userdata('profile') == "admin" ? $this->input->get('tr_location') : $this->session->userdata('location'));
    //         $data['tr_funding'] = $this->input->get('tr_funding');
    //         $data['medicine'] = $this->input->get('medicine');
    //         $data['tr_lot_no'] = $this->input->get('tr_lot_no');
    //         $data['tr_program'] = $this->input->get('tr_program');
    //
    //         if($this->mdl_admin->m_ajax_search($data))
    //         {
    //             $result = $this->mdl_admin->m_ajax_search($data);
    //             echo json_encode($result);
    //         } else {
    //             $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
    //             echo json_encode($result);
    //         }
    //     } else {
    //         redirect('account');
    //     }
    // }
}
