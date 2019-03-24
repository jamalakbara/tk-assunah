<?php
	class m_sepatu extends CI_Model {
		
		public function AmbilDataSepatu() {
			$query = $this->db->get('sepatu'); //get = SELECT
			return $query->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('kode_sepatu', $id);
		 	$query = $this->db->get('sepatu')->row_array();
		 	return $query;
		}
		public function get_one($id) {
			$param  =   array('kode_sepatu'=>$id);
        	return $this->db->get_where('sepatu',$param);
		}
		public function edit($data,$id) {
	        $data = array(
	        	'id_bb'  => $this->input->post('kode_sepatu'),
	           	'jenis_sepatu'  => $this->input->post('jenis_sepatu'),
	           	'ket'  => $this->input->post('ket'),
	    
	                    );
	        $this->db->where('kode_sepatu',$this->input->post('kode_sepatu'));
	        $this->db->update('sepatu',$data);
	    }
	    public function hapus($id)
 {
 $this->db->where('kode_sepatu',$id);
 $this->db->delete('sepatu');
 }
	}