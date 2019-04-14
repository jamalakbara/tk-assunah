<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
  <section class="vbox">
    <section class="scrollable padder">
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Beranda</a></li>
      </ul>
      <div class="m-b-md">
        <h3 class="m-b-none">Selamat Datang</h3>
        <!--<small>Tuan/Nyonya</small>-->
      </div>
      <div class="chart-container \">
        <canvas id="myChart"></canvas>
      </div>
    </section>

  </section>

  <div style='display:none'>
    <?php foreach ($anggaran as $data){ ?>
      <p id='total'><?= $data['total']?></p>
    <?php }?>
    <?php foreach ($anggaran as $data){ ?>
      <p id='akun'><?= $data['nama_akun']?></p>
    <?php }?>
    <p id='pengeluaran'><?= $beban_atk?></p>
    <p id='pengeluaran'><?= $beban_konsumsi?></p>
    <p id='pengeluaran'><?= $beban_kas?></p>
    <p id='pengeluaran'><?= $beban_listrik?></p>
    <p id='pengeluaran'><?= $beban_seminar?></p>
    <p id='pengeluaran'><?= $beban_service?></p>
    <p id='pengeluaran'><?= $beban_lain?></p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="<?= base_url('assets/js/charts/chartjs/chart_script.js')?>"></script>
</body>

</html>