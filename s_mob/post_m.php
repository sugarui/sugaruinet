					<?php
					echo "<div class=\"postbox\">"; //<li>
						
						//title
							echo " 
								<div class=\"title\"><h2>
									{$row['title']}
								</h2></div>
							";
						//date 
						if($row['worked']){
							echo "
								<div class=\"worked\">
									{$row['worked']}
								</div>
							";
						}
						
						include '../s_web/post_core.php';
												
						//댓글부
						//if ( $_GET['special'] == 'guest' ){
						//	include '../s_web/post_disqus.php';
						//}
					
					echo "</div>"//"</li>" ;
					?>
