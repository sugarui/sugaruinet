<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
			include_once ('./s_web/head.php')
		?>		
		<link rel="stylesheet" type="text/css" href="./s_web/style/style_space.css"  />
		<link rel="stylesheet" type="text/css" href="./s_web/style/style.css"  />
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'> <!--숫자웹폰트-->
	</head>
	
	<!--DB접속-->
		<?php
		include_once ('./db.php');
		?>
			
	<body>
		<div class="wrap">

			<!--LEFT NAV------------------------------------------------------------->
			<div class="nav_1">
				<header>
					<h1>
						<a href="./index.php"> <img src="./s_web/image/logo.png" alt="사탕화면 회사로고"> </a>
					</h1>
				</header>

				<nav>
					
					<?php
					//파라미터 관련 변수 인클루드
					include './s_web/variable_para.php';
									
					//Table(카테) 로부터 리소스획득
					$sql = 'SELECT * FROM `su_cate_01` ORDER BY id_intent';
					$result = mysql_query($sql);
					?>
					
					<ul>
						<li><!--카테고리-->
							<div class="nav_main">
								CATEGORY
							</div>
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
									<?php
									if($_GET['special']==='about'){
										echo "<img src=\"./s_web/image/sel_mark_02.png\">&nbsp;ABOUT";
									}else{
										echo "ABOUT";
									}
									?>
								</div>
							</a>
						</li>
						<li><!--방명록-->
							<a href="?special=guest">
								<div class="nav_main">	
									<?php
									if($_GET['special']==='guest'){
										echo "<img src=\"./s_web/image/sel_mark_02.png\">&nbsp;GUEST";
									}else{
										echo "GUEST";
									}
									?>
								</div>
							</a>
						</li>
						
						<div class="space_50"></div>
						<li> <!--작업일지-->
							<div class="nav_contact">
								작업일지
							</div>
							<div class="icon">
								<a href="https://www.facebook.com/sugaruipage" target="_blank">
									 <img src="./s_web/image/lnb_diary_fb.png" alt="facebook">
								</a>
							</div>
							<div class="icon">
								<a href="https://github.com/sugarui/sugaruinet" target="_blank">
									<img src="./s_web/image/lnb_diary_gh.png" alt="github">
								</a>
							</div>
						</li>
						
						<li> <!--채널-->
							<div class="nav_contact">
								채널
							</div>
								<ul>
									<div class="icon">
									<a href="<a href="https://www.facebook.com/sugar.ui.9" target="_blank"> 
										 <img src="./s_web/image/lnb_sns_fb.png" alt="facebook">
									</a>
									</div>
									<div class="icon">
									<a href="https://twitter.com/sugarui" target="_blank"> 
										 <img src="./s_web/image/lnb_sns_tw.png" alt="twitter">	
									</a>
									</div>
									<div class="icon">
									<a href="http://blog.naver.com/sugarui" target="_blank">
										 <img src="./s_web/image/lnb_sns_blog.png" alt="blog">
									</a>
									</div>
								</ul>
						</li>
			
					</ul>
				</nav>

			</div>
			<?php //echo " <div class=\"nav_sub_cate\">$select_open $display $select_close </div><br>"; ?>

			<!--RIGHT NAV------------------------------------------------------------->
			<div class="nav_2">
				<nav>
					<ul>
						<li>
							<div class="nav_main">
								TAG
							</div>
							<div><!--구 <div class="nav_sub_tag">-->
								<ul>
									<?php
										$sql = "SELECT tag FROM su_post_01 GROUP BY tag";
										$result = mysql_query($sql);
										$tags_arr = array();
										while ($row = mysql_fetch_array($result)){
											array_push($tags_arr, $row['tag']); // 던져넣기
										}
										
										//복수태그 원자화, 정렬
									    $tags_implode = implode("@", $tags_arr);
										$tags_explode = explode("@", $tags_implode);
										$tags = array_unique($tags_explode);
										array_multisort($tags);
										
										//리소스를 목록으로 출력						
										$i=0;
										while($i < count($tags)){
											//출력문 가변부 조건 및 내용 설정
											if(($_GET['tag']) && ($_GET['tag'] === $tags[$i])){
												// tag파라가있고 이것이 $row의tag열과같을때
												// 셀렉트 관련 변수를 지정한다
												$select_open = "<div class=\"sel\"><img src=\"./s_web/image/sel_mark_01.png\">&nbsp;";
												$select_close = "</div>";
											}else{
												$select_open = " ";
												$select_close = " ";
											}
											//출력문 고정부 설정
											$link = $tags[$i];  
											$display = $tags[$i];
											$list = " 
												<li>
													<a href=\"?tag={$link}\">
														<div class=\"nav_sub_tag\">".
															$select_open.
											 					$display.
															$select_close.
														"</div>
													</a>
												</li>
											";	
											//출력
											echo $list;
											$i++;
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
				// DB로부터 컨텐츠 셀렉트
				include './s_web/select.php';
				//출력 
				while ($row = mysql_fetch_array($result) ){
					include './s_web/post.php';
				}	
				?> 
				
				<script type="text/javascript">//자료참조 http://hosting.websearch.kr/38	
					function copy(trb) {
						var IE = (document.all) ? true : false;
						if (IE) {
							if (confirm("이 글의 주소를 복사하시겠습니까?"))
								window.clipboardData.setData("Text", trb);
						} else {
							temp = prompt("이 글의 주소입니다. ctrl+c로 복사하세요.", trb);
						}
					}
				</script>		
							
				<!---------------- 페이지네이션 ------------------>
				<div class="pagenation">
					
					<?php
					//스페셜 페이지일때, 혹은 파라미터가 id일때는 1개뿐이므로 페이지네이션이 필요가 없다
					if ( ($paraname != 'id') && (!$_GET['special']) ){ 
						include './s_web/pagenation.php';	
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