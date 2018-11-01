<?php 
  session_start();
  include_once './config/Database.php';
  include_once './config/login_functions.php';

  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $error;

  if ($email == '' || $password == '') {
    $_SESSION['message'] = "Please Fill In All Fields";
    header('Location: /');
  }

  $sql = 'SELECT * FROM users WHERE email = ?';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$email]);
  $users = $stmt->fetch(PDO::FETCH_OBJ);

  if($stmt->rowCount() < 1){
    $_SESSION['message'] = 'Password or email invalid';
    $error = true;
    header('Location: /');
  }

  if (!password_verify($password, $users->password)) {
    $_SESSION['message'] = 'Password Or Email Invalid';
    $error = true;
    header('Location: /');
  }

  if($error == true) {
    
  } else {
    $user_id = $users->id;
    login($user_id);
  }
?>