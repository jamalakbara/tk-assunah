    <div class="header"> 
        <h1 class="page-header">
            Master Data
        </h1>
        <ol class="breadcrumb">
          <li><a href="#">Pioncini</a></li>
          <li><a href="#">Beranda</a></li>
          <li class="active">Daftar Bahan Baku</li>
        </ol>               
    </div>
<!--    Hover Rows  -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="<?php echo site_url('bahanbaku/form_bahanbaku');?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID Bahan Baku</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah di Gudang</th>
                        <th>Satuan Bahan Baku</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($result as $data) {
                      echo"
                      <tr>
                          <td>".$data['id_bb']."</td>
                          <td>".$data['nama_bb']."</td>
                          <td>".$data['jumlah']."</td>
                          <td>".$data['satuan']."</td>
                          
                          <td>".anchor('bahanbaku/edit/'.$data['id_bb'],'Edit', array('class' => 'btn btn-warning'))."</td>";?>
       
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