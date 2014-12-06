<?php 
session_start();
error_reporting(E_ALL);
require_once("lib/general_functions.php");
enable_implicit_flush();
set_time_limit(0);
require_once("config/globals.php");
require_once("config/db_connect.php");
require_once("layout/header.php");
if($_REQUEST['p'] == 'login') {
	require_once("lib/login_signup/login.php");
} else if($_REQUEST['p'] == 'signup') {
	if($_SESSION['profile_id']){
		header("location:home");
	}
	$title='Signup - File Lister';
	$meta_link='<meta name="keywords" content="File Lister." /> 
	<meta name="description" content="List files of drobox" />';
	main_header('signup',$title,$meta_link);
	require_once("layout/signup.php");
} else if($_REQUEST['p'] == 'home'){
	if(!$_SESSION['profile_id']){
		header("location:/filelister");
	}
	require_once("lib/dropbox/DropboxClient.php");
	
	main_header('home','','');
	require_once("layout/home.php");
} else {
	if($_SESSION['profile_id']){
		header("location:home");
	}
	$title='File Lister';
	$meta_link='<meta name="keywords" content="File Lister." /> 
	<meta name="description" content="List files of dropox" />';
	main_header('login',$title,$meta_link);
	require_once("layout/index_content.php");
}
require_once("layout/footer.php");
?>
			