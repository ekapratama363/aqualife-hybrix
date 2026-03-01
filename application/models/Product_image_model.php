<?php

class Product_image_model extends CI_Model
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
            ->join('products p', 'p.id = product_images.product_id', 'left')
            ->where('(product_images.title LIKE \'%'.$match.'%\' 
                or product_images.description LIKE \'%'.$match.'%\')');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('product_images', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('product_images', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('product_images.*, p.name as p_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('product_images')
            ->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query('COUNT(product_images.id) as total', $data)
            ->get('product_images')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('product_images.*, p.name as p_name')
                ->from('product_images')
                ->join('products p', 'p.id = product_images.product_id', 'left')
                ->where('product_images.id', $id)
                ->get()
                ->row_object();
    }

    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('product_images');
    }
}