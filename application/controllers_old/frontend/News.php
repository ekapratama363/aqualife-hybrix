<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('frontend/News_model');
        $this->load->model('frontend/Home_model');
    }

    public function index()
    {
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['list_news'] = $this->News_model->getDataListNews();
        $data['categories'] = $this->Home_model->getDataCategories();
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/news/index');
        $this->load->view('frontend/_partials/footer');
    }

    public function read($id="")
    {
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        $data['detail_news'] = $this->News_model->getDataDetailNews($id);
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/news/detail');
        $this->load->view('frontend/_partials/footer');
    }
}

