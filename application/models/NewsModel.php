<?
class NewsModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
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
		$query = $this->db->insert("news", $data);
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