<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Order
 *
 * @author nanank
 */
class Order extends CI_Controller
{
    protected $title = 'Data Order';

    protected $scripts = ['order'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model', 'order');
        $this->load->model('Pelanggan_model', 'pelanggan');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Cuci_model', 'cuci');
    }

    public function index()
    {
        $order = $this->order->with('pelanggan')->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('order/index', compact('order'));
        $this->load->view('footer');
    }

    public function create()
    {
        $nomer = $this->order->nomer();
        $pelanggan = $this->pelanggan->dropdown('nama');
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('order/create', compact('nomer', 'pelanggan', 'barang', 'cuci'));
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->order->insert($this->input->post())];
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
        $order = $this->order->get($id);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('order/edit', compact('order'));
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $order = $this->order->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->order->update($order->id, $this->input->post())];
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
      
        $order = $this->order->get($id);
        $return = false;
        if (empty($order) == false) {
            $return = $this->order->delete($order->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }
}
