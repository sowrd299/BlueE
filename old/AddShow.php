<html>
<body>
<?php

//Basic Setup
include 'include.php';
//connect to the proper database
mysql_select_db("cae", $con);

?>

<form action="AddShow.php" method="post">

Title: <input type="text" name="atitle" />
Episodes: <input type="text" name="aepisodes" />
Quality: <input type="text" name="aquality" />
Link: <input type="text" name="alink" />
Incomplete: <input type="checkbox" name="aincomplete" value="1" />

<input type="submit" value="Add/Update Show"/>
<br />
Remove: <input type="checkbox" name="aremove" value="1" />
</form>
<?php

//Pocess any added anime titles someone's clicked the link
if(isset($_POST['atitle']))
{
	
	//make sure link has http:// so that it's treated as a link
	$link = $_POST['alink'];
	if(strpos($link, 'http') !== 0)
	{
		$link = "http://" . $link;
	}
	
	$incomplete = ($_POST['aincomplete'] == 1);
	
	$title = $_POST['atitle'];
	$episodes = $_POST['aepisodes'];
	$quality = $_POST['aquality'];
	
	//insert the data
	$sql="
	INSERT INTO Library 
		(Title, Episodes, Quality, Link, Incomplete)
	VALUES 
		('$title','$episodes','$quality','$link','$incomplete')
	ON DUPLICATE KEY UPDATE
		Episodes='$episodes',Quality='$quality',Link='$link',Incomplete='$incomplete'
	";
	//process removing a show too
	if($_POST['aremove'] == 1)
	{
		$sql="DELETE FROM Library WHERE Title='$title'";
	}
	//do the SQL Stuff
	mysql_query($sql,$con);

}

show_all_Anime();
?>




</body>
</html>