<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(! $this->session->has_userdata('level')){
			redirect('login');
		}
	}

	function get_detil_ref_layanan($id_pelayanan, $field){
		echo $this->m_ref_layanan->get_detil_ref_layanan($id_pelayanan, $field);
	}
	
	function get_syarat_berkas_by_ref_layanan($id_pelayanan){
		echo json_encode($this->m_syarat_berkas->get_syarat_berkas_by_ref_layanan($id_pelayanan));
	}
	
	function upload_berkas_persyaratan(){
    	$id_layanan = $this->input->post('id_layanan');
    	$id_ref_berkas = $this->input->post('id_ref_berkas');
    	$berkas = $this->input->post('berkas');
    	
    	$uploaded_file = explode('.', $this->input->post('file_name'));
    	$uploaded_file_ext = end($uploaded_file);
		
		$file_berkas = $id_layanan.'-'.$id_ref_berkas.'-'.$berkas.'.'.$uploaded_file_ext;
    	
    	$lokasi = './files/layanan/'.$id_layanan.'/';
		if (!file_exists($lokasi)) {
		    mkdir($lokasi, 0777, TRUE);
		}  
		  	
    	$config = array(
    		'upload_path'		=> $lokasi,
    		'file_name'			=> $file_berkas,
    		'allowed_types'		=> 'jpg|jpeg|png|bmp',
    		'file_ext_tolower'	=> TRUE,
    		'overwrite'			=> TRUE
    	);

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_data')){
            echo $this->upload->display_errors('', '');
        }else{
        	$this->load->library('image_lib', config_image_lib($lokasi.$file_berkas));
        	$this->image_lib->resize();
        	if($this->m_layanan->upload_berkas($id_layanan, $id_ref_berkas, $file_berkas, '')){
				echo 1;
			}else{
				echo 'Error: Gagal menyimpan berkas';
			}
            
        }
	}
}
