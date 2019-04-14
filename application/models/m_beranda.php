<?php
class m_beranda extends ci_model{
	
    public function GetDataGrafikAnggaran(){
        $this->db->select('akun.nama_akun, SUM(d.total) AS total');
		$this->db->from('akun');
		$this->db->join('detail_anggaran d', 'd.kode_akun = akun.kode_akun');
		$this->db->like('akun.nama_akun', 'Beban');
		$this->db->group_by('akun.kode_akun');
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function GetDataGrafikPengeluaran($nama_akun){
        $query = $this->db->query("SELECT SUM(a.total) AS total FROM detail_transbeban a JOIN akun b ON a.kode_akun = b.kode_akun WHERE a.tgl_trans LIKE '%".date('Y')."%' AND b.nama_akun = '".$nama_akun."' GROUP BY a.kode_akun");
		if ($query->num_rows() == 0){
			return 0;
		}else{
			return $query->row()->total;
		}
    }
}