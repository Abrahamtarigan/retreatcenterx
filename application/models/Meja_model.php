<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja_model extends CI_Model {

	protected $table = 'tb_meja';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		return $this->db->get($this->table)->result();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function getMeja()
	{
		$this->db->select('id_meja, no_meja, jumlah_kursi, nama_meja, status' );
		//$this->db->where('status', '0');
		return $this->db->get($this->table);
	}

	public function getOrderMeja()
	{
		$this->db->select('no_meja');
		$this->db->where('status', '1');
		return $this->db->get($this->table);

		
	}

	public function getOrder()
	{
		$this->db->select('ordermeja.id, ordermeja.no_meja as id_meja, DATE_FORMAT(ordermeja.tanggal, "%d %M %Y") as tanggal, ordermeja.keterangan, meja.no_meja');
		$this->db->from('ordermeja');
		$this->db->join('tb_meja', 'meja.id = ordermeja.no_meja');
		return $this->db->get();
	}

	public function orderMeja($no_meja,$data)
	{
		$this->db->where('id', $no_meja);
		$this->db->set('status', '1');
		if ($this->db->update($this->table)) {
			return $this->db->insert('ordermeja', $data);
		}
	}

	public function hapusOrderMeja($id,$id_meja)
	{
		$this->db->where('id', $id_meja);
		$this->db->set('status', '0');
		if ($this->db->update($this->table)) {
			$this->db->where('id', $id);
			return $this->db->delete('ordermeja');
		}
	}


}

/* End of file Meja_model.php */
/* Location: ./application/models/Meja_model.php */