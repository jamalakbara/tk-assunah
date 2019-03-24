<?php
class m_laporan extends ci_model{
	
	public function tampilkanao($sepatu) {
		$query = "SELECT ao., bbb.nominal, bahanbaku.satuan FROM bbb JOIN bahanbaku ON bbb.id_bb = bahanbaku.nama_bb WHERE bbb.kode_sepatu = '$sepatu' ";
		return $this->db->query($query)->result_array();
	}
	public function tampilkankjk($sepatu) {
		$query = "SELECT * FROM kjk WHERE kode_sepatu = '$sepatu' ";
		return $this->db->query($query)->result_array();
	}
	public function tampilkankjm($sepatu) {
		$query = "SELECT * FROM kjm WHERE kode_sepatu = '$sepatu' ";
		return $this->db->query($query)->result_array();
	}
	public function HitungJumlahBaris(){
		$query = $this->db->get('kjk');
		$query = $this->db->get('kjm');
		$query = $this->db->get('bbb');
		return $query->num_rows();
	}
	public function GetDataLRA($start, $limit){
		$this->db->limit($limit, $start);
		return $this->db->get('kjk', 'kjm', 'bbb')->result_array();
	}
	/*public function makanan_perhari() {
		$query = "SELECT nama_menu, tanggal_transaksi, harga_menu, SUM(subtotal) AS total, sum(jumlah) terjual FROM `detail_pnjualan` JOIN menu ON detail_pnjualan.id_menu = menu.id_menu
		JOIN transaksi ON transaksi.no_transaksi = detail_pnjualan.no_transaksi WHERE menu.jenis_menu = 'Makanan' GROUP BY (nama_menu),(tanggal_transaksi) ORDER BY total DESC";
		return $this->db->query($query)->result_array();
	}*/
	public function GetBiayaProduksi(){
		$biayaproduksi=$this->db->query("SELECT sum(kjk.tarif) + sum(kjm.tarif) + sum(bbb.nominal) AS 'produksi' FROM kjk JOIN kjm on kjk.kode_sepatu=kjm.kode_sepatu JOIN bbb ON kjm.kode_sepatu=bbb.kode_sepatu");

		

		if($biayaproduksi->num_rows() > 0){
			foreach ($biayaproduksi->result() as $data) {
				$value1[] = $data;
				# code...
			}
			return $value1;
		}
		
	}
	public function GetAO(){
		$ao=$this->db->query("SELECT ao.nama_ao, sum(ao.nominal) AS 'operasional' FROM ao");

		if($ao->num_rows() > 0){
			foreach ($ao->result() as $data) {
				$value2[] = $data;
				# code...
			}
			return $value2;
		}
	}
	/*public function GetSaldoAkun($no_akun){
		//mengambil data saldo akun
		$this->db->where('no_akun', $no_akun);
		return $this->db->get('coa')->row_array();
	}
	
	
	public function GetDataJurnal(){
		if(isset($_POST['tgl_awal'], $_POST['tgl_akhir'])){
			$this->db->where('tgl_jurnal >=', $_POST['tgl_awal']);
			$this->db->where('tgl_jurnal <=', $_POST['tgl_akhir']);
		}
		$this->db->select('a.no_akun, tgl_jurnal, nama_akun, a.posisi_dr_cr, nominal');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'b.no_akun = a.no_akun');
		$this->db->order_by('no_transaksi');
		$this->db->order_by('no_akun');
		$query = $this->db->get();	
		return $query->result_array();
	}
	
	/* public function GetDataBukuBesar($no_akun){
		$this->db->where('a.no_akun', $no_akun);
		$this->db->select('a.no_akun, tgl_jurnal, nama_akun, a.posisi_dr_cr, nominal');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'b.no_akun = a.no_akun');
		$this->db->order_by('no_transaksi');
		$this->db->order_by('no_akun');
		$query = $this->db->get();	
		return $query->result_array();
	} */
	/*public function GetDataBukuBesar($no_akun,$bulan,$tahun){
		$query   = 
		"SELECT coa.no_akun, jurnal.tgl_jurnal, coa.nama_akun, jurnal.posisi_dr_cr, jurnal.nominal 
		 FROM jurnal JOIN coa
		 ON coa.no_akun = jurnal.no_akun
		 WHERE coa.no_akun = '".$no_akun."'
		 AND tgl_jurnal LIKE '".$tahun."_".$bulan."___'
		 ORDER BY no_transaksi, no_akun";
		 $hasil = $this->db->query($query);	
		 return $hasil->result_array();
	}
	public function getbulan(){
		$sql="SELECT DISTINCT MONTH(tgl_jurnal) as bln, MONTHNAME(tgl_jurnal) as bulan FROM jurnal";
		return $this->db->query($sql)->result_array();
	}
   public function gettahun(){
   	$sql="SELECT DISTINCT YEAR(tgl_jurnal) as tahun FROM jurnal";
   	return $this->db->query($sql)->result_array();
   }

   public function cari_bukubesar($no_akun,$bulan,$tahun){
   	$sql="SELECT no_transaksi,jurnal.no_akun,tgl_jurnal,nama_akun,posisi_dr_cr,nominal FROM jurnal join coa
   	on jurnal.no_akun=coa.no_akun where jurnal.no_akun = '$no_akun' AND MONTH(tgl_jurnal)='$bulan' AND YEAR(tgl_jurnal)='$tahun'
   	ORDER BY no_transaksi AND jurnal.no_akun";
   	return $this->db->query($sql)->result_array();
   }*/




}
