<!---------- 더보기 : 로드방식 http://bit.ly/10gU7kN -->	
	<?php echo "<div id=\"{$newpre}\">";?></div>
    <input type="button" value="더보기" id="getResult" /> 
    <script>
       	$('#getResult').click( function() {
       		$("#<?php echo "{$newpre}"; ?>").load("http://elecuchi.cafe24.com/s_mob/posts_includer.php");
          	$('#getResult').remove();
        });
    </script>                
<!--더보기 end-->