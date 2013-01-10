<!DOCTYPE html>
<html lang="en">

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
			<?php	
				// include './posts_includer.php';	
			
				//파라미터 관련 변수 인클루드
				include '../s_web/variable_para.php';
				
				// DB로부터 컨텐츠 셀렉트
				include '../s_web/select.php';
				
				//출력 
				while ($row = mysql_fetch_array($result) ){
					include '../s_web/post_m.php'; 
					//와꾸는 post_m이지만 그속에 post_core는 웹과같다.
				}
				
			?>
			
			<!---------------- 페이지네이션 
			<div class="pagenation">
					
				<?php
				//스페셜 페이지일때, 혹은 파라미터가 id일때는 1개뿐이므로 페이지네이션이 필요가 없다
				if ( ($paraname != 'id') && (!$_GET['special']) ){ 
					include '../s_web/pagenation.php';	
				}
				?>
				</div>
			<!--페이지네이션 end-->
				
			
				
				<!---------------- 더보기 : 기본방식 : 잘안됨		
                <div style="width:100%; border-bottom:1px solid #ccc;">
                	
                <script>
                   	$('#ppp').click( function() {
                   		//$('#showmore').html(' ');
                   		$.ajax({
                    		url : 'http://elecuchi.cafe24.com/s_web/post_includer.php',
                    		dataType : 'json',
                    		type : 'POST',
                    		data : { 'msg':'letstalk' },
                    		success : function(result){
                    			if( result['answer'] == true ){
                    				$('#qqq').html(result['msg']);
                    			}
                    		}
                    	}); 
                    });
                </script>
                <input type="button" value="기본방식" id="ppp" /> 
                <div id="qqq">기본 디폴트</div>
                
                <div style="width:100%; border-bottom:1px solid #ccc;">
				<!--더보기 end-->
				
			
			
			
				<!--쿠키초기화 - 이게 아닌가
				<script>
					SetCookie('pagecookie', 1)
				</script>
				-->
				
				<!--쿠키초기화- 이것도 아닌가-->
				<?php
					setcookie('pagecookie', 1);
				?>
				
				
				<!--쿠키초기화- 이것조차도 아닌가
				<script>
				$('body').location.reload( function() {
					SetCookie('pagecookie', 1);
				}
				</script>
				-->
				  
				<!---------- 더보기 : 로드방식 http://bit.ly/10gU7kN -->				
				<div id="kkk">로드 디폴트</div>
                <input type="button" value="로드" id="getResult" /> 
                <script>
                   	$('#getResult').click( function() {
                   		$("#kkk").load("http://elecuchi.cafe24.com/s_mob/posts_includer.php")
                    	$('#getResult').remove();
                    });
                </script>                
				<!--더보기 end-->
				
				
				
				
				<!---------- 더보기 2 : 직접테스트 : 당연히 문제없는데 경로타는 듯
				<div style="width:100%; border-bottom:1px solid #ccc;">
				
				<div>
				<?php 
					include '../s_web/helloworld.php';
				?>
				</div>
				<!--더보기 end-->
				
				
				
				<!---------- 더보기 3 : 별도의 php문 로드: 이건 되는데
				<div style="width:100%; border-bottom:1px solid #ccc;">
				
				<div id="aaa">기본</div>
                <input type="button" value="helloworld" id="bbb" />                 
             	<script>
                   	$('#bbb').click( function() {
                   		$.ajax({
                    		url : '../s_web/post_includer_d.php',
                    		dataType : 'json',
                    		success : function(result){
                    			if( result['answer'] == true ){
                    				$('#aaa').html( "<?php include '../s_web/helloworld.php'; ?>" );
                    			}
                    		}
                    	}); 
                    });
                </script>
				<!--더보기 end-->
				
				
				
				
				<!---------- 더보기 4 : 자기 데이터 로드 : 이건 안된다
				<div style="width:100%; border-bottom:1px solid #ccc;">
					
				<div id="aaaa">기본</div>
                <input type="button" value="helloworld" id="bbbb" />                 
             	<script>
                   	$('#bbbb').click( function() {
                   		$.ajax({
                    		url : '../s_web/post_includer_d.php',
                    		dataType : 'json',
                    		success : function(result){
                    			if( result['answer'] == true ){
                    				$('#aaaa').html(result["msg"]);
                    			}
                    		}
                    	}); 
                    });
                </script>
				<!--더보기 end-->
				
							
				
				
				<!-----------------오튜 예제
				<div style="width:100%; border-bottom:1px solid #ccc;">
					
				<div id="result"></div>
				<input type="text" id="msg" />
		        <input type="button" value="get result" id="getResult" />
		        <script>
		            $('#getResult').click( function() {
		                $('#result').html('');
		                $.ajax({
		                    url:'http://elecuchi.cafe24.com/s_web/ajaxtester.php',
		                    dataType:'json',
		                    type:'POST',
		                    data:{'msg':$('#msg').val()},
		                    success:function(result){
		                        if(result['result']==true){
		                          $('#result').html(result['msg']);
		                        }
		                    }
		                });
		            })
		        </script>
		        <!--오튜예제 end-->
			
		</article>

	</body>
</html>