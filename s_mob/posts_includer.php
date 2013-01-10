<?php
	// 자체적으로 컨텐츠가 완성되어서 불러져야 함?
	
	//DB접속	
	include '../db.php';
			
	//파라미터 관련 변수 인클루드
	include './variable_para.php';
				
	// DB로부터 컨텐츠 셀렉트
	include './select.php';
		
			//파라미터 관련 변수 인클루드
			include '../s_web/variable_para.php';
				
			// DB로부터 컨텐츠 셀렉트
			include '../s_web/select.php';
			//출력 
			while ($row = mysql_fetch_array($result) ){
				include '../s_web/post_m.php'; 
				//와꾸는 post_m이지만 그속에 post_core는 웹과같다.
			}
?>