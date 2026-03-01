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

    public function update_or_create()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');

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

        $upload_favicon = $this->upload_images($_FILES['favicon']);
        if (!$upload_favicon['status'] && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['favicon' => $upload_favicon['message']]
                ]));
        } 

        $upload_image_header = $this->upload_images($_FILES['images']);
        if (!$upload_image_header['status'] && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['images' => $upload_image_header['message']]
                ]));
        } 

        $upload_image_footer = $this->upload_images($_FILES['image_footer']);
        if (!$upload_image_footer['status'] && !$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['image_footer' => $upload_image_footer['message']]
                ]));
        } 

        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'phone' => $this->input->post('phone'),

            'favicon' => $upload_favicon['status'] ? basename($upload_favicon['data']) : $this->input->post('favicon_name'),
            'image' => $upload_image_header['status'] ? basename($upload_image_header['data']) : $this->input->post('image_name'),
            'image_footer' => $upload_image_footer['status'] ? basename($upload_image_footer['data']) : $this->input->post('image_footer_name'),
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

    private function upload_images($files)
    {
        $upload_image = upload_file($files, 'images/abouts');
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