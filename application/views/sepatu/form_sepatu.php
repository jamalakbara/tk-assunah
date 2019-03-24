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
                    <div class="title">Entry Data Sepatu</div>
                </div>
            </div>
            <div class="panel-body">
               
            <form role="form" method="POST" action="<?php echo site_url('sepatu/simpan_sepatu'); ?>">

              <div class="form-group">
                <label>Kode Sepatu :</label>
                <input class="form-control" name="kode_sepatu" placeholder="Masukkan Kode Sepatu">
                <?php echo form_error('kode_sepatu'); ?>
              </div>

              <div class="form-group">
                <label>Jenis Sepatu :</label>
                <input class="form-control" name="jenis_sepatu" placeholder="Masukkan Jenis Sepatu">
                <?php echo form_error('jenis_sepatu'); ?>
              </div>

                <div class="form-group">
                <label>Keterangan :</label>
                <textarea class="form-control" rows="5" name="ket" placeholder="Masukkan Keterangan"></textarea>
                <?php echo form_error('ket'); ?>
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
