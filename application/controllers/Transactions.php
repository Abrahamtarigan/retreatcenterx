<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //is_logged_in();
        //$this->load->model('Notify_model','notify_model');
        //$this->load->model('Admin_model');
        //$this->load->model('Apps_model', 'appsSet');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Admin_model', 'admin');
        $this->load->model('User_model', 'user_m');
        $this->load->model('Transactions_model', 'transactions');
        //$role = $this->session->userdata('role_id');
        //$access = $this->db->get_where('user_access_sub_menu', ['role_id' => $role])->row_array();

    }
    private function _access()
    {
        $ci = get_instance();
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['menuId'];
        //$submenu = $ci->uri->segment(2);
        //$querySubMenu = $ci->db->get_where('user_sub_menu', ['segment' => $submenu])->row_array();
        //$submenu_id = $querySubMenu['id'];

        $userAccessMenu = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            //'menu_id' => $menu_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccessMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
    public function index()
    {
        $this->_access();
        $data['title'] = 'Refrensi Transaksi';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $data['users'] = $this->db->get_where('user', array('role_id >' => 1))->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        //$data['users'] = $this->admin->getUsers();
        $userId = $this->input->post('userId');
        $bookingId = $this->input->post('bookingId');
        $tanggal = $this->input->post('tanggal');

        // get all transaction
        $data['getAllOnGoingTransactions'] = $this->transactions->getAllTransactions($userId, $bookingId, $tanggal);
        $data['getUserEdit'] = $this->transactions->getUserEdit();
        //$data['getAllOnGoingTransactions'] = $this->transactions->getAllOnGoingTransactions();
        $data['getCanceledTransactions'] = $this->transactions->getCanceledTransactions();
        $data['getSuccessTransactions'] = $this->transactions->getSuccessTransactions();
        $data['getValidateOption'] = $this->transactions->getValidateOption();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('transaction/index', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function hapusUser($userId)
    {
        $this->_access();
        $this->admin->hapusUser($userId);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('users/');
    }
    public function editUser($userId)
    {
        $this->_access();
        $userId = decrypt_url($userId);
        $data['title'] = 'Dashboard User';
        $data['sub_title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $where = array('userId' => $userId);
        $data['user_Edit'] = $this->admin->update_user($where, 'user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('users/edit', $data);
        $this->load->view('templates_admin/footer', $data);
    }
    public function ubah_harga()
    {
        $this->_access();

        $user_email = $this->session->userdata('userEmail');
        $get_user_id = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
        foreach ($get_user_id->result() as $row) {
            $userNama = $row->userNama;
            //$roomName =  $row->roomName;
        }
        //$userId = $this->input->post('menuId');

        $bookingId = $this->input->post('bookingId');
        $bookingTotalPay = $this->input->post('bookingTotalPay');
        $userEditKeterangan = $this->input->post('userEditKeterangan');
        $data = array(
            'userEditPriceId' => $userNama,
            //'bookingTotalPay' => $bookingTotalPay,
            'userEditKeterangan' => $userEditKeterangan

        );
        $datas = array(
            //'userEditPriceId' => $userNama,
            //'bookingTotalPay' => $bookingTotalPay,
            'price_total' => $bookingTotalPay,

        );

        $where = array(
            'bookingId' => $bookingId
        );
        $wheres = array(
            'booking_id' => $bookingId
        );

        $this->transactions->update_keterangan_proses($where, $data, 'tb_rooms_bookings');
        $this->transactions->update_harga_proses($wheres, $datas, 'tb_total_pay');
        $this->session->set_flashdata('message', 'Berhasil Diubah');

        redirect('transactions/');
    }
    public function validate()
    {
        $this->_access();
        if ($this->input->method() === 'post') {
            // the user id contain dot, so we must remove i
            // $uploaded_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            //$file_name = $uploaded_data['file_name'];
            //$this->load->helper('url');
            //$file_name = $this->input->post('roomName');
            $config['upload_path']          = FCPATH . '/upload/payment_proved';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            //$config['file_name']            = 'file_name'; 
            $config['overwrite']            = true;

            $this->load->library('upload', $config);

            // ngambil data yang memvalidasi
            $user_email = $this->session->userdata('userEmail');
            $bookingId = $this->input->post('bookingId');
            $get_user_validating = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
            foreach ($get_user_validating->result() as $row) {
                $userNama = $row->userNama;
                //$roomName =  $row->roomName;
            }

            $get_validate_booked = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingId = '$bookingId'");
            foreach ($get_validate_booked->result() as $row) {
                //$userNama = $row->userNama;
                $id = $row->id;
                $bookingId = $row->bookingId;
                $bookingId_text = $row->bookingId_text;
                $bookingRoomId = $row->bookingRoomId;
                $bookingStDt = $row->bookingStDt;
                $bookingEdDt = $row->bookingEdDt;
                $bookingStDt_check = $row->bookingStDt_check;
                $bookingEdDt_check = $row->bookingEdDt_check;
                $bookingTime = $row->bookingTime;
                $bookingTimeStacEnd = $row->bookingTimeStacEnd;
                $bookingUserId = $row->bookingUserId;
                $bookingNights = $row->bookingNights;
                $bookingTotalPay = $row->bookingTotalPay;
                $userEditPriceId = $row->userEditPriceId;
                $userEditKeterangan = $row->userEditKeterangan;
                $status_booking = $row->status_booking;
                $payment_prove_image = $row->payment_prove_image;
                $adminOpValidate = $row->adminOpValidate;
                $is_pay = $row->is_pay;
                //$roomName =  $row->roomName;
            }

            if (!$this->upload->do_upload('payment_prove_image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $file_name = $uploaded_data['file_name'];

                $base = base_url('/upload/payment_proved/' . $file_name);

                $data = [
                    //'roomId' => $this->input->post('roomId'),

                    // 'status_booking' => $this->input->post('status_booking'),
                    // 'adminOpValidate' => $userNama,
                    // 'payment_prove_image' => $file_name,
                    'id' => $id,
                    'bookingId' => $bookingId,
                    'bookingId_text' => $bookingId_text,
                    'bookingUserId' => $bookingUserId,
                    'bookingRoomId' => $bookingRoomId,
                    'bookingStDt' => $bookingStDt,
                    'bookingEdDt' => $bookingEdDt,
                    'bookingStDt_check' => $bookingStDt_check,
                    'bookingEdDt_check' => $bookingEdDt_check,
                    'bookingTime' => $bookingTime,
                    'bookingTimeStacEnd' => $bookingTimeStacEnd,
                    'bookingNights' => $bookingNights,
                    'bookingTotalPay' => $bookingTotalPay,
                    'userEditPriceId' => $userEditPriceId,
                    'userEditKeterangan' => $userEditKeterangan,
                    'status_booking' => $this->input->post('status_booking'),
                    'status_order_id' => 3,
                    'adminOpValidate' => $userNama,
                    'payment_prove_image' => $base . '/upload/payment_proved/' . $file_name,
                    'is_pay' => 0

                ];
                // $where = array(
                //     'bookingId' => $bookingId
                // );

                //$this->transactions->validate_proses($data, 'tb_log_rooms_bookings');
                $this->db->query("UPDATE tb_rooms_bookings
                SET status_booking = 2,
                    status_order_id = 3,
                    payment_prove_image = '$base'
                WHERE bookingId = $bookingId");
                //$this->db->query("DELETE from tb_rooms_bookings  WHERE bookingId = $bookingId");
                $this->session->set_flashdata('message', 'Berhasil Melakukan Validasi Pembayaran');
                redirect('transactions/');
            }
        }

        $this->load->view('admin/setting_upload_avatar.php', $data);
    }
    public function validate_confirmation()
    {
        $this->_access();
        if ($this->input->method() === 'post') {


            // ngambil data yang memvalidasi
            $user_email = $this->session->userdata('userEmail');
            $bookingId = $this->input->post('bookingId');
            $get_user_validating = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
            foreach ($get_user_validating->result() as $row) {
                $userNama = $row->userNama;
                //$roomName =  $row->roomName;
            }

            $get_validate_booked = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingId = '$bookingId'");
            foreach ($get_validate_booked->result() as $row) {
                //$userNama = $row->userNama;
                //$userNama = $row->userNama;
                $id = $row->id;
                $bookingId = $row->bookingId;
                $bookingId_text = $row->bookingId_text;
                $bookingRoomId = $row->bookingRoomId;
                $bookingStDt = $row->bookingStDt;
                $bookingEdDt = $row->bookingEdDt;
                $bookingStDt_check = $row->bookingStDt_check;
                $bookingEdDt_check = $row->bookingEdDt_check;
                $bookingTime = $row->bookingTime;
                $bookingTimeStacEnd = $row->bookingTimeStacEnd;
                $bookingUserId = $row->bookingUserId;
                $bookingNights = $row->bookingNights;
                $bookingTotalPay = $row->bookingTotalPay;
                $userEditPriceId = $row->userEditPriceId;
                $userEditKeterangan = $row->userEditKeterangan;
                $status_booking = $row->status_booking;
                $payment_prove_image = $row->payment_prove_image;
                $adminOpValidate = $row->adminOpValidate;
                $is_pay = $row->is_pay;
                //$roomName =  $row->roomName;
                //$roomName =  $row->roomName;
            }


            $data = [

                //'payment_prove_image' => $file_name,
                'id' => $id,
                'bookingId' => $bookingId,
                'bookingId_text' => $bookingId_text,
                'bookingUserId' => $bookingUserId,
                'bookingRoomId' => $bookingRoomId,
                'bookingStDt' => $bookingStDt,
                'bookingEdDt' => $bookingEdDt,
                'bookingStDt_check' => $bookingStDt_check,
                'bookingEdDt_check' => $bookingEdDt_check,
                'bookingTime' => $bookingTime,
                'bookingTimeStacEnd' => $bookingTimeStacEnd,
                'bookingNights' => $bookingNights,
                'bookingTotalPay' => $bookingTotalPay,
                'userEditPriceId' => $userEditPriceId,
                'userEditKeterangan' => $userEditKeterangan,
                'status_booking' => $this->input->post('status_booking'),
                'adminOpValidate' => $userNama,
                'payment_prove_image' => $payment_prove_image,
                'is_pay' => 0


            ];


            $this->transactions->validate_proses($data, 'tb_log_rooms_bookings');
            $this->db->query("UPDATE tb_rooms_bookings
                                        SET status_booking = 2
                                        WHERE id = $id");

            $this->session->set_flashdata('message', 'Berhasil Melakukan Konfirmasi Pembayaran');
            redirect('transactions/');
        }
    }
}
