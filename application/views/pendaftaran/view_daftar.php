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
                    <li><a href="<?php echo site_url()."/beranda"?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li class="active"><a href="<?php echo site_url('pendaftaran/view_daftar'); ?>"><i class="fa fa-table"></i> Pendaftaran Murid Baru</a></li>
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
              <a href="<?php echo site_url('pendaftaran/form_daftar'); ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-fw fa fa-plus"></i> Tambah Pendaftar</a>
              <a href="<?php echo site_url('pendaftaran/mau_bayar');  ?>" class="btn btn-success btn-sm" role="button"><i class="fa fa-fw fa fa-credit-card"></i> Bayar Pendaftaran</a>
              <br><br>
                <section class="panel panel-default">
                <header class="panel-heading">
                  Pendaftaran Murid Baru 
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="15%">No Pendaftaran</th>
                        <th width="20%">Nama Siswa</th>
                        <th width="10%">Tanggal Daftar</th>
                        <th width="15%">Nominal Pembayaran </th>
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
                                    <td>".$data['no_pendaftaran']."</td>
                                    <td>".$data['nama_siswa']."</td>
                                    <td>".$data['tgl_daftar']."</td>
                                    <td>".format_rp($data['total'])."</td>
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