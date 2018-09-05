<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Pengeluaran
 *
 * @author nanank
 */
class Pengeluaran extends CI_Controller
{
    protected $title = 'Data Pengeluaran';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengeluaran_model', 'pengeluaran');

        $this->form_validation->set_rules('jenis', 'Jenis', 'trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
    }

    public function index()
    {
        $pengeluaran = $this->pengeluaran->get_all();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pengeluaran/index', compact('pengeluaran'));
        $this->load->view('backend/footer');
    }

    public function create()
    {
        $jenis = $this->pengeluaran->jenis();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pengeluaran/create', compact('jenis'));
        $this->load->view('backend/footer');
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->pengeluaran->insert($this->input->post())];
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
        $pengeluaran = $this->pengeluaran->get($id);
        $jenis = $this->pengeluaran->jenis();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pengeluaran/edit', compact('pengeluaran', 'jenis'));
        $this->load->view('backend/footer');
    }

    public function update($id = null)
    {
        $pengeluaran = $this->pengeluaran->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->pengeluaran->update($pengeluaran->id, $this->input->post())];
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
        $pengeluaran = $this->pengeluaran->get($id);
        $return = false;
        if (!empty($pengeluaran)) {
            $return = $this->pengeluaran->delete($pengeluaran->id);
        }

        $this->output
          ->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]))
          ->_display();
        exit;

    }
}
