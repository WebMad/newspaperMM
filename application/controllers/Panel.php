<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public $userdata;
	public $page;
	 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('NewsModel');
		if($this->session->has_userdata('email')){
			if($this->session->userdata('type')==1){
				$this->userdata = $_SESSION;
			}
			else{
				header('location: /');
				exit;
			}
		}
		else{
			header('location: ' . site_url('Pages/auth'));
			exit;
		}
		//$this->load->model('User_module');
	}
	public function index()
	{
		$this->page = 'index';
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
	public function news()
	{
		$this->page = 'news';
		$this->load->view('admin/header');
		$data['news'] = $this->NewsModel->getNews('id,title,views,date,last_edit');
		$this->load->view('admin/news', $data);
		$this->load->view('admin/footer');
	}
	public function addNew()
	{
		$this->page = 'news';
		if(isset($_POST['title'])){
			$this->NewsModel->addNew();
		}
		$this->load->view('admin/header');
		$this->load->view('admin/addNew');
		$this->load->view('admin/footer');
	}
}
