<?php
//Basic Setup
include 'include.php';
//connect to the proper database
mysql_select_db("cae", $con);

?>

<form action="testpage.php" method="post">

Page: 
<select name="formPage">
	<option>Please Select a Page</option>
	<option value="main">Main/News</option>
	<option value="other">Some Other Page</option>
</select>

<p />

Post: <br />
<textarea rows="25" cols="100" name="formTextbox" wrap="physical">
	Please paste in the HTML code here
</textarea>

<br />
<input type="submit" value="Preview Post" />

</form>

<p />
TESTING AREA
<p />

<?php

if(isset($_POST['formPage']))
{

	$page = $_POST['formPage'];

	echo "You have selcted to edit: " . $page;
	echo "<p /> " . $_POST['formTextbox'];
}

?>
