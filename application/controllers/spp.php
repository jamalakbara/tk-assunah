<?php

	class spp extends CI_Controller {
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "keuangan") {
		//		redirect('login');
		//	}
		//}
		
		public function form_spp() {
			$data['no_spp'] = $this->m_spp->AmbilNoSpp();
			$data['nama_siswa'] = $this->m_datasiswa->AmbilDataSiswa();
			$data['rincian_spp'] = $this->m_spp->GetDataRincian();
			if ($data['rincian_spp'] == NULL){
				$isi = 'Belum Ada Inputan';
				$data['rincian_spp'] = $isi;
			}else{
				$data['rincian_spp'] = $this->m_spp->GetDataRincian();
			}
			$this->template->load('template', 'spp/form_spp', $data);
		}
		public function lihat_spp() {
			$data['result'] = $this->m_spp->AmbilDataSPP();
			$this->template->load('template', 'spp/view_spp', $data);
		}
		public function simpan_spp() {
			$config = array(
								array(
										'field' => 'no_spp',
										'label' => 'No SPP',
										'rules' => 'required|min_length[3]',
										'errors'=> array(
														'required'      => '%s Tidak Boleh Kosong !',
														'min_length'	=> '%s Harus 3 Karakter'
													)
								),
								array(
										'field' => 'nis',
										'label' => 'Nama Siswa',
										'rules' => 'required|numeric',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
														'numeric'=> '%s Tidak Boleh Kosong'
													)
								),
								array(
									'field' => 'jumlah',
									'label' => 'Jumlah',
									'rules' => 'required|numeric',
									'errors'=> array(
													'required' => '%s belum diinput dalam rincian',
													'numeric'=> '%s belum diinput dalam rincian'
												)
								)
						);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$data['no_spp'] = $this->m_spp->AmbilNoSpp();
				$data['nama_siswa'] = $this->m_datasiswa->AmbilDataSiswa();
				$data['rincian_spp'] = $this->m_spp->GetDataRincian();
				if ($data['rincian_spp'] == NULL){
					$isi = 'Belum Ada Inputan';
					$data['rincian_spp'] = $isi;
				}else{
					$data['rincian_spp'] = $this->m_spp->GetDataRincian();
				}
				$this->template->load('template', 'spp/form_spp',$data);
			} else {
				$this->m_spp->simpanspp();
				redirect('spp/lihat_spp');
			}
		}
		public function detail(){
			$id = $this->uri->segment(3);
			$data['spp']  = $this->m_spp->getID_spp($id)->row_array();
			$data['detail'] = $this->m_spp->GetDataDetailSpp($id);
			$this->template->load('template', 'spp/detail_spp', $data);
		}
		 public function mau_bayar() {
    	$config["base_url"]    = base_url()."index.php/spp/mau_bayar";
		$config["total_rows"]  = $this->m_spp->HitungJumlahBaris();
		$config["per_page"]    = 4;
		$config["uri_segment"] = 3;

		$config['first_link']     = FALSE;
		$config['last_link']      = FALSE;
		$config['full_tag_open']  = '<div><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['next_link']      = 'Selanjutnya';
		$config['next_tag_open']  = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link']      = 'Sebelumnya';
		$config['prev_tag_open']  = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open']   = '<li class="active"><a href="">';
		$config['cur_tag_close']  = '</a></li>';
		$config['num_tag_open']   = '<li class="page">';
		$config['num_tag_close']  = '</li>';

		$this->pagination->initialize($config);
		
    	$data['list'] = $this->m_spp->view_bayar($this->uri->segment(3),
		$config["per_page"]);
    	$this->template->load('template', 'spp/view_bayar', $data);
    }
    public function pembayaran($id) {
    	// $id= $this->uri->segment(3);
    	// $data['list'] = $this->m_spp->mau_bayar($id);
		// $this->template->load('template', 'spp/bayar_spp', $data);
		$this->m_spp->mau_bayar($id);
    	redirect('spp/lihat_spp');
    }
     public function pelunasan() {
    	$data['detail'] = $this->m_spp->beneran_selesai();

    	redirect('spp/lihat_spp');
    }
		public function edit() {
	         if(isset($_POST['submit'])){
	            $no_spp  		  =   $this->input->post('no_spp');
	            $jumlah  		  =   $this->input->post('jumlah');
	            $data             =   array('jumlah'=>$jumlah);
	            $this->m_spp->edit($data,$id);
	            redirect('spp/lihat_spp');
	        }
	        else {
	            $id =  $this->uri->segment(3);
	            $this->load->model('m_spp');
	            $data['result']    =  $this->m_spp->AmbilDataSPP();
	            $data['result']    =  $this->m_spp->get_one($id)->row_array();
	            $this->template->load('template','spp/edit_spp',$data);
	        }
    	} 
    	public function delete(){
 			$id = $this->uri->segment(3);
 			$this->m_spp->hapus($id);
 			redirect('spp/lihat_spp');
 		}
	}