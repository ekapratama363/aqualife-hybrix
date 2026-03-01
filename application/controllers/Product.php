<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // for load helper
        $this->load->helper(['url_helper', 'seo_helper']);
        $this->load->helper(['form', 'pagination']);
        $this->load->library('form_validation');

        $this->load->model([
            'Product_model', 
        ]);
    }

    public function list()
    {
        $filter['search'] = $this->input->get('q') ? htmlspecialchars($this->input->get('q')) : '';
        $filter['level'] = $this->input->get('level') ? htmlspecialchars($this->input->get('level')) : '';
        $filter['start'] = 0;
        $filter['length'] = 20;
        $filter['sort_field'] = 'products.id';
        $filter['order'] = 'desc';

        $products = $this->Product_model->get_products($filter['length'], $filter['start'], $filter);
        echo json_encode($products);
    }
}

