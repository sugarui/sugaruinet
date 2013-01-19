<!--더보기 load (http://bit.ly/10gU7kN 참고)-->	
<div id="<?php echo 'div'.$divid ?>"></div>   
<input type='button' value='더부르기' id='morebtn' />  	
<div id="script">
<script>
// 스크롤 인식 자동 추가로드 방식 (http://cafe.naver.com/allflashsite/15707 참고)
	$(window).scroll(function(){
    	if( $(window).scrollTop()+50 >= ($(document).height() - $(window).height()) ){
				$("#div<?php echo $divid;?>").load("./s_web/dev_includer.php");
				$('#script').remove(); 
		}
	});
	
	//if ( $(window).height() >= $('#article').height() ){
	//			$("#<?php //echo $num_pages_pre; ?> //").load("./s_web/dev_includer.php");
	//}
	
	
// 버튼 클릭 추가로드 방식 (초기 테스트. http://bit.ly/10gU7kN 참고)
	// 일단 바깥에 <input type='button' value='더부르기' id='morebtn' />  	
    $('#morebtn').click( function() {
    		$("#<?php echo $divid; ?>  ").load("./s_web/dev_includer.php");
          	$('#morebtn').remove();
	});
</script> 
</div>