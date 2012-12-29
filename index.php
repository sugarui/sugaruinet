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

		<link rel="shortcut icon" href="./sugaruinet/image/favicon.ico" />
		<link rel="apple-touch-icon" href="./sugaruinet/image/apple-touch-icon@2x.png" />

		<link type="text/css" href="./sugaruinet/style/style.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'> <!--숫자웹폰트-->
		<!--[If lte IE 9]>
		<link rel="stylesheet" type="text/css" media="screen, projection" href="./sugaruinet/style/fontsie.css"  />
		<![endif]-->	
		<script type="text/javascript">
			window.onResize = function() {
				// Calculate the height of the body, ubstract the height of the head and apply to all columns
			}
		</script>
	</head>
	
			<!--------------------DB접속-------------------->
				<?php
				include_once ('./db.php');
				?>
			
	<body>
		<div class="wrap">

			<!--LEFT NAV------------------------------------------------------------->
			<div class="nav_1">
				
				<header>
					<h1>
					<div>
						<a href="./index.php"> <img src="./sugaruinet/image/logo.png" alt="사탕화면 회사로고"> </a>
					</div>
					</h1>
				</header>

				<nav>
					<ul>
						<li><!--카테고리-->
							<div class="nav_main">
								CATEGORY
							</div>
							<div><!--구 <div class="nav_sub_cate">-->						
								<ul>
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

					// 페이지당 출력수 결정, 페이지넘버 산출
					$num_posts_display = 5; //디피수
					if(!$_GET['page']){$_GET['page'] = 1;} //페이지 파라미터가 없을경우 1로 세팅!!!
					$num_pages_pre = $_GET['page'] -1; //앞선페이지수는 현제페이지 -1
					$num_posts_offset = $num_posts_display * $num_pages_pre; //오프셋수는 디피수x앞선페이지수
					
					//리소스 획득 : Table(포스트) 에서 본 페이지에 출력할 전체 열, 오프셋된 일부 행
					/// 쿼리문 웨어부 조건 및 내용 설정
					if($_GET['tag']){
						$where = "WHERE p.{$paraname} like '%{$paravalue}%'";
					}else if($paravalue){
						$where = "WHERE p.{$paraname} = '{$paravalue}'";
					}else{
						$where = " ";
					}
					/// 쿼리문
					$sql =  "
							SELECT p.*, c.cate_expression FROM su_post_01 AS p LEFT JOIN su_cate_01 AS c ON p.cate = c.cate"." ". 
							$where." "."
							ORDER BY id_intent DESC, worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}
							";
					$result = mysql_query($sql);
						 
					//출력 : 받은 데이터 양 만큼 : post.php(디자인된박스)에 담아서!
					while ($row = mysql_fetch_array($result) ){
						
						if(!$_GET['special']){ //스페셜이 없을 때만
							echo"
								<div class=\"postbox\">
									<div class=\"dogear\">
										<img src=\"./sugaruinet/image/dogear.png\">
									</div>						
									<div class=\"post\">
								";
							include './sugaruinet/post.php';
							echo"
									</div>
								</div>
									";
							}
					}
					
					////// 스페셜 /////
					//쿼리문
					$sql_special =  "SELECT * FROM su_special_01 WHERE `special` = '{$_GET['special'] }' ";
					$result_special = mysql_query($sql_special);
						 
					// 스페셜 출력 : 받은 데이터 양 만큼 : post.php(디자인된박스)에 담아서!				
					while ($row_special = mysql_fetch_array($result_special) ){
						echo "
							<div class=\"postbox\">
								<div class=\"dogear\">
									<img src=\"./sugaruinet/image/dogear.png\">
								</div>						
								<div class=\"post\">
							";
						include './sugaruinet/post_special.php';
						echo "
							</div>
						</div>
						";
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