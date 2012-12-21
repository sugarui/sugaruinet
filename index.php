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
						<a href="./index.php"> <img src="./image/logo.png" alt="사탕화면 회사로고"> </a>
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
										if( ($_GET['cate'] === $row['cate']) || ( !$paravalue && !$row['cate'])  ){
											// cate파라가있고 이것이 $row의cate열과같을때 OR 파라가전혀없고 $row의cate열이비었을때(all일때)
											// 셀렉트 관련 변수를 지정한다
											$select_open = "<div class=\"sel\"><img src=\"./image/sel_mark_01.png\">&nbsp;";
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
							<div><!--구 <div class="nav_sub_tag">-->
								<ul>
									<?php
										$sql = "SELECT tag FROM su_post_01 GROUP BY tag";
										$result = mysql_query($sql);
										$num_rows = mysql_num_rows($result);
										// echo "<div class=\"tmpinfo\">태그 종류 수는 :{$num_rows}</div>";
										// 이건이제 이렇게못함.하려면 풀어서 새배열이나 테이블에 넣은후 카운트해야하는데 번거로움..
										
										//리소스를 목록으로 출력						
										while ($row = mysql_fetch_array($result)){
											
											//복수태그 원자화
											$tags = explode("@", $row['tag']); // Array(태그A, 태그B)
											
											$i=0;
											while ($i < count($tags)){
												
												//출력문 가변부 조건 및 내용 설정
												if($_GET['tag'] === $tags[$i]){
													// tag파라가있고 이것이 $row의tag열과같을때
													// 셀렉트 관련 변수를 지정한다
													$select_open = "<div class=\"sel\"><img src=\"./image/sel_mark_01.png\">&nbsp;";
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
												$i++;
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
					if(!$_GET['page']){$_GET['page'] = 1;} //페이지 파라미터가 없을경우 1로 세팅!!!
					$num_pages_pre = $_GET['page'] -1; //앞선페이지수는 현제페이지 -1
					$num_posts_offset = $num_posts_display * $num_pages_pre; //오프셋수는 디피수x앞선페이지수
					
					//리소스 획득 : Table(포스트) 에서 본 페이지에 출력할 전체 열, 오프셋된 일부 행
					/// 쿼리문 웨어부 조건 및 내용 설정
					if($paravalue){
						$where = "WHERE p.{$paraname} like '%{$paravalue}%'";
					}else{
						$where = " ";
					}
					/// 쿼리문
					$sql =  "
							SELECT p.*, c.cate_expression FROM su_post_01 AS p LEFT JOIN su_cate_01 AS c ON p.cate = c.cate"." ". 
							$where." "."
							ORDER BY id_intent DESC, worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}
							";
					/// 리절트
					$result = mysql_query($sql);
													 
					//출력 : 받은 데이터 양 만큼 : post.php(디자인된박스)에 담아서!
					while ($row = mysql_fetch_array($result)){
						include './post.php';				
				}	
				?>
					
<!-- 			<script type="text/javascript">
				function copy(trb) {
					var IE = (document.all) ? true : false;
					if (IE) {
						if (confirm("이 글의 트랙백 주소를 복사하시겠습니까?"))
							window.clipboardData.setData("Text", trb);
						} else {
							temp = prompt("이 글의 트랙백 주소입니다.", trb);
						}
					}
			</script> -->

				
				
				<script type="text/javascript">
					var array = document.getElementsByName('url'); // Array (div,div,div)

					//트랙백코드참고자료//
					function copy(trb) {
						var IE = (document.all) ? true : false;
						if (IE) {
							if (confirm("이 글의 트랙백 주소를 복사하시겠습니까?"))
								window.clipboardData.setData("Text", trb);
						} else {
							temp = prompt("이 글의 트랙백 주소입니다.", trb);
						}
					}
					//트랙백코드참고자료끝//
					
					function arrayHandler0(){
						info = array[0].getAttribute('info');	
						array[0].innerHTML=
							'<input type="button" value="이동" onclick="'
							+info
							+'"/>'
							+info
							;
						// array[0].setAttribute('a href', array[0].innerHTML);
						// a[0].setAttribute('href', array[0].getAttribute('info'));
					
					}
					function arrayHandler1(){
						info = array[1].getAttribute('info');
						array[1].innerHTML=info;
					}
					function arrayHandler2(){
						info = array[2].getAttribute('info');
						array[2].innerHTML=info;
					}


					array[0].addEventListener('click', arrayHandler0, false);
					array[1].addEventListener('click', arrayHandler1, false);
					array[2].addEventListener('click', arrayHandler2, false);
					
				</script>
				
				<!--링크자료-->
				<a href="http://aaaa.com/aaa/12312" onclick="copy(this.href); return false;">복사</a>
				
				<!---------------- 페이지네이션 ------------------>
				
				<div class="pagenation">
					
					<?php
					
					//파라미터가 id일때는 1개뿐이므로 페이지네이션이 필요가 없다
					if ($paraname != 'id'){ 
					
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
					
					?>
				</div>
				<!--페이지네이션 end-->
			
			</div>
			<!--CENTER end-->
		
		</div>
		<!--wrapper end-->
	</body>
</html>