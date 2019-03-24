<?php

class m_coa extends CI_Model {
	
	public function tampilkancoa() {
		$query = $this->db->get('coa'); //get = SELECT
		return $query->result_array();
	}
}