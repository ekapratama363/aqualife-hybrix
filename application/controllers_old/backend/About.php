<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['About_model','About_detail_model', 'Company_sosmed_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/about.js')
            ],
        ];
    }

    public function index($slug = null)
    {
        $data = $this->custom_assets();
        $data['filePage'] = 'backend/pages/abouts/form';
        $get_about = $this->About_model->get_about();

        $data['data'] = $get_about;
        $data['slug'] = $slug;
        $data['id'] = $get_about->id ?? null;
        $data['social_medias'] = $this->Company_sosmed_model->get_company_sosmeds();
        $data['details'] = $this->About_detail_model->get_data();
        
        $this->load->view('backend/app', $data);
    }

    public function icon($slug = null)
    {
        $data = $this->custom_assets();
        $data['filePage'] = 'backend/pages/abouts/icon';
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
            $upload = upload_file($_FILES['images'], 'images/abouts');

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
            'image' => $image_name,
        ];
        
        try {

            if ($id) {
                $this->About_model->update_by_id($id, $data);
            } else {
                $this->About_model->create_data($data);
            }

            $this->create_details(
                $this->input->post('title'),
                $this->input->post('subtitle'),
                $this->input->post('icon')
            );

            $this->create_social_medias(
                $this->input->post('type'),
                $this->input->post('link')
            );

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/$slug/about")
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

    private function create_details($title, $subtitle, $icon)
    {
        $data = [];
        foreach($title ?? [] as $key => $value) {
            if (!$value) {
                continue;
            }
            
            $data[] = [
                'title' => $value,
                'subtitle' => $subtitle[$key],
                'icon' => $icon[$key],
            ];
        }

        if (empty($data)) {
            return;
        }
        
        $this->About_detail_model->delete_data();
        $this->About_detail_model->create_batch($data);
    }

    private function create_social_medias($social_medias, $links)
    {
        $data = [];
        foreach($social_medias ?? [] as $key => $value) {
            if (!$value) {
                continue;
            }
            
            $data[] = [
                'icon' => strtolower($value),
                'name' => $value,
                'account' => $links[$key],
            ];
        }

        if (empty($data)) {
            return;
        }
        
        $this->Company_sosmed_model->delete_data();
        $this->Company_sosmed_model->create_batch($data);
    }
}