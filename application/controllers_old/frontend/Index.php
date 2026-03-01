<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('frontend/Home_model');
    }

    public function index()
    {
        $data['header'] = $this->Home_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['about'] = $this->Home_model->getDataAbout();
        $data['about_detail'] = $this->Home_model->getDataAboutDetail();
        $data['service'] = $this->Home_model->getDataService();
        $data['news'] = $this->Home_model->getDataNews();
        $data['reviews'] = $this->Home_model->getDataReview();
        $data['faq'] = $this->Home_model->getDataFaq();
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/home/index');
        $this->load->view('frontend/_partials/footer');
    }
}

