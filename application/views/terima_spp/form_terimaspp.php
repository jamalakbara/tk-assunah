<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url();?>assets/js/form.js"></script>
</head>
<body>
  <section class="scrollable padder">
        <section id="content">
            <section class="vbox">
                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                    <li><a href="<?php echo site_url()."/beranda"?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?php echo site_url('terima_spp/lihat_terimaspp'); ?>"><i class="fa fa-table"></i> Data SPP</a></li>
                    <li class="active">Tambah SPP</li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Pelunasan SPP Untuk..</div>
                </div>
            </div>
            <div class="panel-body">
            <form action="<?php echo site_url('terima_spp/simpan_terimaspp'); ?>" method="POST">

              <div class="form-group">
                <label>No. SPP :</label>
                <select onchange="milih()" name="no_spp" id="spp" id="select2-option" style="width: 100%" class="form-control">
                  <option value="" selected="" disabled="">Pilih No. SPP</option>
                    <?php
                      foreach($no_spp as $data){
                        echo "<option data-nama_siswa = ".$data['nama_siswa'].">".$data['no_spp']."</option>";
                      }
                  ?>
                </select>
              </div>

               <div class="form-group">
                <label>Nama Siswa :</label>
                <input type="text" id="namavalue" name="nama_siswa" class="form-control" placeholder="" readonly="">
              </div>

              <td>
                  <button type="submit" style="float: right" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
              </td>
              <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th width="300px">Bulan Pembayaran</th>
                                <th width="100px">Biaya SPP</th>
                                <th width="80px"></th>
                            </tr>
                        </thead>
                        <!--elemet sebagai target append-->
                        <tbody id="SPPlist">
                            <tr>
                                <td><input name="bulan_input[0]" class="input-block-level" /></td>
                                <td><input name="jumlah_input[0]" class="input-block-level" /></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-small btn-default" onclick="addSPP(); return false"><i class="fa fa-plus"></i></button>
                                    <button name="submit" class="btn btn-small btn-info"><i class="fa fa-check"></i></button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
  </body>
</html>