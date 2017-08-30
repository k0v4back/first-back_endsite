<?php
  require "includes/config.php";
 


$login = $_POST['login'];
$password = md5($_POST['password']);

setcookie('password', $password);
setcookie('login', $login);

$dostup = mysqli_query($connect, "SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password'");


if(mysqli_num_rows($dostup) <= 0){
  echo '<p style="color : red; text-align: center; font-size: 20px;">Доступ закрыт!<p>';
}else{
  echo '<p style="color : green; text-align: center; font-size: 20px;">Доступ разрешён!</br><a href="http://www.my-home-test-site.pro/admins.php">Пройдите по ссылки для входа в админку</a><p>';
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap сайт</title>
  <link rel="shortcut icon" href="views/img/1.ico" type="image/ico">
  <link rel="stylesheet" href="views/css/bootstrap.css">
  <link rel="stylesheet" href="views/css/font-awesome.min.css">
  <link rel="stylesheet" href="views/css/main.css">
  
  <!-- ПОдключаем библиотеку wow.js для красивой анимации-->
  <link rel="stylesheet" href="views/css/animate.css">
  <script src="views/js/wow.min.js"></script>
  <script>new WOW().init();</script>


  </head>
  <body>
  
  
  
  <form class="form-horizontal" style="text-align: center;" method="POST" action="/admin.php">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Логин</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Логин" name="login">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Пароль</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Пароль" name="password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" style="margin-top: 15px;" name="into" class="btn">Войти</button>
    </div>
  </div>
</form>











  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="views/js/bootstrap.min.js"></script>
</body>
</html>