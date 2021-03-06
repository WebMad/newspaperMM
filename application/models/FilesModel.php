<?
class FilesModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
		$this->load->model('ErrorsModel');
		$this->load->model('UserModel');
	}
	public function userImage($id = ''){
	    if(empty($id)){
	        $id = $_SESSION['id'];
	        $photo = $_SESSION['photo'];
        }
        else{
            $data = $this->UserModel->getUserById($id,'photo');
            $photo = $data['photo'];
        }
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 2048;
        $config['max_height'] = 1080;
        $config['file_name'] = $id;
        $config['upload_path'] = IMG_USER_PATH;
        $this->load->library('upload', $config);
        if($photo != DEFAULT_IMG_USER_NAME && is_file(IMG_USER_PATH . $photo)){
            unlink(IMG_USER_PATH . $photo);
        }
        if ( ! $this->upload->do_upload('userfile'))
        {
            //$error = array('error' => $this->upload->display_errors());
            $this->ErrorsModel->newError('danger', 'Ошибка!', 'Файл не был загружен, попробуйте загрузить другой файл.');
            $this->UserModel->updateDataUser($id, array('photo' => DEFAULT_IMG_USER_NAME));
        }
        else
        {
            $this->ErrorsModel->newError('success', 'Успешно!', 'Файл загружен!');
            $data = array('upload_data' => $this->upload->data());
            $this->UserModel->updateDataUser($id, array('photo' => $data['upload_data']['file_name']));
        }
    }
    public function newImage(){
	    $file_names = array();
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['upload_path'] = IMG_NEW_PATH;
        $config['overwrite'] = 1;
        $this->load->library('upload', $config);
        $config['file_name']=time();

        foreach ($_FILES['newImages']['name'] as $key => $image) {
            $_FILES['newImages[]']['name'] = $_FILES['newImages']['name'][$key];
            $_FILES['newImages[]']['type'] = $_FILES['newImages']['type'][$key];
            $_FILES['newImages[]']['tmp_name']= $_FILES['newImages']['tmp_name'][$key];
            $_FILES['newImages[]']['error']= $_FILES['newImages']['error'][$key];
            $_FILES['newImages[]']['size']= $_FILES['newImages']['size'][$key];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('newImages[]')) {
                $this->ErrorsModel->newError('danger', 'Ошибка!', 'Файл не был загружен, попробуйте загрузить другой файл.');
                break;
            }
            else {
                $data = $this->upload->data();
                $this->ErrorsModel->newError('success', 'Успешно!', 'Файл загружен!');
            }
            $file_names[] = $data['file_name'];
            $config['file_name']++;
        }
        return $file_names;
    }
    public function newspaperImage(){
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 2048;
        $config['max_height'] = 1080;
        $config['file_name'] = time();
        $config['upload_path'] = IMG_NEWSPAPER_PATH;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('newspaperImage'))
        {
            $this->ErrorsModel->newError('danger', 'Ошибка!', 'Файл не был загружен, попробуйте загрузить другой файл.');
        }
        else
        {
            $data = $this->upload->data();
            $this->ErrorsModel->newError('success', 'Успешно!', 'Файл загружен!');
            return $data['file_name'];
        }
    }
    public function newspaperFile(){
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 1000000000;
        $config['file_name'] = time();
        $config['upload_path'] = PDF_NEWSPAPER_PATH;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('newspaperPDF'))
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            $this->ErrorsModel->newError('danger', 'Ошибка!', 'Файл не был загружен, попробуйте загрузить другой файл.');
        }
        else
        {
            $data = $this->upload->data();
            $this->ErrorsModel->newError('success', 'Успешно!', 'Файл загружен!');
            return $data['file_name'];
        }
    }
}



?>