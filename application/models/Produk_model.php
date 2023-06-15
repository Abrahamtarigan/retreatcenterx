<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    // akses untuk guess
    //
    //
    public function getDetail($roomId)
    {
        $this->db->select('*')->from('tb_rooms')->where(['roomId'  => $roomId]);
        //$this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        //$this->db->join('tb_rooms_facility', 'tb_rooms_facility.rmId=tb_rooms.roomId');
        //$this->db->join('tb_ava_wifi', 'tb_ava_wifi.avaWifiRoomId=tb_rooms.roomId');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getFacility($roomId)
    {
        $this->db->select('*')->from('tb_rooms_facility')->where(['rmId'  => $roomId]);
        //$this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->join('tb_rooms', 'tb_rooms.roomId=tb_rooms_facility.rmId');
        //$this->db->join('tb_ava_wifi', 'tb_ava_wifi.avaWifiRoomId=tb_rooms.roomId');
        $query = $this->db->get();
        return $query;
      
    }
    public function getPicture($roomId)
    {
        $this->db->select('*')->from('tb_rooms_picture')->where(['rmId'  => $roomId]);
        //$this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->join('tb_rooms', 'tb_rooms.roomId=tb_rooms_picture.rmId');
        //$this->db->join('tb_ava_wifi', 'tb_ava_wifi.avaWifiRoomId=tb_rooms.roomId');
        $query = $this->db->get();
        return $query;
      
    }
    public function getHeadPic($roomId)
    {
        $this->db->select('*')->from('tb_rooms')->where(['roomId'  => $roomId]);
        //$this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        //$this->db->join('tb_rooms', 'tb_rooms.roomId=tb_rooms_picture.rmId');
        //$this->db->join('tb_ava_wifi', 'tb_ava_wifi.avaWifiRoomId=tb_rooms.roomId');
        $query = $this->db->get();
        return $query;
      
    }
    public function getDetails($roomId)
    {
        $this->db->select('*')->from('tb_rooms')->where(['roomId'  => $roomId]);
        //$this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        //$this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return 0;
        }
    }
    public function getExtender()
    {
        {
            $this->db
            ->select('*')
            ->from('tb_rooms_extender');
            // ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking');
            //->where('status_booking_id', 2);
            //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
           
            $query = $this->db->get();
            //return $query->result_array();
            return $query->result();
        }
        
    }

    // akses untuk admin
    //
    //
    

}
