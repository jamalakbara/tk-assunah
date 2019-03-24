<?php
class m_login extends CI_Model{
  
 //untuk cek username pass
 public function cek_username_pass($username,$pass){
  $this->db->where('username',$username);
  $this->db->where('pass',$pass);
  return $this->db->get('user');
 }
}