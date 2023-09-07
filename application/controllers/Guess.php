<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guess extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        //is_logged_in();
        //$this->load->model( 'Notify_model', 'notify_model' );
        //$this->load->model( 'Admin_model' );
        //$this->load->model( 'Apps_model', 'appsSet' );
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('User_model', 'guess');
        $this->load->library('pagination');

        //$role = $this->session->userdata( 'role_id' );
        //$access = $this->db->get_where( 'user_access_sub_menu', [ 'role_id' => $role ] )->row_array();

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
        //$data[ 'userNama' ] = $this->session->userdata( 'userNama' );
        $data['title'] = 'Hi, ';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        //$data[ 'appsSet' ] = $this->appsSet->get_apps_credentials()->result_array();

        $this->load->view('templates_guess/header', $data);
        //$this->load->view( 'templates_admin/sidebar_s', $data );
        $this->load->view('templates_guess/sidebar', $data);
        $this->load->view('guess/index', $data);
        $this->load->view('templates_guess/footer', $data);
    }

    public function cart()
    /**
     * @Author: flydreame
     * @Date: 2023-08-12 15:01:31
     * @Desc: function untuk mengambil data transaksi user, fasilitas yang diorder, dan pembayaran
     */
    {
        $this->_access();
        $data['title'] = 'Hi, ';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();

        // Untuk mendapatkan nilai dari userEmail
        $fetch_userId = $this->session->userdata('userEmail');

        // Query untuk mendapatkan userId dari tabel user
        $query = $this->db->query("SELECT * FROM user WHERE userEmail = '$fetch_userId'");
        $row = $query->row();
        // Mengambil hasil query sebagai objek tunggal

        $userId = $row->userId;

        $booking = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingUserId = '$userId'");
        $bookingRow = $booking->row();
        // Mengambil hasil query sebagai objek tunggal
        if (!$bookingRow) {
            echo '';
        } else {
            $bookingId = $bookingRow->bookingId;
        }
        $bookingId = $this->input->get('nama');
        $tanggal = $this->input->get('id_kategori');

        // Konfigurasi pagination
        $config['base_url'] = base_url('guess/cart/');
        $config['total_rows'] = $this->guess->count_bookings_hotel($userId, $bookingId, $tanggal);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        // Konfigurasi styling untuk Bootstrap
        $config['full_tag_open'] = ' <ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['first_link'] = '...';
        // Mengubah tulisan 'First' menjadi 'Awal'
        $config['last_link'] = '...';

        $config['num_links'] = 2;
        // Get the number of rows in the result array

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        // Mengambil data pengguna dari database sesuai dengan halaman yang aktif
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->db->limit($config['per_page'], $page);

        // Menampilkan halaman dengan data pengguna dan pagination
        $data['pagination'] = $this->pagination->create_links();
        // hitung rows
        // post data melalui get
        $data['getBookings'] = $this->guess->getBookingUser($userId, $bookingId, $tanggal);
        $data['getExtenderTf'] = $this->guess->getExtenderTf($bookingId);

        // cart.php merupakan file yang akan dijalankan ketika link di-klik

        // Cek apakah parameter $bookingId ada di URL

        if (isset($_GET['view']) && !empty($_GET['view']) && !isset($_GET['fasilitas']) && !isset($_GET['pembayaran'])) {
            $bookingId = $_GET['view'];

            $bookingIdGet = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingId = '$bookingId' AND bookingUserId = '$userId'");

            if ($bookingIdGet->num_rows() > 0) {
                $data['getRelatedBookingId'] = $this->guess->getRelatedBookingId($bookingId);
                $data['title'] = "Transaksi $bookingId";
                $data['getTotRelBookId'] = $this->guess->getTotRelBookId($bookingId);

                $this->load->view('templates_guess/header', $data);
                $this->load->view('guess/detailbooking', $data);
                $this->load->view('templates_admin/footer', $data);
            } else {
                echo 'Anda tidak memiliki akses untuk melihat booking ini.';
            }
        } elseif (isset($_GET['fasilitas']) && !empty($_GET['fasilitas'])) {
            $view = $this->input->get('view');
            $fasilitas = $this->input->get('fasilitas');

            $data['view'] = $view;
            $data['fasilitas'] = $fasilitas;
            $data['getExtenderTf'] = $this->guess->getExtenderTf($fasilitas);

            $bookingIdGetExt = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingId = '$view' AND bookingUserId = '$userId' AND ext_id = '$fasilitas'");

            if ($bookingIdGetExt->num_rows() > 0) {
                $this->load->view('templates_guess/header', $data);
                $this->load->view('guess/ext_page', $data);
                $this->load->view('templates_admin/footer', $data);
            } else {
                echo 'Anda tidak memiliki akses untuk melihat fasilitas ini.';
            }
        } elseif (isset($_GET['pembayaran']) && !empty($_GET['pembayaran'])) {

            $view = $this->input->get('pembayaran');
            $data['view'] = $view;


            $bookingIdGetExt = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingId = '$view' AND bookingUserId = '$userId' ");

            if ($bookingIdGetExt->num_rows() > 0) {

                $upload_folder = FCPATH . 'upload/payment_proved/';
                // Ubah menjadi path absolut menuju folder upload

                // Handle aksi submit form
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $status_order_id = $this->input->post('status_order_id');
                    $tipe_pembayaran = $this->input->post('tipe_pembayaran');

                    // Upload gambar
                    $config['upload_path'] = $upload_folder;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;

                    $this->load->library('upload', $config);
                    // Load library dengan konfigurasi

                    if ($this->upload->do_upload('gambar')) {
                        $upload_data = $this->upload->data();
                        $gambar = $upload_data['file_name'];
                        $base = base_url('/upload/payment_proved/' . $gambar);
                        $data = [

                            'payment_prove_image' => $base,
                            'status_order_id' => $status_order_id,
                            'tipe_payment' => $tipe_pembayaran,
                            'tanggal_payment' => date('Y-m-d H:i:s'),
                            'status_booking' => 3

                        ];
                        $where = array(
                            'bookingId' => $view,
                        );

                        $this->guess->validate_proses($where, $data, 'tb_rooms_bookings');
                        redirect('guess/cart?view=' . $view);
                        $this->session->set_flashdata('success_message', 'Data berhasil diperbarui.');

                        // Redirect ke halaman lain atau tampilkan pesan sukses

                    } else {
                        $error = $this->upload->display_errors();
                        $data['error_message'] = $error;
                        echo '<pre>';
                        print_r($error);
                        echo '</pre>';
                    }
                }

                $this->load->view('templates_guess/header', $data);
                $this->load->view('guess/pembayaran', $data);
                $this->load->view('templates_admin/footer', $data);
            } else {
                echo "Anda tidak memiliki akses untuk melihat fitur ini $view";
            }
        } else {
            $this->load->view('templates_guess/header', $data);
            $this->load->view('templates_guess/sidebar', $data);
            $this->load->view('guess/cart', $data);
            $this->load->view('templates_admin/footer', $data);
        }
    }

    // public function totalTf()
    // {
    //     $data[ 'title' ] = 'Hi, ';
    //     $data[ 'user' ] = $this->db->get_where( 'user', [ 'userEmail' => $this->session->userdata( 'userEmail' ) ] )->row_array();

    //     // untuk membuat variabel mendapatkan nilai dari userEmail
    //     $fetch_userId = $this->session->userdata( 'userEmail' );

    //     // query untuk mendapatkan userId dari tabel user
    //     $query = $this->db->query( "SELECT * FROM user WHERE userEmail = '$fetch_userId'" );
    //     foreach ( $query->result() as $row ) {
    //         $userId = $row->userId;
    //     }

    //     $booking = $this->db->query( "SELECT * FROM tb_rooms_bookings WHERE bookingUserId = '$row->userId'" );
    //     foreach ( $booking->result() as $row ) {
    //         $bookingId = $row->bookingId;
    //         $bookingTime = $row->bookingTime;
    //         $bookingTimeStacEnd = $row->bookingTimeStacEnd;
    //     }

    //     // $data[ 'query_hapus' ] = $this->db->query( "DELETE FROM tb_rooms_bookings
    //     // WHERE bookingTime < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 MINUTE))" );
    //     // mengirim variabel $userId ke User_model.php
    //     $data[ 'getBookingsClear' ] = $this->guess->getBookingUserClear( $userId );
    //     $this->load->view( 'templates_guess/header', $data );
    //     //$this->load->view( 'templates_admin/sidebar_s', $data );
    //     $this->load->view( 'templates_guess/sidebar', $data );
    //     $this->load->view( 'guess/total-transaksi', $data );
    //     $this->load->view( 'templates_guess/footer', $data );
    // }
    // public function onGoingTf()
    // {
    //     $data[ 'user' ] = $this->db->get_where( 'user', [ 'userEmail' => $this->session->userdata( 'userEmail' ) ] )->row_array();

    //     // untuk membuat variabel mendapatkan nilai dari userEmail
    //     $fetch_userId = $this->session->userdata( 'userEmail' );

    //     // query untuk mendapatkan userId dari tabel user
    //     $query = $this->db->query( "SELECT * FROM user WHERE userEmail = '$fetch_userId'" );
    //     foreach ( $query->result() as $row ) {
    //         $userId = $row->userId;
    //     }

    //     $booking = $this->db->query( "SELECT * FROM tb_rooms_bookings WHERE bookingUserId = '$row->userId'" );
    //     foreach ( $booking->result() as $row ) {
    //         $bookingId = $row->bookingId;
    //         $bookingTime = $row->bookingTime;
    //         $bookingTimeStacEnd = $row->bookingTimeStacEnd;
    //     }

    //     // $data[ 'query_hapus' ] = $this->db->query( "DELETE FROM tb_rooms_bookings
    //     // WHERE bookingTime < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 MINUTE))" );
    //     // mengirim variabel $userId ke User_model.php
    //     $data[ 'getBookings' ] = $this->guess->getBookingUser( $userId );
    //     $this->load->view( 'guess/total-transaksi', $data );
    // }
    // public function responTf()
    // {
    //     $data[ 'user' ] = $this->db->get_where( 'user', [ 'userEmail' => $this->session->userdata( 'userEmail' ) ] )->row_array();

    //     // untuk membuat variabel mendapatkan nilai dari userEmail
    //     $fetch_userId = $this->session->userdata( 'userEmail' );

    //     // query untuk mendapatkan userId dari tabel user
    //     $query = $this->db->query( "SELECT * FROM user WHERE userEmail = '$fetch_userId'" );
    //     foreach ( $query->result() as $row ) {
    //         $userId = $row->userId;
    //     }

    //     $booking = $this->db->query( "SELECT * FROM tb_rooms_bookings WHERE bookingUserId = '$row->userId'" );
    //     foreach ( $booking->result() as $row ) {
    //         $bookingId = $row->bookingId;
    //         $bookingTime = $row->bookingTime;
    //         $bookingTimeStacEnd = $row->bookingTimeStacEnd;
    //     }

    //     // $data[ 'query_hapus' ] = $this->db->query( "DELETE FROM tb_rooms_bookings
    //     // WHERE bookingTime < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 MINUTE))" );
    //     // mengirim variabel $userId ke User_model.php
    //     $data[ 'getPrintTf' ] = $this->guess->getPrintTf( $bookingId );
    //     $data[ 'getExtenderTf' ] = $this->guess->getExtenderTf( $bookingId );
    //     $data[ 'getBookings' ] = $this->guess->getBookingUser( $userId );
    //     $this->load->view( 'guess/transaksi-berjalan', $data );
    // }
    // public function transaksi()
    // {
    //     $this->_access();
    //     //$data[ 'userNama' ] = $this->session->userdata( 'userNama' );
    //     $data[ 'title' ] = 'Hi, ';
    //     $data[ 'user' ] = $this->db->get_where( 'user', [ 'userEmail' => $this->session->userdata( 'userEmail' ) ] )->row_array();

    //     // untuk membuat variabel mendapatkan nilai dari userEmail
    //     $fetch_userId = $this->session->userdata( 'userEmail' );

    //     // query untuk mendapatkan userId dari tabel user
    //     $query = $this->db->query( "SELECT * FROM user WHERE userEmail = '$fetch_userId'" );
    //     foreach ( $query->result() as $row ) {
    //         $userId = $row->userId;
    //     }

    //     $booking = $this->db->query( "SELECT * FROM tb_rooms_bookings WHERE bookingUserId = '$row->userId'" );
    //     foreach ( $booking->result() as $row ) {
    //         $bookingId = $row->bookingId;
    //         $bookingTime = $row->bookingTime;
    //         $bookingTimeStacEnd = $row->bookingTimeStacEnd;
    //     }

    //     // $data[ 'query_hapus' ] = $this->db->query( "DELETE FROM tb_rooms_bookings
    //     // WHERE bookingTime < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 MINUTE))" );
    //     // mengirim variabel $userId ke User_model.php
    //     $data[ 'getBookings' ] = $this->guess->getBookingUser( $userId );
    //     $this->load->view( 'guess/transaksi', $data );
    // }

    public function pembelian()
    {

        $this->_access();
        //$data[ 'userNama' ] = $this->session->userdata( 'userNama' );
        $data['title'] = 'Hi, ';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();

        // untuk membuat variabel mendapatkan nilai dari userEmail
        $fetch_userId = $this->session->userdata('userEmail');

        // query untuk mendapatkan userId dari tabel user
        $query = $this->db->query("SELECT * FROM user WHERE userEmail = '$fetch_userId'");
        foreach ($query->result() as $row) {
            $userId = $row->userId;
        }

        $booking = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingUserId = '$row->userId'");
        foreach ($booking->result() as $row) {
            $bookingId = $row->bookingId;
            $bookingTime = $row->bookingTime;
            $bookingTimeStacEnd = $row->bookingTimeStacEnd;
        }

        // $data[ 'query_hapus' ] = $this->db->query( "DELETE FROM tb_rooms_bookings
        // WHERE bookingTime < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 MINUTE))" );
        // mengirim variabel $userId ke User_model.php
        //$data[ 'getBookings' ] = $this->guess->getBookingUser( $userId );
        //$data[ 'empty' ] = $this->guess->deleteBookingsUser( $userId, $bookingId, $bookingTime, $bookingTimeStacEnd );

        $data['getAllSucessTrById'] = $this->guess->getAllSucessTrById($userId);
        // $data[ 'getUserEdit' ] = $this->transactions->getUserEdit();
        // $data[ 'getAllOnGoingTransactions' ] = $this->transactions->getAllOnGoingTransactions();
        // $data[ 'getCanceledTransactions' ] = $this->transactions->getCanceledTransactions();
        // $data[ 'getSuccessTransactions' ] = $this->transactions->getSuccessTransactions();
        // $data[ 'getValidateOption' ] = $this->transactions->getValidateOption();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('guess/pembelian', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function validate()
    {
        $this->_access();
        if ($this->input->method() === 'post') {
            // the user id contain dot, so we must remove i
            // $uploaded_data = $this->upload->data();
            //Returns array of containing all of the data related to the file you uploaded.
            //$file_name = $uploaded_data[ 'file_name' ];
            //$this->load->helper( 'url' );
            //$file_name = $this->input->post( 'roomName' );
            $config['image_library']        = 'gd2';
            $config['upload_path']          = FCPATH . '/upload/payment_proved';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            //$config[ 'file_name' ]            = 'file_name';

            $config['overwrite']            = true;
            $config['max_size']             = 50000;
            // 1MB
            $config['create_thumb'] = FALSE;
            //resize
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
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
                //$roomName =  $row->roomName;
            }

            if (!$this->upload->do_upload('payment_prove_image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $file_name = $uploaded_data['file_name'];

                $data = [

                    'payment_prove_image' => $file_name,
                    'status_booking' => 3

                ];
                $where = array(
                    'id' => $id,
                );

                $this->guess->validate_proses($where, $data, 'tb_rooms_bookings');
                //$this->Menu_model->update_menu_proses( $where, $data, 'user_menu' );
                //$this->db->query( "DELETE from tb_rooms_bookings  WHERE bookingId = $bookingId" );
                $this->session->set_flashdata('message', 'Berhasil Melakukan Konfirmasi Pembayaran');
                redirect('guess/cart');
            }
        }
    }

    public function cetak()
    {
        $this->_access();
        $ci = get_instance();
        $bookingIds = $ci->uri->segment(3);
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // untuk membuat variabel mendapatkan nilai dari userEmail
        $fetch_userId = $this->session->userdata('userEmail');

        // query untuk mendapatkan userId dari tabel user
        $query = $this->db->query("SELECT * FROM user WHERE userEmail = '$fetch_userId'");
        foreach ($query->result() as $row) {
            $userId = $row->userId;
        }

        $booking = $this->db->query("SELECT * FROM tb_rooms_bookings WHERE bookingId = '$bookingIds'");
        foreach ($booking->result() as $row) {
            $bookingId = $row->bookingId;
            $bookingTime = $row->bookingTime;
            $bookingTimeStacEnd = $row->bookingTimeStacEnd;
        }

        // $data[ 'query_hapus' ] = $this->db->query( "DELETE FROM tb_rooms_bookings
        // WHERE bookingTime < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 MINUTE))" );
        // mengirim variabel $userId ke User_model.php
        $data['getPrintTf'] = $this->guess->getPrintTf($bookingId);
        $data['getExtenderTf'] = $this->guess->getExtenderTf($bookingId);

        ob_start();

        $this->load->view('guess/cetak', $data);
        // $html = ob_get_contents();
        // ob_end_clean();

        // require './assets/html2pdf/autoload.php';

        // $pdf = new Spipu\Html2Pdf\Html2Pdf( 'L', 'A4', 'en' );
        // $pdf->pdf->SetDisplayMode( 'fullpage' );
        // $pdf->WriteHTML( $html );
        // $pdf->Output( $bookingId.'.pdf', 'D' );
    }
}
