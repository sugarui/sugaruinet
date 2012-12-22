			<!------------ post------------>
				<div class="postbox">
					<div class="dogear">
						<img src="./image/dogear.png">
					</div>
												
					<div class="post">
						
						<!------------ title ------------>
						<div class="title">
							<h2>
								<?php
									echo htmlspecialchars($row['title']);
								?>
							</h2>
						</div>
						
						<!------------ grapic (널일수있음) ------------>
						<div class="graphic">
							<?php
								if($row['image_url']){
								include ('./post_graphic.php');
								}
							?>
						</div>
						
						<!------------ text ------------>
						<div class="text"> 
							<p>
								<?php
									echo $row['text']; // 링크를 걸어야 하니까 스페설챠는 뺄게
								?>
							</p>
						</div>

						<!------------ post_inner (널일수있음)------------>
						<div class="post_inner">
							<?php
								if($row['inner_title']){
								include ('./post_inner.php');
								}
							?>
						</div>
						
						<!------------ tail ------------>
						<div class="tail">
							<?php
								/////작업일
								if($row['worked']){
									echo "
										<div class=\"tail_each\">
											<span class=\"small\">작업일시&nbsp;
												<span>{$row['worked']}</span>
											</span>
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
								/////주소     자료참조 http://hosting.websearch.kr/38
								echo "
									<div class=\"tail_each_2\">
										<a href=\"?id={$row['id']}\" onclick=\"copy(this.href); return false;\">
											<span class=\"btn_link\">share</span>
										</a>
									</div>
								";
							?>
						</div>
					</div>
				</div>
