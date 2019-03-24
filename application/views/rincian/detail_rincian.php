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
                    <div class="title">Detail Rincian</div>
                </div>
            </div>
           <div class="content">
  <div class="col-md-12">
      <br>
      <?php echo $this->session->flashdata('msg') ?>
      
      <div class="card">
        <div class="card-header"><b>Daftar Rincian</b> | <small>Detail Rincian</small></div>
        <div class="card-body">

          <table>
            <tr style="height:30px">
              <th style="width:150px">No. Rincian</th>
              <td><?php echo $rincian['no_rincian'] ?></td>
            </tr>

            <!-- <tr style="height:30px">
              <th>Tanggal</th>
              <td><?php echo $transbeban['tgl_trans'] ?></td>
            </tr> -->

            <tr style="height:30px">
              <th>Keterangan</th>
              <td><?php echo $rincian['keterangan'] ?></td>
            </tr>
          </table>

          <hr>

          <table border="2" rules="all" class = "table table-bordered-black table-hover">
           <tr>
            <th><center>Rincian</center></th>
            <th><center>Biaya Rincian</center></th>
           </tr>
           <?php
            $total = 0;
            foreach($detail as $data){
             $total += $data['biaya_rincian'];
             echo "
              <tr>
               <td align = 'center'>".$data['nama_rincian']."</td>
               <td align = 'right'>".format_rp($data['biaya_rincian'])."</td>
              </tr>
             ";
            }
           ?>
           <tr>
             <td colspan="1" align="right"> <b>Total Biaya</b></td>
             <td align="right"><b><?php echo format_rp($total); ?></td></b>
           </tr>
          </table>
             <a href = "<?php echo site_url()."/rincian/view_rincian"?>" class="btn btn-info" role="button">Kembali</a>

 </body>
</html>




