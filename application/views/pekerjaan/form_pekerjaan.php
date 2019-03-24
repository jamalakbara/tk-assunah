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
                    <div class="title">Entry Data Pekerjaan</div>
                </div>
            </div>
            <div class="panel-body">
    <form action="<?php echo site_url('pekerjaan/simpan_pekerjaan'); ?>" method="POST">
		          <div class="form-group">
                <label>Kode Pekerjaan :</label>
                <input class="form-control" name="kode_pekerjaan" placeholder="Masukkan Kode Pekerjaan">
                <?php echo form_error('kode_pekerjaan'); ?>
              </div>

              <div class="form-group">
                <label>Nama Pekerjaan :</label>
                <input class="form-control" name="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan">
                <?php echo form_error('nama_pekerjaan'); ?>
              </div>

              <div class="form-group">
                <label>Tarif :</label>
                <input class="form-control" name="tarif" placeholder="Masukkan Tarif">
                <?php echo form_error('tarif'); ?>
              </div>

              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa fa-save"></i> Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
	</body>
</html>