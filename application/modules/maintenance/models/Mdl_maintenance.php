<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_maintenance extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function m_get_services($officeid){
		$sql = "SELECT * FROM `m_services` WHERE `officeid` = '$officeid'";
		$query =  $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function m_save($data){
		$query = $this->db->insert('`m_services`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function m_update($serviceID,$data){
						$this->db->where('`serviceID`',$serviceID);
		$query = $this->db->update('`m_services`',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
}
