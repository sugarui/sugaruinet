<!---------- 더보기 : 로드방식 http://bit.ly/10gU7kN -->	
	<?php echo "<div id='".$new."'>";?></div>
    <input type='button' value='더부르기' id='morebtn' /> 
    <script>
       	$('#morebtn').click( function() {
       		$("#<?php echo $new; ?>").load("./s_web/dev_includer.php");
          	$('#morebtn').remove();
        });
    </script>                
<!--더보기 end load("http://elecuchi.cafe24.com/s_web/dev_includer.php")-->