<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends MX_Controller
{
    //============ CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_inventory');
        $this->load->model('Admin/mdl_admin');
    }

    public function index() {
        redirect('inventory/in');
    }

    //COMBO BOX
    public function ajax_get_medicine(){
        if ($this->session->userdata('accountId')) {
            $result = $this->mdl_inventory->m_ajax_get_medicine();
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    //INVENTORY - IN
    public function in() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = 'Inventory - IN';
            $data['content'] = 'inventory/v_inventory_in';
            $this->load->view('layouts/v_master', $data);
        } else {
          redirect('account');
        }
    }

    public function ajax_savein() {
        if ($this->session->userdata('accountId')) {
            $data['tr_rs_no'] = ($this->input->post('tr_rs_no') != "" ? $this->input->post('tr_rs_no') : NULL);
            $data['tr_location'] = $this->input->post('tr_location');
            $data['tr_funding'] = $this->input->post('tr_funding');
            $data['tr_program'] = ($this->input->post('tr_program') != "" ? strtoupper($this->input->post('tr_program')) : NULL);
            $data['tr_si_no'] = ($this->input->post('tr_si_no') != "" ? strtoupper($this->input->post('tr_si_no')) : NULL);
            $data['tr_dr_no'] = ($this->input->post('tr_dr_no') != "" ? strtoupper($this->input->post('tr_dr_no')) : NULL);
            $data['tr_supplier'] = ($this->input->post('tr_supplier') != "" ? strtoupper($this->input->post('tr_supplier')) : NULL);
            $data['tr_by'] = strtoupper($this->input->post('tr_by'));
            $data['tr_date'] = $this->input->post('tr_date');
            $data['tr_m_id'] = $this->input->post('vmedicine');
            $data['tr_lot_no'] = $this->input->post('vlotno');
            $data['tr_expiration_date'] = $this->input->post('vexpdate');
            $data['tr_unit'] = $this->input->post('vunit');
            $data['tr_pcsper_set'] = $this->input->post('vpcsper_set');
            $data['tr_qty'] = $this->input->post('vqty');
            $data['tr_addedby'] = $this->session->userdata('accountId');

            $arr_count = count($data['tr_m_id']);

            if($this->mdl_inventory->m_ajax_savein($data,$arr_count))
            {
                $result = array('status' => 'yes','content'=> 'Successfully saved!');
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed!. Please try again!');
                echo json_encode($result);
            }
        } else {
          redirect('account');
        }
    }

    public function in_record() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = "In - Record's";
            $data['content'] = 'inventory/v_record_in';
            $this->load->view('layouts/v_master', $data);
        } else {
            redirect('account');
        }
    }

    public function ajax_record_in() {
        if ($this->session->userdata('accountId')) {
            $result = $this->mdl_inventory->m_ajax_record_in();
            echo json_encode($result);
        } else {
            redirect('account');
        }
    }

    //INVENTORY - ALLOCATION
    public function allocation() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = 'Allocation';
            $data['content'] = 'inventory/v_inventory_allocation';
            $this->load->view('layouts/v_master', $data);
        } else {
            redirect('account');
        }
    }

    public function ajax_saveallocation() {
        if ($this->session->userdata('accountId')) {
            $data['tr_location'] = $this->input->post('tr_location');
            $data['tr_funding'] = $this->input->post('tr_funding');
            $data['tr_program'] = $this->input->post('tr_program');
            $data['tr_destination'] = $this->input->post('tr_destination');
            $data['tr_by'] = strtoupper($this->input->post('tr_by'));
            $data['tr_allocateby'] = strtoupper($this->input->post('tr_allocateby'));
            $data['tr_date'] = $this->input->post('tr_date');
            $data['tr_rs_no'] = ($this->input->post('tr_rs_no') != "" ? $this->input->post('tr_rs_no') : NULL);

            $data['tr_m_id'] = $this->input->post('vmedicine');
            $data['tr_lot_no'] = $this->input->post('vlotno');
            $data['tr_expiration_date'] = $this->input->post('vexpirationdate');
            $data['tr_unit'] = $this->input->post('vunit');
            $data['tr_pcsper_set'] = $this->input->post('vpcsper_set');
            $data['tr_qty'] = $this->input->post('vqty');

            $data['tr_si_no'] = $this->input->post('m_tr_si_no');
            $data['tr_dr_no'] = $this->input->post('m_tr_dr_no');
            $data['tr_supplier'] = $this->input->post('m_tr_supplier');

            $data['tr_addedby'] = $this->session->userdata('accountId');

            $arr_count = count($data['tr_m_id']);

            if($this->mdl_inventory->m_ajax_saveallocation($data,$arr_count))
            {
                $result = array('status' => 'yes','content'=> 'Successfully allocated!');
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed!. Please try again!');
                echo json_encode($result);
            }
        } else {
            redirect('account');
        }
    }

    public function allocation_record() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = "Allocation - Record's";
            $data['content'] = 'inventory/v_record_allocation';
            $this->load->view('layouts/v_master', $data);
        } else {
            redirect('account');
        }
    }

    public function ajax_record_allocation() {
        if ($this->session->userdata('accountId')) {
            $result = $this->mdl_inventory->m_ajax_record_allocation();
            echo json_encode($result);
        } else {
            redirect('account');
        }
    }

    public function ajax_get_risno(){
        if ($this->session->userdata('accountId')) {
            $data['str'] = trim($this->input->get('str'));
            $result = $this->mdl_inventory->m_ajax_get_risno($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_location(){
        if ($this->session->userdata('accountId')) {
            $data['str'] = trim($this->input->get('str'));
            $result = $this->mdl_inventory->m_ajax_get_location($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_fund(){
        if ($this->session->userdata('accountId')) {
            $data['str'] = trim($this->input->get('str'));
            $result = $this->mdl_inventory->m_ajax_get_fund($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_program(){
        if ($this->session->userdata('accountId')) {
            $data['str'] = trim($this->input->get('str'));
            $result = $this->mdl_inventory->m_ajax_get_program($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    //INVENTORY - DISPENSE
    public function dispense() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = 'Inventory - Dispense';
            $data['content'] = 'inventory/v_inventory_dispense';
            $this->load->view('layouts/v_master', $data);
        } else {
          redirect('account');
        }
    }

    public function ajax_record_dispense() {
        if ($this->session->userdata('accountId')) {
            $data['profile'] = $this->session->userdata('profile');
            $data['location'] = $this->session->userdata('location');
            $result = $this->mdl_inventory->m_ajax_record_dispense($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_search_dispense() {
        if ($this->session->userdata('accountId')) {
            $data['tr_location'] = $this->session->userdata('location');
            $data['tr_funding'] = $this->input->get('tr_funding');
            $data['medicine'] = $this->input->get('medicine');
            $data['tr_lot_no'] = $this->input->get('tr_lot_no');
            $data['tr_program'] = $this->input->get('tr_program');

            if($this->mdl_admin->m_ajax_search($data))
            {
                $result = $this->mdl_admin->m_ajax_search($data);
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
                echo json_encode($result);
            }
        } else {
          redirect('account');
        }
    }

    public function ajax_savedispense() {
        if ($this->session->userdata('accountId')) {
            $data['tr_location'] = strtoupper($this->session->userdata('location'));
            $data['tr_funding'] = $this->input->post('tr_funding');
            $data['tr_program'] = $this->input->post('tr_program');
            $data['tr_fc_id'] = ($this->input->post('tr_fc_id') != "" ? strtoupper($this->input->post('tr_fc_id')) : NULL);
            $data['tr_sc_id'] = ($this->input->post('tr_sc_id') != "" ? strtoupper($this->input->post('tr_sc_id')) : NULL);

            $data['tr_fname'] = strtoupper($this->input->post('tr_fname'));
            $data['tr_mname'] = ($this->input->post('tr_mname') != "" ? strtoupper($this->input->post('tr_mname')) : NULL);
            $data['tr_lname'] = strtoupper($this->input->post('tr_lname'));
            $data['tr_type'] = strtoupper($this->input->post('tr_type'));
            $data['tr_brgy'] = strtoupper($this->input->post('tr_brgy'));
            $data['tr_by'] = strtoupper($this->input->post('tr_by'));
            $data['tr_date'] = $this->input->post('tr_date');

            $data['tr_rs_no'] = ($this->input->post('tr_rs_no') != "" ? $this->input->post('tr_rs_no') : NULL);

            $data['tr_si_no'] = $this->input->post('m_tr_si_no');
            $data['tr_dr_no'] = $this->input->post('m_tr_dr_no');
            $data['tr_supplier'] = $this->input->post('m_tr_supplier');

            $data['tr_m_id'] = $this->input->post('vmedicine');
            $data['tr_lot_no'] = $this->input->post('vlotno');
            $data['tr_expiration_date'] = $this->input->post('vexpirationdate');
            $data['tr_unit'] = $this->input->post('vunit');
            $data['tr_pcsper_set'] = $this->input->post('vpcsper_set');
            $data['tr_qty'] = $this->input->post('vqty');
            $data['tr_addedby'] = $this->session->userdata('accountId');

            $arr_count = count($data['tr_m_id']);

            if($this->mdl_inventory->m_ajax_savedispense($data,$arr_count))
            {
                $result = array('status' => 'yes','content'=> 'Successfully dispensed!');
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed!. Please try again!');
                echo json_encode($result);
            }
        } else {
          redirect('account');
        }
    }

    public function ajax_search_risno() {
        if ($this->session->userdata('accountId')) {
            $data['format'] = $this->input->get('format');
            if($this->mdl_inventory->m_ajax_search_risno($data))
            {
                $result = $this->mdl_inventory->m_ajax_search_risno($data);
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
                echo json_encode($result);
            }
        } else {
          redirect('account');
        }
    }

    public function dispense_record() {
        if ($this->session->userdata('accountId')) {
            $data['title'] = "Dispense - Record's";
            $data['content'] = 'inventory/v_record_dispense';
            $this->load->view('layouts/v_master', $data);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_d_risno(){
        if ($this->session->userdata('accountId')) {
            $data['profile'] = $this->session->userdata('profile');
            $data['location'] = $this->session->userdata('location');
            $result = $this->mdl_inventory->m_ajax_get_d_risno($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_d_location(){
        if ($this->session->userdata('accountId')) {
            $result = $this->mdl_inventory->m_ajax_get_d_location();
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_d_destination(){
        if ($this->session->userdata('accountId')) {
            $data['profile'] = $this->session->userdata('profile');
            $data['location'] = $this->session->userdata('location');
            $result = $this->mdl_inventory->m_ajax_get_d_destination($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_d_fund(){
        if ($this->session->userdata('accountId')) {
            $data['profile'] = $this->session->userdata('profile');
            $data['location'] = $this->session->userdata('location');
            $result = $this->mdl_inventory->m_ajax_get_d_fund($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    public function ajax_get_d_program(){
        if ($this->session->userdata('accountId')) {
            $data['profile'] = $this->session->userdata('profile');
            $data['location'] = $this->session->userdata('location');
            $result = $this->mdl_inventory->m_ajax_get_d_program($data);
            echo json_encode($result);
        } else {
          redirect('account');
        }
    }

    //PRINT - SEARCH RECORD
    public function ajax_search_record() {
        if ($this->session->userdata('accountId')) {
            $data['tr_rs_no'] = $this->input->get('tr_rs_no');
            $data['tr_location'] = $this->input->get('tr_location');

            if($this->mdl_inventory->m_ajax_search_record($data))
            {
                $result = $this->mdl_inventory->m_ajax_search_record($data);
                echo json_encode($result);
            } else {
                $result = array('status' => 'no','content'=> 'Failed to search medicine. Please try again!');
                echo json_encode($result);
            }
        } else {
          redirect('account');
        }
    }

    //GET NAME
    public function ajax_get_name() {
        if ($this->session->userdata('accountId')) {
          $data['location'] = $this->session->userdata('location');
          $result = $this->mdl_inventory->m_ajax_get_name($data);
          echo json_encode($result);
        } else {
          redirect('account');
        }
    }
}
