<?php 
class m_keuangan extends CI_model
{
	public function GenerateJurnal ($kode_akun, $id_transaksi, $posisi_dr_cr, $nominal)
	{
		$jurnal = array(
			'kode_akun' => $kode_akun,
			'id_transaksi' => $id_transaksi,
			'tgl_jurnal' => date('Y-m-d'),
			'posisi_dr_cr' => $posisi_dr_cr,
			'nominal' => $nominal,
			);
			$this->db->insert('jurnal',$jurnal);
			
	}
	
	//pagination
	public function HitungJumlahBaris(){
		$this->db->where('status' ,'selesai');
		$query = $this->db->get('transaksi');
		return $query->num_rows();
	}
	
	//ambildata untuk laporan keuangan persediaan
	/*public function GetDataLaporanPersediaan($start , $limit){
		$this->db->limit($limit, $start);
		return $this->db->get('transaksi')->result_array();
	}*/
	
	public function GetDataAkun()
	{
		return $this->db->get('akun')->result_array();
	}
	
	public function GetSaldoAkun($kode_akun)
	{
		$this->db->where('kode_akun', $kode_akun);
		return $this->db->get('akun')->row_array();
	}
	
	public function GetDataJurnal()
	{
		if(isset($_POST['tgl_awal'], $_POST ['tgl_akhir']))
		{
			$this->db->where('tgl_jurnal >=', $_POST['tgl_awal']);
			$this->db->where('tgl_jurnal <=', $_POST['tgl_akhir']);
		}
		$this->db->select('a.kode_akun, tgl_jurnal, nama_akun, a.posisi_dr_cr, nominal');
		$this->db->from('jurnal a');
		$this->db->join('akun b', 'b.kode_akun = a.kode_akun');
		$this->db->order_by('id_transaksi');
		$this->db->order_by('kode_akun');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	public function GetDataBukuBesar ($kode_akun)
	{
		$this->db->where('a.kode_akun', $kode_akun);
		$this->db->select('a.kode_akun, a.id_transaksi, tgl_jurnal, nama_akun, a.posisi_dr_cr, nominal');
		$this->db->from('jurnal a');
		$this->db->join('akun b', 'b.kode_akun = a.kode_akun');
		$this->db->order_by('id_transaksi');
		$this->db->order_by('kode_akun');
		$query = $this->db->get();
		return $query->result_array();
	}
}