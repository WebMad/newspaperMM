<?
class InformationModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	//GET

    public function getAll()
    {
        $data = $this->db->get('information')->result_array();
        $result = array();
        foreach($data as $block){
            $result[$block['type']] = $block['text'];
        }
        return $result;
    }
	public function getContacts()
    {
        $data = $this->db->get_where('information', array('type' => 'contacts'))->result_array();
        return $data[0];
    }
    public function getEditorialBoard()
    {
        $data = $this->db->get_where('information', array('type' => 'editorial_board'))->result_array();
        return $data[0];
    }
    public function getAboutUs()
    {
        $data = $this->db->get_where('information', array('type' => 'about_us'))->result_array();
        return $data[0];
    }

    //SET

    public function setContacts($text = "Тут какой-то текст")
    {
        $this->db->set('text', $text);
        $this->db->where('type', 'contacts');
        $this->db->update('information');
    }
    public function setEditorialBoard($text = "Тут какой-то текст")
    {
        $this->db->set('text', $text);
        $this->db->where('type', 'editorial_board');
        $this->db->update('information');
    }
    public function setAboutUs($text = "Тут какой-то текст")
    {
        $this->db->set('text', $text);
        $this->db->where('type', 'about_us');
        $this->db->update('information');
    }


}



?>