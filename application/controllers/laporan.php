<?php
class laporan extends CI_controller{
		/*function __construct() {
			parent::__construct();

			if ($this->session->userdata('level') != "manajer") {
				redirect('login');
			}
		}*/

	/*public function filter(){
		$config = array(
			array(
			'field' => 'tgl_awal',
			'label' => 'tanggal_awal',
			'rules' => 'required',
			'errors' => array(
			'required' => '%s tidak boleh kosong')
		),
			array(
			'field' => 'tgl_akhir',
			'label' => 'tanggal_akhir',
			'rules' => 'required',
			'errors' => array(
			'required' => '%s tidak boleh kosong')

			
		),
	);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
		$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE){$this->view_jurnal();
		}
		else {
				$this->m_keuangan->GetDataJurnal();
				redirect('keuangan/view_jurnal');
			}
		}*/

		/*function __construct() {
			parent::__construct();

			if ($this->session->userdata('level') != "pemilik") {
				redirect('login');
			}
		}*/
		public function milih_dulu() {
			$data['result'] = $this->m_sepatu->AmbilDataSepatu();
			$this->template->load('template','laporan/pilih', $data);
		}

		public function lihat() {
			$data['ao'] = $this->m_laporan->tampilkanao($this->uri->segment(3));
			$data['beban'] = $this->m_laporan->tampilkanbeban($this->uri->segment(3));
			//$data['kjm'] = $this->m_laporan->tampilkankjm($this->uri->segment(3));
			$this->template->load('template','laporan/lra', $data);	
		}
		public function view_grafik()
    	{
        	//$data['pie_data']=$this->m_laporan->GetAO();
        	$data['pie_data']=$this->m_laporan->GetBiayaProduksi();
			$this->template->load('template','chart.php', $data);	
    	}

		/*public function jos1(){
		$id = $this->uri->segment(3);
		$data['nominal'] = $this->m_kjk->AmbilDataKJK();
		$data['tarif'] = $this->m_kjm->AmbilDataKJM();
		$data['nominal'] = $this->m_bbb->AmbilDataBBB();
		$this->template->load('template','laporan/lap_jos',$data);
		}
		public function lap_jos(){
			$config["base_url"] = base_url()."index.php/laporan/lap_jos";
			$config["total_rows"] = $this->m_laporan->HitungJumlahBaris();
			$config["per_page"] = 2;
			$config["uri_segment"] = 3;

			$config['first_link'] = FALSE;
			$config['last_link'] = FALSE;

			$config['full_tag_open'] = '<div><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div>';

			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);

		$data['result'] = $this->m_laporan->GetDataLaporanJOS($this->uri->segment(3), $config["per_page"]);

			$this->template->load('template', 'laporan/jos', $data);
	}
	//public function print_excel_laporan_pembelian(){
		//header("Content-type=appalication/vnd.ms.excel");
		//header("Content-disposition:attachment;filename=laporan_pembelian.xls");
		//$data['result'] = $this->m_laporan->GetDataLaporanPnj(1,1000000);
		//$this->load->view('laporan_excel', $data);
		//$this->template->load('template', 'laporan', $data);
		
	//}

	public function print_pdf_jos(){
		//rumus = $pdf->Cell(width, height, isi kolom, border, 1,0, align);

		$pdf = new TCPDF('P', 'mm', 'A4'); // P/L potrait atau landscape
		$pdf->AddPage();

		//judul
		$pdf->SetFontSize(14);
		$pdf->Text(10,10,"Job Order Sheet");
		$pdf->Cell(20,20, '', '',1);

		//header tabel
		$pdf->SetFontSize(10);
		$pdf->Cell(30,10, 'no_pembelian', 1,0, 'C');
		$pdf->Cell(50,10, 'tanggal', 1,0, 'C');
		$pdf->Cell(50,10, 'total', 1,1, 'C');

		//isi tabel
		$no = 1;
		$total = 0;
		$data = $this->m_laporan->AmbilDataJOS(1,1000000);
		foreach($data as $data){
			if($data['status'] == 'Sudah diterima'){
				$pdf->Cell(30,10, $no, 1,0, 'C');
				$pdf->Cell(50,10, $data['tanggal'], 1,0, 'C');
				$pdf->Cell(50,10, format_rp($data['total']), 1,1, 'R');
				$total = $total + $data['total'];
				$no++;
			}
		}

		$pdf->Cell(80,10, 'total', 1,0, 'C');
		$pdf->Cell(50,10, format_rp($total), 1,0, 'R');
		$pdf->output();
		//output untuk menampilkan file pdf nya. kalau mau ditampilkan di browser saja maka output();
	}
	/*public function view_jurnal(){
		$data['jurnal'] = $this->m_keuangan->GetDataJurnal(); 
		$this->template->load('template', 'jurnal', $data);
	}
	/*
	public function view_bukubesar(){
		$no_akun = '111';
		$bulan   = '%';
		$tahun   = '%';
		$data['akun'] = $this->m_keuangan->GetDataAkun(); 
		$data['dataakun'] = $this->m_keuangan->GetSaldoAkun($no_akun);
		$data['jurnal'] = $this->m_keuangan->GetDataBukuBesar($no_akun,$bulan,$tahun); 
		$this->template->load('template', 'v_bukubesar', $data);
	}
		
	 public function cari_bukubesar(){
	 	$config = array(
			array(
			'field' => 'no_akun',
			'label' => 'no akun',
			'rules' => 'required',
			'errors' => array(
			'required' => '%s tidak boleh kosong')
		),
			array(
			'field' => 'bulan',
			'label' => 'bulan',
			'rules' => 'required',
			'errors' => array(
			'required' => '%s tidak boleh kosong')

			
		),
			array(
			'field' => 'tahun',
			'label' => 'tahun',
			'rules' => 'required',
			'errors' => array(
			'required' => '%s tidak boleh kosong')

	)
		);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
		$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
		{
		  $no_akun='111';
		  $data['akun']=$this->m_keuangan->GetDataAkun();
		  $data['bulan']=$this->m_keuangan->Getbulan();
		  $data['tahun']=$this->m_keuangan->Gettahun();
		  $data['dataakun']=$this->m_keuangan->GetSaldoAkun($no_akun);
		  $data['jurnal']=$this->m_keuangan->GetDataBukuBesar($no_akun);
		  $this->template->load('template','v_bukubesar',$data);
		}
		else
		{
			$no_akun = $this->input->post('no_akun');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
		  $data['akun']=$this->m_keuangan->GetDataAkun();
		  $data['bulan']=$this->m_keuangan->Getbulan();
		  $data['tahun']=$this->m_keuangan->Gettahun();
		  $data['dataakun']=$this->m_keuangan->GetSaldoAkun($no_akun);
		  $data['jurnal']=$this->m_keuangan->cari_bukubesar($no_akun,$bulan,$tahun);
		  $this->template->load('template','v_bukubesar',$data);
			

		}

	 }
	 public function bukubesar2(){
		$config = array(
			array(
				'field' => 'no_akun',
				'label' => 'No Akun',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s tidak boleh kosong')
			),
			array(
				'field' => 'bulan',
				'label' => 'Bulan',
				'rules' => 'required|callback_cek',
				'errors' => array(
					'required' => '%s tidak boleh kosong')
			),
			array(
				'field' => 'tahun',
				'label' => 'Tahun',
				'rules' => 'required|callback_cek',
				'errors' => array(
					'required' => '%s tidak boleh kosong')
			)
		);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE){
			$this->view_bukubesar();
		}else {
			$no_akun = $_POST['no_akun'];
			$bulan   = $_POST['bulan'];
			$tahun   = $_POST['tahun'];
			$data['akun'] = $this->m_keuangan->GetDataAkun(); 
			$data['dataakun'] = $this->m_keuangan->GetSaldoAkun($no_akun);
			$data['jurnal'] = $this->m_keuangan->GetDataBukuBesar($no_akun,$bulan,$tahun);
			if ($_POST['Submit'] == 'cari'){
				$this->template->load('template', 'v_bukubesar', $data);
			}else{
				$this->template->load('template', 'v_bukubesar_print', $data);
			}	
		}
	}
public function cek(){
		 $cek = $this->m_keuangan->cek();
		 if ($cek == 0) {
		  	return FALSE;
		  }else{
		  	return TRUE;
		  }
	}
*/
}
