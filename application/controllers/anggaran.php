<?php
class anggaran extends CI_controller{

    public function lihat_anggaran(){
	  $txtcari = $this->input->get('cari');
	  
	  if(isset($txtcari)){
	   		$data['result'] = $this->m_anggaran->cari($txtcari);
	  }else{
	   		$data['result'] = $this->m_anggaran->GetDataAnggaran();
	  }

			$this->template->load('template', 'anggaran/view_anggaran', $data);
	 }

	public function detail(){
		$id = $this->uri->segment(3);
		$data['anggaran']  = $this->m_anggaran->getID_anggaran($id)->row_array();
		$data['detail'] = $this->m_anggaran->GetDataDetailAO($id);
			$this->template->load('template', 'anggaran/view_detail_anggaran', $data);
	 }
	 
	 public function form_anggaran(){
	  //form anggaran
			  $data['no_anggaran'] = $this->m_anggaran->AmbilNoAO();
			  $data['total'] = $this->m_anggaran->GetTotalAO($data['no_anggaran']);
			  $data['nama_akun'] = $this->m_anggaran->GetDataAkun();
			  $data['detail'] = $this->m_anggaran->GetDataDetailAO($data['no_anggaran']);
			$this->template->load('template', 'anggaran/form_anggaran', $data);
	    }
	 
	public function simpan_anggaran(){
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
				'field' => 'kode_akun',
				'label' => 'Nama Anggaran',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s Tidak Boleh Kosong!'
				)
			),
			array(
				'field' => 'total',
				'label' => 'Total Anggaran',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s Tidak Boleh Kosong!'
				)
			),
		);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');

		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE){
			redirect('anggaran/form_anggaran');
		}else {
			$this->m_anggaran->InsertDetail();
			redirect('anggaran/form_anggaran');
		}
	}
		 
	public function selesai_anggaran($id){
	  	$this->m_anggaran->SelesaiAO($id);
	  
	  	//generate jurnal
	  	//$this->m_anggaran->GenerateJurnal('111', $id, 'k', $total);
	  	//$this->m_anggaran->GenerateJurnal('512', $id, 'd', $total);
	  	redirect('anggaran/lihat_anggaran');
	 }
	 public function delete(){
 			$id = $this->uri->segment(3);
 			$this->m_anggaran->hapus($id,$this->uri->segment(4));
 			redirect('anggaran/form_anggaran');
 		}
}