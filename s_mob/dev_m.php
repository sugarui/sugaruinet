                    <?php
                         echo "<div class=\"postbox dev\">"; 
    
                              $date_ori = date_create_from_format('Y-m-d', $row['worked']);
                              $date_y =  date_format($date_ori, 'Y');
                              $date_m =  date_format($date_ori, 'm');
                              $date_d =  date_format($date_ori, 'd');

                              echo "
                                   <div class='dev_date'>
                                        <div class='date_m'>{$date_m}</div>
                                         <div class='date_d'>{$date_d}</div>
                                   </div>
                              ";
							  
                              echo "
                                   <div class='dev_con'>
                                        <div class='title'>
	                                        <h2>
	                                             {$row['title']}
	                                        </h2>
                                        </div>
                              ";  
							            
                             include '../s_web/dev_core.php';
						 echo "</div>"; //dev_con끝
                         echo "</div>"; //포스트박스끝     
                    ?>