<?php 

require 'headeradmin.php';

require '../includes/config.php';

?>



<form method="POST" style="padding-left: 200px;">
	   <p>Форма для добавления 'Портфолио'</p>
	   <input name="id_portfolio" placeholder="например: 1 "><a><- это поле для id (НЕ ОБЯЗАТЕЛЬНО)</a></br>
	   <input name="title_portfolio"><a><- это поле для Заголовка</a></br>
	   <input name="text_portfolio"><a><- это поле для текста</a></br>
	   <input name="img_portfolio"><a><- это поле для картинки в статье 'обо мне'</a></br>
	   <input name="pubdate_portfolio" ><a><- это поле для даты публикации (пример: 2017-08-23 10:23:13) </a></br>
	   <input name="views_portfolio" ><a><- это поле для просмотров (НЕ ОБЯЗАТЕЛЬНО)</a></br>
	   <input name="reading_portfolio" placeholder="например: 3 минуты "><a><- это поле для минут чтения статья</a></br></a></br>

	   <p><input type="submit" name="send_portfolio" value="Отправить"></p>
  </form>




  
   <?php 
   	if(isset($_POST['send_portfolio'])){
   		
   		$errors_portfolio = array();


   		if($_POST['text_portfolio'] == ''){
   			$errors_portfolio[] = '<span style=" color:red; font-size:20px;">Введите текст о себе</span>';
   		}

   		if($_POST['img_portfolio'] == ''){
   			$errors_portfolio[] = '<span style=" color:red; font-size:20px;">Введите картинку!</span>';
   		}


   		if($_POST['pubdate_portfolio'] == ''){
   			$errors_portfolio[] = '<span style=" color:red; font-size:20px;">ВведитеДату публикации (пример: 2017-08-23 10:23:13)</span>';
   		}



   		if($_POST['reading_portfolio'] == ''){
   			$errors_portfolio[] = '<span style=" color:red; font-size:20px;">Введите время рекомендуемое время для прочтения статьи!</span>';
   		}



   		if(empty($errors_portfolio)){

   			$id_about_me = $_POST['id_about_me'];
   			$title_portfolio = $_POST['title_portfolio'];
   			$text_portfolio = $_POST['text_portfolio'];
   			$img_portfolio = $_POST['img_portfolio'];
   			$pubdate_portfolio = $_POST['pubdate_portfolio'];
   			$views_portfolio = $_POST['views_portfolio'];
   			$reading_portfolio = $_POST['reading_portfolio'];

   			mysqli_query($connect, "INSERT INTO `portfolio` (`id`, `title`, `text`, `img`, `pubdate`, `views`, `reading`) VALUES ('$id_about_me', '$title_portfolio', '$text_portfolio', '$img_portfolio', '$pubdate_portfolio', '$views_portfolio', '$reading_portfolio')");



   			echo '<span style="color:green; font-size: 20px; font-weight: bold;">Портфолио добавлено на сайт!</span>' . '</br>';


   		}else{
   			echo $errors_portfolio['0'];
   		}

   		

   	}

   ?>

<?php 
	$portfolio = mysqli_query($connect, "SELECT * FROM `portfolio`");

	while($port = mysqli_fetch_assoc($portfolio)){
		?>


   <form method="POST" style="padding-left: 200px;">
	   <p>Форма Удаления портфолио</p>
	   1)<input name="title_portfolio" value="<?php echo $port['title'];?>"><a><- это поле для Заголовка статьи (Заголовок уже введён!)</a></br>
	   </a></br>

	   <p><input type="submit" name="delete_portfolio" value="Удалить"></p>
  </form>

  <?php 

  $title_portfolio_bd = $port['title'];

  $title_portfolio = $_POST['title_portfolio'];

  if(isset($_POST['delete_portfolio'])){

  	

			mysqli_query($connect, "DELETE FROM `portfolio` WHERE `title` = '$title_portfolio'");
  			echo '<span style="color:green; font-size: 20px; padding-left: 200px; font-weight: bold;">Статья успешно удалена!</span>';

  }
  ?>

  	<?php
	}
?>
