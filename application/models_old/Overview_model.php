<?php

class Overview_model extends CI_Model
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
            ->join('categories c', 'c.id = overviews.category_id', 'left')
            ->where('(overviews.title LIKE \'%'.$match.'%\' 
                or overviews.description LIKE \'%'.$match.'%\')');
        
        if (isset($data['slug'])) {
            $slug = $data['slug'];
            $query->where("overviews.category_id = (SELECT id FROM categories WHERE slug = '$slug') ");
        }

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('overviews', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('overviews', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('overviews.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('overviews')
            ->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query('COUNT(overviews.id) as total', $data)
            ->get('overviews')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('overviews.*, c.name as c_name')
                ->join('categories c', 'c.id = overviews.category_id', 'left')
                ->from('overviews')
                ->where('overviews.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('overviews');
    }
}