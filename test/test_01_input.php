<html>
	
	<?php
	include_once ('../../db.php');
			
	if (!empty($_POST['aaa'])){
		$sql = 'INSERT INTO `table_test_01` (`text`) VALUES (\''.mysql_real_escape_string($_POST['aaa']).'\')'; //쿼리문
		$result = mysql_query($sql); //쿼리문 보냄
		//쿼리가 잘 안갈때 오류출력
		if (!$result) {
			$message = "Error: " . mysql_error() . "<br>";
			$message = "Errored Query: ".$sql;
			die ($message);
		}
	}	
	?>

	<body>
		<form action="./test_01_input.php" method="POST"> <!-- 상단 문구를 실행하기위해 자기 페이지-->
			<input name="aaa" type="input" />
			<input type="submit" /> <!--서밋 하면 날아가는 페이지는 따로 지정 가능한가 궁-->
		</form>
	</body>
	
</html>