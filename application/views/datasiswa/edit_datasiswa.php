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
                    <li class="active">Edit Data Siswa</li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Edit Data Siswa</div>
                </div>
            </div>

            <div class="panel-body">
            <form role="form" method="POST" action="">
              
              <div class="form-group">
                <label>ID Siswa :</label>
                <input class="form-control" name="nis" value="<?php echo $result['nis']; ?>">
                <?php echo form_error('nis'); ?>
              </div>

              <div class="form-group">
                <label>Nama Siswa :</label>
                <input class="form-control" name="nama_siswa" value="<?php echo $result['nama_siswa'] ?>">
                <?php echo form_error('nama_siswa'); ?>
              </div>

              <div class="form-group">
                <label>Tempat Lahir :</label>
                <input class="form-control" name="tempat_lahir" value="<?php echo $result['tempat_lahir'] ?>">
                <?php echo form_error('tempat_lahir'); ?>
              </div>

              <div class="form-group">
                <label>Tanggal Lahir :</label>
                <input class="form-control" name="tgl_lahir" type="date" value="<?php echo $result['tgl_lahir'] ?>">
                <?php echo form_error('tgl_lahir'); ?>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin :</label>
                <input class="form-control" name="gender" value="<?php echo $result['gender'] ?>">
                <?php echo form_error('gender'); ?>
              </div>

               <div class="form-group">
                <label>Nama Orangtua:</label>
                <input class="form-control" name="nama_ortu" value="<?php echo $result['nama_ortu'] ?>">
                <?php echo form_error('nama_ortu'); ?>
              </div>

              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-fw fa fa-save"></i> Simpan</button>
              <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-fw fa fa-undo"></i> Reset</button>
              
            </form>
  </body>
</html>

