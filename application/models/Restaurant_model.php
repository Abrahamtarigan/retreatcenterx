<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restaurant_model extends CI_Model
{

	protected $table = 'tb_masakan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		$this->db->select('tb_masakan.*, tb_kategori_masakan.nama as kategori');
		$this->db->from('tb_masakan');
		$this->db->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id');
		return $this->db->get()->result();
	}
	public function getKategori()
	{
		$this->db
			->select('*')
			->from('tb_kategori_masakan');
		$query = $this->db->get();
		//return $query->result_array();
		return $query->result();
	}
	public function getOptionCat($jenis)
	{
		$this->db
			->select('tb_masakan.*, tb_kategori_masakan.nama_kategori as kategori')
			->from('tb_kategori_masakan')
			->join('tb_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id')
			->where('nama_kategori', $jenis);
		//->where_not_in('bookingEdDt <=', $data['bookingEdDt']);

		return $this->db->get();
		//return $query->result_array();

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

	public function getMasakan()
	{
		$this->db->select('tb_masakan.*, tb_kategori_masakan.nama_kategori as kategori');
		$this->db->from('tb_masakan');
		$this->db->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id');
		return $this->db->get();
	}
	public function getDetail($detail)
	{
		$this->db->select('tb_masakan.*, tb_kategori_masakan.nama_kategori as kategori')
			->from('tb_masakan')
			->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id')
			->where('slugs', $detail);
		return $this->db->get();
	}
	public function getDataMenu()
	{
		$this->db->select('tb_masakan.*, tb_kategori_masakan.nama_kategori as kategori');
		$this->db->from('tb_masakan');
		$this->db->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id');
		return $this->db->get();
	}
	public function cari($nama, $id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tb_masakan');
		//$this->db->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id');
		if ($nama != '') {
			$this->db->like('nama', $nama);
		}
		if ($id_kategori != '') {
			$this->db->like('id_kategori', $id_kategori);
		}

		$query = $this->db->get();
		return $query->result();
	}
	public function cari_resto($bookingId, $tanggal, $no_telepon, $nama_customer)
	{
		//$this->db->distinct();
		$this->db->select('*')
			->from('tb_transaksi_resto')
			->where('id IN (SELECT MIN(id) FROM tb_transaksi_resto GROUP BY bookingId)');
		//$this->db->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id');
		if ($bookingId != '') {
			$this->db->like('bookingId', $bookingId);
		}
		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}
		if ($no_telepon != '') {
			$this->db->like('no_telepon', $no_telepon);
		}
		if ($nama_customer != '') {
			$this->db->like('nama_customer', $nama_customer);
		}

		$query = $this->db->get();
		return $query->result();
	}
	public function count_cari_resto($bookingId, $tanggal, $no_telepon, $nama_customer)
	{
		//$this->db->distinct();
		$this->db->select('*')
			->from('tb_transaksi_resto')
			->where('id IN (SELECT MIN(id) FROM tb_transaksi_resto GROUP BY bookingId)');
		//$this->db->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id');
		if ($bookingId != '') {
			$this->db->like('bookingId', $bookingId);
		}
		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}
		if ($no_telepon != '') {
			$this->db->like('no_telepon', $no_telepon);
		}
		if ($nama_customer != '') {
			$this->db->like('nama_customer', $nama_customer);
		}

		$query = $this->db->get();
		return $query->num_rows();
	}
	public function edit_menu($where, $table)
	{
		//$this->db->select('tb_masakan.*, tb_kategori_masakan.nama_kategori as kategori');
		//$this->db->select('tb_masakan');
		$this->db->join('tb_kategori_masakan', 'tb_masakan.id_kategori = tb_kategori_masakan.id');
		return $this->db->get_where($table, $where);
	}
	public function edit_menu_resto($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function view_validasi_transaksi($where)
	{
		// //$this->db->where('bookingId', $where);
		// $this->db->select('tb_transaksi_resto');
		// $query = $this->db->get();
		// return $query->result();

		$query = $this->db->get_where('tb_transaksi_resto', array('bookingId' => $where));
		$result = $query->result();
		return $result;
	}
	public function get_total($where)
	{
		// //$this->db->where('bookingId', $where);
		// $this->db->select('tb_transaksi_resto');
		// $query = $this->db->get();
		// return $query->result();

		$query = $this->db->get_where('tb_total_pay', array('booking_id' => $where));
		$result = $query->result();
		return $result;
	}
}

/* End of file Masakan_model.php */
/* Location: ./application/models/Masakan_model.php */