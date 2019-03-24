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
                    <div class="title">Entry Akun</div>
                </div>
            </div>
            <div class="panel-body">
               
            <form role="form" method="POST" action="<?php echo site_url('akun/simpan_akun'); ?>">

              <div class="form-group">
                <label>Kode Akun :</label>
                <input class="form-control" name="kode_akun" placeholder="Masukkan Kode Akun">
                <?php echo form_error('kode_akun'); ?>
              </div>

               <div class="form-group">
                <label>Header Akun :</label>
                <input class="form-control" name="header_akun" type="number" placeholder="Masukkan Header Akun">
                <?php echo form_error('header_akun'); ?>
              </div>

              <div class="form-group">
                <label>Nama Akun :</label>
                <input class="form-control" name="nama_akun" placeholder="Masukkan Nama Akun">
                <?php echo form_error('nama_akun'); ?>
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
