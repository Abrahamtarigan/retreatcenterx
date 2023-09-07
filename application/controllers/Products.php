<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
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
        $this->load->model('Profac_model', 'products');
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
        $data['title'] = 'Administrator';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $data['getAllProducts'] = $this->products->getAllProducts();
        $data['getAllFacility'] = $this->products->getAllFacility();
        $data['roomIdToEdit'] = $this->uri->segment('3');

        $this->load->view('templates_admin/header', $data);
        //$this->load->view('templates_admin/sidebar_s', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('products/index', $data);
        $this->load->view('templates_admin/footer', $data);
    }
    public function hapus_product($roomId)
    {
        $this->products->hapus_product($roomId);
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('products/');
    }
    public function update_facility($roomId)
    {
        $this->_access();
        $data['title'] = 'Tambah Fasilitas';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $where = array('rmId' => $roomId);
        $data['roomIdToEdit'] = $this->uri->segment('3');

        $this->load->view('templates_admin/header', $data);
        //$this->load->view('templates_admin/sidebar_s', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('products/add-facility', $data);
        $this->load->view('templates_admin/footer', $data);
    }
    public function add_facility()
    {
        $rmId = $this->input->post('rmId');
        $rmFacName = $this->input->post('rmFacName');
        $rmFacDes = $this->input->post('rmFacDes');
        $rmFacIcon = $this->input->post('rmFacIcon');


        $data = array(
            'rmId' => $rmId,
            'rmFacName' => $rmFacName,
            'rmFacDes' => $rmFacDes,
            'rmFacIcon' => $rmFacIcon

        );
        $this->products->tambah_fasilitas($data, 'tb_rooms_facility');
        //$this->Menu_model->update_menu_proses($where, $data, 'user_menu');
        $this->session->set_flashdata('message', 'Berhasil Diubah');
        redirect('products/');
    }
    public function add_picture()
    {

        if ($this->input->method() === 'post') {
            // the user id contain dot, so we must remove i
            // $uploaded_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            //$file_name = $uploaded_data['file_name'];
            //$this->load->helper('url');
            //$file_name = $this->input->post('roomName');
            $config['upload_path']          = FCPATH . '/upload/hotel/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            //$config['file_name']            = 'file_name'; 
            $config['overwrite']            = true;
            // $config['max_size']             = 5000; // 1MB
            // // $config['max_width']            = 1080;
            // // $config['max_height']           = 1080;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('roomsPicture')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $file_name = $uploaded_data['file_name'];

                $data = [
                    'rmId' => $this->input->post('roomId'),
                    'roomsPicture' => $file_name
                ];

                $this->products->tambah_gambar($data, 'tb_rooms_picture');
                $this->session->set_flashdata('message', 'Gambar Berhasil ditambah');
                redirect('products/');
            }
        }

        $this->load->view('admin/setting_upload_avatar.php', $data);
    }
    public function add_product()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('roomName', 'Room Name', 'required');
        $this->form_validation->set_rules('roomDescription', 'Room Description', 'required');
        $this->form_validation->set_rules('roomLocation', 'Room Location', 'required');
        $this->form_validation->set_rules('roomPricePerNight', 'Price Per Night', 'required|numeric');
        $this->form_validation->set_rules('roomWifiAva', 'Wifi Availability', 'required');
        $this->form_validation->set_rules('roomBrfAva', 'Breakfast Availability', 'required');

        if ($this->input->method() === 'post') {
            if ($this->form_validation->run() === false) {
                // Validasi gagal, tampilkan pesan error dan kembali ke halaman input
                //$this->load->view('admin/setting_upload_avatar.php', $data);
                echo "form belum lengkap";
                return;
            }

            $config['upload_path']   = FCPATH . '/upload/head';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite']     = true;
            $config['max_size']      = 5000; // 1MB
            // $config['max_width']     = 1080;
            // $config['max_height']    = 1080;

            $this->load->library('upload', $config);

            try {
                if (!$this->upload->do_upload('roomHeadPicture')) {
                    throw new Exception($this->upload->display_errors());
                } else {
                    $uploaded_data = $this->upload->data();
                    $file_name = $uploaded_data['file_name'];

                    $data = [
                        'roomName' => $this->input->post('roomName'),
                        'roomDescription' => $this->input->post('roomDescription'),
                        'roomLocation' => $this->input->post('roomLocation'),
                        'roomPricePerNight' => $this->input->post('roomPricePerNight'),
                        'roomHeadPicture' => $file_name,
                        'roomWifiAva' => $this->input->post('roomWifiAva'),
                        'roomBrfAva' => $this->input->post('roomBrfAva'),
                    ];

                    $this->products->tambah_produk($data, 'tb_rooms');
                    $this->session->set_flashdata('message', 'Produk Berhasil ditambah');
                    redirect('products/');
                }
            } catch (Exception $e) {
                // Tangani exception, misalnya dengan menampilkan pesan error atau log ke file
                log_message('error', 'Exception during file upload: ' . $e->getMessage());
                // Tampilkan pesan error secara detail untuk debugging
                // show_error($e->getMessage());
                $data['error'] = 'Terjadi kesalahan saat upload gambar.';
                //$this->load->view('admin/setting_upload_avatar.php', $data);
                echo $e->getMessage();
                return;
            }
        }
    }
}
