<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/datatables/datatables.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css" type="text/css" />
</head>
	<body>
    <section class="scrollable padder">
        <section id="content">
            <section class="vbox">
                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                    <li><a href="<?php echo site_url()."/beranda"?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?php echo site_url('pegawai/lihat_pegawai'); ?>"><i class="fa fa-table"></i> Data Pegawai</a></li>
                    <li class="active">Edit Data Pegawai</li>
                </ul>
        </section>
		<div class="panel-body">

            <form role="form" method="POST" action="">

              <div class="form-group">
                <label>ID Pegawai :</label>
                <input class="form-control" name="id_pegawai" value="<?php echo $result['id_pegawai']; ?>" readonly="">
                <?php echo form_error('id_pegawai'); ?>
              </div>

              <div class="form-group">
                <label>Nama Pegawai :</label>
                <input class="form-control" name="nama_pegawai" value="<?php echo $result['nama_pegawai'] ?>">
                <?php echo form_error('nama_pegawai'); ?>
              </div>

              <div class="form-group">
                <label>Gender :</label>
                 <select name="gender" class="form-control">
                    <option value="#" selected disabled>Pilih Gender</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                  <?php echo form_error('gender'); ?>
              </div>


              <div class="form-group">
                <label>Alamat :</label>
                <input class="form-control" name="alamat" value="<?php echo $result['alamat'] ?>">
                <?php echo form_error('alamat'); ?>
              </div>

              <div class="form-group">
                <label>No HP :</label>
                <input class="form-control" name="no_hp" value="<?php echo $result['no_hp'] ?>">
                <?php echo form_error('no_hp'); ?>
              </div>

              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
        </div>
    </div>
	</body>
</html>