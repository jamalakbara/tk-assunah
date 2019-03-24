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
                    <li class="active">Transaksi Pelunasan SPP</li>
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
              <a href="<?php echo site_url('terima_spp/form_terimaspp'); ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-fw fa fa-plus"></i> Pelunasan SPP</a>
              <br><br>
                <section class="panel panel-default">
                <header class="panel-heading">
                  DataTables 
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="20%">No. Pelunasan</th>
                        <th width="25%">No. SPP</th>
                        <th width="25%">Tanggal Pelunasan</th>
                        <th width="15%">Jumlah Pelunasan</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              $no = 1;
                              foreach($result as $data){ // $result harus sama seperti di controller
                                echo "
                                <tr>
                                    <td>".$data['no_terima']."</td>
                                    <td>".$data['no_spp']."</td>
                                    <td>".$data['tgl_terima']."</td>
                                    <td>".format_rp($data['jumlah_terima'])."</td>
                                    <td>".anchor('terima_spp/edit/'.$data['no_spp'],'Edit', array('class' => 'btn btn-warning'))."</td> </tr>";
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