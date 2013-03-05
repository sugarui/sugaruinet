<!DOCTYPE html>
<html lang="en" id="html">

		<?php	
			if($_GET['devtag']){
				session_save_path('./session/devtag');
			}else if ($_GET['devcate']){
				session_save_path('./session/dev');
			}else{
				session_save_path('./session');
			}	
			session_start();
			session_destroy();
			session_start();
			$_SESSION ['pre']= '0';
			$_SESSION ['tag'] = $_GET['tag'];
			$_SESSION ['cate'] = $_GET['cate'] ; 
			$_SESSION ['devtag'] = $_GET['devtag'];
			$_SESSION ['devcate'] = $_GET['devcate'] ;
		?>

		<script src='http://code.jquery.com/jquery-latest.js'></script>
		<script type="text/javascript" charset="UTF-8">
			//모바일분기
			if (  
				( navigator.userAgent.match(/iPhone/i) )||    //아이폰
	   			( navigator.userAgent.match(/iPod/i) )||          //아이팟
	  			( navigator.userAgent.match(/android/i) )      //안드로이드 계열
	   		){ 
				// window.location.replace('s_mob/index.php')	 // success
				//document.getElementById('body').load("s_mob/index.php"); // fail
				alert ( '모바일 페이지가 현재 잠시 공사 중입니다.' );
				$("#html").load("s_mob/index.php");  // success(주소유지)
			}
		</script>
		

</html>