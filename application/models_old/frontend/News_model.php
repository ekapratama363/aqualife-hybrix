<?php

class News_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getDataListNews()
    {
        $sql = "SELECT news.*, SUBSTRING(description,1,150) AS substr FROM news ORDER BY id DESC";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataDetailNews($id=null)
    {
        $sql = "SELECT * FROM news WHERE id = '$id'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }
}