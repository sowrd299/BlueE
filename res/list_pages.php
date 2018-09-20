<?php
	$con = connect();

	($stmt = $con->prepare('select id, name from pages'))
	|| fail('MySQL prepare', $con->error);
	$stmt->execute()
	|| fail('MySQL execute', $con->error);
	$stmt->bind_result($id, $name)
	|| fail('MySQL bind_result', $con->error);
	
	$pagelist = [];
	
	while($stmt->fetch()) {
		$row = [
		"id" => $id,
		"name" => $name
		];
	
		array_push($pagelist, $row);
	}
	$stmt->close();
	echo('<table class="form_table"><form action="user_operations.php?op=edit_page" method="post">
			<tr><td><select name="id" id="edit_select">');
	foreach($pagelist as &$res) {
		if ($res['id'] == $_GET['n']) {

			echo('
						<option value="'.$res['id'].'" selected>'.$res['name'].'</option>
					');
		} else {
			echo('
						<option value="'.$res['id'].'">'.$res['name'].'</option>
					');
		}
	}
	echo('</select>
		<td><input name="edit" type="submit" value="Edit"></input></td>
		</form></table>');
?>