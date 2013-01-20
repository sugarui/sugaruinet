<!--더보기 load (http://bit.ly/10gU7kN 참고)-->	
<div id="<?php echo $divid ?>"></div>   
<!--<input type='button' value='더부르기' id='morebtn_old' />-->  	
	
	<?php
	$next_expression='NEXT PERIOD ';
	
	echo "			
		<li id='morebtn'>		
			<div class='dev' id=>
				<div class='milestone'>
				<img src='./s_web/image/milestone_nor.png'/>
				</div>
	";

	echo "
				<div class='dev_date'>
					<div class='date_and'>And</div>
		 		</div>
	";
	echo "
				<div class='dev_con'>
					<div class='title'>
					<h2>
						<span class='morebtn'>
							{$next_expression}▼
						</span>
					</h2>
				</div>
	";

	echo "
			</div>
		</li>
	";
	?>


<script>// http://bit.ly/10gU7kN 참고)
	$('#morebtn').click( function() {
		$("#<?php echo $divid; ?>  ").load("./s_web/dev_includer.php");
		$('#morebtn').remove();
	});
</script> 


	