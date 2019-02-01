<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Sales
 *
 * @author nanank
 */
class Sales extends CI_Controller
{
    protected $title = 'Master Data Sales';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_model', 'sales');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[127]');
    }

    public function index()
    {
        $sales = $this->sales->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('sales/index', compact('sales'));
        $this->load->view('footer');
    }

    public function create()
    {
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('sales/create');
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->sales->insert($this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function edit($id = null)
    {
        $sales = $this->sales->get($id);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('sales/edit', compact('sales'));
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $sales = $this->sales->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->sales->update($sales->id, $this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function delete($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $sales = $this->sales->get($id);
        $return = false;
        if (!empty($sales)) {
            $return = $this->sales->delete($sales->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }
}
