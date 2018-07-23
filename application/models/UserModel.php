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
	public function deleteUser($id){
        $data = $this->getUserById($id, 'photo');
        if(is_file(IMG_USER_PATH . $data['photo']) && $data['photo'] != DEFAULT_IMG_USER_NAME){
            unlink(IMG_USER_PATH . $data['photo']);
        }
	    $this->db->delete('users', array('id' => $id));
    }
    public function addUser($name, $surname, $password, $email, $type, $img = DEFAULT_IMG_USER_NAME){
        $data = array(
            'name' => $name,
            'surname' => $surname,
            'password' => $password,
            'email' => $email,
            'type' => $type,
            'photo' => $img,
        );
        $this->db->insert('users',$data);
        $id = $this->db->insert_id();
        return $id;
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