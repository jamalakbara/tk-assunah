<?php

class m_uang extends CI_Model{
	
	public function Jadijurnal($kode_akun, $no_transaksi, $posisi_db, $nominal){
		$jurnal = array(
			'kode_akun'    => $kode_akun,
			'no_transaksi' => $no_transaksi,
			'tgl_jurnal'   => date('Y-m-d'),
			'posisi_db'    => $posisi_db,
			'nominal'      => $nominal,
		);
		$this->db->insert('jurnal', $jurnal);
	}
	public function Jadijurnal2($kode_akun, $no_deliv, $posisi_db, $nominal){
		$jurnal = array(
			'kode_akun'    => $kode_akun,
			'no_transaksi' => $no_deliv,
			'tgl_jurnal'   => date('Y-m-d'),
			'posisi_db'    => $posisi_db,
			'nominal'      => $nominal,
		);
		$this->db->insert('jurnal', $jurnal);
	}
	public function Jadijurnal3($kode_akun, $no_transaksi, $posisi_db, $nominal){
		$jurnal = array(
			'kode_akun'    => $kode_akun,
			'no_transaksi' => $no_transaksi,
			'tgl_jurnal'   => date('Y-m-d'),
			'posisi_db'    => $posisi_db,
			'nominal'      => $nominal,
		);
		$this->db->insert('jurnal', $jurnal);
	}	
	public function cari_jurnal(){
		if(isset($_POST['tgl_awal'], $_POST['tgl_akhir'])){
			$this->db->where('tgl_jurnal >=', $_POST['tgl_awal']);
			$this->db->where('tgl_jurnal <=', $_POST['tgl_akhir']);
		}
		$this->db->select('a.kode_akun, tgl_jurnal, nama_akun, a.posisi_db, nominal');
		$this->db->from('jurnal a');
		$this->db->join('akun b', 'b.kode_akun = a.kode_akun');
		$query = $this->db->get();	
		return $query->result_array();
	}
	public function tampilin_jurnal($start,$limit){
		$this->db->limit($limit,$start);
		
		$this->db->select('a.kode_akun, tgl_jurnal, nama_akun, a.posisi_db, nominal');
		$this->db->from('jurnal a');
		$this->db->join('akun b', 'b.kode_akun = a.kode_akun');
		$query = $this->db->get();	
		return $query->result_array();
	}
	public function HitungJumlahBaris(){
		$query= $this->db->get('jurnal');
		return $query->num_rows();
	}
	public function GetSaldoAkun($kode_akun){
		//mengambil data saldo akun
		$this->db->where('kode_akun', $kode_akun);
		return $this->db->get('akun')->row_array();
	}
	public function GetDataBukuBesar($kode_akun,$start,$limit){
		$this->db->limit($limit,$start);
		$this->db->where('a.kode_akun', $kode_akun);
		$this->db->select('a.kode_akun, tgl_jurnal, nama_akun, a.posisi_db, nominal');
		$this->db->from('jurnal a');
		$this->db->join('akun b', 'b.kode_akun = a.kode_akun');
		$this->db->order_by('no_transaksi');
		$this->db->order_by('kode_akun');
		$query = $this->db->get();	
		return $query->result_array();
	}
	public function cari($kode_akun,$bulan,$tahun){
		$sql = "SELECT a.kode_akun, tgl_jurnal, nama_akun, a.posisi_db, nominal FROM jurnal AS a JOIN akun AS b ON a.kode_akun = b.kode_akun WHERE MONTH(tgl_jurnal) = '$bulan' AND YEAR(tgl_jurnal) = '$tahun' AND b.kode_akun = '$kode_akun'";
		$query = $this->db->query($sql);	
		return $query->result_array();
	}
}