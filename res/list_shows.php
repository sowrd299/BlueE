<?php
	$con = connect();
	($stmt = $con->prepare('select id, title from shows'))
	|| fail('MySQL prepare', $con->error);
	$stmt->execute()
	|| fail('MySQL execute', $con->error);
	$stmt->bind_result($id, $title)
	|| fail('MySQL bind_result', $con->error);
	
	$newslist = [];
	
	while($stmt->fetch()) {
		$row = [
		"id" => $id,
		"title" => $title
		];
	
		array_push($newslist, $row);
	}
	$stmt->close();
	echo('<table class="form_table"><form action="/cae/res/user_operations.php?op=edit_shows" method="post">
			<tr><td><select name="id" id="edit_select">');
	foreach($newslist as &$res) {
		if ($res['id'] == $_GET['n']) {
			echo('
					<option selected="selected" value="'.$res['id'].'">'.$res['title'].'</option>
				');
		} else {
			echo('
					<option value="'.$res['id'].'">'.$res['title'].'</option>
				');
		}
	}
	echo('</select>
		<td><input name="edit" type="submit" value="Edit"></input></td>
		<td><input name="delete"type="submit" value="Delete"></input></td>
		</form></table>');
?>