<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Barang
 *
 * @author nanank
 */
class Dasbor extends CI_Controller
{
    protected $title = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/dashboard');
        $this->load->view('backend/footer');
    }
}
