<?php
 session_start();
 unset($_SESSION['SBUser']);
 $_SESSION['message'] = 'You are logged out now';
 header('Location: /');
?>