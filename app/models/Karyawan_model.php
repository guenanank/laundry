<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Karyawan Model
 *
 * @author nanank
 */

 class Karyawan_model extends MY_Model
 {
     public $_table = 'karyawan';
     public $soft_delete = true;
     public $after_get = ['get_bagian', 'get_gaji'];
     public $before_create = ['set_gaji', 'created_at'];
     public $before_update = ['set_gaji', 'updated_at'];

     public function __construct()
     {
         parent::__construct();
     }

     public function bagian($bagian = null)
     {
        $array = ['Sekertaris', 'Gudang', 'Supir/Kondektur', 'Keamanan', 'Mekanik', 'Umum'];
        $keys = array_map(function($item) {
          return camelize($item);
        }, $array);

        $lists = array_combine($keys, $array);
        return is_null($bagian) ? $lists : $lists[$bagian];
     }

     public function get_bagian($row)
     {
       if (is_object($row)) {
           $row->bagian = $this->bagian($row->bagian);
       } else {
           $row['bagian'] = $this->bagian($row['bagian']);
      }
       return $row;
     }

     public function get_gaji($row)
     {
       if (is_object($row)) {
           $row->gaji_harian = number_format($row->gaji_harian);
           $row->gaji_bulanan = number_format($row->gaji_bulanan);
           $row->gaji_lemburan = number_format($row->gaji_lemburan);
       } else {
           $row['gaji_harian'] = number_format($row['gaji_harian']);
           $row['gaji_bulanan'] = number_format($row['gaji_bulanan']);
           $row['gaji_lemburan'] = number_format($row['gaji_lemburan']);
       }
       return $row;
     }

     public function set_gaji($row)
     {
         if (is_object($row)) {
             $row->gaji_harian = str_replace(',', null, $row->gaji_harian);
             $row->gaji_bulanan = str_replace(',', null, $row->gaji_bulanan);
             $row->gaji_lemburan = str_replace(',', null, $row->gaji_lemburan);
         } else {
             $row['gaji_harian'] = str_replace(',', null, $row['gaji_harian']);
             $row['gaji_bulanan'] = str_replace(',', null, $row['gaji_bulanan']);
             $row['gaji_lemburan'] = str_replace(',', null, $row['gaji_lemburan']);
         }
         return $row;
     }
 }
