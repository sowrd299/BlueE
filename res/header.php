

<?php

$base_url = 'http://clubs.uci.edu';
$quarter = 'fall';

require_once("purifier/HTMLPurifier.auto.php");
if(!function_exists('Redirect')) {
	function Redirect($url, $permanent = false)
	{
		header('Location: ' . $url, true, $permanent ? 301 : 302);
	
		exit();
	}
}
session_start();
//session_destroy();

function connect() {
	$con = mysqli_connect("localhost", "cae", "123poop", "cae");
	if(mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return($con);
}

function fail($pub, $pvt = '') {
	$msg = $pub;
	if ($pvt !== '')
		$msg .= ": $pvt";
	header('Content-Type: text/plain');
	exit("An error occurred ($msg).\n");
}

function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

?>