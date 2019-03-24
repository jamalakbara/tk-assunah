<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<section class="scrollable padder">
  <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
    <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Form COA</li>
  </ul>
</section>
<section class="panel panel-default">
    <div class="row">
    	<div class="col-sm-6">
    		<section class="panel panel-default">
    			<header class="panel-heading font-bold">
			      Form elements
			    </header>
			    <div class="panel-body">
			      <form action="<?php echo site_url('coa/simpan');?>" class="form-horizontal" method="POST">
			      	<div class="form-group">
			          <label class="col-sm-2 control-label">Kode COA</label>
			          <div class="col-sm-10">
			            <input type="text" class="form-control" placeholder="Masukkan Kode COA">
			            <? echo form_error();?>
			          </div>
			        </div>
			        <div class="form-group">
			          <label class="col-sm-2 control-label">Nama COA</label>
			          <div class="col-sm-10">
			            <input type="text" class="form-control" placeholder="Masukkan Nama COA">
			            <? echo form_error();?>
			          </div>
			        </div>
					<div class="line line-dashed line-lg pull-in"></div>
			        <div class="form-group">
			          <div class="col-sm-4 col-sm-offset-2">
			            <button type="submit" class="btn btn-primary">Simpan</button>
			          </div>
			        </div>        
			      </form>
			    </div>
			</section>
		</div>
	</div>
</section>		      
</body>
</html>