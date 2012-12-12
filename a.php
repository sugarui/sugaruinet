







<?
$sql = 'SELECT * FROM `su_cate_01` ORDER BY id_intent';
									$result = mysql_query($sql);
									
									//리소스를 목록으로 출력						
									while ($row = mysql_fetch_array($result)){
										if(!$_GET['cate']){//카테 파라미터가 없으면
											if (!$row['cate']){ //로우값이 없으면 (목록중 all의 경우. 포스트 DB에 상응값이 없으므로 값없앰.)
												echo "
													<li>
														<a href=\"?page=1\">"//링크에 카테고리 패러미터를 넣지 않는다.
														."
														<div class=\"nav_sub_cate\">
															<div class=\"sel\"> " //셀렉트로 한다
															."
															<img src=\"./image/sel_mark_01.png\">
																{$row['cate_expression']}
															</div>
														</div>	
														</a>
													</li> ";
					
											}else{ //나머지 목록은 정상출력
												echo "
													<li>
														<a href=\"?cate={$row['cate']}&page=1\">
														<div class=\"nav_sub_cate\">
															{$row['cate_expression']}
														</div>
														</a>
													</li> ";
											}	
										}else{//카테 파라미터가 있으면
											if($row['cate'] == $_GET['cate']){
												echo "
													<li>
														<a href=\"?cate={$row['cate']}&page=1\">
														<div class=\"nav_sub_cate\">
															<div class=\"sel\">
															<img src=\"./image/sel_mark_01.png\">
																{$row['cate_expression']}
															</div>
														</div>	
														</a>
													</li> ";
											}else{
												echo "														
													<li>
														<a href=\"?cate={$row['cate']}&page=1\">
														<div class=\"nav_sub_cate\">
															{$row['cate_expression']}
														</div>
														</a>
													</li> ";
											}
										}
									}		

?>