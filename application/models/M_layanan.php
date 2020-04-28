<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan extends CI_Model {
	function get_layanan(){
		$sql='SELECT l.*, s.satker, rl.layanan, s.`user`, rl.alur
			FROM tbl_layanan AS l
			INNER JOIN tbl_satker AS s ON l.id_satker = s.id
			INNER JOIN tbl_ref_layanan AS rl ON l.id_ref_layanan = rl.id
			ORDER BY l.id DESC';
		return($this->db->query($sql)->result_array());
	}

	function get_layanan_by_id($id_layanan){
		$sql='SELECT l.*, s.satker, rl.layanan, s.`user`, rl.alur
			FROM tbl_layanan AS l
			INNER JOIN tbl_satker AS s ON l.id_satker = s.id
			INNER JOIN tbl_ref_layanan AS rl ON l.id_ref_layanan = rl.id
			WHERE id='.$id_layanan.' ORDER BY l.id DESC';
		return($this->db->query($sql)->result_array());
	}
	
	function get_detil_layanan($id_layanan, $field){
		return($this->db->get_where('tbl_layanan', 'id='.$id_layanan)->row($field));
	}
	
	function tambah_layanan($arr_data){
		if($this->db->insert('tbl_layanan', $arr_data)){
			$new_layanan=$this->db->insert_id();
			return($new_layanan);
		}
	}
	function upload_berkas($id_layanan, $id_ref_berkas, $file, $ket=''){
		if($this->m_berkas->berkas_exists($id_layanan, $id_ref_berkas)){
			$arr_data=['file' => $file, 'ket' => $ket];
			return $this->m_berkas->update_berkas($id_layanan, $id_ref_berkas, $arr_data);
		}else{
			$arr_data=[
				'id_layanan' => $id_layanan, 
				'id_ref_berkas' => $id_ref_berkas, 
				'file' => $file, 
				'ket' => $ket
			];
			return $this->m_berkas->tambah_berkas($arr_data);
		}
	}
}
