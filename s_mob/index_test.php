<!DOCTYPE html>
<html lang="en">
	<?php
	
		session_save_path('./session');
		session_start();
		session_destroy();
		session_start();
		$_SESSION['pre']='0';
		$_SESSION ['tag'] = $_GET['tag'];
		$_SESSION ['cate'] = $_GET['cate'] ; 
		//echo file_get_contents( './session/sess_'.session_id() );
		
		//session_start();	
		//if ( !isset($_SESSION['num_page_pre']) ){
			//$_SESSION['num_pages_pre']=1;
		//}	
	?>
	<head>
		<?php
			include ('../s_web/head.php')
		?>	
		<link rel="stylesheet" type="text/css" href="http://elecuchi.cafe24.com/s_web/style/style_space.css" />	
		<link rel="stylesheet" type="text/css" href="./style_m.css" />
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'> <!--숫자웹폰트-->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	
	<!--DB접속-->
		<?php
		include_once ('../db.php');
		?>
			
	<body>
		<header>
			<a href="./index.php">
				<img src="http://elecuchi.cafe24.com/s_web/image/logo_mob.png" alt="사탕화면로고" style="width: 100%" />
			</a>	
			<div class="header_space"></div><!--미스터치방지-->
		</header>
		<nav>

			<ul class="menu" id="menu">			
			    <li>
			    	<?php
			    		//현메뉴확인
						if(!$_GET['special']){
							//재클릭시 링크 유지를 위해서 파라미터를 상세히 적음
							echo "<a href=\"?cate={$_GET['cate']}&page={$_GET['page']}&id={$_GET['id']}\" style=\"color:#dc2276; \">";
						}else{
 							echo "<a href=\"?cate={$_GET['cate']}&page={$_GET['page']}&id={$_GET['id']}\" >";
						}
						//출력
			    		if($_GET['id']){
			    			echo '카테고리';
						}else if(!$_GET['cate']){
			    			echo 'All works';
						}else{ //방법을 몰라서 일단 직접 적음
							if ($_GET['cate']==='guiat') { $display = "GUI <span class=\"nav_sub_cate_add\">at work</span>"; }
							else if  ($_GET['cate']==='guiafter') { $display = "GUI <span class=\"nav_sub_cate_add\">after work</span>"; }
							else if  ($_GET['cate']==='drawing') { $display = '일러스트'; }
							else if  ($_GET['cate']==='toon') { $display = '만화'; }
							else if  ($_GET['cate']==='writing') { $display = '글'; }
							else if  ($_GET['cate']==='etc') { $display = '기타'; }	
							echo $display;	
						}
						echo "&nbsp;&nbsp;▼";
						echo "</a>";
			    	?>
			        	<ul>	
				        	<?php
								$sql = 'SELECT * FROM `su_cate_01` ORDER BY id_intent';
								$result = mysql_query($sql);
					        	
					  			while ($row = mysql_fetch_array($result)){
					        		if($_GET['cate'] || $_GET['id']){ //카테가 있으면 혹은 id가 있으면
					        			echo "<li><a href=\"?cate={$row['cate']}\">{$row['cate_expression']}</a></li>";
					        		}else if($row['cate']){ //아님 로우에 카테가 있으면
					        			echo "<li><a href=\"?cate={$row['cate']}\">{$row['cate_expression']}</a></li>";
					        		}
									// 카테가 없는 all일때 출력안됨, 
									// 카테가 없을때 else if로 오는데, 그마저 로우에 카테 있을때만 출력하므로 
									// all 의 row은 건너뜀
								}	
			           		?>
			        	</ul>
			    </li>
			    <li>
			    	<?php
			    		//현메뉴확인
						if($_GET['special']){
							echo "<a href=\"?special=about&cate={$_GET['cate']}\" style=\"color:#dc2276;\" >";
						}else{
 							echo "<a href=\"?special=about&cate={$_GET['cate']}\">";
						}
			    		echo "프로필";
			    		echo "</a>";
			    	?>
			    </li>
			    <li>
			    	<a href="https://www.facebook.com/sugaruipage" style="margin-right: 20px;">
			    		개발일지
			    		<img src="http://elecuchi.cafe24.com/s_web/image/lnb_diary_fb_mob.png" alt="facebook" />
			    	</a>
			    </li>
 			</ul>
	
		</nav>
		
		<div class="navshadow"></div>
		
		<article>
			<?php include './posts_includer.php'; ?>
		</article>

	</body>
</html>