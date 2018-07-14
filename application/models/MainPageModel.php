<?
class MainPageModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
	}
	
	public function getBlocks(){
		$result = $this->db->select('*');
		$query = $this->db->get('main_page');
		return $query->result_array();
	}
	
}



?>