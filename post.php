			<!------------ post------------>
				<div class="postbox">
					<div class="dogear">
						<img src="./image/dogear_01.png">
					</div>

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
							<div class="date_worked">
								<?php if($row['worked']) {echo "작업일시 | {$row['worked']}";} ?>
							</div>
							<div class="date_edited">
								<?php if($row['created']) {echo "생성일시 | {$row['created']}";} ?>
							</div>
							<div class="category"> <!--여거는 카테고리 파라미터가 있으면 안나오게 할까?-->
								<?php if($row['cate']) {echo "카테고리 | {$row['cate']}";} ?>
							</div>
							<div class="tag">
								<?php if($row['cate']) {echo "태그 | {$row['tag']}";} ?>
							</div>
						</div>
					</div>
				</div>
