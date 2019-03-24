<?php
	class m_kjk extends CI_Model {
		
		public function AmbilDataKJK() {
			$this->db->select('id_kjk, id_pegawai, tgl_kjk, total_produksi, b.jenis_sepatu');
			$this->db->from('kjk a');
			$this->db->join('sepatu b', 'a.jenis_sepatu=b.kode_sepatu', 'left');
			$query = $this->db->get(); //get = SELECT
			return $query->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('id_kjk', $id);
		 	$query = $this->db->get('kjk')->row_array();
		 	return $query;
		}
		public function get_one($id) {
			$param  =   array('id_kjk'=>$id);
        	return $this->db->get_where('kjk',$param);
		}
		public function edit($data,$id) {
	        $data = array(
	        	'id_kjk'  => $this->input->post('id_kjk'),
	           	'tgl_kjk'  => $this->input->post('tgl_kjk'),
	           	'total_produksi'  => $this->input->post('total_produksi'),
	           	'jenis_sepatu' => $this->input->post('jenis_sepatu')
	    
	                    );
	        $this->db->where('id_kjk',$this->input->post('id_kjk'));
	        $this->db->update('kjk',$data);
	    }
	    public function hapus($id)
 {
 $this->db->where('id_kjk',$id);
 $this->db->delete('kjk');
 }
	}