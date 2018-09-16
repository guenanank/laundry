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
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }
}
