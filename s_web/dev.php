				<?php
					echo "			
						<li>		
						<div class=\"dev\">
								<div class='milestone'>
									<img src='./s_web/image/milestone_nor.png'/>
								</div>
					";
	
						$date_ori = date_create_from_format('Y-m-d', $row['worked']);
						$date_y =  date_format($date_ori, 'Y');
						$date_m =  date_format($date_ori, 'm');
						$date_d =  date_format($date_ori, 'd');

						echo "
							<div class='dev_date'>
								<div class='date_m'>{$date_m}</div>
					  			<div class='date_d'>{$date_d}</div>
					 		</div>
						";
						echo "
							<div class='dev_con'>
								<div class='title'><h2>
									{$row['title']}
								</h2>
							</div>
						";
						
						include 'dev_core.php';
						
						//테일(태그만)
						echo "<div class=\"tail\">";	
						if($row['tag']) {
							echo "
								<div class=\"tail_each\">
									<span class=\"small\">태그&nbsp;</span>
							";		
							$tags = explode("@",$row['tag']); // Array(태그A, 태그B)
							$i = 0;
							while ($i < count($tags)){
								if ($i < count($tags)-1){
									echo "
										<a href=\"?devtag=$tags[$i]\">
										<span>$tags[$i],&nbsp;</span>
										</a>
									";	
									$i++;
								}else{
									echo "
										<a href=\"?devtag=$tags[$i]\">
										<span>$tags[$i]</span>
									</a>
									";
									$i++;
								}
							}
							echo "</div>"; 	
						}
						echo "</div>"; 
						//테일끝
						
						// 댓글버튼, 쉐어버튼 영역
						if( !($_GET['devid']) && !($_GET['id']) && !($_GET['special']) ){ 
							echo "<div class=\"tail_each_btn\">";
							/////댓글.  id없을때만 버튼노출 (id있을땐 단일포스트 모드로써, disqus가 노출됨)  
							echo "
								<a href=\"?devid={$row['id']}#disqus_thread\">
									<span class=\"btn_link\">reply</span>
								</a>
							";	
							/////주소. index.php에 function copy(trb) 있음. 자료참조 http://hosting.websearch.kr/38
							echo "
								<a href=\"?devid={$row['id']}\" onclick=\"copy(this.href); return false;\">
									<span class=\"btn_link\">share</span>
								</a>
							";
						echo "</div>";
						}
						
						//댓글부
						if (  ($_GET['devid']) || ($_GET['id']) || ($_GET['special']==='guest') ){
							include './s_web/post_disqus.php';
						}	
		
					echo "</div></li>"; //포스트박스끝	 
				?>