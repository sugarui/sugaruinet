<?php 	// load형식이므로, 자체적으로 컨텐츠가 완성되어서 불러져야 함
	//DB접속	
	include '../db.php';	
	//파라미터 관련 변수 인클루드
	include '../s_web/variable_para.php';
	
	$num_posts_display = 5; //디피수 - 올려옴
					
	// DB로부터 컨텐츠 셀렉트. include '../s_web/select.php' 을 변형함
		// 페이지당 출력수 결정, 페이지넘버 산출
		// $num_posts_display = 5; //디피수 - 올림
		$num_pages_pre = $_COOKIE['pagecookie']; //앞선페이지를 쿠키에 기반하여 알아냄
		if (!$_COOKIE['pagecookie']){
			$num_pages_pre = 1;
		}
		$num_posts_offset = $num_posts_display * $num_pages_pre; //오프셋수는 디피수x앞선페이지수
		
		// 쿼리문 웨어부 조건 및 내용 설정
		if($_GET['tag']){
			$where = "WHERE p.{$paraname} like '%{$paravalue}%'";
		}else if($paravalue){
			$where = "WHERE p.{$paraname} = '{$paravalue}'";
		}else{
			$where = " ";
		}
		//데이터 요청및 수신
		$sql =  "
				SELECT p.*, c.cate_expression FROM su_post_01 AS p LEFT JOIN su_cate_01 AS c ON p.cate = c.cate"." ". 
				$where." "."
				ORDER BY id_intent DESC, worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}
				";
		$result = mysql_query($sql);
	
	//출력 
	while ($row = mysql_fetch_array($result) ){
		include '../s_web/post_m.php'; 
		//와꾸는 post_m이지만 그속에 post_core는 웹과같다.
	}
	
	//쿠키 보내기	
	
	//재료 여부에 따라 쿠키굽기를 결정
		//전체포스트량 재산출 : pagenaition.php 에서 복사 - 이걸 매번 돌린다니 엄청 비효율적. 글로벌 변수에 넣을수없을까.
		///리소스 획득 : Table(포스트) 에서 본 카테고리 데이터"량"을 알아내기 위해 id 열, 전체 행
		if($paravalue){
			$sql = "SELECT id FROM `su_post_01` WHERE $paraname = '$paravalue'"; 
		}else{
			$sql = "SELECT id FROM `su_post_01`";
		}
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result); // 게시물 총수획득. 예를들어 32  
		// $num_posts_display = oo ;페이지당 출력수선언. 올렸음. 예를들어 3
		$num_pages = ceil($num_rows/$num_posts_display); //페이지수는 게시물 총수32/페이지당 출력수3 =10, 올림해서 11
		
		if ( $num_pages_pre+1 < $num_pages){
			$num_pages_pre++;
			setcookie('pagecookie', $num_pages_pre);
			include './more.php';	
		} 
?>