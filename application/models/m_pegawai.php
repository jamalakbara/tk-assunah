<?php
	class m_pegawai extends CI_Model {
		
		public function AmbilDataPegawai() {
			$query = $this->db->get('pegawai'); //get = SELECT
			return $query->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('id_pegawai', $id);
		 	$query = $this->db->get('pegawai')->row_array();
		 	return $query;
		}
		public function get_one($id) {
			$param  =   array('id_pegawai'=>$id);
        	return $this->db->get_where('pegawai',$param);
		}
		public function edit($data,$id) {
	        $data = array(
	        	'id_pegawai'  => $this->input->post('id_pegawai'),
	           	'nama_pegawai'  => $this->input->post('nama_pegawai'),
	           	'gender'  => $this->input->post('gender'),
	           	'alamat' => $this->input->post('alamat'),
	           	'no_hp'       => $this->input->post('no_hp'),
	    
	                    );
	        $this->db->where('id_pegawai',$this->input->post('id_pegawai'));
	        $this->db->update('pegawai',$data);
	    }
	    public function hapus($id)
 {
 $this->db->where('id_pegawai',$id);
 $this->db->delete('pegawai');
 }
	}