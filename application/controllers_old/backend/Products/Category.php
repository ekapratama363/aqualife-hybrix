<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        
        $this->load->library(['session', 'form_validation']);

        $this->load->model('Category_model');
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/category.js')
            ],
        ];
    }
    
    public function index($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/categories/index';
        $this->load->view('backend/app', $data);
    }

    public function create($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/categories/form';
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $id = null)
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/categories/form';
        $data['data'] = $this->Category_model->get_by_id($id);
        
        $this->load->view('backend/app', $data);
    }

    public function update_or_create()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

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

        $id = $this->input->post('id') ?? null;
        $slug = $this->input->post('slug') ?? null;
        if (empty($_FILES['images']['name']) && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['images' => 'image is required']
                ]));
        }

        if (!empty($_FILES['images']['name'])) {
            $upload = upload_file($_FILES['images'], 'images/categories');

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

        $image_name = !empty($upload['message']) ? basename($upload['message']) : $this->input->post('image_name');
        
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'images' => $image_name,
            'slug' => slug($this->input->post('name'))
        ];
        
        try {

            if ($id) {
                $this->Category_model->update_by_id($id, $data);
            } else {
                $this->Category_model->create_data($data);
            }

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/$slug/our_service")
                ]));

        } catch (\Throwable $th) {
                
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => $th->getMessage(),
                ]));
        }
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

        $query['sort_field'] = 'categories.id';

        $totalFiltered = $this->Category_model->count_data($query)->total;

        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->Category_model->get_categories($query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/$slug/our_service/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;font-size:10px;' title='Edit'>
                    <i class='bi bi-pencil'></i>
                </a>
            ";

            $images = base_url("uploads/images/categories/$value->images");

            $getData[$key]->no = $no;
            $getData[$key]->images = "<img src='$images' alt='$value->images' width='80' height='50'/>";
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
            $this->Category_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/$slug/our_service"));  
    }
}