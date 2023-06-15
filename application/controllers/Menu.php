<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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
        $this->load->model('Menu_model');
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
    public function index($rowno = 0)
    {
        $this->_access();
        $data['title'] = 'Dashboard Menu';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('menu_url', 'menu_url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates_admin/footer', $data);
        } else {
            $this->db->insert(
                'user_menu',
                [
                    'title' => $this->input->post('title'),
                    'menu' => $this->input->post('menu'),
                    'menu_url' => $this->input->post('menu_url'),
                    'icon' => $this->input->post('icon')
                ]
            );
            $this->session->set_flashdata('message', 'Berhasil ditambah');
            redirect('menu/');
        }
    }
    public function hapusMenu($menuId)
    {
        $this->Menu_model->hapusMenu($menuId);
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('menu/');
    }
    public function editMenu($menuId)
    {
        $this->_access();
        $data['title'] = 'Dashboard Menu';
        $data['sub_title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
        $where = array('menuId' => $menuId);
        $data['menu_edit'] = $this->Menu_model->update_menu($where, 'user_menu')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('menu/edit', $data);
        $this->load->view('templates_admin/footer', $data);
    }
    function update_menu()
    {

        $menuId = $this->input->post('menuId');
        $title = $this->input->post('title');
        $menu = $this->input->post('menu');
        $menu_url = $this->input->post('menu_url');


        $data = array(
            'title' => $title,
            'menu' => $menu,
            'menu_url' => $menu_url

        );

        $where = array(
            'menuId' => $menuId
        );

        $this->Menu_model->update_menu_proses($where, $data, 'user_menu');
        $this->session->set_flashdata('message', 'Berhasil Diubah');
        redirect('menu/');
    }
}
