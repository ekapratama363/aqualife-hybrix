<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['Subscribe_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/subscribe.js')
            ],
        ];
    }
    
    public function index($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/subscribe/index';
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $id = null)
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/subscribe/form';
        $data['data'] = $this->Subscribe_model->get_by_id($id);

        $this->load->view('backend/app', $data);
    }

    public function lists()
    {
        $draw   = $this->input->post('draw');
        $start  = $this->input->post('start');
        $length = $this->input->post('length');
        $slug = $this->input->get('slug');

        $search = strtolower($this->input->post('search')['value']);
        $orderColumn = isset($this->input->post('order')[0]['column']) ? $this->input->post('order')[0]['column'] : '';
        $dir = isset($this->input->post('order')[0]['dir']) ? $this->input->post('order')[0]['dir'] : '';
        
        $query['search'] = $search;
        
        if ($dir === 'asc') {
            $query['order'] = 'desc';
        }

        $query['sort_field'] = 'subscribes.id';

        $totalFiltered = $this->Subscribe_model->count_order($query)->total;

        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->Subscribe_model->get_order($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/$slug/subscribe/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;font-size:10px;' title='View'>
                    <i class='bi bi-eye'></i>
                </a>
            ";

            $getData[$key]->no = $no;
            $getData[$key]->action = $action;
        }

        $json_data = [
            "draw"            => $draw,
            "recordsTotal"    => $totalFiltered,
            "recordsFiltered" => $totalFiltered,
            "data"            => $getData
        ];

        echo json_encode($json_data);
    }
}