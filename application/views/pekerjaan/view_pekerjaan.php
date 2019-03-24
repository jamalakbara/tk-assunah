    <div class="header"> 
        <h1 class="page-header">
            Master Data Pekejaan
        </h1>
        <ol class="breadcrumb">
          <li><a href="#">Pioncini</a></li>
          <li><a href="#">Beranda</a></li>
          <li class="active">Daftar Pekerjaan</li>
        </ol>               
    </div>
<!--    Hover Rows  -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="<?php echo site_url('pekerjaan/form_pekerjaan');?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode Pekerjaan</th>
                        <th>Nama Pekerjaan</th>
                        <th>Tarif</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($result as $data) {
                      echo"
                      <tr>
                          <td>".$data['kode_pekerjaan']."</td>
                          <td>".$data['nama_pekerjaan']."</td>
                          <td>".$data['tarif']."</td>
                          
                          <td>".anchor('pekerjaan/edit/'.$data['kode_pekerjaan'],'Edit', array('class' => 'btn btn-warning'))."</td>";?>
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