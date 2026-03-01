<?php

class user_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function auth_login($data)
    {
        return $this->db->get_where('users', $data)->row_object(); 
    }

    private function base_query($select, $data)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
            ->select($select)
            ->where('(name LIKE \'%'.$match.'%\' 
                or email LIKE \'%'.$match.'%\')');

        return $query;
    }

    public function create_data($data)
    {
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_by_id($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('users', $data);
    }

    public function get_data($limit = NULL, $start = NULL, $data = NULL)
    {
        return $this->base_query('id, name, email', $data)
            ->order_by($data['sort_field'], isset($data['order']) ? $data['order'] : 'desc')
            ->limit($limit, $start)
            ->get('users')
            ->result_object();
    }

    public function count_data($data = NULl)
    {
        return $this->base_query('COUNT(users.id) as total', $data)
            ->get('users')
            ->row_object();
    }

    public function get_by_id($id)
    {
        return $this->db
                ->select('users.*')
                ->from('users')
                ->where('users.id', $id)
                ->get()
                ->row_object();
    }
    
    public function delete_by_id($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }

    public function email_check($id)
    {
        $exists = $this->db
            ->where('id !=', $id) // abaikan user yang sedang diedit
            ->get('users')
            ->row();

        if ($exists) {// inilah bagian penting ðŸ‘‡
            $this->form_validation->set_message(
                'email_check',
                'Email sudah digunakan user lain.'
            );
            return false;
        }

        return true;
    }
}