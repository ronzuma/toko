<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo config_item('assets'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo config_item('assets'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo config_item('assets'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo config_item('assets'); ?>index2.html"><b>lee</b>Buy</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>

      <?php echo form_open('secure', array('id' => 'FormLogin')); ?>
        <div class="input-group mb-3">
		<?php 
			echo form_input(array(
				'name' => 'username', 
				'class' => 'form-control', 
				'autocomplete' => 'off', 
				'autofocus' => 'autofocus',
				'placeholder' => 'Username'
			)); 
		?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <?php 
			echo form_password(array(
				'name' => 'password', 
				'class' => 'form-control', 
				'id' => 'InputPassword',
				'placeholder' => 'Password'
			)); 
		?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
	  <?php echo form_close(); ?>
	  </br>
	<div id='ResponseInput'></div>
      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo config_item('assets'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo config_item('assets'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo config_item('assets'); ?>dist/js/adminlte.min.js"></script>
	<script>
	$(function(){
		//------------------------Proses Login Ajax-------------------------//
		$('#FormLogin').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: $(this).attr('action'),
				type: "POST",
				cache: false,
				data: $(this).serialize(),
				dataType:'json',
				success: function(json){
					//response dari json_encode di controller

					if(json.status == 1){ window.location.href = json.url_home; }
					if(json.status == 0){ $('#ResponseInput').html(json.pesan); }
					if(json.status == 2){
						$('#ResponseInput').html(json.pesan);
						$('#InputPassword').val('');
					}
				}
			});
		});

		//-----------------------Ketika Tombol Reset Diklik-----------------//
		$('#ResetData').click(function(){
			$('#ResponseInput').html('');
		});
	});
	</script>
</body>
</html>
