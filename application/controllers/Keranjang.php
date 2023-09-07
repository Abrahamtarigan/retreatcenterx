<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // is_logged_in();
        // $this->load->model('Notify_model','notify_model');
        // $this->load->model('Admin_model');
        // $this->load->model('Apps_model', 'appsSet');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model', 'user');
        $this->load->model('Restaurant_model', 'resto');
        $this->load->model('Meja_model', 'meja');
        $this->load->library('user_agent');
        $this->load->model('Transaksi_model', 'resto_transaksi');
        $this->load->model('Keranjang_model', 'keranjang');
        // $this->load->model('Transactions_model','transactions');
        $role = $this->session->userdata('role_id');
        $this->load->library('cart');
        // $access = $this->db->get_where('user_access_sub_menu', ['role_id' => $role])->row_array();
    }

    private function _access()
    {
        $ci = get_instance();
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['menuId'];

        $userAccessMenu = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            // 'menu_id' => $menu_id,
            'menu_id' => $menu_id,
        ]);

        if ($userAccessMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // untuk membuat variabel mendapatkan nilai dari userEmail
        $user_email = $this->session->userdata('userEmail');
        $get_user_validating = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
        foreach ($get_user_validating->result() as $row) {
            $userId = $row->userId;
            //$roomName =  $row->roomName;
            //$fetch_id = $this->session->set_userdata($row->userId);

        }
        $fetch_userId = $this->session->userdata('userEmail');
        $randNumber = rand(1211, 8311);
        $randNumber4 = rand(121, 131);
        //$data['bookRestoId'] = $userId.$randNumber4.$randNumber;
        //$this->session->set_userdata('bookRestoId', $data['bookRestoId']);

        $datas = [
            'title' => 'RC - Keranjang'
        ];
        $get_user_validating = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
        foreach ($get_user_validating->result() as $row) {
            $data['userId'] = $row->userId;
            //$roomName =  $row->roomName;
            //$fetch_id = $this->session->set_userdata($row->userId);

        }


        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('keranjang/index', $datas, $data);
        $this->load->view('templates/footer', $data);
    }
    public function checkout()
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_date_time = date('Y-m-d H:i:s');
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();

        $user_email = $this->session->userdata('userEmail');
        //$bookingId = $this->input->post('bookingId');
        $get_user_validating = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
        foreach ($get_user_validating->result() as $row) {
            $userId = $row->userId;
            //$roomName =  $row->roomName;
            //$fetch_id = $this->session->set_userdata($row->userId);

        }
        //$fetch_id = $this->session->set_userdata();
        // $transaction_details = array(
        // 	'order_id' 			=> 'RC-'.uniqid(),
        // 	'gross_amount' 	=> $this->session->totalBayar
        // );

        //buat id pengacak
        $unique = uniqid() . uniqid();
        $eightdigitrandom = rand(10000, 99999999);
        $randNumber = rand(1211, 8311);
        $randNumber4 = rand(121, 131);

        //cek session booking id
        if ($this->session->userdata('bookingId') == null) {
            $start_clock = '02:00:00';
            $end_clock = '12:00:00';

            $bookingId = '88' . $randNumber4 . $randNumber;
            $this->session->set_userdata('bookingId', $bookingId);
            $order_idt = 'RC-88-' . $randNumber4 . uniqid();
            $this->session->set_userdata('order_idt', $order_idt);
        } else {
            $bookingId = $this->session->userdata('bookingId');
        }
        //kalo belum ada order id text
        if ($this->session->userdata('order_idt') == null) {
            $order_idt = 'RC-88-' . $randNumber4 . uniqid();
            $this->session->set_userdata('order_idt', $order_idt);
        } else {
            $order_idt = $this->session->userdata('order_idt');
        }
        //$order_id = 'RC-'.$userId.$randNumber4.$randNumber;
        //$this->session->set_userdata('bookRestoId', $bookRestoId);
        // Populate items

        $i = 0;
        //echo $fetch_id;

        foreach ($this->cart->contents() as $key => $val) :
            $items[$i] = [
                'id'             => $this->session->userdata('bookingId'),
                'order_id'         => $order_idt,
                'userId'        => $userId,
                'price'         => $val['price'],
                'hotel_id'         => $val['coupon'],
                'quantity'         => $val['qty'],
                'category'         => $val['option'],
                'name'             => $val['name'],
                'total_price'   => $val['price'] * $val['qty']

            ];
            $i++;

            //print_r($items);
            $this->db->insert_batch('tb_new_orders', $items);

            $id_ = $val['coupon'];
            echo $this->session->userdata('bookingId');
            if ($val['option'] == 'Hotel') {

                $query_hotel_insert = $this->db->query("SELECT * FROM tb_backup_bookings WHERE id_ = $id_");
                foreach ($query_hotel_insert->result() as $row) {

                    $bookingStart = $row->bookingStDt;
                    $bookingEnd = $row->bookingEdDt;
                    $bookingNights = $row->bookingNights;
                    $roomIdBook = $row->bookingRoomId;
                }
                $query_total_pay = $this->db->query("SELECT * FROM tb_rooms WHERE roomId = '$roomIdBook'");
                foreach ($query_total_pay->result() as $row) {
                    $roomPrice = $row->roomPricePerNight;
                    $roomName = $row->roomName;
                }
                $j = 0;


                $order_hotel[$j] = [
                    'bookingId' => $this->session->userdata('bookingId'),
                    'bookingId_text' => $order_idt,
                    'ext_id' => $val['coupon'],
                    'bookingUserId' => $userId,
                    'bookingRoomId' => $roomIdBook,
                    'bookingStDt' => $bookingStart,
                    'bookingEdDt' => $bookingEnd,
                    'bookingStDt_check' => $bookingStart . ' 02:00:00',
                    'bookingEdDt_check' => $bookingEnd . ' 12:00:00',
                    'bookingTime' => date('Y-m-d H:i:s'),
                    'bookingTimeStacEnd' => date('Y-m-d H:i:s', strtotime('+29 minutes', strtotime($current_date_time))),
                    'bookingNights' => $bookingNights,
                    'bookingTotalPay' => $val['price'] * $val['qty'],
                    'userEditPriceId' => '-',
                    'userEditKeterangan' => '-',
                    'status_booking' => 1,
                    'is_pay' => 0,
                ];
                $j++;

                $this->db->insert_batch('tb_rooms_bookings', $order_hotel);
            }
            if ($val['option'] == 'Restaurant') {

                $r = 0;

                $order_resto[$r] = [

                    //'id' => '1-'.$randNumber,
                    'bookingId' => $this->session->userdata('bookingId'),
                    'bookingId_text' => $order_idt,
                    'userId' => $userId,
                    'masakan' => $val['name'],
                    'total' => $val['qty'],
                    'no_meja' => 0,
                    'tanggal' => date('Y-m-d'),
                    'total_harga' => $val['price'] * $val['qty'],
                    //'image'   => $this->input->post('gambar', true)

                ];
                $r++;

                $this->db->insert_batch('tb_transaksi_resto', $order_resto);
            }
        endforeach;
        $this->cart->destroy();
        redirect('guess/cart');

        unset(
            $_SESSION['bookingId'],
            $_SESSION['order_idt'],
            $_SESSION['roomId'],
        );
    }
}
