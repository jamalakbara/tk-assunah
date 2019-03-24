<?php
class m_pendaftaran extends ci_model{
    
  public function AmbilNoDaftar(){
    $this->db->where('keterangan', 'Penginputan Data Belum Selesai');
		$query = $this->db->get('pendaftaran');
		if($query->num_rows() == 0){
			$this->db->select_max('no_pendaftaran');
			$no_pendaftaran = $this->db->get('pendaftaran')->row()->no_pendaftaran;
			$no_pendaftaran = $no_pendaftaran + 1;
			$input 		  = array(
								'no_pendaftaran' => $no_pendaftaran,
								'nama_siswa' => '-',
								'tgl_daftar' => '0000-00-00',
								'total' => 0,
								'status' => 'Belum Lunas',
								'keterangan' => 'Penginputan Data Belum Selesai'
							);
			$this->db->insert('pendaftaran', $input);
		}else{
			$no_pendaftaran = $query->row()->no_pendaftaran;
		}
		return $no_pendaftaran;
	}
	public function AmbilDataSPP() {
	   $query = $this->db->get('pendaftaran');
	   return $query->result_array();
  	}
 	 public function GetDataRincian(){
			$this->db->where('jenis_rincian', 'Pendaftaran Murid Baru');
	  	return $this->db->get('rincian')->result_array();
	}

	public function getID_daftar($id){
		$this->db->where('no_pendaftaran',$id);
		return $this->db->get('pendaftaran');
	}

  public function getdataupdate($id) {
    $this->db->where('no_pendaftaran', $id);
    $query = $this->db->get('pendaftaran')->row_array();
    return $query;
  }
  public function get_one($id) {
   $param  =   array('no_pendaftaran'=>$id);
         return $this->db->get_where('pendaftaran',$param);
  }

  public function simpandaftar(){
   $rincian = $this->db->get_where('rincian', array('no_rincian' => $this->input->post('no_rincian')))->row_array();

   $query = array(
             'nama_siswa'  =>  $this->input->post('jumlah'),
             'nama_rincian' => $rincian['nama_rincian'],
             'total'  => $this->input->post('total'),
     
             'status' => 'Belum Lunas'
            );
   $this->db->insert('pendaftaran', $query);
  }

  // public function InsertDetail(){
	  
	//   	//insert ke detail_daftar
	//   	$this->db->where(array('no_pendaftaran' => $_POST['no_pendaftaran']));
	//   	$query = $this->db->get('detail_daftar');
	  
	  	
	//   		// $detail['no_pendaftaran'] = $this->input->post('no_pendaftaran');
	//   		// $detail['total'] = $this->input->post('total');
	// 			//  $this->db->insert('detail_daftar', $detail);
	// 			//  $input = array(
	// 			// 	'no_pendaftaran' => $this->input->post('no_pendaftaran'),
	// 			// 	'status' => 'Penginputan Data Belum Selesai'
	// 			// );
	// 			// $this->db->insert('pendaftaran', $input);

	  	
	//   		//$no_rincian 				= $this->input->post('no_rincian');
	// 			//$detail['jumlah_hadir'] = $this->input->post('jumlah_hadir');
	// 			$data = array(
	// 				'no_pendaftaran' => $this->input->post('no_pendaftaran'),
	// 				'nama_siswa' => $this->input->post('nama_siswa'),
	// 				'tgl_daftar' => $this->input->post('tgl_daftar'),
	// 				'no_rincian' => $this->input->post('rincian'),
	// 				'total' => $this->input->post('total')
	// 			);
	// 			$this->db->insert('detail_daftar', $data);
	// 			$this->db->query('UPDATE pendaftaran a, detail_daftar b SET a.nama_siswa ="'.$this->input->post("namasiswa"). '"WHERE a.no_pendaftaran = "'.$this->input->post("no_pendaftaran").'"');

	//    		// $this->db->where(array('no_pendaftaran' => $_POST['no_pendaftaran']))
	//    		// 		->SET('total', $query->row()->total+$this->input->post('total'))
	//    		// 		 ->update('detail_daftar');
	  	
	// }

  public function GetDataDaftar(){
	  	return $this->db->get('pendaftaran')->result_array();
	}
  public function GetDataDetailDaftar(){
			//mengambil data deatail transaksi/ daftar belanja
			$this->db->select_max('no_rincian');
	  	$this->db->where('jenis_rincian', 'Pendaftaran Murid Baru');
			$id = $this->db->get('rincian')->row()->no_rincian;

	  	$this->db->where('no_rincian', $id);
	  	$query = $this->db->get('detail_rincian'); 
	  	return $query->result_array();
	}
	
  public function GetTotalDaftar($id){
	  	//mengambil total transaksi
	  	$this->db->select('SUM(total) AS total')
	  			 ->where('no_pendaftaran', $id)
	  			 ->join('rincian','rincian.no_rincian = detail_daftar.no_rincian');
	  	return $this->db->get('detail_daftar')->row_array()['total'];
	}
  public function view_bayar($start,$limit) {
 		$this->db->limit($limit,$start);
 		$this->db->where(array('status' => 'Belum Lunas', 'keterangan' => 'Selesai'));
 		return $this->db->get('pendaftaran')->result_array();
 	}
  public function mau_bayar($id) {
		$this->db->set('status', 'Lunas');
		$this->db->where('no_pendaftaran', $id);
		$this->db->update('pendaftaran');
 	}
 	public function beneran_selesai(){
 		$this->db->where('no_pendaftaran', $this->input->post('no_pendaftaran'));
 		$this->db->set('status', 'Sudah Lunas');
 		$this->db->update('no_pendaftaran');
 		return $this->db->get('no_pendaftaran')->result_array();
 	}
 	public function HitungJumlahBaris(){
		$query= $this->db->get('pendaftaran');
		return $query->num_rows();
	}


  /*public function edit($data,$id) {
         $data = array(
         
             'nama_siswa'  => $datasiswa['nama_siswa'],
             'jumlah'  => $this->input->post('jumlah'),
     
                     );
         $this->db->where('no_spp',$this->input->post('no_spp'));
         $this->db->update('spp',$data);
     }*/
     public function hapus($id)
   {
    $this->db->where(array('no_pendaftaran'=>$id, 'no_rincian'=>$id_k));
	    $this->db->delete('detail_daftar');
	 }
	 public function SelesaiDaftar($id, $inpoet){
		//mengambil total rincian
		$this->db->insert('datasiswa', $inpoet);
		$this->db->select_max('no_rincian');
		$this->db->where('jenis_rincian', 'Pendaftaran Murid Baru');
		$rincian = $this->db->get('rincian')->row()->no_rincian;
		$nominal = $this->m_rincian->GetTotalRincian($rincian);
		$nama_siswa = $this->input->post('nama_siswa');
		$tgl_daftar = $this->input->post('tgl_daftar');
	
		//update data rincian
		$this->db->set('nama_siswa', $nama_siswa);
		$this->db->set('tgl_daftar', $tgl_daftar);
		$this->db->set('total', $nominal, FALSE);
		$this->db->set('keterangan', 'Selesai');
		$this->db->where('no_pendaftaran', $id);
		$this->db->update('pendaftaran');
		}
 }