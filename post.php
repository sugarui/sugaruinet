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
							<div class="datework">
								<?php
									echo htmlspecialchars("{$row['created']}");
								?>
							</div>
							<div class="tag">
								<?php
									echo htmlspecialchars("{$row['tag']}");
								?>
							</div>
						</div>
					</div>
				</div>
