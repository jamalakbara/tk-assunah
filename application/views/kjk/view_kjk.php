    <div class="header"> 
        <h1 class="page-header">
            Master Transaksi
        </h1>
        <ol class="breadcrumb">
          <li><a href="#">Pioncini</a></li>
          <li><a href="#">Beranda</a></li>
          <li class="active">Kartu Jam Kerja</li>
        </ol>               
    </div>
<!--    Hover Rows  -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="<?php echo site_url('kjk/form_kjk');?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID KJK</th>
                        <th>ID Pegawai</th>
                        <th>Tanggal Produksi</th>
                        <th>Total Produksi</th>
                        <th>Jenis Sepatu</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($result as $data) {
                      echo"
                      <tr>
                          <td>".$data['id_kjk']."</td>
                          <td>".$data['id_pegawai']."</td>
                          <td>".$data['tgl_kjk']."</td>
                          <td>".$data['total_produksi']."</td>
                          <td>".$data['jenis_sepatu']."</td>
                          
                          <td>".anchor('kjk/edit/'.$data['id_kjk'],'Edit', array('class' => 'btn btn-warning'))."</td>";?>
                                  
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