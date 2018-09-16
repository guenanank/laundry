<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Barang
 *
 * @author nanank
 */
class Barang extends CI_Controller
{
    protected $title = 'Master Data Barang';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[127]');
    }

    public function index()
    {
        $barang = $this->barang->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('barang/index', compact('barang'));
        $this->load->view('footer');
    }

    public function create()
    {
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('barang/create');
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->barang->insert($this->input->post())];
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
        $barang = $this->barang->get($id);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('barang/edit', compact('barang'));
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        $barang = $this->barang->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->barang->update($barang->id, $this->input->post())];
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
        $barang = $this->barang->get($id);
        $return = false;
        if (!empty($barang)) {
            $return = $this->barang->delete($barang->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]))
        exit;
    }
}
