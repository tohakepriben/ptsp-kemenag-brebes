<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berkas extends CI_Model {
	function get_berkas_by_layanan($id_layanan){
		return($this->db->get_where('tbl_berkas', 'id_layanan='.$id_layanan)->result_array());
	}
	
	function get_file_berkas($id_layanan, $id_ref_berkas){
		$arr_where=['id_layanan'=>$id_layanan, 'id_ref_berkas'=>$id_ref_berkas];
		return($this->db->get_where('tbl_berkas', $arr_where)->row('file'));
	}
	function get_ket_berkas($id_layanan, $id_ref_berkas){
		$arr_where=['id_layanan'=>$id_layanan, 'id_ref_berkas'=>$id_ref_berkas];
		return($this->db->get_where('tbl_berkas', $arr_where)->row('ket'));
	}
	
	function berkas_exists($id_layanan, $id_ref_berkas){
		$arr_where=['id_layanan'=>$id_layanan, 'id_ref_berkas'=>$id_ref_berkas];
		return($this->db->get_where('tbl_berkas', $arr_where)->num_rows()>0);		
	}
	function hapus_berkas($id_layanan, $id_ref_berkas){
		$arr_where=['id_layanan'=>$id_layanan, 'id_ref_berkas'=>$id_ref_berkas];
		return($this->db->delete('tbl_berkas', $arr_where));		
	}
	function update_berkas($id_layanan, $id_ref_berkas, $arr_data){
		$arr_where=['id_layanan'=>$id_layanan, 'id_ref_berkas'=>$id_ref_berkas];
		return($this->db->update('tbl_berkas', $arr_data, $arr_where));
	}
	function tambah_berkas($arr_data){
		return($this->db->insert('tbl_berkas', $arr_data));		
	}
}
