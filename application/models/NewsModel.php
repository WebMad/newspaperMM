<?
class NewsModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
		$this->load->model('FilesModel');
	}
	
	public function getNewById($id, $fields = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
		}
		$query = $this->db->get_where("news", array('id' => $id));
		$result = $query->result_array();
		$result = array_shift($result);
		return $result;
	}
    public function getPopularNews(){
        $this->db->order_by('views', 'desc');
        $this->db->select(array('id','title','views'));
        $query = $this->db->get("news", 5);
        $result = $query->result_array();
        return $result;
    }
	public function updateDataNew($id,$data){
        $this->db->where('id', $id);
	    $this->db->update('news', $data);
    }
    public function addView($id, $count = 1){
	    $this->db->set('views', 'views + ' . $count, false);
        $this->db->where('id', $id);
        $this->db->update('news');
    }
	/*public function getUserByEmail($email, $fields = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
		}
		$query = $this->db->get_where("users", array('email' => $email));
		$row = $query->result_array();
		
		$result = array_shift($row);
		return $result;
	}*/
	public function getNews($fields = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
		}
		$query = $this->db->get("news");
		
		return $query->result_array();
	}
	public function addNew(){
		$data['title'] = $_POST['title'];
		$data['text'] = $_POST['text'];
		$data['annotation'] = $_POST['annotation'];
		$data['images'] = json_encode($this->FilesModel->newImage(), JSON_UNESCAPED_UNICODE);
		$this->db->insert("news", $data);
	}
	public function isValid($id){
		$data = $this->getNewById($id, 'id');
		
		if(count($data)>0)
			return true;
		else
			false;
	}
	/*public function isValid(string $email = '', string $password = ''){
		$query = $this->db->get_where("users", array('email' => $email, 'password' => $password));
		if(count($query->result_array()) == 1){
			return true;
		}
		elseif(count($query->result_array()) > 1){
			//потом сделать выбор аккаунта, с которого хочет зайти пользователь
			return false;
		}
		else{
			return false;
		}
	}*/
	
}



?>