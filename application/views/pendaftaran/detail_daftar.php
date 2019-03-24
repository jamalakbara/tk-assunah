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
                    <div class="title">Detail Pendaftaran</div>
                </div>
            </div>
           <div class="content">
  <div class="col-md-12">
      <br>
      <?php echo $this->session->flashdata('msg') ?>
      
      <div class="card">
        <div class="card-header"><b>Pendaftaran Murid Baru</b> | <small>Detail Pendaftaran</small></div>
        <div class="card-body">

          <table>
            <tr style="height:30px">
              <th style="width:150px">No. Pendaftaran</th>
              <td><?php echo $pendaftaran['no_pendaftaran'] ?></td>
            </tr>


            <tr style="height:30px">
              <th style="width:150px">Nama Siswa</th>
              <td><?php echo $pendaftaran['nama_siswa'] ?></td>
            </tr>

            <tr style="height:30px">
              <th>Tanggal</th>
              <td><?php echo $pendaftaran['tgl_daftar'] ?></td>
            </tr>

            <tr style="height:30px">
              <th>Status</th>
              <td><?php echo $pendaftaran['status'] ?></td>
            </tr>
          </table>

          <hr>

          <table border="2" rules="all" class = "table table-bordered-black table-hover">
           <tr>
            <th><center>Rincian Pembayaran</center></th>
            <th><center>Total</center></th>
           </tr>
           <?php
            $total = 0;
            foreach($detail as $data){
             $total += $data['total'];
             echo "
              <tr>
               <td align = 'center'>".$data['nama_rincian']."</td>
               <td align = 'right'>".format_rp($data['total'])."</td>
              </tr>
             ";
            }
           ?>
           <tr>
             <td colspan="1" align="right"> <b>Total Keseluruhan Pembayaran</b></td>
             <td align="right"><b><?php echo format_rp($total); ?></td></b>
           </tr>
          </table>
            <a href = "<?php echo site_url()."/pendaftaran/pembayaran/".$pendaftaran['no_pendaftaran']?>" class="btn btn-success" role="button">Bayar</a>
             <a href = "<?php echo site_url('pendaftaran/mau_bayar');  ?>" class="btn btn-info" role="button">Kembali</a>

 </body>
</html>




