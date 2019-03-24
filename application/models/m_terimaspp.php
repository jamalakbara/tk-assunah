<?php
	class m_terimaspp extends CI_Model {
		
		public function AmbilDataTerima() {
			$query = "SELECT terima_spp.no_terima, terima_spp.tgl_terima, terima_spp.jumlah_terima, spp.no_spp FROM terima_spp JOIN spp ON terima_spp.no_spp=spp.no_spp";
			return $this->db->query($query)->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('no_terima', $id);
		 	$query = $this->db->get('terima_spp')->row_array();
		 	return $query;
		}
		public function simpanterima(){
			

			$datasiswa = $this->db->get_where('datasiswa', array('nis' => $this->input->post('nis')))->row_array();	
			$spp = $this->db->get_where('spp', array('no_spp' => $this->input->post('no_spp')))->row_array();			

			$query = array(
				'no_terima'  => $this->input->post('no_terima'),
	           	'no_spp'  => $spp['no_spp'],
				'tgl_terima'  => date('y-m-d'),
				'jumlah_terima'  => $this->input->post('jumlah_terima'),
	           );
			$this->db->insert('terima_spp', $query);

		}

		public function get_one($id) {
			$param  =   array('no_terima'=>$id);
        	return $this->db->get_where('terima_spp',$param);
		}
		public function edit($data,$id) {
	        $data = array(
				'tgl_terima'  => date('y-m-d'),
				'jumlah_terima'  => $this->input->post('jumlah_terima'),
	    
	                    );
	        $this->db->where('no_terima',$this->input->post('no_terima'));
	        $this->db->update('terima_spp',$data);
	    }
	    public function hapus($id)
 		{
 			$this->db->where('id_kjk',$id);
 			$this->db->delete('kjk');
 		}
 		public function lunas($id){
 			$this->db->where('no_spp', $id);
 			$this->db->set('status', 'Sudah Lunas');
 			$this->db->update('spp');
 		}
	}