<!--더보기 load (http://bit.ly/10gU7kN 참고)-->	
<div id="<?php echo $divid ?>" name="<?php echo $divid ?>"></div>    

    <?php
    echo "<div class=\"morebox\">" ;
						
	//title
	echo " 
		<div class='title' id='morebtn' >
			<h2>
				More
			</h2>
		</div>
		";
						
	echo "</div>" ;
    ?>
                    
	<script>
       	$('#morebtn').click( function() {
       		//$('#<?php //echo $divid-1; ?>//').scrollTop(500); // 작동 안함
       		//$('#article').css({'position': 'relative' , 'top': '-200px' }); //한번만 쓸모있음 
       		
       		//http://blog.naver.com/tngus85500?Redirect=Log&logNo=70156923831
       		var position =$('#<?php echo $divid; ?>').offset();
       		$('html,body').animate({scrollTop: position.top-100},1000);
       			
       		$("#<?php echo $divid; ?>").load("post_includer_m.php");
          	$('.morebox').remove(); 
        });        
    </script>