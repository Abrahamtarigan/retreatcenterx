<?php 

use GuzzleHttp\Client;

class News_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/xapi/v1/news/',
            'auth' => ['admin','1234'],
            'query' => [
                'autokey' => 'rahasia'
            ]
            
        ]);
    }

    public function getAllNews()
    {
        //return $this->db->get('mahasiswa')->result_array();
        //$client = new Client();

        $response = $this->_client->request('GET','news', //[ 
            //'query' => [
                //'autokey' => 'rahasia'
            //]
            //]
        );

            $result = json_decode($response->getBody()->getContents(), true);

            return $result['data'];
    }
    public function getNewsById($id)
    {
        $response = $this->_client->request('GET','news', [ 
            'query' => [
                'autokey' => 'rahasia',
                'id' => $id
            ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);

            return $result['data'][0];
    }

    public function tambahNews()
    {
        $data = [
            "news_title" => $this->input->post('news_title', true),
            "news_content" => $this->input->post('news_content', true),
            "news_uploader" => $this->input->post('news_uploader', true),
            "autokey" => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'news',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataNews($id)
    {
        $response = $this->_client->request('DELETE', 'news', [
            'form_params' => [
                'id' => $id,
                'autokey' => 'rahasia'
            ]
            ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;

    
    }

   

    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}