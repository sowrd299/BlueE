<?php
$con = mysql_connect("localhost:11211","cae","123poop");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

  mysql_select_db("cae", $con);

  function make_Table()
{
	mysql_select_db("cae", $con);
	$sql = "CREATE TABLE Library
	(
	animeID int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(animeID),
	Title varchar(150),
	Episodes int,
	Quality varchar(5),
	Link varchar(150),
	Incomplete boolean
	)";

	// Execute query
	mysql_query($sql,$con);
}

function add_Anime($title, $episodes, $quality, $link, $incomplete)
{
	mysql_select_db("cae", $con);
	//make sure link has http:// so that it's treated as a link
	//$link = $_POST['alink'];
	if(strpos($link, 'http') !== 0)
	{
		$link = "http://" . $link;
	}

	$incomplete = ($incomplete == 1);

	//$title = $_POST['atitle'];
	//$episodes = $_POST['aepisodes'];
	//$quality = $_POST['aquality'];

	//insert the data
	$sql="INSERT INTO Library (Title, Episodes, Quality, Link, Incomplete)
	VALUES ('$title','$episodes','$quality','$link','$incomplete')
	";
	if (!mysql_query($sql,$con))
  {
  die(mysql_error());
  }
}

function remove_Anime($title)
{
	mysql_select_db("cae", $con);
	$sql="DELETE FROM Library WHERE Title='$title'";
	if (!mysql_query($sql,$con))
	{
		die(mysql_error());
	}
}

function show_all_Anime()
{
	//Output everthing from the table:
	//echo "All the stored information: <p />";

	echo "#";
	for ($i = 0; $i< 9; $i++)
	{
		show_Anime($i);
	}
	echo "<p />";
	foreach(range('A','Z') as $letter)
	{
	   echo "<h3>$letter</h3>";
	   show_Anime($letter);
	   echo "<p />";
	}
}

function show_Anime($letter)
{
	//Output everthing from the table:
	//echo "All the stored information: <p />";
	$result = mysql_query("SELECT * FROM Library  WHERE Title LIKE '$letter%' ORDER BY Title");

	while($row = mysql_fetch_array($result))
	{
		echo $row['Title'] . " - ";
		if($row['Episodes'] < 0) //Movies will have negative episodes to denote Movie Count
		{
			if($row['Episodes'] == -1)
				echo "1 Movie -";
			else echo $row['Episodes']*(-1) . " Movies -";
		}
		else
			echo $row['Episodes'] . " Episodes - ";
		echo $row['Quality'] . " ";
		echo "<a href=" . $row['Link'] . ">[More Info]</a>" . " ";
		if($row['Incomplete'] == 1)
			echo "(Incomplete)";
		echo "<br />";

	}

}


function pic_Load()
{
	// '<!-- Javascript for slideshot in the \'Currently Showing\' section -->';
	echo '<script type="text/javascript">';
	echo "\n";
	echo '<!--';
	echo "\n";
	echo '	var image1=new Image()';
	echo "\n";
	echo '	image1.src="./Images/showing1.jpg"';
	echo "\n";
	echo '	var image2=new Image()';
	echo "\n";
	echo '	image2.src="./Images/showing2.jpg"';
	echo "\n";
	echo '	var image3=new Image()';
	echo "\n";
	echo '	image3.src="./Images/showing3.jpg"';
	echo "\n";
	echo '	var image4=new Image()';
	echo "\n";
	echo '	image4.src="./Images/showing4.jpg"';
	echo "\n";
	echo '	var image5=new Image()';
	echo "\n";
	echo '	image5.src="./Images/showing5.jpg"';
	echo "\n";
	echo '	image6.src="./Images/showing6.jpg"';
	echo "\n";
	echo '	//-->';
	echo "\n";
	echo '</script>';
}

function now_Showing()
{
	echo '
	<p class="arial_text">Location EH1200
		<br />
		Thursdays 7:00pm
		<br />
		<li>Ookami-san and Her Seven Companions</li>
		<li>Accel World</li>
		<li>Attack on Titan</li>
		<li>Tiger & Bunny</li>
		<li>Genshiken</li>
		<li>Usagi Drop</li>
		<br />
	<p/>
	';
}

?>
