<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rrevenue extends CI_Controller
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
              $this->load->model('Rrevenue_model', 'rrevenue_');
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
              //$data['userNama'] = $this->session->userdata('userNama');
              $data['title'] = "Revenue Management Resto";
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              $data['laris_masakan'] = $this->rrevenue_->getLarisMasakan();
              $data['chartData'] = $this->getChartData();
              // Mendapatkan total pemasukan dari database
              // mendapatkan pemsaukan hari ini
              $query = $this->db->query("SELECT SUM(total_harga) AS total_pemasukan FROM tb_transaksi_resto WHERE status_pembayaran = 'Pembayaran Berhasil dilakukan' AND tanggal = DATE_FORMAT(NOW(), '%d-%m-%Y')");
              $data['total_pemasukan_hari_ini'] = $query->row()->total_pemasukan;
              //
              $data['totalPemasukan'] = $this->rrevenue_->getTotalPemasukan();
              // 
              // digunakan untuk mengambil pemasukan harian
              $data['pemasukan'] = $this->rrevenue_->getTotalPemasukanPerHari();
              // digunakan untuk menghasilkan json api
              //echo json_encode($datas);

              $this->load->view('templates-admin-resto/header', $data);
              $this->load->view('admin-resto/revenue/index', $data);
              $this->load->view('templates-admin-resto/footer', $data);
       }
       private function getChartData()
       {
              $query = $this->db->query("SELECT SUBSTRING(tanggal, 4, 2) AS bulan, YEAR(STR_TO_DATE(tanggal, '%d-%m-%Y')) AS tahun, SUM(total) AS total_masakan
              FROM tb_transaksi_resto
              WHERE status_pembayaran = 'Pembayaran Berhasil dilakukan'
              GROUP BY bulan, tahun
              ORDER BY tahun, bulan");

              $chartData = array();
              foreach ($query->result() as $row) {
                     $bulanTahun = $row->bulan . '-' . $row->tahun;
                     $chartData[$bulanTahun] = isset($chartData[$bulanTahun]) ? $chartData[$bulanTahun] + $row->total_masakan : $row->total_masakan;
              }

              return $chartData;
       }
       public function search()
       {
              $this->_access();
              //$data['userNama'] = $this->session->userdata('userNama');
              $data['title'] = "Revenue report";
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();

              if (isset($_GET['xfil']) && !empty($_GET['xfil'])) { // Cek apakah user telah memilih xfil dan klik tombol tampilkan
                     $xfil = $_GET['xfil']; // Ambil data filder yang dipilih user


                     if ($xfil == '1') { // Jika xfil nya 1 (per tanggal)
                            $tgl = $_GET['tanggal'];
                            $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
                            $url_cetak = 'report_h/cetak?xfil=1&tanggal=' . $tgl;
                            $transaksi = $this->rrevenue_->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di rrevenue_
                     } else if ($xfil == '2') { // Jika xfil nya 2 (per bulan)
                            $bulan = $_GET['bulan'];
                            $tahun = $_GET['tahun'];
                            $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                            $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                            $url_cetak = 'report_h/cetak?xfil=2&bulan=' . $bulan . '&tahun=' . $tahun;
                            $transaksi = $this->rrevenue_->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Report_h_model
                     } else { // Jika xfil nya 3 (per tahun)
                            $tahun = $_GET['tahun'];

                            $ket = 'Data Transaksi Tahun ' . $tahun;
                            $url_cetak = 'report_h/cetak?xfil=3&tahun=' . $tahun;
                            $transaksi = $this->rrevenue_->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di rrevenue_
                     }
              } else { // Jika user tidak mengklik tombol tampilkan
                     $ket = 'Semua Data Transaksi';
                     $url_cetak = 'report_h/cetak';
                     $transaksi = $this->rrevenue_->view_all(); // Panggil fungsi view_all yang ada di rrevenue_
              }

              $data['ket'] = $ket;
              $data['url_cetak'] = base_url($url_cetak);
              $data['transaksi'] = $transaksi;
              $data['option_tahun'] = $this->rrevenue_->option_tahun();
              ob_start();
              $this->load->view('templates-admin-resto/header', $data);
              $this->load->view('admin-resto/revenue/search', $data);
              $this->load->view('templates-admin-resto/footer', $data);
       }

       public function redirect()
       {
              $this->_access();
              //$data['userNama'] = $this->session->userdata('userNama');
              $data['title'] = "Revenue Management Resto";
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();


              //$this->load->view('bar_chart', $data);
              $this->load->view('templates-admin-resto/header', $data);
       }
}
