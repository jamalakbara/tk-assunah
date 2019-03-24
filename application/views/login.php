<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Login</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="index.html">Pioncini</a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Log in</strong>
        </header>
        <form action="<?php echo site_url('login/cek'); ?>" method="POST" class="panel-body wrapper-lg">
          <div class="form-group">
            <label class="control-label">Username</label>
            <input type="text" name="username" placeholder="Masukkan Username Anda" class="form-control input-lg">
            <?php echo form_error('username');?>
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" name="pass" id="inputPassword" placeholder="Masukkan Password Anda" class="form-control input-lg">
            <?php echo form_error('password');?>
          </div>
          <button type="submit" class="btn btn-info">Log in</button>
          <div class="line line-dashed"></div>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Web app framework base on Bootstrap<br>Edited by Sri Widhia Bayu Santoso<br>&copy; 2018</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo base_url();?>assets/js/app.js"></script>
  <script src="<?php echo base_url();?>assets/js/app.plugin.js"></script>
  <script src="<?php echo base_url();?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>
  
</body>
</html>