			<!------------ post------------>
				<div class="postbox">
					<div class="dogear">
						<img src="./image/dogear.png">
					</div>
					
										
					<?php
					/////////////////////////////////////////  원래 기본 코드  ////////////////////////////////////////
					// echo "
						// <a href=\"?id={$row['id']}\">
							// <div id=\"url\">url</div>
						// </a>";

					///////////////////////////////////////  이하 테스트중 코드  //////////////////////////////////////
					// 상호연동 php측. 반복출력 시 $postroder 로 몇번째로 출력된 것인지에 대한 정보를 포함하도록 한다.
					
					
					//id=$postorder //안씀 상자속 열쇠라서...
					echo 
						//<a id = \"a\" href=\" \"> 
						"
						<div 
						class=\"url\" 
						name=\"url\" 
						info=\"
							http://elecuchi.cafe24.com/sugaruinet/index.php?id={$row['id']}
						\"
						>
								share
						</div>
					";
					?>
												
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
								//작업일
								if($row['worked']){
									echo "
										<div class=\"tail_each\">
											작업일시&nbsp;|&nbsp;
											{$row['worked']}
										</div>
									";
								}
								//편집일
								if($row['created']){
									echo "
										<div class=\"tail_each\">
											생성일시&nbsp;|&nbsp;
											{$row['created']}
										</div>
									";
								}
								// 카테고리 (낫널)
									echo "
										<div class=\"tail_each\">
											카테고리&nbsp;|&nbsp; 
											<a href=\"?cate={$row['cate']}\">
												<span>{$row['cate_expression']}</span>
											</a>
										</div>
									";
								// 태그	
								if($row['tag']) {
									echo "
										<div class=\"tail_each\">
											태그&nbsp;|&nbsp;
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
							?>
						</div>
					</div>
				</div>
