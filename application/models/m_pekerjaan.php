<?php
	class m_pekerjaan extends CI_Model {
		
		public function AmbilDataPekerjaan() {
			$query = $this->db->get('pekerjaan'); //get = SELECT
			return $query->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('kode_pekerjaan', $id);
		 	$query = $this->db->get('kode_pekerjaan')->row_array();
		 	return $query;
		}
		public function get_one($id) {
			$param  =   array('kode_pekerjaan'=>$id);
        	return $this->db->get_where('pekerjaan',$param);
		}
		public function edit($data,$id) {
	        $data = array(
	        	'kode_pekerjaan'	=> $this->input->post('kode_pekerjaan'),
	           	'nama_pekerjaan'  	=> $this->input->post('nama_pekerjaan'),
	           	'tarif'  			=> $this->input->post('tarif'),
	                    );
	        $this->db->where('kode_pekerjaan',$this->input->post('kode_pekerjaan'));
	        $this->db->update('pekerjaan',$data);
	    }
	    public function hapus($id)
 {
 $this->db->where('kode_pekerjaan',$id);
 $this->db->delete('pekerjaan');
 }
	}