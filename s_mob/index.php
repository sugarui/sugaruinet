<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
		/*session_save_path('session');*/
		if($_GET['id']){
			session_save_path('../s_web/session/postid');
		}else if($_GET['tag']){
			session_save_path('../s_web/session/posttag');
		}else if($_GET['devid']){
			session_save_path('../s_web/session/devid');		
		}else{
			session_save_path('../s_web/session');
		}
		session_start();
		session_destroy();
		session_start();
		$_SESSION ['pre']='0';
		$_SESSION ['devpre']='0';
		$_SESSION ['tag'] = $_GET['tag'];
		$_SESSION ['cate'] = $_GET['cate'];
		$_SESSION ['devcate'] = $_GET['devcate'];
		//echo file_get_contents( './session/sess_'.session_id() );

		include ('../s_web/head.php')
		?>	
		
		<link rel="stylesheet" type="text/css" href="http://elecuchi.cafe24.com/s_web/style/style_space.css" />	
		<link rel="stylesheet" type="text/css" href="http://elecuchi.cafe24.com/s_mob/style_m.css" />
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'> <!--숫자웹폰트-->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="http://elecuchi.cafe24.com/s_web/js/jindo.mobile.min.ns.js"></script>

	</head>
	
	<?php
	include_once ('../db.php');
	?>
			
	<body>
		
		<script type="text/javascript">
			alert ( '모바일: 모바일 페이지가 현재 잠시 공사 중입니다. 댓글 기능을 달고있습니다. 양해 부탁드립니다.' );
		</script>
			
		<header>
			<a href="http://m.sugarui.net">
				<img src="http://elecuchi.cafe24.com/s_web/image/logo_mob.png" alt="사탕화면로고" style="width: 100%" />
			</a>	
			<!--<div class="header_space"></div><!--미스터치방지-->
		</header>


		<?php
		//파라미터 관련 변수 인클루드
		include './s_web/variable_para.php';
		?>
		
		<!--<nav id="nav">-->		
		
		<ul class="menu" id="menu">
			<div class="menu_padding">	
			    <li class="menu_left">
			    	<?php
			    		//현메뉴확인
						if(!$_GET['special'] && !$_GET['devcate'] && !$_GET['devid']){
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
							else if  ($_GET['cate']==='drawing') { $display = 'illust'; }
							else if  ($_GET['cate']==='toon') { $display = 'toon'; }
							else if  ($_GET['cate']==='writing') { $display = '글'; }
							else if  ($_GET['cate']==='etc') { $display = 'etc'; }	
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
			    <li class="menu_right">
			    	<?php
			    		//현메뉴확인   //재클릭시 링크 유지를 위해서 파라미터를 상세히 적음
						if($_GET['devcate'] || $_GET['devid']){
							echo "<a href=\"?cate={$_GET['cate']}&page={$_GET['page']}&id={$_GET['id']}&devcate=menu\" style=\"color:#b46500;\" >";
						}else{
 							echo "<a href=\"?cate={$_GET['cate']}&page={$_GET['page']}&id={$_GET['id']}&devcate=menu\">";
						}
			    		echo "개발일지";
			    		echo "</a>";
			    	?>
			    </li>
			    <li class="menu_right">
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
 			</div>		
 		</ul>
	
		<!--</nav>-->
		
		<div class="navshadow" id="navshadow">.</div>
		

		<article id="article">
			<?php	 
				if($_GET['devcate']=='menu'){
						include 'dev_menu.php'; 			
				}else if($_GET['devcate'] || $_GET['devid']){
						include 'dev_includer_m.php'; 	
				}else{
					include 'post_includer_m.php'	;	 			
				}
			?>	
		</article>
	
	
		<script type="text/javascript" charset="UTF-8">
		//메뉴바 고정	
	        var wel = jindo.$Element("menu"); 
	        var nTop = wel.offset().top; 
	       	var article = jindo.$Element("article"); ; //본문이잡아먹힌다 조정	            
	      
	        setInterval(function(){     	
	        	var nScrollTop = jindo.$Document().scrollPosition().top;

	        	if(nScrollTop < nTop){
	        		//$("#nav").css({ 'position': 'relative', 'top' : '0px'});
					wel.css({ 'position': 'relative', 'top' : '0px', 'width': '100%'});
					article.css({'margin-top': '0px'});
	        	}else{
	        		wel.css({ 'position': 'fixed', 'top' : '0px', 'width': '100%',});
	        		article.css({'margin-top': '80px'});
	        	}
	        },100);
	    </script>
	    
	    
	    <script type="text/javascript" charset="UTF-8">	    
        //메뉴바 셰도우 고정	
	        var wel2 = jindo.$Element("navshadow"); 
	        var nTop2 = wel2.offset().top; 
	            
	        setInterval(function(){     	
	        	var nScrollTop2 = jindo.$Document().scrollPosition().top;
	        	if(nScrollTop2+50 < nTop2){
					wel2.css({ 'position': 'relative', 'top' : '0px'});
	        	}else{
	        		wel2.css({ 'position': 'fixed', 'top' : '50px', 'width':'100%'});
	        	}
	        },100);
	    </script>
	    
	    <script type="text/javascript" charset="UTF-8">//주소창 숨기기
	         $(function(){
	               setTimeout(loaded, 1);
	               });
	               function loaded(){ 
	               window.scrollTo(0, 1);
	          }
		</script>
		<script>//글접기열기 수제
					$("#opener").click(function(){
						$("#opendiv").attr("class","display_block");
						$("#opener").remove();
					})		
		</script>
		<script type="text/javascript" charset="UTF-8">//터치감개선 - 반복문어려워서 hold
		</script>

	  
	</body>
	              
</html>