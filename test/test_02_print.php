<html>
	
	<?php
	include_once ('../../db.php');

	$sql = 'SELECT * FROM `table_test_01` ORDER BY id DESC LIMIT 1 '; //쿼리문
	$result = mysql_query($sql); //쿼리문 보냄
	while ($row = mysql_fetch_array($result)){
		echo htmlspecialchars(
			"{$row['text']}"."\n"
		);
	}	
	?>
	
</html>