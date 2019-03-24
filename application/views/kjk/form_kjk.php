<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" >
</head>
<body>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">Entry Kartu Jam Kerja</div>
                </div>
            </div>
            <div class="panel-body">
    <form action="<?php echo site_url('kjk/simpan_kjk'); ?>" method="POST">
		          <div class="form-group">
                <label>ID KJK :</label>
                <input class="form-control" name="id_kjk" placeholder="Masukkan ID KJK">
                <?php echo form_error('id_kjk'); ?>
              </div>

              <div class="form-group">
                <label>ID Pegawai :</label>
                <select name="id_pegawai" class="form-control">
                  <option value="" selected="">Masukkan ID Pegawai</option>
                    <?php
                      foreach($id_pegawai as $data){
                        echo "<option value = ".$data['id_pegawai'].">".$data['id_pegawai']."</option>";
                      }
                  ?>
                </select>
                  <?php echo form_error('id_pegawai'); ?>
              </div>

               <div class="form-group">
                <label>Tanggal Produksi :</label>
                <input class="form-control" name="tgl_kjk" type="date" placeholder="Masukkan tanggal produksi">
                <?php echo form_error('tgl_kjk'); ?>
              </div>

               <div class="form-group">
                <label>Total Produksi :</label>
                <input class="form-control" name="total_produksi" placeholder="Masukkan total produksi">
                <?php echo form_error('total_produksi'); ?>
              </div>

             
              <div class="form-group">
                <label>Jenis Sepatu :</label>
                <select name="jenis_sepatu" class="form-control">
                  <option value="" selected="">Masukkan Jenis Sepatu</option>
                    <?php
                      foreach($jenis_sepatu as $data){
                        echo "<option value = ".$data['kode_sepatu'].">".$data['jenis_sepatu']."</option>";
                      }
                  ?>
                </select>
                  <?php echo form_error('jenis_sepatu'); ?>
              </div>

              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa fa-save"></i> Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
	</body>
</html>