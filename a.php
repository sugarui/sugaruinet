<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>사탕화면</title>
		<meta name="description" content="디자인 스튜디오 사탕화면 포트폴리오 사이트" />
		<meta name="author" content="슈가루이(sugarui)" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<link rel="shortcut icon" href="./sugaruinet/image/favicon.ico" />
		<link rel="apple-touch-icon" href="./sugaruinet/image/apple-touch-icon@2x.png" />

		<!--<link rel="stylesheet" type="text/css" 
		href="./sugaruinet/style/style_narrow.css"  />-->

		<link rel="stylesheet" media="screen and (max-width: 700px)" href="./style/style_narrow.css"  />
		<link rel="stylesheet" media="screen and (min-width: 701px)" href="./style/style.css"  />
		
		
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'> <!--숫자웹폰트-->
		<script type="text/javascript">
			window.onResize = function() {
				// Calculate the height of the body, ubstract the height of the head and apply to all columns
			}
		</script>
	</head>
	
			<!--------------------DB접속-------------------->
				<?php
				include_once ('./db.php');
				?>
			
	<body>
	
	</body>
</html>\



	/*모바일 레이아웃
	nav li {
		position: relative;
    	list-style: none;
    	float: left;
    	display: block;
	}
	nav ul li {
	    height: 0;
	    overflow: hidden;
	    padding: 0;
    
    nav li:hover>ul li {
	    height: 36px;
	    overflow: visible;
	    padding: 0;
	}
  





<ul>
						<li><!--카테고리-->
							<div class="nav_main"><!--구 <div class="nav_sub_cate">-->						
								<ul>
									<li>
										CATEGORY
									</li>
								</ul>
							</div>
						</li>
						<li><!--어바웃-->
							<a href="?special=about">
								<div class="nav_main">	
									<?php
									if($_GET['special']==='about'){
										echo "<span class=\"pink\">ABOUT</span>";
									}else{
										echo "ABOUT";
									}
									?>
								</div>
							</a>
						</li>

						<li> <!--작업일지-->
							<div class="nav_contact">
								작업일지
							</div>
						</li>
			
					</ul>
					





/*********************  LAYOUT  *********************/		

	body{
		margin: 0px;
		padding: 0px;
	}
	.wrap{
		margin: auto;/*magic for center align*/
	}	 		
	.nav_2{
		display: none;
	}
	.nav_web{
		display: none;
	}
	.nav_mob{
		height: 90px;
		background-color: #ff0000;/*#222327;*/
		width: 100%;
	}



/*********************  COMMON  *********************/

	body{
		background-color: #1c1d21;
		font-family: Malgun Gothic, AppleGothic; 
		color: #aaa;
		letter-spacing: -1px;
	}
	/*본문 텍스트*/
	.con{
		display: none;
		color:#ff0000; /* #aaa;	*/
	}
	/*본문 일반 텍스트 행간*/
	.text {
		line-height: 170%
	}
	/*셀렉트*/
	.sel{				
		color: #dc2276; 
	}
	.pagenation .sel{				
		color:#fff;
		font-weight: bold;
	}
	/*간격조각*/	
	
	
	
/************************  NAV  ************************/

	/* 로고부 */
	.header_web{
		display:none;
	}
	/* 주메뉴 */
	.nav_main{
		float: left;
    	display: block;
		padding-top: 30px;
		padding-bottom: 30px;
		color: #aaa; /*#dc2276; */
		font-size: 1.5em;
		text-shadow: 0px 2px 0px #000;
		letter-spacing: 1px;
		font-weight: bold;
	}
	.nav_contact{
		display:none;
	}

	/* 세부메뉴-카테고리 */
	.nav_sub_cate{
		color: #aaa;
		font-size: 0.87em; /*14px;*/
		line-height:170%;
		*letter-spacing: 0px;
	}	
	.nav_sub_cate_add{
		font-size: 0.85em; /*12px;*/
		display: inline;
		letter-spacing: 0px;
	}	
	/* 세부메뉴-태그 */
	.nav_sub_tag{
		color: #aaa;
		font-size: 0.8em; /*13px;*/
		line-height: 220%;
	}

	nav .sel img{
		position:relative;
		top:2px;
	}

	
	
/************************  CON  ************************/

	/* 그래픽요소*/		
	.dogear{
		float: left;	
	}
	.post_inner_btn{
		float: right;	
	}
	.url{
		float: left;
		padding-top: 10px;
		color: #666;
		text-shadow: 0px -1px 0px  #000;
	}
	/*외부*/	
	.postbox{ 
		position: relative; 	
		margin-bottom:30px; /*다음포스트박스와의 여백*/
		background-color:#30323a;
		border-radius:3px;
		box-shadow: 0px 0px 3px #161719;
	}
	/*내부*/
	.post{
	
		padding-top:30px;
		padding-bottom:30px;
	}
	/*포스트타이틀*/
	.post .title h2{
		font-size: 1em; /*16px;/*나눔펜일때 26px;*/
		/*font-family: Malgun Gothic, NanumGothic;*/
		color: #ddd;
		text-shadow: 0px -1px 0px  #000;
		font-weight: normal;
	}
	/*이너포스트타이틀*/
	.post .title_inner h3{
		font-size: 0.9em;/*15px;/*나눔펜일때 22px;*/
		/*font-family: Malgun Gothic, NanumGothic;*/
	}
	/*본문 텍스트크기 강제지정*/
	.text{
		font-size:0.8em; /*13px;	*/
	}
	/*요소 여백-좌우공통 (전체폭 점선 때문에 마진을 .post에서 한꺼번에 못하므로 여기서 지정)*/
	.title, .title_inner, .text, /*.graphic*/ .disqus_custom{
		margin-left: 40px;
		margin-right: 40px;
	}
	/*그래픽 여백및 정렬 예외 처리*/
	.graphic, .graphic_noeffect{
	 	margin-left: 30px; /*자식마진 10px(복수의 이미지간의 간격)을 합해서 40px*/
		margin-right: 30px;
		text-align: center;
	}
	.graphic_left{ /*프로필 용 예외처리*/
		margin-left: 30px; 
		margin-right: 30px;
		text-align: left;
	}
	/*요소 여백-상하공통*/
	.graphic, .graphic_noeffect, .graphic_left, .text {
		margin-top:20px;
		margin-bottom:20px;			
	}
	/*이미지*/
	.graphic img, .graphic_left img, .graphic_noeffect img{
		margin-left: 10px;
		margin-right: 10px;
		margin-bottom: 10px;	
		text-align: center;		
	}
	.graphic img, .graphic_left img{
		border-radius:3px;
		box-shadow: 0px 0px 4px #161719;		
	}
	
	/*이너포스트, 하이퍼포스트*/
	.post_inner{
		margin-bottom:30px; /*다음 이너포스트 설명글과의 간격은 넓어야 하므로*/
	}
	.post_inner .text{ 
		margin-bottom:10px; /*이너포스트 설명글과 이너포스트간 간격은 좁아야 하므로*/
	}
	.post_inner h3{
		margin-top: 14px;
		margin-bottom: 14px;
		font-size: 0.9em; /*15px;/*나눔펜일때 22px;*/
		/*font-family: Malgun Gothic, NanumGothic;	*/
	}
	.border_1{
		border-top: 1px solid #26282e;	
	}
	.border_2{				
		border-top: 1px dashed #3e404b;	
	}
	.post_hyper{
		color: #eee;
		border-bottom: dotted #aaa 1px;
	}
	/*테일*/
	.tail{ 
		margin-top: 30px;
		margin-right: 30px;
		margin-left: 40px;
		text-align: right;
	}
	.tail_each{ /*tail 일반 행간*/
		margin-top: 0px;/* em 처리후 기본적으로 간격이 5px정도 생김. 거기다 추가함.*/
	}
	.tail_each_btn{ /*tail 버튼부 행간*/
		margin-top: 10px;
	}
	.tail_each span{ /*tail 일반 텍스트*/
		font-size: 0.8em; /*13px;*/
		color: #6a6a6a;
	}
	.tail_each .small{ /*tail 일반 소형 텍스트*/
		font-size: 0.75em; /*11px;*/
	}	
	.btn_link{ /*tail 버튼부 및 버튼 텍스트*/
		color:#b2b2b2; /*#6a6a6a;*/
		font-size: 0.75em; /*11px;*/
		background-color:#474950;/*#3b3d42;*/
		border-radius:2px;
		padding:1px 4px 1px 4px;
		letter-spacing: 0px;
		margin-left: 2px /*기본적으로 간격이 5px정도 생김. 거기다 추가함.*/
	}
	/*페이지네이션*/
	.pagenation{
		text-align: center;
		font-size: 1em; /*16px;*/
		margin-bottom: 40px;
	}
	.pagenation_each{
		color: #aaa;
		padding-right: 7px;
		padding-left: 7px;
	}
	/*임시정보출력용*/
	.tmpinfo{
		color: #30323a; /*#2a2c33; /*배경에묻히게*/
		font-size: 0.8em; /*11px;*/
		margin-bottom: 0px; 
	}
	/*어바웃 경력 용 숫자*/
	.date{
		font-family: 'Merriweather', serif;
		font-size: 1em; /*15px;*/
		letter-spacing: 0px;
	}
	
/***************fontface***************/	
	@font-face {
		font-family:'NanumGothic'; 
		src: url('../font/NanumGothic.ttf') format("truetype");
		/*src: url('../font/NanumGothic.woff') format("woff");*/
	}