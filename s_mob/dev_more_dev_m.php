<!--더보기 load (http://bit.ly/10gU7kN 참고)-->	
<div id="<?php echo $divid ?>" name="<?php echo $divid ?>"></div>    

    <?php
    echo "<div class=\"morebox\">" ;
						
	//title
	echo " 
		<div class='title' id='moredevbtn' >
			<h2>
				More devdiary
			</h2>
		</div>
		";
						
	echo "</div>" ;
    ?>
                    
	<script>
       	$('#moredevbtn').click( function() {
       		var position =$('#<?php echo $divid; ?>').offset();
       		$('html,body').animate({scrollTop: position.top-100},1000);
       			
       		$("#<?php echo $divid; ?>").load("http://elecuchi.cafe24.com/s_mob/dev_includer_m.php");
          	$('.morebox').remove(); 
        });        
    </script>