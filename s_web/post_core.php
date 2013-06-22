<?php

						include 'post_image_root.php'; //경로 (웹용 / 모바일저용량용 구분)
						
						// movie(널일수있음)
						if($row['movie']){ // 링크를 걸어야 하니까 스페설챠는 뺄게
							echo "
								<div class=\"movie\"> 
									{$row['movie']}
							 	</div>
							 "; 
						} 
						
						// grapic_일반 세로정렬형 (널일수있음)
						if($row['image']){
							if(($_GET['special']) ){
								echo "<div class=\"graphic_left\">"; //어바웃 용
							}else{
								echo "<div class=\"graphic\">";	
								echo "<ul class=graphic_ul>";			
							}
							 							
							$images = explode("@",$row['image']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo '<li>';	
								echo $image_opener;
								echo $images[$i];
								echo $image_closer;
								echo '</li>';
								$i++;
							}
							echo "</ul>";		
							echo "</div>";	
						}
						// grapic_특수 가로정렬형 (널일수있음)
						if($row['image_inline']){
							if(($_GET['special']) ){
								echo "<div class=\"graphic_left\">"; //어바웃 용
							}else{
								echo "<div class=\"graphic\">";	
								echo "<ul class=graphic_ul_inline>";			
							}
							 							
							$images = explode("@",$row['image_inline']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo '<li>';	
								echo $image_opener;
								echo $images[$i];
								echo $image_closer;
								echo '</li>';
								$i++;
							}
							echo "</ul>";		
							echo "</div>";	
						}			
						// grapic_효과 없어야 할 경우 (널일수있음)
						if($row['image_noeffect']){
							echo "<div class=\"graphic_noeffect\">";		
															
							$images = explode("@",$row['image_noeffect']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo $image_opener;
								echo $images[$i];
								echo $image_closer;
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
						// grapic_일반세로정렬형_2 (널일수있음) 
						if($row['image_2']){
							echo "<div class=\"graphic\">";		
							echo "<ul class=graphic_ul>";							
							$images = explode("@",$row['image_2']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo '<li>';	
								echo $image_opener;
								echo $images[$i];
								echo $image_closer;
								echo '</li>';
								$i++;
							}
							echo "</ul>";
							echo "</div>";	
						}
						// grapic_특수 가로정렬형_2 (널일수있음)
						if($row['image_inline_2']){
							if(($_GET['special']) ){
								echo "<div class=\"graphic_left\">"; //어바웃 용
							}else{
								echo "<div class=\"graphic\">";	
								echo "<ul class=graphic_ul_inline>";			
							}
							 							
							$images = explode("@",$row['image_inline_2']); //Array (이미지파일명, 이미지파일명)
							$i=0;
							while ($i < count($images)){
								echo '<li>';	
								echo $image_opener;
								echo $images[$i];
								echo $image_closer;
								echo '</li>';
								$i++;
							}
							echo "</ul>";		
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