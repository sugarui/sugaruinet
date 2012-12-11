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
			
				<!---------Table(카테) 접속및 리소스획득--------->
				<?php
				$sql = 'SELECT * FROM `su_cate_01` ORDER BY id_intent'; //쿼리문
				$result = mysql_query($sql); //쿼리문 보냄
				?>
				<!--Table(카테) end-->
			
			<div class="nav_1">
				<header>
					<h1>
					<div>
						<a href="./index_work.php?cate=all&page=1"> <img src="./image/logo.png" alt="사탕화면 회사로고"> </a>
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
							<div>
							<!--<div class="nav_sub_cate">-->
								<ul>
									<?php						
									while ($row = mysql_fetch_array($result)){
										if ($row['cate'] == $_GET['cate']){
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
												</li>
												";
											}else{
												echo "
												<li>
													<a href=\"?cate={$row['cate']}&page=1\">
													<div class=\"nav_sub_cate\">
													{$row['cate_expression']}
													</div>
													</a>
												</li>
												";
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
							<div class="nav_sub_tag">
								<ul>
									<li>
										시뮬레이션
									</li>
									<li>
										컨셉스케치
									</li>
									<li>
										트렌드
									</li>
									<li>
										<div class="sel">
											Enlgish test
											<img src="./image/sel_mark_01.png">
										</div>
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									
									
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>


			<!--CENTER---------------------------------------------------------------->
			
			<!---------Table(포스트) 접속및 리소스획득---------->
			<?php
			// if (!$cate = $_GET['cate']){
			if ($_GET['cate'] == 'all'){
				$sql = "SELECT * FROM `su_post_01` 
					ORDER BY id DESC LIMIT 6"; //쿼리문	
			}else{
				$sql = "SELECT * FROM `su_post_01` 
				WHERE cate=\"$cate\"
				ORDER BY id DESC"; //쿼리문	
			}
			$result = mysql_query($sql); //쿼리문 보냄
			?>
			<!--Table(포스트)... end-->

			<div class="con">		
				<?php
				while ($row = mysql_fetch_array($result)){
					include './post.php';
				}
				?>
			
				<!---------------- 페이지네이션 ----------------->
				<div class="pagenation">
					<?php
					$num_rows = mysql_num_rows($result); //게시물 총수22
					$num_view = 3; //페이지당 출력수. 나중에 SELECT쪽으로 올리고, 웨어문 연산도 해야 함.
					$num_pages = ceil($num_rows/$num_view); //페이지수는 게시물 총수22/페이지당 출력수3=7.1 //올림해서 8		
							
					$i = 1;	
					while($i<= $num_pages) {
		          		if ( $i == $_GET['page'] ){
		          			echo "
		          				<a href=\"?cate={$row['cate']}&page={$i}\">
		          					<span class=\"pagenation_each\"><span class=\"sel\">{$i}</span></span>
		          				</span>
		          				</a>
		          				";
							$i++;
		          	    } else {
		              		echo "
		          				<a href=\"?cate={$row['cate']}&page={$i}\">
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