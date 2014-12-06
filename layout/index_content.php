 <div class="container">
 	<center>
 	<div class="login_box">
	<a href="<?php echo SITE_URL; ?>/dropbox_login.php"><button class="btn btn-primary">Login Using Dropbox</button></a>
		<form class="form-signin" role="form" method="post" action="" enctype="multipart/form-data">
        	<h2 class="form-signin-heading">Please Log in</h2>
        	<input type="text" name="email" class="form-control" placeholder="Email Address" required autofocus>
        	<input type="password" class="form-control" name="password" placeholder="Password" id="login_password">
        	<input type="submit" name="submit" class="btn btn-primary btn-block" id="sign_in" value="Login">
       </form>
	</div>
	</center>
</div> <!-- /container -->