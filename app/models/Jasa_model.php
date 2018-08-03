<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Jasa Model
 *
 * @author nanank
 */

 class Jasa_model extends MY_Model
 {
    public $_table = 'jasa';
    public $soft_delete = true;
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct()
    {
        parent::__construct();
    }
 }
