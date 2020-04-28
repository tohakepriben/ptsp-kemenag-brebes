<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

function rrmdir($dir) { 
	if (is_dir($dir)) { 
		$objects = scandir($dir);
		foreach ($objects as $object) { 
			if ($object != "." && $object != "..") { 
				if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) rrmdir($dir. DIRECTORY_SEPARATOR .$object);
				else unlink($dir. DIRECTORY_SEPARATOR .$object); 
			} 
		}
		rmdir($dir); 
	} 
}
 
function show_alert($msg) {
	echo '<script type="text/javascript">';
	echo 'alert("' . $msg . '");';
	echo '</script>';
}

function back() {
	echo '<script type="text/javascript">';
	echo 'javascript:history.back();';
	echo '</script>';
}

function format_rp($angka){
	$ret = number_format($angka,0,',','.');
	return $ret;
}

function fix_file_name($file_name) {
	// https://stackoverflow.com/questions/2021624/string-sanitizer-for-filename
	$ret = str_replace(' ', '_', $file_name);
	$ret = mb_ereg_replace("([^\w\s\d])", '_', $ret);
	$ret = mb_ereg_replace("([\_]{2,})", '_', $ret);
	$ret = strtolower($ret);
    return $ret;
}

function config_email(){
	$config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_user' => 'pdpontrenbbs@gmail.com',  // Email gmail
        'smtp_pass'   => 'pdpontren2020',  // Password gmail
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];
    return $config;
}
function config_image_lib($img_path){
	$config = [
		'image_library' => 'gd2',
		'source_image' => $img_path,
		'maintain_ratio' => TRUE,
		'width' => 800,
		'height' => 800
    ];
    return $config;
}

function kembalikan_ke(){
	$ci=&get_instance();
	$cur_user=$ci->session->userdata('level');
	if($cur_user=='bo') return('Front Office');
	elseif($cur_user=='ka') return('Back Office');
	elseif($cur_user=='tu') return('Kepala Kankemenag');
	elseif($cur_user=='sk') return('Kasubag TU');
	else return('invalid');
}
function teruskan_ke(){
	$ci=&get_instance();
	$cur_user=$ci->session->userdata('level');
	if($cur_user=='fo') return('Back Office');
	elseif($cur_user=='bo') return('Kepala Kankemenag');
	elseif($cur_user=='ka') return('Kasubag TU');
	elseif($cur_user=='tu') return('Satker');
	else return('invalid');
}
