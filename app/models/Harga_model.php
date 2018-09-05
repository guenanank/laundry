<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Harga Model
 *
 * @author nanank
 */

 class Harga_model extends MY_Model
 {
    public $_table = 'harga';
    public $soft_delete = true;
    public $after_get = ['get_harga'];
    public $belongs_to = [
      'barang' => ['primary_key' => 'id_barang', 'model' => 'barang_model'],
      'cuci' => ['primary_key' => 'id_cuci', 'model' => 'cuci_model']
    ];
    public $before_create = ['set_harga', 'created_at'];
    public $before_update = ['set_harga', 'updated_at'];

    public function __construct()
    {
        parent::__construct();
    }

    public function get_harga($row)
    {
      if (is_object($row)) {
          $row->tunai = number_format($row->tunai);
          $row->cicil = number_format($row->cicil);
      } else {
          $row['tunai'] = number_format($row['tunai']);
          $row['cicil'] = number_format($row['cicil']);
      }
      return $row;
    }

    public function set_harga($row)
    {
        if (is_object($row)) {
            $row->tunai = str_replace(',', null, $row->tunai);
            $row->cicil = str_replace(',', null, $row->cicil);
        } else {
            $row['tunai'] = str_replace(',', null, $row['tunai']);
            $row['cicil'] = str_replace(',', null, $row['cicil']);
        }
        return $row;
    }
 }
