<?php
$years = array(12, 13);
$i = 0;

while ($i < 2) {
	echo " 
		<div class='dev_menu_ym'>	
		
				
				<div class='dev_menu_y'>
					<span class='year'>20{$years[$i]}</span>
				</div>
				
				
				<div class='dev_menu_m'>
				<ul>
	"; 
	$sql = "SELECT * FROM `su_cate_02` 
			 WHERE period BETWEEN '20" . $years[$i] . "-01-01' AND '20" . $years[$i] . "-12-31' 
			 ORDER BY period";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {	//리소스를 목록으로 출력
		$date_ori = date_create_from_format('Y-m-d', $row['period']);
		$date_m = date_format($date_ori, 'm');
		//출력문 고정부 설정
		$link = $row['cate'];
		$display_text = $row['cate_expression'];
		$display_period = $row['period'];
		echo "
					<li class='dev_menu_m_oneline'>
					<ul>	
						<a href=\"?cate={$_GET['cate']}&page={$_GET['page']}&id={$_GET['id']}&devcate={$link}\">
							<li class='dev_menu_m_milestone'>
								<img src='http://elecuchi.cafe24.com/s_web/image/milestone_mob.png' />
							</li>
							<div class='dev_menu_m_period'>$date_m</div>
							<div class='dev_menu_m_text'>$display_text</div>
							<div class='dev_menu_m_btn'>
								<img src='http://elecuchi.cafe24.com/s_web/image/milestone_mob_next_sel_wide.png' />
							</div>
						</a>
					</ul>	
					</li>";						
	}
	echo '</ul>'; 	
	echo '</div>';//dev_area_m의 클로져
	echo '</div>';//dev_area_ym의 클로져    

	$i++;
}
?>