<?php 
function get_user_info($id){
	 $conn = connect_db();
	 $sql_user= "select fname,lname,email,gender from ".DB_PREFIX."users where profile_id='".$id."'";
	 $result_sql_user=mysql_query($sql_user);
	 $row_sql_user=mysql_fetch_assoc($result_sql_user); 
	 close_db($conn);
	 return $row_sql_user;
}
	

function store_token($token, $name)
{
	if(!file_put_contents("tokens/$name.token", serialize($token)))
		die('<br />Could not store token! <b>Make sure that the directory `tokens` exists and is writable!</b>');
}

function load_token($name)
{
	if(!file_exists("tokens/$name.token")) return null;
	return @unserialize(@file_get_contents("tokens/$name.token"));
}

function delete_token($name)
{
	@unlink("tokens/$name.token");
}
function insert_user_details($name, $email){
	$fname ='';
	$lname ='';
	if(isset($name)){
		$n = explode(' ',$name);
		if(isset($n[1])){
			$fname = $n[0];
			$lname= $n[1];
		} else {
			$fname = $n[0]; 
		}
	}
	$conn=connect_db();
	$sql_check = execute_query("select id from ".DB_PREFIX."users where email='".$email."'") or die(mysql_error());
	if(mysql_num_rows($sql_check)){
				$row = mysql_fetch_array($sql_check);
				$_SESSION['email']=$email;
				$_SESSION['profile_id']=$row['id'];;
	} else {
		$sql_query = "insert into ".DB_PREFIX."users SET 
			fname='".$fname."',
			lname='".$lname."',
			email='".$email."'";
			$rs = execute_query($sql_query);
			if($rs){
				$_SESSION['email']=$email;
				$_SESSION['profile_id']=mysql_insert_id();
				echo 1;
			 } 
	}

}

function enable_implicit_flush()
{
	@apache_setenv('no-gzip', 1);
	@ini_set('zlib.output_compression', 0);
	@ini_set('implicit_flush', 1);
	for ($i = 0; $i < ob_get_level(); $i++) { ob_end_flush(); }
	ob_implicit_flush(1);
	echo "<!-- ".str_repeat(' ', 2000)." -->";
}
?>