<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('email');
        $this->load->helper('form');

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata('is_login')){
			redirect(base_url('backend/home/consultation'));
        }

        $this->load->view('backend/pages/auth/login');
    }    

    public function auth_login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('backend/pages/auth/login');
            return;
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $result = $this->User_model->auth_login(['email' => $email]);
        if (!$result) {
            $this->session->set_flashdata('error', 'Email tidak sesuai');
            $this->load->view('backend/pages/auth/login');
            return;
        }

        $password_hash = $result->password;
        $password = password_verify($password, $password_hash);

        if (!$password) {
            $this->session->set_flashdata('error', 'Kata Sandi tidak sesuai');
            $this->load->view('backend/pages/auth/login');
            return;
        }

        $sess['is_login'] = true;
        $sess['name']     = $result->name;
        $sess['email']    = $result->email;
        $sess['user_id']  = $result->id;

        $this->session->set_userdata($sess);    
        return redirect(base_url('backend/home/consultation'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('backend/auth'));
    }
}