					//개발일지네비관련
					//var nav = document.getElementsByClassName('nav_pick');
					
					//nav[6].addEventListener('click', cHandler, false);
					
					$(".nav_pick")[6].click(function(){
						var str_raw = nav[6].getAttribute('href');
						var str = str_raw.replace("#","");
						var session_raw = document.getElementById('<?php echo $_SESSION['period'];?>');
						var session = session_raw.getAttribute('id');
						alert ('메뉴값은 '+str);
						alert ('세션값은 '+session);
						if (str>session){ //(nav[6].getAttribute())세션피리어드 값이 애의 아이디값보다 앞서면
							alert('hi');
							$.ajax({
								url:'period_refresh.php',
								datatype: 'json',
								type: 'POST',
								data: {'new': 'string'},
								success: function(result){
                        			if(result['answer']==true){
                         				 alert('바뀐피리어드는');
                     			   }
                     			}	   
							});
							<? //$_SESSION['period']= //'2012-12-06' ?>
							alert('<?php echo $_SESSION['period'];?>'); //자바스크립트 내 php로 세션에 테스트값 보내기 성공. 실제값은 아직 못보내고 있음
						}
					});
