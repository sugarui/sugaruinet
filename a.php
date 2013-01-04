<a href="https://www.facebook.com/sugaruipage" target="_blank">
				<div class="nav_r">	
					작업노트
				</div>
			</a>
						
			<a href="?special=about">
				<div class="nav_r">	
					<?php
					if($_GET['special']==='about'){
						echo "<span class=\"sel\">ABOUT";
					}else{
						echo "ABOUT";
					}
					?>
				</div>
			</a>
			

<div class="nav_l">		
				CATEGORY

			</div>
			
			<div class="nav_r">	
					작업노트
			</div>
									
			<div class="nav_r">	
					<?php
					if($_GET['special']==='about'){
						echo "<span class=\"sel\">ABOUT";
					}else{
						echo "ABOUT";
					}
					?>
			</div>

	nav{
		padding: 15px 20px 15px 20px; 
		



nav{
		/*padding: 15px 20px 15px 20px; */
		background-color: #222327 ; /* #35363b */
		font-size: 0.9em;
		font-weight: bold;
		height: 40px;
	}
	nav .nav_l{
		display: block;
		padding: 0 14px;
		margin: 6px 0;
		line-height: 28px;
		border-left: 1px solid #33942;
		border-right: 1px solid #000;
	}
	nav ul{
		position: absolute;
		top: 40px;
		left:0;
		opacity:0;
		background: #ff0000;
	}
	
	nav .nav_1:hover > ul {opacity:1;}
	

	
	.nav_l, .nav_r{
		position: relative;
		display: block;
		float: left;
		text-align: left;
		height: 40px;
	}
	/*
	.nav_r{
		display: block;
		float: right;
		padding-left: 20px;
	}*/
	.nav_l li{
		height:0;
		overflow:hidden;
		padding:0;
	}
	.nav_l li:hover > ul li{
		height:36px;
		overflow: visible;
		padding:0;
	}
	.menu ul li a {
		width:100px;
		padding: 4px 0 4px 40px;
		margin : 0;
	}
	.menu ul li:last-child a {border:none;}
	


<ul>
						<li><a href="#">CATE01</a></li>
						<li><a href="#">CATE02</a></li>
						<li><a href="#">CATE03</a></li>
					</ul>