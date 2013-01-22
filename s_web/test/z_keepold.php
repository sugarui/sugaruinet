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



<?php
	// $a = array('사과','딸기','바나나','망고');
	
	//$_GET['special'] = 'about';
	include '../s_web/select.php';
	while ($row = mysql_fetch_array($result) ){
		$post_each = 
			" 
			<div class=\"postbox\"> ;
				<div class=\"title\"><h2>
					{$row['title']}
				</h2></div>
				<div class=\"worked\">
					{$row['worked']}
				</div>
			</div>;
			";
			
		array_push($posts_arr, $post_each); 
	}
				
	echo json_encode(array( 
		'answer'=>true,
        //'msg' =>$a[3]       
		'msg' =>$posts_arr[0] 
		)
	)		
?>



<?php
	//$a = array('사과','딸기','바나나','망고');

			include_once ('../db.php');
			
			//파라미터 관련 변수 인클루드
			include './variable_para.php';
				
			// DB로부터 컨텐츠 셀렉트
			include './select.php';
			//출력 
			while ($row = mysql_fetch_array($result) ){
			$post_each = 
			" 
			<div class=\"postbox\">
				<div class=\"title\"><h2>
					{$row['title']}
				</h2></div>
				<div class=\"worked\">
					{$row['worked']}
				</div>
			</div>
			";
			array_push($posts_arr, $post_each); 
	}
	echo $posts_arr[1];
	echo "-----------------------<br>";
				
	echo json_encode(array( 
		'answer'=>true,
        //'msg' =>$a[3]       
		'msg' => $posts_arr[1]
		)
	) 
			
?>

























(function($){
        	$('body').click(function(){
        		alert ('hi');
       		});
        	$('#<?php echo $divid; ?>').click(function(){
        		//alert ('hi');
        		$('#<?php echo $divid; ?>').css('background-color','red';'position','fixed'; 'top','0px');
       		});  	                             
       		$(window).scroll(function(){     	
        		$('#<?php echo $divid; ?>').css('position','static');
       		});
       	})(jQuery)
