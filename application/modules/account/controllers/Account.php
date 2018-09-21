<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_account');
    }

    //LOGIN
    public function index()
    {
        if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
            header('Location: http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 's':'').'://' . substr($_SERVER['HTTP_HOST'], 4).$_SERVER['REQUEST_URI']);
            exit;
        }

        if (!$this->session->userdata('accountId')) {
            $data['title'] = 'Login';
            $this->load->view('v_login', $data);
        } else {
            redirect('admin');
        }
    }

	//AJAX LOGIN
    public function ajax_signin()
    {
      $url = '';
  		if ($this->input->post('islogin') == 1) {
  			$data['a_username'] = $this->input->post('a_username');
  			$data['a_password'] = $this->input->post('a_password');

  			if ($user = $this->mdl_account->m_ajax_signin($data)) {
  				foreach ($user as $u) {
  					$this->session->set_userdata('accountId', $u->a_id);
  					$this->session->set_userdata('username', $u->a_username);
            $this->session->set_userdata('profile', $u->a_profile);
            $this->session->set_userdata('name', $u->a_name);
            $this->session->set_userdata('location', $u->a_location);
  					$this->session->set_userdata('password', $u->a_password);
  				}

            $data1['a_ip'] = 'xxx';
           $data1['a_macadd'] = 'xx';

           $data1['a_browser'] = 'xxx';
           $data1['a_pcname'] = 'xxx';
           $a_id = $this->session->userdata('accountId');
            $this->mdl_account->m_ajax_save_userdetails($data1,$a_id);


  				$result = array('status' => 'yes', 'content' => 'Successfully logged in! Redirecting...');
  				echo json_encode($result);
  			} else {
  				$result = array('status' => 'no', 'content' => 'Invalid Username and Password!');
  				echo json_encode($result);
  			}
  		}
    }

	//LOGOUT/DESTROY ALL SESSIONS
    public function logout()
    {
  		if($this->mdl_account->m_ajax_signout()) {
  			redirect('account');
  		}
    }

    //CHANGE PASSWORD
    public function profile()
    {
        if ($this->session->userdata('accountId')) {
            $data['title'] = 'Profile';
            $data['content'] = 'account/v_profile';
            $this->load->view('layouts/v_master', $data);
        } else {
            redirect('account');
        }
    }

    public function update_password()
    {
        if ($this->session->userdata('accountId')) {
          $a_id = $this->session->userdata('accountId');
          if($this->input->post('password') == $this->input->post('password2')){
              if($this->mdl_account->m_ajax_update_password($a_id,$this->input->post('password'))){
                  $this->session->set_userdata('password', sha1(md5($this->input->post('password'). 'c[x]t!@n[*]{7hndv}')));
                  $result = array('status' => 'yes','content'=> 'Password Successfully Updated');
                  echo json_encode($result);
                  exit();
              } else {
                  $result = array('status' => 'no','content'=> 'Password failed to updated');
                  echo json_encode($result);
                  exit();
              }
          } else {
              $result = array('status' => 'no','content'=> 'Password did not match');
              echo json_encode($result);
              exit();
          }
        } else {
            redirect('account');
        }
    }

    public function ifonline(){
        if($this->mdl_account->m_ifonline())
        {
            $result = array('status' => 'yes');
            echo json_encode($result);
        } else {
            $result = array('status' => 'no');
            echo json_encode($result);
        }
    }

}
