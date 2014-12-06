<div class="home_page">
<center>Dropbox files : <br /></center>
	<?php 
	$dropbox = new DropboxClient(array(
	'app_key' => ACCESS_KEY, 
	'app_secret' => SECRET_KEY,
	'app_full_access' => true,
	),'en');
	$access_token = load_token("access");
	if(!empty($access_token)) {
		$dropbox->SetAccessToken($access_token);
	}
	$files = $dropbox->GetFiles("",false);
	//var_dump($files);
	$file = array_keys($files);
	for($i=0; $i< sizeof($file);$i++){
	echo '<b>File/Folder Name :</b>'.$file[$i].'  <a href="'.$dropbox->GetLink($files[$file[$i]]).'" target="_Blank">View on Dropbox</a><br />';
	echo '<b>Path : </b>'; echo $p = $files[$file[$i]]->path; echo ', ';
	$meta_data = $dropbox->GetMetadata($p);
	echo ' <b>Size : </b>'.$meta_data->size.', ';
	if(isset($meta_data->client_mtime)){
	echo ' <b>Client Time : </b>'.$meta_data->client_mtime.', ';
	}
	echo ' <b>Modified on : </b>'.$meta_data->modified.'<br />';
	echo '<hr />';
	}
	?>
	
	
</div>