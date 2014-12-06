<?php
session_start();
set_time_limit(0);

require_once("lib/dropbox/DropboxClient.php");
require_once("config/globals.php");
require_once("config/db_connect.php");
require_once("lib/general_functions.php");
$dropbox = new DropboxClient(array(
	'app_key' =>ACCESS_KEY, 
	'app_secret' => SECRET_KEY,
	'app_full_access' => true,
),'en');

$access_token = load_token("access");
if(!empty($access_token)) {
	$dropbox->SetAccessToken($access_token);
} elseif(!empty($_GET['auth_callback'])) // are we coming from dropbox's auth page?
{
	// then load our previosly created request token
	$request_token = load_token($_GET['oauth_token']);
	if(empty($request_token)) die('Request token not found!');
	
	// get & store access token, the request token is not needed anymore
	$access_token = $dropbox->GetAccessToken($request_token);	
	store_token($access_token, "access");
	delete_token($_GET['oauth_token']);
}

// checks if access token is required
if(!$dropbox->IsAuthorized())
{
	// redirect user to dropbox auth page
	$return_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?auth_callback=1";
	$auth_url = $dropbox->BuildAuthorizeUrl($return_url);
	$request_token = $dropbox->GetRequestToken();
	store_token($request_token, $request_token['t']);
	header("location:{$auth_url}");
	//die("Authentication required. <a href='$auth_url'>Click here.</a>");
}

$ob = $dropbox->GetAccountInfo();
insert_user_details($ob->display_name, $ob->email);
header("location:home");

?>