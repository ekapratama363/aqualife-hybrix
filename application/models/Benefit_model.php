<?php

class Benefit_model extends CI_Model
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
            ->where('(benefits.title LIKE \'%'.$match.'%\' 
                or benefits.description LIKE \'%'.$match.'%\')');

        if (isset($data['slug'])) {
            $slug = $data['slug'];
            $query->where("
                JSON_CONTAINS(
                    benefits.category_id, 
                    JSON_QUOTE(
                        CAST((SELECT id FROM categories WHERE slug = " . $this->db->escape($slug) . ") AS CHAR)
                    )
                )
            ", null, false);
        }

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('benefits', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('benefits', $data);
    }

    public function get_benefits($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('benefits.*, (SELECT GROUP_CONCAT(name SEPARATOR ", ") FROM categories WHERE JSON_CONTAINS(benefits.category_id, JSON_QUOTE(CAST(categories.id AS CHAR)))) as categories', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('benefits')
            ->result_object();
    }

    public function count_benefit($data = NULl)
    {
        return $this->base_query('COUNT(benefits.id) as total', $data)
            ->get('benefits')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->from('benefits')
                ->where('benefits.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('benefits');
    }
}