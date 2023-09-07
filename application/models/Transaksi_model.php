<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    protected $table = 'tb_transaksi_resto';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function read()
    {
        $this->db->select('id, masakan, total, no_meja, date_format(tanggal,"%d %M %Y") as tanggal, harga');
        $table = $this->db->get($this->table);
        if ($table->num_rows() > 0) {
            foreach ($table->result() as $key => $value) {
                $value->masakan = explode(',', $value->masakan);
                $value->total = explode(',', $value->total);
            }

            return $table->result();
        } else {
            return 'kosong';
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete($this->table);
    }

    public function proses($masakan, $total)
    {
        foreach ($masakan as $key => $id) {
            $data[] = $this->db->query('SELECT nama, harga, harga * ' . $total[$key] . ' as total FROM `masakan` WHERE id = ' . $id)->row();
            $data[$key]->qty = $total[$key];
        }

        return $data;
    }

    public function detail($id)
    {
        $this->db->select('id, masakan, total, no_meja, date_format(tanggal,"%d %M %Y") as tanggal, harga');
        $this->db->where('id', $id);
        $table = $this->db->get($this->table)->row();
        $table->masakan = explode(',', $table->masakan);
        $table->total = explode(',', $table->total);
        $table->harga = explode(',', $table->harga);

        return $table;
    }

    public function getBookingUserResto()
    {
        $this->db
            ->select('*')
            ->from('tb_transaksi_resto')
            ->join('user', 'user.userId=tb_transaksi_resto.userId')
            //->join('tb_ref_status_resto', 'tb_ref_status_resto.id=tb_transaksi_resto.status_pembayaran' )
            //->join('tb_total_pay')
            ->where('tb_transaksi_resto.userId', $userId);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
    }
    public function view_by_date($date)
    {
        $this->db->where('DATE(bookingStDt)', $date); // Tambahkan where tanggal nya

        $this->db
            ->select('*')
            ->from('tb_log_rooms_booking');
        //->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
        //->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
        //->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
        //->where('tb_ref_status_transaction.status_booking_id', 2);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
        //return $this->db->get('tb_log_rooms_bookings')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year)
    {
        $this->db->where('MONTH(bookingStDt)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(bookingStDt)', $year); // Tambahkan where tahun

        $this->db
            ->select('*')
            ->from('tb_log_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
            ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
            ->where('tb_log_rooms_bookings.status_booking', 2);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
        //return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {
        $this->db->where('YEAR(bookingStDt)', $year); // Tambahkan where tahun

        $this->db
            ->select('*')
            ->from('tb_log_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
            ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
            ->where('tb_log_rooms_bookings.status_booking', 2);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
        //return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all()
    {
        //return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan semua data transaksi
        $this->db
            ->select('*')
            ->from('tb_log_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
            ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
            ->where('tb_log_rooms_bookings.status_booking', 2);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
    }

    public function option_tahun()
    {
        $this->db->select('YEAR(bookingStDt) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('tb_log_rooms_bookings'); // select ke tabel transaksi
        $this->db->order_by('YEAR(bookingStDt)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(bookingStDt)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
