<?php

class Category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    private function base_query($data, $select)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
            ->select($select)
            ->where('slug !=', 'home')
            ->where('(name LIKE \'%'.$match.'%\' 
                or description LIKE \'%'.$match.'%\')')
            ->order_by('id', isset($data['order']) ? 'desc' : 'asc');

        if (isset($data['slug'])) {
            $query->where('slug', $data['slug']);
        }
        
        return $query;
    }

    public function get_categories($data = NULL)
    {
        $query = $this->base_query($data, '*');
        
        if (isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        return $query->get('categories c')->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query($data, 'COUNT(c.id) as total')
            ->get('categories c')
            ->row_object();
    }

    public function delete_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('categories');
    }

    public function get_by_multiple_id(array $id)
    {
        if (!$id) {
            return [];
        }
        
        return $this->db
            ->select('*')
            ->from('categories c')
            ->where_in('c.id', $id)
            ->get()
            ->result_object();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->select('*')
            ->from('categories c')
            ->where('c.id', $id)
            ->get()
            ->row_object();
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('categories', $data);
    }

    public function create_data($data) 
    {
        $this->db->insert('categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}