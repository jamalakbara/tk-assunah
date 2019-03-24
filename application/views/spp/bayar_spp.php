<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" >
</head>
<body>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Bayar SPP</div>
                </div>
            </div>
            <div class="panel-body">
            <form action="<?php echo site_url('spp/pelunasan') ?>" method="POST">
				<div class="form-group">
					<label>No SPP</label>
					<input type="text" name="no_spp" value="<?php echo $list->no_spp?>" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Nama Siswa</label>
					<input type="text" name="nama_siswa" value="<?php echo $list->nama_siswa?>" class="form-control" readonly>
				</div>

				<div class="form-group">
					<label>Total SPP Yang Harus Dibayar</label>
					<input type="text" name="jumlah" class="form-control" value="<?php echo format_rp($list->jumlah);?>" readonly>
				</div>

				<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa fa-credit-card"></i> Bayar</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
	</form>
 </body>
</html>

