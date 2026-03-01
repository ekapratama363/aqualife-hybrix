<?php

class user_model extends CI_Model
{
    CONST ROLE = [
        'ADMIN' => 1,
        'Petugas' => 2,
        'Teknisi' => 3,
    ];

    public function __construct()
    {
        $this->load->database();
    }

    public function auth_login($data)
    {
        return $this->db->get_where('users', $data)->row_object(); 
    }

    public function get_by_email_and_role($email, $roles_name)
    {
        return $this->db->where('email', $email)
            ->select('users.*, roles.name as role_name')
			->join('roles', 'users.id_role  = roles.id', 'left')
            ->where_in('roles.name', $roles_name)
            ->where('users.is_not_active', null)
            ->get('users')
            ->row_object();
    }

    public function auth_role($data)
    {
        $data_roles = $this->db->get_where('roles', $data)->row_object(); 
        return $data_roles;
    }

    public function get_petugas($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(email LIKE \'%'.$match.'%\')')
                ->where('id_role = 2')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('users');

        return $query->result_object();
    }
    
    public function get_teknisi($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(email LIKE \'%'.$match.'%\')')
                ->where('id_role = 3')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('users');

        return $query->result_object();
    }

    public function set_data($data) 
    {
        return $this->db->insert('users', $data);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_object();
    }

    public function update_by_id($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function get_petugas_active($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(email LIKE \'%'.$match.'%\')')
                ->where('id_role = 2')
                ->where('is_not_active IS NULL')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('users');

        return $query->result_object();
    }

    public function get_teknisi_active($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(email LIKE \'%'.$match.'%\')')
                ->where('id_role = 3')
                ->where('is_not_active IS NULL')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('users');

        return $query->result_object();
    }

}