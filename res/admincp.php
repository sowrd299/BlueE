<?php
	include('list.php');
	function edit_page() {
		list_pages();
		$con = connect();
			if(isset($_GET['n'])) {
				$id = $_GET['n'];
			
			
				($stmt = $con->prepare('select id, name, content from pages where id=?'))
				|| fail('MySQL prepare', $con->error);
				$con->bind_param('i',$id)
				|| fail('MySQL bind_param', $con->error);
				$stmt->execute()
				|| fail('MySQL execute', $con->error);
				$stmt->bind_result($id, $name, $content)
				|| fail('MySQL bind_result', $con->error);
			
				$pagelist = [];
			
				while($stmt->fetch()) {
					$row = [
					"id" => $id,
					"name" => $name,
					"content" => $content
					];
					$pagelist=$row;
				}
				$stmt->close();
			
				echo('<table class="form_table">');
				echo('<form action="http://clubs.uci.edu/cae/res/user_operations.php?op=edit_page" method="post" id="postform">');
				echo('<tr><td colspan="2"><textarea style="min-height:500px; width:625px;" form="postform" name="content">'.$pagelist['content'].'</textarea></td></tr>');
				echo('<input style="display:none;" name="id" value="'.$id.'">');
				echo('<tr><td></td><td><input type="submit"></td></tr>');
				echo('</form></table>');
		}
	}

	function post() {
		echo('<table class="form_table">');
		echo('<form action="http://clubs.uci.edu/cae/res/user_operations.php?op=post" method="post" id="postform">');
		echo('<tr><td>Title:</td><td><input type="text" name="title"></td><td>Tag:</td><td><input type="text" name="tag"></td></tr>');
		echo('<tr><td colspan="8"><textarea style="min-height:500px; width:625px;" form="postform" name="post"></textarea></td></tr>');
		echo('<tr><td><input type="submit"></input></td></tr>');
		echo('</form> </table>');
	}
	
	function edit_news() {
		list_news();
		$con = connect();
		if (isset($_GET['n'])) {
			$id = $_GET['n'];
			($stmt = $con->prepare('select id, title, content, tag from news where id=?'))
			|| fail('MySQL prepare', $con->error);
			$con->bind_param('i',$id)
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute()
			|| fail('MySQL execute', $con->error);
			$stmt->bind_result($id, $title, $content, $tag)
			|| fail('MySQL bind_result', $con->error);
				
			$newslist = [];
				
			while($stmt->fetch()) {
				$row = [
				"id" => $id,
				"title" => $title,
				"content" => $content,
				"tag" => $tag
				];
				$newslist=$row;
			}
			$stmt->close();
				
			echo('<table class="form_table">');
			echo('<form action="http://clubs.uci.edu/cae/res/user_operations.php?op=edit_news" method="post" id="postform">');
			echo('<tr><td width="10px">Title:</td><td><input type="text" name="title" value="'.htmlentities($newslist['title']).'"></input></td>
					<td>Tag:</td><td><input type="text" name="tag" value="'.htmlentities($newslist['tag']).'"></td></tr>');
			echo('<tr><td colspan="4"><textarea style="min-height:500px; width:625px;" form="postform" name="content">'.$newslist['content'].'</textarea></td></tr>');
			echo('<input style="display:none;" name="id" value="'.intval($id).'">');
			echo('<tr><td></td><td><input type="submit"></td></tr>');
			echo('</form></table>');
		}
	}
	
	function add_show() {
		echo('
				<table class="form_table">
					<form action="http://clubs.uci.edu/cae/res/user_operations.php?op=add_show" method="post">
						<tr><td>Title</td><td><input type="text" name="title"></td></tr>
						<tr><td>Anime News Network ID (<a href="#">help</a>)</td><td><input type="text" name="id"></td></tr>
						<tr><td></td><td><input type="submit"></td></tr>
					</form>
				</table>
			');
	}
	
	function edit_shows() {
		list_shows();
		$con = connect();
		if (isset($_GET['n'])) {
			$id = $_GET['n'];

			($stmt = $con->prepare('select id, ann_id, current_ep, current, officer_blurb from shows where id="?"'))
			|| fail('MySQL prepare', $con->error);
			$con->bind_param('i',$id)
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute()
			|| fail('MySQL execute', $con->error);
			$stmt->bind_result($id, $ann_id, $current_ep, $current, $content)
			|| fail('MySQL bind_result', $con->error);
		
			$newslist = [];
		
			while($stmt->fetch()) {
				$row = [
				"id" => $id,
				"ann_id" => $ann_id,
				"current_ep" => $current_ep,
				"current" => $current,
				"content" => $content
				];
				$newslist=$row;
			}
			$stmt->close();
			
			$current = $newslist['current'];
		
			echo('<table class="form_table">'); // create table
			echo('<form action="http://clubs.uci.edu/cae/res/user_operations.php?op=edit_shows" method="post" id="postform">'); // create form
			echo('<tr><td width="50px">ANN-ID:</td><td><input type="text" name="ann_id" value="'.$newslist['ann_id'].'"></input></td>
				<td width="100px">Current Episode:</td><td><input type="number" name="current_ep" min="1" max="26" step="1" value='.$newslist['current_ep'].'>
				<td>Current:</td><td><select name="current" id="current_select"><option value="1">True</option><option value="0">False</option><option value="2">Upcoming</option></select></tr>'); // The first row of the table. Contains fields for ANN ID, current ep, and current
			echo('<tr><td colspan="6"><textarea style="min-height:500px; width:625px;" form="postform" name="content">'.$newslist['content'].'</textarea></td></tr>'); // Edits the officer blurb
			echo('<input style="display:none;" name="id" value="'.$id.'">');
			echo('<tr><td></td><td><input type="submit"></td></tr>');
			echo('</form></table>');
			
			echo('<script type="text/javascript">
					$("#current_select").val('.$current.');
				</script>'); // Set the True/False current box to the current value.
		}
	}

    function advance_ep() {
        //to be called to advance the episode counter of current shows
        $con = connect();
        ($stmt = $con->prepare('UPDATE shows SET current_ep=current_ep + 1 WHERE current=1'))
        || fail('MySQL prepare', $con->error);
        $stmt->execute()
        || fail('MySQL execute', $con->error);
        echo('<p>Episode counters advanced.</p>');
    }
	
	function edit_user() {
		$con = connect();
		($stmt = $con->prepare('SELECT name, about FROM board_mods WHERE username="?"'))
		|| fail('MySQL prepare', $con->error);
		$stmt->bind_param('s',$_SESSION['username'])
		|| fail('MySQL bind_param', $con->error);
		$stmt->execute()
		|| fail('MySQL execute', $con->error);
		$stmt->bind_result($name, $about)
		|| fail('MySQL bind_result', $con-error);
		$stmt->fetch();
		
		echo('
				<table class="form_table">
				<form action="http://clubs.uci.edu/cae/res/user_operations.php?op=edit_user" method="post" id="postform" enctype="multipart/form-data">
				<tr><td>Picture (128x128 max)</td><td><input type="file" name="picture"></td></tr>
				<tr><td>Real Name:</td><td><input type="text" name="rname" value="'.$name.'"></td></tr>
				<tr><td colspan="2"><textarea name="bio" style="min-height:500px; width:625px;">'.$about.'</textarea></td></tr>
				<tr><td colspan="2"><input type="submit"></td></tr>
				</form>
				</table>
			');
	}
	
	function main() {
		if (isset($_SESSION['username'])) {
			echo('<div class="news_body" id="admincp">
					<p>Welcome to the administrator control panel</p>
						<ul>');
			if ($_SESSION['type'] == 30) {
				echo('
							<li><a href="home.php?p=admincp&a=post" class="item_add">Post news</a></li>
							<li><a href="/cae/home.php?p=admincp&a=edit_news" class="item_add">Edit/Delete news</a></li>
							<li><a href="/cae/home.php?p=admincp&a=add_show" class="item_add">Add show</a></li>
							<li><a href="/cae/home.php?p=admincp&a=edit_shows" class="item_add">Edit/Delete show</a></li>
							<li><a href="/cae/home.php?p=admincp&a=edit_page" class="item_add">Modify Pages</a></li>
                            <li><a href="/cae/home.php?p=admincp&a=advance_ep" class="item_add">Advance Episode Counter</a></li> 
					');
			} if ($_SESSION['type'] <= 30) {
				echo('
					<li><a href="/cae/home.php?p=admincp&a=edit_user" class="item_out">Edit Officer Bio</a></li>
					<li><a href="/cae/mod.php" class="item_add">Moderate board</a></li>
					<li><a href="https://mail.clubs.uci.edu/mailman/admin/cae-list" class="item_add">Edit Mailing List</a></li>
					<li><a href="http://clubs.uci.edu/cae/res/user_operations.php?op=logout" class="item_add">Logout</a></li>
					</ul><hr noshade="noshade">
					<p>If you want to change your password, go to Moderate Board > Login again > Manage Users</p>
					<hr noshade="noshade">
					</div>
					');
			}
			if (isset($_GET['a'])) {
				$action = $_GET['a'];
			} else {
				$action = '';
			}
			
			switch($action) {
				case "post":
					post();
					break;
				case "edit_news":
					edit_news();
					break;
				case "add_show":
					add_show();
					break;
				case "edit_page":
					edit_page();
					break;
				case "edit_shows":
					edit_shows();
					break;
                case "advance_ep":
                    advance_ep();
                    break;
				case "edit_user":
					edit_user();
					break;
			}
		} else {
			echo('<form action="http://clubs.uci.edu/cae/res/user_operations.php?op=login" method="post" style="border-style:none;">
				<table class="form_table">
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Submit"></td>
				</tr>
				</table>
				</form>');
		}
	}
	
	main()
?>
