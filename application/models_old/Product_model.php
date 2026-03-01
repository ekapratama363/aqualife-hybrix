<?php

class Product_model extends CI_Model
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
            ->join('categories c', 'c.id = products.category_id', 'left')
            ->where('(products.name LIKE \'%'.$match.'%\' 
                or link LIKE \'%'.$match.'%\')');

        if (isset($data['slug'])) {
            $slug = $data['slug'];
            $query->where("products.category_id = (SELECT id FROM categories WHERE slug = '$slug') ");
        }
        
        return $query;
    }

    private function name_description($modelIdsStr)
    {
        // Run the query safely
        $category_names_query = "SELECT name FROM categories WHERE id IN ($modelIdsStr)";
        $category_names = $this->db->query($category_names_query)->result_array();

        // Extract category names into an array
        $category_names_list = array_column($category_names, 'name');

        // Build the LIKE conditions dynamically
        $like_conditions = '';
        foreach ($category_names_list as $key => $category_name) {
            $or_condition = $key == 0 ? '' : 'OR';

            $category_name = strtolower($category_name);
            $like_conditions .= " $or_condition LOWER(description) LIKE '%$category_name%'";
        }

        return $like_conditions;
    }

    public function create_data($data)
    {
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('products', $data);
    }

    public function get_products($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('products.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('products')
            ->result_object();
    }

    public function count_product($data = NULl)
    {
        return $this->base_query('COUNT(products.id) as total', $data)
            ->get('products')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('products.*, c.name as c_name')
                ->from('products')
                ->join('categories c', 'c.id = products.category_id', 'left')
                ->where('products.id', $id)
                ->get()
                ->row_object();
    }

    public function get_product_images($data = NULL) 
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
                ->where('(images LIKE \'%'.$match.'%\' 
                    or id LIKE \'%'.$match.'%\')')
                ->where('product_id', isset($data['product_id']) ? $data['product_id'] : '')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if (isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('product_images');

        return $query->result_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('products');
    }
}