<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public $userdata;
	 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		if($this->session->has_userdata('email')){
			$this->userdata = $_SESSION;
		}
		//$this->load->model('User_module');
	}
	public function index()
	{
		$this->load->view('default/header');
		$this->load->view('default/home');
		$this->load->view('default/footer');
	}
	public function news()
	{
		$this->load->view('default/header');
		$this->load->view('default/news');
		$this->load->view('default/footer');
	}
	public function archive()
	{
		$this->load->view('default/header');
		$this->load->view('default/archive');
		$this->load->view('default/footer');
	}
	public function authors()
	{
		$this->load->view('default/header');
		$this->load->view('default/authors');
		$this->load->view('default/footer');
	}
	public function about()
	{
		$this->load->view('default/header');
		$this->load->view('default/about');
		$this->load->view('default/footer');
	}
	public function auth(){
		$this->load->view('auth');
	}
}
