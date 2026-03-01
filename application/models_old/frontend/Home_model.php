<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    

    public function getDataAbout()
    {
        $sql = "SELECT * FROM abouts LIMIT 1";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataAboutDetail()
    {
        $sql = "SELECT * FROM about_details LIMIT 3";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataBanner()
    {
        $sql = "SELECT * FROM banner_headers WHERE category_id = '1'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataCategories()
    {
        $sql = "SELECT * FROM categories WHERE slug != 'home'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataService()
    {
        $sql = "SELECT * FROM categories WHERE slug != 'home'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataNews()
    {
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataReview()
    {
        $sql = "SELECT * FROM reviews ORDER BY created_at DESC";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataFaq()
    {
        $sql = "SELECT * FROM faqs ORDER BY id ASC";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getSocialMedia()
    {
        $sql = "SELECT * FROM companies_sosmed";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }
}