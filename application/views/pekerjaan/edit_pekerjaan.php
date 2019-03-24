<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
    <div class="row">
          <div class="col-lg-12">
            <h1>Pekerjaan</h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Pekerjaan</a></li>
              <li class="active"><i class="fa fa-edit"></i>Edit Pekerjaan</li>
            </ol>
          </div>
    </div><!-- /.row -->
		<div class="panel-body">

            <form role="form" method="POST" action="">

              <div class="form-group">
                <label>Kode Pekerjaan :</label>
                <input class="form-control" name="kode_pekerjaan" value="<?php echo $result['kode_pekerjaan']; ?>" readonly="">
                <?php echo form_error('kode_pekerjaan'); ?>
              </div>

              <div class="form-group">
                <label>Nama Pekerjaan :</label>
                <input class="form-control" name="nama_pekerjaan" value="<?php echo $result['nama_pekerjaan'] ?>">
                <?php echo form_error('nama_pekerjaan'); ?>
              </div>

              <div class="form-group">
                <label>Tarif :</label>
                <input class="form-control" name="tarif" placeholder="Masukkan Tarif">
                <?php echo form_error('tarif'); ?>
              </div>

              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
        </div>
    </div>
	</body>
</html>