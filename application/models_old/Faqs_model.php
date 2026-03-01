<?php

class Faqs_model extends CI_Model
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
            ->where('(title LIKE \'%'.$match.'%\' 
                or description LIKE \'%'.$match.'%\')');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('faqs', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('faqs', $data);
    }

    public function get_faqs($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('*', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('faqs')
            ->result_object();
    }

    public function count_faqs($data = NULl)
    {
        return $this->base_query('COUNT(faqs.id) as total', $data)
            ->get('faqs')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('faqs.*')
                ->from('faqs')
                ->where('faqs.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('faqs');
    }
}