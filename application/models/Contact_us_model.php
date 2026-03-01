<?php

class Contact_us_model extends CI_Model
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
            ->where('(
                    name LIKE \'%'.$match.'%\' 
                    or phone LIKE \'%'.$match.'%\'
                    or email LIKE \'%'.$match.'%\'
                )');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('contact_us', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('contact_us', $data);
    }

    public function get_order($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('contact_us.*', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('contact_us')
            ->result_object();
    }

    public function count_order($data = NULl)
    {
        return $this->base_query('COUNT(contact_us.id) as total', $data)
            ->get('contact_us')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->from('contact_us')
                ->where('contact_us.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('contact_us');
    }
}