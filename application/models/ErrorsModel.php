<?
class ErrorsModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
	}
	public function newError($type = 'error', $title='Ошибка!', $message='Произошло что-то страшное...'){

        $error = array(
            'error' => array(
                'title' => $title,
                'msg' => $message,
                'type' => $type,
            )

        );
        $this->session->set_userdata($error);
    }
	
}



?>