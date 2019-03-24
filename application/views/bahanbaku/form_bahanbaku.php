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
                    <div class="title">Entry Data Bahan Baku</div>
                </div>
            </div>
            <div class="panel-body">
               
            <form role="form" method="POST" action="<?php echo site_url('bahanbaku/simpan_bahanbaku'); ?>">

              <div class="form-group">
                <label>ID Bahan Baku :</label>
                <input class="form-control" name="id_bb" placeholder="Masukkan ID Bahan Baku">
                <?php echo form_error('id_bb'); ?>
              </div>

              <div class="form-group">
                <label>Nama Bahan Baku :</label>
                <input class="form-control" name="nama_bb" placeholder="Masukkan Nama Bahan Baku">
                <?php echo form_error('nama_bb'); ?>
              </div>

               <div class="form-group">
                <label>Jumlah :</label>
                <input class="form-control" name="jumlah" type="number" placeholder="Masukkan jumlah">
                <?php echo form_error('jumlah'); ?>
              </div>

              <div class="form-group">
                <label>Satuan :</label>
                <select name="satuan" class="form-control">
                  <option value="" selected="">Pilih Satuan</option>
                  <option value="Meter">Meter</option>
                  <option value="Kg">Kg</option>
                  <option value="Liter">Liter</option>
                </select>
                  <?php echo form_error('satuan'); ?>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button> 
            </form>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".selectbox").select();
    });
    </script>
</body>
</html>
