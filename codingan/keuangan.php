<?php
class keuangan extends CI_Controller
{
	public function view_jurnal()
	{
		$data['jurnal'] = $this->m_keuangan->GetDataJurnal();
		$this->template->load('template','jurnal', $data);
	}
	
	public function view_bukubesar()
	{
		if(isset($_POST['kode_akun']))
		{
			$kode_akun = $_POST['kode_akun'];
		}else
		{
			$kode_akun = '111';
		}
		$data['akun'] = $this->m_keuangan->GetDataAkun();
		$data['dataakun'] = $this->m_keuangan->GetSaldoAkun($kode_akun);
		$data['jurnal'] = $this->m_keuangan->GetDataBukuBesar($kode_akun);
		$this->template->load('template', 'bukubesar', $data);
	}
	//laporan keuangan transaksi_persediaan
	/*public function laporan_persediaan()
	{
		$config["base_url"] = base_url()."index.php/keuangan/laporan_persediaan";
		$config["total_rows"] = $this->m_keuangan->HitungJumlahBaris();
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;
		
		//tambahan
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		
		$config['full_tag_open'] = '<div><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['next_link']='next';
		$config['next_tag_open']='<li class="next page">';
		$config['next_tag_close']='</li>';
		
		$config['prev_link']='previous';
		$config['prev_tag_open']='<li class="prev page">';
		$config['prev_tag_close']='</li>';
		
		$config['cur_tag_open']='<li class="active"><a href="">';
		$config['cur_tag_close']='</a></li>';
		
		$config['num_tag_open']='<li class="page">';
		$config['num_tag_close']='</li>';
		
		$this->pagination->initialize($config);
		$data['result'] = $this->m_keuangan->GetDataLaporanPersediaan($this->uri->segment(3), $config["per_page"]);
		$this->template->load('template','laporan_persediaan', $data);
	}
	

		
	*/
}