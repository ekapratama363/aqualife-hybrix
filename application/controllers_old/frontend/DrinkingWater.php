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
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['overviews'] = $this->DrinkingWater_model->getDataOverviews();
        $data['did_you_know'] = $this->DrinkingWater_model->getDataDid();
        $data['did_you_know2'] = $this->DrinkingWater_model->getDataDidPoint();
        $data['did_you_know3'] = $this->DrinkingWater_model->getDataDidPoint2();
        $data['benefit'] = $this->DrinkingWater_model->getDataBenefit();
        $data['advantages'] = $this->DrinkingWater_model->getDataAdvantages();
        $data['products'] = $this->DrinkingWater_model->getDataProducts();
        $data['products_detail'] = $this->DrinkingWater_model->getDataProductsDetail();
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/product/drinking_water');
        $this->load->view('frontend/_partials/footer');
    }
}

