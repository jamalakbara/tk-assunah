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
                    <li class="active"><a href="<?php echo site_url('akun/lihat_akun'); ?>"><i class="fa fa-table"></i> Data Akun</a></li>
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
              <a href="<?php echo site_url('akun/form_akun'); ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-fw fa fa-plus"></i> Tambah Data Akun</a>
              <br><br>
                <section class="panel panel-default">
                <header class="panel-heading">
                  Daftar Akun 
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="20%">Kode Akun</th>
                        <th width="25%">Header Akun</th>
                        <th width="25%">Nama Akun</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              $no = 1;
                              foreach($result as $data){ // $result harus sama seperti di controller
                                echo "
                                <tr>
                                    <td>".$data['kode_akun']."</td>
                                    <td>".$data['header_akun']."</td>
                                    <td>".$data['nama_akun']."</td>
                                    <td>".anchor('akun/edit/'.$data['kode_akun'],'Edit', array('class' => 'btn btn-warning'))."</td> </tr>";
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