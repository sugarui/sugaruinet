<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>사탕화면</title>
		<meta name="description" content="디자인 스튜디오 사탕화면 포트폴리오 사이트" />
		<meta name="author" content="슈가루이(sugarui)" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="./image/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

		<link type="text/css" href="./style/style.css" rel="stylesheet" />
		<script type="text/javascript">
			window.onResize = function() {
				// Calculate the height of the body, ubstract the height of the head and apply to all columns
			}
		</script>
	</head>
	
			<!--------------------DB접속-------------------->
				<?php
				include_once ('../db.php');
				?>
			
	<body>
		<div class="wrap">

			<!--LEFT NAV------------------------------------------------------------->
			<div class="nav_1">
				
				<header>
					<h1>
					<div>
						<a href="./index_work.php"> <img src="./image/logo.png" alt="사탕화면 회사로고"> </a>
					</div>
					<div>
						<img src="./image/under_construction.png" alt="공사중 표시">
					</div></h1>
				</header>

				<nav>
					<ul>
						<li> <!--작업일지-->
							<div class="nav_diary">
								작업일지
							</div>
							<div>
								<a href="https://www.facebook.com/sugaruipage" target="_blank"> <img src="./image/lnb_diary_fb.png" alt="facebook"></a>
							</div>
							<div>
								<a href="https://github.com/sugarui/sugaruinet" target="_blank"> <img src="./image/lnb_diary_gh.png" alt="github"></a>
							</div>
						</li>
						<li><!--어바웃-->
							<div class="nav_main">
								ABOUT
							</div>
						</li>
						<li><!--카테고리-->
							<div class="nav_main">
								CATEGORY
							</div>
							<div><!--구 <div class="nav_sub_cate">-->						
								<ul>
									<?php
									// Table(카테) 에 리소스획득
									$sql = 'SELECT * FROM `su_cate_01` ORDER BY id_intent';
									$result = mysql_query($sql);
									
									//리소스를 목록으로 출력						
									while ($row = mysql_fetch_array($result)){
										if(!$_GET['cate']){//카테 파라미터가 없으면
											if (!$row['cate']){ //로우값이 없으면 (목록중 all의 경우. 포스트 DB에 상응값이 없으므로 값없앰.)
												echo "
													<li>
														<a href=\"?page=1\">"//링크에 카테고리 패러미터를 넣지 않는다.
														."
														<div class=\"nav_sub_cate\">
															<div class=\"sel\"> " //셀렉트로 한다
															."
															<img src=\"./image/sel_mark_01.png\">
																{$row['cate_expression']}
															</div>
														</div>	
														</a>
													</li> ";
					
											}else{ //나머지 목록은 정상출력
												echo "
													<li>
														<a href=\"?cate={$row['cate']}&page=1\">
														<div class=\"nav_sub_cate\">
															{$row['cate_expression']}
														</div>
														</a>
													</li> ";
											}	
										}else{//카테 파라미터가 있으면
											if($row['cate'] == $_GET['cate']){
												echo "
													<li>
														<a href=\"?cate={$row['cate']}&page=1\">
														<div class=\"nav_sub_cate\">
															<div class=\"sel\">
															<img src=\"./image/sel_mark_01.png\">
																{$row['cate_expression']}
															</div>
														</div>	
														</a>
													</li> ";
											}else{
												echo "														
													<li>
														<a href=\"?cate={$row['cate']}&page=1\">
														<div class=\"nav_sub_cate\">
															{$row['cate_expression']}
														</div>
														</a>
													</li> ";
											}
										}
									}		
									?>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>


			<!--RIGHT NAV------------------------------------------------------------->
			<div class="nav_2">
				<nav>
					<ul>
						<li>
							<div class="nav_main">
								TAG
							</div>
							<div class="nav_sub_tag"><!--구 <div class="nav_sub_tag">-->
								<ul>
									<?php
										$sql = "SELECT tag FROM su_post_01 GROUP BY tag";
										$result = mysql_query($sql); // 얘 시점이 - 아 링크는 디비군 테이브링 아니고.
										$num_rows = mysql_num_rows($result);
										echo "<div class=\"tmpinfo\">태그 종류 수는 :{$num_rows}</div>";
										
										while($row = mysql_fetch_array($result)){
												
											if(!$_GET['tag']){ //없으면 그냥 출력
												echo "
													<li>
													<a href=\"?cate={$_GET['cate']}&tag={$row['tag']}&page=1\">
													<div class=\"nav_sub_tag\">
														{$row['tag']}
													</div>
													</a>
													</li>
												";	
											}else{ //있으면 비교해서 셀렉트,넌셀렉트 출력
												if($_GET['tag'] ==$row['tag']){
													echo "
														<li>
														<a href=\"?tag={$row['tag']}&page=1\">
														<div class=\"nav_sub_tag\">
															<div class=\"sel\">
																{$row['tag']}
															</div>
														</div>
														</a>
														</li>
													";		
												}else{
													echo "
														<li>
														<a href=\"?tag={$row['tag']}&page=1\">
														<div class=\"nav_sub_tag\">
															{$row['tag']}
														</div>
														</a>
														</li>
													";	
												} 	
											}
										}
									?>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>

				
			<!--CENTER---------------------------------------------------------------->
			<div class="con">
				
				<?php
				// 페이지당 출력수 결정, 페이지넘버 산출
				$num_posts_display = 3; //디피수
				if(!$_GET['page']){$_GET['page'] = 1;} //페이지 파라미터가 없을경우 1로 세팅
				$num_pages_pre = $_GET['page'] -1; //앞선페이지수는 현제페이지 -1
				$num_posts_offset = $num_posts_display * $num_pages_pre; //오프셋수는 디피수x앞선페이지수
				
				//리소스 획득 : Table(포스트) 에서 본 페이지에 출력할 전체 열, 오프셋된 일부 행
				if($_GET['cate']){
					$sql = "SELECT * FROM `su_post_01` 
					WHERE cate = '{$_GET['cate']}'
					ORDER BY worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}"; 
				}else if($_GET['tag']){
					$sql = "SELECT * FROM `su_post_01` 
					WHERE tag = '{$_GET['tag']}'
					ORDER BY worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}";
				}else{
					$sql = "SELECT * FROM `su_post_01` 
					ORDER BY worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}";
				}
				$result = mysql_query($sql);
				
				//출력 : 받은 데이터 양 만큼 : post.php(디자인된박스)에 담아서!
				while ($row = mysql_fetch_array($result)){
					include './post.php';
				}
				?>
			
				<!---------------- 페이지네이션 ------------------>
				<div class="pagenation">
					<?php
					//리소스 획득 : Table(포스트) 에서 본 카테고리 데이터"량"을 알아내기 위해 id 열, 전체 행
					if($_GET['cate']){
						$sql = "SELECT id FROM `su_post_01` WHERE cate = '{$_GET['cate']}'"; 
					}else{
						$sql = "SELECT id FROM `su_post_01`";
					}
					$result = mysql_query($sql);
					$num_rows = mysql_num_rows($result); //게시물 총수획득. 예를들어 22
					// $num_view = oo ; //페이지당 출력수선언. 상단으로 올렸음. 예를들어 3
					// echo "<div class=\"tmpinfo\">카테고리 전체 게시물 수: {$num_rows} | 페이지당 출력 게시물 수: {$num_posts_display}</div>";
					$num_pages = ceil($num_rows/$num_posts_display); //페이지수는 게시물 총수22/페이지당 출력수3=7.1 //올림해서 8		
					
					//출력
					$i = 1;// (이건 나중에 손 봐야함. 페이지 많아서 < 000 > 형태 됐을때...)
					while($i<= $num_pages) { //총페이지수까지 에코. 
		          		if ( $i == $_GET['page'] ){ //현페이지 셀렉트 체크는 파라미터로. 현페이지는 없으면 1로 이미지정.
		          			echo "
		          				<a href=\"?cate={$_GET['cate']}&page={$i}\">
		          					<span class=\"pagenation_each\"><span class=\"sel\">{$i}</span></span>
		          				</a>
		          				";
							$i++;
		          	    } else {
		              		echo "
		          				<a href=\"?cate={$_GET['cate']}&page={$i}\">
		          					<span class=\"pagenation_each\">{$i}</span>
		          				</a>
		          				";
							$i++;
						} 
		    		}
					?>
				</div>
				<!--페이지네이션 end-->
			
			</div>
			<!--CENTER end-->
		
		</div>
		<!--wrapper end-->
	</body>
</html>