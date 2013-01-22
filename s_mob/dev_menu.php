<?php
$years = array(12, 13);
$i = 0;

while ($i < 2) {
	echo " 
		<div class='dev_area_ym'>
			
				<div class='dev_area_y'>
					<span class='year'>20{$years[$i]}</span>
				</div>
				<div class='dev_area_m'>
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
					<div style='background-color:grey'>	
						<a href=\"?devcate={$link}\">
							<span class='dev_area_m_milestone'>oo</span>
							<span class='dev_area_m_period'>$date_m</span>
							<span class='dev_area_m_text'>$display_text</span>
							<span class='dev_area_m_btn'>▶</span>
						</a>
					</div>";						
	} 	
	echo '</div>';//dev_area_m의 클로져
	echo '</div>';//dev_area_ym의 클로져    

	$i++;
}
?>