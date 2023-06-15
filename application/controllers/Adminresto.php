<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Adminresto extends CI_Controller
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
        $this->load->helper('html');
        $this->load->helper('array');
        $this->load->model('User_model', 'user');
        $this->load->model('Restaurant_model', 'resto');
        $this->load->model('Meja_model', 'meja');
        $this->load->library('user_agent');
        $this->load->model('Transaksi_model', 'resto_transaksi');
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
            //'menu_id' => $menu_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccessMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
    public function test()
    {
        $data['count_success_transactions'] = $this->transactions->count_success_transactions();
        $data['count_success_transactions_on_going'] = $this->transactions->count_success_transactions_on_going();
        $data['total_earnings'] = $this->transactions->total_earnings();
        $data['count_pending_transactions'] = $this->transactions->count_pending_transactions();
        $data['count_waiting_confirmation'] = $this->transactions->count_waiting_confirmation();

        $this->load->view('admin/stats', $data);
    }

    public function index()
    {

        $this->_access();
        $data['title'] = 'Administrator';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();
        // $data['count_success_transactions']= $this->transactions->count_success_transactions();
        // $data['total_earnings']= $this->transactions->total_earnings();
        // $data['count_pending_transactions']= $this->transactions->count_pending_transactions();
        // $data['count_waiting_confirmation']= $this->transactions->count_waiting_confirmation();
        $randNumber = rand(1211, 8311);
        $randNumber4 = rand(121, 131);
        if (isset($_GET['option']) && !empty($_GET['option'])) { // Cek apakah user telah memilih option dan klik tombol tampilkan
            $option = $_GET['option'];

            if ($option == '1') { // Jika option nya 1 (per tanggal)
                // $tgl = $_GET['tanggal'];
                // $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                // $url_cetak = 'report_h/cetak?option=1&tanggal='.$tgl;
                //$transaksi = $this->Report_h_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Report_h_model
                $bookingId = '88' . $randNumber4 . $randNumber;
                //$product_id_dec = decrypt_url($product_id);
                $this->session->set_userdata('bookingId', $bookingId);
                $booking_session = $this->session->userdata('bookingId');
                redirect('adminresto/meja/' . $booking_session . '/?o=dinein');
            } else if ($option == '2') { // Jika option nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'report_h/cetak?option=2&bulan=' . $bulan . '&tahun=' . $tahun;
                //$transaksi = $this->Report_h_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Report_h_model
            } else { // Jika option nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun ' . $tahun;
                $url_cetak = 'report_h/cetak?option=3&tahun=' . $tahun;
                //$transaksi = $this->Report_h_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Report_h_model
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'report_h/cetak';
            //$transaksi = $this->Report_h_model->view_all(); // Panggil fungsi view_all yang ada di Report_h_model
        }


        $this->load->view('templates-admin-resto/header', $data);
        //$this->load->view('templates_admin/sidebar_s', $data);
        //$this->load->view('templates-admin-resto/sidebar', $data);
        $this->load->view('admin-resto/index', $data);
        $this->load->view('templates-admin-resto/footer', $data);
    }
    public function meja()
    {
        $this->_access();
        $data['title'] = "Order table";
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $getMeja = $this->meja->getMeja();
        //$data['meja']= $this->meja->getOrderMeja();
        $datas = [
            //'masakan' => $getMasakan->num_rows() > 0 ? $getMasakan->result() : 'kosong',
            'meja' => $getMeja->num_rows() > 0 ? $getMeja->result() : 'kosong',
            //$data['meja']= $this->meja->getOrderMeja(),
        ];

        $this->load->view('templates-admin-resto/header', $data);
        $this->load->view('admin-resto/order-meja', $datas);
        $this->load->view('templates-admin-resto/footer', $data);
    }
    public function order()
    {
        $this->_access();
        //$data['userNama'] = $this->session->userdata('userNama');
        $data['title'] = "Orders";
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();
        if (isset($_GET['o']) && !empty($_GET['o'])) { // Cek apakah user telah memilih option dan klik tombol tampilkan
            $option = $_GET['o']; // Ambil data filder yang dipilih user

            if ($option == 'dinein') { // Jika option nya dine in

                // $tgl = $_GET['tanggal'];

                // $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                // $transaksi = $this->Report_h_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Report_h_model

                $getMasakan = $this->resto->getMasakan();
                $data['getKategori'] = $this->resto->getKategori();
                $getMeja = $this->meja->getOrderMeja();
                $datas = [
                    'masakan' => $getMasakan->num_rows() > 0 ? $getMasakan->result() : 'kosong',
                    'meja' => $getMeja->num_rows() > 0 ? $getMeja->result() : 'kosong',
                ];
                $this->load->view('templates-admin-resto/header', $data);
                $this->load->view('admin-resto/order-menu', $datas);
                $this->load->view('templates-admin-resto/footer', $data);
            } else if ($option == '2') { // Jika option nya 2 (per bulan)
                // $bulan = $_GET['bulan'];
                // $tahun = $_GET['tahun'];
                // $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                // $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                // $transaksi = $this->Report_h_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Report_h_model
            } else { // Jika option nya 3 (per tahun)
                // $tahun = $_GET['tahun'];

                // $ket = 'Data Transaksi Tahun '.$tahun;
                // $transaksi = $this->Report_h_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Report_h_model
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            // $ket = 'Semua Data Transaksi';
            // $transaksi = $this->Report_h_model->view_all(); // Panggil fungsi view_all yang ada di Report_h_model
        }
    }
    public function cari($jenis = null)
    {
        $this->_access();
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // untuk membuat variabel mendapatkan nilai dari userEmail
        $fetch_userId = $this->session->userdata('userEmail');
        $getMasakan = $this->resto->getMasakan();
        $data['getKategori'] = $this->resto->getKategori();
        if ($jenis == null) {
            redirect('restaurant/menu');
        }
        $jenis = $this->uri->segment(5);
        //$data['tags'] = $this->Produk_Model->getAllTags();
        //$data['cat'] = $this->Produk_Model->getAllCat();
        $data['title'] = 'Restorant Kategori - ' . ucwords($jenis);
        //$data['getOptionCat'] = $this->resto->getOptionCat($jenis);
        $getOptionCat = $this->resto->getOptionCat($jenis);
        $datas = [
            'masakan' => $getOptionCat->num_rows() > 0 ? $getOptionCat->result() : 'kosong',
            //'meja' => $getMeja->num_rows() > 0 ? $getMeja->result() : 'kosong',
        ];
        //echo $jenis;
        //$data['totData'] = $this->Produk_Model->hitungProdukKategori($jenis, $nama);
        //konfigurasi pagination
        //$config['base_url'] = base_url('produk/cari/'.$jenis.'/'.$nama); //site url
        //$config['total_rows'] = $data['totData']; //total row
        //$config['per_page'] = 8;  //show record per halaman
        //$config['uri_segment'] = 5;  // uri parameter
        //$choice = $config['total_rows'] / $config['per_page'];
        //$config['num_links'] = floor($choice);

        //$this->pagination->initialize($config);
        //$data['page'] = ($this->uri->segment(5));
        //konfigurasi pagination

        //$data['produk'] = $this->Produk_Model->cariProduk($jenis, $nama, $config['per_page'], $data['page']);         

        //$data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates-admin-resto/header', $data);
        $this->load->view('admin-resto/order-kategori', $datas);
        $this->load->view('templates-admin-resto/footer', $data);
    }

    public function confirmation()
    {
        $this->_access();
        $data['title'] = "Confirmation";
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();;
        $this->load->view('templates-admin-resto/header', $data);
        $this->load->view('admin-resto/order-confirmation', $data);
        $this->load->view('templates-admin-resto/footer', $data);
    }
    public function bill()
    {

        date_default_timezone_set('Asia/Jakarta');
        $current_date_time = date('Y-m-d H:i:s');

        $data['title'] = "Orders";
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        //$this->load->view('templates-admin-resto/header', $data);
        $r = 0;
        $user_email = $this->session->userdata('userEmail');

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

        $get_user_validating = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
        foreach ($get_user_validating->result() as $row) {
            $userId = $row->userId;
            //$roomName =  $row->roomName;
            //$fetch_id = $this->session->set_userdata($row->userId);

        }
        $i = 0;
        foreach ($this->cart->contents() as $key => $val) :
            $items[$i] = [
                'id'             => $this->uri->segment(3),
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

            $r = 0;
            $order_resto[$r] = [

                //'id' => '1-'.$randNumber,
                'bookingId' => $this->uri->segment(3),
                'bookingId_text' => $order_idt,
                'userId' => $userId,
                'masakan' => $val['name'],
                'total' => $val['qty'],
                'no_meja' => 0,
                'tanggal' => date('d-m-Y'),
                'total_harga' => $val['price'] * $val['qty'],
                //'image'   => $this->input->post('gambar', true)

            ];
            $r++;

            $this->db->insert_batch('tb_transaksi_resto', $order_resto);
        endforeach;
        $this->cart->destroy();

        $this->load->view('admin-resto/recept/order-bill', $data);
        //$this->load->view('templates-admin-resto/footer', $data);

    }
    public function tambah_order()
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_date_time = date('Y-m-d H:i:s');
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();

        $user_email = $this->session->userdata('userEmail');
        //$bookingId = $this->input->post('id_menu');
        $nama = $this->input->post('nama_customer');
        $nama_admin = $this->input->post('nama_admin');
        $no_wa = $this->input->post('no_wa');
        $tanggal = $this->input->post('tanggal');
        $no_meja = $this->input->post('no_meja');
        $total = $this->input->post('total');

        $get_user_validating = $this->db->query("SELECT * FROM user WHERE userEmail = '$user_email'");
        foreach ($get_user_validating->result() as $row) {
            $userId = $row->userId;
            //$roomName =  $row->roomName;
            //$fetch_id = $this->session->set_userdata($row->userId);

        }

        $i = 0;
        // //echo $fetch_id;
        foreach ($this->cart->contents() as $key => $val) :
            $items[$i] = [
                'id'             => $this->session->userdata('bookingId'),
                'order_id'         => 'RC-' . $this->session->userdata('bookingId'),
                'userId'        => $userId,
                'price'         => $val['price'],
                'hotel_id'         => $val['coupon'],
                'quantity'         => $val['qty'],
                'category'         => $val['option'],
                'name'             => $val['name'],
                'total_price'   => $val['price'] * $val['qty'],
                'nama_customer' => $nama,
                'admin' => $nama_admin,
                'no_telepon' => $no_wa,
                'tanggal' => date("Y-m-d", strtotime($tanggal)),
                'no_meja' => $no_meja,

            ];
            $i++;
        endforeach;
        $this->db->insert_batch('tb_new_orders', $items);
        //print_r($items);
        $r = 0;
        foreach ($this->cart->contents() as $key => $val) :

            $order_resto[$r] = [

                //'id' => '1-'.$randNumber,
                'bookingId' => $this->session->userdata('bookingId'),
                'bookingId_text' => 'RC-' . $this->session->userdata('bookingId'),
                'userId' => $userId,
                'masakan' => $val['name'],
                'total' => $val['qty'],
                'no_meja' =>  $no_meja,
                'tanggal' => date("d-m-Y"),
                'total_harga' => $val['price'] * $val['qty'],
                'nama_customer' => $nama,
                'admin' => $nama_admin,
                'no_telepon' => $no_wa,
                'total_harga' => $val['price'] * $val['qty'],
                'status_pembayaran' => 'Menunggu Pembayaran'
                //'image'   => $this->input->post('gambar', true)

            ];
            $r++;
        endforeach;
        $this->db->insert_batch('tb_transaksi_resto', $order_resto);
        // perbaharui status meja
        $data = array(
            'status' => 1,
            'orderId_aktif' => $this->session->userdata('bookingId'),

        );
        $this->db->where('no_meja', $no_meja);
        $this->db->update('tb_meja', $data);

        $data = array(
            'booking_id' => $this->session->userdata('bookingId'),
            'price_total' => $total
        );
        $this->db->insert('tb_total_pay', $data);

        // hapus isi cart
        $this->cart->destroy();

        // hilangkan session booking id
        unset(
            $_SESSION['bookingId'],
            $_SESSION['order_IDT'],
            $_SESSION['roomId'],
        );
        redirect('Restotr/');
    }

    public function validasi_pembayaran()
    {
        $bookingId = $this->input->post('bookingId');
        $status_pembayaran = 'Pembayaran Berhasil dilakukan';

        $data = array(
            'status_pembayaran' => $status_pembayaran,
        );
        $this->db->where('bookingId', $bookingId);
        $this->db->update('tb_transaksi_resto', $data);
    }
}
