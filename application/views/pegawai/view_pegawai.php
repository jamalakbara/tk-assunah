 <div class="header"> 
        <h1 class="page-header">
            Master Data Pegawai
        </h1>
        <ol class="breadcrumb">
          <li><a href="#">Pioncini</a></li>
          <li><a href="#">Beranda</a></li>
          <li class="active">Daftar Pegawai</li>
        </ol>               
    </div>
<!--    Hover Rows  -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="<?php echo site_url('pegawai/form_pegawai');?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover" id="alert">
                <thead>
                    <tr>
                        <th>ID Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Gender</th>
                        <th>Alamat Pegawai</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($result as $data) {
                      echo"
                      <tr>
                          <td>".$data['id_pegawai']."</td>
                          <td>".$data['nama_pegawai']."</td>
                          <td>".$data['gender']."</td>
                          <td>".$data['alamat']."</td>
                          <td>".$data['no_hp']."</td>
                          
                          <td>".anchor('pegawai/edit/'.$data['id_pegawai'],'Edit', array('class' => 'btn btn-warning'))."</td>";?>
                        </tr>
                     <?php
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End  Hover Rows  -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#alert').DataTable();
} );
</script>