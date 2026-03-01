<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'slug_helper', 'upload_file']);
        
        $this->load->library(['session', 'form_validation']);

        $this->load->model('Guest_book_model');
        
		if (!$this->session->userdata('is_login')){
			redirect(base_url("backend/auth"));
        }
    }

    private function custom_assets()
    {
        return [
            'js' => [
                base_url('assets/hybrix/js/modules/guest_book.js')
            ],
        ];
    }
    
    public function index()
    {
        $data = $this->custom_assets();

        $data['filePage'] = 'backend/pages/guest_books/index';
        $this->load->view('backend/app', $data);
    }

    public function view($id = null)
    {
        $data = $this->custom_assets();

        $data['id'] = $id;
        $data['filePage'] = 'backend/pages/guest_books/form';
        $data['data'] = $this->Guest_book_model->get_by_id($id);
        
        $this->load->view('backend/app', $data);
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

        $query['sort_field'] = 'guest_books.id';

        $totalFiltered = $this->Guest_book_model->count_data($query)->total;

        $query['start']  = $start ?? 0;
        $query['length'] = $length ?? 10;
    
        $getData = $this->Guest_book_model->get_data($query['length'], $query['start'], $query);
        $no = $start;
        foreach($getData ?? [] as $key => $value) {        
            $no++;

            $action = "
                <a href='".base_url()."backend/guest_book/view/".$value->id."' 
                    class='btn btn-success' 
                    style='margin-right: 5px;' title='View'>
                    <i class='bi bi-eye'></i> View
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

    public function delete($id)
    {
        try {
            $this->Guest_book_model->delete_by_id($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
        }

        redirect(base_url("backend/header_page"));  
    }
}