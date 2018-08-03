<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Pelanggan Model
 *
 * @author nanank
 */

 class Pelanggan_model extends MY_Model
 {
    public $_table = 'pelanggan';
    public $soft_delete = true;
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct()
    {
        parent::__construct();
    }
 }
