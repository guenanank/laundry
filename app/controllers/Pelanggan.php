<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Pelanggan
 *
 * @author nanank
 */
class Pelanggan extends CI_Controller
{
    protected $title = 'Master Data Pelanggan';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model', 'pelanggan');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[127]');
    }

    public function index()
    {
        $pelanggan = $this->pelanggan->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('pelanggan/index', compact('pelanggan'));
        $this->load->view('footer');
    }

    public function create()
    {
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('pelanggan/create');
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->pelanggan->insert($this->input->post())];
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
        $pelanggan = $this->pelanggan->get($id);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('pelanggan/edit', compact('pelanggan'));
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $pelanggan = $this->pelanggan->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->pelanggan->update($pelanggan->id, $this->input->post())];
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
      
        $pelanggan = $this->pelanggan->get($id);
        $return = false;
        if (!empty($pelanggan)) {
            $return = $this->pelanggan->delete($pelanggan->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }
}
