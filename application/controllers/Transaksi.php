<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model', 'user');
        $this->load->model('Restaurant_model', 'resto');
        $this->load->model('Meja_model', 'meja');
        $this->load->library('user_agent');
        $this->load->model('transaksi_model');
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
        $transaksi = $this->transaksi_model->read();
        $data['transaksi'] = $transaksi;
        $this->load->view('transaksi/data_transaksi', $data);
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $userEmail = $this->session->userdata('userEmail');
        $fetch_user_order = $this->db->query("SELECT * FROM user WHERE userEmail = '$userEmail'");
        $harga_semua = $this->input->get('harga');
        $base = $harga_semua;
        $new_base = explode(",", $base);
        $total_harga = array_sum($new_base);
        foreach ($fetch_user_order->result() as $row) {
            $userId = $row->userId;
            // $roomName =  $row->roomName;
        }
        if ($this->input->get('masakan') & $this->input->get('total') & $this->input->get('meja') & $this->input->get('harga')) {

            $masakan = $this->input->get('masakan');
            $total = $this->input->get('total');
            $meja = $this->input->get('meja');
            $harga = $this->input->get('harga');

            $bookRestoId = $this->session->userdata('bookRestoId');


            // echo $bookRestoId;
            $insert = [
                'id' => $bookRestoId,
                'userId' => $userId,
                'masakan' => $masakan,
                'total' => $total,
                'no_meja' => $meja,
                'harga' => $harga,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $total_harga,
            ];
            $this->transaksi_model->create($insert);
            redirect('transaksi/order_selesai');
        } else {
            redirect('transaksi');
        }
    }

    public function order_selesai()
    {
        $this->load->view('order-masakan/order-selesai');
    }

    public function proses()
    {
        $data['title'] = 'Retreat Centre Restaurant';
        $data['alamat'] = 'Sukamakmur, Indonesia';

        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $id = $this->input->get('id');
        $eightdigitrandom = rand(10000, 99999999);
        $randNumber = rand(1211, 8311);
        $randNumber4 = rand(121, 131);
        $data['bookRestoId'] = $id . $randNumber4 . $randNumber;
        $this->session->set_userdata('bookRestoId', $data['bookRestoId']);

        if ($this->input->get('masakan') & $this->input->get('total') & $this->input->get('meja') & $this->input->get('harga')) {
            $masakan = $this->input->get('masakan');
            $total = $this->input->get('total');
            $meja = $this->input->get('meja');
            $harga = $this->input->get('harga');
            $datas = [
                'masakan' => explode(',', $masakan),
                'qty' => explode(',', $total),
                'harga' => explode(',', $harga),
                'no_meja' => $meja,
            ];
            $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            $this->load->view('order-masakan/order-proses', $datas, $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('order/masakan');
        }
    }

    public function detail($id = null)
    {
        if ($id) {
            $data = [
                'pesanan' => $this->transaksi_model->detail($id),
            ];
            $this->load->view('transaksi/detail', $data);
        } else {
            redirect('transaksi');
        }
    }

    public function hapus($id = null)
    {
        if ($id) {
            $this->session->set_flashdata('hapus', 'sukses');
            $this->transaksi_model->delete($id);
            redirect('transaksi');
        } else {
            redirect('transaksi');
        }
    }
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
