<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ref_layanan extends CI_Model {
	function get_ref_layanan(){
		$sql='SELECT r.id, r.layanan, s.satker, CONCAT(r.layanan, " - ", s.satker) AS layanan2
			FROM tbl_ref_layanan AS r
			INNER JOIN tbl_satker AS s ON r.id_satker = s.id
			ORDER BY s.satker ASC, r.layanan ASC';
		return $this->db->query($sql)->result_array();
	}
	
	function get_ref_layanan_by_satker($id_satker){
		return($this->db->get_where('tbl_ref_layanan', 'id_satker='.$id_satker)->result_array());
	}

	function get_detil_ref_layanan($id, $field){
		return($this->db->get_where('tbl_ref_layanan', 'id='.$id)->row($field));
	}
}
