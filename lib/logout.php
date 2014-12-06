<?php
session_start();
require_once("../config/globals.php");
session_destroy();
setcookie('login_email', '', time()-60*60*24*365, '/', 'www.domain.com');
setcookie('password_login', '', time()-60*60*24*365, '/', 'www.domain.com');
setcookie('profile_id','', time()-60*60*24*365, '/', 'www.domain.com');
setcookie('login_email', '', time()-60*60*24*365, '/', 'domain.com');
setcookie('password_login', '', time()-60*60*24*365, '/', 'domain.com');
setcookie('profile_id', '', time()-60*60*24*365, '/', 'domain.com');
header("location:../"); 
?>