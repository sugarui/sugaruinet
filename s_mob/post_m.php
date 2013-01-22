					<?php
					echo "<li>" ; //class=\"postbox\">
						
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
												
					echo "</li>" ;
					?>
