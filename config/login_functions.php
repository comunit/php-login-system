<?php
function login($user_id){
	$_SESSION['SBUser'] = $user_id;
	header('location: user.php');
}

function is_logged_in(){
	if(isset($_SESSION['SBUser']) && $_SESSION['SBUser'] > 0) {
		return true;
	}
	return false;
}

function login_error_redirect(){
	$_SESSION['message'] = 'You must be logged in to access this page';
	header('location: /');
}
?>