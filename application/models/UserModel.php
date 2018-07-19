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
		
		$row = $query->result_array();
		if(count($row)>0){
			$result = array_shift($row);
			return $result;
		}
		else{
			return false;
		}
	}
	
	public function getUserByEmail($email, $fields = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
		}
		$query = $this->db->get_where("users", array('email' => $email));
		$row = $query->result_array();
		if(count($row)>0){
			$result = array_shift($row);
			return $result;
		}
		else{
			return false;
		}
	}
	public function getUsers($fields = '', $where = ''){
		if(!empty($fields)){
			$fields = explode(",", $fields);
			$this->db->select($fields);
		}
		if(!empty($where)){
			$this->db->where($where);
		}
		$query = $this->db->get("users");
		
		return $query->result_array();
	}
	
	public function updateDataUser($id,$data){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		
	}
	
	public function updateSessionUser($id = ''){
		if(!empty($id)){
			if($this->getUserById($id)){
				$data = $this->getUserById($id, 'name,surname,email,photo,type');
				$to_session = array(
					'id' => $id,
					'email' => $data['email'],
					'name' => $data['name'],
					'surname' => $data['surname'],
					'photo' => $data['photo'],
					'type' => $data['type'],
					'viewed' => array(),
				);
				$this->session->set_userdata($to_session);
				return true;
			}
			else{
				return false;
			}
		}
		return false;
	}
	
	public function isValid($email = '', $password = ''){
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