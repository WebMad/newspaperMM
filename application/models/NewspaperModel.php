<?
class NewspaperModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
		$this->load->model('FilesModel');
	}
	public function getNewspaperById($id,$fields = '')
    {
        if(!empty($fields)){
            $fields = explode(",", $fields);
            $this->db->select($fields);
        }
        $query = $this->db->get_where("newspapers", array('id' => $id));

        $row = $query->result_array();
        if(count($row)>0){
            $result = array_shift($row);
            return $result;
        }
        else{
            return false;
        }
    }

    public function getNewspapers($fields = ''){
        if(!empty($fields)){
            $fields = explode(",", $fields);
            $this->db->select($fields);
        }
        $query = $this->db->get("newspapers");
        $row = $query->result_array();
        return $row;
    }

    public function addNewspaper(){
	    $data['text'] = $_POST['text'];
        $data['img'] = $this->FilesModel->newspaperImage();
        $data['filename'] = $this->FilesModel->newspaperFile();
        $this->db->insert("newspapers", $data);
    }

}



?>