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
		$this->load->model('NewspaperModel');
		$this->load->model('InformationModel');
		if($this->session->has_userdata('email')){
			$this->userdata = $_SESSION;
		}
		//$this->load->model('User_module');
	}
	public function index()
	{
		$this->load->view('default/header');

        $data['news'] = $this->MainPageModel->getNewsBlock();
        $data['main_new'] = $this->MainPageModel->getMainNewBlock();
        $data['newspapers'] = $this->MainPageModel->getNewspapersBlock();
        $data['authors'] = $this->MainPageModel->getAuthorsBlock();

		$this->load->view('default/home',$data);
        $data['contacts'] = $this->InformationModel->getContacts();
		$this->load->view('default/footer', $data);
	}
	public function news($id = 0)
	{
		$this->load->view('default/header');
        $data['popular_news'] = $this->NewsModel->getPopularNews();
        $data['contacts'] = $this->InformationModel->getContacts();
		if($id>0){
			$data['is_valid'] = $this->NewsModel->isValid($id);
			$data['new'] = $this->NewsModel->getNewById($id, 'title,text,images,date,last_edit,views');
			$this->load->view('default/new', $data);
			if($data['is_valid']){
			    if(isset($_SESSION['viewed']) and in_array($id,$_SESSION['viewed'])){
                    $this->load->view('default/footer', $data);
			        return;
                }
                $this->NewsModel->addView($id);
                $_SESSION['viewed'][] = $id;
            }
		}
		else{
			$data['news'] = $this->NewsModel->getNews('id,title,annotation,images,date,last_edit,views');
			$this->load->view('default/news', $data);
		}
        $this->load->view('default/footer', $data);
	}
	public function archive($type = '', $id = '')
	{
	    if(!empty($type) && !empty($id)){
            $data['newspapers'] = $this->NewspaperModel->getNewspaperById($id, 'filename');
            $file_url = base_url(PDF_NEWSPAPER_PATH . $data['newspapers']['filename'] );
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($file_url) );
            readfile($file_url); // do the double-download-dance (dirty but worky)
        }
        else {
            $this->load->view('default/header');
            $data['newspapers'] = $this->NewspaperModel->getNewspapers('id,text,filename,img,date');
            $this->load->view('default/archive', $data);
            $data['contacts'] = $this->InformationModel->getContacts();
            $this->load->view('default/footer', $data);
        }
	}
	public function authors()
	{
		$this->load->view('default/header');
		$data['authors'] = $this->UserModel->getUsers('name, surname, photo', array('type' => '2'));
		$this->load->view('default/authors', $data);
        $data['contacts'] = $this->InformationModel->getContacts();
        $this->load->view('default/footer', $data);
	}
	public function about()
	{
		$this->load->view('default/header');
        $data['about'] = $this->InformationModel->getAboutUs();
		$this->load->view('default/about',$data);
        $data['contacts'] = $this->InformationModel->getContacts();
        $this->load->view('default/footer', $data);
	}
	public function auth(){
		$this->load->view('auth');
	}
	public function profile()
	{
		$this->load->view('default/header');
		$this->load->view('default/profile');
        $data['contacts'] = $this->InformationModel->getContacts();
        $this->load->view('default/footer', $data);
	}
}
