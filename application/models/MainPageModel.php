<?
class MainPageModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
		$this->load->model('NewsModel');
	}
	
	public function getBlocks($where){
	    $this->db->where('type', $where);
		$query = $this->db->get('main_page');
		return $query->result_array();
	}

	public function getNewsBlock(){
        $resources = $this->getBlocks('news');

        $ids = json_decode($resources['0']['content']);

        foreach($ids as $id){
            $data['news'][] = $this->NewsModel->getNewById($id, 'id,title,annotation,date');
        }

        return $data;

    }
    public function getMainNewBlock(){
        $resources = $this->getBlocks('main_new');
        $id = $resources['0']['content'];
        $result = $this->NewsModel->getNewById($id, 'id,title,annotation,date');

        return $result;

    }
	
}



?>