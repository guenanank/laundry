<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Order Model
 *
 * @author nanank
 */

 class Order_model extends MY_Model
 {
     public $_table = 'order';
     public $soft_delete = true;
     public $belongs_to = [
       'pelanggan' => ['primary_key' => 'id_pelanggan', 'model' => 'pelanggan_model']
     ];
     public $has_many = ['detil' => ['primary_key' => 'id_order', 'model' => 'order_lengkap_model']];
     public $after_get = ['get_harga'];
     public $before_create = ['set_harga', 'created_at'];
     public $before_update = ['set_harga', 'updated_at'];

     public function __construct()
     {
         parent::__construct();
     }

     public function nomer()
     {
        $this->after_get = [];
        $where = [
          'substring(nomer, 4, 4) = ' => date('Y'),
          'substring(nomer, 9, 2) = ' => date('m')
        ];
        $last = $this->with_deleted()->order_by('nomer', 'desc')->limit(1)->get_by($where);
        $number = empty($last) ? 0 : substr($last->nomer, 13);
        return sprintf('KL-%s/%s-OR%03d', date('Y'), date('m'), $number + 1);
     }

     public function get_harga($row)
     {
       if (is_object($row)) {
           $row->jumlah_tunai = number_format($row->jumlah_tunai);
           $row->jumlah_cicil = number_format($row->jumlah_cicil);
       } else {
           $row['jumlah_tunai'] = number_format($row['jumlah_tunai']);
           $row['jumlah_cicil'] = number_format($row['jumlah_cicil']);
       }
       return $row;
     }

     public function set_harga($row)
     {
         if (is_object($row)) {
             $row->jumlah_tunai = str_replace(',', null, $row->jumlah_tunai);
             $row->jumlah_cicil = str_replace(',', null, $row->jumlah_cicil);
         } else {
             $row['jumlah_tunai'] = str_replace(',', null, $row['jumlah_tunai']);
             $row['jumlah_cicil'] = str_replace(',', null, $row['jumlah_cicil']);
         }
         return $row;
     }
 }
