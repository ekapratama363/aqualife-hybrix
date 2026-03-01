<?php

class Company_sosmed_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_company_sosmeds($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db
                ->where('(name LIKE \'%'.$match.'%\' 
                    or account LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('companies_sosmed');

        return $query->result_object();
    }

    public function delete_data()
    {
        return $this->db->query('DELETE FROM companies_sosmed');
    }

    public function create_batch($data) 
    {
        return $this->db->insert_batch('companies_sosmed', $data);
    }
}