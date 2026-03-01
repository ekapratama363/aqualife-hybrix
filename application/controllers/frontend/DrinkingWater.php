<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DrinkingWater extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('frontend/DrinkingWater_model');
        $this->load->model('frontend/Home_model');
    }

    public function index()
    {
        $data['header'] = $this->DrinkingWater_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['categories_mobile'] = $this->Home_model->getDataCategories();
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['overviews'] = $this->DrinkingWater_model->getDataOverviews();
        $data['did_you_know'] = $this->DrinkingWater_model->getDataDid();
        $data['did_you_know2'] = $this->DrinkingWater_model->getDataDidPoint();
        $data['did_you_know3'] = $this->DrinkingWater_model->getDataDidPoint2();
        $data['benefit'] = $this->DrinkingWater_model->getDataBenefit();
        $data['advantages'] = $this->DrinkingWater_model->getDataAdvantages();
        $data['products'] = $this->getProducts();
        $data['products_detail'] = $this->DrinkingWater_model->getDataProductsDetail();
        $data['wcu'] = $this->DrinkingWater_model->getDataWCU();
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/product/drinking_water');
        $this->load->view('frontend/_partials/footer');
    }

    public function product($id="")
    {
        $product_id = '1';
        $data['header'] = $this->DrinkingWater_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['categories_mobile'] = $this->Home_model->getDataCategories();
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['description1'] = $this->DrinkingWater_model->getDescription1($id);
        $data['description2'] = $this->DrinkingWater_model->getDescription2($id);
        $data['description3'] = $this->DrinkingWater_model->getDescription3($id);
        $data['description4'] = $this->DrinkingWater_model->getDescription4($id);
        $data['description5'] = $this->DrinkingWater_model->getDescription5($id);
        $data['description6'] = $this->DrinkingWater_model->getDescription6($id);
        $data['description7'] = $this->DrinkingWater_model->getDescription7($id);
        $data['description8'] = $this->DrinkingWater_model->getDescription8($id);
        $data['description9'] = $this->DrinkingWater_model->getDescription9($id);
        $data['image'] = $this->DrinkingWater_model->getImage($product_id);
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/product/detail');
        $this->load->view('frontend/_partials/footer');
    }

    public function onyx()
    {
        $product_id = '1';
        $data['header'] = $this->DrinkingWater_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['categories_mobile'] = $this->Home_model->getDataCategories();
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['description1'] = $this->DrinkingWater_model->getDescription1($product_id);
        $data['description2'] = $this->DrinkingWater_model->getDescription2($product_id);
        $data['description3'] = $this->DrinkingWater_model->getDescription3($product_id);
        $data['description4'] = $this->DrinkingWater_model->getDescription4($product_id);
        $data['description5'] = $this->DrinkingWater_model->getDescription5($product_id);
        $data['description6'] = $this->DrinkingWater_model->getDescription6($product_id);
        $data['description7'] = $this->DrinkingWater_model->getDescription7($product_id);
        $data['description8'] = $this->DrinkingWater_model->getDescription8($product_id);
        $data['description9'] = $this->DrinkingWater_model->getDescription9($product_id);
        $data['image'] = $this->DrinkingWater_model->getImage($product_id);
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/product/onyx');
        $this->load->view('frontend/_partials/footer');
    }

    public function aquilla()
    {
        $product_id = '3';
        $data['header'] = $this->DrinkingWater_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['categories_mobile'] = $this->Home_model->getDataCategories();
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['description1'] = $this->DrinkingWater_model->getDescription1($product_id);
        $data['description2'] = $this->DrinkingWater_model->getDescription2($product_id);
        $data['description3'] = $this->DrinkingWater_model->getDescription3($product_id);
        $data['description4'] = $this->DrinkingWater_model->getDescription4($product_id);
        $data['description5'] = $this->DrinkingWater_model->getDescription5($product_id);
        $data['description6'] = $this->DrinkingWater_model->getDescription6($product_id);
        $data['description7'] = $this->DrinkingWater_model->getDescription7($product_id);
        $data['description8'] = $this->DrinkingWater_model->getDescription8($product_id);
        $data['description9'] = $this->DrinkingWater_model->getDescription9($product_id);
        $data['image'] = $this->DrinkingWater_model->getImage($product_id);
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/product/aquilla');
        $this->load->view('frontend/_partials/footer');
    }

    private function getProducts() 
    {
        $getDataProducts = $this->DrinkingWater_model->getDataProducts();
        foreach($getDataProducts as $key => $product) {
            $getDataProducts[$key]->details = $this->DrinkingWater_model->getDetailByProductId($product->id);
        }

        return $getDataProducts;
    }

    public function simpan_contact() 
    { 
        $name = $this->input->post('name', TRUE);
        $phone = $this->input->post('phone', TRUE);
        $email = $this->input->post('email', TRUE);
        $link = $this->input->post('link', TRUE);

        if($name == '')
        {
            echo '<script>alert("Please insert your name!");window.history.back();</script>';
            die();
        }
        if($phone == '')
        {
            echo '<script>alert("Please insert your phone number!");window.history.back();</script>';
            die();
        }
        if($email == '')
        {
            echo '<script>alert("Please insert your email!");window.history.back();</script>';
            die();
        }

        $data = array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'created_at' => date("Y-m-d H:i:s"),
        );

        $this->db->insert('contact_us', $data);

        echo '<script>alert("You Have Successfully submit this Record!");window.location = "'.base_url().'frontend/DrinkingWater/'.$link.'"</script>';
    }
}

