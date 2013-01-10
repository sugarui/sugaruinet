<?php

	
	// 자체적으로 컨텐츠가 완성되어서 불러져야 함?
	
	//DB접속	
	include '../db.php';
		
	//파라미터 관련 변수 인클루드
	include '../s_web/variable_para.php';
				
	// DB로부터 컨텐츠 셀렉트
	//include '../s_web/select.php';
	// 이하 select.php - 변수 다듬어야 함
	// 페이지당 출력수 결정, 페이지넘버 산출
		$num_posts_display = 5; //디피수
		if (!isset($num_pages_pre)){
			$num_pages_pre=1;
			//if(!$_GET['page']){$_GET['page'] = 1;} //페이지 파라미터가 없을경우 1로 세팅!!!
			//$num_pages_pre = $_GET['page'] -1; //앞선페이지수는 현제페이지 -1
		}
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
	
	
	if (!isset($id_namer)){
		$id_namer=1;
	}
	$num_pages_pre++;
	$id_namer++;
?>

				<!---------- 더보기 : 로드방식 http://bit.ly/10gU7kN -->
				<div style="width:100%; border-bottom:1px solid #ccc;">
					
				<?php echo "<div id=\"{$id_namer}\">";?> 또 로드 디폴트</div>
                <input type="button" value="또 로드" id="getResult" /> 
                <script>
                   	$('#getResult').click( function() {
                   		$("#<?php echo "{$id_namer}"; ?>").load("http://elecuchi.cafe24.com/s_mob/posts_includer.php")
                    });
                </script>                
				<!--더보기 end-->