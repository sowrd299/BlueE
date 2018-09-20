<?php
//Basic Setup
include 'include.php';
//connect to the proper database
mysql_select_db("cae", $con);


if(isset($_POST['PAGE']))
{
	echo "You hve selcted to edit :" . $_POST['PAGE']);
	//echo "<p /> " . $_POST['TEXTBOX'];
}



?>
