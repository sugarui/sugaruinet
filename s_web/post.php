					<?php
					echo "
						<div class=\"postbox\">
							<div class=\"dogear\">
								<img src=\"./s_web/image/dogear.png\">
							</div>						
							<div class=\"post\">
					";
						
						//title
							echo "
								<div class=\"title\"><h2>
									{$row['title']}
								</h2></div>
							";
						//h2사이에넣어본테스터
								//<div class=\"dogear\">
								//	<img src=\"./s_web/image/bullet_1em.png\">
								//</div> 
						
						//본문부 삽입						
						include './s_web/post_core.php';

						//post_inner (널일수있음)
						if($row['inner_title']){
							echo "<div class=\"post_inner\">";
							include ('./post_inner.php');
							echo "</div>";
						}
						
						//tail
						echo "<div class=\"tail\" id=\"tail\">";

								/////작업일
								if($row['worked']){
									echo "
										<div class=\"tail_each\">
											<span class=\"small\">작업일시&nbsp;</span>
												<span>{$row['worked']}</span>
										</div>
									";
								}
								/////카테고리 
								if( !($_GET['cate']) && !($_GET['special']) ){
									echo "
										<div class=\"tail_each\">
											<span class=\"small\">카테고리&nbsp;</span> 
											<a href=\"?cate={$row['cate']}\">
												<span>{$row['cate_expression']}</span>
											</a>
										</div>
									";
								}
								///// 태그
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
												<a href=\"?tag=$tags[$i]\">
													<span>$tags[$i],&nbsp;</span>
												</a>
											";	
											$i++;
										}else{
											echo "
												<a href=\"?tag=$tags[$i]\">
													<span>$tags[$i]</span>
												</a>
											";
											$i++;
										}
									}
						
									echo "
										</div>
									";		
								}
								///// 댓글버튼, 쉐어버튼 영역
								if( !($_GET['id']) && !($_GET['special']) ){ 
									echo "<div class=\"tail_each_btn\">";
										/////댓글.  id없을때만 버튼노출 (id있을땐 단일포스트 모드로써, disqus가 노출됨)  
										echo "
											<a href=\"?id={$row['id']}#disqus_thread\">
												<span class=\"btn_link\">reply</span>
											</a>
										";	
										/////주소. index.php에 function copy(trb) 있음. 자료참조 http://hosting.websearch.kr/38
										echo "
											<a href=\"?id={$row['id']}\" onclick=\"copy(this.href); return false;\">
												<span class=\"btn_link\">share</span>
											</a>
										";
									echo "</div>";
								}
									
						echo "</div>"; //테일끝	
						
						//댓글부
						if (  ($_GET['devid']) || ($_GET['id']) || ($_GET['special']==='guest') ){
							include './s_web/post_disqus.php';
						}
					
					echo "</div></div>"; //포스트박스끝	
					?>