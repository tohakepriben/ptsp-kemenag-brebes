<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_syarat_berkas extends CI_Model {
	function get_syarat_berkas(){
		
	}
	function get_syarat_berkas_by_ref_layanan($id_ref_layanan){
		$sql='SELECT rl.id, rl.layanan, rb.berkas, rb.id as id_ref_berkas, sb.disyaratkan
			FROM tbl_syarat_berkas AS sb
			INNER JOIN tbl_ref_layanan AS rl ON sb.id_ref_layanan = rl.id
			INNER JOIN tbl_ref_berkas AS rb ON sb.id_ref_berkas = rb.id
			WHERE rl.id = '.$id_ref_layanan;
		return($this->db->query($sql)->result_array());
	}
}
