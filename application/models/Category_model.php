<?php

class Category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    private function base_query($data, $select)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
            ->select($select)
            ->where('(name LIKE \'%'.$match.'%\' 
                or description LIKE \'%'.$match.'%\')')
            ->where("category_id IS NOT NULL")
            ->order_by('id', isset($data['order']) ? 'desc' : 'asc');

        if (isset($data['slug'])) {
            $query->where('slug', $data['slug']);
        }
        if (isset($data['category_id'])) {
            $query->where('c.category_id', $data['category_id']);
        }
        if (isset($data['level']) && (int)$data['level'] === 1) {
            $query->where('c.category_id IS NULL');
        }
        
        return $query;
    }

    public function get_categories($data = NULL)
    {
        $query = $this->base_query($data, '*');
        
        if (isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        return $query->get('categories c')->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query($data, 'COUNT(c.id) as total')
            ->get('categories c')
            ->row_object();
    }

    public function delete_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('categories');
    }

    public function get_by_multiple_id($id)
    {
        if (empty($id) || !is_array($id)) {
            return [];
        }
        
        return $this->db
            ->select('*')
            ->from('categories c')
            ->where_in('c.id', $id)
            ->get()
            ->result_object();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->select('*')
            ->from('categories c')
            ->where('c.id', $id)
            ->get()
            ->row_object();
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('categories', $data);
    }

    public function create_data($data) 
    {
        $this->db->insert('categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    /**
     * Get parent categories (root level, category_id IS NULL)
     */
    public function get_parents()
    {
        return $this->db
            ->select('*')
            ->from('categories c')
            ->where('c.category_id IS NULL')
            ->order_by('c.name', 'ASC')
            ->get()
            ->result_object();
    }

    /**
     * Get category tree recursively
     */
    public function get_tree($parent_id = null)
    {
        $this->db->select('*')->from('categories c');
        $parent_id === null
            ? $this->db->where('c.category_id IS NULL')
            : $this->db->where('c.category_id', $parent_id);
        $rows = $this->db->order_by('c.name', 'ASC')->get()->result_object();
        foreach ($rows as $cat) {
            $cat->children = $this->get_tree($cat->id);
        }
        return $rows;
    }

    /**
     * Get all categories for parent dropdown, excluding given id and its descendants
     */
    public function get_all_for_parent_select($exclude_id = null)
    {
        $ids_to_exclude = $exclude_id ? $this->get_descendant_ids($exclude_id) : [];
        $ids_to_exclude[] = $exclude_id;
        $ids_to_exclude = array_filter($ids_to_exclude);

        $query = $this->db->select('*')->from('categories c')->order_by('c.category_id', 'ASC')->order_by('c.name', 'ASC');
        if (!empty($ids_to_exclude)) {
            $query->where_not_in('c.id', $ids_to_exclude);
        }
        return $query->get()->result_object();
    }

    /**
     * Get all descendant ids recursively (for circular ref prevention)
     */
    private function get_descendant_ids($category_id)
    {
        $children = $this->db->select('id')->from('categories')->where('category_id', $category_id)->get()->result_object();
        $ids = [];
        foreach ($children as $c) {
            $ids[] = $c->id;
            $ids = array_merge($ids, $this->get_descendant_ids($c->id));
        }
        return $ids;
    }

    /**
     * Check if new_parent_id is valid (no circular reference)
     */
    public function is_valid_parent($category_id, $new_parent_id)
    {
        if (empty($new_parent_id)) {
            return true;
        }
        if ((int)$new_parent_id === (int)$category_id) {
            return false;
        }
        $descendants = $this->get_descendant_ids($category_id);
        if (in_array((int)$new_parent_id, array_map('intval', $descendants))) {
            return false;
        }
        return true;
    }

    /**
     * Count children of a category
     */
    public function count_children($category_id)
    {
        return $this->db->from('categories')->where('category_id', $category_id)->count_all_results();
    }

    /**
     * Get category by slug
     */
    public function get_by_slug($slug)
    {
        return $this->db->select('*')->from('categories c')->where('c.slug', $slug)->get()->row_object();
    }

    /**
     * Get direct children of a category (for sidebar sub-menus)
     */
    public function get_children($parent_id)
    {
        return $this->db->select('*')->from('categories c')
            ->where('c.category_id', $parent_id)
            ->order_by('c.name', 'ASC')
            ->get()
            ->result_object();
    }
}