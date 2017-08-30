<?php
  require "includes/config.php";
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
  
  <!--Подключаем js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.3.0/lodash.js"></script>
  
  <!-- ПОдключаем библиотеку wow.js для красивой анимации-->
  <link rel="stylesheet" href="views/css/animate.css">
  <script src="views/js/wow.min.js"></script>
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
        <a class="navbar-brand" href="/" style="font-size:16px;">LOGOPED39.COM</a><!--заголовок сайта-->
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

  <!--КОнец шапки-->
  <div class="parallax-window" style="height: 700px;" data-speed="0.1" data-parallax="scroll" data-image-src="views/img/100.jpg">
  <div>
    <div class="container wow fadeInUp">
      <div class="row centered">
      <div class="col-lg-8 col-lg-offset-4">
        <h1 id="h11" style="color:white; font-size: 50px; color:white; text-align: right; background-attachment: relative; background-position: center center; padding-top: 80%;"><?php echo $config['title'];?></h1>
      </div>
      </div>
    </div>
  </div>
  </div>
 
  <?php 
  $glavn_str = mysqli_query($connect, "SELECT * FROM `glavnai`");

  while($glavn = mysqli_fetch_assoc($glavn_str)){

  ?>
  
  <!-- Начало информационного конттейнера-->
  <div class="container w">
    <div class="row centered ">
      <br><br>
      <div class="col-lg-4">
        <i class="fa fa-question" style="font-size: 21px" aria-hidden="true"></i>
        <h4 style="font-size:21px;"><?php echo $glavn['title1'];?></h4>
        <p style="font-size: 18px;"><?php echo $glavn['text1'];?></p>
      </div>
      <div class="col-lg-4">
        <i class="fa fa-info-circle" style="font-size: 21px" aria-hidden="true"></i>
        <h4 style="font-size:21px;"><?php echo $glavn['title2'];?></h4>
        <p style="font-size: 18px;"><?php echo $glavn['text2'];?></p>
      </div>
      <div class="col-lg-4">
        <i class="fa fa-briefcase" style="font-size: 21px" aria-hidden="true"></i>
        <h4 style="font-size:21px;"><?php echo $glavn['title3'];?></h4>
        <p style="font-size: 18px;"><?php echo $glavn['text3'];?></p>
      </div>
    </div>
    <br><br>
  </div>
  <!--Конец информационного конттейнера-->

  
  
  <!-- Начало блока ПОРТФОЛИО (слайдер)-->
  <div id="carusel_stule">
  <h4 id="headers" style="margin-top: -30px;">Фото из архива</h4>
  <h5 id="headers" style="padding-bottom: 10px;">Больше фото <a href="<?php echo $config['vk_url']; ?>" target="_blank"><strong>тут</strong></a></h5>
    <div id="carousel-example-generic" class="carousel slide wow fadeInUp" data-ride="carousel" >
    <ol class="carousel-indicators" >
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" id="carusel">
    <div class="item active">
      <img src="views/img/сhildren1.jpg" alt="">
      <div class="carousel-caption">
      <big></big>
      </div>
    </div>
    <div class="item">
    <img src="views/img/сhildren2.jpg" alt="">
      <div class="carousel-caption">
      <big></big>
      </div>
    </div>
    <div class="item">
    <img src="views/img/сhildren3.jpg" alt="">
      <div class="carousel-caption">
      <big></big>
      </div>
    </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
</div>
  
  <div id="r">
    <div class="container">
      <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2">
          <h4 style="font-size: 25px;"><?php echo $glavn['text4'];?></h4>
        </div>
      </div>
    </div>
  </div>

  <?php

  }
  ?>





<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1px;background: #22313F url(http://hello-site.ru//main/images/preloads/oval.svg) center center no-repeat;background-size:41px;}</style>
<div id="hellopreloader"><div id="hellopreloader_preload"></div><p><a href="http://hello-site.ru">Hello-Site.ru. Бесплатный конструктор сайтов.</a></p></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},100);};</script>



  



  </body>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="parallax/parallax.js"></script>



  <!-- Блок footer-->
  <div id="f">
    <div class="container wow fadeInUp">
      <div class="row centered">
        <a href="<?php echo $config['ok_url'];?>" target="_balank"><i class="fa fa-odnoklassniki odnoklassniki" id="odnoklassniki"></i></a>
        <a href="<?php echo $config['vk_url']?>" target="_balank"><i class="fa fa-vk vk" id="vk"></i></a>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="views/js/bootstrap.min.js"></script>
</body>
</html>