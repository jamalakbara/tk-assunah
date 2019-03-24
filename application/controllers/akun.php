<?php
	class akun extends CI_Controller {
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_akun() {
			$this->template->load('template', 'akun/form_akun');
		}
		public function lihat_akun() {
			$data['result'] = $this->m_akun->AmbilDataAkun();
			$this->template->load('template', 'akun/view_akun', $data);
		}
		public function simpan_akun() {
			$config = array(
								array(
										'field' => 'kode_akun',
										'label' => 'Kode Akun',
										'rules' => 'required|is_unique[akun.kode_akun]|min_length[3]|max_length[3]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'is_unique'     => "".$_POST['kode_akun']." Data Sudah Ada Di Database",
														'min_length'	=> '%s Harus 3 karakter',
														'max_length[3]'	=> '%s Harus 3 karakter'
													)
								),
								array(
										'field' => 'nama_akun',
										'label' => 'Nama Akun',
										'rules' => 'required|alpha',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !',
														'alpha'	   => '%s Tidak Boleh Karakter Angka'
													)
								),
								array(
										'field' => 'header_akun',
										'label' => 'Header Akun',
										'rules' => 'required|numeric|max_length[1]',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
														'numeric'=> '%s Tidak Boleh Karakter Huruf',
														'max_length'	=> '%s Harus 1 karakter'
													)
								)
						);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'akun/form_akun');
			} else {
				$this->db->insert('akun', $_POST);
				redirect('akun/lihat_akun');
			}
		}
		/*public function edit() {
	         if(isset($_POST['submit'])){
	            $kode_akun  		  =   $this->input->post('kode_akun');
	            $nama_akun  		  =   $this->input->post('nama_akun');
	            $header_akun 		  =   $this->input->post('header_akun'); 
	            $data             =   array('nama_bb'=>$nama_bb,
			                                'jumlah'=>$jumlah,
			                                'satuan'=>$satuan);
	            $this->m_bahanbaku->edit($data,$id);
	            redirect('akun/lihat_akun');
	        }
	        else {
	            $id =  $this->uri->segment(3);
	            $this->load->model('m_akun');
	            $data['result']    =  $this->m_akun->AmbilDataAkun();
	            $data['result']    =  $this->m_akun->get_one($id)->row_array();
	            $this->template->load('template','akun/edit_akun',$data);
	        }
    	}*/ 
    	public function delete(){
 			$id = $this->uri->segment(3);
 			$this->m_bahanbaku->hapus($id);
 			redirect('akun/lihat_akun');
 			}
	}