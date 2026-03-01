<?php

class Did_you_know_point_model extends CI_Model
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
            ->join('categories c', 'c.id = did_you_know_points.category_id', 'left')
            ->where('(did_you_know_points.title LIKE \'%'.$match.'%\' 
                or did_you_know_points.description LIKE \'%'.$match.'%\')');

        if (isset($data['slug'])) {
            $slug = $data['slug'];
            $query->where("did_you_know_points.category_id = (SELECT id FROM categories WHERE slug = '$slug') ");
        }
        
        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('did_you_know_points', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('did_you_know_points', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('did_you_know_points.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('did_you_know_points')
            ->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query('COUNT(did_you_know_points.id) as total', $data)
            ->get('did_you_know_points')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('did_you_know_points.*, c.name as c_name')
                ->join('categories c', 'c.id = did_you_know_points.category_id', 'left')
                ->from('did_you_know_points')
                ->where('did_you_know_points.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('did_you_know_points');
    }
}