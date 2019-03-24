<?php

	class sepatu extends CI_Controller {
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_sepatu() {
			$this->template->load('template', 'sepatu/form_sepatu');
		}
		public function lihat_sepatu() {
			$data['result'] = $this->m_sepatu->AmbilDataSepatu();
			$this->template->load('template', 'sepatu/view_sepatu', $data);
		}
		public function simpan_sepatu() {
			$config = array(
								array(
										'field' => 'kode_sepatu',
										'label' => 'Kode Sepatu',
										'rules' => 'required|is_unique[sepatu.kode_sepatu]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'is_unique'     => "".$_POST['kode_sepatu']."Data Sudah Ada Di Database"
													)
								),
								array(
										'field' => 'jenis_sepatu',
										'label' => 'Jenis Sepatu',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !'
													)
								),
								array(
										'field' => 'ket',
										'label' => 'Keterangan Sepatu',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong'
													)
								)
						);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'sepatu/form_sepatu');
			} else {
				$this->db->insert('sepatu', $_POST);
				redirect('sepatu/lihat_sepatu');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $kode_sepatu  		  =   $this->input->post('kode_sepatu');
	            $jenis_sepatu  		  =   $this->input->post('jenis_sepatu');
	            $ket 		  =   $this->input->post('ket'); 
	            $data             =   array('jenis_sepatu'=>$jenis_sepatu,
			                                'ket'=>$ket);
	            $this->m_bahanbaku->edit($data,$id);
	            redirect('sepatu/lihat_sepatu');
	        }
	        else {
	            $id =  $this->uri->segment(3);
	            $this->load->model('m_sepatu');
	            $data['result']    =  $this->m_sepatu->AmbilDataSepatu();
	            $data['result']    =  $this->m_sepatu->get_one($id)->row_array();
	            $this->template->load('template','sepatu/edit_sepatu',$data);
	        }
    	} 
    	public function delete()
 {
 $id = $this->uri->segment(3);
 $this->m_bahanbaku->hapus($id);
 redirect('sepatu/lihat_sepatu');
 }
	}