<?php session_start();
include_once './config/login_functions.php';
if(is_logged_in()){
  header('location: /user.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Login system Php</title>
</head>

<body>
  <div class="login-page">
    <div class="form">
    <?php if (isset($_SESSION['message'])) { ?>
     <p> <?php echo $_SESSION['message']; ?></p>
     <?php unset($_SESSION['message']); ?>
    <?php } ?>
      <form class="register-form" action="register.php" method="post">
        <input type="text" placeholder="name" name="name"/>
        <input type="password" placeholder="password" name="password" />
        <input type="text" placeholder="email address" name="email" />
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      <form class="login-form" action="signin.php" method="post">
        <input type="text" placeholder="email" name="email"/>
        <input type="password" placeholder="password" name="password"/>
        <button>login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script>
    $('.message a').click(function () {
      $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
    });
  </script>
</body>

</html>