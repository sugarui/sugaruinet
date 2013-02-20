<?php 	// load형식이므로, 자체적으로 컨텐츠가 완성되어서 불러져야 함
	session_save_path('session');
	session_start();
	//echo "현재앞선페이지는 세션값인".$_SESSION['pre']."<br>";
	$num_devpages_pre=$_SESSION ['devpre'];
	
	//DB접속	
	include '../db.php';
			
	// 파라미터를 세션에서 받기
	//$_GET['devtag'] = $_SESSION ['devtag'];
	$_GET['devcate'] = $_SESSION ['devcate'];
		 
	//파라미터 관련 변수 인클루드
	//include '../s_web/variable_para.php';
				
	// DB로부터 컨텐츠 셀렉트. include '../s_web/select.php' 을 변형함
		$num_posts_display = 6; //디피수..모바일이라서 낮춤
		$num_posts_offset = $num_posts_display * $num_devpages_pre; //오프셋수는 디피수x앞선페이지수

		// 쿼리문 웨어부 조건 및 내용 설정
		//if($paravalue){
		//	$where = "WHERE p.{$paraname} = '{$paravalue}'";
		//}else{
		//	$where = " ";
		//}
		//데이터 요청및 수신
		if ($_GET['devid']){
		$sql =  "
				SELECT p.* FROM su_post_02 AS p LEFT JOIN su_cate_02 AS c ON p.cate = c.cate  
				WHERE p.id='{$_GET['devid']}' 
				ORDER BY id_intent DESC, worked ASC, worked_intent DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}
			";
		}else{ 
		$sql =  "
				SELECT p.* FROM su_post_02 AS p LEFT JOIN su_cate_02 AS c ON p.cate = c.cate  
				WHERE p.cate='{$_SESSION['devcate']}' 
				ORDER BY id_intent DESC, worked ASC, worked_intent DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}
			";
		}	
		$result = mysql_query($sql);
		
	//출력 
	while ($row = mysql_fetch_array($result) ){
		include 'dev_m.php';
		//와꾸는 post_m이지만 그속에 post_core는 웹과같다.
	}
 
	//세션값 보내기
	
	//재료 여부에 따라 더보기 여부를 결정
		//전체포스트량 재산출 : pagenaition.php 에서 복사 - 이걸 매번 돌린다니 엄청 비효율적. 글로벌 변수에 넣을수없을까.
		///리소스 획득 : Table(포스트) 에서 본 카테고리 데이터"량"을 알아내기 위해 id 열, 전체 행

		$sql = "SELECT id FROM `su_post_02` WHERE cate='{$_SESSION['devcate']}' "; 
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result); // 게시물 총수획득. 예를들어 32  
		// $num_posts_display = oo ;페이지당 출력수선언. 올렸음. 예를들어 3
		$num_pages = ceil($num_rows/$num_posts_display); //페이지수는 게시물 총수32/페이지당 출력수3 =10, 올림해서 11
		
		if ( $num_devpages_pre < ($num_pages-1) ){
			$divid=$num_devpages_pre;
			$num_devpages_pre++;
			include 'dev_more_dev_m.php';
			$_SESSION['devpre'] = $num_devpages_pre;
		}else{ // if ($_GET['devcate']){
			$_SESSION['devpre'] = 0;
			$num_devpages_pre=$_SESSION ['devpre'];
			include 'dev_more_period_m.php';
		}
?>

