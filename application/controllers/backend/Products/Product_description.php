<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_description extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['Product_description_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/product_description.js')
            ],
        ];
    }
    
    public function index($slug = '', $position = '')
    {
        $data = $this->custom_assets();
        $data['position'] = $position;
        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/product_description/index';
        $this->load->view('backend/app', $data);
    }

    public function create($slug = '', $position = '')
    {
        $data = $this->custom_assets();
        $data['position'] = $position;
        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/product_description/form';
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $position = '', $id = null)
    {
        $data = $this->custom_assets();
        $data['position'] = $position;
        $data['slug'] = $slug;
        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/product_description/form';
        $data['data'] = $this->Product_description_model->get_by_id($id);
        $this->load->view('backend/app', $data);
    }

    public function update_or_create()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('product_id', 'product_id', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('position', 'position', 'required');

        $id = $this->input->post('id');
        $slug = $this->input->post('slug');
        $position = $this->input->post('position');

        if ($this->form_validation->run() == FALSE) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => $this->form_validation->error_array()
                ]));
        } 

        $upload = null;
        foreach ($_FILES['images']['name'] ?? [] as $key => $fileName) {
            if (!$fileName) {
                continue;
            }

            $_FILES['single_image'] = [
                'name'     => $_FILES['images']['name'][$key],
                'type'     => $_FILES['images']['type'][$key],
                'tmp_name' => $_FILES['images']['tmp_name'][$key],
                'error'    => $_FILES['images']['error'][$key],
                'size'     => $_FILES['images']['size'][$key]
            ];


            $upload = upload_file($_FILES['single_image'], 'images/products/all_products');

            if (!$upload['status']) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'field not valid',
                        'errors' => ['images' => $upload['message']]
                    ]));
            }
        }

        if (!$upload && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['images' => 'image is required']
                ]));
        }

        $data = [
            'title' => $this->input->post('title'),
            'subtitle' => $this->input->post('subtitle'),
            'position' => $this->input->post('position'),
            'description' => $this->input->post('description'),
            'link' => $this->input->post('link'),
            'product_id' => $this->input->post('product_id'),
            'images' => $upload ? basename($upload['message']) : $this->input->post('image_name')
        ];

        
        try {

            $this->store_product($data, $id);

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/$slug/product_description/$position")
                ]));

        } catch (\Throwable $th) {
                
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => $th->getMessage(),
                    'trace' => $th->getTrace(),
                ]));
        }
    }

    private function store_product($data, $id = null)
    {
        if ($id) {
            $this->Product_description_model->update_by_id($id, $data);
        } else {
            $id = $this->Product_description_model->create_data($data);
        }

        return $id;
    }

    public function lists($slug = '', $position = '')
    {
        $draw   = $this->input->post('draw');
        $start  = $this->input->post('start');
        $length = $this->input->post('length');

        $search = strtolower($this->input->post('search')['value']);
        $orderColumn = isset($this->input->post('order')[0]['column']) ? $this->input->post('order')[0]['column'] : '';
        $dir = isset($this->input->post('order')[0]['dir']) ? $this->input->post('order')[0]['dir'] : '';
        
        $query['search'] = $search;
        
        if ($dir === 'asc') {
            $query['order'] = 'desc';
        }

        $query['position'] = $position;
        $query['sort_field'] = 'product_descriptions.id';

        $totalFiltered = $this->Product_description_model->count_data($query)->total;

        $query['slug']  = $slug ?? 0;
        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->Product_description_model->get_data($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/$slug/product_description/$position/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;font-size:10px;' title='Edit'>
                    <i class='bi bi-pencil'></i>
                </a>

                <a onclick='".'return confirm("'."Delete data $value->title?".'")'."' style='font-size:10px;'
                    href='".base_url()."backend/$slug/product_description/$position/delete/".$value->id."' class='btn btn-danger delete-list'>
                    <i class='bi bi-trash'></i>
                </a>
            ";

            $images = base_url("uploads/images/products/all_products/$value->images");
            $getData[$key]->images = "<img src='$images' alt='$value->images' width='80'/>";

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

    public function delete($slug = '', $position = '', $id = '')
    {
        try {
            $this->Product_description_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/$slug/product_description/$position"));  
    }
}