<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
			include_once ('./sugaruinet/head.php')
		?>		
		<link rel="stylesheet" type="text/css" href="./sugaruinet/style/style_space.css"  />
		<link rel="stylesheet" type="text/css" href="./sugaruinet/style/style.css"  />
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
						
						<div class="header_web">
							<a href="./index.php"> <img src="./sugaruinet/image/logo.png" alt="사탕화면 회사로고"> </a>
						</div>
						
						<div class="header_mob">
							<img src="./sugaruinet/image/logo_mob.png" alt="사탕화면 회사로고"> </a>
						</div>

					</h1>
				</header>

				<nav>
					
					<?php
									//파라미터 기준 설정(카테냐,태그냐,아이디냐)
							        if($_GET['cate']){
							        	$paraname = 'cate'; 
										$paravalue = $_GET['cate']; 
									}else if($_GET['tag']){
			 							$paraname = 'tag';  
										$paravalue = $_GET['tag'];
									}else if($_GET['id']){
										$paraname = 'id';  
										$paravalue = $_GET['id'];
									}
									
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
											$select_open = "<div class=\"sel\"><img src=\"./sugaruinet/image/sel_mark_01.png\">&nbsp;";
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
										echo "<img src=\"./sugaruinet/image/sel_mark_02.png\">&nbsp;ABOUT";
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
										echo "<img src=\"./sugaruinet/image/sel_mark_02.png\">&nbsp;GUEST";
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
									 <img src="./sugaruinet/image/lnb_diary_fb.png" alt="facebook">
								</a>
							</div>
							<div class="icon">
								<a href="https://github.com/sugarui/sugaruinet" target="_blank">
									<img src="./sugaruinet/image/lnb_diary_gh.png" alt="github">
								</a>
							</div>
						</li>
						
						<li> <!--채널-->
							<div class="nav_contact">
								채널
							</div>
								<ul>
									<div class="icon">
									<a href="https://www.facebook.com/sugaruipage#!/sugar.ui.9" target="_blank"> 
										 <img src="./sugaruinet/image/lnb_sns_fb.png" alt="facebook">
									</a>
									</div>
									<div class="icon">
									<a href="https://twitter.com/sugarui" target="_blank"> 
										 <img src="./sugaruinet/image/lnb_sns_tw.png" alt="twitter">	
									</a>
									</div>
									<div class="icon">
									<a href="http://blog.naver.com/sugarui" target="_blank">
										 <img src="./sugaruinet/image/lnb_sns_blog.png" alt="blog">
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
												$select_open = "<div class=\"sel\"><img src=\"./sugaruinet/image/sel_mark_01.png\">&nbsp;";
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
				include './sugaruinet/select.php';
				//출력 
				while ($row = mysql_fetch_array($result) ){
					include './sugaruinet/post.php';
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
					
						//리소스 획득 : Table(포스트) 에서 본 카테고리 데이터"량"을 알아내기 위해 id 열, 전체 행
						if($paravalue){
							$sql = "SELECT id FROM `su_post_01` WHERE $paraname = '$paravalue'"; 
						}else{
							$sql = "SELECT id FROM `su_post_01`";
						}
						$result = mysql_query($sql);
						$num_rows = mysql_num_rows($result); // 게시물 총수획득. 예를들어 22  / $num_view = oo ;페이지당 출력수선언. 올렸음. 예를들어 3
						// echo "<div class=\"tmpinfo\">카테고리 전체 게시물 수: {$num_rows} | 페이지당 출력 게시물 수: {$num_posts_display}</div>";
						$num_pages = ceil($num_rows/$num_posts_display); //페이지수는 게시물 총수22/페이지당 출력수3=7.1 //올림해서 8		
						
						//출력
						if ( $num_pages > 1){ //페이지수가 1 이상일때만
						$i = 1;// (이건 나중에 손 봐야함. 페이지 많아서 < 000 > 형태 됐을때...)
							while($i<= $num_pages) { //총페이지수까지 에코. 
				          		
				          		if($i == $_GET['page']){ //현페이지 셀렉트 체크는 파라미터로. 페이지 파라미터는 없으면 1로 이미지정.
				          			echo "
				          				<a href=\"?{$paraname}={$paravalue}&page={$i}\">
				          					<span class=\"pagenation_each\"><span class=\"sel\">{$i}</span></span>
				          				</a>
				          				";
									$i++;
				          	    }else{
				              		echo "
				          				<a href=\"?{$paraname}={$paravalue}&page={$i}\">
				          					<span class=\"pagenation_each\">{$i}</span>
				          				</a>
				          				";
									$i++;
								} 
				    		}
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