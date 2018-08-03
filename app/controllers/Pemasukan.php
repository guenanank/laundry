<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Pemasukan
 *
 * @author nanank
 */
class Pemasukan extends CI_Controller
{
    protected $title = 'Data Pemasukan';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemasukan_model', 'pemasukan');
        $this->load->model('Pelanggan_model', 'pelanggan');

        $this->form_validation->set_rules('nomer', 'Nomer', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'numeric');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('cara_bayar', 'Cara Pembayaran', 'trim');
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim');
    }

    public function index()
    {
        $pemasukan = $this->pemasukan->with('pelanggan')->get_all();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pemasukan/index', compact('pemasukan'));
        $this->load->view('backend/footer');
    }

    public function create()
    {
        $nomer = $this->pemasukan->nomer();
        $jenis = $this->pemasukan->jenis();
        $cara_bayar = $this->pemasukan->cara_bayar();
        $pelanggan = $this->pelanggan->dropdown('nama');
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pemasukan/create', compact('nomer', 'jenis', 'cara_bayar', 'pelanggan'));
        $this->load->view('backend/footer');
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->pemasukan->insert($this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege))->_display();
        exit;
    }

    public function edit($id = null)
    {
        $pemasukan = $this->pemasukan->with('pelanggan')->get($id);
        $jenis = $this->pemasukan->jenis();
        $cara_bayar = $this->pemasukan->cara_bayar();
        $pelanggan = $this->pelanggan->dropdown('nama');
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/pemasukan/edit', compact('pemasukan', 'jenis', 'cara_bayar', 'pelanggan'));
        $this->load->view('backend/footer');
    }

    public function update($id = null)
    {
        $pemasukan = $this->pemasukan->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->pemasukan->update($pemasukan->id, $this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege))->_display();
        exit;
    }

    public function delete($id = null)
    {
        $pemasukan = $this->pemasukan->get($id);
        $return = false;
        if (!empty($pemasukan)) {
            $return = $this->pemasukan->delete($pemasukan->id);
        }

        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode([$return]))
          ->_display();
        exit;

    }
}
