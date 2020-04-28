<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function index(){
		if($this->session->has_userdata('level')) redirect(base_url());
		if($this->input->post('secret')==1){
			$uname=$this->input->post('username');
			$pwd=$this->input->post('password');
			if($this->m_user->login($uname, $pwd)){
				$id_user = $this->session->userdata('id_user');
				$arr_data=[
					'nama'	=>	$this->m_user->get_detil_user($id_user, 'nama'),
					'level'	=>	$this->m_user->get_detil_user($id_user, 'level')
				];
				$this->session->set_userdata($arr_data);
				redirect(base_url());
			}else{
				$this->session->set_flashdata('login_error', 'Username atau Password tidak terdaftar');
			}
		}
		$par['title'] = 'Beranda';
		$this->load->view('login', $par);
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
