<?php

	class rincian extends CI_Controller {
		/*function __construct() {
			parent::__construct();

			if ($this->session->userdata('level') != "pemilik") {
				redirect('login');
			}
		}*/
		
		public function view_rincian(){
	  $txtcari = $this->input->get('cari');
	  
	  if(isset($txtcari)){
	   		$data['result'] = $this->m_transbeban->cari($txtcari);
	  }else{
	   		$data['result'] = $this->m_rincian->GetDataRincian();
	  }

			$this->template->load('template', 'rincian/view_rincian', $data);
	 }

	public function detail(){
		$id = $this->uri->segment(3);
		$data['rincian']  = $this->m_rincian->getID_rincian($id)->row_array();
		$data['detail'] = $this->m_rincian->GetDataDetailRincian($id);
			$this->template->load('template', 'rincian/detail_rincian', $data);
	 }
	 
	 public function form_rincian(){
	  //form transbeban
			  $data['no_rincian'] = $this->m_rincian->AmbilNoRincian();
			  $data['total'] = $this->m_rincian->GetTotalRincian($data['no_rincian']);
			  $data['detail'] = $this->m_rincian->GetDataDetailRincian($data['no_rincian']);
			$this->template->load('template', 'rincian/form_rincian',$data);
	    }
	 
	public function simpan_rincian(){
	  $config = array(
			/*array(
				'field' => 'tgl_trans',
				'label' => 'Tanggal Transaksi',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s tidak boleh kosong'
				)
			),*/
			array(
				'field' => 'nama_rincian',
				'label' => 'Nama Rincian',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s tidak boleh kosong'
				)
			),
			array(
				'field' => 'biaya_rincian',
				'label' => 'Biaya Rincian',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s tidak boleh kosong'
				)
			),
		);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');

		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE){
			$data['no_rincian'] = $this->m_rincian->AmbilNoRincian();
			  $data['total'] = $this->m_rincian->GetTotalRincian($data['no_rincian']);
			  $data['detail'] = $this->m_rincian->GetDataDetailRincian($data['no_rincian']);
			$this->template->load('template', 'rincian/form_rincian',$data);
		}else {
			var_dump($this->form_validation->run());
			$this->m_rincian->InsertDetail();
			redirect('rincian/form_rincian');
		}
	}
		 
	public function selesai_rincian($id){
	  	$this->m_rincian->SelesaiRincian($id);
	  
	  	//generate jurnal
	  	//$this->m_transbeban->GenerateJurnal('111', $id, 'k', $total);
	  	//$this->m_transbeban->GenerateJurnal('512', $id, 'd', $total);
	  	redirect('rincian/view_rincian');
	 }
	 public function delete(){
 			$id = $this->uri->segment(3);
 			$this->m_transbeban->hapus($id,$this->uri->segment(4));
 			redirect('transbeban/form_transbeban');
 		}
}