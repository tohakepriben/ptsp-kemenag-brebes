<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_respon extends CI_Model {
	
	function get_respon($id_layanan, $id_bagian){
		$arr_where=[
			'id_layanan' => $id_layanan,
			'id_bagian' => $id_bagian
		];
		return($this->db->get_where('tbl_respon', $arr_where)->result_array());
	}

}
