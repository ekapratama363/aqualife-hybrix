<?php

class Product_detail_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function create_data($data)
    {
        return $this->db->insert_batch('product_details', $data);
    }

    public function delete_by_product_id($productId)
    {
        return $this->db->where('product_id', $productId) ->delete('product_details'); 
    }

    public function get_by_product_id($productId)
    {
        return $this->db
                ->select('*')
                ->from('product_details')
                ->where('product_id', $productId)
                ->get()
                ->result_object();
    }
}