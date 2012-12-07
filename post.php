			<!--post_00-->
				<div class="postbox">
					<div class="dogear">
						<img src="./image/dogear_01.png">
					</div>

					<div class="post">
						<div class="title">
							<h2>(샘플) 단일 포스트 PHP</h2>
						</div>
						<div class="graphic">
							<img src="./image/test_image_01.png">
						</div>

						<div class="text">
							<p>
								<?php
								//hile ($row = mysql_fetch_array($result)) {
								//	echo htmlspecialchars("{$row['text']}" . "\n");
								//}
								?>
							</p>
						</div>

						<div class="post_inner">
							<div class="text">

							</div>
							<div class="dogear">
								<img src="./image/dogear_02.png">
							</div>
							<div class="post_inner_btn">
								<img src="./image/post_inner_btn_01.png">
							</div>
							<div class="border_1"> </div>
							<div class="border_2"> </div>
							<div class="title_inner">
								<h3> 이너포스트 타이틀 / 아직준비안됨 </h3>
							</div>
							<div class="border_1"> </div>
							<div class="border_2"> </div>
						</div>

						<div class="post_inner">
							<div class="text">
								이너포스트 디스크립션 / 아직준비안
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
								<h3> 이너포스트 타이틀 / 아직준비안됨 </h3>
							</div>
							<div class="border_1"> </div>
							<div class="border_2"> </div>
						</div>

						<div class="tail">
							<div class="datework">
								날짜 영역 
								<?php
								while ($row = mysql_fetch_array($result)) {
									echo htmlspecialchars("{$row['created']}");
								}
								?>
							</div>
							<div class="tag">
								태그 영역
							</div>
						</div>
					</div>
				</div>
