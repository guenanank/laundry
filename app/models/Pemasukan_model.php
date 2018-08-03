<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Pemasukan Model
 *
 * @author nanank
 */

 class Pemasukan_model extends MY_Model
 {
     public $_table = 'pemasukan';
     public $soft_delete = true;

     public $belongs_to = ['pelanggan' => ['primary_key' => 'id_pelanggan', 'model' => 'pelanggan_model']];

     public $after_get = ['get_jenis', 'get_cara_bayar', 'get_jumlah'];
     public $before_create = ['created_at'];
     public $before_update = ['updated_at'];

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
        return sprintf('KL-%s/%s-PM%03d', date('Y'), date('m'), $number + 1);
     }

     public function jenis($jenis = null)
     {
         $array = ['Penambahan Biaya', 'Cicilan Pelanggan', 'Pembayaran Pelanggan'];
         $keys = array_map(function ($item) {
           $item = camelize($item);
           return $item;
         }, $array);

         $lists = array_combine($keys, $array);
         return is_null($jenis) ? $lists : $lists[$jenis];
     }

     public function cara_bayar($cara_bayar = null)
     {
         $array = ['Tunai', 'Giro', 'Cek', 'Transfer'];
         $keys = array_map(function ($item) {
           $item = camelize($item);
           return $item;
         }, $array);

         $lists = array_combine($keys, $array);
         return is_null($cara_bayar) ? $lists : $lists[$cara_bayar];
     }

     public function get_jenis($row)
     {
         if (is_object($row)) {
             $row->jenis = $this->jenis($row->jenis);
         } else {
             $row['jenis'] = $this->jenis($row['jenis']);
         }
         return $row;
     }

     public function get_cara_bayar($row)
     {
         if (is_object($row)) {
             $row->cara_bayar = $this->cara_bayar($row->cara_bayar);
         } else {
             $row['cara_bayar'] = $this->cara_bayar($row['cara_bayar']);
         }
         return $row;
     }

     public function get_jumlah($row)
     {
         if (is_object($row)) {
             $row->jumlah = number_format($row->jumlah);
         } else {
             $row['jumlah'] = number_format($row['jumlah']);
         }
         return $row;
     }

     public function set_jumlah($row)
     {
         if (is_object($row)) {
             $row->jumlah = str_replace(',', null, $row->jumlah);
         } else {
             $row['jumlah'] = str_replace(',', null, $row['jumlah']);
         }
         return $row;
     }
 }
