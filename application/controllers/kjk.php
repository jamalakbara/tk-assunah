<?php
    class kjk extends CI_Controller {
		
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_kjk() {
			$data['id_pegawai'] = $this->m_pegawai->AmbilDataPegawai();
			$data['jenis_sepatu'] = $this->m_sepatu->AmbilDataSepatu();
			$this->template->load('template', 'kjk/form_kjk', $data);
		}
		public function lihat_kjk() {
			$data['result'] = $this->m_kjk->AmbilDataKJK();
			$this->template->load('template', 'kjk/view_kjk', $data);
		}
		public function simpan_kjk() {
			$config = array(
								array(
										'field' => 'id_kjk',
										'label' => 'ID Kartu Jam Kerja',
										'rules' => 'required|is_unique[kjk.id_kjk]',
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
										'field' => 'tgl_kjk',
										'label' => 'Tanggal Kartu Jam Kerja',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong'
													)
								),
								array(
										'field' => 'total_produksi',
										'label' => 'Total Produksi',
										'rules' => 'required|numeric',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
														'numeric' > '%s Harus Inputan angka'
													)
								),
								array(
										'field' => 'jenis_sepatu',
										'label' => 'Jenis Sepatu',
										'rules' => 'required|max_length[100]',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !',
														'max_length' => 'Harus lebih dari 100 Kata'
													)
								)
							);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'kjk/form_kjk');
			} else {
				$this->db->insert('kjk', $_POST);
				redirect('kjk/lihat_kjk');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $id_kjk     		=   $this->input->post('id_kjk');
	            $id_pegawai   		=   $this->input->post('id_pegawai');
	            $tgl_kjk  			=   $this->input->post('tgl_kjk');
	            $total_produksi     =   $this->input->post('total_produksi');
	            $jenis_sepatu    	=   $this->input->post('jenis_sepatu');
	            $data           = array('tgl_kjk'=>$tgl_kjk,
		                                'total_produksi'=>$total_produksi);
	            $this->m_kjk->edit($data,$id);
	            redirect('kjk/lihat_kjk');
	        }
	        else {
	            $id=  $this->uri->segment(3);
	            $this->load->model('m_kjk');
	            $data['id_pegawai'] = $this->m_pegawai->AmbilDataPegawai();
	            $data['nama_sepatu'] = $this->m_pegawai->AmbilDataSepatu();
	            $data['result']    =  $this->m_kjk->AmbilDataKJK();
	            $data['result']    =  $this->m_kjk->get_one($id)->row_array();
	            $this->template->load('template','kjk/edit_kjk',$data);
	        }
    	}
    	public function hapus() {
			$id= $this->uri->segment(3);
			$this->m_jabatan->hapusitem($id);
			redirect('kjk/lihat_kjk');
		} 
	}