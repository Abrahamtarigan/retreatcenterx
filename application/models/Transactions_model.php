<?php

Class Transactions_model extends CI_Model
{

function __construct(){

parent::__construct();

}

    public function getAllTransactions()
        {
         $this->db
                ->select('*')
                ->from('tb_log_rooms_bookings')
                ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
                ->join('user', 'user.userId = tb_log_rooms_bookings.bookingUserId')
                ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking');
                //->where('bookingUserId', $userId);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
               
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();                
        }
    public function getCanceledTransactions()
        {
         $this->db
                ->select('*')
                ->from('tb_log_rooms_bookings')
                ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
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
                ->join('tb_rooms', 'tb_rooms.roomId= tb_log_rooms_bookings.bookingRoomId' )
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
                ->join('tb_rooms', 'tb_rooms.roomId= tb_rooms_bookings.bookingRoomId' )
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
                ->join('tb_rooms', 'tb_rooms.roomId= tb_rooms_bookings.bookingRoomId' )
                ->join('user', 'user.userId = tb_rooms_bookings.userEditPriceId');
                // ->join('tb_ref_status_transaction', 'tb_ref_status_transaction.status_booking_id = tb_log_rooms_bookings.status_booking');
                //->where('bookingUserId', $userId);
                //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
               
                $query = $this->db->get();
                //return $query->result_array();
                return $query->result();
        }
    public function update_harga_proses($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
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
    public function validate_proses($data,$table)
        {          
            $this->db->insert($table,$data);
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
        if($query->num_rows()>0)
        {
            return $query->row()->bookingTotalPay;
        }
        else
        {
            return 0;
        }
     }
     public function validate_confirmation($where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function total_harga($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    }
                  

                
               
        
    

      

    


