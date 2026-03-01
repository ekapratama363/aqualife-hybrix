<?php

class About_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_about()
    {   
        return $this->db->get('abouts')->row_object();
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('abouts', $data);
    }

    public function create_data($data) 
    {
        $this->db->insert('abouts', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}