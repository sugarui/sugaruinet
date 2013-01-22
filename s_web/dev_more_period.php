<!--더보기 load (http://bit.ly/10gU7kN 참고)-->	
	
	<?php
	if($_GET['devcate'] == 'intro'){$nextperiod = 'start'; $nextname='시작'; }	
	else if($_GET['devcate'] == 'start'){$nextperiod = 'html'; $nextname='html css 공부'; }		
	else if($_GET['devcate'] == 'html'){$nextperiod = 'html2'; $nextname='html css 적용'; }	
	else if($_GET['devcate'] == 'html2'){$nextperiod = 'js'; $nextname='js 공부'; }	
	else if($_GET['devcate'] == 'js'){$nextperiod = 'php1'; $nextname='php db 공부'; }	
	else if($_GET['devcate'] == 'php1'){$nextperiod = 'php2'; $nextname='php db 적용'; }	
	else if($_GET['devcate'] == 'php2'){$nextperiod = 'contents'; $nextname='컨텐츠'; }	
	else if($_GET['devcate'] == 'contents'){$nextperiod = 'mobile'; $nextname='모바일 제작'; }	
	else if($_GET['devcate'] == 'mobile'){$nextperiod = 'devdiary'; $nextname='개발일지 개발'; }	
	
	if($_GET['devcate'] !== 'devdiary'){
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
						<a href=?devcate={$nextperiod}>
							<div class='title'>
							<h2>
								<span class='morebtn_period'>
									Next Period : 
										<span class='font_weight_normal'>{$nextname}</span> ▼
								</span>
							</h2>
						</a>
					</div>
		";
	
		echo "
				</div>
			</li>
		";
	}
	?>


	