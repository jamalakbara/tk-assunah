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
                    <li><a href="index.html"><i class="fa fa-home"></i> Beranda</a></li>
                    <li class="active">Bayar Pendaftaran</li>
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
             <a href="<?php echo site_url('pendaftaran/lihat_daftar'); ?>" class="btn btn-danger" role="button">Kembali</a><br><br>
                <section class="panel panel-default">
                <header class="panel-heading">
                  List PMB Yang Belum Lunas 
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="20%">No. Pendaftaran</th>
                        <th width="25%">Nama Siswa</th>
                        <th width="25%">Tanggal Pendaftaran</th>
                        <th width="25%">Total</th>
                        <th width="25%">Status</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              $no = 1;
                              foreach($list as $data){ // $result harus sama seperti di controller
                                echo "
                                <tr>
                                    <td>".$data['no_pendaftaran']."</td>
                                    <td>".$data['nama_siswa']."</td>
                                    <td>".$data['tgl_daftar']."</td>
                                    <td>".format_rp($data['total'])."</td>
                                    <td>".$data['status']."</td>
                                    <td>".anchor('pendaftaran/detail/'.$data['no_pendaftaran'],'Bayar', array('class' => 'btn btn-primary'))."</td> </tr>";
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