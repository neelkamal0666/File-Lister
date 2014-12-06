<?php session_start();
require_once("../../config/globals.php");
require_once("../../config/db_connect.php");
    $fname=strip_tags($_REQUEST['fname']);
	$lname=strip_tags($_REQUEST['lname']);
	$email=strip_tags($_REQUEST['email']);
	$password=md5(strip_tags($_REQUEST['password']));
	$gen=strip_tags($_REQUEST['gender']);
	$fname=ucfirst(strtolower($fname));
	$lname=ucfirst(strtolower($lname));
	$email=strtolower($email);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  // The email address is valid
		$conn=connect_db();
		$sql_check = execute_query("select email from ".DB_PREFIX."users where email='".$email."'") or die(mysql_error());
		if(mysql_num_rows($sql_check)){
			echo $msg='<STRONG>'.$email.'</STRONG> is already in use.';
		} else if($fname=='' || $email=='' || $password=='' || $gen=='') {
			echo $msg="All Fields Are Compulosry.";
		} else { 
			$sql_query = "insert into ".DB_PREFIX."users SET 
			fname='".$fname."',
			lname='".$lname."',
			email='".$email."',
			password='".$password."',
			gender='".$gen."'";
			$rs = execute_query($sql_query);
			if($rs){
				$_SESSION['email']=$email;
				$_SESSION['profile_id']=mysql_insert_id();
				echo 1;
			 } else {  
				echo $error = "Registration Unsuccessful";
			 }
		}
	} else { 
		echo $msg1="You must enter a valid email address"; 
	} 
close_db($conn);
?>
			