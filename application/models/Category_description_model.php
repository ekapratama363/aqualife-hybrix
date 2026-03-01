<?php

class Category_description_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    private function base_query($select, $data)
    {
        $match = isset($data['search']) ? $data['search'] : '';

        $query = $this->db
            ->select($select);

        if (isset($data['position'])) {
            $query->where('category_descriptions.position', $data['position']);
        }

        $query
            ->join('categories c', 'c.id = category_descriptions.category_id', 'left')
            ->where('(category_descriptions.title LIKE \'%'.$match.'%\' 
                or category_descriptions.description LIKE \'%'.$match.'%\')');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('category_descriptions', $data);
        return $this->db->insert_id();
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('category_descriptions', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('category_descriptions.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('category_descriptions')
            ->result_object();
    }

    public function count_data($data = NULL)
    {
        return $this->base_query('COUNT(category_descriptions.id) as total', $data)
            ->get('category_descriptions')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->select('category_descriptions.*, c.name as c_name')
            ->from('category_descriptions')
            ->join('categories c', 'c.id = category_descriptions.category_id', 'left')
            ->where('category_descriptions.id', $id)
            ->get()
            ->row_object();
    }

    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('category_descriptions');
    }
}
