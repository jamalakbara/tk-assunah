<?php

class beranda extends CI_Controller {
	
	public function index() {
		$this->template->load('template','beranda');
	}
	public function form() {
		$this->template->load('template','contoh_form');
	}
}