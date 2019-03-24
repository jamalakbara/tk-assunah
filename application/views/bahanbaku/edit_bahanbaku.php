<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
    <div class="row">
          <div class="col-lg-12">
            <h1>Bahan Baku <small></small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Bahan Baku</a></li>
              <li class="active"><i class="fa fa-edit"></i> Forms Bahan Baku</li>
            </ol>
          </div>
    </div><!-- /.row -->
		<div class="panel-body">
          <div class="col-lg-8">

            <form role="form" method="POST" action="">

              <div class="form-group">
                <label>ID Bahan Baku :</label>
                <input class="form-control" name="id_bb" value="<?php echo $result['id_bb']; ?>" readonly="">
                <?php echo form_error('id_bb'); ?>
              </div>

              <div class="form-group">
                <label>Nama Bahan Baku :</label>
                <input class="form-control" name="nama_bb" value="<?php echo $result['nama_bb'] ?>">
                <?php echo form_error('nama_bb'); ?>
              </div>

               <div class="form-group">
                <label>Jumlah di Gudang:</label>
                <input class="form-control" name="jumlah" placeholder="Masukkan jumlah">
                <?php echo form_error('jumlah'); ?>
              </div>

              
              <div class="form-group">
                <label>Satuan :</label>
                <select name="satuan" class="form-control">
                  <option value="" selected="">Pilih Satuan</option>
                  <option value="Meter">Meter</option>
                  <option value="Kg">Kg</option>
                  <option value="Liter">Liter</option>
                </select>
                  <?php echo form_error('satuan'); ?>
                
              </div>

              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
        </div>
    </div>
	</body>
</html>