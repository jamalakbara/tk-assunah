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
                    <li class="active"><i class="fa fa-table"></i> Daftar Pengeluaran Kas</li>
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
              <a href="<?php echo site_url('transbeban/form_transbeban'); ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-fw fa fa-plus"></i> Tambah Pengeluaran</a>
             
             <br><br>
                <section class="panel panel-default">
                <header class="panel-heading">
                  Daftar Pengeluaran Kas 
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="20%">No. Transaksi</th>
                        <th width="25%">Tanggal Transaksi</th>
                        <th width="25%">Total Pengeluaran</th>
                        <th width="15%">Keterangan</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              $no = 1;
                              foreach($result as $data){ // $result harus sama seperti di controller
                                echo "
                                <tr>
                                    <td>".$data['no_trans']."</td>
                                    <td>".$data['tgl_trans']."</td>
                                    <td>".format_rp($data['total'])."</td>
                                    <td>".$data['keterangan']."</td>
                                    <td>".anchor('transbeban/detail/'.$data['no_trans'],'Detail', array('class' => 'btn btn-warning'))."</td> </tr>";
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