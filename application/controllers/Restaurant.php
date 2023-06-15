<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Restaurant extends CI_Controller
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
        $this->load->helper('array');
        $this->load->model('User_model', 'user');
        $this->load->model('Restaurant_model', 'resto');
        $this->load->model('Meja_model', 'meja');
        $this->load->library('user_agent');
        $this->load->model('Transaksi_model', 'resto_transaksi');
        // $this->load->model('Transactions_model','transactions');
        $role = $this->session->userdata('role_id');
        $this->load->library('cart');
        $this->load->helper('text');
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

    public function menu()
    {
        $data['title'] = 'Retreat Centre Restaurant';
        $data['alamat'] = 'Sukamakmur, Indonesia';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $getMasakan = $this->resto->getMasakan();
        $data['getKategori'] = $this->resto->getKategori();
        $getMeja = $this->meja->getOrderMeja();
        $datas = [
            'masakan' => $getMasakan->num_rows() > 0 ? $getMasakan->result() : 'kosong',
            'meja' => $getMeja->num_rows() > 0 ? $getMeja->result() : 'kosong',
        ];
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('order-masakan/masakan', $datas);
        $this->load->view('templates/footer', $data);
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
        $data['title'] = 'Administrator Resto';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // $data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();
        // $data['count_success_transactions']= $this->transactions->count_success_transactions();
        // $data['total_earnings']= $this->transactions->total_earnings();
        // $data['count_pending_transactions']= $this->transactions->count_pending_transactions();
        // $data['count_waiting_confirmation']= $this->transactions->count_waiting_confirmation();

        $this->load->view('templates_admin/header', $data);
        // $this->load->view('templates_admin/sidebar_s', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function cart()
    {
        $this->_access();
        $data['title'] = 'Hi, ';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // untuk membuat variabel mendapatkan nilai dari userEmail
        $fetch_userId = $this->session->userdata('userEmail');

        // query untuk mendapatkan userId dari tabel user
        $query = $this->db->query("SELECT * FROM user WHERE userEmail = '$fetch_userId'");
        foreach ($query->result() as $row) {
            $userId = $row->userId;
        }
        $data['getBookingUserResto'] = $this->resto_transaksi->getBookingUserResto($userId);

        //$data['getBookingUserResto'] => $this->transaksi_model->getBookingUserResto($userId);

        // $data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();
        // $data['count_success_transactions']= $this->transactions->count_success_transactions();
        // $data['total_earnings']= $this->transactions->total_earnings();
        // $data['count_pending_transactions']= $this->transactions->count_pending_transactions();
        // $data['count_waiting_confirmation']= $this->transactions->count_waiting_confirmation();

        $this->load->view('templates_guess/header', $data);
        // $this->load->view('templates_admin/sidebar_s', $data);
        $this->load->view('templates_guess/sidebar', $data);
        $this->load->view('order-masakan/cart', $data);
        $this->load->view('templates_guess/footer', $data);
    }
    public function cari($jenis = null)
    {
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // untuk membuat variabel mendapatkan nilai dari userEmail
        $fetch_userId = $this->session->userdata('userEmail');
        $getMasakan = $this->resto->getMasakan();
        $data['getKategori'] = $this->resto->getKategori();
        if ($jenis == null) {
            redirect('restaurant/menu');
        }
        $jenis = $this->uri->segment(3);
        //$data['tags'] = $this->Produk_Model->getAllTags();
        //$data['cat'] = $this->Produk_Model->getAllCat();
        $data['title'] = 'Restorant Kategori - ' . ucwords($jenis);
        //$data['getOptionCat'] = $this->resto->getOptionCat($jenis);
        $getOptionCat = $this->resto->getOptionCat($jenis);
        $datas = [
            'masakan' => $getOptionCat->num_rows() > 0 ? $getOptionCat->result() : 'kosong',
            //'meja' => $getMeja->num_rows() > 0 ? $getMeja->result() : 'kosong',
        ];
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

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('order-masakan/kategori', $datas, $data);
        //echo $data['title'];
        $this->load->view('templates/footer', $data);
    }
    public function detail($detail = null)
    {
        //echo $this->session->userdata('bookingId');
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        // untuk membuat variabel mendapatkan nilai dari userEmail
        $fetch_userId = $this->session->userdata('userEmail');
        $detail = $this->uri->segment(3);

        if ($detail == null) {
            redirect('restaurant/menu');
        }
        $getDetail = $this->resto->getDetail($detail);
        $datas = [
            'masakan' => $getDetail->num_rows() > 0 ? $getDetail->result() : 'kosong',
            //'meja' => $getMeja->num_rows() > 0 ? $getMeja->result() : 'kosong',
        ];

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('order-masakan/detail', $datas, $data);
        //echo $data['title'];
        $this->load->view('templates/footer', $data);
    }
    public function keranjang()
    {

        $detail = $this->uri->segment(3);
        $qty = $this->input->post('qty');
        $query_cart = $this->db->query("SELECT * FROM tb_masakan WHERE id_menu = '$detail'");
        foreach ($query_cart->result() as $row) {
            $id = $row->id;
            $nama = $row->nama;
            $harga = $row->harga;
            $gambar = $row->gambar;
        }
        $start_clock = '02:00:00';
        $end_clock = '12:00:00';
        //$unique = uniqid().uniqid();
        $eightdigitrandom = rand(10000, 99999999);
        $randNumber = rand(1211, 8311);
        $randNumber4 = rand(121, 131);


        //kalo belum ada booking id
        if ($this->session->userdata('bookingId') == null) {
            $start_clock = '02:00:00';
            $end_clock = '12:00:00';

            $bookingId = '88' . $randNumber4 . $randNumber;
            $this->session->set_userdata('bookingId', $bookingId);
        } else {
            $bookingId = $this->session->userdata('bookingId');
            //$order_idt = $this->session->userdata('order_idt');
        }
        $total_harga = $harga * $qty;
        $randNumber = rand(100, 4000);
        $data = array(
            'id'      => '1-' . $randNumber,
            'qty'     => $qty,
            'price'   => $harga,
            'coupon'  => 0,
            'option'  => 'Restaurant',
            'name'    => $nama,
            //'image'   => $this->input->post('gambar', true)

        );
        //print_r($data);

        $this->cart->insert($data);
        //echo $gambar;
        $this->session->set_flashdata('message', 'Menambah Kedalam Keranjang');
        header('location:' . $_SERVER['HTTP_REFERER']);
        //echo $bookingId;
        //print_r($this->cart->contents())         
    }

    public function hapus_items($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0,
        );

        if ($this->cart->update($data)) {
            $this->session->set_flashdata('message', 'Menghapus Items');
        } else {
            $this->session->set_flashdata('message', 'Gagal Menghapus');
        }
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
}
