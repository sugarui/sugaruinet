<li>
	<div class="nav_main">
		SHARE
	</div>

	<!--트위터 -->
	<div class="nav_sub_cate">
		<a href="https://twitter.com/share" class="twitter-share-button"
		data-text="사탕화면" data-count="none">Tweet</a>
		<script>
			! function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.src = "//platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, "script", "twitter-wjs");
		</script>
	</div>

	<!--페북 오리지널-->
	<div id="fb-root"></div>
	<script>
		( function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id))
					return;
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/ko_KR/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
	</script>
	<div class="fb-like" data-href="http://www.sugarui.net" data-send="false" data-layout="button_count" data-width="56" data-show-faces="false"></div>

	<!--페북 페이크-->
	<!-- <div class="nav_sub_cate">
	<style type="text/css">
	#facebook_like_button_holder {
	position:relative;
	width:90px;
	height: 20px;
	color:#fff;
	background:black;
	}

	#facebook_like_button_holder iframe {
	position:absolute;
	top: 0px;
	width: 90px !important;
	}

	#fake_facebook_button {
	pointer-events: none;
	position:absolute;
	width: 90px;
	height: 20px;
	left:0;
	top:0;
	background: url('./image/lnb_diary_fb.png');
	}
	</style>

	<div id="facebook_like_button_holder">

	<fb:like href="http://www.esrun.co.uk/blog/disguising-a-facebook-like-link/" layout="button_count" show_faces="false" width="450" action="recommend"></fb:like>

	<div id="fake_facebook_button"></div>
	</div>

	<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>

	<script type="text/javascript">
	FB.Event.subscribe('edge.create', function(response) {
	window.location = "http://www.google.com/";
	});

	</script>
	</div> -->
</li>