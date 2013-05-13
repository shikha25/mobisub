<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Title_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get($id)
    {
    	$query = $this->db->get_where('title', array('id' => $id));
        return $query->result();
    }

    function insert($title)
    {
        $this->db->insert('title', array('title' => $title));
        return $this->db->insert_id();
    	//return insert id
    }

    //parameters will be primary key id and $data to be passed as an array
    function update($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('title', $data);

		return $id;
    }

    function delete($id)
    {
        //delete the movie entry
        $this->db->delete('title', array('id' => $id)); 
    }
}

/* End of file titlemodel.php */
/* Location: ./application/models/movieapi/titlemodel.php */