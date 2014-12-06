<?php
require_once("../../config/globals.php");
require_once("../../config/db_connect.php");
 // This is a sample code in case you wish to check the username from a mysql db table
if(isset($_POST['email'])) {
	$email = $_POST['email'];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  // The email address is valid
		connect_db();
		$sql_check = mysql_query("select email from ".DB_PREFIX."users where email='".$email."'") or die(mysql_error());
		if(mysql_num_rows($sql_check)){
			echo '<div class="alert alert-danger"><center><STRONG>'.$email.'</STRONG> is already in use.</center></div>';
		} else {
			echo '<div class="alert alert-info"><center>Available</center></div>';
		}
	} else { 
	echo '<div class="alert alert-danger"><center><STRONG>'.$email.'</STRONG> is not a valid email address.</center></div>';
	}
}

?>