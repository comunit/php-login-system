<?php
 session_start();  
 include_once './config/Database.php';
 include_once './config/head.php';
 include_once './config/login_functions.php';
 include_once './config/checkLogin.php';
?>

<p>Hello <?php echo $users->name ?></p>
<p>You created this account at <?php echo date_format($date,"d/m/Y H:i:s"); ?></p>
<a href="logout.php">Logout</a>