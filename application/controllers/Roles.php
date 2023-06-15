<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends CI_Controller
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
              $data['title'] = 'Dashboard Role Access';
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              $data['role'] = $this->db->get('user_role')->result_array();
              //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();

              $this->load->view('templates_admin/header', $data);
              //$this->load->view('templates_admin/sidebar_s', $data);
              $this->load->view('templates_admin/sidebar', $data);
              $this->load->view('admin/role', $data);
              $this->load->view('templates_admin/footer', $data);
       }
       public function tambah_role()
       {
              $role = $this->input->post('role');
              $data = array(
                     'role' => $role,
              );
              $this->admin->tambahRole($data, 'user_role');
              $this->session->set_flashdata('message', 'Berhasil Ditambahkan');
              redirect('administrator/roles');
       }
       public function hapus_role($id)
       {
              $this->admin->hapusRole($id);
              $this->session->set_flashdata('message', 'Berhasil Dihapus');
              redirect('administrator/roles');
       }
       public function roleaccess($role_id)
       {
              $this->_access();
              $data['title'] = 'Rule Akses Management';
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();

              $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

              $this->db->where('menuId !=', 1);
              $data['menu'] = $this->db->get('user_menu')->result_array();

              $this->load->view('templates_admin/header', $data);
              //$this->load->view('templates/sidebar', $data);
              $this->load->view('templates_admin/sidebar', $data);
              $this->load->view('admin/role-access', $data);
              $this->load->view('templates_admin/footer');
       }
       public function changeAccess()
       {
              $menu_id = $this->input->post('menuId');
              $role_id = $this->input->post('roleId');

              $data = [
                     'role_id' => $role_id,
                     'menu_id' => $menu_id
              ];

              $result = $this->db->get_where('user_access_menu', $data);

              if ($result->num_rows() < 1) {
                     $this->db->insert('user_access_menu', $data);
              } else {
                     $this->db->delete('user_access_menu', $data);
              }

              $this->session->set_flashdata('message', 'Akun anda Belum Aktif');
              redirect('auth/');
       }
}
