<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Jasa
 *
 * @author nanank
 */
class Jasa extends CI_Controller
{
    protected $title = 'Master Data Jasa Cucian';

    protected $scripts = ['jasa'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jasa_model', 'jasa');
        $this->load->model('Barang_model', 'barang');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[127]');
    }

    public function index()
    {
        $jasa = $this->jasa->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('jasa/index', compact('jasa'));
        $this->load->view('footer');
    }

    public function create()
    {
        $barang = $this->barang->dropdown('nama');
        $this->load->view('header', ['title' => $this->title, 'scripts' => $this->scripts]);
        $this->load->view('jasa/create', compact('barang'));
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->jasa->insert($this->input->post())];
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
        $jasa = $this->jasa->get($id);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('jasa/edit', compact('jasa'));
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $jasa = $this->jasa->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->jasa->update($jasa->id, $this->input->post())];
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

        $jasa = $this->jasa->get($id);
        $return = false;
        if (!empty($jasa)) {
            $return = $this->jasa->delete($jasa->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }
}
