<?php
 //if ($page_now <= $range){
					        //	$i=1;
							//	$page_limit = $range;
					        //}else if ($page_now > $range){
					        	$x = ceil($page_now / $range) - 1;	// 6일땐 = 2-1 : 1 , 10일때도 2-1 = 1  // 1일땐 = 1-1 +0   5일땐 1-1 = 0
 					        	$prev = $range*$x; //앞선페이지는 5 // 1일땐 0
								$i = $prev + 1;  // 시작은 1이나 6
								$limit = ceil($page_now / $range) * $range; //리미트
					        //}
?>
