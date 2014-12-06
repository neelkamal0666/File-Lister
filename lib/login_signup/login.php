<?php 
if($_POST['submit']=='Login'){
	extract($_POST);
    $email=strip_tags($email);
	$password=md5(strip_tags($password));
 	$sql_select = "select profile_id,fname,lname from ".DB_PREFIX."users where email='".$email."' AND password='".$password."'";	
	$conn= connect_db();
	$rs = mysql_query($sql_select);
	$row=mysql_fetch_array($rs);
	close_db($conn);
	if(mysql_num_rows($rs)>0){
	    $_SESSION['email']=$email;
	    $_SESSION['fname']=$row['fname'];
	    $_SESSION['lname']=$row['lname'];
		$_SESSION['profile_id']=$row['profile_id'];
		$_SESSION['session_id']=session_id();
			
		 if(isset($_POST['remember_me'])) {
            /* Set cookie to last 1 year   */
            setcookie('login_email', $email, time()+60*60*24*365, '/', 'domain.com');
            setcookie('password_login', $password, time()+60*60*24*365, '/', 'domain.com');
			setcookie('profile_id', $_SESSION['profile_id'], time()+60*60*24*365, '/', 'domain.com');
			setcookie('login_email', $email, time()+60*60*24*365, '/', 'www.domain.com');
            setcookie('password_login',$password, time()+60*60*24*365, '/', 'www.domain.com');
			setcookie('profile_id', $_SESSION['profile_id'], time()+60*60*24*365, '/', 'www.domain.com');
		} 
	  header("location:home");
	  exit(0);
	}
	else {  
		header("location:loginerror");
	}
}
						 

?>
			