<!DOCTYPE html>
<html lang="en" id="html">

		<?php	
			if($_GET['devtag']){
				session_save_path('./session/devtag');
			}else if ($_GET['devcate']){
				session_save_path('./session/dev');
			}else{
				session_save_path('./session');
			}	
			session_start();
			session_destroy();
			session_start();
			$_SESSION['pre']= '0';
			$_SESSION['tag'] = $_GET['tag'];
			$_SESSION['cate'] = $_GET['cate'] ; 
			$_SESSION['devtag'] = $_GET['devtag'];
			$_SESSION['devcate'] = $_GET['devcate'] ;
		?>

		<script src='http://code.jquery.com/jquery-latest.js'></script>
		<script type="text/javascript" charset="UTF-8">
		
			//모바일분기
			/*
			if (  
				( navigator.userAgent.match(/iPhone/i) )||    //아이폰
	   			( navigator.userAgent.match(/iPod/i) )||          //아이팟
	  			( navigator.userAgent.match(/android/i) )      //안드로이드 계열
	   		){ 		
				alert ( '모바일 페이지가 현재 잠시 공사 중입니다.' );
				//window.location.replace('s_mob/index.php')	 // 작동, 허나 url이 바뀜
				$("#html").load("/s_mob/index.php");  // 작동, url도 유지
			}
		
		</script>
	
	<head>
		<?php include_once ('./s_web/head.php') ?>		

		<link rel='stylesheet' type='text/css' href='./s_web/style/style_space.css'  />
		<link rel='stylesheet' type='text/css' href='./s_web/style/style.css'  />
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'> <!--숫자웹폰트-->
		<script src='http://elecuchi.cafe24.com/s_web/js/jindo.desktop.min.ns.js'></script>

	</head>
	
		<?php
			include_once ('./db.php');
		?>
		
	<body id="body">

		<div class="wrap">

			<!--LEFT NAV------------------------------------------------------------->
			<div class="nav_1">
				<header>
					<h1>
						<a href="http://sugarui.net"> <img src="./s_web/image/logo.png" alt="사탕화면 회사로고"> </a>
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
						
						<!--<div class="space_50"></div>-->
						<li> <!--개발일지-->
							<a href="?devcate=start">
								<div class="nav_dev">
									사이트 개발일지<br>
									<!--<span class='nor'>단추로 끓인 스프</span>-->
								</div>
							</a>
							
							<?php if($_GET['devcate'] || $_GET['devtag']){echo "<div>";}else{echo "<div class='display_none'>";}?>

							<div class="nav_sub_dev_area"><!--구 <div class="nav_sub_cate">-->						
								
								<ul>
									 
								<?php
									$years=array(12,13);
									$i=0;
									
									while ($i < 2) {
										echo "<li><div class='year'>'{$years[$i]}</div>";
										echo '<ul>';
										
										$sql = "SELECT * FROM `su_cate_02` 
											WHERE period BETWEEN '20".
											$years[$i]."-01-01' AND '20".$years[$i]."-12-31' ORDER BY period
											";
										$result = mysql_query($sql);										
														
										//리소스를 목록으로 출력						
										while ($row = mysql_fetch_array($result)) {
											$date_ori = date_create_from_format('Y-m-d', $row['period']);
											$date_y =  date_format($date_ori, 'Y');
											$date_m =  date_format($date_ori, 'm');
											//출력문 가변부 조건 및 내용 설정
											if( ($_GET['devcate']) && ($_GET['devcate'] === $row['cate']) && ( !$_GET['special']) ) {
												// cate파라가있고 이것이 $row의cate열과같을때 
												// $row_special 스페셜값이 없을때
												// 셀렉트 관련 변수를 지정한다
												$select_open = "
													<div class='sel'>
														<div class='milestone'>
															<img src='./s_web/image/milestone_lnb_sel.png'/>
														</div>";	
												$select_close = "
													</div>";
											}else{
												$select_open = "
													<div class='milestone'>
														<img src='./s_web/image/milestone_lnb_nor.png'/>
													</div>";
												$select_close = "";
											}
											//출력문 고정부 설정
											$link = $row['cate'];
											$display_text = $row['cate_expression'];
											$display_period = $row['period'];
											$list = " 
												<li>
												<div>
													<a href=\"?devcate={$link}\">
														<div class=\"nav_sub_dev\">".
															$select_open.
																"<div class='nav_sub_dev_period'>".
											 					$date_m."</div>".
																"<div class='nav_sub_dev_text'>".
											 					$display_text."</div>".
															$select_close.
														"</div>
													</a>
												</div>
												</li>
											";
											//출력
											echo $list;
										}		
										echo '</ul>';
										echo '</li>';
										$i++;
									}
								?>
								</ul>
									<!--
									<div class="icon_dev">
										<a href="https://www.facebook.com/sugaruipage" target="_blank">
											 <img src="./s_web/image/lnb_diary_fb_g.png" alt="facebook">
										</a>
									</div>
									<div class="icon_dev">
										<a href="https://github.com/sugarui/sugaruinet" target="_blank">
											<img src="./s_web/image/lnb_diary_gh_g.png" alt="github">
										</a>
									</div>
									-->
								</div>
							<?php
							echo "</div>";
							?>
						</li>
						

	
					
						<!--<li> 
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
						</li>-->
			
					</ul>
				</nav>

			</div>
			<?php //echo " <div class=\"nav_sub_cate\">$select_open $display $select_close </div><br>"; ?>

			<!--RIGHT NAV------------------------------------------------------------->
			<div class="nav_2">
				<nav>
					<ul>
						<li>
							<?php
								if($_GET['devcate'] || $_GET['devtag']){
									echo "<div class='nav_devtag'>";
								}else{
									echo "<div class='nav_main'>";
								}
							?>	
								TAG
							</div>
							<div><!--구 <div class="nav_sub_tag">-->
								<ul>
									<?php
										if($_GET['devcate'] || $_GET['devtag']){
											$table = 'su_post_02';
											$tag = 'devtag';
										}else{
											$table = 'su_post_01';
											$tag = 'tag';
										}
									?>	
									<?php
										$sql = "SELECT tag FROM {$table} GROUP BY tag";
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
											if( (($_GET['tag']) && ($_GET['tag'] === $tags[$i])) || 
											   (($_GET['devtag']) && ($_GET['devtag'] === $tags[$i]))){
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
													<a href=\"?{$tag}={$link}\">
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
						
					
						<li class="dgb">					
							<?php
								if($_GET['devcate'] || $_GET['devtag']){
									echo "<span class='nav_hidden'>";
								}else{
									echo "<span>";
								}
							?>	
								<div class='nav_main'>
									PROJECT LINK	
								</div>
								<a href="http://dong9.org/" target="_blank">
								<img src="./s_web/image/dgb_bn_125x125.jpg" />
								</a>					
							</span>
						</li>	
					
					
					</ul>
					</nav>
			</div>

			
			
			<!--CENTER---------------------------------------------------------------->
			<article id="article">
				
				<?php
					if($_GET['devcate'] || $_GET['devtag'] || $_GET['devid']){	
						echo '<ul class="article_dev">';
						include './s_web/dev_includer.php';
						echo '</ul>';
					/*}else if($_GET['devtag'] || $_GET['devid']){
						echo '<ul class="article_dev">';
						include './s_web/dev_includer_unique.php';
						echo '</ul>';*/
					}else{
						include './s_web/select.php';
						while ($row = mysql_fetch_array($result) ){
							include './s_web/post.php';
						}	
					}	
				?>
				
				<script type="text/javascript">//share 스크립트 (http://hosting.websearch.kr/38)
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
				<script>//글접기열기 수제
					$("#opener").click(function(){
						$("#opendiv").attr("class","display_block");
						$("#opener").remove();
					})		
				</script>
				
							
				<!---------------- 페이지네이션 ------------------>
				<div class="pagenation">
					
					<?php
					//스페셜 페이지일때, 혹은 파라미터가 id일때는 1개뿐이므로 페이지네이션이 필요가 없다
					if ( ($paraname != 'id') && ($paraname != 'devcate') && (!$_GET['special']) ){ 
						include './s_web/pagenation.php';	
					}
					?>
				</div>
				<!--페이지네이션 end-->
			
			</article>
			<!--CENTER end-->
		
		</div>
		<!--wrapper end-->
	</body>
</html>     