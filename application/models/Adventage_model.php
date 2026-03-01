<?php

class Adventage_model extends CI_Model
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
            ->join('categories c', 'c.id = adventages.category_id', 'left')
            ->where('(adventages.title LIKE \'%'.$match.'%\' 
                or adventages.description LIKE \'%'.$match.'%\')');

        if (isset($data['slug'])) {
            $slug = $data['slug'];
            $query->where("adventages.category_id = (SELECT id FROM categories WHERE slug = '$slug') ");
        }
        
        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('adventages', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('adventages', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('adventages.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('adventages')
            ->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query('COUNT(adventages.id) as total', $data)
            ->get('adventages')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('adventages.*, c.name as c_name')
                ->join('categories c', 'c.id = adventages.category_id', 'left')
                ->from('adventages')
                ->where('adventages.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('adventages');
    }
}