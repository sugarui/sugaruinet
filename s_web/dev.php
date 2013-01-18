				<?php
					echo "			
						<li>		
						<div class=\"dev\">
								<div class='milestone'>
									<img src='./s_web/image/milestone_nor.png'/>
								</div>
					";
	
						$date_ori = date_create_from_format('Y-m-d', $row['worked']);
						$date_y =  date_format($date_ori, 'Y');
						$date_m =  date_format($date_ori, 'm');
						$date_d =  date_format($date_ori, 'd');

						echo "
							<div class='dev_date'>
								<div class='date_m'>{$date_m}</div>
					  			<div class='date_d'>{$date_d}</div>
					 		</div>
						";
						echo "
							<div class='dev_con'>
								<div class='title'><h2>
									{$row['title']}
								</h2>
							</div>
						";
						
						include 'dev_core.php';
						
						//테일(태그만)
						echo "<div class=\"tail\">";	
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
										<a href=\"?devtag=$tags[$i]\">
										<span>$tags[$i],&nbsp;</span>
										</a>
									";	
									$i++;
								}else{
									echo "
										<a href=\"?devtag=$tags[$i]\">
										<span>$tags[$i]</span>
									</a>
									";
									$i++;
								}
							}
							echo "</div>"; 	
						}
						echo "</div>"; 
						//테일끝	
		
					echo "</div></li>"; //포스트박스끝	 
				?>