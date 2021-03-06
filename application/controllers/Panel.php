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
		$this->load->model('ErrorsModel');
		$this->load->model('InformationModel');
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
            $this->ErrorsModel->newError('success', 'Успешно!', 'Новость успешно удалена.');
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
                $this->ErrorsModel->newError('success', 'Успешно!', 'Газета успешно удалена.');
            }
            else{
                $this->ErrorsModel->newError('danger', 'Ошибка!', 'Такой новости не существует.');
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
    public function users($action = '', $id = '')
    {
        $this->page = 'users';
        if($action == "delete" && $id>0){
            $data = $this->UserModel->getUsers('id,name,surname,email,type', array('id' => $id));;
            if(count($data)>0){
                $this->UserModel->deleteUser($id);
                $this->ErrorsModel->newError('success', 'Успешно!', 'Пользователь успешно удален.');
            }
            else{
                $this->ErrorsModel->newError('danger', 'Ошибка!', 'Такого пользователя не существует.');
            }
            header('location: ' . site_url('panel/users'));
            exit;
        }
        $this->load->view('admin/header');
        $data['users'] = $this->UserModel->getUsers('id,name,surname,email,type');
        $this->load->view('admin/users', $data);
        $this->load->view('admin/footer');
    }
    public function addUser()
    {
        $this->page = 'users';
        if(isset($_POST['name'])
            && isset($_POST['surname'])
            && isset($_POST['email'])
            && isset($_POST['password'])
            && isset($_POST['type_user'])
            && isset($_POST['repassword'])){
            if(!$this->UserModel->getUserByEmail($_POST['email'], 'id')) {
                if ($_POST['repassword'] == $_POST['password']) {
                    $id = $this->UserModel->addUser($_POST['name'], $_POST['surname'], $_POST['password'], $_POST['email'], $_POST['type_user']);
                    if (isset($_FILES['userfile'])) {
                        $this->FilesModel->userImage($id);
                    }
                    $this->ErrorsModel->newError('success', 'Успешно!', 'Автор успешно добавлен.');
                }
                else{
                    $this->ErrorsModel->newError('danger', 'Ошибка!', 'Пароли не совпадают.');
                }
            }
            else{
                $this->ErrorsModel->newError('danger', 'Ошибка!', 'Автор с таким email уже существует.');
            }
            header('location:' . site_url('panel/users'));
            exit;
        }
        $this->load->view('admin/header');
        $this->load->view('admin/addUser');
        $this->load->view('admin/footer');
    }
	public function addNew()
	{
		$this->page = 'news';
		if(isset($_POST['title'])){
			$this->NewsModel->addNew();
            $this->ErrorsModel->newError('success', 'Успешно!', 'Новость');
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
            $this->ErrorsModel->newError('success', 'Успешно!', 'Газета успешно добавлена.');
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

		if(isset($_POST['data'])){
		    $data = $_POST['data'];
            foreach($data as $key => $element){
                $toDB[$key] = json_encode($data[$key], JSON_UNESCAPED_UNICODE);
            }
            if(count($data)>0) {
                $this->db->truncate('main_page');
                $this->db->insert('main_page', $toDB);
            }
        }
		$this->page = 'editMainPage';
		$this->load->view('admin/header');
//        header$data['selected'] = $this->MainPageModel->getNewsBlock();
//        $data['selected']['main_new'] = $this->MainPageModel->getMainNewBlock();
		$news = $this->NewsModel->getNews('id,title');
		$data['news'] = '';
		foreach($news as $new){
			$data['news'] .= "<option value='{$new['id']}'>{$new['title']}</option>";
		}
        $newspapers = $this->NewspaperModel->getNewspapers('id,text');
        $data['newspapers'] = '';
        foreach($newspapers as $new){
            $data['newspapers'] .= "<option value='{$new['id']}'>{$new['text']}</option>";
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
		$data['data'] = $this->InformationModel->getAll();
		$this->load->view('admin/information', $data);
		$this->load->view('admin/footer');
	}
    public function editInformation($type = 'about_us')
    {
        if(isset($_POST['type'])){
            switch($_POST['type']){
                case 'about_us': $this->InformationModel->setAboutUs($_POST['text']); break;
                case 'contacts': $this->InformationModel->setContacts($_POST['text']); break;
            }
            $this->ErrorsModel->newError('success', 'Успешно!', 'Информация изменена.');
            header('location: ' . site_url('panel/information'));
            exit;
        }
        $this->page = 'information';
        $this->load->view('admin/header');
        switch($type) {
            case 'contacts': $data['data'] = $this->InformationModel->getContacts(); break;
            case 'about_us':
            default: $data['data'] = $this->InformationModel->getAboutUs();
        }
        $this->load->view('admin/editInformation', $data);
        $this->load->view('admin/footer');
    }
}
