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
			<!---------------DB접속및 리소스획득--------------->
				<?php
				include_once ('../db.php');
				
				// 이것도 걍 접속정보로 보내 버리
				//mysql_query("set session character_set_connection=utf8;");
				//mysql_query("set session character_set_results=utf8;");
				//mysql_query("set session character_set_client=utf8;");
								
				$sql = 'SELECT * FROM `su_post_01` ORDER BY id ASC LIMIT 5 '; //쿼리문
				$result = mysql_query($sql); //쿼리문 보냄
				?>
			
	<body>
		<div class="wrap">

			<!--------------------left-------------------->
			<div class="nav_1">
				<header>
					<h1>
					<div>
						<a href="./index.html"> <img src="./image/logo.png" alt="사탕화면 회사로고"> </a>
					</div>
					<div>
						<img src="./image/under_construction.png" alt="공사중 표시">
					</div></h1>
				</header>

				<nav>
					<ul>
						<li>
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

						<li>
							<div class="nav_main">
								ABOUT
							</div>
						</li>

						<li>
							<div class="nav_main">
								CATEGORY
							</div>
							<div class="nav_sub_cate">

								<ul>
									<li>
										<div class="sel">
											<img src="./image/sel_mark_01_tmp.png">
											GUI
											<div class="nav_sub_cate_add">
												at work
											</div>
										</div>
									</li>
									<li>
										GUI
										<div class="nav_sub_cate_add">
											after work
										</div>
									</li>
									<li>
										그림
									</li>
									<li>
										글
									</li>
									<li>
										기타
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>

			<!-------------------right-------------------->
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
											<img src="./image/sel_mark_01_tmp.png">
										</div>
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
									</li>
									<li>
										기타등등
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

			<!----------------center start---------------->
			<div class="con">
				
				<?php
					while ($row = mysql_fetch_array($result)){
						include './post.php';
					}
				?>
				
			</div>
			<!--center end-->

		</div>
		<!--wrapper end-->
	</body>
</html>