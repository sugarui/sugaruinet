<?php
						///리소스 획득 : Table(포스트) 에서 본 카테고리 데이터"량"을 알아내기 위해 id 열, 전체 행
						if($paravalue){
							$sql = "SELECT id FROM `su_post_01` WHERE $paraname = '$paravalue'"; 
						}else{
							$sql = "SELECT id FROM `su_post_01`";
						}
						$result = mysql_query($sql);
						$num_rows = mysql_num_rows($result); // 게시물 총수획득. 예를들어 32  
						// $num_posts_display = oo ;페이지당 출력수선언. 올렸음. 예를들어 3
						$num_pages = ceil($num_rows/$num_posts_display); //페이지수는 게시물 총수32/페이지당 출력수3 =10, 올림해서 11		
						
					    // < ㅇㅇㅇㅇㅇ >포맷 구성
					    //$range = 5;
						$page_now = $_GET['page'];
						
						$x = ceil($page_now / $range) - 1;	// 6일땐 2-1 = 1 , 10일때도 2-1 = 1  // 1일땐 1-1 = 0   5일땐 1-1 = 0
 					    $i_pre = $range * $x; //앞선 페이지는 5 // 1일땐 0
						$i = $i_pre + 1;  // 시작은 1이나 6
						$limit_vague = ceil($page_now / $range) * $range; // 리미트. 6이나 10일땐 2x5, 1이나 5일땐 1x5
						$limit = min ($num_pages, $limit_vague); // 리미트 상세. 실제 페이지 넘버까지만.
						
						//출력
						if ( 1 < $num_pages ){ //페이지수가 1을 넘어갈때만 출력
					    	
					    	//꺾쇠 왼쪽
							if ($i > $range){
								echo "
				          				<a href=\"?{$paraname}={$paravalue}&page={$i_pre}\">
				          					<span class=\"pagenation_nav\">◀</span>
				          				</a>
				          		";
							}
							//페이지													
							while($i<= $limit ) { //레인지(표시범위)까지 에코  		
				          		if($i == $_GET['page']){ //현페이지 셀렉트 체크는 파라미터로
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
							//꺾쇠 오른쪽
							if ($i <= $num_pages){ //$i 는 이미 ++은 됐을꺼야.
								echo "
				          				<a href=\"?{$paraname}={$paravalue}&page={$i}\">
				          					<span class=\"pagenation_nav\">▶</span>
				          				</a>
				          		";
							}
						} 

?>