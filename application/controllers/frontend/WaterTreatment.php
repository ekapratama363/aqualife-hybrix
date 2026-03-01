<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WaterTreatment extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('frontend/WaterTreatment_model');
        $this->load->model('frontend/Home_model');
    }

    public function index()
    {
        $data['header'] = $this->WaterTreatment_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['categories_mobile'] = $this->Home_model->getDataCategories();
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['overviews'] = $this->WaterTreatment_model->getDataOverviews();
        $data['did_you_know'] = $this->WaterTreatment_model->getDataDid();
        $data['did_you_know2'] = $this->WaterTreatment_model->getDataDidPoint();
        $data['benefit'] = $this->WaterTreatment_model->getDataBenefit();
        $data['advantages'] = $this->WaterTreatment_model->getDataAdvantages();
        $data['products'] = $this->getProducts();
        $data['products_detail'] = $this->WaterTreatment_model->getDataProductsDetail();
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/product/water_treatment');
        $this->load->view('frontend/_partials/footer');
    }

    private function getProducts() 
    {
        $getDataProducts = $this->WaterTreatment_model->getDataProducts();
        foreach($getDataProducts as $key => $product) {
            $getDataProducts[$key]->details = $this->WaterTreatment_model->getDetailByProductId($product->id);
        }

        return $getDataProducts;
    }
}

