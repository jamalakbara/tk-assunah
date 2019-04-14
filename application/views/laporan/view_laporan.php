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
                    <li class="active"><a href="<?php echo site_url('laporan/lihat_laporan'); ?>"><i class="fa fa-table"></i> Laporan Realisasi Anggaran</a></li>
                
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
             
                <section class="panel panel-default">
                <header class="panel-heading">
                  Laporan Realisasi Anggaran 
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="20%">No</th>
                        <th width="20%">Uraian</th>
                        <th width="25%">Anggaran</th>
                        <th width="25%">Realisasi <?= ' '.date('Y')?></th>
                        <th width="15%">(%)</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr style='font-weight: bold'>
                            <td>1</td>
                            <td>PENDAPATAN</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                      <?php
                              $no = 2;
                              foreach($anggaran_pendapatan as $d){ // $result harus sama seperti di controller
                                if($d['nama_akun'] == 'Pendapatan SPP'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$d['nama_akun']."</td>
                                      <td>".format_rp($d['total'])."</td>
                                      <td>".format_rp($realisasiS)."</td>
                                      <td>".round((($d['total']-$realisasiS)/($d['total']))*(100),2)."</td> 
                                  </tr>";
                                }elseif ($d['nama_akun'] == 'Pendapatan Pendaftaran'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$d['nama_akun']."</td>
                                      <td>".format_rp($d['total'])."</td>
                                      <td>".format_rp($realisasiP)."</td>
                                      <td>".round((($d['total']-$realisasiP)/($d['total']))*(100),2)."</td> 
                                  </tr>";
                                }
                                $no++;
                                }
                    ?>
                        <tr style='font-weight: bold'>
                            <td><?= $no?></td>
                            <td>Jumlah PENDAPATAN</td>
                            <td><?= format_rp($total_pendapatan)?></td>
                            <td><?= format_rp($jumlah_realisasi_pendapatan)?></td>
                            <td><?= round((($total_pendapatan-$jumlah_realisasi_pendapatan)/($total_pendapatan))*(100),2)?></td>
                        </tr>
                        <tr style='font-weight: bold'>
                            <?php $no++?>
                            <td><?= $no?></td>
                            <td>BELANJA</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                              foreach($anggaran_beban as $da){ // $result harus sama seperti di controller
                                $no++;
                                if($da['nama_akun'] == 'Beban ATK'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$da['nama_akun']."</td>
                                      <td>".format_rp($da['total'])."</td>
                                      <td>".format_rp($beban_atk)."</td>
                                      <td>".round((($da['total']-$beban_atk)/($da['total']))*(100),2)."</td>
                                  </tr>";
                                }elseif($da['nama_akun'] == 'Beban Konsumsi'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$da['nama_akun']."</td>
                                      <td>".format_rp($da['total'])."</td>
                                      <td>".format_rp($beban_konsumsi)."</td>
                                      <td>".round((($da['total']-$beban_konsumsi)/($da['total']))*(100),2)."</td>
                                  </tr>";
                                }elseif($da['nama_akun'] == 'Beban Kas PKG, IGTKI, GGS'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$da['nama_akun']."</td>
                                      <td>".format_rp($da['total'])."</td>
                                      <td>".format_rp($beban_kas)."</td>
                                      <td>".round((($da['total']-$beban_kas)/($da['total']))*(100),2)."</td>
                                  </tr>";
                                }elseif($da['nama_akun'] == 'Beban Listrik'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$da['nama_akun']."</td>
                                      <td>".format_rp($da['total'])."</td>
                                      <td>".format_rp($beban_listrik)."</td>
                                      <td>".round((($da['total']-$beban_listrik)/($da['total']))*(100),2)."</td>
                                  </tr>";
                                }elseif($da['nama_akun'] == 'Beban Seminar'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$da['nama_akun']."</td>
                                      <td>".format_rp($da['total'])."</td>
                                      <td>".format_rp($beban_seminar)."</td>
                                      <td>".round((($da['total']-$beban_seminar)/($da['total']))*(100),2)."</td>
                                  </tr>";
                                }elseif($da['nama_akun'] == 'Beban Perbaikan (Service)'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$da['nama_akun']."</td>
                                      <td>".format_rp($da['total'])."</td>
                                      <td>".format_rp($beban_service)."</td>
                                      <td>".round((($da['total']-$beban_service)/($da['total']))*(100),2)."</td>
                                  </tr>";
                                }elseif($da['nama_akun'] == 'Beban Lain-lain'){
                                  echo "
                                  <tr>
                                      <td>".$no."</td>
                                      <td>".$da['nama_akun']."</td>
                                      <td>".format_rp($da['total'])."</td>
                                      <td>".format_rp($beban_lain)."</td>
                                      <td>".round((($da['total']-$beban_lain)/($da['total']))*(100),2)."</td>
                                  </tr>";
                                }
                              }
                    ?>
                        <tr style='font-weight: bold'>
                            <?php $no++?>
                            <td><?= $no?></td>
                            <td>Jumlah BELANJA</td>
                            <td><?= format_rp($total_beban)?></td>
                            <td><?= format_rp($jumlah_realisasi_beban)?></td>
                            <td><?= round((($total_beban-$jumlah_realisasi_beban)/($total_beban))*(100),2)?></td>
                        </tr>
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