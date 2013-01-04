<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
			include ('./sugaruinet/head.php')
		?>	
		<link rel="stylesheet" type="text/css" href="./sugaruinet/style/style_space.css"  />	
		<link rel="stylesheet" type="text/css" href="./style/style_m.css"  />
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'> <!--숫자웹폰트-->
	</head>
	
	<!--DB접속-->
		<?php
		include_once ('./db.php');
		?>
			
	<body>
		<header>	
			<img src="./sugaruinet/image/logo_mob.png" alt="사탕화면로고" style="width: 100%" />
		</header>
		<nav>

			<ul class="menu" id="menu">			
			    <li>
			    	<?php
			    		//현메뉴확인
						if(!$_GET['special']){
							echo "<a href=\"?cate={$row['cate']}\" style=\"color:#dc2276; \">";
						}else{
 							echo "<a href=\"?cate={$row['cate']}\" >";
						}
						//출력
			    		if(!$_GET['cate']){
			    			echo 'All works';
						}else{ //방법을 몰라서 일단 직접 적음
							if ($_GET['cate']==='guiat') { $display = 'GUI at work'; }
							else if  ($_GET['cate']==='guiafter') { $display = 'GUI after work'; }
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
					        		if($_GET['cate']){ //카테값이 없을 경우 all을 포함한 모든카테고리 출력
					        			echo "<li><a href=\"?cate={$row['cate']}\">{$row['cate_expression']}</a></li>";
					        		}else if($row['cate']){ //카테값이 있을 경우 카테필드값이 있을경우(all 외 전부) 만 출력
					        			echo "<li><a href=\"?cate={$row['cate']}\">{$row['cate_expression']}</a></li>";
					        		}
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
			    		echo "About";
			    		echo "</a>";
			    	?>
			    </li>
			    <li>
			    	<a href="https://www.facebook.com/sugaruipage" style="margin-right: 20px;" target="_blank">Note</a>
			    </li>
 			</ul>
	
		</nav>
		<div class="navshadow"></div>
		
		<article>
			<?php
			// 파라미터 기준 설정(카테냐,태그냐,아이디냐) 
			//그래도 select.php 중 special이 없느 else 에서 이 변수를 써야하니까 지정.
		    $paraname = 'cate'; 
			$paravalue = $_GET['cate']; 		
			// DB로부터 컨텐츠 셀렉트
			include './sugaruinet/select.php';
			//출력 
			while ($row = mysql_fetch_array($result) ){
				include './sugaruinet/post_m.php'; //와꾸는 post_m이지만 그속에 post_core는 웹과같다.
				//echo "<div class=\"border_1\"></div> <div class=\"border_2\"></div> ";
			}	
			?>
		</article>

	</body>
</html>