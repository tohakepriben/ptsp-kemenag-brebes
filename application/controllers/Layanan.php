<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(! $this->session->has_userdata('level')) redirect('login');
	}

	function index(){
		$par['title']='Daftar Layanan';
		$par['layanan']=$this->m_layanan->get_layanan();
		$this->load->view('_main', $par);
	}
	
	function tambah(){
		if($this->input->post('secret')==1){
			$arr_data=[
				'id_satker' => $this->input->post('id-satker'),
				'id_ref_layanan' => $this->input->post('cmb-ref-layanan'),
				'pemohon' => $this->input->post('pemohon'),
				'hp' => $this->input->post('hp')
			];
			$new_layanan=$this->m_layanan->tambah_layanan($arr_data);
			if($new_layanan>0) redirect('layanan/lihat/'.$new_layanan);
		}
		$par['title']='Tambah Layanan';
		$par['satker']=$this->m_satker->get_satker();						
		$this->load->view('_main', $par);
	}
	
	function lihat($id_layanan){
		$par['id_ref_layanan']=$this->m_layanan->get_detil_layanan($id_layanan, 'id_ref_layanan');
		$par['id_layanan']=$id_layanan;
		$par['title']='Lihat Layanan';
		$this->load->view('_main', $par);		
	}
}
