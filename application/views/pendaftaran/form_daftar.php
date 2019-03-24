<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" >
</head>
<body>
  <section class="scrollable padder">
        <section id="content">
            <section class="vbox">
                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                    <li><a href="<?php echo site_url()."/beranda"?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?php echo site_url('pendaftaran/lihat_daftar'); ?>"><i class="fa fa-table"></i> Pendaftaran Murid Baru</a></li>
                    <li class="active">Formulir Pendaftaran</li>
                </ul>
            </section>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Formulir Pendaftaran</div>
                </div>
            </div>
            <div class="panel-body">
            <form action="<?php echo site_url()."/pendaftaran/selesai_daftar/$no_pendaftaran/"?>" method="POST">
		          <div class="form-group">
                <label>Nomor Pendaftaran :</label>
                <input type = "text" name = "no_pendaftaran" class = "form-control" value = "<?php echo $no_pendaftaran;?>" readonly>
                <?php echo form_error('no_pendaftaran'); ?>
              </div>

              <div class="form-group">
                <label>Nomor Induk Siswa :</label>
                <input class="form-control" name="nis" placeholder="Masukkan Nomor Induk Siswa">
                <?php echo form_error('nis'); ?>
              </div>

              <div class="form-group">
                <label>Nama Siswa :</label>
                <input class="form-control" name="nama_siswa" placeholder="Masukkan Nama Siswa">
                <?php echo form_error('nama_siswa'); ?>
              </div>

              <div class="form-group">
                <label>Tempat Lahir :</label>
                <input class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                <?php echo form_error('tempat_lahir'); ?>
              </div>

               <div class="form-group">
                <label>Tanggal Lahir :</label>
                <input class="form-control" name="tgl_lahir" type="date" placeholder="Masukkan tanggal produksi">
                <?php echo form_error('tgl_lahir'); ?>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin :</label>
                <select name="gender" class="form-control">
                  <option value="#" selected disabled>Pilih Jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                  <?php echo form_error('gender'); ?>
              </div>

              <div class="form-group">
                <label>Nama Orang Tua :</label>
                <input class="form-control" name="nama_ortu" placeholder="Masukkan Nama Orang Tua">
                <?php echo form_error('nama_ortu'); ?>
              </div>

              <!-- <div class="form-group">
                <label>Nama Siswa :</label>
                <select name = "nama_siswa" class = "form-control">
                  <option value="#" disabled selected>Pilih Siswa</option>
                <?php
                  foreach($siswa as $data){
                    echo "<option value = ".$data['nama_siswa'].">".$data['nama_siswa']."</option>";
                  }
                ?>
                </select>
                <?php echo form_error('nama_siswa'); ?>
              </div> -->

             
              <div class="form-group">
              <label>Tanggal Pendaftaran</label>
              <input type = "text"  name='tgl_daftar' class = "form-control"  value = "<?php echo date('y-m-d');?>" readonly>
              <?php //echo form_error('tgl_daftar'); ?>
              </div>


               <div class="form-group">
                <label>Rincian Pembayaran :</label>
                <select name = "rincian" class = "form-control">
                  <!-- <option value="#" disabled selected>Pilih Rincian</option> -->
                <?php
                  foreach($rincian as $data){
                    echo "<option value = ".$data['no_rincian'].">".$data['jenis_rincian']."</option>";
                  }
                ?>
                </select>
                <?php echo form_error('rincian'); ?>
              </div>

               <!-- <div class="form-group">
                <label>Total Biaya :</label>
                <?php
                  foreach($rincian as $data){
                    echo "<input class='form-control' name='total' value='".$data['total']."' readonly>";
                  }
                ?>
                <?php echo form_error('total'); ?>
              </div> -->
              <table class = 'table table-bordered'>
                <tr>
                  <th>Rincian Pembayaran</th>
                  <th>Total Biaya</th>
                </tr>
                <?php
                $total = 0;
                  foreach($detail as $data){
                    echo "
                      <tr>
                        <td align = 'right'>".$data['nama_rincian']."</td>
                        <td align = 'right'>".$data['total']."</td>
                      </tr>
                    ";
                    $total += $data['total'];
                  }
                ?>
                <tr>
                <td colspan="3">Total</td>
                <td align="right">
                <?php echo  format_rp($total);?>
                </td>
              </tr>
            </table>
              <button type="submit" class="btn btn-default btn-primary">Tambah Pendaftar</button><br><br>
          </form>
              
            <!-- <a href = "<?php echo site_url()."/pendaftaran/selesai_daftar/$no_pendaftaran/"?>" class="btn btn-info" role="button">Selesai</a> -->
	</body>
</html>