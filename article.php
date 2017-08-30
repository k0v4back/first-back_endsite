<?php
  require "includes/header.php";

  
?>

 
 <!--Вытаскиваем категории из бд-->
      <?php $categoriess = mysqli_query($connect, "SELECT * FROM `articles_categories`");?> 

        <?php
        while( $cats = mysqli_fetch_assoc($categoriess) ){

        }
        ?>

        <!--ТУт мы будем получать число которое идёт по ссылке для отображения статьи (т.е число)-->
        <?php
          $article = mysqli_query($connect, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id'] );

          if(mysqli_num_rows($article) <= 0){

            ?>
              <div class="container">
                <div class="row">
                  <section class="content__left col-md-8">
                    <div class="block">
                      <h3>Статья не найдена!</h3>
                      <div class="block__content">
                        <div class="articles articles__horizontal">
                          <div class="full-text">
                            Мы не смогли найти запрашиваемую статью!
                          
            <?php
          }else{
            $art = mysqli_fetch_assoc($article);
            mysqli_query($connect, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
            ?>
              <div class="container">
                <div class="row">
                  <section class="content__left col-md-8">
                    <div class="block" id="one_news">


                      <!-- Вывод даты на русском -->
                      <?php
                      $monthes = array(
                          1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
                          5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
                          9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
                      );
                      //echo(date('d ') . $monthes[(date('n'))] . date(' Y, H:i'));
                       
                      // Вывод дня недели на русском
                      echo('<br />');
                      $days = array(
                          'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
                          'Четверг', 'Пятница', 'Суббота'
                      );
                      ?>


                      <a id="all_articles" href="http://logopedist-site/pages/news.php" style="color:black font-size:15px;">Все статьи</a>
                      <div id="zagolovok_article" style="font-size:18px;"><b style="font-size:20px;"><?php echo $art['title'];?></div><div id="one_news_div" style="font-size: 14px;"></b> <?php echo date('j '.$monthes[(date('n'))].' Y в G:i', strtotime($art['pubdate']));?><i style="margin-right: 15px;"></i> <i class="fa fa-hourglass-o" aria-hidden="true" id="padding_right" style="margin-right: 3px;"> </i><?php echo $art['reading']?><i style="margin-right: 15px; "></i><?php echo $art['views'];?><i class="fa fa-eye" aria-hidden="true" style="margin-left: 3px;"> </i></div>

                      <img src="views/img/<?php echo $art['image_article']; ?>" id="img_art_one"> 


                        <div class="block__content">
                          <div class="articles articles__horizontal">
                            <div class="full-text">
                            <?php echo $art['text'];?>
                            <div style="background-image:url(views/img/<?php echo $art['imagae']; ?>);></div>
                          
            <?php
          }
        ?>


      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3></h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <div class="full-text">

                  </div>
                </div>
              </div>

          </section>

        </div>
      </div>
    </div>





          </section>
          <section class="content__right col-md-4" id="wenow">
            <div class="block">
              <h3 style="text-align: center;">Посетители сайта из:</h3>
              <div class="block__content" >
                <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
              </div>
            </div>

            <div class="block">
              <h3>Топ читаемых статей</h3>
              <div class="block__content">
                <div class="articles articles__vertical">


                <!--Выводит топ читаемых статей-->

                <?php
                  $articles = mysqli_query($connect, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 3");
                ?>

                <?php
                while( $art = mysqli_fetch_assoc($articles)){
                  ?>
                    <article class="article">
                      <div class="article__image" style="background-image:url(../views/img/<?php echo $art['image']; ?>); no-repeat"></div>
                      <div class="article__info">
                        <a href="/article.php?id=<?php echo $art['id']; ?>" class="blog"><?php echo $art['title']; ?></a>
                        <div class="article__info__meta">
                        <?php
                          $art_cat = false;
                          foreach( $categoriess as $cats ){
                            if($cats['id'] == $art['categorie_id'])
                          {
                            $art_cat = $cats;
                            break;
                          }
                        }
                        ?>
                          <small>Категория: <a><?php echo $art_cat['title'];?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 100);?>
                      </article>
                      </br>
                  <?php
                }
              ?>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
               </div>

              


               <div class="container" style="background-color: #E9E9E9; margin-top: 15px; ">
               
              <h3>Комментарии</h3>
              <a href="#comment-add-form">Добавить коментарий</a></br>
              <div class="block__content">
                <div class="articles articles__vertical">


                <?php 
                  //$articles_stat = mysqli_query($connect, "SELECT * FROM `articles`");
                  //echo "SELECT * `id` FROM `articles`";
                  //die();

                  $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $_GET['id'] . " ORDER BY `id` DESC");//ЧТобы самые новые были сверху
                

                  if(mysqli_num_rows($comments) <= 0){
                    echo 'Нет коментариев';
                  }
                  while($comment = mysqli_fetch_assoc($comments))
                  {
                    ?>
                    
                    <article class="article">
                      <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email']);?>?s=125);"></div>
                      <div class="article__info">
                        <a style="color: black;"><?php echo $comment['name'];?><?php echo $comment['author']; ?></a>
                        <div class="article__info__meta">
                          
                        </div>
                        <div class="article__info__preview"><?php echo $comment['text']; ?></div>
                      </div>
                    </article>
                    <hr />
                  <?php
                }
              ?>

                </div>
              </div>
            </div>
            <div id="comment-add-form" class="block" style="margin-top: 30px;">
            <form class="form" method="POST" action="/article.php?id=<?php echo $_GET['id']; ?>#comment-add-form">
              <div class="block__content">
                 <p style="text-align: center; font-size: 20px;">Добавить коментарий</p>
               <div class="container" >

                <?php 
                  if(isset($_POST['do_post'])){ // ПРоверяем была ли нажата кнопка

                    $errors = array(); 

                    if($_POST['email'] == ''){
                      $errors[] = 'Введите ваш email!';
                    }

                    if($_POST['name'] == ''){
                      $errors[] = 'Введите ваше имя!';
                    }

                    if($_POST['nickname'] == ''){
                      $errors[] = 'Введите ваш никнейм!';
                    }

                    if($_POST['text'] == ''){
                      $errors[] = 'Введите какой либо текст!';
                    }


                    //Проверяем пуст ли массив с ошибками
                    if(empty($errors)){

                      mysqli_query($connect, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id` ) VALUES ('".$_POST['name']."', '".$_POST['nickname']."', '".$_POST['email']."', '".$_POST['text']."', NOW(), '".$_GET['id']."')");


                      //Выведем "Всё ОК"
                      echo '<span style="color:green; font-size: 20px; font-weight: bold;">Комментарий добавлен</span>';
                    }else{
                      //Выведем первую ошибку 
                      echo $errors['0'];
                    }

                  }
                  ?>

              <div class="form-group">
                <label for="exampleInputEmail1">Email <small>(не будет виден для других пользователей)</small> <a style="color:red;">*</a></label>
                <input type="email" required="" name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email" value="<?php echo $_POST['email'];?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Имя <a style="color:red;">*</a></label>
                <input type="name" required="" class="form-control" name="name" id="exampleInputPassword1" placeholder="Имя" value="<?php echo $_POST['name'];?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Никнейм <a style="color:red;">*</a></label>
                <input type="text" required="" class="form-control" name="nickname" id="exampleInputPassword1" placeholder="Никнейм" value="<?php echo $_POST['nickname'];?>">
              </div>
                <label for="exampleInputPassword1">Комментарий <a style="color:red;">*</a></label>
                <div class="form-group">
                  <label for="message" class="h4 ">Ваше сообщение: </label>
                  <textarea id="message" name="text" class="form-control" rows="5" placeholder="Здравствуйте, " required></textarea>
                </div>
              <button type="submit" id="form-submit" class="btn btn-success btn-lx pull-right " name="do_post">Отправить</button>
            </div></br></br>
              </div>
            </div>
            </form>






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