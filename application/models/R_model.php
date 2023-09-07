<?php
defined('BASEPATH') or exit('No direct script access allowed');

class R_model extends CI_Model
{
    public function getReservation($data = null)
    {
        $this->db->select('*')
            ->from('tb_rooms_bookings')
            //$this->db->from('polmedrefdb.r_status_aktif'); 
            //->join('tb_rooms', 'tb_rooms.roomId= tb_rooms_bookings.bookingRoomId' )
            ->where('bookingStDt >=', $data['bookingStDt'])
            ->where('bookingEdDt <=', $data['bookingEdDt']);
        //$this->db->where('bookingEdDt <=', $data['bookingEdDt'] AND);
        //$this->db->where('mhsAngkatan', 2019);
        //$this->db->order_by('mhsNim', 'DESC');
        $where_clause = $this->db->get_compiled_select();
        $query = $this->db->where("bookingRoomId NOT IN ($where_clause)", NULL, FALSE)->get('tb_rooms_bookings');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
        return $query();
    }


    public function testGetR($data = null)
    {

        $x = $data['bookingStDt'];
        $y = $data['bookingEdDt'];
        $sql = "SELECT *
        FROM tb_rooms as b
        WHERE NOT EXISTS 
            (SELECT * 
             FROM tb_rooms_bookings as a
             WHERE  a.bookingRoomId = b.roomId and
             a.bookingStDt = '$x' and a.bookingEdDt = '$y')";
        $query = $this->db->query($sql);
        //return $query->result_array();
        return $query;
    }

    public function getR($data)
    {
        // Ambil semua roomId yang sudah dipesan pada tanggal tertentu
        $this->db->select('bookingRoomId')
            ->from('tb_rooms_bookings')
            ->where('bookingStDt <=', $data['bookingEdDt'])
            ->where('bookingEdDt >=', $data['bookingStDt']);

        $query = $this->db->get();
        $booked_room_ids = $query->result_array();
        $booked_room_ids = array_column($booked_room_ids, 'bookingRoomId');

        // Ambil semua kamar dengan batasan tamu yang sesuai dan belum dipesan pada tanggal tersebut
        $this->db->select('*')
            ->from('tb_rooms')
            ->where('total_guess >=', $data['total_guess']);

        if (!empty($booked_room_ids)) {
            $this->db->where_not_in('roomId', $booked_room_ids);
        }

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }




    public function getT($data = null)
    {
        $this->db
            ->select('*')
            ->from('tb_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_rooms_bookings.bookingRoomId')
            ->where_not_in('bookingStDt >=', $data['bookingStDt'])
            ->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query;
    }
}
