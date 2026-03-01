<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['News_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/news.js')
            ],
        ];
    }
    
    public function index($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/news/index';
        $this->load->view('backend/app', $data);
    }

    public function create($slug = '')
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['filePage'] = 'backend/pages/news/form';
        $this->load->view('backend/app', $data);
    }

    public function edit($slug = '', $id = null)
    {
        $data = $this->custom_assets();

        $data['slug'] = $slug;
        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/news/form';
        $data['data'] = $this->News_model->get_by_id($id);

        $this->load->view('backend/app', $data);
    }

    private function upload_images($files)
    {
        $upload_image = upload_file($files, 'images/news');
        if (!$upload_image['status']) {
            return [
                'status' => false,
                'message' => 'field not valid'
            ];
        }

        return [
            'status' => true,
            'data' => $upload_image['message'],
        ];
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

        $upload_header = $this->upload_images($_FILES['image_header']);
        if (!$upload_header['status'] && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['image_header' => $upload_header['message']]
                ]));
        } 

        $upload_display = $this->upload_images($_FILES['image_display']);
        if (!$upload_display['status'] && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['image_display' => $upload_display['message']]
                ]));
        } 

        $upload_image = $this->upload_images($_FILES['images']);
        if (!$upload_image['status'] && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['images' => $upload_image['message']]
                ]));
        }

        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'images' => $upload_image['status'] ? basename($upload_image['data']) : $this->input->post('image_name'),
            'image_header' => $upload_header['status'] ? basename($upload_header['data']) : $this->input->post('image_header_name'),
            'image_display' => $upload_display['status'] ? basename($upload_display['data']) : $this->input->post('image_display_name')
        ];

        
        try {

            $this->store_news($data, $id);

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/$slug/news")
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

    private function store_news($data, $id = null)
    {
        if ($id) {
            $this->News_model->update_by_id($id, $data);
        } else {
            $data['created_by'] = $_SESSION['user_id'];
            $data['created_at'] = date('Y-m-d H:i:s');

            $id = $this->News_model->create_data($data);
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

        $query['sort_field'] = 'news.id';

        $totalFiltered = $this->News_model->count_news($query)->total;

        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->News_model->get_news($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/$slug/news/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;font-size:10px;' title='Edit'>
                    <i class='bi bi-pencil'></i>
                </a>

                <a onclick='".'return confirm("'."Delete data $value->title?".'")'."'
                    href='".base_url()."backend/$slug/news/delete/".$value->id."' class='btn btn-danger delete-list'
                    style='font-size:10px;'>
                    <i class='bi bi-trash'></i>
                </a>
            ";

            $images = base_url("uploads/images/news/$value->images");
            $getData[$key]->images = "<img src='$images' alt='$value->images' width='80' height='50'/>";

            $image_header = base_url("uploads/images/news/$value->image_header");
            $getData[$key]->image_header = "<img src='$image_header' alt='$value->image_header' width='80' height='50'/>";

            $image_display = base_url("uploads/images/news/$value->image_display");
            $getData[$key]->image_display = "<img src='$image_display' alt='$value->image_display' width='80' height='50'/>";

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
            $this->News_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/$slug/news"));  
    }
}