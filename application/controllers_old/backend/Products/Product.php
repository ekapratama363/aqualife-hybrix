<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['Product_model', 'Product_detail_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/product.js')
            ],
        ];
    }
    
    public function index($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/products/index';
        $this->load->view('backend/app', $data);
    }

    public function create($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/products/form';
        $data['details'] = [];
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $id = null)
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/products/form';
        $data['data'] = $this->Product_model->get_by_id($id);
        $data['details'] = $this->Product_detail_model->get_by_product_id($id);

        $this->load->view('backend/app', $data);
    }

    public function update_or_create()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        $this->form_validation->set_rules('link', 'link marketplace', 'required');

        $id = $this->input->post('id');
        $slug = $this->input->post('slug');

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


            $upload = upload_file($_FILES['single_image'], 'images/products');

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
            'name' => $this->input->post('name'),
            'link' => $this->input->post('link'),
            'category_id' => $this->input->post('category_id'),
            'images' => $upload ? basename($upload['message']) : $this->input->post('image_name')
        ];

        
        try {

            $productId = $this->store_product($data, $id);

            $productDetails = $this->mappingProducts($this->input->post(), $productId);
            if ($productDetails) {
                $this->Product_detail_model->delete_by_product_id($productId);
                $this->Product_detail_model->create_data($productDetails);
            }

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/$slug/product")
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

    private function mappingProducts($postData, $productId) 
    {
        $combined = [];

        foreach ($postData ?? [] as $key => $value) {
            if (!preg_match('/^key_field_(\d+)$/', $key, $matches)) {
                continue;
            }

            $index = $matches[1];
            $keyField = $postData["key_field_$index"] ?? null;
            $valueField = $postData["value_field_$index"] ?? null;

            if (!empty($keyField) && $valueField !== null && $valueField !== '') {
                $combined[] = [
                    'product_id'   => $productId,
                    'key_field'    => $keyField,     // sesuai nama kolom di tabel
                    'value_field'  => $valueField    // sesuai nama kolom di tabel
                ];
            }
        }

        return $combined;
    }

    private function store_product($data, $id = null)
    {
        if ($id) {
            $data['updated_by'] = $_SESSION['user_id'];
            $data['updated_at'] = date('Y-m-d H:i:s');

            $this->Product_model->update_by_id($id, $data);
        } else {
            $data['created_by'] = $_SESSION['user_id'];
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['user_id'];
            $data['updated_at'] = date('Y-m-d H:i:s');

            $id = $this->Product_model->create_data($data);
        }

        return $id;
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

        $query['sort_field'] = 'products.id';

        $totalFiltered = $this->Product_model->count_product($query)->total;

        $query['slug']  = $slug;
        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->Product_model->get_products($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/$slug/product/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px; font-size:10px;' title='Edit'>
                    <i class='bi bi-pencil'></i>
                </a>

                <a onclick='".'return confirm("'."Delete data $value->name?".'")'."' style='font-size:10px;'
                    href='".base_url()."backend/$slug/product/delete/".$value->id."' class='btn btn-danger delete-list'>
                    <i class='bi bi-trash'></i>
                </a>
            ";

            $images = base_url("uploads/images/products/$value->images");
            $getData[$key]->images = "<img src='$images' alt='$value->images' width='80' height='50'/>";

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

    public function delete($slug = '', $id = '')
    {
        try {
            $this->Product_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/$slug/product"));  
    }
}