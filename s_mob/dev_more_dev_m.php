<!--더보기 load (http://bit.ly/10gU7kN 참고)-->	
<div id="<?php echo $divid ?>"></div>    

<?php
  echo "<div class=\"morebox\">" ;

  echo " 
  	<div class='title' id='morebtn' >
  		<h2>
  			<div class='btntext'>
  				More
  			</div>
  		</h2>
  	</div>
  ";
  						
  echo "</div>" ;
?>

<script>
  $('#morebtn').click( function() {

  	$("#<?php echo $divid; ?>").load("dev_includer_m.php");
    $('.morebox').remove(); 

  	//http://blog.naver.com/tngus85500?Redirect=Log&logNo=70156923831
  	var position =$('#<?php echo $divid; ?>').offset();
  	$('html,body').animate({scrollTop: position.top-100},1000);

  });
</script>