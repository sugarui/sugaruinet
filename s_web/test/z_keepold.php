<?php
 //if ($page_now <= $range){
					        //	$i=1;
							//	$page_limit = $range;
					        //}else if ($page_now > $range){
					        	$x = ceil($page_now / $range) - 1;	// 6일땐 = 2-1 : 1 , 10일때도 2-1 = 1  // 1일땐 = 1-1 +0   5일땐 1-1 = 0
 					        	$prev = $range*$x; //앞선페이지는 5 // 1일땐 0
								$i = $prev + 1;  // 시작은 1이나 6
								$limit = ceil($page_now / $range) * $range; //리미트
					        //}
?>



<?php
	// $a = array('사과','딸기','바나나','망고');
	
	//$_GET['special'] = 'about';
	include '../s_web/select.php';
	while ($row = mysql_fetch_array($result) ){
		$post_each = 
			" 
			<div class=\"postbox\"> ;
				<div class=\"title\"><h2>
					{$row['title']}
				</h2></div>
				<div class=\"worked\">
					{$row['worked']}
				</div>
			</div>;
			";
			
		array_push($posts_arr, $post_each); 
	}
				
	echo json_encode(array( 
		'answer'=>true,
        //'msg' =>$a[3]       
		'msg' =>$posts_arr[0] 
		)
	)		
?>



<?php
	//$a = array('사과','딸기','바나나','망고');

			include_once ('../db.php');
			
			//파라미터 관련 변수 인클루드
			include './variable_para.php';
				
			// DB로부터 컨텐츠 셀렉트
			include './select.php';
			//출력 
			while ($row = mysql_fetch_array($result) ){
			$post_each = 
			" 
			<div class=\"postbox\">
				<div class=\"title\"><h2>
					{$row['title']}
				</h2></div>
				<div class=\"worked\">
					{$row['worked']}
				</div>
			</div>
			";
			array_push($posts_arr, $post_each); 
	}
	echo $posts_arr[1];
	echo "-----------------------<br>";
				
	echo json_encode(array( 
		'answer'=>true,
        //'msg' =>$a[3]       
		'msg' => $posts_arr[1]
		)
	) 
			
?>
////
















<li><!--카테고리-->
							<a href="?cate=">
								<div class="nav_main">
									WORKS
								</div>
							</a>

							<div><!--구 <div class="nav_sub_cate">-->						
								<ul>
									<?php
																		
									//리소스를 목록으로 출력						
									while ($row = mysql_fetch_array($result)){
											
										//출력문 가변부 조건 및 내용 설정
										if( ($_GET['cate'] === $row['cate']) || ( !$paravalue && !$row['cate'] && !$_GET['special'])  ){
											// cate파라가있고 이것이 $row의cate열과같을때 OR 파라가전혀없고 $row의cate열이비었을때(all일때) 이면서 $row_special 스페셜값이 없을때
											// 셀렉트 관련 변수를 지정한다
											$select_open = "<div class=\"sel\"><img src=\"./s_web/image/sel_mark_01.png\">&nbsp;";
											$select_close = "</div>";
										}else{
											$select_open = " ";
											$select_close = " ";
										}	
										//출력문 고정부 설정
										$link = $row['cate'];
										$display = $row['cate_expression'];
										$list = " 
											<li>
												<a href=\"?cate={$link}\">
													<div class=\"nav_sub_cate\">".
														$select_open.
										 					$display.
														$select_close.
													"</div>
												</a>
											</li>
										";
										
										//출력
										echo $list;
									}				
									?>
								</ul>
							</div>
						</li>
						
						<li><!--어바웃-->
							<a href="?special=about">
								<div class="nav_main">	
									<div class="moveup1">	
										<?php
										if($_GET['special']==='about'){
											echo "<img src=\"./s_web/image/sel_mark_02.png\">&nbsp;ABOUT ME";
										}else{
											echo "ABOUT ME";
										}
										?>
									</div>
								</div>
							</a>
						</li>
						
						<li><!--방명록-->
							<a href="?special=guest">
								<div class="nav_main">
									<div class="moveup2">	
										<?php
										if($_GET['special']==='guest'){
											echo "<img src=\"./s_web/image/sel_mark_02.png\">&nbsp;GUEST";
										}else{
											echo "GUEST";
										}
										?>
									</div>
								</div>
							</a>
						</li>