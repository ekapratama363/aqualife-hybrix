<?php

class About_detail_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_data($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
                ->where('(title LIKE \'%'.$match.'%\' 
                    or subtitle LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('about_details');

        return $query->result_object();
    }

    public function delete_data()
    {
        return $this->db->query('DELETE FROM about_details');
    }

    public function create_batch($data) 
    {
        return $this->db->insert_batch('about_details', $data);
    }
}