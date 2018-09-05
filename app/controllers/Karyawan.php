<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Karyawan
 *
 * @author nanank
 */
class Karyawan extends CI_Controller
{
    protected $title = 'Master Data Karyawan';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model', 'karyawan');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[127]');
        $this->form_validation->set_rules('kontak', 'Kontak', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('bagian', 'Bagian', 'required');
        $this->form_validation->set_rules('mulai_kerja', 'Mulai Bekerja', 'required');
    }

    public function index()
    {
        $karyawan = $this->karyawan->get_all();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/karyawan/index', compact('karyawan'));
        $this->load->view('backend/footer');
    }

    public function create()
    {
        $bagian = $this->karyawan->bagian();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/karyawan/create', compact('bagian'));
        $this->load->view('backend/footer');
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->karyawan->insert($this->input->post())];
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
        $karyawan = $this->karyawan->get($id);
        $bagian = $this->karyawan->bagian();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/karyawan/edit', compact('karyawan', 'bagian'));
        $this->load->view('backend/footer');
    }

    public function update($id = null)
    {
        $karyawan = $this->karyawan->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->karyawan->update($karyawan->id, $this->input->post())];
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
        $karyawan = $this->karyawan->get($id);
        $return = false;
        if (!empty($karyawan)) {
            $return = $this->karyawan->delete($karyawan->id);
        }

        $this->output
          ->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]))
          ->_display();
        exit;

    }
}
