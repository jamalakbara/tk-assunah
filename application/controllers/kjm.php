<?php
    class kjm extends CI_Controller {
		
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_kjm() {
			$data['id_pegawai'] = $this->m_pegawai->AmbilDataPegawai();
			$this->template->load('template', 'kjm/form_kjm', $data);
		}
		public function lihat_kjm() {
			$data['result'] = $this->m_kjm->AmbilDataKJKM();
			$this->template->load('template', 'kjm/view_kjm', $data);
		}
		public function simpan_kjm() {
			$config = array(
								array(
										'field' => 'id_kjm',
										'label' => 'ID Kartu Jam Mesin',
										'rules' => 'required|is_unique[kjm.id_kjm]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'is_unique'     => "".$_POST['id_kjk']."Data Sudah Ada Di Database"
													)
								),
								array(
										'field' => 'id_pegawai',
										'label' => 'ID Pegawai',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !',
													)
								),
								array(
										'field' => 'tgl_kjm',
										'label' => 'Tanggal Kartu Jam Mesin',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong'
													)
								)
							);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'kjm/form_kjm');
			} else {
				$this->db->insert('kjm', $_POST);
				redirect('kjm/lihat_kjm');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $id_kjm     		=   $this->input->post('id_kjm');
	            $id_pegawai   		=   $this->input->post('id_pegawai');
	            $tgl_kjm  			=   $this->input->post('tgl_kjm');
	            $data           = array('tgl_kjm'=>$tgl_kjm);
	            $this->m_kjm->edit($data,$id);
	            redirect('kjm/lihat_kjm');
	        }
	        else {
	            $id=  $this->uri->segment(3);
	            $this->load->model('m_kjm');
	            $data['id_pegawai'] = $this->m_pegawai->AmbilDataPegawai();
	            $data['result']    =  $this->m_kjk->AmbilDataKJM();
	            $data['result']    =  $this->m_kjk->get_one($id)->row_array();
	            $this->template->load('template','kjm/edit_kjm',$data);
	        }
    	}
    	public function hapus() {
			$id= $this->uri->segment(3);
			$this->m_jabatan->hapusitem($id);
			redirect('kjm/lihat_kjm');
		} 
	}