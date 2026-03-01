<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper(['form', 'pagination']);

        $this->load->model([]);
    }

    private function custom_assets()
    {
        return [
            'css' => [
                base_url('assets/js/select2/dist/css/select2.min.css'),
                base_url('assets/css/customs/home.css'),
            ],
            'js' => [
                base_url('assets/js/select2/dist/js/select2.full.js'),
                base_url('assets/js/select2/dist/js/select2.full.min.js'),
                base_url('assets/js/select2/dist/js/select2.min.js'),
                base_url('assets/js/select2/dist/js/select2.js'),
                base_url('assets/js/modules/filter.js'),
                base_url('assets/js/modules/product.js')
            ],
        ];
    }

    public function index($start = NULL)
    {
        $data = $this->custom_assets();
        
        $data['title'] = 'Hybrix';
        $data['page'] = 'frontend/home/index';

        $this->load->view('frontend/app', $data);
    }
}

