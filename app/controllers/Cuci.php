<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Cuci
 *
 * @author nanank
 */
class Cuci extends CI_Controller
{
    protected $title = 'Master Data Cucian';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cuci_model', 'cuci');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[127]');
    }

    public function index()
    {
        $cuci = $this->cuci->get_all();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/cuci/index', compact('cuci'));
        $this->load->view('backend/footer');
    }

    public function create()
    {
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/cuci/create');
        $this->load->view('backend/footer');
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->cuci->insert($this->input->post())];
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
        $cuci = $this->cuci->get($id);
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/cuci/edit', compact('cuci'));
        $this->load->view('backend/footer');
    }

    public function update($id = null)
    {
        $cuci = $this->cuci->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->cuci->update($cuci->id, $this->input->post())];
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
        $cuci = $this->cuci->get($id);
        $return = false;
        if (!empty($cuci)) {
            $return = $this->cuci->delete($cuci->id);
        }

        $this->output
          ->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]))
          ->_display();
        exit;

    }
}
