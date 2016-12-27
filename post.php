<?php

	$reqKeys = array_keys($_REQUEST);
	$_REQUEST['url'] = $_REQUEST['url'] . '?';
	for ($i = 0; $i < count($reqKeys); $i++) {
		$_REQUEST['url'] = $_REQUEST['url'] . $reqKeys[$i] . '=' . $_REQUEST[$reqKeys[$i]] . '&';
	}
	$ch = curl_init(); 
	$timeout = 5; 
	curl_setopt ($ch, CURLOPT_URL, $_REQUEST['url']); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
	$file_contents = curl_exec($ch); 
	curl_close($ch); 
	echo $file_contents; 
?>