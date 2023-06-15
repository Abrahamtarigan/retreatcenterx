<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Runggun extends CI_Controller
{
       public function __construct()
       {

              parent::__construct();

              //is_logged_in();
              //$this->load->model('Notify_model','notify_model');
              //$this->load->model('Admin_model');
              //$this->load->model('Apps_model', 'appsSet');
              $this->load->library('form_validation');
              $this->load->helper(array('url'));
              $this->load->database();
              $this->load->model('Admin_model', 'admin');
              $this->load->model('Runggun_model', 'runggun');
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
              $data['title'] = 'Dashboard Runggun';
              $data['user'] = $this->db->get_where('user', ['userEmail' => $this->session->userdata('userEmail')])->row_array();
              //$data['appsSet'] = $this->appsSet->get_apps_credentials()->result_array();
              $data['provinsi']=$this->runggun->getProvinsi();
              //$data['ketuarunggun']=$this->runggun->getKetuaRunggun();
              $data['runggun'] = $this->db->get('tb_ref_runggun')->result_array();
              $data['klasis'] = $this->runggun->getKlasis();

              $this->load->view('templates_admin/header', $data);
              //$this->load->view('templates_admin/sidebar_s', $data);
              $this->load->view('templates_admin/sidebar', $data);
              $this->load->view('runggun/index', $data);
              $this->load->view('templates_admin/footer', $data);
       }
       public function getKabupaten()
       {
              if($this->input->post('provId'))
              {
                     echo $this->runggun->getKabupaten($this->input->post('provId'));
              }
       }
       public function getKecamatan()
       {
              if($this->input->post('kabId'))
              {
                     echo $this->runggun->getKecamatan($this->input->post('kabId'));
              }
       }
       public function getKelurahan()
       {
              if($this->input->post('kecId'))
              {
                     echo $this->runggun->getKelurahan($this->input->post('kecId'));
              }
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
       public function tambah_runggun()
       {
              $runggunNama = $this->input->post('runggunNama');
              $runggunKlasisId = $this->input->post('runggunKlasisId');
              $runggunProvId = $this->input->post('runggunProvId');
              $runggunKabId = $this->input->post('runggunKabId');
              $runggunKecId = $this->input->post('runggunKecId');
              $runggunKelId = $this->input->post('runggunKelId');
              $runggunAlamat = $this->input->post('runggunAlamat');


              $data = array(
                     'runggunNama' => $runggunNama,
                     'runggunKlasisId' => $runggunKlasisId,
                     'runggunProvId' => $runggunProvId,
                     'runggunKabId' => $runggunKabId,
                     'runggunKecId' => $runggunKecId,
                     'runggunKelId' => $runggunKelId,
                     'runggunAlamat' => $runggunAlamat

              );
              $this->runggun->tambahRunggun($data, 'tb_ref_runggun');
              $this->session->set_flashdata('message', 'Berhasil Ditambahkan');
              redirect('runggun/');
       }
}
