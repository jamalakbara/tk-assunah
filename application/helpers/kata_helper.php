<?php

	function get_kalimat($kalimat) {
		return $kalimat;
	}
	function hitung($kalimat){
		return strlen($kalimat);	
	}
	function balik($kalimat){
		return strrev($kalimat);	
	}
	function bagi($kalimat){
		$dibagi = strtok($kalimat, " ");
		$i 		= 1;
		echo "<br><br>Nama dibagi :";
		while ($dibagi !== false) {
			echo "<br>Kata ke $i $dibagi";
			$dibagi = strtok(" ");
			$i++;
		}	
	}
	function bagi_balik($kalimat){
		$dibagi = strtok($kalimat, " ");
		$i 		= 1;
		echo "<br><br>Nama dibagi dan dibalik :";
		while ($dibagi !== false) {
			echo "<br>Kata ke $i ".strrev($dibagi);
			$dibagi = strtok(" ");
			$i++;
		}	
	}

	//fungsi untuk format rupiah
	function format_rp($a){
		if(!is_numeric($a))return NULL;
		$jumlah_desimal ="2";
		$pemisah_desimal =",";
		$pemisah_ribuan =".";
		$angka = "Rp ". number_format($a, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
		return $angka;
	}
	
	