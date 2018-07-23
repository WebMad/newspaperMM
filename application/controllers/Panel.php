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
		$this->load->database();
		$this->load->model('NewsModel');
		$this->load->model('NewspaperModel');
		$this->load->model('UserModel');
		$this->load->model('FilesModel');
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
	public function news($action = '', $id = 0)
	{
        if($action == "delete" && $id>0){
            $data = $this->NewsModel->getNewById($id,'id');
            if(count($data)>0){
                $this->db->delete('news', array('id' => $id));
            }
            header('location: ' . site_url('panel/news'));
            exit;
        }
		$this->page = 'news';
		$this->load->view('admin/header');
        $data['news'] = $this->NewsModel->getNews('id,title,views,date,last_edit');
        $this->load->view('admin/news', $data);
		$this->load->view('admin/footer');
	}
    public function newspapers($action = '', $id = 0)
    {
        if($action == "delete" && $id>0){
            $data = $this->NewspaperModel->getNewspaperById($id,'id,filename,img');
            if(count($data)>0){
                $this->db->delete('newspapers', array('id' => $id));
                if(is_file(PDF_NEWSPAPER_PATH . $data['filename'])){
                    unlink(PDF_NEWSPAPER_PATH . $data['filename']);
                }
                if(is_file(IMG_NEWSPAPER_PATH . $data['img']) and $data['img'] != DEFAULT_IMG_NEWSPAPER_NAME){
                    unlink(IMG_NEWSPAPER_PATH . $data['img']);
                }
            }
            header('location: ' . site_url('panel/newspapers'));
            exit;
        }
        $this->page = 'newspapers';
        $this->load->view('admin/header');
        $data['newspapers'] = $this->NewspaperModel->getNewspapers('id,text,date');
        $this->load->view('admin/newspapers', $data);
        $this->load->view('admin/footer');
    }
    public function authors($action = '', $id = '')
    {
        $this->page = 'authors';
        if($action == "delete" && $id>0){
            $data = $this->UserModel->getUsers('id,name,surname,email', array('type' => 2, 'id' => $id));;
            if(count($data)>0){
                $this->UserModel->deleteUser($id);
            }
            header('location: ' . site_url('panel/authors'));
            exit;
        }
        $this->load->view('admin/header');
        $data['authors'] = $this->UserModel->getUsers('id,name,surname,email', array('type' => 2));
        $this->load->view('admin/authors', $data);
        $this->load->view('admin/footer');
    }
    public function addAuthor()
    {
        $this->page = 'news';
        if(isset($_POST['name'])
            && isset($_POST['surname'])
            && isset($_POST['email'])
            && isset($_POST['password'])
            && isset($_POST['repassword'])){
            if(!$this->UserModel->getUserByEmail($_POST['email'], 'id')) {
                if ($_POST['repassword'] == $_POST['password']) {
                    $id = $this->UserModel->addUser($_POST['name'], $_POST['surname'], $_POST['password'], $_POST['email'], 2);
                    if (isset($_FILES['userfile'])) {
                        $this->FilesModel->userImage($id);
                    }
                }
            }
            header('location:' . site_url('panel/authors'));
            exit;
        }
        $this->load->view('admin/header');
        $this->load->view('admin/addAuthor');
        $this->load->view('admin/footer');
    }
	public function addNew()
	{
		$this->page = 'news';
		if(isset($_POST['title'])){
			$this->NewsModel->addNew();
			header('location:' . site_url('panel/news'));
			exit;
		}
		$this->load->view('admin/header');
		$this->load->view('admin/addNew');
		$this->load->view('admin/footer');
	}
    public function addNewspaper()
    {
        $this->page = 'newspapers';
        if(isset($_POST['text'])){
            $this->NewspaperModel->addNewspaper();
            header('location:' . site_url('panel/newspapers'));
            exit;
        }
        $this->load->view('admin/header');
        $this->load->view('admin/addNewspaper');
        $this->load->view('admin/footer');
    }
	public function editMainPage()
	{
		$arr = array();
		if(!empty($_POST['data']['news'])){
			foreach($_POST['data']['news'] as $new){
				$data['news'][] = $new;
			}
			$json = json_encode($data['news'],JSON_UNESCAPED_UNICODE);
			$arr[] = array(
				'type' => 'news', 
				'content' => $json, 
			);
		}
		if(!empty($_POST['data']['newspaper'])){
			foreach($_POST['data']['newspaper'] as $new){
				$data['newspaper'][] = $new;
			}
			$json = json_encode($data['newspaper'],JSON_UNESCAPED_UNICODE);
			$arr[] = array(
				'type' => 'newspaper', 
				'content' => $json, 
			);
		}
		if(!empty($_POST['data']['authors'])){
			foreach($_POST['data']['authors'] as $new){
				$data['authors'][] = $new;
			}
			$json = json_encode($data['authors'],JSON_UNESCAPED_UNICODE);
			$arr[] = array(
				'type' => 'authors', 
				'content' => $json, 
			);
		}
		if(!empty($_POST['data']['main_new'])){
			$data['main_new'] = $_POST['data']['main_new'];
			$arr[] = array(
				'type' => 'main_new', 
				'content' => $data['main_new'],
			);
		}
		if(count($arr)>0){
			$this->db->truncate('main_page');
			$this->db->insert_batch('main_page', $arr);
		}
		$this->page = 'editMainPage';
		$this->load->view('admin/header');
		$news = $this->NewsModel->getNews('id,title');
		$data['news'] = '';
		foreach($news as $new){
			$data['news'] .= "<option value='{$new['id']}'>{$new['title']}</option>";
		}
		$authors = $this->UserModel->getUsers('id,name,surname',array('type' => USER_TYPE_AUTHOR));
		$data['authors'] = '';
		foreach($authors as $author){
			$data['authors'] .= "<option value='{$author['id']}'>{$author['name']} {$author['surname']}</option>";
		}
		$this->load->view('admin/editMainPage',$data);
		$this->load->view('admin/footer');
	}
	public function information()
	{
		$this->page = 'information';
		$this->load->view('admin/header');
		$this->load->view('admin/information');
		$this->load->view('admin/footer');
	}
}
