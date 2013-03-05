<?php 	// load형식이므로, 자체적으로 컨텐츠가 완성되어서 불러져야 함
	/*session_save_path('session');*/
	if($_GET['id']){
		session_save_path('../session/postid');
	}else if($_GET['tag']){
		session_save_path('../session/posttag');
	}else{
		session_save_path('../session');
	}
	session_start();
	//echo "현재앞선페이지는 세션값인".$_SESSION['pre']."<br>";
	//echo "세션값을 변수 넘프리에 대입할꺼다.<br>";
	$num_pages_pre=$_SESSION ['pre'];
	//echo "대입한 넘프리는".$num_pages_pre."<br>";
	
	//DB접속	
	include '../db.php';
			
	// 파라미터를 세션에서 받기
	$_GET['cate'] = $_SESSION ['cate'];
	$_GET['tag'] = $_SESSION ['tag'] ;
		 
	//파라미터 관련 변수 인클루드
	include '../s_web/variable_para.php';
				
	// DB로부터 컨텐츠 셀렉트. include '../s_web/select.php' 을 변형함
		$num_posts_display = 3; //디피수 - 올려옴
		$num_posts_offset = $num_posts_display * $num_pages_pre; //오프셋수는 디피수x앞선페이지수

		// 쿼리문 웨어부 조건 및 내용 설정
		if($_GET['special']){
			//데이터 요청및 수신
			$sql =  "SELECT * FROM su_special_01 WHERE `special` = '{$_GET['special'] }' ";
			$result = mysql_query($sql);	
		}else{
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
		}
	//출력 
	while ($row = mysql_fetch_array($result) ){
		include 'post_m.php'; 
		//와꾸는 post_m이지만 그속에 post_core는 웹과같다.
	}
	//세션값 보내기:재료 여부에 따라 더보기 여부를 결정
          ///리소스 획득 : Table(포스트) 에서 본 카테고리 데이터"량"을 알아내기 위해 id 열, 전체 행
          if($paravalue){
               $sql = "SELECT id FROM `su_post_01` WHERE $paraname = '$paravalue'"; 
          }else{
               $sql = "SELECT id FROM `su_post_01`";
          }
          $result = mysql_query($sql);
          $num_rows = mysql_num_rows($result); // 게시물 총수획득. 예를들어 32  
          $num_pages = ceil($num_rows/$num_posts_display); //페이지수는 게시물 총수32/페이지당 출력수3 =10, 올림해서 11
          if($_GET['special']){
		  }else{
	          if ( $num_pages_pre < $num_pages-1 ){
	               //echo "넘페이지프리는".$num_pages_pre."<br>";
	               $divid=$num_pages_pre;
	               $num_pages_pre++;
	               include 'post_more_m.php'; 
	               $_SESSION['pre'] = $num_pages_pre; 
	          }
		  }
?>
<!--위치조정-->