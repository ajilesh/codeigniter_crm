<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		  redirect('login');
		}
	  } 
	public function index()
	{
		$this->load->view('admin/common/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/common/footer');
	}
	public function logout()
    {
		$this->session->sess_destroy();
		redirect('login');
	}
}
