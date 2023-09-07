<?php

class User_model extends CI_Model
{

        function __construct()
        {

                parent::__construct();
        }

        public function tambahUser($data, $table)
        {
                $this->db->insert($table, $data);
        }
        public function checkoutBooking($data, $table)
        {
                $this->db->insert($table, $data);
        }
        public function checkoutBookingExtender($data, $table)
        {
                $this->db->insert($table, $data);
        }

        public function backupCheckoutBooking($data, $table)
        {
                $this->db->insert($table, $data);
        }
        public function getUserId($roomId)
        {
                $this->db->select('*')->from('tb_rooms')->where(['roomId'  => $roomId]);
                //$this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
                //$this->db->join('tb_rooms_facility', 'tb_rooms_facility.rmId=tb_rooms.roomId');
                //$this->db->join('tb_ava_wifi', 'tb_ava_wifi.avaWifiRoomId=tb_rooms.roomId');
                $query = $this->db->get();
                return $query->row_array();
        }
        public function count_bookings_hotel($userId, $bookingId, $tanggal)
        {
                $this->db->select('tb_rooms_bookings.*, tb_rooms.*, tb_ref_status_transaction.*, tb_ref_status_order.*')
                        ->from('tb_rooms_bookings')
                        ->join('tb_rooms', 'tb_rooms.roomId = tb_rooms_bookings.bookingRoomId')
                        ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_rooms_bookings.status_booking')
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
                return $query->num_rows();
        }
        public function getBookingUser($userId, $bookingId, $tanggal)
        {
                $this->db->select('tb_rooms_bookings.*, tb_rooms.*, tb_ref_status_transaction.*, tb_ref_status_order.*')
                        ->from('tb_rooms_bookings')
                        ->join('tb_rooms', 'tb_rooms.roomId = tb_rooms_bookings.bookingRoomId')
                        ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_rooms_bookings.status_booking')
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
        public function getRelatedBookingId($bookingId)
        {
                $this->db->select('tb_rooms_bookings.*, tb_rooms.*, tb_ref_status_transaction.*, tb_ref_status_order.*, tb_rooms_extender_facility_bookings.*,tb_rooms_extender.*')
                        ->from('tb_rooms_bookings')
                        ->join('tb_rooms', 'tb_rooms.roomId = tb_rooms_bookings.bookingRoomId')
                        ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_rooms_bookings.status_booking')
                        ->join('tb_ref_status_order', 'tb_ref_status_order.status_order_id = tb_rooms_bookings.status_order_id')
                        ->join('tb_rooms_extender_facility_bookings', 'tb_rooms_extender_facility_bookings.ext_id = tb_rooms_bookings.ext_id')
                        ->join('tb_rooms_extender', 'tb_rooms_extender.id = tb_rooms_extender_facility_bookings.room_extender_facility_id')
                        ->where('tb_rooms_bookings.bookingId', $bookingId)
                        ->where('tb_rooms_extender_facility_bookings.id IN (SELECT MIN(id) FROM tb_rooms_extender_facility_bookings GROUP BY ext_id)');

                $query = $this->db->get();
                return $query->result();
        }
        public function getTotRelBookId($bookingId)
        {
                $this->db->select('booking_id, SUM(price_total) as totalPrice')
                        ->from('tb_total_pay')
                        ->where('booking_id', $bookingId)
                        ->group_by('booking_id'); // Mengelompokkan hasil berdasarkan bookingId
                $query = $this->db->get();
                return $query->result();
        }

        public function getBookingUserClear($userId)
        {
                $this->db
                        ->select('*')
                        ->from('tb_log_rooms_bookings')
                        ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
                        //->join('tb_total_pay')
                        ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                        ->where('bookingUserId', $userId);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
        }
        public function getAllSucessTrById($userId)
        {
                $this->db
                        ->select('*')
                        ->from('tb_log_rooms_bookings')
                        ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
                        ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                        ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                        ->where('bookingUserId', $userId)
                        ->where('status_booking', 2);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
        }
        public function getPrintTf($bookingId)
        {
                $this->db
                        ->select('*')
                        ->from('tb_log_rooms_bookings')
                        ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId')
                        ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                        ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking')
                        ->join('tb_h', 'tb_h.bookingId = tb_log_rooms_bookings.bookingId')
                        //->where('bookingUserId', $userId)
                        ->where('tb_log_rooms_bookings.bookingId', $bookingId);
                //->where('status_booking', 2);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
        }
        public function getExtenderTf($fasilitas)
        {
                $this->db
                        ->select('*')
                        ->from('tb_rooms_extender')
                        ->join('tb_rooms_extender_facility_bookings', 'tb_rooms_extender_facility_bookings.room_extender_facility_id= tb_rooms_extender.id')
                        //->join('tb_t', 'tb_t.booking_id = tb_rooms_extender_facility_bookings.booking_id')
                        ->join('tb_rooms_bookings', 'tb_rooms_bookings.ext_id = tb_rooms_extender_facility_bookings.ext_id')

                        ->where('tb_rooms_extender_facility_bookings.ext_id', $fasilitas);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
        }
        function validate_proses($where, $data, $table)
        {
                $this->db->where($where);
                $this->db->update($table, $data);
        }
}
