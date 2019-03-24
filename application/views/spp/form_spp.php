<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" >
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css" /> -->
</head>
<body>
 <section class="scrollable padder">
        <section id="content">
            <section class="vbox">
                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                    <li><a href="<?php echo site_url()."/beranda"?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?php echo site_url('spp/lihat_spp'); ?>"><i class="fa fa-table"></i> Daftar SPP Siswa</a></li>
                    <li class="active">Tambah Daftar SPP</li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Tambah Daftar SPP</div>
                </div>
            </div>
            <div class="panel-body">
            <form action="<?php echo site_url('spp/simpan_spp'); ?>" method="POST">
            <div class="form-group">
                <label>No. SPP :</label>
                <input class="form-control" name="no_spp" placeholder="Masukkan No. SPP" value='<?= $no_spp?>' readonly>
                <?php echo form_error('no_spp'); ?>
              </div>

              <div class="form-group">
                <label>Nama Siswa :</label>
                <select name="nis" class="form-control">
                  <option value="#" selected="">Pilih Nama Siswa</option>
                    <?php
                      foreach($nama_siswa as $data){
                        echo "<option value = ".$data['nis'].">".$data['nama_siswa']."</option>";
                      }
                  ?>
                </select>
                  <?php echo form_error('nis'); ?>
              </div>
              
              <?php 
                $mydate=getdate(date("U"));
                switch ($mydate['month']){
                  case 'January':
                                  $bulan = 'Januari';
                                  break;
                  case 'February':
                                  $bulan = 'Februari';
                                  break;
                  case 'March':
                                  $bulan = 'Maret';
                                  break;
                  case 'April':
                                  $bulan = 'April';
                                  break;
                  case 'May':
                                  $bulan = 'Mei';
                                  break;
                  case 'June':
                                  $bulan = 'Juni';
                                  break;
                  case 'July':
                                  $bulan = 'Juli';
                                  break;
                  case 'August':
                                  $bulan = 'Agustus';
                                  break;
                  case 'September':
                                  $bulan = 'September';
                                  break;
                  case 'October':
                                  $bulan = 'Oktober';
                                  break;
                  case 'November':
                                  $bulan = 'November';
                                  break;
                  case 'December':
                                  $bulan = 'Desember';
                                  break;
                  default : $bulan = 'error';
                }
              ?>
              <div class="form-group">
                <label>Bulan :</label>
                <input class="form-control" name="bulan" value='<?= $bulan?>' readonly>
                <?php echo form_error('bulan'); ?>
              </div>

              <div class="form-group">
                <label>Jumlah Pembayaran :</label>
                <input class="form-control" value='<?= format_rp($rincian_spp)?>' readonly>
                <input class="form-control" style='display:none' name="jumlah" value='<?= $rincian_spp?>' readonly>
                <?php echo form_error('jumlah'); ?>
              </div>


              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa fa-save"></i> Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
 </body>
</html>