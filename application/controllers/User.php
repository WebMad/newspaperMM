<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('UserModel');
		$this->load->library('session');
	}
	public function index()
	{
		/*$this->load->view('default/header');
		$this->load->view('default/home');
		$this->load->view('default/footer');*/
	}
	public function auth(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($this->UserModel->isValid($email, $password)){
			$data = $this->UserModel->getUserByEmail($email, 'name,photo,type');
			$to_session = array(
				'email' => $email,
				'name' => $data['name'],
				'photo' => $data['photo'],
				'type' => $data['type']
			);
			$this->session->set_userdata($to_session);
			$error = array(
				'error' => [
					'title' => 'Успешно!',
					'msg' => 'Здравствуйте, ' . $data['name'] . '!',
					'type' => 'success',
				]
			
			);
			$this->session->set_userdata($error);
			header('location: /');
			exit;
		}
		else{
			$error = array(
				'error' => [
					'title' => 'Ошибка!',
					'msg' => 'Не верный логин или пароль!',
					'type' => 'danger',
				]
			
			);
			$this->session->set_userdata($error);
			header('location: ' . site_url('Pages/auth'));
			exit;
		}
	}
	public function exit(){
		$this->session->sess_destroy();
		header('location: /');
		exit;
	}
}
