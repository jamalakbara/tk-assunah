<?php
class pendaftaran extends CI_controller{

	//sebelumnya view_transaksi
	//getdatatransaksi = getdatadaftar
	public function form_daftar() {
			$data['no_pendaftaran'] = $this->m_pendaftaran->AmbilNoDaftar();
			$data['siswa'] = $this->m_datasiswa->AmbilDataSiswa();
			$data['rincian'] = $this->m_pendaftaran->GetDataRincian();
			$data['detail'] = $this->m_pendaftaran->GetDataDetailDaftar();
			if ($data['rincian'] == NULL){
				$isi = array(
					array(
						'no_rincian' => 0,
						'jenis_rincian' => 'Belum Ada Input',
						'nama_rincian' => NULL,
						'total' => 0
					)
				);
				$data['rincian'] = $isi;
			}else{
				$data['rincian'] = $this->m_pendaftaran->GetDataRincian();
			}
			// var_dump($data['rincian']);
			$this->template->load('template', 'pendaftaran/form_daftar',$data);
		}
		public function lihat_daftar() {
		  $txtcari = $this->input->get('cari');
	  
			  if(isset($txtcari)){
			   		$data['result'] = $this->m_pendaftaran->cari($txtcari);
			  }else{
			   		$data['result'] = $this->m_pendaftaran->GetDataDaftar();
			  }

					$this->template->load('template', 'pendaftaran/view_daftar', $data);
		}
		
		public function detail(){
			$id = $this->uri->segment(3);
			$data['pendaftaran']  = $this->m_pendaftaran->getID_daftar($id)->row_array();
			$data['detail'] = $this->m_pendaftaran->GetDataDetailDaftar($id);
			$this->template->load('template', 'pendaftaran/detail_daftar', $data);
		}
		public function simpan_daftar() {
			$config = array(
								
								array(
										'field' => 'nama_siswa',
										'label' => 'Nama Siswa',
										'rules' => 'required',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
													)
								),
								array(
										'field' => 'total',
										'label' => 'Total Biaya',
										'rules' => 'required|numeric',
										'errors'=> array(
														'required' => '%s Tidak Boleh Kosong',
														'numeric'=> '%s Hanya boleh angka'
													)
								),
						);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				var_dump($this->form_validation->run());
				$this->template->load('template', 'pendaftaran/form_daftar');
			} else {
				var_dump($this->form_validation->run());
				$this->m_pendaftaran->InsertDetail();
				redirect('pendaftaran/form_daftar');
			}
		}
		public function selesai_daftar($id){
			$config = array(
					array(
							'field' => 'nis',
							'label' => 'Nomor Induk Siswa',
							'rules' => 'required|is_unique[datasiswa.nis]|max_length[5]|numeric',
							'errors'=> array(
											'required'      => '%s Tidak Boleh Kosong !',
											'is_unique'     => "".$_POST['nis']." Data Sudah Ada Di Database",
											'max_length'	=> '%s Harus 5 Karakter',
											'numeric'		=> '%s Tidak Boleh Karakter Huruf'
										)
					),
					array(
							'field' => 'nama_siswa',
							'label' => 'Nama Siswa',
							'rules' => 'required',
							'errors'=> array(
											'required' => '%s Tidak Boleh Kosong',
										)
					),
					array(
							'field' => 'tempat_lahir',
							'label' => 'Tempat Lahir',
							'rules' => 'required|alpha',
							'errors'=> array(
											'required' => '%s Tidak Boleh Kosong',
											'alpha'	   => '%s Tidak Boleh Karakter Angka'
										)
					),
					array(
							'field' => 'tgl_lahir',
							'label' => 'Tanggal Lahir',
							'rules' => 'required',
							'errors'=> array(
											'required' => '%s Tidak Boleh Kosong',
										)
					),
					array(
							'field' => 'gender',
							'label' => 'Gender',
							'rules' => 'required',
							'errors'=> array(
											'required' => '%s Tidak Boleh Kosong',
										)
					),
					array(
							'field' => 'nama_ortu',
							'label' => 'Nama Orangtua',
							'rules' => 'required',
							'errors'=> array(
											'required' => '%s Tidak Boleh Kosong',
										)
					),
			);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				$data['no_pendaftaran'] = $this->m_pendaftaran->AmbilNoDaftar();
			$data['siswa'] = $this->m_datasiswa->AmbilDataSiswa();
			$data['rincian'] = $this->m_pendaftaran->GetDataRincian();
			$data['detail'] = $this->m_pendaftaran->GetDataDetailDaftar();
			if ($data['rincian'] == NULL){
				$isi = array(
					array(
						'no_rincian' => 0,
						'jenis_rincian' => 'Belum Ada Input',
						'nama_rincian' => NULL,
						'total' => 0
					)
				);
				$data['rincian'] = $isi;
			}else{
				$data['rincian'] = $this->m_pendaftaran->GetDataRincian();
			}
			// var_dump($data['rincian']);
			$this->template->load('template', 'pendaftaran/form_daftar',$data);
				// redirect('pendaftaran/form_daftar');
			} else {
				var_dump($this->form_validation->run());
				// $this->m_pendaftaran->InsertDetail();
				$inpoet = array(
					'nis' => $this->input->post('nis'),
					'nama_siswa' => $this->input->post('nama_siswa'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'gender' => $this->input->post('gender'),
					'nama_ortu' => $this->input->post('nama_ortu'),
				);
				$this->m_pendaftaran->SelesaiDaftar($id, $inpoet);
				redirect('pendaftaran/lihat_daftar');
			}
	  
	  	//generate jurnal
	  	//$this->m_transbeban->GenerateJurnal('111', $id, 'k', $total);
	  	//$this->m_transbeban->GenerateJurnal('512', $id, 'd', $total);
	  	
	 }
		 public function mau_bayar() {
    	$config["base_url"]    = base_url()."index.php/pendaftaran/mau_bayar";
		$config["total_rows"]  = $this->m_pendaftaran->HitungJumlahBaris();
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
		
    	$data['list'] = $this->m_pendaftaran->view_bayar($this->uri->segment(3),
		$config["per_page"]);
    	$this->template->load('template', 'pendaftaran/view_bayar', $data);
    }
    public function pembayaran($id) {
    	// $id= $this->uri->segment(3);
    	$this->m_pendaftaran->mau_bayar($id);
    	redirect('pendaftaran/lihat_daftar');
    }
     public function pelunasan() {
    	$data['detail'] = $this->m_pendaftaran->beneran_selesai();

    	redirect('pendaftaran/lihat_daftar');
    }
		/*public function edit() {
	         if(isset($_POST['submit'])){
	            $no_spp  		  =   $this->input->post('no_spp');
	            $jumlah  		  =   $this->input->post('jumlah');
	            $data             =   array('jumlah'=>$jumlah);
	            $this->m_pendaftaran->edit($data,$id);
	            redirect('spp/lihat_spp');
	        }
	        else {
	            $id =  $this->uri->segment(3);
	            $this->load->model('m_pendaftaran');
	            $data['result']    =  $this->m_pendaftaran->AmbilDataSPP();
	            $data['result']    =  $this->m_pendaftaran->get_one($id)->row_array();
	            $this->template->load('template','spp/edit_spp',$data);
	        }
    	}*/ 
    	public function delete(){
 			$id = $this->uri->segment(3);
 			$this->m_pendaftaran->hapus($id);
 			redirect('pendaftaran/lihat_daftar');
 		}
	}