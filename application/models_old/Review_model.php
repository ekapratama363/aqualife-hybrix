<?php

class Review_model extends CI_Model
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
            ->where('(name LIKE \'%'.$match.'%\' 
                or description LIKE \'%'.$match.'%\')');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('reviews', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('reviews', $data);
    }

    public function get_review($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('*', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('reviews')
            ->result_object();
    }

    public function count_review($data = NULl)
    {
        return $this->base_query('COUNT(reviews.id) as total', $data)
            ->get('reviews')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('reviews.*')
                ->from('reviews')
                ->where('reviews.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('reviews');
    }
}