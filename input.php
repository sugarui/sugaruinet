<html>
	
	<?php
	include_once ('../db.php');
	if (!empty($_POST['aaa'])){ //일단 있으면 실행한다는거
		$sql = 'INSERT INTO `table_test_01` (`text`) VALUES (\''.mysql_real_escape_string($_POST['aaa']).'\')'; //쿼리문
		$sql = 'INSERT INTO `table_test_01` (`text`,`created`) VALUES (\''.mysql_real_escape_string($_POST['aaa']).'\',now())'; //쿼리문
		$result = mysql_query($sql); //쿼리문 보냄
		//성공메시지 출력하거나 페이지 바꿔주는 그런건 여기다 찍어야 하려나
		///if ($result) {} 이런식으로?
		
		if (!$result) { //쿼리가 잘 안갈때 오류출력
			$message = "Error: " . mysql_error() . "<br>";
			$message = "Errored Query: ".$sql;
			die ($message);
		}
	}	
	?>

	<body>
		<form action="./input.php" method="POST">
			<input name="aaa" type="text" />
			<input type="submit" />
		</form>
	</body>
	
</html>