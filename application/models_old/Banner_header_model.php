<?php

class Banner_header_model extends CI_Model
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
            ->join('categories c', 'c.id = banner_headers.category_id', 'left')
            ->where('(banner_headers.title LIKE \'%'.$match.'%\' 
                or banner_headers.description LIKE \'%'.$match.'%\')');

        if (isset($data['slug'])) {
            $slug = $data['slug'];
            $query->where("banner_headers.category_id = (SELECT id FROM categories WHERE slug = '$slug') ");
        }

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('banner_headers', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('banner_headers', $data);
    }

    public function get_banner_header($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('banner_headers.*, c.name as c_name', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('banner_headers')
            ->result_object();
    }

    public function count_banner_header($data = NULl)
    {
        return $this->base_query('COUNT(banner_headers.id) as total', $data)
            ->get('banner_headers')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('banner_headers.*, c.name as c_name')
                ->join('categories c', 'c.id = banner_headers.category_id', 'left')
                ->from('banner_headers')
                ->where('banner_headers.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('banner_headers');
    }
}