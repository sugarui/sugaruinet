<?php
		//파라미터 기준 설정(카테냐,태그냐,아이디냐)
        if($_GET['cate']){
        	$paraname = 'cate'; 
			$paravalue = $_GET['cate'];
		}else if($_GET['devcate']){
			$paraname = 'cate';  
			$paravalue = $_GET['devcate'];
		}else if($_GET['devtag']){
			$paraname = 'tag';  
			$paravalue = $_GET['devtag'];	 	 
		}else if($_GET['tag']){
				$paraname = 'tag';  
			$paravalue = $_GET['tag'];
		}else if($_GET['id']){
			$paraname = 'id';  
			$paravalue = $_GET['id'];
		}							
?>