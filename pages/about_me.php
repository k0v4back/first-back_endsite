<?php
  require "../pages/header.php";
?>


 
 <!--Вытаскиваем категории из бд-->
      <?php $categoriess = mysqli_query($connect, "SELECT * FROM `articles_categories`");?> 

        <?php
        while( $cats = mysqli_fetch_assoc($categoriess) ){

        }
        ?>


				<div class="container">
                <div class="row">
                  <section class="content__left col-md-8">
                    <div class="block">
                      <div class="block__content">
                        <div class="articles articles__horizontal">
                          <div class="full-text">
						  
                
                <?php 
                $about_me = mysqli_query($connect, "SELECT * FROM `about_me`");

                while ( $me = mysqli_fetch_assoc($about_me)) {
                  ?>

                  <?php
                    $art = mysqli_fetch_assoc($about_me);
                    mysqli_query($connect, "UPDATE `about_me` SET `views` = `views` + 1 WHERE `id` = " . (int) $me['id']);
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

                      <a id="all_articles" href="http://logopedist-site/pages/portfolio.php" style="color:black font-size:15px;">Портфолио</a>

                      <div id="zagolovok_article"  style="font-size:18px;"><b style="font-size:20px;"><?php echo $me['title'];?></div><div id="one_news_div" style="font-size: 14px;"></b> <?php echo date('j '.$monthes[(date('n'))].' Y в G:i', strtotime($me['pubdate']));?><i style="margin-right: 15px;"></i> <i class="fa fa-hourglass-o" aria-hidden="true" id="padding_right" style="margin-right: 3px;"> </i><?php echo $me['reading']?><i style="margin-right: 15px; "></i><?php echo $me['views'];?><i class="fa fa-eye" aria-hidden="true" style="margin-left: 3px;"> </i></div>

                      <img src="../views/img/<?php echo $me['img_1']; ?>" id="img_art_one"> 


                        <div class="block__content">
                          <div class="articles articles__horizontal">
                            <div class="full-text">
                            <?php echo $me['text'];?>


                            
                          
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
                          <small>Категория: <a href="/article-categorie.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title'];?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 150, 'utf-8')?><a href="/article-categorie.php?id=<?php echo $art_cat['id']; ?>">...</a>
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
    </div>

    </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>






  <!-- Блок footer-->
<?php require"../includes/footer.php";?>