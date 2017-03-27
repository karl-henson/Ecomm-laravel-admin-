<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
  </head>
  <body id="login">
    <div class="container">
		<form class="form-signin" action="/login" method="post">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
	        <h2 class="form-signin-heading">Please sign in</h2>
	        <input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
	        <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
	        <label class="checkbox">
	          <input type="checkbox" value="remember-me"> Remember me
	        </label>
	        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
			@if ($data['error'] == 'yes')
				<br><br>
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<br>Invalid username and password!
				</div>
			@endif
    	</form>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>