<?php 
 
class Datata extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
			$this->load->view('k_datata');
	}

	function download($file){
		$pdf = 'file/'.$file;
    	force_download($pdf, NULL);
	}
}