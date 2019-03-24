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
                    <div class="title">Detail Anggaran Operasional</div>
                </div>
            </div>
           <div class="content">
  <div class="col-md-12">
      <br>
      <?php echo $this->session->flashdata('msg');
      $date = explode("-", $anggaran['periode']);
      $dateObj = DateTime::createFromFormat('!m', $date[1]);

      //var_dump($date);
      ?>
      
      <div class="card">
        <div class="card-header"><b>Anggaran Operasional</b> | <small>Detail Anggaran Operasional</small></div>
        <div class="card-body">

          <table>
            <tr style="height:30px">
              <th style="width:150px">No. Anggaran</th>
              <td><?php echo $anggaran['no_anggaran'] ?></td>
            </tr>

            <tr style="height:30px">
              <th>Periode</th>
              <td><?php echo $dateObj->format('F') ?> - <?php echo $date[0] ?></td>
            </tr>

            <tr style="height:30px">
              <th>Keterangan</th>
              <td><?php echo $anggaran['ket'] ?></td>
            </tr>
          </table>

          <hr>

          <table border="2" rules="all" class = "table table-bordered-black table-hover">
           <tr>
            <th><center>Nama Anggaran</center></th>
            <th><center>Total</center></th>
           </tr>
           <?php
            $total = 0;
            foreach($detail as $data){
             $total += $data['total'];
             echo "
              <tr>
               <td align = 'center'>".$data['nama_akun']."</td>
               <td align = 'right'>".format_rp($data['total'])."</td>
              </tr>
             ";
            }
           ?>
           <tr>
             <td colspan="1" align="right"> <b>Total Keseluruhan Anggaran</b></td>
             <td align="right"><b><?php echo format_rp($total); ?></td></b>
           </tr>
          </table>
             <a href = "<?php echo site_url()."/anggaran/lihat_anggaran"?>" class="btn btn-info" role="button">Kembali</a>

 </body>
</html>




