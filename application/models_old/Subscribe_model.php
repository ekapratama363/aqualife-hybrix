<?php

class Subscribe_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    private function base_query($select, $data)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
            ->select($select)
            ->where('(
                    email LIKE \'%'.$match.'%\' 
                )');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('subscribes', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('subscribes', $data);
    }

    public function get_order($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('subscribes.*', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('subscribes')
            ->result_object();
    }

    public function count_order($data = NULl)
    {
        return $this->base_query('COUNT(subscribes.id) as total', $data)
            ->get('subscribes')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('subscribes.*')
                ->from('subscribes')
                ->where('subscribes.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('subscribes');
    }
}