<?php

class News_model extends CI_Model
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
        $this->db->insert('news', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('news', $data);
    }

    public function get_news($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('*', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('news')
            ->result_object();
    }

    public function count_news($data = NULl)
    {
        return $this->base_query('COUNT(news.id) as total', $data)
            ->get('news')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('news.*')
                ->from('news')
                ->where('news.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('news');
    }
}