<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Harga
 *
 * @author nanank
 */
class Harga extends CI_Controller
{
    protected $title = 'Master Data Harga';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model', 'pelanggan');
        $this->load->model('Harga_model', 'harga');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Cuci_model', 'cuci');

        $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required');
        $this->form_validation->set_rules('id_barang', 'Barang', 'required');
        $this->form_validation->set_rules('id_cuci', 'Cuci', 'required');
    }

    public function index($id_pelanggan)
    {
        $pelanggan = $this->pelanggan->get($id_pelanggan);
        $harga = $this->harga->with('barang')->with('cuci')->get_many_by('id_pelanggan', $id_pelanggan);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('harga/index', compact('pelanggan', 'harga'));
        $this->load->view('footer');
    }

    public function create($id_pelanggan)
    {
        $pelanggan = $this->pelanggan->get($id_pelanggan);
        $barang = $this->barang->dropdown('nama');
        $cuci = $this->cuci->dropdown('nama');
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('harga/create', compact('pelanggan', 'barang', 'cuci'));
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->harga->insert($this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function edit()
    {
        list($id_pelanggan, $id_barang, $id_cuci) = func_get_args();
        $where = ['id_pelanggan' => $id_pelanggan, 'id_barang' => $id_barang, 'id_cuci' => $id_cuci];
        $pelanggan = $this->pelanggan->get($id_pelanggan);
        $barang = $this->barang->dropdown('nama');
        $cuci = $this->cuci->dropdown('nama');
        $harga = $this->harga->get_by($where);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('harga/edit', compact('harga', 'pelanggan', 'barang', 'cuci'));
        $this->load->view('footer');
    }

    public function update()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $where = [
          'id_pelanggan' => $this->input->post('id_pelanggan'),
          'id_barang' => $this->input->post('id_barang'),
          'id_cuci' => $this->input->post('id_cuci')
        ];
        $harga = $this->harga->get_by($where);

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->harga->update_by([
              'id_pelanggan' => $harga->id_pelanggan,
              'id_barang' => $harga->id_barang,
              'id_cuci' => $harga->id_cuci
            ], $this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function delete()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }
      
        list($id_pelanggan, $id_barang, $id_cuci) = func_get_args();
        $where = ['id_pelanggan' => $id_pelanggan, 'id_barang' => $id_barang, 'id_cuci' => $id_cuci];
        $harga = $this->harga->get_by($where);

        $return = false;
        if (!empty($harga)) {
            $return = $this->harga->delete_by([
              'id_pelanggan' => $harga->id_pelanggan,
              'id_barang' => $harga->id_barang,
              'id_cuci' => $harga->id_cuci
            ]);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }

    public function cek_harga($id_pelanggan)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $return = [];
        $barang = $this->barang->dropdown('nama');
        $cuci = $this->cuci->dropdown('nama');
        $this->harga->after_get = [];
        foreach ($this->harga->get_many_by('id_pelanggan', $id_pelanggan) as $harga) {
            $return['barang'][$harga->id_barang] = $barang[$harga->id_barang];
            $return['cuci'][$harga->id_barang][$harga->id_cuci] = [
              'nama' => $cuci[$harga->id_cuci],
              'tunai' => $harga->tunai,
              'cicil' => $harga->cicil
            ];
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode($return));
        exit;
    }
}
