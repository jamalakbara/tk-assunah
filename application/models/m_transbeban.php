<?php
class m_transbeban extends ci_model{
	
  public function AmbilNoTransaksi(){
    $this->db->where('keterangan', 'Penginputan Data Belum Selesai');
		$query = $this->db->get('transbeban');
		if($query->num_rows() == 0){
			$this->db->select_max('no_trans');
			$no_trans = $this->db->get('transbeban')->row()->no_trans;
			$no_trans = $no_trans + 1;
			$input 		  = array(
								'no_trans' => $no_trans,
								'tgl_trans' => '0000-00-00',
								'total' => 0,
								'keterangan' => 'Penginputan Data Belum Selesai'
							);
			$this->db->insert('transbeban', $input);
		}else{
			$no_trans = $query->row()->no_trans;
		}
		return $no_trans;
	}
	public function GetDataTransaksi(){
	  	return $this->db->get('transbeban')->result_array();
	}

	public function cari($text=''){
	  	if($text != ''){
	   		$sql = "SELECT * FROM transbeban where no_trans LIKE ".$text."";
	   		$query = $this->db->query($sql);
	   		return $query->result_array();
	  	}else
	  		return array();
	}
	public function GetDataAkun(){
	  	return $this->db->get('akun')->result_array();
	}

	public function getID_transbeban($id){
		$this->db->where('no_trans',$id);
		return $this->db->get('transbeban');
	}
	 
	public function GetDataDetailTransaksi($id){
	  	//mengambil data deatail transaksi/ daftar belanja
	  	$this->db->select('no_trans, a.kode_akun, nama_akun, total, total');
	  	$this->db->from('detail_transbeban a');
	  	$this->db->join('akun b', 'b.kode_akun = a.kode_akun');
	  	$this->db->where('no_trans', $id);
	  	$query = $this->db->get(); 
	  	return $query->result_array();
	}
	 
	public function InsertDetail(){
	  
	  	//insert ke detail_transbeban
	  	$this->db->where(array('no_trans' => $_POST['no_trans'], 'kode_akun' => $_POST['kode_akun']));
	  	$query = $this->db->get('detail_transbeban');
	  
	  	if($query->num_rows() == 0){
	  		$detail['no_trans'] = $this->input->post('no_trans');
	  		$detail['kode_akun']    = $this->input->post('kode_akun');
	  		$detail['total'] = $this->input->post('total');
	   		$this->db->insert('detail_transbeban', $detail);

	  	}else{
	  		$kode_akun 				= $this->input->post('kode_akun');
	  		//$detail['jumlah_hadir'] = $this->input->post('jumlah_hadir');

	   		$this->db->where(array('no_trans' => $_POST['no_trans'], 'kode_akun' => $_POST['kode_akun']))
	   				->SET('total', $query->row()->total+$this->input->post('total'))
	   				 ->update('detail_transbeban');
	  	}
	}
	 
	public function GetTotalTransaksi($id){
	  	//mengambil total transaksi
	  	$this->db->select('SUM(total) AS total')
	  			 ->where('no_trans', $id)
	  			 ->join('akun','akun.kode_akun = detail_transbeban.kode_akun');
	  	return $this->db->get('detail_transbeban')->row_array()['total'];
	}
	 
	public function SelesaiTransaksi($id){
	  	//mengambil total transaksi
	  	$nominal = $this->m_transbeban->GetTotalTransaksi($id);
	  
	  	//update data transaksi
	  	$this->db->set('tgl_trans', date('y-m-d'));
	  	$this->db->set('total', $nominal, FALSE);
	  	$this->db->set('keterangan', 'Selesai');
	  	$this->db->where('no_trans', $id);
	  	$this->db->update('transbeban');
	}
	public function hapus($id, $id_k){
	    $this->db->where(array('no_trans'=>$id, 'kode_akun'=>$id_k));
	    $this->db->delete('detail_transbeban');
   }
}