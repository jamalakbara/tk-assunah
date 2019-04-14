<?php 
 class login extends CI_Controller {
  
  public function index() {
   $this->home();
  }

  public function cek() {
   $config = array(
        array(
          'field' => 'username',
          'label' => 'Username',
          'rules' => 'required',
          'errors'=> array(
              'required'      => '%s Tidak Boleh Kosong'
             )
        ),
        array(
          'field' => 'pass',
          'label' => 'pass',
          'rules' => 'required',
          'errors'=> array(
              'required' => '%s Tidak Boleh Kosong'
              //'matches'  => '%s Salah'
             )
        )
      );
   $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
   $this->form_validation->set_rules($config);

   if ($this->form_validation->run() == FALSE) {
    $this->load->view('login');
   } else {
    $query = $this->m_login->cek_username_pass($_POST['username'], ($_POST['pass']));
    if ($query->num_rows() <> 0) {
     foreach ($query->result_array() as $data) {
      $sess_data['username']   = $data['username'];
      $sess_data['pass']   = $data['pass'];
      $sess_data['level']      = $data['level'];
      $this->session->set_userdata($sess_data);
     }
     $level = $this->session->userdata('level');
     if ($level == "keuangan") {
      redirect('beranda');
     }
     elseif ($level == "administrasi") {
      redirect('beranda');
     }
    }else{
      redirect('login');
    }
   }
  }
   public function home() {
    $this->load->view('login');
   }
   public function logout() {
    $this->session->sess_destroy();
    redirect('login');
   }
 }