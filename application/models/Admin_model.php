<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

       public function tambahRole($data,$table)
       {
              
               $this->db->insert($table,$data);
       }
       public function hapusRole($id)
       {
        // $this->db->where('id', $id);
        $this->db->delete('user_role', ['id' => $id]);
       }	
       public function getUsers()
       {
        $this->db
        ->select('*')
        ->from('user')
        //->join('tb_rooms', 'tb_rooms.roomId= tb_rooms_bookings.bookingRoomId' )
        ->where('role_id', 1);
        //->where_not_in('bookingEdDt <=', $data['bookingEdDt']);
       
        $query = $this->db->get();
        //return $query->result_array();
        return $query->result();

       }
        public function hapusUser($userId)
        {
        // $this->db->where('id', $id);
        $this->db->delete('user', ['userId' => $userId]);
        }
        public function update_user($where, $table)
        {
                return $this->db->get_where($table, $where);
        }
        public function update_user_proses($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

}