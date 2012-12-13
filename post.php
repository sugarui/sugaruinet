			<!------------ post------------>
				<div class="postbox">
					<div class="dogear">
						<img src="./image/dogear.png">
					</div>
					
					<?php
					echo "
						<a href=\"?id={$row['id']}\">
							<div class=\"url\">url</div>
						</a>
					";
					?>
					
					<div class="post">
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
						<!-- end of grapic -->

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
						<!-- end of post_inner-->

						<div class="tail">
							<?php 
								if($row['worked']){
									echo "
										<div class=\"tail_each\">
											작업일시&nbsp;|&nbsp;
											{$row['worked']}
										</div>
									";
								}
								if($row['created']){
									echo "
										<div class=\"tail_each\">
											생성일시&nbsp;|&nbsp;
											{$row['created']}
										</div>
									";
								}
								//if($row['cate']){ // 카테는늘있으니 // 아래아래아래줄. 페이지는 알아서 생기지?
									echo "
										<div class=\"tail_each\">
											카테고리&nbsp;|&nbsp; 
											<a href=\"?cate={$row['cate']}\">
												<span>{$row['cate_expression']}</span>
											</a>
										</div>
									";
								//}
								if($row['tag']) {
									echo "
										<div class=\"tail_each\">
											태그&nbsp;|&nbsp; 
											<a href=\"?tag={$row['tag']}\">
												<span>{$row['tag']}</span>
											</a>
										</div>
									";
								}
							?>
						</div>
					</div>
				</div>
