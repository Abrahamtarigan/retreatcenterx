<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    public function insertDataOrders($items)
    {
        // $order = [
        //     'id_orders' => $midtransOrderId,
        //     'id_user' => $this->session->id_user,
        //     'status_order' => NULL,
        //     'total_harga_barang' => $this->session->totalBayar - $this->session->total_ongkir,
        //     'tanggal_order' => time(),
        //     'keterangan' => 'Menunggu Pembayaran'
        //   ]; // set data orders
               
          $this->db->insert($orders,$data);
          $this->db->insert_batch('tb_new_orders', $items); 
    }
   
}
