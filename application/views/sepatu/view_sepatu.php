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
        <a href="<?php echo site_url('sepatu/form_sepatu');?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode Sepatu</th>
                        <th>Jenis Sepatu</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($result as $data) {
                      echo"
                      <tr>
                          <td>".$data['kode_sepatu']."</td>
                          <td>".$data['jenis_sepatu']."</td>
                          <td>".$data['ket']."</td>
                          
                          <td>".anchor('sepatu/edit/'.$data['kode_sepatu'],'Edit', array('class' => 'btn btn-warning'))."</td>";?>
       
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