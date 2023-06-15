<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_h_model extends CI_Model {
	public function view_by_date($date){
        $this->db->where('DATE(bookingStDt)', $date); // Tambahkan where tanggal nya
        
        $this->db
                ->select('*')
                ->from('tb_log_rooms_bookings')
                ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
                ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                ->where('tb_ref_status_transaction.status_booking_id', 2);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
               
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
		//return $this->db->get('tb_log_rooms_bookings')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
        $this->db->where('MONTH(bookingStDt)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(bookingStDt)', $year); // Tambahkan where tahun
        
        $this->db
                ->select('*')
                ->from('tb_log_rooms_bookings')
                ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
                ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                ->where('tb_log_rooms_bookings.status_booking', 2);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
               
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
		//return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
        $this->db->where('YEAR(bookingStDt)', $year); // Tambahkan where tahun
        
        $this->db
                ->select('*')
                ->from('tb_log_rooms_bookings')
                ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
                ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                ->where('tb_log_rooms_bookings.status_booking', 2);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
               
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
		//return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
	}
    
	public function view_all(){
		//return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan semua data transaksi
        $this->db
                ->select('*')
                ->from('tb_log_rooms_bookings')
                ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
                ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                ->where('tb_log_rooms_bookings.status_booking', 2);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
               
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(bookingStDt) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('tb_log_rooms_bookings'); // select ke tabel transaksi
        $this->db->order_by('YEAR(bookingStDt)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(bookingStDt)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}
