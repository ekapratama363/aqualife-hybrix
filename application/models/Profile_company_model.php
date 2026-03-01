<?php

class Profile_company_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_profile_company()
    {   
        return $this->db->get('companies_profile')->row_object();
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('companies_profile', $data);
    }

    public function create_data($data) 
    {
        $this->db->insert('companies_profile', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}