<!---------- 더보기 : 로드방식 http://bit.ly/10gU7kN -->	
	<?php echo "<div id='".$new."'>";?></div>
    <input type='button' value='더부르기' id='morebtn' /> 
    <script>
       	//$('#morebtn').click( function() {
       	//	$("#<?php //echo $new; ?> // ").load("./s_web/dev_includer.php");
        //  	$('#morebtn').remove();
        // });
       
        $('#article').click(function() {
      	 	//$("#article").load("./s_web/dev_includer.php");
          	//$('#morebtn').remove();
          	alert ('000');
        });
       
        var wel = $Element("body"); // $("#article");//
        var nTop = wel.offset().top;    
        
        setInterval(function(){
        	var nScrollTop = $Document().scrollPosition().top;

        	if ( nScrollTop < nTop ){
        		alert ('01');
        		//wel.css({ 'position': 'relative', 'top' : '0px'});
        	}else{
        		alert ('02');
        		//wel.css({ 'position': 'fixed', 'top' : '0px'});
        	}
        }, 10);
        
    </script>                
<!--더보기 end load("http://elecuchi.cafe24.com/s_web/dev_includer.php")-->