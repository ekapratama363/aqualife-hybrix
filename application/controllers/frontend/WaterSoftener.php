<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WaterSoftener extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('frontend/WaterSoftener_model');
        $this->load->model('frontend/Home_model');
    }

    public function index()
    {
        $data['header'] = $this->WaterSoftener_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['categories_mobile'] = $this->Home_model->getDataCategories();
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['overviews'] = $this->WaterSoftener_model->getDataOverviews();
        $data['did_you_know'] = $this->WaterSoftener_model->getDataDid();
        $data['did_you_know2'] = $this->WaterSoftener_model->getDataDidPoint();
        $data['benefit'] = $this->WaterSoftener_model->getDataBenefit();
        $data['advantages'] = $this->WaterSoftener_model->getDataAdvantages();

        $data['products'] = $this->getProducts();

        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/product/water_softener');
        $this->load->view('frontend/_partials/footer');
    }

    private function getProducts() 
    {
        $getDataProducts = $this->WaterSoftener_model->getDataProducts();
        foreach($getDataProducts as $key => $product) {
            $getDataProducts[$key]->details = $this->WaterSoftener_model->getDetailByProductId($product->id);
        }

        return $getDataProducts;
    }
}

