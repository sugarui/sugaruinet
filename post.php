			<!------------ post------------>
				<div class="postbox">
					<div class="dogear">
						<img src="./image/dogear.png">
					</div>
					
					<?php
					echo "
						<a href=\"?id={$row['id']}\">
							<div id=\"url\">url</div>
						</a>
					";
					
					/////////////////////////////////////// 이하 테스트중 코드  //////////////////////////////////////
					
					/*
					$num_rows = mysql_num_rows($result); //요건혹시나해서
					*/
					
					/*
					앞서 로드한 것
					if($paravalue){
					$sql = 
						// "SELECT * FROM su_post_01 
						"SELECT p.*, c.cate_expression FROM su_post_01 AS p LEFT JOIN su_cate_01 AS c ON p.cate = c.cate 
						WHERE p.{$paraname}='{$paravalue}' 
						ORDER BY worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}";
					}else{
						$sql =
							"SELECT p.*, c.cate_expression FROM su_post_01 AS p LEFT JOIN su_cate_01 AS c ON p.cate = c.cate 
							ORDER BY worked DESC LIMIT {$num_posts_display} OFFSET {$num_posts_offset}";
					}
					$result = mysql_query($sql);
				
					//출력 : 받은 데이터 양 만큼 : post.php(디자인된박스)에 담아서!
					while ($row = mysql_fetch_array($result)){
						include './post.php';
					}
					*/
					
					/*
					그럼 지금 리절트를 페치어레이한 로우는 말그대로 로우가.. 테이블의 행이.. 즉 배열셋트라는 인자 가 여러개 있는 "배열이야"
					그 배열의 [0],[1],[2]를 뿌린단말이지
					로우의 저 0,1,2라는 인덱스를 알아내서..
					에코하는 디비전에 아이디든 넘버든 어트리뷰트로 집어 넣어,
					그리고-
					자바스크립트는..
					고기다가 뿌리는 거지.
					*/
					
					// 배열의 인덱스값을 알아내는 함수가 있고,. 그래서 인덱스값은 $i라고 하면, 인덱스가 $i인곳에 뿌리도록 자바스크립트를 짠다.
					
					/*
					echo "
						<div>
							<div id=\"url\" index=\"{$i}\" fullurl=\"?id={$row['id']}\">url</div>
						</div>
					";
					
			    	*/
			    	//////////////////////////////////////////////////////////////////////////////////////////////
					?>
										
					<script type="text/javascript">
					/////////////////////////////////////// 이하 테스트중 코드  ///////////////////////////////////////
					/* 
					
						//파라미터는 밖에있고 그거 이안으로 갖고오려고 name에 막 집어 넣
						//근데문제는 이게 여러개..... 일단 하나뿐인 태그의 페이지로 테스트함
						
						var aaa = document.getElementById('url'); 
						//여기서 엘리먼트가 아니고 엘리먼츠로 받이서 [i]로 뿌려야 되는 듯 ???
						//그래서 여기의i 랑 저기의 i 인거 같은데다 뿌려야 하나.. ????
						
					    aaa.addEventListener('click', aaaHandler, false);
					    function aaaHandler(){
               				var bbb = aaa.getAttribute('fullurl');
               				alert (bbb);
	             			// aaa.setAttribute(innerHTML,bbb); // 뜻대로 작동안함
						}
					*/
					//////////////////////////////////////////////////////////////////////////////////////////////
					</script>

					
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
