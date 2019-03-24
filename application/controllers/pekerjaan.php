<?php
    class pekerjaan extends CI_Controller {
		
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_pekerjaan() {
			//$data['jabatan'] = $this->m_jabatan->TampilkanJabatan();
			$this->template->load('template', 'pekerjaan/form_pekerjaan');
		}
		public function lihat_pekerjaan() {
			$data['result'] = $this->m_pekerjaan->AmbilDataPekerjaan();
			$this->template->load('template', 'pekerjaan/view_pekerjaan', $data);
		}
		public function simpan_pekerjaan() {
			$config = array(
								array(
										'field' => 'kode_pekerjaan',
										'label' => 'Kode Pekerjaan',
										'rules' => 'required|is_unique[pegawai.id_pegawai]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'is_unique'     => "".$_POST['kode_pekerjaan']."Data Sudah Ada Di Database"
													)
								),
								array(
										'field' => 'nama_pekerjaan',
										'label' => 'Nama Pekerjaan',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !'
													)
								),
								array(
										'field' => 'tarif',
										'label' => 'Tarif',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong'
													)
								)
						);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'pekerjaan/form_pekerjaan');
			} else {
				$this->db->insert('pekerjaan', $_POST);
				redirect('pekerjaan/lihat_pekerjaan');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $kode_pekerjaan =   $this->input->post('kode_pekerjaan');
	            $nama_pekerjaan =   $this->input->post('nama_pekerjaan');
	            $tarif          =   $this->input->post('tarif');
	            $data           = array('nama_pegawai'=>$nama_pekerjaan,
		                                'tarif'=>$tarif);
	            $this->m_pegawai->edit($data,$id);
	            redirect('pekerjaan/lihat_pekerjaan');
	        }
	        else {
	            $id=  $this->uri->segment(3);
	            $this->load->model('m_pekerjaan');
	            //$data['jabatan'] = $this->m_jabatan->TampilkanJabatan();
	            $data['result']    =  $this->m_pekerjaan->AmbilDataPekerjaan();
	            $data['result']    =  $this->m_pekerjaan->get_one($id)->row_array();
	            $this->template->load('template','pekerjaan/edit_pekerjaan',$data);
	        }
    	}
    	public function hapus() {
			$id= $this->uri->segment(3);
			$this->m_jabatan->hapusitem($id);
			redirect('pekerjaan/lihat_pekerjaan');
		} 
	}