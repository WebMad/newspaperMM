<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	 
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('UserModel');
		$this->load->model('ErrorsModel');
		$this->load->model('FilesModel');
		$this->load->library('session');
	}
	public function index()
	{
		/*$this->load->view('default/header');
		$this->load->view('default/home');
		$this->load->view('default/footer');*/
	}
	
	public function userImage(){

	    $this->FilesModel->userImage();

		header('location: ' . site_url('pages/profile'));
		exit;
	}

    public function newImage(){

        $this->FilesModel->newImage();

        header('location: ' . site_url('pages/profile'));
        exit;
    }

	
}
