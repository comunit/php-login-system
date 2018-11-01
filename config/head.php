<?php
 if(isset($_SESSION['SBUser'])){
	$user_id = $_SESSION['SBUser'];
  $sql = 'SELECT * FROM users WHERE id = ?';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$user_id]);
  $users = $stmt->fetch(PDO::FETCH_OBJ);
  $date = new DateTime($users->created_at);
}
?>