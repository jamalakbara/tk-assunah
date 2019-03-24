<?php
 class m_spp extends CI_Model {
  
  public function AmbilDataSPP() {
   $query = $this->db->get('spp');
   return $query->result_array();
  }
  public function AmbilNoSpp(){
    $this->db->where('keterangan', 'Penginputan Data Belum Selesai');
		$query = $this->db->get('spp');
		if($query->num_rows() == 0){
			$this->db->select_max('no_spp');
			$no_spp = $this->db->get('spp')->row()->no_spp;
      $no_spp = $no_spp + 1;
      $mydate=getdate(date("U"));
      switch ($mydate['month']){
        case 'January':
                        $bulan = 'Januari';
                        break;
        case 'February':
                        $bulan = 'Februari';
                        break;
        case 'March':
                        $bulan = 'Maret';
                        break;
        case 'April':
                        $bulan = 'April';
                        break;
        case 'May':
                        $bulan = 'Mei';
                        break;
        case 'June':
                        $bulan = 'Juni';
                        break;
        case 'July':
                        $bulan = 'Juli';
                        break;
        case 'August':
                        $bulan = 'Agustus';
                        break;
        case 'September':
                        $bulan = 'September';
                        break;
        case 'October':
                        $bulan = 'Oktober';
                        break;
        case 'November':
                        $bulan = 'November';
                        break;
        case 'December':
                        $bulan = 'Desember';
                        break;
        default : $bulan = 'error';
      }
			$input 		  = array(
								'no_spp' => $no_spp,
								'nama_siswa' => '-',
								'jumlah' => 0,
                'status' => 'Belum Lunas',
                'bulan' => $bulan,
								'keterangan' => 'Penginputan Data Belum Selesai'
							);
			$this->db->insert('spp', $input);
		}else{
			$no_spp = $query->row()->no_spp;
		}
		return $no_spp;
  }
  public function GetDataRincian(){
    $this->db->select('total');
    $this->db->where('jenis_rincian', 'Pembayaran SPP');
	  return $this->db->get('rincian')->row()->total;
  }
  public function getdataupdate($id) {
    $this->db->where('no_spp', $id);
    $query = $this->db->get('spp')->row_array();
    return $query;
  }
  public function get_one($id) {
   $param  =   array('no_spp'=>$id);
         return $this->db->get_where('spp',$param);
  }

  public function simpanspp(){
   $this->db->where('no_spp', $this->input->post('no_spp'));
   $cek = $this->db->get('spp');
   if($cek->num_rows() == 0){
     $datasiswa = $this->db->get_where('datasiswa', array('nis' => $this->input->post('nis')))->row_array();
     $query = array(
               'no_spp'  => $this->input->post('no_spp'),
               'nama_siswa'  => $datasiswa['nama_siswa'],
               'bulan' => $this->input->post('bulan'),
               'jumlah'  => $this->input->post('jumlah'),
               'status' => 'Belum Lunas',
               'keterangan' => 'Selesai'
              );
     $this->db->insert('spp', $query);
   }else{
     $datasiswa = $this->db->get_where('datasiswa', array('nis' => $this->input->post('nis')))->row_array();
     $query = array(
               'no_spp'  => $this->input->post('no_spp'),
               'nama_siswa'  => $datasiswa['nama_siswa'],
               'bulan' => $this->input->post('bulan'),
               'jumlah'  => $this->input->post('jumlah'),
               'status' => 'Belum Lunas',
               'keterangan' => 'Selesai'
              );
     $this->db->where('no_spp',  $this->input->post('no_spp'));
     $this->db->update('spp', $query);
   }
  }
  public function view_bayar($start,$limit) {
 		$this->db->limit($limit,$start);
 		$this->db->where('status', 'Belum Lunas');
 		return $this->db->get('spp')->result_array();
 	}
  public function mau_bayar($id) {
 		$this->db->where('no_spp',$id);
 		return $this->db->get('spp')->row();
 	}
 	public function beneran_selesai(){
 		$this->db->where('no_spp', $this->input->post('no_spp'));
 		$this->db->set('status', 'Sudah Lunas');
 		$this->db->update('spp');
 		return $this->db->get('spp')->result_array();
 	}
 	public function HitungJumlahBaris(){
		$query= $this->db->get('spp');
		return $query->num_rows();
	}


  public function edit($data,$id) {
         $data = array(
          'no_spp'  => $this->input->post('no_spp'),
             'nama_siswa'  => $datasiswa['nama_siswa'],
             'jumlah'  => $this->input->post('jumlah'),
     
                     );
         $this->db->where('no_spp',$this->input->post('no_spp'));
         $this->db->update('spp',$data);
     }
     public function hapus($id)
   {
    $this->db->where('no_spp',$id);
    $this->db->delete('spp');
   }
 }