<?php

class WaterTreatment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getDataBanner()
    {
        $sql = "SELECT 
                        banner_headers.* 
                    FROM 
                        banner_headers 
                    LEFT JOIN categories ON categories.id = banner_headers.category_id 
                    WHERE 
                        categories.slug = 'water_treatment_plant' 
                    LIMIT 1";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataOverviews()
    {
        // $sql = "SELECT * FROM overviews WHERE category_id = '3' LIMIT 1";

        $sql = "SELECT 
                        overviews.* 
                    FROM 
                        overviews 
                    LEFT JOIN categories ON categories.id = overviews.category_id 
                    WHERE 
                        categories.slug = 'water_treatment_plant' 
                    LIMIT 1";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataDid()
    {
        // $sql = "SELECT * FROM did_you_knows WHERE category_id = '3' LIMIT 1";

        $sql = "SELECT 
                        did_you_knows.* 
                    FROM 
                        did_you_knows 
                    LEFT JOIN categories ON categories.id = did_you_knows.category_id 
                    WHERE 
                        categories.slug = 'water_treatment_plant' 
                    LIMIT 1";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataDidPoint()
    {
        // $sql = "SELECT * FROM did_you_knows WHERE category_id = '3' LIMIT 1";

        $sql = "SELECT 
                        did_you_know_points.* 
                    FROM 
                        did_you_know_points 
                    LEFT JOIN categories ON categories.id = did_you_know_points.category_id 
                    WHERE 
                        categories.slug = 'water_treatment_plant'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataBenefit()
    {
        // $sql = "SELECT * FROM benefits WHERE category_id = '3' LIMIT 6";

        $sql = "SELECT 
                        benefits.* 
                    FROM 
                        benefits 
                    LEFT JOIN categories ON categories.id = benefits.category_id 
                    WHERE 
                        categories.slug = 'water_treatment_plant' 
                    LIMIT 6";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataAdvantages()
    {
        // $sql = "SELECT * FROM adventages WHERE category_id = '3' LIMIT 1";

        $sql = "SELECT 
                        adventages.* 
                    FROM 
                        adventages 
                    LEFT JOIN categories ON categories.id = adventages.category_id 
                    WHERE 
                        categories.slug = 'water_treatment_plant' 
                    LIMIT 1";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataProducts()
    {
        // $sql = "SELECT * FROM products WHERE category_id = '7'";

         $sql = "SELECT 
                        products.* 
                    FROM 
                        products 
                    LEFT JOIN categories ON categories.id = products.category_id 
                    WHERE 
                        categories.slug = 'water_treatment_plant'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataProductsDetail()
    {
        $sql = "SELECT 
                    product_details.*,
                    products.name
                FROM product_details
                LEFT JOIN products ON products.id = product_details.product_id
                LEFT JOIN categories ON categories.id = products.category_id 
                WHERE 
                    categories.slug = 'water_treatment_plant'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }
}