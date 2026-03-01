<?php

class DrinkingWater_model extends CI_Model
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
                        categories.slug = 'ro_drinking_water' 
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
                        categories.slug = 'ro_drinking_water' 
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
                        categories.slug = 'ro_drinking_water' 
                    LIMIT 1";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataDidPoint()
    {
        // $sql = "SELECT * FROM did_you_knows WHERE category_id = '3' LIMIT 1";

        $sql = "SELECT * FROM categories WHERE category_id = '4'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataDidPoint2()
    {
        // $sql = "SELECT * FROM did_you_knows WHERE category_id = '3' LIMIT 1";

        $sql = "SELECT 
                        did_you_know_points.* 
                    FROM 
                        did_you_know_points 
                    LEFT JOIN categories ON categories.id = did_you_know_points.category_id 
                    WHERE 
                        categories.slug = 'ro_drinking_water'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDataBenefit()
    {
        // $sql = "SELECT * FROM benefits WHERE category_id = '3' LIMIT 6";

        $sql = "SELECT 
                        substring(benefits.category_id,3,1) AS catgory_id,
                        benefits.images,
                        benefits.title,
                        benefits.description
                    FROM 
                        benefits 
                    LEFT JOIN categories ON categories.id = substring(benefits.category_id,3,1) 
                    WHERE 
                        categories.slug = 'ro_drinking_water' 
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
                        categories.slug = 'ro_drinking_water' 
                    LIMIT 2";
                
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
                        categories.slug = 'ro_drinking_water'";
                
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
                    categories.slug = 'ro_drinking_water'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDetailByProductId($product_id)
    {
        return $this->db
                ->from('product_details')
                ->where('product_id', $product_id)
                ->get()
                ->result_object();
    }
    
    public function getDataWCU()
    {
        $sql = "SELECT 
                    why_choose_us.*
                FROM why_choose_us
                LEFT JOIN categories ON categories.id = why_choose_us.category_id 
                WHERE 
                    categories.slug = 'ro_drinking_water'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription1($id=NULL)
    {
        $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '1'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription2($id=NULL)
    {
        $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '2'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription3($id=NULL)
    {
       $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '3'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription4($id=NULL)
    {
        $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '4'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription5($id=NULL)
    {
        $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '5'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription6($id=NULL)
    {
        $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '6'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription7($id=NULL)
    {
        $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '7'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription8($id=NULL)
    {
       $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '9'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getDescription9($id=NULL)
    {
       $sql = "SELECT 
                    product_descriptions.*, 
                    categories.id 
                FROM 
                    product_descriptions 
                    LEFT JOIN categories ON categories.id = product_descriptions.id
                WHERE 
                    product_descriptions.product_id = '$id' AND product_descriptions.position = '9'";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }

    public function getImage($product_id=NULL)
    {
        $sql = "SELECT 
                    title, 
                    description, 
                    images, 
                    LOWER(position) AS position,  
                    LOWER(position2) AS position2,
                    translate,
                    padding_top
                FROM product_images 
                WHERE product_id = '$product_id' ORDER BY id DESC";
                
        $query = $this->db->query($sql);

        return $query->result_object();
    }
}