<?php
	class m_akun extends CI_Model {
		
		public function AmbilDataAkun() {
			$query = $this->db->get('akun'); //get = SELECT
			return $query->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('kode_akun', $id);
		 	$query = $this->db->get('akun')->row_array();
		 	return $query;
		}
		public function get_one($id) {
			$param  =   array('kode_akun'=>$id);
        	return $this->db->get_where('akun',$param);
		}
		public function hapus($id) {
			$this->db->where('kode_akun',$id);
			$this->db->delete('akun');
 		}
	}