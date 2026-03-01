<?php

class Testimony_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_testimonies($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
                ->where('(name LIKE \'%'.$match.'%\' 
                    or description LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if (isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('testimonies');

        return $query->result_object();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get('testimonies')->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('testimonies');
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('testimonies', $data);
    }

    public function create_data($data) 
    {
        $this->db->insert('testimonies', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}