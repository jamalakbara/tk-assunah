<?php

class coa extends CI_Controller {
	
	public function lihat_coa() {
		$data['result'] = $this->m_coa->tampilkancoa();
		$this->template->load('template', 'coa/view_coa', $data);
	}
	public function tambah_coa() {
		$this->template->load('template', 'coa/form_coa');
	}
	public function simpan() {
		
	}
}