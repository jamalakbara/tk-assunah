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
                    <li><a href="<?php echo site_url('transbeban/view_transaksi'); ?>"><i class="fa fa-table"></i> Daftar Pengeluaran Kas</a></li>
                    <li class="active">Tambah Pengeluaran Kas</li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Tambah Pengeluaran Kas</div>
                </div>
            </div>
            <div class="panel-body">
          <form method = "POST" action = "<?php echo site_url('transbeban/simpan_transaksi');?>">
      <div class="form-group">
        <label>No Transaksi</label>
        <input type = "text" name = "no_trans" class = "form-control" value = "<?php echo $no_trans;?>" readonly>
      </div>
      <div class="form-group">
        <label>Tanggal Transaksi</label>
        <input type = "text" class = "form-control"  value = "<?php echo date('Y-m-d');?>" readonly>
      </div>
      <div class="form-group">
        <label>Kegiatan Pengeluaran</label>
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
        <label>Total Pengeluaran</label>
        <input type = "text" name = "total" class = "form-control"><br>
        <?php echo form_error('total'); ?>
      </div>
      <button type="submit" class="btn btn-default btn-success">Tambah Transaksi</button>
    </form><br>
    <table class = 'table table-bordered'>
      <tr>
        <th>No Transaksi</th>
        <th>Kegiatan Pengeluaran</th>
        <th>Total</th>
        <th style="text-align: center;">Aksi</th>
      </tr>
      <?php
        $total = 0;
        foreach($detail as $data){
          echo "
            <tr>
              <td>".$data['no_trans']."</td>
              <td>".$data['nama_akun']."</td>
              <td align = 'right'>".format_rp($data['total'])."</td>
              <td align='center'>".anchor('transbeban/delete/'.$data['no_trans'].'/'.$data['kode_akun'],'Hapus', array('class' => 'btn btn-danger'))."</td>
            </tr>
          ";
          $total += $data['total'];
        }
      ?>
      <tr>
        <td align="center" colspan="2" style="font-weight: bold;">Total Keseluruhan Pengeluaran</td>
        <td align="right">
          <?php echo format_rp($total); ?>
        </td>
      </tr>
    </table>
    <a href = "<?php echo site_url()."/transbeban/selesai_trans/$no_trans/$total"?>" class="btn btn-info" role="button">Selesai</a>
 </body>
</html>
