<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
class Customer extends CI_Controller {
    public function __construct(){

            parent::__construct();
  	 		$this->load->model('Customers');
        }
	public function index()
	{
		$this->load->view('admin/common/header');
        $this->load->view('admin/customer');
        
	}
    public function insertData()
    {
       
        $this->Customers->insertdata();
        //print_r($this->input->post());
       
    }
}
