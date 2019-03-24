<?php
	class m_rincian extends CI_Model {
		
		public function AmbilDataRincian() {
			$query = $this->db->get('rincian'); //get = SELECT
			return $query->result_array();
		}
		public function AmbilNoRincian(){
			$this->db->where('keterangan', 'Penginputan Data Belum Selesai');
			$query = $this->db->get('rincian');
			if($query->num_rows() == 0){
				$this->db->select_max('no_rincian');
				$no_rincian = $this->db->get('rincian')->row()->no_rincian;
				$no_rincian = $no_rincian + 1;
				$input 		  = array(
									'no_rincian' => $no_rincian,
									'total' => 0,
									'keterangan' => 'Penginputan Data Belum Selesai'
								);
				$this->db->insert('rincian', $input);
			}else{
				$no_rincian = $query->row()->no_rincian;
			}
			return $no_rincian;
		}
		public function GetDataRincian(){
			return $this->db->get('rincian')->result_array();
	  	}
		public function getdataupdate($id) {
		 	$this->db->where('no_rincian', $id);
		 	$query = $this->db->get('rincian')->row_array();
		 	return $query;
		}
		public function InsertDetail(){
			//insert ke detail_rincian
			$this->db->where('no_rincian', $_POST['no_rincian']);
			$query = $this->db->get('rincian');
		
			if($query->num_rows() == 0){
				$detail['no_rincian'] = $this->input->post('no_rincian');
				$detail['total'] = $this->input->post('total');
				$this->db->insert('detail_rincian', $detail);
				$input = array(
					'no_rincian' => $this->input->post('no_rincian'),
					'jenis_rincian' => $this->input->post('jenis_rincian'),
					'keterangan' => 'Penginputan Data Belum Selesai'
				);
				$this->db->insert('rincian', $input);
			}else{
				// $kode_akun = $this->input->post('kode_akun');
				//$detail['jumlah_hadir'] = $this->input->post('jumlah_hadir');
				$data = array(
					'no_rincian' => $this->input->post('no_rincian'),
					'nama_rincian' => $this->input->post('nama_rincian'),
					'total' => $this->input->post('biaya_rincian')
				);
				$this->db->insert('detail_rincian', $data);
				$this->db->query('UPDATE rincian a, detail_rincian b SET a.jenis_rincian ="'.$this->input->post("jenis_rincian"). '"WHERE a.no_rincian = "'.$this->input->post("no_rincian").'"');
				//  $this->db->where(array('no_rincian' => $_POST['no_rincian']))
				// 		 ->SET('total', $query->row()->total+$this->input->post('total'))
				// 		  ->update('detail_rincian');
			}
		}
		public function GetTotalRincian($id){
			//mengambil total rincian
			$this->db->select('SUM(detail_rincian.total) AS total')
					 ->where('detail_rincian.no_rincian', $id)
					 ->join('rincian','rincian.no_rincian = detail_rincian.no_rincian');
			return $this->db->get('detail_rincian')->row_array()['total'];
		}  

		public function GetDataDetailRincian($id){
			//mengambil data deatail transaksi/ daftar belanja
			$this->db->select('a.no_rincian, b.jenis_rincian, a.nama_rincian, a.total AS biaya_rincian, b.keterangan');
			$this->db->from('detail_rincian a');
			$this->db->join('rincian b', 'b.no_rincian = a.no_rincian');
			$this->db->where('a.no_rincian', $id);
			$query = $this->db->get(); 
			return $query->result_array();
	  	}
		public function get_one($id) {
			$param  =   array('no_rincian'=>$id);
        	return $this->db->get_where('rincian',$param);
		}
		public function edit($data,$id) {
	        $data = array(
	        	'no_rincian'  => $this->input->post('no_rincian'),
	           	'jenis_rincian'  => $this->input->post('jenis_rincian'),
	           	'nama_rincian'  => $this->input->post('nama_rincian'),
	           	'biaya_rincian'  => $this->input->post('biaya_rincian'),
	    
	                    );
	        $this->db->where('no_rincian',$this->input->post('no_rincian'));
	        $this->db->update('rincian',$data);
	    }
	    public function hapus($id)
		{
			$this->db->where('no_rincian',$id);
			$this->db->delete('rincian');
		}
		public function SelesaiRincian($id){
			//mengambil total rincian
			$nominal = $this->m_rincian->GetTotalRincian($id);
		
			//update data rincian
			$this->db->set('total', $nominal, FALSE);
			$this->db->set('keterangan', 'Selesai');
			$this->db->where('no_rincian', $id);
			$this->db->update('rincian');
		  }
		  public function getID_rincian($id){
			$this->db->where('no_rincian',$id);
			return $this->db->get('rincian');
		}
	}