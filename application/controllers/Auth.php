<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('News_model');
        $this->load->model('R_model', 'reservation');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model', 'user');
        $this->load->library('user_agent');
        $this->load->model('Produk_model', 'Produk');
        $this->load->model('Transactions_model', 'tr');
        require_once APPPATH.'third_party/src/Google_Client.php';
        require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
        // $data['bookingStDt'] = $this->session->flashdata('item1');
        // $data['bookingEdDt']= $this->session->flashdata('item2');
    }

    public function index()
    {
        // $this->_access();
        $data['title'] = 'Retreat Centre';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('bookingStDt', 'Check-in', 'required');
        $this->form_validation->set_rules('bookingEdDt', 'Check-out', 'required');
        // $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/booking-date', $data);
            $this->load->view('auth/home', $data);
            $this->load->view('templates/content', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['bookingStDt'] = $this->input->post('bookingStDt');
            $data['bookingEdDt'] = $this->input->post('bookingEdDt');
            $data['reservation'] = $this->reservation->getR($data);
            $this->session->set_userdata('item1', $data['bookingStDt']);
            $this->session->set_userdata('item2', $data['bookingEdDt']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/booking-date', $data);
            $this->load->view('auth/home', $data);
            // $this->load->view('templates/content', $data);
            $this->load->view('templates/footer', $data);
            // if(!empty($data['reservation'])) {
            //     //$html = $this->generateDropdownHTML($availableRooms);
            //     echo(json_encode(array('status'=>true, 'message'=>'Rooms are available', 'data'=>$data['reservation'], JSON_PRETTY_PRINT)));
            // }
        }
    }

    public function details($roomId = null)
    {
        if ($roomId != null) {
            // $data['produkLain'] = $this->Produk_Model->produkLainnya(decrypt_url($id));
            $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
            $data['room'] = $this->Produk->getDetails(decrypt_url($roomId));
            
            //get head picture
            $data['head_pic'] = $this->Produk->getHeadPic(decrypt_url($roomId));
            // untuk mendapatkan facility
            $data['facility'] = $this->Produk->getFacility(decrypt_url($roomId))->result();
            $data['picture'] = $this->Produk->getPicture(decrypt_url($roomId))->result();
            // ---------------------------------------------------------- //
            /* untuk mengambil id dari product dari url dan mendecrypt supaya jadi value biasa */
            // ambil url segment 3
            $product_id = $this->uri->segment(3);
            // decrypt url segment 3
            $product_id_dec = decrypt_url($product_id);
            // buat session dari url yang sudah didecrypt
            $this->session->set_userdata('roomId', $product_id_dec);
            // buat variable untuk dapat ditampilkan di halaman view
            $data['roomId'] = $this->session->userdata('roomId');
            // get model room extender
            $data['getExtender'] = $this->Produk->getExtender();

            // ---------------------------------------------------------- //

            // ---------------------------------------------------------- //
            // untuk menampilkan session tanggal yang dipilih
            $_SESSION['bookingStDt'] = $this->session->userdata('item1');
            $_SESSION['bookingEdDt'] = $this->session->userdata('item2');
            $data['bookingStDt'] = $_SESSION['bookingStDt'];
            $data['bookingEdDt'] = $_SESSION['bookingEdDt'];
            // ---------------------------------------------------------- //

            // ---------------------------------------------------------- //
            /** Proses untuk menghitung selisih hari dari Start Date dan End Date*/
            $a = abs(strtotime($data['bookingStDt']) - strtotime($data['bookingEdDt']));
            $b = $a / 86400;
            $numberOfDays = intval($b);
            // tangkap session
            $this->session->set_userdata('numberOfDays', $numberOfDays);
            // buat variable session untuk ditampilkan di view
            $data['numberOfDays'] = $this->session->userdata('numberOfDays');
            // ---------------------------------------------------------- //

            $this->session->set_userdata('previous_url', current_url());
            if ($data['room'] && $data['facility']) {
                // $data['title'] = 'Produk - ' . ucwords($data['produk']['nama_produk']);
                // $data['ukuranNew'] = explode(', ', $data['produk']['ukuran']);
                // $data['tags'] = $this->Produk_Model->getTagsById(decrypt_url($roomId));
                // echo $data['bookingStDt'];
                $this->load->view('templates/header', $data);
                $this->load->view('auth/produk', $data, $_SESSION);
                $this->load->view('templates/footer', $data);
            } else {
                redirect('');
            }
        } else {
            redirect('');
        }
    }

    public function sign_in()
    {
        $data['judul'] = 'Login';
        $data['page'] = current_url();
        $this->session->set_flashdata('page', $data['page']);
        $this->load->view('templates/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/footer');
    }

    public function loginProses()
    {
        $attempt = 2;
        $this->load->library('user_agent');
        $userEmail = $this->input->post('userEmail');
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $password = $this->input->post('userPassword');
        $user = $this->db->get_where('user', ['userEmail' => $userEmail])->row_array();
        $i = 1;

        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['userPassword'])) {
                    $data = [
                        'userEmail' => $user['userEmail'],
                        'role_id' => $user['role_id'],
                        'userId' => $user['userId'],
                        // 'status' => 'login'
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('message-berhasil', 'Kami sedang mempersiapkan layanan anda');
                        redirect('dashboard/');
                    } elseif ($user['role_id'] == 105) {
                        redirect('transactions/');
                    } elseif ($user['role_id'] == 102) {
                        redirect('guess/');
                    } elseif ($user['role_id'] == 106) {
                        redirect('adminresto/');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Password Anda Salah');
                    redirect('auth/');
                }
            } else {
                $this->session->set_flashdata('message', 'Akun anda Belum Aktif');
                redirect('auth/');
                // redirect('news/');
            }
        } else {
            $this->session->set_flashdata('message', 'Akun anda Belum Terdaftar');
            redirect('auth/');
            // redirect('news/');
        }
    }

    public function verifikasi()
    {
        $data['judul'] = 'Registrasi';
        $this->load->view('templates/header', $data);
        $this->load->view('news/verifikasi', $data);
        $this->load->view('templates/footer');
    }

    public function google_regis()
    {
        $clientId = '384530432813-taev4rrul6piub0u9tor3bh23inm61ql.apps.googleusercontent.com'; // Google client ID
        $clientSecret = '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'; // Google client secret
        $redirectURL = base_url().'auth/google_regis/';		// https://curl.haxx.se/docs/caextract.html

        // Call Google API
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_GET['code'])) {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: '.filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // echo "<pre>";
            // print_r($userProfile);
            // cek userProfile kedalam database
            $user = $this->db->get_where('user', ['userGoogleId' => $userProfile['id']])->row_array();
            if ($user) {
                // jika usernya ada berdasarkan data ['id'] yang diterima dari google
                // dalam database terdapat didalam kolom 'userGoogleId'
                if ($user['userGoogleId'] == $userProfile['id']) {
                    // buat session dari user yang sedang login
                    $data = [
                        'userEmail' => $user['userEmail'],
                        'role_id' => $user['role_id'],
                        // 'status' => 'login'
                    ];

                    $this->session->set_userdata($data);

                    // jika login sebagai administrator
                    if ($user['role_id'] == 1) {
                        // $this->session->set_flashdata('message-berhasil', 'Kami sedang mempersiapkan layanan anda');
                        // header('Location: '.$_SERVER['PHP_SELF']);
                        // redirect($uri, 'refresh');
                        // redirect($this->uri->uri_string());

                        // $data["page"] = $this->session->userdata('user_name');
                        // redirect($_SERVER['HTTP_REFERER']);
                        // header("location:javascript://history.go(-2)");
                        // $previous_url = $this->session->userdata('previous_url');
                        // redirect($previous_url);
                        // echo $previous_url;
                        redirect('dashboard/');
                    }
                    // jika login sebagai guess atau tamu
                    elseif ($user['role_id'] == 102) {
                        $previous_url = $this->session->userdata('previous_url');
                        redirect($previous_url);
                    // echo $previous_url;
                    }

                    // jika akun belum ada
                    // sebenernya kondisi ini tidak ada karena jika user yang belum mendaftar
                    // akan langsung terigistrasi melalui controller ('Register/Register_Proses')
                    else {
                        echo 'anda belum terdaftar';
                    }
                }
            }
            // jika user belum terdaftar maka kirim ke controller ('Register/Register_Proses')
            else {
                $this->session->set_flashdata('item_register', $userProfile);
                redirect('auth/google_register_proses');
            }
        } else {
            $url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;
        }
    }

    public function google_register_proses()
    {
        $userProfile = $this->session->flashdata('item_register');
        $user = $userProfile;
        $data = [
            'userGoogleId' => $userProfile['id'],
            'userNama' => $user['name'],
            'userEmail' => $user['email'],
            'image' => $user['picture'],
            'role_id' => 102,
            'is_active' => 1,
     ];
        $this->user->tambahUser($data, 'user');
        redirect('auth/google_regis');
        // die;
    }

    public function logout()
    {
        $this->session->sess_destroy();

        // Redirect to login page
        redirect('auth/sign_in');
    }

    public function cart()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = new DateTime();
        $fetch_room_id = $this->session->userdata('roomId');

        $query_total_pay = $this->db->query("SELECT * FROM tb_rooms WHERE roomId = '$fetch_room_id'");
        foreach ($query_total_pay->result() as $row) {
            $roomPrice = $row->roomPricePerNight;
            $roomName = $row->roomName;
        }

        $bookingTotalPay = $roomPrice * $this->session->userdata('numberOfDays');

        $dt = new DateTime();   // create object for current date/time

        $dt->modify('5 minutes');
        $sdt = $dt->format('Y-m-d H:i:s');
        $bookingUserId = $this->input->post('bookingUserId');
        $current_date_time = date('Y-m-d H:i:s');
        $start = $this->session->userdata('item1');
        $end = $this->session->userdata('item2');
        $start_clock = '02:00:00';
        $end_clock = '12:00:00';
        $unique = uniqid().uniqid();
       
            $eightdigitrandom = rand(10000, 99999999);
            $randNumber = rand(1211, 8311);
            $randNumber4 = rand(121, 131);
            $id_ = uniqid().
        $quantity_ext = $this->input->post('quantity');
        $id_ext = $this->input->post('id');

        $extender_price_id = rand(1211, 8311);
        $this->session->set_userdata('extender_price_id', $extender_price_id);

         //kalo belum ada booking id
         if ($this->session->userdata('bookingId') == null){
            $start_clock = '02:00:00';
            $end_clock = '12:00:00';
            
            $bookingId = '88'.$randNumber4.$randNumber;
            $this->session->set_userdata('bookingId', $bookingId);
           
        }else{
            $bookingId = $this->session->userdata('bookingId');
            //$order_idt = $this->session->userdata('order_idt');
        }
        //kalo belum ada order id text
        if ($this->session->userdata('order_idt') == null){
            $order_idt = 'RC-88-'.$randNumber4.uniqid();
            $this->session->set_userdata('order_idt', $order_idt);
        }else{
            $order_idt = $this->session->userdata('order_idt');
        }

        $data = [
            'bookingId' => $this->session->userdata('bookingId'),
            'id_'       => $extender_price_id,
            'bookingId_text' => $order_idt,
            'bookingUserId' => $bookingUserId,
            'bookingRoomId' => $this->session->userdata('roomId'),
            'bookingStDt' => $start,
            'bookingEdDt' => $end,
            'bookingStDt_check' => $start.' 02:00:00',
            'bookingEdDt_check' => $end.' 12:00:00',
            'bookingTime' => date('Y-m-d H:i:s'),
            'bookingTimeStacEnd' => date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($current_date_time))),
            'bookingNights' => $this->session->userdata('numberOfDays'),
            'bookingTotalPay' => $bookingTotalPay,
            'userEditPriceId' => '-',
            'userEditKeterangan' => '-',
            'status_booking' => 1,
            'is_pay' => 0,
     ];
        //$this->user->checkoutBooking($data, 'tb_rooms_bookings');
        $this->user->backupCheckoutBooking($data, 'tb_backup_bookings');
        $data = [
           'bookingId' => $bookingId,
           'total_price_hotel' => $bookingTotalPay,
        ];

        $this->db->insert('tb_h', $data);
        // ------
        $id_ex = $this->input->post('id', true);
        $price = $this->input->post('price', true);
        $quantity = $this->input->post('quantity', true);
        // $this->package_model->create_package($package,$product);
        // $get_ext_price_2 = $this->db->query("SELECT * FROM tb_rooms_extender WHERE id = '$id_ex'");
        // foreach ($get_ext_price_2->result() as $row)
        // {
        //         $price = $row->roomExtenderFacilityPrice;
        //         //$roomName =  $row->roomName;
        // }
        
       
        //$randNumber = rand(1211, 8311);
        $result = [];
        foreach ($quantity as $key => $val) {
            $p = $_POST['quantity'][$key];
            $j = $_POST['id'][$key];
            $z = $_POST['price'][$key];
            $result[] = [
                'booking_id' => $extender_price_id,
                'booking_id_text' => $order_idt,
                'room_extender_facility_id' => $j,
                'quantity' => $p,
                'price' => $p * $z,
            ];
        }

        // MULTIPLE INSERT TO DETAIL TABLE

        $this->db->insert_batch('tb_rooms_extender_facility_bookings', $result);
        $this->db->trans_complete();

        // $get_ext_price_1 = $this->db->query("SELECT * FROM tb_rooms_extender WHERE id = '$id_ex'");
        // foreach ($get_ext_price_1->result() as $row)
        // {
        //         $price = $row->roomExtenderFacilityPrice;
        //         //$roomName =  $row->roomName;
        // }
        // $get_ext_price_2 = $this->db->query("SELECT * FROM tb_rooms_extender_facility_bookings WHERE booking_id = '$bookingId'");
        // foreach ($get_ext_price_2->result() as $row)
        // {
        //         $quantity = $row->roomExtenderFacilityPrice;
        //         //$roomName =  $row->roomName;
        // }

        // foreach($quantity AS $key => $val){
        //     $p = $_POST['quantity'][$key];
        //      $result[] = array(
        //         'booking_id' => $bookingId,
        //         'total_price' => $p * $price,
        //      );
        // }
        // $this->db->insert('tb_t', $result);
        $total = $this->db->select_sum('price')
                            ->from('tb_rooms_extender_facility_bookings')
                            ->where('booking_Id', $extender_price_id);
        $fetching = $this->db->get();
        $total_f = $fetching->row()->price;

        // total harga extender
        //$extender_price_id = uniqid();
        $data = [
                    'booking_id' => $extender_price_id,
                    'total_price' => $total_f,
                 ];

        $this->db->insert('tb_t', $data);

        // total bayar semuanya
        $data = [
            'booking_id' => $extender_price_id,
            'price_total' => $bookingTotalPay + $total_f,
         ];
        $this->db->insert('tb_total_pay', $data);

    

     
        
        $randNumber = rand(100, 4000);
        $datax = array(
            'id'      => '1-'.$randNumber,
            'qty'     => 1,
            'price'   => $bookingTotalPay + $total_f,
            'option'  => 'Hotel',
            'coupon'  =>  $extender_price_id,
            'name'    => $roomName.'<br/>'.'<small>'.$start.' -> '.$end.'</small>',
            //'image'   => $this->input->post('gambar', true)
           
         );
        print_r($datax);
        echo $this->session->userdata('bookingId');
      
        $this->cart->insert($datax);
        //echo $gambar;
        $this->session->set_flashdata('message', 'Menambah Kedalam Keranjang');
        //header('location:' . $_SERVER['HTTP_REFERER']);
        //redirect('keranjang/');
        // menghapus session ---------
        //$this->tr->total_harga($where, $data, 'tb_rooms_bookings');
        $this->session->set_flashdata('message', 'Pesanan anda sudah masuk ke cart');
        $this->session->unset_userdata('extender_price_id');
        $this->session->unset_userdata('item1');
        $this->session->unset_userdata('item2');
        $this->session->unset_userdata('numberOfDays');
        $this->session->unset_userdata('previous_url');
        $this->session->set_flashdata('message', 'Menambah Kedalam Keranjang Lihat Keranjang Belanja anda');
        redirect('auth/');
        //echo $bookingId;
    }

    public function regis()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('guess/');
        // }

        $this->form_validation->set_rules('userNama', 'userNama', 'required|trim');
        $this->form_validation->set_rules('userEmail', 'userEmail', 'required|trim|valid_email|is_unique[user.userEmail]', [
            'is_unique' => 'Email ini sudah terdaftar dalam sistem, silahkan gunakan email yang lain',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[userPassword]', [
            'matches' => 'Password tidak cocok',
            'min_length' => 'Password terlalu',
        ]);
        $this->form_validation->set_rules('userPassword', 'userPassword', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // $data['title'] = 'WPU User Registration';
            $this->load->view('templates/header');
            $this->load->view('auth/registration-form');
            $this->load->view('templates/footer');
        } else {
            $userEmail = $this->input->post('userEmail', true);
            $data = [
                'userNama' => htmlspecialchars($this->input->post('userNama', true)),
                'userEmail' => htmlspecialchars($userEmail),
                // 'image' => 'default.jpg',
                'userPassword' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 102,
                'is_active' => 1,
                'date_created' => time(),
            ];

            // siapkan token
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];

            $this->db->insert('user', $data);
            // $this->db->insert('user_token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda berhasil dibuat ...</div>');
            redirect('auth/regis/');
        }
    }
}
