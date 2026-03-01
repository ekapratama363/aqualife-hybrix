<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Category_model',
        ]);
    }

    public function list()
    {
        $filter['search'] = $this->input->get('q') ? htmlspecialchars($this->input->get('q')) : '';
        $filter['level'] = $this->input->get('level') ? htmlspecialchars($this->input->get('level')) : '';
        $filter['category_id'] = $this->input->get('category_id') ? (int)$this->input->get('category_id') : null;
        $filter['slug'] = $this->input->get('slug') ? htmlspecialchars($this->input->get('slug')) : '';
        $filter['start'] = 0;
        $filter['length'] = 20;

        $categories = $this->Category_model->get_categories($filter);
        echo json_encode($categories);
    }
}