<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_satker extends CI_Model {
	
	function get_satker(){
		return($this->db->get('tbl_satker')->result_array());
	}

}
