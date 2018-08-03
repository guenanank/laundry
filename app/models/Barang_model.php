<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Barang Model
 *
 * @author nanank
 */

 class Barang_model extends MY_Model
 {
    public $_table = 'barang';
    public $soft_delete = true;
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct()
    {
        parent::__construct();
    }
 }
