<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file', 'star_rating']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model(['User_model']);
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/user.js')
            ],
        ];
    }
    
    public function index()
    {
        $data = $this->custom_assets();

        $data['filePage'] = 'backend/pages/user/index';
        $this->load->view('backend/app', $data);
    }

    public function create()
    {
        $data = $this->custom_assets();

        $data['filePage'] = 'backend/pages/user/form';
        $this->load->view('backend/app', $data);
    }

    public function edit($id = null)
    {
        $data = $this->custom_assets();

        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/user/form';
        $data['data'] = $this->User_model->get_by_id($id);

        $this->load->view('backend/app', $data);
    }

    private function validation($id)
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        
        if ($id) {
            $this->form_validation->set_rules(
                'email',
                'Email',
                'trim|required|valid_email'
            );

            $getUser = $this->User_model->get_by_id($id);
            if ($getUser && $getUser->id != $id) {
                return [
                    'status' => false,
                    'message' => 'email already exists'
                ];
            }

        } else {
            $this->form_validation->set_rules(
                'email',
                'Email',
                'trim|required|valid_email|is_unique[users.email]',
                [
                    'is_unique' => 'Email already exists.'
                ]
            );
        }

        if (!$id || $this->input->post('password') || $this->input->post('password_confirm')) {
            $this->form_validation->set_rules(
                'password',
                'Password',
                [
                    'trim',
                    'required',
                    'min_length[8]',
                    'max_length[72]',
                    // opsional: kuat minimal 1 huruf & 1 angka
                    ['strong_password', function($pw) {
                        return (bool) preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $pw);
                    }]
                ],
                [
                    'strong_password' => 'Pasword must contain 1 alphabet and 1 number'
                ]
            );

            $this->form_validation->set_rules(
                'password_confirm',
                'Password Confirmation',
                'trim|required|matches[password]',
                ['matches' => 'Password confirmation not match.']
            );
        }


        if ($this->form_validation->run() == FALSE) {
            return [
                'status' => false,
                'message' => $this->form_validation->error_array()
            ];
        } 


        return [
            'status' => true
        ];
    }

    public function update_or_create()
    {
        $id = $this->input->post('id');
        $confirmPassword = $this->input->post('password_confirm');

        $validation = $this->validation($id);
        if (!$validation['status']) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'errors' => $validation['message'],
                ]));
        }

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($confirmPassword, PASSWORD_DEFAULT),
        ];
        
        try {

            $this->store_user($data, $id);

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'success',
                    'redirect_url' => base_url("backend/user")
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

    private function store_user($data, $id = null)
    {
        if ($id) {
            $this->User_model->update_by_id($id, $data);
        } else {
            $id = $this->User_model->create_data($data);
        }

        return $id;
    }

    public function lists()
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

        $query['sort_field'] = 'users.id';

        $totalFiltered = $this->User_model->count_data($query)->total;

        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->User_model->get_data($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/user/edit/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;font-size:10px;' title='Edit'>
                    <i class='bi bi-pencil'></i>
                </a>

                <a onclick='".'return confirm("'."Delete data $value->name?".'")'."' style='font-size:10px;'
                    href='".base_url()."backend/user/delete/".$value->id."' class='btn btn-danger delete-list'>
                    <i class='bi bi-trash'></i>
                </a>
            ";

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

    public function delete($id = '')
    {
        try {
            $this->User_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/user"));  
    }
}