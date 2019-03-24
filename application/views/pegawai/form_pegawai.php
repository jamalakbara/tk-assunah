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
                    <div class="title">Entry Data Pegawai</div>
                </div>
            </div>
            <div class="panel-body">
    <form action="<?php echo site_url('pegawai/simpan_pegawai'); ?>" method="POST">
		          <div class="form-group">
                <label>ID Pegawai :</label>
                <input class="form-control" name="id_pegawai" placeholder="Masukkan ID Pegawai">
                <?php echo form_error('id_pegawai'); ?>
              </div>

              <div class="form-group">
                <label>Nama Pegawai :</label>
                <input class="form-control" name="nama_pegawai" placeholder="Masukkan Nama Pegawai">
                <?php echo form_error('nama_pegawai'); ?>
              </div>

              <div class="form-group">
                <label>Gender :</label>
                <select name="gender" class="form-control">
                  <option value="#" selected disabled>Pilih Gender</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
                  <?php echo form_error('gender'); ?>
              </div>

              <div class="form-group">
                <label>Alamat :</label>
                <textarea class="form-control" rows="5" name="alamat" placeholder="Masukkan Alamat Disini"></textarea>
                <?php echo form_error('alamat'); ?>
              </div>

              <div class="form-group">
                <label>No HP :</label>
                <input class="form-control" name="no_hp" placeholder="Masukkan No HP">
                <?php echo form_error('no_hp'); ?>
              </div>

              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa fa-save"></i> Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
	</body>
</html>