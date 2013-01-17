<?php
session_save_path('./session');
session_destroy();
session_start();
$_SESSION['title'] = 'otuotuotu'
?>
<?php
//session_save_path('./session');
//session_start();
//$_SESSION['title'] = '생활코딩';
?>
