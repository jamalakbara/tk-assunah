<?php
class laporan extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_laporan');
	}
	public function lihat_laporan(){
		$data['anggaran_pendapatan'] = $this->m_laporan->getDataAnggaranPendapatan();
		$data['total_pendapatan'] = $this->m_laporan->getDataTotalPendapatan();
		$data['anggaran_beban'] = $this->m_laporan->getDataAnggaranBeban();
		$data['total_beban'] = $this->m_laporan->getDataTotalBeban();
		
		$data['realisasiS'] = $this->m_laporan->getRealisasiSPP();
		$data['realisasiP'] = $this->m_laporan->getRealisasiPendaftaran();

		$data['beban_atk'] = $this->m_laporan->getRealisasiBeban('Beban ATK');
		$data['beban_konsumsi'] = $this->m_laporan->getRealisasiBeban('Beban Konsumsi');
		$data['beban_kas'] = $this->m_laporan->getRealisasiBeban('Beban Kas PKG, IGTKI, GGS');
		$data['beban_listrik'] = $this->m_laporan->getRealisasiBeban('Beban Listrik');
		$data['beban_seminar'] = $this->m_laporan->getRealisasiBeban('Beban Seminar');
		$data['beban_service'] = $this->m_laporan->getRealisasiBeban('Beban Perbaikan (Service)');
		$data['beban_lain'] = $this->m_laporan->getRealisasiBeban('Beban Lain-lain');
		$data['jumlah_realisasi_beban'] = $data['beban_atk'] + $data['beban_konsumsi'] + $data['beban_kas'] + $data['beban_listrik'] + $data['beban_seminar'] + $data['beban_service'] + $data['beban_lain'];

		if ($data['realisasiS'] <> NULL || $data['realisasiP'] <> NULL){
			$data['jumlah_realisasi_pendapatan'] = $data['realisasiS'] + $data['realisasiP'];
		}else{
			$data['jumlah_realisasi_pendapatan'] = 0;
		}

		// var_dump($data['beban_listrik']);
		// var_dump($data['beban_konsumsi']);
		$this->template->load('template', 'laporan/view_laporan', $data);
	}
}
