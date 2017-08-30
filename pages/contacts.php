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

                
                <?php 
                $contacts = mysqli_query($connect, "SELECT * FROM `contacts`");

                while ( $cont = mysqli_fetch_assoc($contacts)) {
                  ?>

                  <?php
                    $art = mysqli_fetch_assoc($contacts);
                    mysqli_query($connect, "UPDATE `contacts` SET `views` = `views` + 1 WHERE `id` = " . (int) $cont['id']);
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


                      <div id="zagolovok_article"style="font-size:18px;"><b style="font-size:20px;"><?php echo $cont['title'];?></div></b><div style="font-size: 14px;" id="one_news_div"> <?php echo date('j '.$monthes[(date('n'))].' Y в G:i', strtotime($cont['pubdate']));?><i style="margin-right: 15px;"></i><i></i><?php echo $cont['views'];?><i class="fa fa-eye" aria-hidden="true" style="margin-left: 3px;"> </i></div>


                        <div class="block__content">
                          <div class="articles articles__horizontal">
                            <div class="full-text">
                            
                            <form method="POST" id="feedback-form" >
                            <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name" class="h4">Как к Вам обращаться: <a style="color:red;">*</a></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="например, Иванова Мария Петровна" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email" class="h4">Email для связи: <a style="color:red;">*</a></label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="например, alexinclud@gmail.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="h4 ">Ваше сообщение: <a style="color:red;">*</a></label>
                            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Здравствуйте, " required></textarea>
                        </div>
                        <button type="submit" id="form-submit" class="btn btn-success btn-lx pull-right ">Отправить</button>
                        </form>

                        <?php 
                          require 'phpmailer/PHPMailerAutoload.php';
                          $mail = new PHPMailer;
                          $mail->isSMTP();
                          //Данные для подключения к smtp 
                          $mail->Host = 'smtp.mail.ru';
                          $mail->SMTPAuth = true;
                          $mail->Username = $config['login_post'];//Логин от вышей почты
                          $mail->Password = $config['password_post']; //Пароль от вышей почты
                          $mail->SMTPSecure = 'ssl';
                          $mail->Port = '465';
                          //Заголовочная инфа (от кого и т.д)
                          $mail->CharSet = 'UTF-8';
                          $mail->From = $_POST['email'];
                          $mail->FromName = $_POST['name'];
                          //Инфа кому будет отправлено письмо
                          $mail->AddAddress($config['login_post'], $config['name']);//1-адрес кому будет отправлено письмо, 2-имя(не обязательно)
                          $mail->isHTML(true);//В формате txt или html
                          //Параметры письма (тема, текст)
                          $mail->Subject = 'Письмо с сайта ' . $config['name'];
                          $mail->Body = $_POST['message'];
                          $mail->AltBody = 'Альтернативный текст письма' . $_POST['message'];//Альтернативный показ письма. НУжно для того если текст письма не показаля в html то покажется в txt
                          if( $mail->send() ){
                            echo '<b style="color:green;">Письмо отправлено!</b>';
                          }else{
                            echo '<b style="color:red;"></b>';
                          }

                          ?>



                            <br/><br/><br/>
                          <div>Наши контакты:</div>
                          <div>Телефон: <?php echo $cont['mobile_phone'];?></div>
                          <div>Почта: <?php echo $cont['email'];?></div>
                          <div>Адресс: <?php echo $cont['adress'];?></div>
                          <div>Соц сеть: <a href="<?php echo $cont['ok_url']; ?>" target="_balank">ok</a>, <a href="<?php echo $cont['vk_url']; ?>" target="_balank">vk</a></div>



                            
                          
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



<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <!-- Блок footer-->
<?php require"../includes/footer.php";?>

