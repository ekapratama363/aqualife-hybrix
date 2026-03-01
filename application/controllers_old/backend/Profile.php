<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file', 'phone_number']);
        
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['Profile_company_model', 'Company_sosmed_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/backend/js/modules/profile.js')
            ],
        ];
    }

    public function index()
    {
        $data = $this->custom_assets();
        $data['filePage'] = 'backend/pages/profile/form';
        $get_profile = $this->Profile_company_model->get_profile_company();

        $data['data'] = $get_profile;
        $data['id'] = $get_profile->id ?? null;
        $data['social_medias'] = $this->Company_sosmed_model->get_company_sosmeds();
        
        $this->load->view('backend/app', $data);
    }

    private function validation_image($id, $files, $file_name)
    {
        if (empty($files[$file_name]['name']) && !$id) {
            return [
                'status' => false,
                'message' => [$file_name => 'image is required']
            ];
        }

        return [
            'status' => true
        ];
    }

    public function update_or_create()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');

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
        
        $validate_icon = $this->validation_image($id, $_FILES, 'icon');
        if (!$validate_icon['status']) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['icon' => 'logo is required']
                ]));
        }

        $validate_favicon = $this->validation_image($id, $_FILES, 'favicon');
        if (!$validate_favicon['status']) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'field not valid',
                    'errors' => ['favicon' => 'favicon is required']
                ]));
        }

        if (!empty($_FILES['icon']['name'])) {
            $upload_icon = upload_file($_FILES['icon'], 'images/profiles');

            if (!$upload_icon['status']) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'field not valid',
                        'errors' => ['favicon' => $upload_icon['message']]
                    ]));
            }
        }

        if (!empty($_FILES['favicon']['name'])) {
            $upload_favicon = upload_file($_FILES['favicon'], 'images/profiles');

            if (!$upload_favicon['status']) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'field not valid',
                        'errors' => ['favicon' => $upload_favicon['message']]
                    ]));
            }
        }

        $favicon_name = !empty($upload_favicon['message']) ? basename($upload_favicon['message']) : $this->input->post('favicon_name');
        $icon_name = !empty($upload_icon['message']) ? basename($upload_icon['message']) : $this->input->post('icon_name');
        
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => format_phone_number($this->input->post('phone')),
            'address' => $this->input->post('address'),
            'favicon' => $favicon_name,
            'icon' => $icon_name,
        ];

        try {

            if ($id) {
                $this->Profile_company_model->update_by_id($id, $data);
            } else {
                $this->Profile_company_model->create_data($data);
            }

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
                    'redirect_url' => base_url("backend/profile")
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