<?
class MainPageModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
		$this->load->model('NewsModel');
		$this->load->model('NewspaperModel');
	}
	
	public function getBlocks($fields = ''){
	    if(!empty($fields)) {
            $this->db->select($fields);
        }
		$query = $this->db->get('main_page');
		return $query->result_array();
	}

	public function getNewsBlock(){
        $resources = $this->getBlocks('news');
        $ids = json_decode($resources[0]['news']);
        if(count($ids) > 0) {
            foreach ($ids as $id) {
                $data[] = $this->NewsModel->getNewById($id, 'id,title,annotation,date');
            }
        }
        else{
            $data = '';
        }
        return $data;

    }
    public function getNewspapersBlock(){
        $resources = $this->getBlocks('newspapers');
        $ids = json_decode($resources[0]['newspapers']);
        if(count($ids) > 0) {
            foreach ($ids as $id) {
                $data[] = $this->NewspaperModel->getNewspaperById($id, 'id,text,filename,img,date');
            }
        }
        else{
            $data = '';
        }

        return $data;

    }
    public function getAuthorsBlock(){
        $resources = $this->getBlocks('authors');
        $ids = json_decode($resources[0]['authors']);
        if(count($ids) > 0) {
            foreach($ids as $id){
                $data[] = $this->UserModel->getUserById($id, 'id,name,surname,photo');
            }
        }
        else{
            $data = '';
        }

        return $data;

    }
    public function getMainNewBlock()
    {
        $resources = $this->getBlocks('main_new');
        $ids = json_decode($resources[0]['main_new']);
        if(count($ids) > 0){
            foreach ($ids as $id) {
                $data[] = $this->NewsModel->getNewById($id, 'id,title,annotation,date');
            }
        }
        else{
            $data = '';
        }
        return $data;

    }
	
}



?>