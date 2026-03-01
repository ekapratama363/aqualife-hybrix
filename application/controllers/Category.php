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
        $search = $this->input->get('q') ? htmlspecialchars($this->input->get('q')) : '';
        $categories = $this->Category_model->get_for_select($search);
        echo json_encode($categories);
    }
}