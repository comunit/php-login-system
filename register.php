<?php 
  session_start();
  include_once './config/Database.php';
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  if ($name == '' || $email == '' || $password == '') {
    $_SESSION['message'] = "Please Fill In All Fields";
    header('Location: /');
  } else {
    // prepare and bind
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) 
    VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    if($stmt->execute()) {
      $_SESSION['message'] = "Account Successfully Created Please Log In";
      header('Location: /');
    } else {
      $_SESSION['message'] = "Error Creating User";
      header('Location: /');
    }
  }
?>

 