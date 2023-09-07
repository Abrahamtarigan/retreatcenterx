<?php

class Transactions_model extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    public function getAllTransactions($userId, $bookingId, $tanggal)
    {
        $this->db->select('tb_rooms_bookings.*, tb_rooms.*, tb_ref_status_transaction.*, tb_ref_status_order.*,user.*, tb_total_pay.*')
            ->from('tb_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId = tb_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_rooms_bookings.bookingUserId')
            ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_rooms_bookings.status_booking')
            ->join('tb_total_pay', 'tb_total_pay.booking_id = tb_rooms_bookings.bookingId')
            ->join('tb_ref_status_order', 'tb_ref_status_order.status_order_id = tb_rooms_bookings.status_order_id')

            ->where('tb_rooms_bookings.id IN (SELECT MIN(id) FROM tb_rooms_bookings GROUP BY bookingId)');

        if ($userId != '') {
            $this->db->where('tb_rooms_bookings.bookingUserId', $userId);
        }
        if ($bookingId != '') {
            $this->db->like('tb_rooms_bookings.bookingId', $bookingId);
        }
        if ($tanggal != '') {
            $this->db->like('tb_rooms_bookings.tanggal', $tanggal);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function getCanceledTransactions()
    {
        $this->db
            ->select('*')
            ->from('tb_log_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
            ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
            ->where('status_booking', 0);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
    }
    public function getSuccessTransactions()
    {
        $this->db
            ->select('*')
            ->from('tb_log_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
            ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
            ->where('status_booking', 2);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
    }
    public function getAllOnGoingTransactions()
    {
        $this->db
            ->select('*')
            ->from('tb_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_rooms_bookings.bookingUserId');
        // ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking');
        //->where('bookingUserId', $userId);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
    }
    public function getUserEdit()
    {
        $this->db
            ->select('*')
            ->from('tb_rooms_bookings')
            ->join('tb_rooms', 'tb_rooms.roomId= tb_rooms_bookings.bookingRoomId')
            ->join('user', 'user.userId = tb_rooms_bookings.userEditPriceId');
        // ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking');
        //->where('bookingUserId', $userId);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
    }
    public function update_keterangan_proses($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function update_harga_proses($wheres, $datas, $table)
    {
        $this->db->where($wheres);
        $this->db->update($table, $datas);
    }
    public function getValidateOption()
    {
        $this->db
            ->select('*')
            ->from('tb_ref_status_transaction')
            // ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking');
            ->where('status_booking_id', 2);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();
    }
    public function validate_proses($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function count_success_transactions()
    {
        $this->db->select('*')
            ->from('tb_log_rooms_bookings')
            ->where('status_booking', 2);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_success_transactions_on_going()
    {
        $this->db->select('*')
            ->from('tb_rooms_bookings')
            ->where('status_booking', 2);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_pending_transactions()
    {
        $this->db->select('*')
            ->from('tb_rooms_bookings')
            ->where('status_booking', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_waiting_confirmation()
    {
        $this->db->select('*')
            ->from('tb_rooms_bookings')
            ->where('status_booking', 3);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function total_earnings()
    {
        $this->db->select_sum('bookingTotalPay');
        $this->db->where('status_booking', 2);
        $query = $this->db->get('tb_log_rooms_bookings');
        if ($query->num_rows() > 0) {
            return $query->row()->bookingTotalPay;
        } else {
            return 0;
        }
    }
    public function validate_confirmation($where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function total_harga($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
