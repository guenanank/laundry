<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Barang
 *
 * @author nanank
 */
class Barang extends CI_Controller
{
    protected $scripts = ['barang'];
    protected $title = 'Master Data Barang';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[127]');
    }

    public function index()
    {
        // $barang = $this->barang->get_all();
        $this->load->view('header', ['title' => $this->title]);
        // $this->load->view('barang/index', compact('barang'));
        $this->load->view('barang/index');
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

    public function dt_source()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $columns = ['id', 'nama'];
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $records_total = (int) $this->barang->count_all();
        $records_filtered = $records_total;

        $this->barang->_database->select($columns);
        if (empty($search['value']) == false) {
            $this->barang->_database->like('nama', $search['value']);
            // $records_filtered = $this->barang->_database->get($this->barang->_table)->num_rows();
            $records_filtered = $this->barang->count_all();
            $this->barang->_database->reset_query();
        }

        if (empty($order[0]) == false) {
            $this->barang->_database->order_by($order[0]['column'], $order[0]['dir']);
        }

        $this->barang->_database->limit($length, $start);
        $barang = $this->barang->_database->get($this->barang->_table);
        // debug($barang);
        $barang_data = [
          'draw' => (int) $this->input->post('draw'),
          'recordsTotal' => $records_total,
          'recordsFiltered' => $records_filtered,
          'data' => $barang->result()
        ];

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode($barang_data));
        exit;
    }

    public function create()
    {
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('barang/create');
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

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
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

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
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $barang = $this->barang->get($id);
        $return = false;
        if (!empty($barang)) {
            $return = $this->barang->delete($barang->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }
}
