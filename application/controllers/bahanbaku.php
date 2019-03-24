<?php

	class bahanbaku extends CI_Controller {
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_bahanbaku() {
			$this->template->load('template', 'bahanbaku/form_bahanbaku');
		}
		public function lihat_bahanbaku() {
			$data['result'] = $this->m_bahanbaku->AmbilDataBahanbaku();
			$this->template->load('template', 'bahanbaku/view_bahanbaku', $data);
		}
		public function simpan_bahanbaku() {
			$config = array(
								array(
										'field' => 'id_bb',
										'label' => 'ID Bahan Baku',
										'rules' => 'required|is_unique[bahanbaku.id_bb]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'is_unique'     => "".$_POST['id_bb']."Data Sudah Ada Di Database"
													)
								),
								array(
										'field' => 'nama_bb',
										'label' => 'Nama Bahan Baku',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !'
													)
								),
								array(
										'field' => 'jumlah',
										'label' => 'Jumlah di Gudang',
										'rules' => 'required|numeric',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
														'alpha'=> '%s Hanya boleh huruf'
													)
								),
								array(
										'field' => 'satuan',
										'label' => 'Satuan',
										'rules' => 'required|alpha',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
														'alpha'=> '%s Hanya boleh huruf'
													)
								)
						);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'bahanbaku/form_bahanbaku');
			} else {
				$this->db->insert('bahanbaku', $_POST);
				redirect('bahanbaku/lihat_bahanbaku');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $id_bb  		  =   $this->input->post('id_bb');
	            $nama_bb  		  =   $this->input->post('nama_bb');
	            $jumlah 		  =   $this->input->post('jumlah');
	            $satuan           =   $this->input->post('satuan'); 
	            $data             =   array('nama_bb'=>$nama_bb,
			                                'jumlah'=>$jumlah,
			                                'satuan'=>$satuan);
	            $this->m_bahanbaku->edit($data,$id);
	            redirect('bahanbaku/lihat_bahanbaku');
	        }
	        else {
	            $id =  $this->uri->segment(3);
	            $this->load->model('m_bahanbaku');
	            $data['result']    =  $this->m_bahanbaku->AmbilDataBahanbaku();
	            $data['result']    =  $this->m_bahanbaku->get_one($id)->row_array();
	            $this->template->load('template','bahanbaku/edit_bahanbaku',$data);
	        }
    	} 
    	public function delete()
 {
 $id = $this->uri->segment(3);
 $this->m_bahanbaku->hapus($id);
 redirect('bahanbaku/lihat_bahanbaku');
 }
	}