<?php
	function Redirect($url, $permanent = false)
	{
		header('Location: ' . $url, true, $permanent ? 301 : 302);
	
		exit();
	}
	
	if (isset($_GET['p'])) {
		Redirect($_GET['p']);
	}
?>