<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <section class="scrollable padder">
        <section id="content">
            <section class="vbox">
                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                    <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">COA</li>
                </ul>
            </section>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <a href="<?php echo site_url('coa/tambah_coa'); ?>" class="btn btn-primary"> Tambah</a>
                                </div>
                            </div>
                        </div>
                      <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no = 1;
                              foreach($result as $data){ // $result harus sama seperti di controller
                                echo "
                                <tr>
                                    <td>".$no."</td>
                                    <td>".$data['kode_akun']."</td>
                                    <td>".$data['nama_akun']."</td> </tr>";
                                $no++;
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </section>

    <script src="<?php echo base_url();?>assets/ice/jquery-3.2.1.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/ice/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/ice/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
</body>
</html>