<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public $userdata;
	 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('NewsModel');
		$this->load->model('MainPageModel');
		if($this->session->has_userdata('email')){
			$this->userdata = $_SESSION;
		}
		//$this->load->model('User_module');
	}
	public function index()
	{
		$this->load->view('default/header');

        $data = $this->MainPageModel->getNewsBlock();
        $data['main_new'] = $this->MainPageModel->getMainNewBlock();

		$this->load->view('default/home',$data);

		$this->load->view('default/footer');
	}
	public function news($id = 0)
	{
		$this->load->view('default/header');
		if($id>0){
			$data['is_valid'] = $this->NewsModel->isValid($id);
			$data['new'] = $this->NewsModel->getNewById($id, 'title,text,date,last_edit');
			$this->load->view('default/new', $data);
		}
		else{
			$data['news'] = $this->NewsModel->getNews('id,title,annotation,date,last_edit');
			$this->load->view('default/news', $data);
		}
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
	public function profile()
	{
		$this->load->view('default/header');
		$this->load->view('default/profile');
		$this->load->view('default/footer');
	}
}
