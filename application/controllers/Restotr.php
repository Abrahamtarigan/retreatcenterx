<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Restotr extends CI_Controller
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
              $this->load->library('pagination');
              //$this->load->helper('pdf_helper');
              require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
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

       public function index()
       {
              $this->_access();
              //$this->load->library('pagination');
              //$data['userNama'] = $this->session->userdata('userNama');
              $data['title'] = 'Pencarian';
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              $bookingId = $this->input->get('bookingId');
              $tanggal = $this->input->get('tanggal');
              $x = $this->input->get('tanggal');
              $tanggal = str_replace('/', '-', $x);
              $no_telepon = $this->input->get('no_telepon');
              $nama_customer = $this->input->get('nama_customer');




              // Konfigurasi pagination
              $config['base_url'] = base_url('Restotr/index/');
              $config['total_rows'] = $this->resto->count_cari_resto($bookingId, $tanggal, $no_telepon, $nama_customer);;
              $config['per_page'] = 8;
              $config['uri_segment'] = 3;
              // Konfigurasi styling untuk Bootstrap
              $config['full_tag_open'] = ' <ul class="pagination justify-content-end">';
              $config['full_tag_close'] = '</ul>';
              $config['next_link'] = false;
              $config['prev_link'] = false;
              $config['first_link'] = '...'; // Mengubah tulisan "First" menjadi "Awal"
              $config['last_link'] = '...';


              $config['num_links'] = 3;
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


              $data['hasil'] = $this->resto->cari_resto($bookingId, $tanggal, $no_telepon, $nama_customer);
              $this->load->view('templates-admin-resto/header', $data);
              $this->load->view('admin-resto/resto-tr/transaksi', $data);
              $this->load->view('templates-admin-resto/footer', $data);
       }
       public function cetak()
       {
              $this->_access();
              //$data['userNama'] = $this->session->userdata('userNama');
              $data['title'] = "Report Hotel";
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();

              if (isset($_GET['xfil']) && !empty($_GET['xfil'])) { // Cek apakah user telah memilih xfil dan klik tombol tampilkan
                     $xfil = $_GET['xfil']; // Ambil data filder yang dipilih user

                     if ($xfil == '1') { // Jika xfil nya 1 (per tanggal)
                            $tgl = $_GET['tanggal'];

                            $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
                            $transaksi = $this->resto_transaksi->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di resto_transaksi
                     } else if ($xfil == '2') { // Jika xfil nya 2 (per bulan)
                            $bulan = $_GET['bulan'];
                            $tahun = $_GET['tahun'];
                            $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                            $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                            $transaksi = $this->resto_transaksi->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di resto_transaksi
                     } else { // Jika xfil nya 3 (per tahun)
                            $tahun = $_GET['tahun'];

                            $ket = 'Data Transaksi Tahun ' . $tahun;
                            $transaksi = $this->resto_transaksi->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di resto_transaksi
                     }
              } else { // Jika user tidak mengklik tombol tampilkan
                     $ket = 'Semua Data Transaksi';
                     $transaksi = $this->resto_transaksi->view_all(); // Panggil fungsi view_all yang ada di resto_transaksi
              }

              $data['ket'] = $ket;
              $data['transaksi'] = $transaksi;

              ob_start();
              $this->load->view('report/cetak', $data);
       }
       public function detail()
       {

              $this->_access();
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              $id = $this->uri->segment(3);
              $data['title'] = 'Validasi Transaksi';
              $where = $id;
              $data['menu_edit_view'] = $this->resto->view_validasi_transaksi($where);
              $data['sum_total'] = $this->resto->get_total($where);
              // $data['content'] = file_get_contents('../views/admin-resto/__Produk/nav-master-resto.php');
              $this->load->view('templates-admin-resto/header', $data);
              $this->load->view('admin-resto/resto-tr/validasi_transaksi', $data);
              $this->load->view('templates-admin-resto/footer', $data);
              $this->load->view('admin-resto/__Produk/resto-admin-js', $data);
       }
       public function view_pdf()
       {
              $id = $this->uri->segment(3);
              $data['title'] = 'Validasi Transaksi';
              $where = $id;
              // Ambil data yang ingin Anda tampilkan dalam PDF
              $data = $this->resto->view_validasi_transaksi($where);


              // Buat tampilan HTML untuk data tersebut
              $html = $this->load->view('admin-resto/resto-tr/pdf_template', $data, true);
              // Muat HTML ke Dompdf
              $dompdf = new Dompdf\Dompdf();
              $dompdf->loadHtml($html);

              // Render PDF
              $dompdf->render();

              // Simpan atau tampilkan PDF
              $filename = 'data.pdf';
              $dompdf->stream($filename, array('Attachment' => 0));
       }
}
