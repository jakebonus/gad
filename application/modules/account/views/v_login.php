<!DOCTYPE html>
<html lang="en">
<head>
  <?php define("VERSION", "1.0.0"); ?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo (isset($title)) ? $title . ' | GADSys' : 'Gender And Development System'; ?></title>
  <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendors/pnotify/dist/pnotify.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('vendors/pnotify/dist/pnotify.buttons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('build/css/custom.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('build/css/login.css'); ?>" rel="stylesheet">
</head>
<body class="login">
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content_section">
          <?php
          $frm_login = array(
            'id' => 'login_form',
            'name' => 'login_form',
            );
          echo form_open('', $frm_login);
          ?>
          <center>
            <img src="<?php echo base_url('build/images/logo.png'); ?>">
          </center>
          <br/>
          <div>
            <input type="text" class="form-control" id="a_username" name="a_username" placeholder="Username" required="" autofocus/>
          </div>
          <div>
            <input type="password" class="form-control" id="a_password" name="a_password" placeholder="Password" required="" />
          </div>
          <div>
            <br />
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </div>
          <br />
          <h5> <center><i class="fa fa-male"></i>&nbsp;<i class="fa fa-female"></i>&nbsp; Gender And Development System <sup><?php echo 'v'.VERSION; ?></sup></center></h5>
          </form>
      </section>
    </div>
    <center>
      <br />
      <img class="" src="<?php echo base_url('build/images/mitd1.png'); ?>" width="300px">
    </center>
  </div>
</div>

<script> var base_url = "<?php echo base_url(); ?>";</script>
<script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.js'); ?>"></script>
<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.buttons.js'); ?>"></script>
<script src="<?php echo base_url('build/js/login.js?v='.VERSION); ?>"></script>
</body>
</html>
