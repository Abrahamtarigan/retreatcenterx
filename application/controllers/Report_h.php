<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_h extends CI_Controller
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
        $this->load->model('User_model', 'guess');
        $this->load->model('Report_h_model');
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
        //$data['userNama'] = $this->session->userdata('userNama');
        $data['title'] = "Report Hotel";
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();

        if(isset($_GET['xfil']) && ! empty($_GET['xfil'])){ // Cek apakah user telah memilih xfil dan klik tombol tampilkan
            $xfil = $_GET['xfil']; // Ambil data filder yang dipilih user

        
            if($xfil == '1'){ // Jika xfil nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'report_h/cetak?xfil=1&tanggal='.$tgl;
                $transaksi = $this->Report_h_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Report_h_model
            }else if($xfil == '2'){ // Jika xfil nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'report_h/cetak?xfil=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Report_h_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Report_h_model
            }else{ // Jika xfil nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'report_h/cetak?xfil=3&tahun='.$tahun;
                $transaksi = $this->Report_h_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Report_h_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'report_h/cetak';
            $transaksi = $this->Report_h_model->view_all(); // Panggil fungsi view_all yang ada di Report_h_model
        }

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url($url_cetak);
		$data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->Report_h_model->option_tahun();
		//$this->load->view('view', $data);
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('report/hotel', $data);
        $this->load->view('templates_admin/footer', $data);
        
    }
    public function cetak(){
        $this->_access();
        //$data['userNama'] = $this->session->userdata('userNama');
        $data['title'] = "Report Hotel";
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();

        if(isset($_GET['xfil']) && ! empty($_GET['xfil'])){ // Cek apakah user telah memilih xfil dan klik tombol tampilkan
            $xfil = $_GET['xfil']; // Ambil data filder yang dipilih user

            if($xfil == '1'){ // Jika xfil nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->Report_h_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Report_h_model
            }else if($xfil == '2'){ // Jika xfil nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Report_h_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Report_h_model
            }else{ // Jika xfil nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->Report_h_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Report_h_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->Report_h_model->view_all(); // Panggil fungsi view_all yang ada di Report_h_model
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

		ob_start();
		$this->load->view('report/cetak', $data);

        // aktifkan yang dibawah ini untuk bisa langsung print
        
        
		// $html = ob_get_contents();
        // ob_end_clean();

		// require './assets/html2pdf/autoload.php';

		// $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		// $pdf->WriteHTML($html);
		// $pdf->Output('Data Transaksi.pdf', 'D');
        
	}
}