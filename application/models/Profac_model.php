<?php

Class Profac_model extends CI_Model
{

function __construct(){

parent::__construct();

}

    public function getAllProducts()
        {
         $this->db
                ->select('*')
                ->from('tb_rooms');
                //->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
                //->join('tb_facility', 'tb_rooms_facility.rmId=tb_rooms.roomId');
                //->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId');
                //->where('bookingUserId', $userId);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
               
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();                
        }
    public function getAllFacility()
    {
        $this->db
                ->select('*')
                ->from('tb_rooms_facility')
                ->join('tb_rooms', 'tb_rooms.roomId=tb_rooms_facility.rmId');
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();       
        
    }
    public function tambah_fasilitas($data, $table)
    {
        $this->db->insert($table,$data);
    }
    public function tambah_gambar($data, $table)
    {
        $this->db->insert($table,$data);
    }
    public function tambah_produk($data, $table)
    {
        $this->db->insert($table,$data);
    }
    public function hapus_product($roomId)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_rooms', ['roomId' => $roomId]);
    }
    
                  

                
               
        
    

      

    


}