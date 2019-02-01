<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Order_lengkap Model
 *
 * @author nanank
 */

 class Order_lengkap_model extends MY_Model
 {
     public $_table = 'order_lengkap';
     public $soft_delete = true;
     public $after_get = ['subtotal_tunai', 'subtotal_cicil'];
     public $before_create = ['created_at'];
     public $before_update = ['updated_at'];

     public function __construct()
     {
         parent::__construct();
     }

     public function subtotal_tunai($row)
     {
         if (is_object($row)) {
             $row->subtotal_tunai = $row->banyaknya * $row->harga_tunai;
         } else {
             $row['subtotal_tunai'] = $row->banyaknya * $row['harga_tunai'];
         }
         return $row;
     }

     public function subtotal_cicil($row)
     {
         if (is_object($row)) {
             $row->subtotal_cicil = $row->banyaknya * $row->harga_cicil;
         } else {
             $row['subtotal_cicil'] = $row->banyaknya * $row['harga_cicil'];
         }
         return $row;
     }
 }
