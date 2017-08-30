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
              <h3 >Новости и статьи</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                <!-- Выводим читаемые статьи-->

                <?php
                  //Пагинатор
                  $per_page = 6;//КОличество записей на одну страницу (для пагинатора)
                  $page = 1; //Текущая страница

                  if( isset($_GET['page']) ){//Если есть переменная page
                    $page = (int) $_GET['page'];
                  }


                  $total_count_q = mysqli_query($connect, "SELECT COUNT(`id`) AS `total_count` FROM `articles`");//Тут будем получать количество страниц на всем блоге
                  $total_count = mysqli_fetch_assoc($total_count_q);
                  $total_count = $total_count['total_count'];

                  $total_pages = ceil($total_count / $per_page);
                  if( $page <= 1 || $page > $total_pages){
                    $page = 1;
                  }

                  $offset = ($per_page * $page) - $per_page;
                  $articles = mysqli_query($connect, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset, $per_page");

                  if( $page != 0){
                    $offset = $per_page * $page; 
                  }

                $articles_exist = true;
                
                if( mysqli_num_rows($articles) <= 0){
                  echo 'Нет статей';
                  $articles_exist = false;
                }
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
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 150, 'utf-8')?><a href="/article.php?id=<?php echo $art['id']; ?>"> ...</a>
                      </article>
                      </br>
                  <?php
                }
                if( $articles_exist == true){
                  echo '<div class="paginator">';
                  if( $page > 1){
                    echo '<a href="/pages/news.php?page='.($page - 1).'">&laquo; Прошлая страница </a>';
                  }
                  if( $page < $total_pages ){
                    echo '<a href="/pages/news.php?page='.($page + 1).'">Следующая страница&raquo;</a>';
                  }
                  echo '</div>';
                }
              ?>

<!--
                  <article class="article">
                    <div class="article__image" style="background-image:url(../views/img/2.jpg); no-repeat"></div>
                    <div class="article__info">
                      <a href="#" class="blog">Название статьи</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Программирование</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna...</div>
                  </article>
-->

                  

            
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
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8')?><a href="/article.php?id=<?php echo $art['id']; ?>">...</a>
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


<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7 /js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <?php require"../includes/footer.php";?>