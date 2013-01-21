<?php
echo json_encode(array('result'=>true, 'newdone'=>$_REQUEST['new']));
if ($_REQUEST['new']){
	session_save_path('./session');
	session_start();
	$_SESSION['period'] = $_REQUEST['new'];	
}
?>