<?php function main_header($page,$title,$meta_link) { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php echo $meta_link; ?>

    <title><?php echo $title;?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo SITE_URL;?>/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo SITE_URL;?>/css/file_lister.css" rel="stylesheet">
    <link href="<?php echo SITE_URL;?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo SITE_URL; ?>" style="font-size:25px; ">File Lister</a>
        </div>
        <div class="navbar-collapse collapse">
		<?php if($page == 'signup') { ?>
		 <a href="<?php echo SITE_URL; ?>/"><button class="btn btn-primary btn-block" id="singup_nav">Sign in</button></a>
		 <?php } else if($page == 'login'){ ?>
		 <a href="<?php echo SITE_URL; ?>/signup"><button class="btn btn-primary btn-block" id="singup_nav">Sign Up</button></a>
		 <?php } else {?>
		  <a href="<?php echo SITE_URL; ?>/lib/logout.php"><button class="btn btn-primary btn-block" id="singup_nav">Log Out</button></a>
		 <?php } ?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<?php }  ?>