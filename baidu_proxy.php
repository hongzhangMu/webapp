<?php
	define("BAIDU_API", "http://api.map.baidu.com/geoconv/v1");
	define("BAIDU_API_KEY", "Fpa3NVkGHqQgWMl6cHxEr5wq");
	define("BAIDU_API_OUTPUT", "json");
	$coords = $_GET['coords'];
	$output = "json";
	$querys = array(
			"ak" => BAIDU_API_KEY,
			"coords" => $coords,
			"output" => BAIDU_API_OUTPUT
		);
	$query_str = build_query_str($querys);
	$rtn = curl_get(BAIDU_API, $querys);
	echo $rtn;


	function build_query_str($querys) {
		$query_str = "";
		foreach ($querys as $key => $value) {
			if($value !== ""){
				$query_str .= "&" . $key . "=" . $value;
			}else {
				$query_str .= "&" . $key;
			}
		}
		$query_str = substr($query_str, 1);
		return $query_str;
	}

	function curl_get($uri, $querys = array(), $headers = array(), $extra = "", $timeout = 300){
		if(!empty($querys)){
			$query_str = build_query_str($querys);
		}
		$url = $uri . "/" . $extra . "?" . $query_str;
		//var_dump($url);die();
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		if(!empty($headers)){
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$rtn = curl_exec($ch);
		curl_close($ch);
		return $rtn;
	}
