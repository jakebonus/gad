<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Medicine extends MX_Controller
{
    //============ CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_medicine');
    }

    public function index() {
        // if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['title'] = 'Medicine list';
            $data['content'] = 'medicine/v_index';
            $this->load->view('layouts/v_master', $data);
        // } else {
        //   redirect('account');
        // }
    }

    // GET TRANSACTION RECORDS
    public function ajax_get_allmedicine(){
        if ($this->session->userdata('accountId')) {
            $result = $this->mdl_medicine->m_ajax_get_allmedicine();
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    //ADD AJAX
    public function ajax_msave(){
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['m_name'] = strtoupper($this->input->post('m_name'));
            $data['m_dosage_form'] = strtoupper($this->input->post('m_dosage_form'));
            $data['m_therapeutic_use'] = strtoupper($this->input->post('m_therapeutic_use'));
            $data['m_set'] = strtoupper($this->input->post('m_set'));
            $data['m_pcsper_set'] = strtoupper($this->input->post('m_pcsper_set'));
            $data['m_addedby'] = $this->session->userdata('accountId');

            if($this->mdl_medicine->m_ajax_msave($data))
            {
                $result = array('status' => 'yes','content'=> 'Saved Successfully!');
                echo json_encode($result);
                exit();
            } else {
                $result = array('status' => 'no','content'=> 'Failed to save. Please try again!');
                echo json_encode($result);
                exit();
            }
        } else {
          redirect('account');
        }
    }

    //EDIT AJAX SAVE
    public function ajax_medit() {
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['m_id'] = strtoupper($this->input->post('m_id'));
            $data['m_name'] = strtoupper($this->input->post('m_name'));
            $data['m_dosage_form'] = $this->input->post('m_dosage_form');
            $data['m_therapeutic_use'] = $this->input->post('m_therapeutic_use');
            $data['m_set'] = $this->input->post('m_set');
            $data['m_pcsper_set'] = $this->input->post('m_pcsper_set');
            $data['m_editedby'] = $this->session->userdata('accountId');

            if($this->mdl_medicine->m_ajax_medit($data))
            {
                $result = array('status' => 'yes','content'=> 'Updated Successfully!');
                echo json_encode($result);
                exit();
            } else {
                $result = array('status' => 'no','content'=> 'Failed to save. Please try again!');
                echo json_encode($result);
                exit();
            }
        } else {
          redirect('account');
        }
    }

    //DELETE AJAX
    public function ajax_mdelete() {
        if ($this->session->userdata('accountId') && $this->session->userdata('profile') == 'admin') {
            $data['m_id'] = strtoupper($this->input->post('m_id'));
            $data['m_deletedby'] =  $this->session->userdata('accountId');
            $data['m_isdeleted'] = "0";

            if($this->mdl_medicine->m_ajax_medit($data))
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
          redirect('account');
        }
    }

}
