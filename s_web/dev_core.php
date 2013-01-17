<?php

						$image_opener = "<img src=\"http://elecuchi.cafe24.com/s_devdiary/"; //경로
						$image_closer = "\">";
						
						// movie(널일수있음)
						if($row['movie']){ // 링크를 걸어야 하니까 스페설챠는 뺄게
							echo "
								<div class=\"movie\"> 
									{$row['movie']}
							 	</div>
							 "; 
						} 
						//text  
						if($row['text']){ // 링크를 걸어야 하니까 스페설챠는 뺄게
							echo "
								<div class=\"text\"> 
									{$row['text']}
							 	</div>
							 "; 
						} 
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
								echo $image_opener;
								echo $images[$i];
								echo $image_closer;
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
						// grapic_2 (널일수있음) 
						if($row['image_2']){
							echo "<div class=\"graphic\">";		
														
							$images = explode("@",$row['image_2']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo $image_opener;
								echo $images[$i];
								echo $image_closer;
								$i++;
							}
							echo "</div>";	
						}		
						

?>