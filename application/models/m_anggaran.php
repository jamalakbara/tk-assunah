<?php
class m_anggaran extends ci_model{
	
    public function AmbilNoAO(){
    $this->db->where('ket', 'Penginputan Data Belum Selesai');
		$query = $this->db->get('anggaran');
		if($query->num_rows() == 0){
			$this->db->select_max('no_anggaran');
			$no_anggaran = $this->db->get('anggaran')->row()->no_anggaran;
			$no_anggaran = $no_anggaran + 1;
			$input 		  = array(
								'no_anggaran' => $no_anggaran,
								'periode' => date('M'),
								'total' => 0,
								'ket' => 'Penginputan Data Belum Selesai'
							);
			$this->db->insert('anggaran', $input);
		}else{
			$no_anggaran = $query->row()->no_anggaran;
		}
		return $no_anggaran;
	}
	public function GetDataAnggaran(){
	  	return $this->db->get('anggaran')->result_array();
	}

	public function cari($text=''){
	  	if($text != ''){
	   		$sql = "SELECT * FROM anggaran where no_anggaran LIKE ".$text."";
	   		$query = $this->db->query($sql);
	   		return $query->result_array();
	  	}else
	  		return array();
	}
	public function GetDataAkun(){
			return $this->db->query('SELECT * FROM akun WHERE nama_akun LIKE "%Beban%" OR nama_akun LIKE "%Pendapatan%"')->result_array();
			// $this->db->like('nama_akun','Beban');
	  	// return $this->db->get('akun')->result_array();
	}

	public function getID_anggaran($id){
		$this->db->where('no_anggaran',$id);
		return $this->db->get('anggaran');
	}
	 
	public function GetDataDetailAO($id){
	  	//mengambil data deatail transaksi/ daftar belanja
	  	$this->db->select('no_anggaran, a.kode_akun, periode, nama_akun, total, total');
	  	$this->db->from('detail_anggaran a');
	  	$this->db->join('akun b', 'b.kode_akun = a.kode_akun');
	  	$this->db->where('no_anggaran', $id);
	  	$query = $this->db->get(); 
	  	return $query->result_array();
	}
	 
	public function InsertDetail(){
	  
	  	//insert ke detail_transbeban
	  	$this->db->where(array('no_anggaran' => $_POST['no_anggaran'], 'kode_akun' => $_POST['kode_akun']));
	  	$query = $this->db->get('detail_anggaran');
	  
	  	if($query->num_rows() == 0){
	  		$detail['no_anggaran'] = $this->input->post('no_anggaran');
	  		$detail['kode_akun']    = $this->input->post('kode_akun');
	  		$detail['total'] = $this->input->post('total');
	  		$detail['periode'] = date('Y-m-d');
	   		$this->db->insert('detail_anggaran', $detail);

	  	}else{
	  		$kode_akun 				= $this->input->post('kode_akun');
	  		//$detail['jumlah_hadir'] = $this->input->post('jumlah_hadir');

	   		$this->db->where(array('no_anggaran' => $_POST['no_anggaran'], 'kode_akun' => $_POST['kode_akun']))
	   				->SET('total', $query->row()->total+$this->input->post('total'))
	   				 ->update('detail_anggaran');
	  	}
	}
	 
	public function GetTotalAO($id){
	  	//mengambil total transaksi
	  	$this->db->select('SUM(total) AS total')
	  			 ->where('no_anggaran', $id)
	  			 ->join('akun','akun.kode_akun = detail_anggaran.kode_akun');
	  	return $this->db->get('detail_anggaran')->row_array()['total'];
	}
	 
	public function SelesaiAO($id){
	  	//mengambil total transaksi
	  	$nominal = $this->m_anggaran->GetTotalAO($id);
	  
	  	//update data transaksi
	  	$this->db->set('periode', date('Y-m-d'));
	  	$this->db->set('total', $nominal, FALSE);
	  	$this->db->set('ket', 'Selesai');
	  	$this->db->where('no_anggaran', $id);
	  	$this->db->update('anggaran');
	}
	public function hapus($id, $id_k){
	    $this->db->where(array('no_anggaran'=>$id, 'kode_akun'=>$id_k));
	    $this->db->delete('detail_anggaran');
   }
}