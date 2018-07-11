<?
class UserModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
	}
	
	public function getUserById($id, $fields = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
			
		}
		$query = $this->db->get_where("users", array('id' => $id));
		
		$result = array_shift($query->result_array());
		return $result;
	}
	
	public function getUserByEmail($email, $fields = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
		}
		$query = $this->db->get_where("users", array('email' => $email));
		$row = $query->result_array();
		
		$result = array_shift($row);
		return $result;
	}
	public function getUsers($fields = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
		}
		$query = $this->db->get("users");
		
		return $query->result_array();
	}
	public function isValid(string $email = '', string $password = ''){
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
	}
	
}



?>