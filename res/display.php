<?php

	function display_page() {
		$con = connect();
		$name = $_GET['p'];
		
		($stmt = $con->prepare('select id, name, content FROM pages WHERE name="?"'))
		|| fail('MySQL prepare', $con->error);
		$stmt->bind_param('s', $name)
        || fail('MySQL bind_param', $con->error);
		$stmt->execute()
		|| fail('MySQL execute', $con->error);
		$stmt->bind_result($id, $name, $content)
		|| fail('MySQL bind_result', $con->error);
		
		$newslist = [];
		
		while ($stmt->fetch()) {
			$row = [
			"id" => $id,
			"name" => $name,
			"content" => $content
			];
		
			array_push($newslist, $row);
		}
		$stmt-> close();
		
		foreach($newslist as &$res) {
			echo('
				<div class="news_body">'.$res['content'].'</div>');
		}
	}
	
	function display_officers() {
		$con = connect();
		
		//NOTE: If you are going to turn this code back on it may have an XSS vulnurability
		// ...so fix that first before you start using it again
        /*
        ($stmt = $con->prepare('SELECT name, about, picture FROM board_mods ORDER BY id ASC'))
        || fail('MySQL prepare', $con->error);
        $stmt->execute()
        || fail('MySQL execute', $con->error);
        $stmt->bind_result($name, $about, $picture)
        || fail('MySQL bind_result', $con->error);
        
        $officerlist = [];
        
        while($stmt->fetch()) {
            $row = [
            "name" => $name,
            "about" => $about,
            "picture" => $picture
            ];
            array_push($officerlist, $row);
        }
        
        foreach($officerlist as &$i) {
            echo('<div>');
            echo('<img display="inline-block" align="left" style="max-width:128px; max-height:128px;" src="'.$i['picture'].'"></img>');
            echo('<h2 align="left">'.$i['name'].'</h2>');
            echo('<p>'.$i['about'].'</p> <br /> <hr noshade="noshade"> <br /></div>');
        }
         */

		($stmt = $con->prepare('SELECT name, title, picture FROM officers ORDER BY rank ASC'))
		|| fail('MySQL prepare', $con->error);
		$stmt->execute()
		|| fail('MySQL execute', $con->error);
		$stmt->bind_result($name, $title, $picture)
		|| fail('MySQL bind_result', $con->error);
        
		$officerlist = [];
		
		while($stmt->fetch()) {
			$row = [
			"name" => $name,
            "title" => $title,
            "picture" => $picture
			];
			array_push($officerlist, $row);
		}

        echo('<div>');
		foreach($officerlist as &$i) {
			echo('<div style="margin: 2%; width: 29%; float: left; ">');
			echo('<img display="inline-block"  style="max-width:100%; max-height:128px;" src="'.$i['picture'].'"/>');
			echo('<h3 style="color: #000000;"><strong>'.$i['title'].'</strong></h3>');
            echo('<h3 style="color: #000000;">'.$i['name'].'</h3>');
            echo('</div>');
        }
        echo('</div>');
	}

	function display_shows() {

		$hide_upcoming = True; //toggle hide upcoming

		$con = connect();
		if (!isset($_GET['n'])) {
			if (isset($_GET['current'])) {
				$current = $_GET['current'];
				if ($current == 'true') {
                    //display current shows
					($stmt = $con->prepare('SELECT id, ann_id, title, current_ep, current FROM shows WHERE current = 1'))
					|| fail('MySQL prepare', $con->error);
					$stmt->execute()
					|| fail('MySQL execute', $con->error);
					$stmt->bind_result($id, $ann_id, $title, $current_ep, $current)
					|| fail('MySQL bind_result', $con->error);
				} elseif ($current == 'upcoming') {
                    //display upcoming shows
					($stmt = $con->prepare('SELECT id, ann_id, title, current_ep, current FROM shows WHERE current = 2'))
					|| fail('MySQL prepare', $con->error);
					$stmt->execute()
					|| fail('MySQL execute', $con->error);
					$stmt->bind_result($id, $ann_id, $title, $current_ep, $current)
					|| fail('MySQL bind_result', $con->error);
                } elseif ($current == 'past') {
                    //display past shows
                    if (!isset($_GET['c']) || $_GET['c'] == 1) {
                        ($stmt = $con->prepare('SELECT id, ann_id, title, current_ep, current FROM shows WHERE current=0 ORDER BY year DESC LIMIT 0,5'))
                        || fail('MySQL prepare', $con->error);
                        $stmt->execute()
                        || fail('MySQL execute', $con->error);
                        $stmt->bind_result($id, $ann_id, $title, $current_ep, $current)
                        || fail('MySQL bind_result', $con->error);
                    } else {
                        $n = (5 * ($_GET['c'] - 1));
                        echo($stmt_str);
						($stmt = $con->prepare('SELECT id, ann_id, title, current_ep, current FROM shows WHERE current=0 ORDER BY year DESC LIMIT ?,5' ))
                        || fail('MySQL prepare', $con->error);
						$stmt->bind_param('i', $n)
                        || fail('MySQL bind_param', $con->error);
                        $stmt->execute()
                        || fail('MySQL execute', $con->error);
                        $stmt->bind_result($id, $ann_id, $title, $current_ep, $current)
                        || fail('MySQL bind_result', $con->error);
                        //echo($stmt_str);
                    }
                }
            } elseif (isset($_GET['t'])) { //search for shows with title
                ($stmt = $con->prepare('SELECT id, ann_id, title, current_ep, current FROM shows WHERE title = ?'))
				|| fail('MySQL prepare', $con->error);
				$stmt->bind_param('s',$_GET['t'])
				|| fail('MySQL bind_param', $con->error);
                $stmt->execute()
                || fail('MySQL execute', $con->error);
                $stmt->bind_result($id, $ann_id, $title, $current_ep, $current)
                || fail('MySQL bind_result', $con->error);
			} else {
                //display all shows
                if (!isset($_GET['c']) || $_GET['c'] == 1) {
                    ($stmt = $con->prepare('SELECT id, ann_id, title, current_ep, current FROM shows WHERE 1 ORDER BY title ASC LIMIT 0,5'))
                    || fail('MySQL prepare', $con->error);
                    $stmt->execute()
                    || fail('MySQL execute', $con->error);
                    $stmt->bind_result($id, $ann_id, $title, $current_ep, $current)
                    || fail('MySQL bind_result', $con->error);
                } else {
                    $n = (5 * ($_GET['c'] - 1));
                    echo($stmt_str);
                    ($stmt = $con->prepare('SELECT id, ann_id, title, current_ep, current FROM shows WHERE 1 ORDER BY title ASC LIMIT ?,5' ))
                    || fail('MySQL prepare', $con->error);
					$stmt->bind_param('i', $n)
					|| fail('MySQL bind_param', $con->error);
                    $stmt->execute()
                    || fail('MySQL execute', $con->error);
                    $stmt->bind_result($id, $ann_id, $title, $current_ep, $current)
                    || fail('MySQL bind_result', $con->error);
                    //echo($stmt_str);
                }
			}
		
			$showlist = [];
		
			while($stmt->fetch()) {
				$row = [
				"id" => $id,
				"ann_id" => $ann_id,
				"title" => $title,
				"current_ep" => $current_ep,
				"current" => $current
				];
					
				array_push($showlist, $row);
			}
		} else {
			($stmt = $con->prepare('SELECT id, ann_id, title, officer_blurb, current_ep, current FROM shows WHERE id = ?'))
			|| fail('MySQL prepare', $con->error);
			$stmt->bind_param('i', $_GET['n'])
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute()
			|| fail('MySQL execute', $con->error);
			$stmt->bind_result($id, $ann_id, $title, $officer_blurb, $current_ep, $current)
			|| fail('MySQL bind_result', $con->error);
		
			$showlist = [];
		
			while($stmt->fetch()) {
				$row = [
				"id" => $id,
				"ann_id" => $ann_id,
				"title" => $title,
				"officer_blurb" => $officer_blurb,
				"current_ep" => $current_ep,
				"current" => $current
				];
		
				array_push($showlist, $row);
			}
		}
		
		$stmt->close();
		
        //for time-base querries
		if(isset($_GET['current'])) {
			if ($_GET['current'] == 'true') {
				echo('<p><a style="text-decoration:none; color:#666;" href="http://clubs.uci.edu/cae/home.php?p=shows">Past Shows</a> <a style="float:right; text-decoration:none; color:#666;" href="http://clubs.uci.edu/cae/home.php?p=shows&current=upcoming">Upcoming Shows</a></p>');
			}
			if ($_GET['current'] == 'upcoming') {
				echo('<p><a style="text-decoration:none; color:#666;" href="http://clubs.uci.edu/cae/home.php?p=shows">Past Shows</a> <a style="float:right; text-decoration:none; color:#666;" href="http://clubs.uci.edu/cae/home.php?p=shows&current=true">Current Shows</a></p>');
			}
            if ($_GET['current'] == 'past') {
			    echo('<p><a style="text-decoration:none; color:#666;" href="http://clubs.uci.edu/cae/home.php?p=shows&current=true">Current Shows</a>  <a style="float:right; text-decoration:none; color:#666;" href="http://clubs.uci.edu/cae/home.php?p=shows&current=upcoming">Upcoming Shows</a></p>');
            }
		} else {
        //on the shows default page, provide querry bar
            //*
            echo('
            <form action="http://clubs.uci.edu/cae/res/search.php?" method="post">
                Search for an Anime by Name:
                <input type="text" name="title" value="Akatasuki no Yona"/>
                <input type="submit" value="Search"/>
            </form>');
            //*/
		}
		
		echo('<br /><hr noshade=:noshade"><br /> <br />');

		//hide upcoming shows from non-officers
		if($_GET['current'] == 'upcoming' && !isset($_SESSION['username']) && $hide_upcoming){
			echo('<p>While we appretiate your enthusiasm, our upcoming shows are kept secret for administrative reasons.</p>');
			return;
		}
		
		foreach($showlist as &$res) {
		
		
			$xml = simplexml_load_file('http://cdn.animenewsnetwork.com/encyclopedia/api.xml?title='.$res['ann_id']);
		
			echo('<div class="show" >');
			echo('<img align="left" src="'.$xml->anime->info['src'].'"></img>');
			echo('<a href="http://clubs.uci.edu/cae/home.php?p=shows&n='.intval($res['id']).'"><h2 style="float:right;">'.explode(" - ",$xml->anime['name'])[0].'</h2></a>');
			//cast to int to fight XSS
		
			foreach($xml->anime->children() as $info) {
				if ($info['type'] == 'Plot Summary')
					echo('<br /><br /><p>'.htmlentities($info).'</p>'); //this may or may not break... 
			}
		
			if (isset($_GET['n'])) {
				echo('<p>'.htmlentities($res['officer_blurb']).'</p>');
			}
		
			echo('<h4 display="inline"><br />');
			foreach($xml->anime->children() as $info) {
				foreach($info->attributes() as $attribute) {
					if ($attribute == 'Genres') {
						echo(htmlentities($info).'  '); //this may or may not break...
					}
				}
			}
			echo('</h4><br />');
			echo('<h3>');
		
			if ($res['current'] == '1') {
				echo('<h4 display="inline-block">Current: Yes <br />Current Episode: '.intval($res['current_ep']).'/');
				//cast to int to fight XSS
				
				foreach ($xml->anime->children() as $info) {
					foreach($info->attributes() as $attribute) {
						if ($attribute == 'Number of episodes') {
							echo(htmlentities($info).'</h4>');
							break;
						}
					}
				}
			} else {
				echo('<h4 display="inline-block">Current: No  <br />');
			}
		
			echo('</h4>');
			echo('</div>');
			if (isset($_GET['n'])) {
				echo('<div class="show_extra">');
		
				if ($res['officer_blurb'] != '') {
					echo('<h2>Officer Blurb</h2><hr noshade="noshade"></h2>');
					echo('<p>'.htmlentities($res['officer_blurb']).'</p>');
				}
					
				echo('<h2> More Information</h2><hr noshade="noshade"></h2>');
				echo('<table style="padding:5px; width:500px;">');
				foreach($xml->anime->children() as $info) {
					if ($info['lang'] == 'JA' && $info['type'] == 'Alternative title') {
						echo('<tr><td>Alternative Title: </td><td>'.htmlentities($info).'</td></tr>');
					}
					if ($info['type'] == 'Opening Theme') {
						if (strlen($info) >= 100) {
							echo('<tr><td style="width: 150px;">Opening Theme: </td><td>'.htmlentities(substr($info, 0, 100)).'...</td></tr>');
						} else {
							echo('<tr><td style="width: 150px;">Opening Theme: </td><td>'.htmlentities($info).'</td></tr>');
						}
					}
					if ($info['type'] == 'Ending Theme') {
						if (strlen($info) >= 100) {
							echo('<tr><td style="width: 150px;">Ending Theme: </td><td>'.htmlentities(substr($info, 0, 100)).'...</td></tr>');
						} else {
							echo('<tr><td style="width: 150px;">Ending Theme: </td><td>'.htmlentities($info).'</td></tr>');
						}
					}
				}
				echo('</table></h3> <br /> </div>');
			}
		
		}
        //display numbers at bottom for past and all shows
		if ( ($_GET['current'] == 'past' || !isset($_GET['current'])) && !isset($_GET['n']) && !isset($_GET['t'])) {
			($stmt = $con->prepare('SELECT COUNT(*) FROM shows WHERE current=0'))
			|| fail('MySQL prepare', $con->error);
			$stmt->execute()
			|| fail('MySQL execute', $con->error);
			$stmt->bind_result($pages)
			|| fail('MySQL bind_result', $con->error);
			$stmt->fetch()
			|| fail('MySQL fetch', $con->error);
			$pages = round($pages / 5, 0);
			echo('<div id="pages">');
			for ($i = 1; $i <= $pages; $i ++) {

                //carries over "current" value
                //emboldens current page
                echo('
                <a href="/cae/home.php?p=shows&c='.$i.(isset($_GET['current'])?('&current='.$_GET['current']):'').'">'
                    .( ($i==$_GET['c']) ? '<b>'.$i.'</b>' : $i )
                .'</a>');

				if ($i != $pages) {
					echo(' - ');
				}
			}
			echo('</div>');
		}
	} 
	
	function display_news() {
		$con = connect();
		if (isset($_GET['p'])) {
			$page = $_GET['p'];
		} else {
			$page = 'news';
		}

		if (!isset($_GET['id']) && $page != 'events') {
			$newslist = [];

			($stmt = $con->prepare('SELECT id, title, posted_by, datetime, content from news WHERE tag = "fallquarter"'))
			|| fail('MySQL prepare', $con->error);
			$stmt->execute()
			|| fail('MySQL execute', $con->error);
			$stmt->bind_result($id, $title, $posted_by, $datetime, $content)
			|| fail('MySQL bind_result', $con->error);

			while ($stmt->fetch()) {
				$row = [
				"id" => $id,
				"title" => $title,
				"posted_by" => $posted_by,
				"datetime" => $datetime,
				"content" => $content
				];
		
				array_push($newslist, $row);
			}
			$stmt->close();
			foreach($newslist as &$res) {
				echo('
				<div class="news_header">
					<a href="/cae/home.php?p='.$page.'&id='.$res['id'].'" id="title">'.$res['title'].'</a>
					<p style="font-size:75%; color:#666666;">Posted by: '.$res['posted_by'].' at '.$res['datetime'].'</p>
				</div>
				<div class="news_body">
					<p>'.$res['content'].'</p>
					<br />');
				echo('<br /><hr noshade="noshade">
					<br /></div>');
			}
		}
		$query_string = 'select id, title, posted_by, datetime, LEFT(content, 2000) from news WHERE tag="post" ORDER BY id DESC LIMIT 0,5 ';
		if (!isset($_GET['id'])) {
			if (!isset($_GET['n']) || $_GET['n'] == 1) {
				$query_string = 'select id, title, posted_by, datetime, LEFT(content, 2000) from news WHERE tag!="fallquarter" ORDER BY id DESC LIMIT 0,5';
				if ($page == 'events') {
					$query_string = 'select id, title, posted_by, datetime, LEFT(content, 2000) from news WHERE tag="event" ORDER BY id DESC LIMIT 0,5';
				}
			} else {
				$n = intval($_GET['n']); //IMPORTANT: yes, this is manual cleaning; (if that doesn't scare you, talk to another web-person until it does)
										 //be sure whenever doing this that ANY number can be taken safely
				$query_string = 'select id, title, posted_by, datetime, LEFT(content, 2000) from news WHERE tag!="fallquarter" ORDER BY id DESC LIMIT '.(($n - 1) * 5).', 5';
				if ($page == 'events') {
					$query_string = 'select id, title, posted_by, datetime, LEFT(content, 2000) from news WHERE tag="event" ORDER BY id DESC LIMIT '.(($n - 1) * 5).', 5';
				}
			}
		} else {
			$id = intval($_GET['id']); //IMPORTANT: SEE ABOVE
			$query_string = 'select id, title, posted_by, datetime, content from news WHERE id='.$id;
		 }
		$newslist = [];
		
		($stmt = $con->prepare($query_string))
		|| fail('MySQL prepare', $con->error);
		$stmt->execute()
		|| fail('MySQL execute', $con->error);
		$stmt->bind_result($id, $title, $posted_by, $datetime, $content)
		|| fail('MySQL bind_result', $con->error);
		
		while ($stmt->fetch()) {
			$row = [
			"id" => $id,
			"title" => $title,
			"posted_by" => $posted_by,
			"datetime" => $datetime,
			"content" => $content
			];
		
			array_push($newslist, $row);
		}
		$stmt-> close();
		
		foreach($newslist as &$res) {
			echo('
			<div class="news_header">
				<a href="/cae/home.php?p='.$page.'&id='.$res['id'].'" id="title">'.$res['title'].'</a>
				<p style="font-size:75%; color:#666666;">Posted by: '.$res['posted_by'].' at '.$res['datetime'].'</p>
			</div>
			<div class="news_body">
				<p>'.$res['content'].'</p>');
			if (!isset($_GET['id']) && strlen($res['content']) == 2000) {
				echo('<br /><p style="float:right;"><a href="/cae/home.php?p='.$page.'&id='.$res['id'].'">more...</a></p>');
			}
			echo('<br /><hr noshade="noshade">
				<br /></div>');
		}
		if (!isset($_GET['id'])) {
			$query_string = 'SELECT COUNT(*) FROM news';
			if ($page == 'events') {
				$query_string = 'SELECT COUNT(*) FROM news WHERE tag="event"';
			}
			($stmt = $con->prepare($query_string))
			|| fail('MySQL prepare', $con->error);
			$stmt->execute()
			|| fail('MySQL execute', $con->error);
			$stmt->bind_result($pages)
			|| fail('MySQL bind_result', $con->error);
			$stmt->fetch()
			|| fail('MySQL fetch', $con->error);
			$pages = round($pages / 5, 0);
			echo('<div id="pages">');
			for ($i = 1; $i <= $pages; $i ++) {
				echo('<a href="/cae/home.php?p='.$page.'&n='.$i.'">'.$i.'</a>');
				if ($i != $pages) {
					echo(' - ');
				}
			}
			echo('</div>');
		}
	}

?>
