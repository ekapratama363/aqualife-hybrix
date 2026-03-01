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
        $data['data'] = (object)[];
        $data['parents'] = $this->Category_model->get_all_for_parent_select();
        $data['filePage'] = 'backend/pages/categories/form';
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $id = null)
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['id'] = $id;
        $data['data'] = $this->Category_model->get_by_id($id);
        $data['parents'] = $this->Category_model->get_all_for_parent_select($id);
        $data['filePage'] = 'backend/pages/categories/form';
        
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

        $upload = $upload ?? ['message' => null];
        $image_name = !empty($upload['message']) ? basename($upload['message']) : $this->input->post('image_name');
        
        $parent_id = $this->input->post('category_id');
        $parent_id = $parent_id ? (int)$parent_id : null;
        
        if ($id && $parent_id && !$this->Category_model->is_valid_parent($id, $parent_id)) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Parent tidak valid (circular reference)',
                ]));
        }
        
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'images' => $image_name,
            'slug' => slug($this->input->post('name')),
            'category_id' => $parent_id
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
                    style='margin-right: 5px;' title='Edit'>
                    <i class='bi bi-pencil'></i> Edit
                </a>
                
                <a onclick='".'return confirm("'."Delete data $value->name?".'")'."'
                    href='".base_url()."backend/$slug/our_service/delete/".$value->id."' class='btn btn-danger delete-list'>
                    <i class='bi bi-trash'></i> Delete
                </a>
            ";

            $images = base_url("uploads/images/categories/$value->images");
            $parent_name = !empty($value->category_id) ? ($this->Category_model->get_by_id($value->category_id)->name ?? '-') : '-';

            $getData[$key]->no = $no;
            $getData[$key]->parent_name = $parent_name;
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
            $child_count = $this->Category_model->count_children($id);
            if ($child_count > 0) {
                $this->session->set_flashdata('failed', 'Kategori tidak dapat dihapus karena masih memiliki sub kategori. Hapus sub kategori terlebih dahulu.');
                redirect(base_url("backend/$slug/our_service"));
                return;
            }
            $this->Category_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/$slug/our_service"));  
    }
}