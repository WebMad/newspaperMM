<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	 
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('UserModel');
		$this->load->library('session');
	}
	public function index()
	{
		/*$this->load->view('default/header');
		$this->load->view('default/home');
		$this->load->view('default/footer');*/
	}
	
	public function image(){
		
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 100;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$config['file_name'] = $_SESSION['id'];
		$config['upload_path'] = IMG_USER_PATH;
		$this->load->library('upload', $config);
		if($_SESSION['photo'] != DEFAULT_IMG_USER_NAME && is_file(IMG_USER_PATH . $_SESSION['photo'])){
			unlink(IMG_USER_PATH . $_SESSION['photo']);
		}
		if ( ! $this->upload->do_upload('userfile'))
		{
			//$error = array('error' => $this->upload->display_errors());
			$error = array(
				'error' => [
					'title' => 'Ошибка!',
					'msg' => 'Файл не был загружен, попробуйте загрузить другой файл.',
					'type' => 'danger',
				]
			);
			$this->UserModel->updateDataUser($_SESSION['id'], array('photo' => DEFAULT_IMG_USER_NAME));
		}
		else
		{
			$error = array(
				'error' => [
					'title' => 'Успешно!',
					'msg' => 'Файл загружен!',
					'type' => 'success',
				]
			);
			$data = array('upload_data' => $this->upload->data());
			$this->UserModel->updateDataUser($_SESSION['id'], array('photo' => $data['upload_data']['file_name']));
		}
		$this->UserModel->updateSessionUser($_SESSION['id']);
		$this->session->set_userdata($error);
		header('location: ' . site_url('pages/profile'));
		exit;
	}
	
}
