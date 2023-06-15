<?php

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Berita';
        $data['news'] = $this->News_model->getAllNews();
        if( $this->input->post('keyword') ) {
            $data['news'] = $this->News_model->cariDataNews();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('news/login', $data);
        $this->load->view('templates/footer');
    }
    
   

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';

        $this->form_validation->set_rules('news_title', 'News Title', 'required');
        //$this->form_validation->set_rules('news_title', 'News Title', 'required|numeric');
        $this->form_validation->set_rules('news_content', 'News Content', 'required');
        $this->form_validation->set_rules('news_uploader', 'News Uploader', 'required');
        //$this->form_validation->set_rules('news_uploader', 'News Uploader', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->News_model->tambahNews();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('news');
        }
    }

    public function hapus($id)
    {
        $this->News_model->hapusDataNews($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('news/');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Berita';
        $data['news'] = $this->News_model->getNewsById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('news/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }

}
