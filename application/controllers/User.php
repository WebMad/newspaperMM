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
			$data = $this->UserModel->getUserByEmail($email);
			$this->UserModel->updateSessionUser($data['id']);
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
	public function updateInformation(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$data = array(
				'name' => $_POST['name'],
				'surname' => $_POST['surname'],
				'email' => $_POST['email'],
			);
			$user = $this->UserModel->getUserByEmail($_SESSION['email'], 'id');
			$this->UserModel->updateDataUser($user['id'], $data);
			$this->UserModel->updateSessionUser($user['id']);
			
			header('location: ' . site_url('pages/profile'));
			exit;
		}
		else{
			header('location: /');
			exit;
		}
	}
	public function updatePassword(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['last_password']) && !empty($_POST['password'])){
				$user = $this->UserModel->getUserById($_SESSION['id'], 'password');
				if($_POST['repeat_password'] == $_POST['password']){
					if($user['password'] == $_POST['last_password']){
						$data = array(
							'password' => $_POST['password'],
						);
						$this->UserModel->updateDataUser($_SESSION['id'], $data);
						$error = array(
							'error' => [
								'title' => 'Успешно!',
								'msg' => 'Ваш пароль изменен!',
								'type' => 'success',
							]
						
						);
						$this->session->set_userdata($error);
						header('location: ' . site_url('pages/profile'));
						exit;
					}
					else{
						$error = array(
							'error' => [
								'title' => 'Ошибка!',
								'msg' => 'Не верный пароль!',
								'type' => 'danger',
							]
						);
					}
				}
				else{
					$error = array(
						'error' => [
							'title' => 'Ошибка!',
							'msg' => 'Пароли не совпадают!',
							'type' => 'danger',
						]
					);
				}
			}
			else{
				$error = array(
					'error' => [
						'title' => 'Ошибка!',
						'msg' => 'Не все поля заполнены!',
						'type' => 'danger',
					]
				);
			}
			$this->session->set_userdata($error);
			header('location: ' . site_url('pages/profile'));
			exit;
		}
		else{
			header('location: /');
			exit;
		}
	}
	public function exit(){
		$this->session->sess_destroy();
		header('location: /');
		exit;
	}
}
