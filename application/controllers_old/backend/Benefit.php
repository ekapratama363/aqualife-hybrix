<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benefit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['Benefit_model', 'Category_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/benefit.js')
            ],
        ];
    }
    
    public function index($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/benefit/index';
        $this->load->view('backend/app', $data);
    }

    public function create($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/benefit/form';
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $id = null)
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/benefit/form';
        $getBenefit = $this->Benefit_model->get_by_id($id);
        if ($getBenefit && $getBenefit->category_id) {
            $getBenefit->categories = $getBenefit->category_id ? $this->Category_model->get_by_multiple_id(json_decode($getBenefit->category_id)) : [];
        }

        $data['data'] = $getBenefit;

        $this->load->view('backend/app', $data);
    }

    public function update_or_create()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

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


            $upload = upload_file($_FILES['single_image'], 'images/benefit');

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
            'category_id' => json_encode($this->input->post('category_id') ?? []),
            'images' => $upload ? basename($upload['message']) : $this->input->post('image_name')
        ];
        
        try {

            $benefitId = $this->store_benefit($data, $id);

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/$slug/benefit")
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

    private function store_benefit($data, $id = null)
    {
        if ($id) {
            $this->Benefit_model->update_by_id($id, $data);
        } else {
            $id = $this->Benefit_model->create_data($data);
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
        $query['slug'] = $slug;
        
        if ($dir === 'asc') {
            $query['order'] = 'desc';
        }

        $query['sort_field'] = 'benefits.id';

        $totalFiltered = $this->Benefit_model->count_benefit($query)->total;

        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->Benefit_model->get_benefits($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/$slug/benefit/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;' title='Edit'>
                    <i class='bi bi-pencil'></i> Edit
                </a>

                <a onclick='".'return confirm("'."Delete data $value->title?".'")'."'
                    href='".base_url()."backend/$slug/benefit/delete/".$value->id."' class='btn btn-danger delete-list'>
                    <i class='bi bi-trash'></i> Delete
                </a>
            ";

            $images = base_url("uploads/images/benefit/$value->images");
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
            $this->Benefit_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/$slug/benefit"));  
    }
}