<?php
	class m_datasiswa extends CI_Model {
		
		public function AmbilDataSiswa() {
			$query = "SELECT nis, nama_siswa, tempat_lahir, tgl_lahir, gender, nama_ortu FROM datasiswa GROUP BY nis ORDER BY nis"; //get = SELECT
			return $this->db->query($query)->result_array();
		}
		public function getdataupdate($id) {
		 	$this->db->where('nis', $id);
		 	$query = $this->db->get('datasiswa')->row_array();
		 	return $query;
		}
		public function get_one($id) {
			$param  =   array('nis'=>$id);
        	return $this->db->get_where('datasiswa',$param);
		}
		public function edit($data,$id) {
	        $data = array(
	        	'nis'  => $this->input->post('nis'),
	           	'nama_siswa'  => $this->input->post('nama_siswa'),
	           	'tempat_lahir'  => $this->input->post('tempat_lahir'),
	           	'tgl_lahir'  => $this->input->post('tgl_lahir'),
	           	'gender'  => $this->input->post('gender'),
	           	'nama_ortu'  => $this->input->post('nama_ortu'),
	    
	                    );
	        $this->db->where('nis',$this->input->post('nis'));
	        $this->db->update('datasiswa',$data);
	    }
	    
	    public function hapus($id)
		{
		$this->db->where('nis',$id);
		$this->db->delete('datasiswa');
		}
		 
	}