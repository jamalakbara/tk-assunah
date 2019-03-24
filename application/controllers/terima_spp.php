<?php
    class terima_spp extends CI_Controller {
		
		/*function __construct() {
			parent::__construct();

			if ($this->session->userdata('level') != "manajer") {
				redirect('login');
			}
		}*/
		
		public function form_terimaspp() {
			$data['nama_siswa'] = $this->m_datasiswa->AmbilDataSiswa();
			$data['no_spp'] = $this->m_spp->AmbilDataSPP();
			$data['result'] = $this->m_spp->AmbilDataSPP();
			$this->template->load('template', 'terima_spp/form_terimaspp', $data);
		}
		public function lihat_terimaspp() {
			$data['result'] = $this->m_terimaspp->AmbilDataTerima();
			$this->template->load('template', 'terima_spp/view_terimaspp', $data);
		}
		public function simpan_terimaspp() {
			$config = array(
								array(
										'field' => 'no_terima',
										'label' => 'No Pelunasan',
										'rules' => 'required|is_unique[terima_spp.no_terima]|min_length[3]|max_length[3]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'is_unique'     => "".$_POST['no_terima']."Data Sudah Ada Di Database",
														'min_length'	=> '%s Harus 3 Karakter',
														'max_length'	=> '%s Harus 3 Karakter'
													)
								),
								array(
										'field' => 'tgl_terima',
										'label' => 'Tanggal Pelunasan',
										'rules' => 'required',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !')
								),
								array(
										'field' => 'jumlah_terima',
										'label' => 'Jumlah Pelunasan',
										'rules' => 'required|numeric',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !',
														'numeric' => '%s Hanya boleh angka !',
													)
								),
								array(
										'field' => 'no_spp',
										'label' => 'No SPP',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong !',
													)
								)
							);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template', 'terima_spp/form_terimaspp');
			} else {
				$this->m_terimaspp->simpanterima();
				$this->m_terimaspp->lunas($this->input->post('no_spp'));
				redirect('terima_spp/lihat_terimaspp');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $no_terima     		=   $this->input->post('no_terima');
	            $no_spp   		=   $this->input->post('no_spp');
	            $tgl_terima   		=   $this->input->post('tgl_terima');
	            $jumlah_terima  			=   $this->input->post('jumlah_terima');
	            $data           = array('tgl_terima'=>$tgl_terima,
		                                'jumlah_terima'=>$jumlah_terima);
	            $this->m_terimaspp->edit($data,$id);
	            redirect('terima_spp/lihat_terimaspp');
	        }
	        else {
	            $id=  $this->uri->segment(3);
	            $this->load->model('m_terimaspp');
	            $data['nama_siswa'] = $this->m_datasiswa->AmbilDataSiswa();
	            $data['no_spp'] = $this->m_spp->AmbilDataSPP();
	            $data['result']    =  $this->m_terimaspp->AmbilDataTerima();
	            $data['result']    =  $this->m_terimaspp->get_one($id)->row_array();
	            $this->template->load('template','terima_spp/edit_terimaspp',$data);
	        }
    	}
    	public function hapus() {
			$id= $this->uri->segment(3);
			$this->m_jabatan->hapusitem($id);
			redirect('terima_spp/lihat_terimaspp');
		} 
	}