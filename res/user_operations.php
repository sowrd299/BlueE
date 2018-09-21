<?php
	require_once('header.php');	

	function op_login($con) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$hash = '*'; // In case the user is not found
		($stmt = $con->prepare('select username,password,salt,type from board_mods where username=?'))
		|| fail('MySQL prepare', $con->error);
		$stmt->bind_param('s', $username)
		|| fail('MySQL bind_param', $con->error);
		$stmt->execute()
		|| fail('MySQL execute', $con->error);
		$stmt->bind_result($username, $hash, $salt, $type)
		|| fail('MySQL bind_result', $con->error);
		if (!$stmt->fetch() && $con->errno)
			fail('MySQL fetch', $con->error);
		
		if (hash('sha256', $salt . sha1($password)) === $hash) {
			$what = 'Authentication succeeded';
			session_start();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['type'] = $type;
				
			$stmt->close();
			$con->close();
			
			redirect('http://clubs.uci.edu/cae/home.php?p=admincp');
		} else {
			redirect('http://clubs.uci.edu/cae/home.php?p=admincp');
			$what = "Authentication failed\r\n";
		}
		return;
	}
	
	function op_post($con) {
		$dirty_html = $_POST['post'];
		
		include_once('header.php');
		
		/* So this is what HTML Purifier is doing... */
		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);
		$clean_html = $purifier->purify($dirty_html);
		
		$posted_by = $_SESSION['username'];
		date_default_timezone_set('America/Los_Angeles');
		$post_time = date('y/m/d H:i:s');
		$title = $_POST['title'];
		$tag = $_POST['tag'];
		
		($stmt = $con->prepare("INSERT INTO news (title, posted_by, datetime, content, tag) values (?, ?, ?, ?, ?)"))
		|| fail('MySQL prepare', $con->error);
		$stmt->bind_param('sssss', $title, $posted_by, $post_time, $dirty_html, $tag)
		|| fail('MySQL bind_param', $con->error);
		

		if (!$stmt->execute()) {
			if ($con->errno === 1062 /* ER_DUP_ENTRY */)
				redirect('index?p=register&e=2'); //Username already exists error.
			else
				redirect('index?p=register&e=1'); //Random MySQL error
		}
		$stmt->close();
		$con->close();
		redirect('/cae/home.php?p=admincp');
	}

	function op_edit_user() {
		$con = connect();
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["picture"]["name"]);
		$extension = end($temp);
		
		$savename = generateRandomString(10).'.'.$extension;
		
		
		if ((($_FILES["picture"]["type"] == "image/gif")
				|| ($_FILES["picture"]["type"] == "image/jpeg")
				|| ($_FILES["picture"]["type"] == "image/jpg")
				|| ($_FILES["picture"]["type"] == "image/pjpeg")
				|| ($_FILES["picture"]["type"] == "image/x-png")
				|| ($_FILES["picture"]["type"] == "image/png"))
				&& in_array($extension, $allowedExts)) {
			$path = "upload\\" . $savename;
			move_uploaded_file($_FILES["picture"]["tmp_name"],
			"../upload/" . $savename);	
		}
		
		($stmt = $con->prepare('UPDATE board_mods SET name=?,about=?,picture=?  WHERE username=?'))
		|| fail('MySQL prepare', $con->error);
		$stmt->bind_param('ssss', $_POST['rname'], $_POST['bio'], $path, $_SESSION['username'])
		|| fail('MySQL bind_param', $con->error);
		$stmt->execute();
		$stmt->close();
		$con->close();
		redirect('http://clubs.uci.edu/cae/home.php?p=admincp');
	}	
	
	function op_register($con) {
		$hash = hash_hmac('sha256',$_POST['password'], 32);
		if ($_POST['password'] == $_POST['repeat-password']) {
			($stmt = $con->prepare("INSERT INTO users (username, password) values (?, ?)"))
			|| fail('MySQL prepare', $con->error);
			$stmt->bind_param('ss', $_POST['username'], $hash)
			|| fail('MySQL bind_param', $con->error);
			if (!$stmt->execute()) {
				if ($con->errno === 1062 /* ER_DUP_ENTRY */)
					redirect('index?p=register&e=2'); //Username already exists error.
				else
					redirect('index?p=register&e=1'); //Random MySQL error
			}
			$stmt->close();
			$con->close();
		
		} else {
			redirect('index?e=1');
		}

		return;
	}
	
	function op_logout() {
		session_destroy();
		redirect('http://clubs.uci.edu/cae/home.php?p=admincp', false);
		return;
	}
	
	function op_edit_news($con) {
		if(isset($_POST['edit'])) {
			redirect('/cae/home.php?p=admincp&a=edit_news&n='.$_POST['id'].'');
		}
		else if(isset($_POST['delete'])) {
			$id = $_POST['id'];
			($stmt = $con->prepare("DELETE FROM news WHERE id=?"))
			|| fail('MySQL prepare', $con->error);
			$stmt->bind_param('s', $id)
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute();
			$stmt->close();
			$con->close();
			redirect('http://clubs.uci.edu/cae/home.php?p=admincp');
			return;
		}
		else {
			$title = $_POST['title'];
			$config = HTMLPurifier_Config::createDefault();
			$purifier = new HTMLPurifier($config);
			$content = $purifier->purify($_POST['content']);
			$id = $_POST['id'];
			$tag = $_POST['tag'];
			($stmt = $con->prepare("UPDATE news SET title=?, content=?, tag=? WHERE id=?"))
			|| fail('MySQL prepare', $con->error);
			$stmt->bind_param('ssss', $title, $content, $tag, $id)
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute();	
			
			$stmt->close();
			$con->close();
				
			redirect('/cae/home.php?p=admincp');
			return;
		}
	}
	
	function op_add_show($con) {
		$title = $_POST['title']; //Title of the anime
		$ann_id = $_POST['id']; //Anime news network id, for querying XML
			
		($stmt = $con->prepare("INSERT INTO shows (ann_id, title, officer_blurb, current) VALUES (?, ?, NULL, 2)"))
		|| fail('MySQL prepare', $con->error);
		$stmt->bind_param('ss', $ann_id, $title)
		|| fail('MySQL bind_param', $con->error);
		$stmt->execute();
		$stmt->close();
		$con->close();
		redirect('http://clubs.uci.edu/cae/home.php?p=admincp&a=add_show');
		return;
	}
	
	function op_edit_page($con) {
		if (isset($_POST['edit'])) {
			redirect('/cae/home.php?p=admincp&a=edit_page&n='.$_POST['id'].'');
			return;
		} else {
			$config = HTMLPurifier_Config::createDefault();
			$purifier = new HTMLPurifier($config);
			$content = $purifier->purify($_POST['content']);
			$id = $_POST['id'];
			($stmt = $con->prepare('UPDATE pages SET content=? WHERE id=?'))
			|| fail('MySQL prepare', $con->error);
			$stmt->bind_param('ss', $_POST['content'], $id)
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute();
			$stmt->close();
			$con->close();
				
			redirect('http://clubs.uci.edu/cae/home.php?p=admincp');
			return;
		}
	}
	
	function op_edit_shows($con) {
		if(isset($_POST['edit'])) {
			redirect('/cae/home.php?p=admincp&a=edit_shows&n='.$_POST['id'].'');
			return;
		} elseif(isset($_POST['delete'])) {
			$id = $_POST['id'];
			($stmt = $con->prepare("DELETE FROM shows WHERE id=?"))
			|| fail('MySQL prepare', $con->error);
			$stmt->bind_param('s', $id)
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute();
			$stmt->close();
			$con->close();
			redirect('http://clubs.uci.edu/cae/home.php?p=admincp');
			return;
		} else {
			$config = HTMLPurifier_Config::createDefault();
			$purifier = new HTMLPurifier($config);
			$content = $purifier->purify($_POST['content']);
			$id = $_POST['id'];
			$ann_id = $_POST['ann_id'];
			$current_ep = $_POST['current_ep'];
			$current = $_POST['current'];
			($stmt = $con->prepare('UPDATE shows SET officer_blurb=?, ann_id=?, current_ep=?, current=? WHERE id=?'))
			|| fail('MySQL prepare', $con->error);
			$stmt->bind_param('sssss', $_POST['content'], $ann_id, $current_ep, $current, $id)
			|| fail('MySQL bind_param', $con->error);
			$stmt->execute();
			$stmt->close();
			$con->close();
				
			redirect('http://clubs.uci.edu/cae/home.php?p=admincp');
			return;
		}
	}
	
	function op_main() {
		$con = connect();
		
		$op = $_GET['op'];
		
		switch($op) {
			case "login":
				op_login($con);
				break;
			case "post":
				op_post($con);
				break;
			case "register":
				op_register($con);
				break;
			case "logout":
				op_logout();
				break;
			case "edit_news":
				op_edit_news($con);
				break;
			case "add_show":
				op_add_show($con);
				break;
			case "edit_page":
				op_edit_page($con);
				break;
			case "edit_shows":
				op_edit_shows($con);
				break;
			case "edit_user":
				op_edit_user();
				break;
		}
	}
	
	op_main();

?>
