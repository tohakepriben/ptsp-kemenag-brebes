<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'form_validation', 'session');
$autoload['drivers'] = array();
$autoload['helper'] = array(
						'url',
						'form',
						'text', 
						'file',
						'fungsi_helper'
					);
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array(
						'm_bagian',
						'm_berkas',
						'm_layanan',
						'm_ref_berkas',
						'm_ref_layanan',
						'm_respon',
						'm_satker',
						'm_syarat_berkas',
						'm_user'
					);
