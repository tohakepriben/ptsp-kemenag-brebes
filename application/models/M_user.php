<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function login($username, $password){
		$arr_data=[
			'username'	=> $username,
			'password'	=> $password
		];
		$id_user = $this->db->get_where('tbl_user', $arr_data)->row('id');
		if($id_user>0){
			$this->session->set_userdata('id_user', $id_user);
			return(TRUE);
		}else{
			return(FALSE);
		}
	}
	
	function get_detil_user($id, $field){
		return($this->db->get_where('tbl_user', 'id='.$id)->row($field));
	}
}
