<?php
	//$a = array('사과','딸기','바나나','망고');
	$posts_arr = array();
	
	include '../db.php';
			
	//파라미터 관련 변수 인클루드
	include './variable_para.php';
				
	// DB로부터 컨텐츠 셀렉트
	include './select.php';
	
	//출력 
	while ($row = mysql_fetch_array($result) ){
			
		//include './post.php';
		$post_each = $row['id'];
		array_push($posts_arr, $post_each); 
	}
?>	
<?php	
	echo json_encode(array( 
		'answer'=>true, 
		'msg' => $posts_arr[1]
		)
	) 
?>			

