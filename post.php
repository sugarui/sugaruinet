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
						<div class="graphic">
							<img src="
							<?php
								$image_url = $row['image_url'];
								echo $image_url;
							?>
							">
						</div>

						<div class="text"> 
							<p>
								<?php
								    // 링크를 걸어야 하니까 스페설챠는 뺄게
									// echo htmlspecialchars("{$row['text']}" . "\n");
									echo $row['text'];
								?>
							</p>
						</div>

						<!------------ post_inner ------------>
						<div class="post_inner">
							<div class="text">
								<?php
									echo htmlspecialchars($row['inner_desc']);
								?>
							</div>
							<div class="dogear">
								<img src="./image/dogear_01.png">
							</div>
							<div class="post_inner_btn">
								<img src="./image/post_inner_btn_01.png">
							</div>
							<div class="border_1"> </div>
							<div class="border_2"> </div>
							<div class="title_inner">
								<h3>
									<?php
									echo htmlspecialchars($row['inner_title']);
									?>
								</h3>
							</div>
							<div class="border_1"> </div>
							<div class="border_2"> </div>
						</div>
						<!-- end of post_inner-->

						<div class="tail">
							<div class="datework">
								날짜 영역 
								<?php
									echo htmlspecialchars("{$row['created']}");
								?>
							</div>
							<div class="tag">
								태그 영역
							</div>
						</div>
					</div>
				</div>
