<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
        //$submenu = $ci->uri->segment(2);
        //$querySubMenu = $ci->db->get_where('user_sub_menu', ['segment' => $submenu])->row_array();
        //$submenu_id = $querySubMenu['id'];

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
        $data['title'] = 'Refrensi Pengguna';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $data['users'] = $this->db->get_where('user', array('role_id >' => 1))->result_array();
        //$data['users'] = $this->admin->getUsers();

            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates_admin/footer', $data);
        
        
    }
    public function hapusUser($userId)
    {
        $this->_access();
        $this->admin->hapusUser($userId);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('users/');
    }
    public function editUser($userId)
    {
        $this->_access();
        $userId = decrypt_url($userId);
        $data['title'] = 'Dashboard User';
        $data['sub_title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $where = array('userId' => $userId);
        $data['user_Edit'] = $this->admin->update_user($where, 'user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('users/edit', $data);
        $this->load->view('templates_admin/footer', $data);
    }
    function update_users()
    {
        $userId = $this->input->post('userId');
        $userEmail = $this->input->post('userEmail');
        $role_id = $this->input->post('role_id');
        $userNoTelepon = $this->input->post('userNoTelepon');
        $userNama = $this->input->post('userNama');
        $is_active = $this->input->post('is_active');


        $data = array(
            'userNama' => $userNama,
            'role_id' => $role_id,
            'userEmail' => $userEmail,
            'userNoTelepon' => $userNoTelepon,
            'is_active' => $is_active

        );

        $where = array(
            'userId' => $userId
        );

        $this->admin->update_user_proses($where, $data, 'user');
        $this->session->set_flashdata('message', 'Berhasil Diubah');
        redirect('users/');
    }
}
