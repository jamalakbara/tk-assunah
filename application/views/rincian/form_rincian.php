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
                    <li class="active"><a href="<?php echo site_url('rincian/lihat_rincian'); ?>"><i class="fa fa-table"></i> Rincian Pembayaran</a></li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Tambah Rincian Pembayaran</div>
                </div>
            </div>
            <div class="panel-body">
               
            <form role="form" method="POST" action="<?php echo site_url('rincian/simpan_rincian'); ?>">

              <div class="form-group">
                <label>No Rincian :</label>
                <input class="form-control" name="no_rincian" placeholder="Masukkan No Rincian" value='<?= $no_rincian?>' readonly>
                <?php echo form_error('no_rincian'); ?>
              </div>

              <div class="form-group">
                <label>Jenis Rincian :</label>
                <select name="jenis_rincian" class="form-control">
                  <option value="" selected="">Pilih Jenis Rincian</option>
                  <option value="Pendaftaran Murid Baru">Pendaftaran Murid Baru</option>
                  <option value="Pendapatan SPP">Pembayaran SPP</option>
                </select>
                  <?php echo form_error('jenis_rincian'); ?>
              </div>

               <div class="form-group">
                <label>Nama Rincian :</label>
                <input class="form-control" name="nama_rincian" placeholder="Masukkan Nama Rincian">
                <?php echo form_error('nama_rincian'); ?>
              </div>

               <div class="form-group">
                <label>Biaya Rincian :</label>
                <input class="form-control" name="biaya_rincian" placeholder="Masukkan Biaya Rincian">
                <?php echo form_error('biaya_rincian'); ?>
              </div>

              <button type="submit" class="btn btn-default btn-primary">Tambah</button>
  </form><br>

  <table class = 'table table-bordered'>
      <tr>
        <td>Jenis Rincian</td>
        <td>Nama Rincian</td>
        <td>Biaya Rincian</td>
      </tr>
      <?php
        $total_rincian = 0;
        foreach($detail as $data){
          echo "
            <tr>
              <td>".$data['jenis_rincian']."</td>
              <td>".$data['nama_rincian']."</td>
              <td align = 'right'>".format_rp($data['biaya_rincian'])."</td>
            </tr>
          ";

          $total_rincian += $data['biaya_rincian'];
        }
      ?>
    </table>
    <div class="form-group">
        <label>Total Transaksi</label>
        <input readonly type = "text" class = "form-control" value = "<?php echo format_rp($total_rincian);?>">
      </div>
    <a href = "<?php echo site_url()."/rincian/selesai_rincian/$no_rincian"?>" class="btn btn-success" role="button">Selesai</a>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".selectbox").select();
    });
    </script>
</body>
</html>
