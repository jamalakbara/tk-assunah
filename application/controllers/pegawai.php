<?php
    class pegawai extends CI_Controller {
		
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_pegawai() {
			//$data['jabatan'] = $this->m_jabatan->TampilkanJabatan();
			$this->template->load('template', 'pegawai/form_pegawai');
		}
		public function lihat_pegawai() {
			$data['result'] = $this->m_pegawai->AmbilDataPegawai();
			$this->template->load('template', 'pegawai/view_pegawai', $data);
		}
		public function simpan_pegawai() {
			$config = array(
								array(
										'field' => 'id_pegawai',
										'label' => 'ID Pegawai',
										'rules' => 'required|is_unique[pegawai.id_pegawai]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'is_unique'     => "".$_POST['id_pegawai']."Data Sudah Ada Di Database"
													)
								),
								array(
										'field' => 'nama_pegawai',
										'label' => 'Nama Pegawai',
										'rules' => 'required|alpha',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !',
														'alpha' => '%s Harus Huruf Semua'
													)
								),
								array(
										'field' => 'gender',
										'label' => 'Gender',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Harus diisi'
													)
								),
								array(
										'field' => 'alamat',
										'label' => 'Alamat',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong'
													)
								),
								array(
										'field' => 'no_hp',
										'label' => 'No Hp',
										'rules' => 'required|numeric',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
														'numeric' > '%s HArus Inputan angka'
													)
								)
						);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'pegawai/form_pegawai');
			} else {
				$this->db->insert('pegawai', $_POST);
				redirect('pegawai/lihat_pegawai');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $id_pegawai     =   $this->input->post('id_pegawai');
	            $nama_pegawai   =   $this->input->post('nama_pegawai');
	            $gender  		=   $this->input->post('gender');
	            $alamat         =   $this->input->post('alamat');
	            $no_hp          =   $this->input->post('no_hp');
	            $data           = array('nama_pegawai'=>$nama_pegawai,
		                                'gender'=>$gender,
		                                'alamat'  => $alamat,
		                                'no_hp'=>$no_hp);
	            $this->m_pegawai->edit($data,$id);
	            redirect('pegawai/lihat_pegawai');
	        }
	        else {
	            $id=  $this->uri->segment(3);
	            $this->load->model('m_pegawai');
	            //$data['jabatan'] = $this->m_jabatan->TampilkanJabatan();
	            $data['result']    =  $this->m_pegawai->AmbilDataPegawai();
	            $data['result']    =  $this->m_pegawai->get_one($id)->row_array();
	            $this->template->load('template','pegawai/edit_pegawai',$data);
	        }
    	}
    	public function hapus() {
			$id= $this->uri->segment(3);
			$this->m_jabatan->hapusitem($id);
			redirect('pegawai/lihat_pegawai');
		} 
	}