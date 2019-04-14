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
        <div class="card-header"><b>Daftar SPP</b> | <small>Detail SPP</small></div>
        <div class="card-body">

          <table>
            <tr style="height:30px">
              <th style="width:150px">No. SPP</th>
              <td><?php echo $spp['no_spp'] ?></td>
            </tr>


            <tr style="height:30px">
              <th style="width:150px">Nama Siswa</th>
              <td><?php echo $spp['nama_siswa'] ?></td>
            </tr>

            <tr style="height:30px">
              <th>Bulan</th>
              <td><?php echo $spp['bulan'] ?></td>
            </tr>

            <tr style="height:30px">
              <th>Status</th>
              <td><?php echo $spp['status'] ?></td>
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
            <a href = "<?php echo site_url()."/spp/pembayaran/".$spp['no_spp']?>" class="btn btn-success" role="button">Bayar</a>
             <a href = "<?php echo site_url('spp/mau_bayar');  ?>" class="btn btn-info" role="button">Kembali</a>

 </body>
</html>




