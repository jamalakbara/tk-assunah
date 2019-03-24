<form action="<?php echo site_url('spp/pelunasan') ?>" method="POST">
	<div class="form-group">
		<label>No Pendaftaran</label>
		<input type="text" name="no_spp" value="<?php echo $list->no_spp?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Nama Siswa</label>
		<input type="text" name="nama_siswa" value="<?php echo $list->nama_siswa?>" class="form-control" readonly>
	</div>

	<div class="form-group">
		<label>Total Pembayaran Yang Harus Dibayar</label>
		<input type="text" name="total" class="form-control" value="<?php echo format_rp($list->total);?>" readonly>
	</div>
	<div class="form-group">
		<label></label>
		<button class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Selesai</button>
		<input role="button" class="btn btn-danger " onclick="javascript:history.go(-1);" value="Kembali">
	</div>
</form>