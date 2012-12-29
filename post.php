						<!------------ title ------------>
						<div class="title">
							<h2>
								<?php
									echo htmlspecialchars($row['title']);
								?>
							</h2>
						</div>
						
						<!------------ grapic (널일수있음) ------------>
						<?php
							if($row['image']){
								echo "<div class=\"graphic\">";		
															
								$images = explode("@",$row['image']); //Array (이미지파일명, 이미지파일명)
								$i=0;
								while ($i < count($images)){
									echo "<img src=\"../sugaruinet_portfolio/"; //경로
									echo $images[$i];
									echo "\">";
									$i++;
								}
								echo "</div>";	
							}		
						?>
						
						<!------------ grapic_효과 없어야 할 경우 (널일수있음) ------------>
						<?php
							if($row['image_noeffect']){
								echo "<div class=\"graphic_noeffect\">";		
															
								$images = explode("@",$row['image_noeffect']); //Array (이미지파일명, 이미지파일명)
								$i=0;
								while ($i < count($images)){
									echo "<img src=\"../sugaruinet_portfolio/"; //경로
									echo $images[$i];
									echo "\">";
									$i++;
								}
								echo "</div>";	
							}		
						?>
						
						<!------------ text ------------>
						<?php 
							if($row['text']){ // 링크를 걸어야 하니까 스페설챠는 뺄게
								echo "
									<div class=\"text\"> 
										{$row['text']}
								 	</div>
								 "; 
							} 
						?>

						<!------------ grapic_2 (널일수있음) ------------>
						<?php
							if($row['image_2']){
								echo "<div class=\"graphic\">";		
															
								$images = explode("@",$row['image_2']); //Array (이미지파일명, 이미지파일명)
								$i=0;
								while ($i < count($images)){
									echo "<img src=\"../sugaruinet_portfolio/"; //경로
									echo $images[$i];
									echo "\">";
									$i++;
								}
								echo "</div>";	
							}		
						?>
						
						<!------------ text_2------------>
						<?php 
							if($row['text_2']){ // 링크를 걸어야 하니까 스페설챠는 뺄게
								echo "
									<div class=\"text\"> 
										{$row['text_2']}
								 	</div>
								 "; 
							} 
						?>

						<!------------ post_inner (널일수있음)------------>
						<div class="post_inner">
							<?php
								if($row['inner_title']){
								include ('./post_inner.php');
								}
							?>
						</div>
						
						<!------------ tail ------------>
						<div class="tail" id="tail">
							<?php
								/////작업일
								if($row['worked']){
									echo "
										<div class=\"tail_each\">
											<span class=\"small\">작업일시:&nbsp;</span>
												<span>{$row['worked']}</span>
										</div>
									";
								}
								/////편집일
								// if($row['created']){
									// echo "
										// <div class=\"tail_each\">
											// 생성일시&nbsp;|&nbsp;
											// {$row['created']}
										// </div>
									// ";
								// }
								/////카테고리 
								if(!$_GET['cate']){
									echo "
										<div class=\"tail_each\">
											<span class=\"small\">카테고리:&nbsp;</span> 
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
											<span class=\"small\">태그:&nbsp;</span>
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
								///// 댓글, 공유버튼 영역
								echo "<div class=\"tail_each_btn\">";
									/////댓글  :  id없을때만 버튼노출 (id있을땐 disqus가 노출됨)  
									if(!($_GET['id'])) { 
										echo "
											<a href=\"?id={$row['id']}#disqus_thread\">
												<span class=\"btn_link\">reply</span>
											</a>
										";
									}	
									/////주소     자료참조 http://hosting.websearch.kr/38
										echo "
												<a href=\"?id={$row['id']}\" onclick=\"copy(this.href); return false;\">
													<span class=\"btn_link\">share</span>
												</a>
										";
								echo "</div>";	
							?>
						</div>
						
						<?php
							if ($_GET['id']){
								include './sugaruinet/post_disqus.php';
							}
						?>