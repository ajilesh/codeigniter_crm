<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
	parent::__construct();
	$this->load->model('auth');
	}
	public function index()
	{
		$this->load->view('admin/login');
    }
	public function Register(){
		$this->load->view('admin/register');
	}
	public function insertRegister()
	{
		$this->auth->insertData();
	}
	public function checkLogin()
	{
		$this->auth->checkLogin();
	}
}
