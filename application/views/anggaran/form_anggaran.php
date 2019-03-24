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
                    <li><a href="<?php echo site_url('anggaran/lihat_anggaran'); ?>"><i class="fa fa-table"></i> Anggaran Operasional</a></li>
                    <li class="active">Tambah Anggaran Operasional</li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Tambah Anggaran Operasional</div>
                </div>
            </div>
            <div class="panel-body">
            <form action="<?php echo site_url('anggaran/simpan_anggaran'); ?>" method="POST">

              <div class="form-group">
                <label>No Anggaran</label>
                <input type = "text" name = "no_anggaran" class = "form-control" value = "<?php echo $no_anggaran;?>" readonly>
              </div>

              <div class="form-group">
                <label>Periode :</label>
                <input class="form-control" name="periode" type="" value="<?php echo date('M Y'); ?>" readonly>
                <?php echo form_error('periode'); ?>
              </div>    

             <div class="form-group">
              <label>Nama Anggaran</label>
              <select name = "kode_akun" class = "form-control">
                <option value="#" disabled selected>Pilih Nama Akun</option>
              <?php
                foreach($nama_akun as $data){
                  echo "<option value = ".$data['kode_akun'].">".$data['nama_akun']."</option>";
                }
              ?>
              </select>
              <?php echo form_error('kode_akun'); ?>
            </div>

                  

              <div class="form-group">
                <label>Total Anggaran :</label>
                <input class="form-control" name="total" placeholder="Masukkan Total Anggaran">
                <?php echo form_error('total'); ?>
              </div>

      <button type="submit" class="btn btn-default btn-success">Tambah Anggaran</button>
    </form><br>
    <table class = 'table table-bordered'>
      <tr>
        <th>No Anggaran</th>
        <th>Nama Anggaran</th>
        <th>Total</th>
        <th style="text-align: center;">Aksi</th>
      </tr>
      <?php
        $total = 0;
        foreach($detail as $data){
          echo "
            <tr>
              <td>".$data['no_anggaran']."</td>
              <td>".$data['nama_akun']."</td>
              <td align = 'right'>".format_rp($data['total'])."</td>
              <td align='center'>".anchor('anggaran/delete/'.$data['no_anggaran'].'/'.$data['kode_akun'],'Hapus', array('class' => 'btn btn-danger'))."</td>
            </tr>
          ";
          $total += $data['total'];
        }
      ?>
      <tr>
        <td align="center" colspan="2" style="font-weight: bold;">Total Keseluruhan Anggaran</td>
        <td align="right">
          <?php echo format_rp($total); ?>
        </td>
      </tr>
    </table>
    <a href = "<?php echo site_url()."/anggaran/selesai_anggaran/$no_anggaran/$total"?>" class="btn btn-info" role="button">Selesai</a>
 </body>
</html>

