<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/datatables/datatables.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css" type="text/css" />
</head>
<body>
    <section class="scrollable padder">
        <section id="content">
            <section class="vbox">
                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                    <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active"><i class="fa fa-table"></i> Daftar SPP Siswa</li>
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
              <a href="<?php echo site_url('spp/form_spp'); ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-fw fa fa-plus"></i> Tambah Daftar SPP Siswa</a>
             
              <a href ="<?php echo site_url('spp/mau_bayar'); ?>"  class="btn btn-success btn-sm" role="button"><i class="fa fa-fw fa fa-credit-card"></i> Bayar</a><br><br>
                <section class="panel panel-default">
                <header class="panel-heading">
                  Daftar SPP Siswa
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="20%">No. SPP</th>
                        <th width="25%">Nama Siswa</th>
                        <th width="25%">Bulan</th>
                        <th width="25%">Jumlah Pembayaran</th>
                        <th width="15%">Status</th>
                        <th width="15%">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              $no = 1;
                              foreach($result as $data){ // $result harus sama seperti di controller
                                echo "
                                <tr>
                                    <td>".$data['no_spp']."</td>
                                    <td>".$data['nama_siswa']."</td>
                                    <td>".$data['bulan']."</td>
                                    <td>".format_rp($data['jumlah'])."</td>
                                    <td>".$data['status']."</td>
                                    <td>".$data['keterangan']."</td>";
                                $no++;
                                }
                            ?>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>
        </div>
      </section>
    </section>
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>assets/js/app.plugin.js"></script>
  <script src="<?php echo base_url();?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Data table plugin-->
    <script src="<?php echo base_url();?>assets/js/datatables/jquery.dataTables.min.js"></script>
</body>
</html>