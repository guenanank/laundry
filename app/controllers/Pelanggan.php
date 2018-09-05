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
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pelanggan/index', compact('pelanggan'));
        $this->load->view('backend/footer');
    }

    public function create()
    {
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pelanggan/create');
        $this->load->view('backend/footer');
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->pelanggan->insert($this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege))
          ->_display();
        exit;
    }

    public function edit($id = null)
    {
        $pelanggan = $this->pelanggan->get($id);
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pelanggan/edit', compact('pelanggan'));
        $this->load->view('backend/footer');
    }

    public function update($id = null)
    {
        $pelanggan = $this->pelanggan->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->pelanggan->update($pelanggan->id, $this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege))
          ->_display();
        exit;
    }

    public function delete($id = null)
    {
        $pelanggan = $this->pelanggan->get($id);
        $return = false;
        if (!empty($pelanggan)) {
            $return = $this->pelanggan->delete($pelanggan->id);
        }

        $this->output
          ->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]))
          ->_display();
        exit;

    }
}
