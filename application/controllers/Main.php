<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(! $this->session->has_userdata('level')){
			redirect('login');
		}
	}

	function index(){
		$par['title']='Beranda';
		$this->load->view('_main', $par);
	}
	
	function profil_saya(){
		$par['title']='Profil Saya';
		$this->load->view('_main', $par);
	}
}
