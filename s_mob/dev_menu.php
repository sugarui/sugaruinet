<?php
$years = array(12, 13);
$i = 0;

while ($i < 2) {
	echo //"<li>
			"<div class='dev_area_ym'>
				<div class='dev_area_y'>
					<div class='year'>{$years[$i]}</div>
				</div>";		
	echo 		//"<ul>
				"<div class='dev_area_m'>"; 
				
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
		$list = //" <li style='background-color:grey'>				
				"
					<div style='background-color:grey'>	
						<a href=\"?devcate={$link}\">
							<div class='dev_area_m_milestone'>oo</div>
							<div class='dev_area_m_period'>$date_m</div>
							<div class='dev_area_m_text'>$display_text</div>
							<div class='dev_area_m_btn'>▶</div>
						</a>
					</div>"; //</li>							
		echo $list;	
		echo 		'</div>';//dev_area_m의 클로져
		//echo '</ul>';
		echo '</div>';//dev_area_ym의 클로져   
		//echo '</li>';
	}   

	$i++;
}
?>