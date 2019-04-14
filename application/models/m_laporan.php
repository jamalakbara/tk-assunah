<?php
class m_laporan extends ci_model{
	
	public function getDataAnggaranPendapatan(){
		$this->db->select('akun.nama_akun, d.total');
		$this->db->from('akun');
		$this->db->join('detail_anggaran d', 'd.kode_akun = akun.kode_akun');
		$this->db->like('akun.nama_akun', 'Pendapatan');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getDataTotalPendapatan(){
		$this->db->select('SUM(d.total) AS total');
		$this->db->from('akun');
		$this->db->join('detail_anggaran d', 'd.kode_akun = akun.kode_akun');
		$this->db->like('akun.nama_akun', 'Pendapatan');
		$query = $this->db->get()->row()->total;
		return $query;
	}

	public function getDataAnggaranBeban(){
		$this->db->select('akun.nama_akun, SUM(d.total) AS total');
		$this->db->from('akun');
		$this->db->join('detail_anggaran d', 'd.kode_akun = akun.kode_akun');
		$this->db->like('akun.nama_akun', 'Beban');
		$this->db->group_by('akun.kode_akun');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getDataTotalBeban(){
		$this->db->select('SUM(d.total) AS total');
		$this->db->from('akun');
		$this->db->join('detail_anggaran d', 'd.kode_akun = akun.kode_akun');
		$this->db->like('akun.nama_akun', 'Beban');
		$query = $this->db->get()->row()->total;
		return $query;
	}

	public function getRealisasiSPP(){
		$this->db->select('SUM(jumlah) AS total');
		$this->db->from('spp');
		$this->db->where('status', 'Sudah Lunas');
		$this->db->like('bulan', date('Y'), 'before');
		$query = $this->db->get()->row()->total;
		return $query;
	}

	public function getRealisasiPendaftaran(){
		$this->db->select('SUM(total) AS total');
		$this->db->from('pendaftaran');
		$this->db->where('status', 'Lunas');
		$this->db->like('tgl_daftar', date('Y'));
		$query = $this->db->get()->row()->total;
		return $query;
	}

	public function getRealisasiBeban($nama_akun){
		$query = $this->db->query("SELECT SUM(a.total) AS total FROM detail_transbeban a JOIN akun b ON a.kode_akun = b.kode_akun WHERE a.tgl_trans LIKE '%".date('Y')."%' AND b.nama_akun = '".$nama_akun."' GROUP BY a.kode_akun");
		// $this->db->select('SUM(a.total) AS total');
		// $this->db->from('detail_transbeban a');
		// $this->db->like('a.tgl_trans', date('Y'));
		// $this->db->where('b.nama_akun', 'Beban ATK');
		// $this->db->join('akun b', 'a.kode_akun = a.kode_akun');
		// $this->db->group_by('b.kode_akun');
		// $query = $this->db->get();
		if ($query->num_rows() == 0){
			return 0;
		}else{
			return $query->row()->total;
		}
	}
}
