<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bagian extends CI_Model {
	
	function get_bagian(){
		return($this->db->get('tbl_bagian')->result_array());
	}

}
