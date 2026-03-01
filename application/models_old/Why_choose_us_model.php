<?php

class Why_choose_us_model extends CI_Model
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
            ->join('categories c', 'c.id = why_choose_us.category_id', 'left')
            ->where('(why_choose_us.title LIKE \'%'.$match.'%\' 
                or why_choose_us.description LIKE \'%'.$match.'%\')');

        if (isset($data['slug'])) {
            $slug = $data['slug'];
            $query->where("why_choose_us.category_id = (SELECT id FROM categories WHERE slug = '$slug') ");
        }

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('why_choose_us', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('why_choose_us', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('why_choose_us.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('why_choose_us')
            ->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query('COUNT(why_choose_us.id) as total', $data)
            ->get('why_choose_us')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('why_choose_us.*, c.name as c_name')
                ->join('categories c', 'c.id = why_choose_us.category_id', 'left')
                ->from('why_choose_us')
                ->where('why_choose_us.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('why_choose_us');
    }
}