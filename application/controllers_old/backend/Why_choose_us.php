<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Why_choose_us extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['Why_choose_us_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/why_choose_us.js'),
            ],
        ];
    }
    
    public function index($slug = '')
    {
        $data = $this->custom_assets();
        $data['slug'] = $slug;

        $data['filePage'] = 'backend/pages/why_choose_us/index';
        $this->load->view('backend/app', $data);
    }

    public function create($slug = '')
    {
        $data = $this->custom_assets();
        $data['slug'] = $slug;

        $data['filePage'] = 'backend/pages/why_choose_us/form';
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $id = null)
    {
        $data = $this->custom_assets();
        $data['slug'] = $slug;

        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/why_choose_us/form';
        $data['data'] = $this->Why_choose_us_model->get_by_id($id);

        $this->load->view('backend/app', $data);
    }

    public function update_or_create()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('category_id', 'category_id', 'required');

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


            $upload = upload_file($_FILES['single_image'], 'images/why_choose_us');

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
            'description' => $this->input->post('description'),
            'category_id' => $this->input->post('category_id'),
            'images' => $upload ? basename($upload['message']) : $this->input->post('image_name')
        ];

        
        try {

            $this->store_why_choose_us($data, $id);

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/$slug/why_choose_us")
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

    private function store_why_choose_us($data, $id = null)
    {
        if ($id) {
            $this->Why_choose_us_model->update_by_id($id, $data);
        } else {
            $id = $this->Why_choose_us_model->create_data($data);
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

        $query['sort_field'] = 'why_choose_us.id';

        $totalFiltered = $this->Why_choose_us_model->count_data($query)->total;

        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
        $query['slug'] = $slug;
    
        $getData = $this->Why_choose_us_model->get_data($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/$slug/why_choose_us/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;' title='Edit'>
                    <i class='bi bi-pencil'></i> Edit
                </a>

                <a onclick='".'return confirm("'."Delete data $value->title?".'")'."'
                    href='".base_url()."backend/$slug/why_choose_us/delete/".$value->id."' class='btn btn-danger delete-list'>
                    <i class='bi bi-trash'></i> Delete
                </a>
            ";

            $images = base_url("uploads/images/why_choose_us/$value->images");
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
            $this->Why_choose_us_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/$slug/why_choose_us"));  
    }
}