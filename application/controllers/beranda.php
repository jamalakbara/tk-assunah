<?php

class beranda extends CI_Controller {
	
	public function index() {
		$data['anggaran'] = $this->m_beranda->GetDataGrafikAnggaran();
		$data['beban_atk'] = $this->m_beranda->GetDataGrafikPengeluaran('Beban ATK');
		$data['beban_konsumsi'] = $this->m_beranda->GetDataGrafikPengeluaran('Beban Konsumsi');
		$data['beban_kas'] = $this->m_beranda->GetDataGrafikPengeluaran('Beban Kas PKG, IGTKI, GGS');
		$data['beban_listrik'] = $this->m_beranda->GetDataGrafikPengeluaran('Beban Listrik');
		$data['beban_seminar'] = $this->m_beranda->GetDataGrafikPengeluaran('Beban Seminar');
		$data['beban_service'] = $this->m_beranda->GetDataGrafikPengeluaran('Beban Perbaikan (Service)');
		$data['beban_lain'] = $this->m_beranda->GetDataGrafikPengeluaran('Beban Lain-lain');
		// var_dump($data['pengeluaran']);
		// var_dump($data['anggaran'][1]);
		$this->template->load('template','beranda',$data);
	}
	public function form() {
		$this->template->load('template','contoh_form');
	}
}