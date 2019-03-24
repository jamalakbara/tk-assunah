<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Chart Of Account</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Chart Of Account</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            	<div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            		<div class="row">
            			<div class="col-sm-12 col-md-6">
            				<a href="<?php echo site_url('coa/form_coa'); ?>" class="btn btn-primary"> Tambah</a>
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
	                  foreach($result as $data){
	                  	echo "
	                  	<tr>
	                  		<td>".$no."</td>
	                  		<td>".$data['kode_coa']."</td>
	                  		<td>".$data['nama_coa']."</td> </tr>";
	                 	$no++;
	                 	}
	                ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<!-- Data table plugin-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
</body>
</html>