<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Pengeluaran Model
 *
 * @author nanank
 */

 class Pengeluaran_model extends MY_Model
 {
     public $_table = 'pengeluaran';
     public $soft_delete = true;

     public $after_get = ['get_jenis', 'get_jumlah'];
     public $before_create = ['created_at'];
     public $before_update = ['updated_at'];

     public function __construct()
     {
         parent::__construct();
     }

     public function jenis($jenis = null)
     {
         $array = ['Harian', 'Mingguan', 'Bulanan'];
         $keys = array_map(function ($item) {
           $item = camelize($item);
           return $item;
         }, $array);

         $lists = array_combine($keys, $array);
         return is_null($jenis) ? $lists : $lists[$jenis];
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
