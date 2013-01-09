<?php
	$a = array('사과','딸기','바나나','망고');	
	echo json_encode(array( 
		'answer'=>true,
		//'msg'=>$_REQUEST['msg'],
		/*
		'msg_notwork' =>     
            '
			<?php 
            	echo \'	               
            		$_GET[\'special\'] = \'about\';
                	include \'../s_web/select.php\'; 
                	while ($row = mysql_fetch_array($result) ){
     	           		include \'../s_web/post_m.php\';
                	}
			 	\';
			 ?>	
             '   
		,
		'msg_notwork2' =>     
            '
			<?php 
            	echo \'	               
                	include \'../s_web/con_tester.php\';
				\';	
			 ?>	
             '
		,

		'msg' =>     
            '
			<?php 
            	echo \'hi	\';	
			 ?>	
             '
      	*/
        'msg' =>     
			$a[3]       
		)
	)		
?>