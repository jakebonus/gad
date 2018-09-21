<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Xhr extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //LOGIN
    public function index()
    {
        if (!$this->session->userdata('accountId')) {
            $data['title'] = 'Sign in Page';
            redirect('account');
        } else {
            redirect('account');
        }
    }

	//404
    public function e_404()
    {
         $this->output->set_status_header('404');
		      $data['title'] = '404 Page Not Found';
        $this->load->view('v_404', $data);
    }

    public function e_maintenance()
    {
        //  $this->output->set_status_header('404');
		    $data['title'] = "Sorry, we're offline for maintenance. Will be back in a moment.";
        $this->load->view('v_maintenance', $data);
    }
}
