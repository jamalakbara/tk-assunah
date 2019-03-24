<?php

	class datasiswa extends CI_Controller {
		//function __construct() {
		//	parent::__construct();

		//	if ($this->session->userdata('level') != "manajer") {
		//		redirect('login');
		//	}
		//}
		
		public function form_datasiswa() {
			$this->template->load('template', 'datasiswa/form_datasiswa');
		}
		public function lihat_datasiswa() {
			$data['result'] = $this->m_datasiswa->AmbilDataSiswa();
			$this->template->load('template', 'datasiswa/view_datasiswa', $data);
		}
		public function simpan_datasiswa() {
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
				$this->template->load('template', 'datasiswa/form_datasiswa');
			} else {
				$this->db->insert('datasiswa', $_POST);
				redirect('datasiswa/lihat_datasiswa');
			}
		}
		public function edit() {
	         if(isset($_POST['submit'])){
	            $nis  		  =   $this->input->post('nis');
	            $nama_siswa  		  =   $this->input->post('nama_siswa');
	            $tempat_lahir 		  =   $this->input->post('tempat_lahir');
	            $tgl_lahir 		  =   $this->input->post('tgl_lahir');
	            $gender 		  =   $this->input->post('gender');
	            $nama_ortu 		  =   $this->input->post('nama_ortu'); 
	            $data             =   array('nis'=>$nis,
	            							'nama_siswa'=>$nama_siswa,
			                                'tempat_lahir'=>$tempat_lahir,
			                                'tgl_lahir'=>$tgl_lahir,
			                                'gender'=>$gender,
			                                'nama_ortu'=>$nama_ortu);
	            $this->m_datasiswa->edit($data,$id);
	            redirect('datasiswa/lihat_datasiswa');
	        }
	        else {
	            $id =  $this->uri->segment(3);
	            $this->load->model('m_datasiswa');
	            $data['result']    =  $this->m_datasiswa->AmbilDataSiswa();
	            $data['result']    =  $this->m_datasiswa->get_one($id)->row_array();
	            $this->template->load('template','datasiswa/edit_datasiswa',$data);
	        }
    	}
    	public function delete(){
 			$id = $this->uri->segment(3);
 			$this->m_datasiswa->hapus($id);
 			redirect('datasiswa/lihat_datasiswa');
 			}
 		public function print_datasiswa(){
		//rumus =pdf->Cell(width,height,isi kolom, border, align);

		$pdf = new TCPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		//judul
		$pdf->SetFontSize(14);

		$pdf->text(40, 20, "DAFTAR SISWA TK ASSUNAH");
		$pdf->cell(20, 20, '', '', 1);

		//header tabel
		$pdf->SetFontSize(10);
		$pdf->cell(20, 10, 'No', 1, 0, 'C');
		$pdf->cell(60, 10, 'Nama Siswa', 1, 0, 'C');
		$pdf->cell(50, 10, 'Tempat Lahir', 1, 0, 'C');
		$pdf->cell(50, 10, 'Tanggal Lahir', 1, 0, 'C');
		$pdf->cell(35, 10, 'Jenis Kelamin', 1, 0, 'C');
		$pdf->cell(60, 10, 'Nama Orang Tua', 1, 0, 'C');


		//isi tabel 
		$no    = 1;
		$data  = $this->m_datasiswa->AmbilDataSiswa();
		foreach($data as $data){
			
			$pdf->cell(20, 10, $no, 1, 1, 0, 'C');
			$pdf->cell(20, 10, $data['nis'], 1, 0, 'C');
			$pdf->cell(60, 10, $data['nama_siswa'], 1,  0, 'C');
			$pdf->cell(50, 10, $data['tempat_lahir'], 1,  0, 'C');
			$pdf->cell(50, 10, $data['tgl_lahir'], 1,  0, 'C');
			$pdf->cell(35, 10, $data['gender'], 1, 0, 'C');
			$pdf->cell(60, 10, $data['nama_ortu'], 1,  0, 'C');
			$no++;	
		}
		$pdf->output();
	}
	}