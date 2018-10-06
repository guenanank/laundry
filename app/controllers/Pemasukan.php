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

    protected $scripts = ['pemasukan'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemasukan_model', 'pemasukan');
        $this->load->model('Pelanggan_model', 'pelanggan');

        $this->form_validation->set_rules('nomer', 'Nomer', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'numeric');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('cara_bayar', 'Cara Pembayaran', 'trim');
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim');
    }

    public function index()
    {
        $pemasukan = $this->pemasukan->with('pelanggan')->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('pemasukan/index', compact('pemasukan'));
        $this->load->view('footer');
    }

    public function create()
    {
        $nomer = $this->pemasukan->nomer();
        $jenis = $this->pemasukan->jenis();
        $cara_bayar = $this->pemasukan->cara_bayar();
        $pelanggan = $this->pelanggan->dropdown('nama');
        $this->load->view('header', ['title' => $this->title, 'scripts' => $this->scripts]);
        $this->load->view('pemasukan/create', compact('nomer', 'jenis', 'cara_bayar', 'pelanggan'));
        $this->load->view('footer');
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

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function edit($id = null)
    {
        $pemasukan = $this->pemasukan->with('pelanggan')->get($id);
        $jenis = $this->pemasukan->jenis();
        $cara_bayar = $this->pemasukan->cara_bayar();
        $pelanggan = $this->pelanggan->dropdown('nama');
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('pemasukan/edit', compact('pemasukan', 'jenis', 'cara_bayar', 'pelanggan'));
        $this->load->view('footer');
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

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function delete($id = null)
    {
        $pemasukan = $this->pemasukan->get($id);
        $return = false;
        if (!empty($pemasukan)) {
            $return = $this->pemasukan->delete($pemasukan->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;

    }
}
