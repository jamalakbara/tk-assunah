<html>
	<head>
	</head>
	<body>
		<form class = 'form-inline' method = "POST" class = "form-inline" action = "<?php echo site_url().'/keuangan/view_bukubesar';?>">
		  Pilih Akun: <select name = "kode_akun" class = "form-control input-sm">
			<option value="#" disabled selected>Pilih Akun</option>
			<?php
				foreach($akun as $data){
					echo "
						<option value = ".$data['kode_akun'].">".$data['nama_akun']."</option>
					";
				}
			?>
		  </select>
		  <button class = "btn btn-info btn-sm" type = "submit">Submit</button>
		</form>
		<h3 align = 'center'>Buku Besar <?php echo $dataakun['nama_akun'];?></h3>
		<table class = 'table table-bordered table-striped' Border ='1'>
			<tr>
				<td>Tanggal</td>
				<td>Keterangan</td>
				<td>Debit</td>
				<td>Kredit</td>
				<td>Saldo</td>
			</tr>
			<?php
				
				$saldo = 0;
				foreach($jurnal as $data){
					echo "
						<tr>
							<td>".$data['tgl_jurnal']."</td>
							<td>".$data['nama_akun']."</td>
						";
					if($data['posisi_dr_cr'] == 'd'){
						//if($dataakun['header_akun'] == d or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
                                                  if($dataakun['header_akun'] == 1 or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){  
							$saldo = $saldo + $data['nominal'];
						}else{
							$saldo = $saldo - $data['nominal'];
						}
						echo "
							<td align = 'right'>".format_rp($data['nominal'])."</td>
							<td></td>
							<td align = 'right'>".format_rp($saldo)."</td>
						</tr>
						";
					}else{
						if($dataakun['header_akun'] == 1 or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
							$saldo = $saldo - $data['nominal'];
						}else{
							$saldo = $saldo + $data['nominal'];
						}
						echo "
							<td></td>
							<td align = 'right'>".format_rp($data['nominal'])."</td>
							<td align = 'right'>".format_rp($saldo)."</td>
						</tr>
						";
					}
				}
				echo "
					<tr>
						<td>0000-00-00</td>
						<td>Saldo Akhir</td>
						<td></td>
						<td></td>
						<td align = 'right'>".format_rp($saldo)."</td>
					</tr>
				";
			?>
		</table>
		<a href = "<?php echo site_url().'/keuangan/view_jurnal';?>">Lihat Jurnal Umum</a><br>
	</body>
</html>