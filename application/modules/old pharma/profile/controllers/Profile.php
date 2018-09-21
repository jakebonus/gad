<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MX_Controller
{
    //============ CONSTRUCTOR
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_profile');
    }

    public function index() {
  		if ($this->session->userdata('accountId')) {
  			$data['title'] = 'Profile';
              $data['content'] = 'admin/v_blankpage';
              $this->load->view('layouts/v_master', $data);
  		 } else {
  			redirect('account');
  		}
    }
}
