<html>
	<body>
	<h3 align = "center">Jurnal Umum</h3>
	<form align ="center" method="post" action="<?php echo site_url().'/keuangan/view_jurnal' ?> " class="form-inline">
		<label>Tanggal Awal</label>
		<input type = "date" name="tgl_awal" class = "form-control">
		<label>Tanggal Akhir</label>
		<input type = "date" name="tgl_akhir" class = "form-control">
	<input type="submit" value="filter" class="btn btn-info">
	</form>
	<table class ="table table-bordered">
		<tr>
			<td>Tanggal Jurnal</td>
			<td>Keterangan</td>
			<td>Ref</td>
			<td>Debit</td>
			<td>Kredit</td>
		</tr>
		<?php 
		$total =0;
		$total2 =0;
			foreach ($jurnal as $data)
			{
				echo"
					<tr>
						<td>".$data['tgl_jurnal']."</td>";
						
				if ($data['posisi_dr_cr']=='d')
				{
					
					echo"
					
					
						<td>".$data['nama_akun']."</td>
						<td>".$data['kode_akun']."</td>
						<td align = 'right'>".format_rp($data['nominal'])."</td>
						<td align = 'right'></td>";
						$total = $total+$data['nominal'];
				}else{
					echo"
						<td align='center'>".$data['nama_akun']."</td>
						<td>".$data['kode_akun']."</td>
						<td align = 'right'></td>
						<td align = 'right'>".format_rp($data['nominal'])."</td>
					</tr>
					
				";
				$total2=$total2+$data['nominal'];
				}
			}
		?>
		<tr>
			<td colspan="3">Total</td>
			<td align ="right"><?php echo $total;?></td>
			<td align ="right"><?php echo $total2;?></td>
		</tr>
	</table>
	</body>
	</html>