<?php
	class m_bahanbaku extends CI_Model {
		
		public function AmbilDataBahanbaku() {
			$query = $this->db->get('bahanbaku'); //get = SELECT
			return $query->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('id_bb', $id);
		 	$query = $this->db->get('bahanbaku')->row_array();
		 	return $query;
		}
		public function get_one($id) {
			$param  =   array('id_bb'=>$id);
        	return $this->db->get_where('bahanbaku',$param);
		}
		public function edit($data,$id) {
	        $data = array(
	        	'id_bb'  => $this->input->post('id_bb'),
	           	'nama_bb'  => $this->input->post('nama_bb'),
	           	'jumlah'  => $this->input->post('jumlah'),
	           	'satuan' => $this->input->post('satuan'),
	    
	                    );
	        $this->db->where('id_bb',$this->input->post('id_bb'));
	        $this->db->update('bahanbaku',$data);
	    }
	    public function hapus($id)
 {
 $this->db->where('id_bb',$id);
 $this->db->delete('bahanbaku');
 }
	}