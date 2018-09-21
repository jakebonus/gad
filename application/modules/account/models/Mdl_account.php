<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_account extends CI_Model
{
	//LOGIN/CHECK LOGIN CREDENTIALS
    public function m_ajax_signin($data)
    {
        $datelogin = date("Y-m-d G:i:s", time());
        $a_username = $data['a_username'];
        $a_password = sha1(md5($data['a_password'] . 'c[x]t!@n[*]{7hndv}'));
        $sql = "SELECT
                  `a_id`,
                  `a_username`,
                  `a_password`,
                  `a_profile`,
                  `a_location`,
                  `a_password`,
                  CONCAT(`a_fname`,' ',`a_lname`) AS `a_name`
                FROM
                  `tbl_account`
                WHERE `a_isactive` = 1 AND
                      `a_system` = 'GAD' AND
                      `a_username` = '$a_username' AND
                      `a_password` = '$a_password'
                LIMIT 1";

        // $attr = array($data['a_username'], sha1(md5($data['a_password'] . 'c[x]t!@n[*]{7hndv}')));
        // echo $sql;
        // die();
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            // foreach($query->result() as $r) {
            //     $a_id = $r->a_id;
            // }
            // $sql2 = "UPDATE `tbl_account` SET `a_login` = '$datelogin' WHERE `a_id` = '$a_id'";
            // $param2= array($datelogin,$a_id);
            // $this->db->query($sql2);
            return $query->result();
        } else {
            return false;
        }
    }

	public function m_ajax_signout()
    {
        $datelogout = date("Y-m-d G:i:s", time());
        $sql = "UPDATE `tbl_account` SET `a_logout` = ? WHERE `a_id` = ?";
        $param= array($datelogout,$this->session->userdata('accountId'));
        if($this->db->query($sql,$param)) {
            $this->session->sess_destroy();
            return true;
        } else {
            return false;
        }
    }

    public function m_ajax_update_password($a_id,$password)
    {
        $newpass = sha1(md5($password.'c[x]t!@n[*]{7hndv}'));
        $this->session->set_userdata('password', $newpass);
        $sql ="UPDATE `tbl_account` SET `a_password` = '$newpass' WHERE `a_id` = '$a_id' ";
        if($this->db->query($sql)){
            return true;
        } else {
            return false;
        }
    }

    public function m_ajax_save_userdetails($data1,$a_id) {

  		$this->db->where('a_id', $a_id);
  		if($this->db->update('tbl_account',$data1)) {
  			return TRUE;
  		} else {
  			return FALSE;
  		}

  	}

    public function m_ifonline() {
  		$sql = 'SELECT `a_id` AS `id`
  				FROM
  				  `tbl_account`
  				WHERE `a_id` = "1"
  				';
  		$query = $this->db->query($sql);
  		if($query->num_rows() > 0)
  		{
  			return $query->result();
  		} else {
  			return false;
  		}
  	}

}
