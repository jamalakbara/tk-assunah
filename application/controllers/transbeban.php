<?php
class transbeban extends CI_controller{

    public function view_transaksi(){
	  $txtcari = $this->input->get('cari');
	  
	  if(isset($txtcari)){
	   		$data['result'] = $this->m_transbeban->cari($txtcari);
	  }else{
	   		$data['result'] = $this->m_transbeban->GetDataTransaksi();
	  }

			$this->template->load('template', 'transbeban/view_transbeban', $data);
	 }

	public function detail(){
		$id = $this->uri->segment(3);
		$data['transbeban']  = $this->m_transbeban->getID_transbeban($id)->row_array();
		$data['detail'] = $this->m_transbeban->GetDataDetailTransaksi($id);
			$this->template->load('template', 'transbeban/view_detail_transbeban', $data);
	 }
	 
	 public function form_transbeban(){
	  //form transbeban
			  $data['no_trans'] = $this->m_transbeban->AmbilNoTransaksi();
			  $data['total'] = $this->m_transbeban->GetTotalTransaksi($data['no_trans']);
			  $data['nama_akun'] = $this->m_transbeban->GetDataAkun();
			  $data['detail'] = $this->m_transbeban->GetDataDetailTransaksi($data['no_trans']);
			$this->template->load('template', 'transbeban/form_transbeban', $data);
	    }
	 
	public function simpan_transaksi(){
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
				'label' => 'Kegiatan Pengeluaran',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s tidak boleh kosong'
				)
			),
			array(
				'field' => 'total',
				'label' => 'Total Pengeluaran',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s tidak boleh kosong'
				)
			),
		);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');

		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE){
			redirect('transbeban/form_transbeban');
		}else {
			$this->m_transbeban->InsertDetail();
			redirect('transbeban/form_transbeban');
		}
	}
		 
	public function selesai_trans($id){
	  	$this->m_transbeban->SelesaiTransaksi($id);
	  
	  	//generate jurnal
	  	//$this->m_transbeban->GenerateJurnal('111', $id, 'k', $total);
	  	//$this->m_transbeban->GenerateJurnal('512', $id, 'd', $total);
	  	redirect('transbeban/view_transaksi');
	 }
	 public function delete(){
 			$id = $this->uri->segment(3);
 			$this->m_transbeban->hapus($id,$this->uri->segment(4));
 			redirect('transbeban/form_transbeban');
 		}
}