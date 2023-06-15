<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produkresto extends CI_Controller
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
        function read_external_file($path)
        {
            return file_get_contents($path);
        }
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
        $data['title'] = 'Dashboard Produk';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();
        // $data['count_success_transactions']= $this->transactions->count_success_transactions();
        // $data['total_earnings']= $this->transactions->total_earnings();
        // $data['count_pending_transactions']= $this->transactions->count_pending_transactions();
        // $data['count_waiting_confirmation']= $this->transactions->count_waiting_confirmation();
        $randNumber = rand(1211, 8311);
        $randNumber4 = rand(121, 131);
        $getDataMenu = $this->resto->getDataMenu();
        $datas = [
            'daftar_masakan' => $getDataMenu->num_rows() > 0 ? $getDataMenu->result() : 'kosong',
            //'meja' => $getMeja->num_rows() > 0 ? $getMeja->result() : 'kosong',
            //$data['meja']= $this->meja->getOrderMeja(),
        ];
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
        // Set validation rules

        $this->load->view('templates-admin-resto/header', $data);
        //$this->load->view('templates_admin/sidebar_s', $data);
        //$this->load->view('templates-admin-resto/sidebar', $data);
        $this->load->view('admin-resto/__Produk/index', $datas);
        $this->load->view('templates-admin-resto/footer', $data);
    }

    public function pencarian()
    {
        $this->_access();
        $data['title'] = 'Dashboard Produk';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $nama = $this->input->get('nama');
        $id_kategori = $this->input->get('id_kategori');
        $data['hasil'] = $this->resto->cari($nama, $id_kategori);
        $data['kategori'] = $this->resto->getKategori();
        $this->load->view('templates-admin-resto/header', $data);
        $this->load->view('admin-resto/__Produk/hasil_pencarian_produk', $data);
        $this->load->view('templates-admin-resto/footer', $data);
    }
    public function tambah_menu_resto()
    {
        // Mendapatkan data yang dikirimkan melalui permintaan POST

        $nama = $this->input->post('nama');
        $slugs = $this->input->post('slugs');
        $harga_javascript = $this->input->post('harga');
        $harga = str_replace('.', '', $harga_javascript);
        $id_kategori = $this->input->post('id_kategori');
        $gambar = $this->input->post('gambar');
        $desc_index = $this->input->post('desc_index');
        $desc = $this->input->post('desc_masakan');
        //untuk merubah format yang salah diforala ** khusus file 
        $decoded_desc = str_replace('%3A', ':', $desc);
        //$desc = htmlspecialchars($this->input->post('desc_masakan'));



        $config['upload_path'] = './upload/resto/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['file_name']            = 'file_name'; 
        $config['overwrite'] = true;
        $config['max_size'] = 5000; // 1MB
        //$config['max_width']            = 1080;
        //$config['max_height']           = 1080;

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('gambar')) {
            $data['error'] = $this->upload->display_errors();
            echo "gagal";
        } else {
            $data_gambar = $this->upload->data();
            $file_name = $data_gambar['file_name'];

            $data = array(
                'nama' => $nama,
                'slugs' => $slugs,
                'harga' => $harga,
                'id_kategori' => $id_kategori,
                'gambar' => $file_name,
                'desc_masakan' => $decoded_desc,
                'desc_index' => $desc_index,
                'img_url' => base_url('upload/resto/' . $file_name)

            );

            $this->db->insert('tb_masakan', $data);
            //  
            echo "berhasil";
        }

        //echo $filename;

    }
    public function edit($id)
    {
        $this->_access();
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $id = $this->uri->segment(3);
        $data['title'] = 'Dashboard User';
        $where = array('id_menu' => $id);
        $data['menu_edit_view'] = $this->resto->edit_menu($where, 'tb_masakan')->result();
        $data['kategori'] = $this->resto->getKategori();
        // $data['content'] = file_get_contents('../views/admin-resto/__Produk/nav-master-resto.php');
        $this->load->view('templates-admin-resto/header', $data);
        $this->load->view('admin-resto/__Produk/_modal/modal_edit_produk', $data);
        $this->load->view('templates-admin-resto/footer', $data);
        $this->load->view('admin-resto/__Produk/resto-admin-js', $data);
    }

    public function proses_update()
    {
        $id = $this->input->post('id_menu');
        $nama = $this->input->post('nama');
        $slugs = $this->input->post('slugs');
        $harga_javascript = $this->input->post('harga');
        $harga = str_replace('.', '', $harga_javascript);
        $id_kategori = $this->input->post('id_kategori');
        $gambar = $this->input->post('gambar');
        $desc_index = $this->input->post('desc_index');
        $desc = $this->input->post('desc_masakan');
        //untuk merubah format yang salah diforala ** khusus file 
        $decoded_desc = str_replace('%3A', ':', $desc);
        //$desc = htmlspecialchars($this->input->post('desc_masakan'));

        // Konfigurasi untuk unggahan gambar
        $config['upload_path'] = './upload/resto/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $data_gambar = $this->upload->data();
            $file_name = $data_gambar['file_name'];


            // Lakukan perbarui data gambar di tabel database sesuai dengan ID
            $data = array(
                'nama' => $nama,
                'slugs' => $slugs,
                'harga' => $harga,
                'id_kategori' => $id_kategori,
                'desc_masakan' => $decoded_desc,
                'desc_index' => $desc_index,
                'img_url' => base_url('upload/resto/' . $file_name),
                'gambar' => $file_name
            );
            $this->db->where('id_menu', $id);
            $this->db->update('tb_masakan', $data);

            // Tambahkan logika atau tindakan lain yang diperlukan setelah pembaruan data
        } else {
            // Jika upload gagal, tangani kesalahan atau berikan pesan kesalahan kepada pengguna
            $error = $this->upload->display_errors();
            echo $error;
        }
    }
    public function auto_refresh()
    {
        $this->_access();
        $data['title'] = 'Dashboard Produk';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $nama = $this->input->get('nama');
        $id_kategori = $this->input->get('id_kategori');
        $data['hasil'] = $this->resto->cari($nama, $id_kategori);
        $data['kategori'] = $this->resto->getKategori();
        $this->load->view('__Produk/tabel_menu', $data);
    }
    public function tambah_kategori()
    {
        // Tangkap data dari permintaan POST
        //$name = $this->input->post('name');
        $nama = $this->input->post('nama_kategori');
        $data = array(
            'nama_kategori' => $nama
        );
        $this->db->insert('tb_kategori_masakan', $data);
    }
    public function getKategori()
    {
        $data = $this->resto->getKategori();
        echo json_encode($data);
    }
}
