<html>
<!---------- 더보기 : 로드방식 http://bit.ly/10gU7kN -->	
				<?php echo "<div id=\"{$num_pages_pre}\">";?> 또 로드 디폴트</div>
                <input type="button" value="또 로드" id="getResult" /> 
                <script>
                   	$('#getResult').click( function() {
                   		$("#<?php echo "{$num_pages_pre}"; ?>").load("http://elecuchi.cafe24.com/s_mob/posts_includer.php");
                    	$('#getResult').remove();
                    });
                </script>                
<!--더보기 end-->
</html>