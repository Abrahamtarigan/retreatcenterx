<?php

Class Runggun_model extends CI_Model
{

function __construct(){

parent::__construct();

}
        function getKetuaRunggun()
        {
            $this->db->order_by("userNama", "ASC");
            $query = $this->db->get_where('user', array('userKtRunggun' => '1'));
            return $query->result();
        }
        function getKlasis()
        {
            $this->db->order_by("klasisNama", "ASC");
            $query = $this->db->get("tb_ref_klasis");
            return $query->result();
        }


        function getProvinsi()
        { 
            $this->db->order_by("provNama", "ASC");
            $query = $this->db->get("tb_ref_provinsi");
            return $query->result();
        }

        function getKabupaten($provId)
        {
            $this->db->where('kabProvid', $provId);
            $this->db->order_by('kabNama', 'ASC');
            $query = $this->db->get('tb_ref_kabupaten');
            $output = '<option value="">Pilih kabupaten/kota</option>';
            foreach($query->result() as $row)
            {
            $output .= '<option value="'.$row->kabId.'">'.$row->kabNama.'</option>';
            }
            return $output;
        }
        function getKecamatan($kabId)
        {
            $this->db->where('kecKabId', $kabId);
            $this->db->order_by('kecNama', 'ASC');
            $query = $this->db->get('tb_ref_kecamatan');
            $output = '<option value="">Pilih Kecamatan</option>';
            foreach($query->result() as $row)
            {
            $output .= '<option value="'.$row->kecId.'">'.$row->kecNama.'</option>';
            }
            return $output;
        }
        function getKelurahan($kecId)
        {
            $this->db->where('kelKecId', $kecId);
            $this->db->order_by('kelNama', 'ASC');
            $query = $this->db->get('tb_ref_kelurahan');
            $output = '<option value="">Pilih Kelurahan/ Desa</option>';
            foreach($query->result() as $row)
            {
            $output .= '<option value="'.$row->kelId.'">'.$row->kelNama.'</option>';
            }
            return $output;
        }
        public function tambahRunggun($data,$table)
        {          
                $this->db->insert($table,$data);
        }
    

      

    


}