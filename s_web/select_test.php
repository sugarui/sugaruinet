<?php
	if($_GET['special']){
		//데이터 요청및 수신
		$sql =  "SELECT * FROM su_special_01 WHERE `special` = '{$_GET['special'] }' ";
		$result = mysql_query($sql);	
	}else{
		// 페이지당 출력수 결정, 페이지넘버 산출
		if($_GET['devcate']){
			$num_posts_display = 4; //디피수
		}else{
			$num_posts_display = 5; //디피수	
		}
		
		if(!$_GET['page']){$_GET['page'] = 1;} //페이지 파라미터가 없을경우 1로 세팅!!!
		$num_pages_pre = $_GET['page'] -1; //앞선페이지수는 현제페이지 -1
		$num_posts_offset = $num_posts_display * $num_pages_pre; //오프셋수는 디피수x앞선페이지수
		
		// 리소스 획득 : Table(포스트) 에서 본 페이지에 출력할 전체 열, 오프셋된 일부 행
		// 쿼리문 웨어부 조건 및 내용 설정
		if($_GET['tag']){
			$where = "WHERE p.{$paraname} like '%{$paravalue}%'";
		}else if($paravalue){
			$where = "WHERE p.{$paraname} = '{$paravalue}'";
		}else{
			$where = " ";
		}
		//데이터 요청및 수신
		if($_GET['devcate']){
			$sql =  "
				SELECT p.* FROM su_post_02 AS p LEFT JOIN su_cate_02 AS c ON p.devcate = c.cate"." ". 
				$where." "."
				ORDER BY id_intent DESC, worked ASC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}
			";
		}else{
			$sql =  "
				SELECT p.*, c.cate_expression FROM su_post_01 AS p LEFT JOIN su_cate_01 AS c ON p.cate = c.cate"." ". 
				$where." "."
				ORDER BY id_intent DESC, worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}
			";
		}
		$result = mysql_query($sql);
	}	
?>