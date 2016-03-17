
<?php
include'core/init.php';
protect_page();

session_start();
change_state_inactive($session_user_id);
session_destroy();
header('Location:index.php');
?>