<?php
  require "config.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap сайт</title>
  <link rel="shortcut icon" href="../views/img/1.ico" type="image/ico">
  <link rel="stylesheet" href="../views/css/bootstrap.css">
  <link rel="stylesheet" href="../views/css/font-awesome.min.css">
  <link rel="stylesheet" href="../views/css/main.css">

  <!--После этого кнопка меню заработала-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!--Подключаем js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.3.0/lodash.js"></script>
  
  <!-- ПОдключаем библиотеку wow.js для красивой анимации-->
  <link rel="stylesheet" href="../views/css/animate.css">
  <script src="../views/js/wow.min.js"></script>
  <script>new WOW().init();</script>
</head>
<body>
<!-- Начало шапки-->
  <div class="navbar navbar-inverse navbar-fixed-top"><!--navbar-inverse - шапка чёрного цвета,  --> 
    <div class="container">
  <!--Лого сайта начало-->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><!--кнопка для меню на телефоне-->
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">LOGOPED39.COM</a><!--заголовок сайта-->
      </div>

      

      <!--Вытаскиваем категории из бд-->
      <?php $categories = mysqli_query($connect, "SELECT * FROM `header`");?> 

      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

      

        
          <li><a href="/">Главная</a></li>
          <li><a href="/pages/about_me.php">Обо мне</a></li>
          <li><a href="/pages/news.php">Новости</a></li>
          <li><a href="/pages/photovideo.php">Занятия</a></li>
          <li><a href="/pages/contacts.php">Контакты</a></li>
          
        </ul>
      </div>
    </div>
  </div>