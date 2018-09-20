<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cal Animage Epsilon</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

<!-- <script type='text/javascript'
	src='http://vectorart.org/wp-content/themes/vector/images/jquery.js'></script> -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<?php 
	require_once('res/header.php');
	if(isset($_GET['p'])) {
		$p = $_GET['p'];
	}
	?>

		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<link rel="stylesheet" href="/cae/res/minified/themes/default.min.css" type="text/css" media="all" />
		<script type="text/javascript" src="/cae/res/minified/jquery.sceditor.xhtml.min.js"></script>
		<script src="/cae/res/script.js"></script>
		
		<script>
			$(function() {
				$("textarea").sceditor({
					plugins: "xhtml",
					style: "/cae/res/minified/jquery.sceditor.default.min.css"
				});
			});
		</script>
		

</head>
<body>

	<div id="wrapper">

		<div class="content">
			<div class="header"><a href="home.php?p=news"><img src="images/logo.png"></img></a></div>
			<div id="header">
				<div id="menu">

					<ul>
						<a href="home.php"><li>home</li></a>
						<!--<a href="/cae/home.php?p=membership"><li>membership</li></a>-->
						<a href="/cae/home.php?p=events"><li>
							events
							<ul>
								<a href="/cae/home.php?p=calendar"><li>calendar</li></a>
							</ul>
						</li></a>
						<a href="/cae/home.php?p=masquerade"><li>masquerade</li></a>
						<!--<a href="https://plus.google.com/photos/108432226085179323981/albums"><li>photos</li></a>-->
                        <a href="/cae/home.php?p=shows"><li>
                            shows
                            <ul>
								<a href="/cae/home.php?p=shows&current=past"><li>past shows</li></a>
								<a href="/cae/home.php?p=shows&current=true"><li>current shows</li></a>
								<a href="/cae/home.php?p=shows&current=upcoming"><li>upcoming shows</li></a>
							</ul>
						</li></a>
						<a href="/cae/home.php?p=about"><li>
							about us
							<ul>
								<a href="/cae/home.php?p=officers"><li>officers</li></a>
                            </ul>
                        </li></a>
						<!--<a href="/cae/a/index.html"><li>board</li></a>-->
						<?php 
						if(isset($_SESSION['username'])) {
							echo('<a href="home.php?p=admincp"><li>Admin CP</li></a>');
						}?>
					</ul>
				</div>
				<!-- menu -->

			</div>
			<!--header-->
			<div id="maincontent">
				<div class="sidebar">
					<a href="?p=shows&current=true" style="text-decoration:none; color:#666666;"><center><strong>Currently Showing</strong></center></a>
					<?php include('res/slideshow.php')?>

					<div>
						<hr noshade="noshade"/>
						<table style="width: 100%;" class="info_table">
							<tr><td colspan="2" style="text-align: center;">Club Information</td></tr>
							<tr><td>Room</td><td style="text-align: right;">DBH 1300</td></tr>
							<tr><td>Time</td><td style="text-align: right;">Thursdays at 7:00 PM</td></tr>
							<tr><td>Mailing List</td><td style="text-align: right;"><a class="item_add" href="https://mail.clubs.uci.edu/mailman/listinfo/cae-list">Here</a></td></tr>
						</table>
						<hr noshade="noshade"/>
						<br />
					</div>

					<a href="http://www.classrooms.uci.edu/GAC/DBH1300.html"><img style="max-width:285px;" src="http://www.classrooms.uci.edu/gac/mapgrids/DBH.png"></a><!---->
					
					<a href="https://www.facebook.com/groups/calanimageepsilon/"><img src="images/fb.png" alt="" border="0" style="width:140px; height:140px;"/></a>
					<!--a href="https://twitter.com/CalAnimeEpsilon"><img src="https://g.twimg.com/Twitter_logo_blue.png" alt="" border="0" class="noright" style="width:140px; height:140px;"/></a> -->
					<a href="#"><img alt="" border="0" /></a> 
					<a href="#"><img alt="" border="0" class="noright" /></a>

				</div>
				<!--sidebar-->
				<div id="container">
					<?php 
						include('res/display.php');
						if (isset($_GET['p'])) {
							$page = $_GET['p'];
							if($page == 'news' || $page == 'events') {
								display_news();
							} if ($page == 'admincp') {
								include('res/admincp.php');
							} if ($page == 'shows') {
								display_shows();
							} if ($page == 'membership' || 'masquerade') {
								display_page();
							} if ($page == 'officers') {
								display_officers();
							} if ($page == 'calendar') {
								include('res/calendar.php');
							}
						} else {
							display_news();
						}
					?>
				</div>
				<!--container-->
			</div>
			<!--maincontent -->
		</div>
		<!--content-->

	</div>
	<!--wrapper-->

	<div id="footer">
	<p class="footer">
		Wanna contact us? E-Mail us at: <a class="footerlink" stlye="color:#666666;" href="mailto:cal.animage.epsilon@gmail.com">cal.animage.epsilon@gmail.com</a><br />
		This site is best viewed using IE 9.0 or higher, Firefox 4.0 or higher, Opera 10.5 or higher, and Safari/Chrome 3.0/1.0 or higher.<br />
		Copyright © 1990-2014 by Cal Animage Epsilon<br />
	</p>
	</div>
	<!--footer-->
	<script type="text/javascript">
		console.log(window.location.href.replace('http://'.$base_url.'/cae/home.php?p=admincp&a=edit_page&n=', ''));
		if(window.location.href.indexOf("edit_news")) {
			$('#edit_select').val(window.location.href.replace('http://'.$base_url.'/cae/home.php?p=admincp&a=edit_news&n=', ''));
		} else if (window.location.href.indexOf("edit_page") {
			$('#edit_select').val(window.location.href.replace('http://'.$base_url.'/cae/home.php?p=admincp&a=edit_page&n=', ''));
		} else if (window.location.href.indexOf("edit_shows") {
			$('#current_select').val($current);
		}
		
	</script>
</body>
</html>
