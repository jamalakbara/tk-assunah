<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" >
</head>
<body>
  <section class="scrollable padder">
        <section id="content">
            <section class="vbox">
                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                    <li><a href="<?php echo site_url()."/beranda"?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?php echo site_url('datasiswa/lihat_datasiswa'); ?>"><i class="fa fa-table"></i> Data Siswa</a></li>
                    <li class="active">Tambah Data Siswa</li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Tambah Data Siswa</div>
                </div>
            </div>
            <div class="panel-body">
            <form action="<?php echo site_url('datasiswa/simpan_datasiswa'); ?>" method="POST">
		          <div class="form-group">
                <label>Nomor Induk Siswa :</label>
                <input class="form-control" name="nis" placeholder="Masukkan Nomor Induk Siswa">
                <?php echo form_error('nis'); ?>
              </div>

              <div class="form-group">
                <label>Nama Siswa :</label>
                <input class="form-control" name="nama_siswa" placeholder="Masukkan Nama Siswa">
                <?php echo form_error('nama_siswa'); ?>
              </div>

              <div class="form-group">
                <label>Tempat Lahir :</label>
                <input class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                <?php echo form_error('tempat_lahir'); ?>
              </div>

               <div class="form-group">
                <label>Tanggal Lahir :</label>
                <input class="form-control" name="tgl_lahir" type="date" placeholder="Masukkan tanggal produksi">
                <?php echo form_error('tgl_lahir'); ?>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin :</label>
                <select name="gender" class="form-control">
                  <option value="#" selected disabled>Pilih Jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                  <?php echo form_error('gender'); ?>
              </div>

              <div class="form-group">
                <label>Nama Orang Tua :</label>
                <input class="form-control" name="nama_ortu" placeholder="Masukkan Nama Orang Tua">
                <?php echo form_error('nama_ortu'); ?>
              </div>


              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa fa-save"></i> Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
	</body>
</html>