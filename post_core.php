<?php
// grapic (널일수있음)
						if($row['image']){
							if(($_GET['special']) ){
								echo "<div class=\"graphic_left\">"; //어바웃 용
							}else{
								echo "<div class=\"graphic\">";		
							}
							 							
						$images = explode("@",$row['image']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo "<img src=\"../sugaruinet_portfolio/"; //경로
								echo $images[$i];
								echo "\">";
								$i++;
							}
							echo "</div>";	
						}		
						// grapic_효과 없어야 할 경우 (널일수있음)
						if($row['image_noeffect']){
								echo "<div class=\"graphic_noeffect\">";		
															
								$images = explode("@",$row['image_noeffect']); //Array (이미지파일명, 이미지파일명)
								$i=0;
								while ($i < count($images)){
									echo "<img src=\"../sugaruinet_portfolio/"; //경로
									echo $images[$i];
									echo "\">";
									$i++;
								}
								echo "</div>";	
							}	
						//text  
						if($row['text']){ // 링크를 걸어야 하니까 스페설챠는 뺄게
							echo "
								<div class=\"text\"> 
									{$row['text']}
							 	</div>
							 "; 
						} 
						// grapic_2 (널일수있음) 
						if($row['image_2']){
							echo "<div class=\"graphic\">";		
														
							$images = explode("@",$row['image_2']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo "<img src=\"../sugaruinet_portfolio/"; //경로
								echo $images[$i];
								echo "\">";
								$i++;
							}
							echo "</div>";	
						}		
						//text_2
						if($row['text_2']){ // 링크를 걸어야 하니까 스페설챠는 뺄게
							echo "
								<div class=\"text\"> 
									{$row['text_2']}
							 	</div>
							 "; 
						} 

?>