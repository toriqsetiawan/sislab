<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Login Admin Sistem Management Asisten</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
</head>
<body>
<div class="container">
	<section id="content">
		<form action='<?php echo base_url();?>login/process' method='post' name='process'>
			<h1>Login Form</h1>
			<br>
			<?php 
				if(! is_null($msg)) {
					echo $msg;
					echo '<script type="text/javascript">
					   		setInterval(function(){
					   			window.location.href = "/sislab/e-admin";
					   		},1500);
						  </script>';
				}
			?>
			<br>
			<div>
				<input type="hidden" id="login" name="login" value="<?php echo $token; ?>" />
				<input type="text" placeholder="Username" required="" id="username" name="username" value="" autocomplete="off"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" name="password" value="" autocomplete="off"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
				<!--<a href="#">Lost your password?</a>-->
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>