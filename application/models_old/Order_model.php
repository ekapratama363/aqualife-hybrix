<?php

class Order_model extends CI_Model
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
            ->join('categories c', 'c.id = orders.category_id', 'left')
            ->where('(
                    first_name LIKE \'%'.$match.'%\' 
                    or last_name LIKE \'%'.$match.'%\'
                    or address LIKE \'%'.$match.'%\'
                    or phone LIKE \'%'.$match.'%\'
                    or email LIKE \'%'.$match.'%\'
                )');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('orders', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('orders', $data);
    }

    public function get_order($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('orders.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('orders')
            ->result_object();
    }

    public function count_order($data = NULl)
    {
        return $this->base_query('COUNT(orders.id) as total', $data)
            ->get('orders')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('orders.*, c.name as c_name')
                ->from('orders')
                ->join('categories c', 'c.id = orders.category_id', 'left')
                ->where('orders.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('orders');
    }
}