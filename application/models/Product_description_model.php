<?php

class Product_description_model extends CI_Model
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
            $query->where('position', $data['position']);
        }

        $query
            ->join('products p', 'p.id = product_descriptions.product_id', 'left')
            ->where('(product_descriptions.title LIKE \'%'.$match.'%\' 
                or product_descriptions.description LIKE \'%'.$match.'%\')');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('product_descriptions', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('product_descriptions', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('product_descriptions.*, p.name as p_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('product_descriptions')
            ->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query('COUNT(product_descriptions.id) as total', $data)
            ->get('product_descriptions')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('product_descriptions.*, p.name as p_name')
                ->from('product_descriptions')
                ->join('products p', 'p.id = product_descriptions.product_id', 'left')
                ->where('product_descriptions.id', $id)
                ->get()
                ->row_object();
    }

    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('product_descriptions');
    }
}