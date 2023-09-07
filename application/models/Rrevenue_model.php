<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rrevenue_model extends CI_Model
{

       public function getLarisMasakan()
       {
              $query = $this->db->query("SELECT masakan, SUM(total) as total FROM tb_transaksi_resto  WHERE status_pembayaran = 'Pembayaran Berhasil dilakukan' GROUP BY masakan");
              return $query->result();
       }
       public function getTotalPemasukan()
       {
              $this->db->select_sum('total_harga');
              $this->db->where('status_pembayaran', 'Pembayaran Berhasil dilakukan');
              $query = $this->db->get('tb_transaksi_resto');
              $result = $query->row();
              return $result->total_harga;
       }
       public function getPemasukanHariIni()
       {
              $query = $this->db->query("SELECT SUM(total_harga) AS total_pemasukan FROM tb_transaksi_resto WHERE status_pembayaran = 'Pembayaran Berhasil dilakukan' AND tanggal = DATE_FORMAT(NOW(), '%d-%m-%Y')");
              return $query->result();
       }
       public function getTotalPemasukanPerHari()
       {
              $query = $this->db->query("SELECT DATE_FORMAT(STR_TO_DATE(tanggal, '%d-%m-%Y'), '%m-%Y') AS bulan, SUM(total_harga) AS total_pemasukan FROM tb_transaksi_resto WHERE status_pembayaran = 'Pembayaran Berhasil dilakukan' GROUP BY DATE_FORMAT(STR_TO_DATE(tanggal, '%d-%m-%Y'), '%m-%Y')");
              return $query->result();
       }
       public function view_by_date($date)
       {
              //     $this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya
              $this->db->where('DATE(STR_TO_DATE(tanggal, "%d-%m-%Y")) =', $date); // Tambahkan operator 
              $this->db
                     ->select('*')
                     ->from('tb_transaksi_resto');
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
              $this->db->where('MONTH(STR_TO_DATE(tanggal, "%d-%m-%Y")) =', $month); // Tambahkan operator 
              $this->db->where('YEAR(STR_TO_DATE(tanggal, "%d-%m-%Y")) =', $year);

              $this->db
                     ->select('*')
                     ->from('tb_transaksi_resto')
                     // ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
                     // ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                     // ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                     ->where('status_pembayaran', 'Pembayaran Berhasil dilakukan');
              //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

              $query = $this->db->get();
              //return $query->result_array();
              return $query->result();
              //return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
       }

       public function view_by_year($year)
       {
              $this->db->where('YEAR(STR_TO_DATE(tanggal, "%d-%m-%Y")) =', $year); // Tambahkan operator pembanding (=) setelah kondisi tahun

              $this->db
                     ->select('*')
                     ->from('tb_transaksi_resto')
                     ->where('status_pembayaran', 'Pembayaran Berhasil dilakukan');

              $query = $this->db->get();
              return $query->result();
       }

       public function view_all()
       {
              //return $this->db->get('tb_log_rooms_bookings')->result(); // Tampilkan semua data transaksi
              $this->db->select('*')
                     ->from('tb_transaksi_resto')
                     // ->where('tb_transaksi_resto.id IN (SELECT MIN(id) FROM tb_transaksi_resto GROUP BY bookingId)')
                     // ->join('tb_total_pay', 'tb_total_pay.booking_id = tb_transaksi_resto.bookingId')
                     ->where('status_pembayaran', 'Pembayaran Berhasil dilakukan');

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

       // public function getMonthlyData()
       // {
       //        $query = $this->db->query("SELECT SUBSTRING(tanggal, 4, 2) AS bulan, YEAR(STR_TO_DATE(tanggal, '%d-%m-%Y')) AS tahun, SUM(total) AS total_masakan
       //                        FROM tb_transaksi_resto
       //                        WHERE status_pembayaran = 'Pembayaran Berhasil dilakukan'
       //                        GROUP BY bulan, tahun
       //                        ORDER BY tahun, bulan");

       //        $chartData = array();
       //        foreach ($query->result() as $row) {
       //               $bulanTahun = $row->bulan . '-' . $row->tahun;
       //               $chartData[$bulanTahun] = isset($chartData[$bulanTahun]) ? $chartData[$bulanTahun] + $row->total_masakan : $row->total_masakan;
       //        }

       //        return $chartData;
       // }
}
