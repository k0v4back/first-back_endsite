<?php 

require 'headeradmin.php';

require '../includes/config.php';

?>


<form method="POST" style="padding-left: 200px;">
	   <p>Форма для добавления инфомации обо мне</p>
	   <input name="id_about_me" placeholder="например: 1 "><a><- это поле для id (НЕ ОБЯЗАТЕЛЬНО)</a></br>
	   <input name="title_about_me"><a><- это поле для Заголовка</a></br>
	   <input name="text_about_me"><a><- это поле для текста</a></br>
	   <input name="img_about_me"><a><- это поле для картинки в статье 'обо мне'</a></br>
	   <input name="pubdate_about_me" ><a><- это поле для даты публикации (пример: 2017-08-23 10:23:13) </a></br>
	   <input name="views_about_me" ><a><- это поле для просмотров (НЕ ОБЯЗАТЕЛЬНО)</a></br>
	   <input name="reading_about_me" placeholder="например: 3 минуты "><a><- это поле для минут чтения статья</a></br></a></br>

	   <p><input type="submit" name="send_about_me" value="Отправить"></p>
  </form>




  
   <?php 
   	if(isset($_POST['send_about_me'])){
   		
   		$errors_about_me = array();


   		if($_POST['text_about_me'] == ''){
   			$errors_about_me[] = '<span style=" color:red; font-size:20px;">Введите текст о себе</span>';
   		}

   		if($_POST['img_about_me'] == ''){
   			$errors_about_me[] = '<span style=" color:red; font-size:20px;">Введите картинку!</span>';
   		}


   		if($_POST['pubdate_about_me'] == ''){
   			$errors_about_me[] = '<span style=" color:red; font-size:20px;">ВведитеДату публикации (пример: 2017-08-23 10:23:13)</span>';
   		}



   		if($_POST['reading_about_me'] == ''){
   			$errors_about_me[] = '<span style=" color:red; font-size:20px;">Введите время рекомендуемое время для прочтения статьи!</span>';
   		}



   		if(empty($errors_about_me)){

   			$id_about_me = $_POST['id_about_me'];
   			$title_about_me = $_POST['title_about_me'];
   			$text_about_me = $_POST['text_about_me'];
   			$img_about_me = $_POST['img_about_me'];
   			$pubdate_about_me = $_POST['pubdate_about_me'];
   			$views_about_me = $_POST['views_about_me'];
   			$reading_about_me = $_POST['reading_about_me'];

   			mysqli_query($connect, "INSERT INTO `about_me` (`id`, `title`, `text`, `img`, `pubdate`, `views`, `reading`) VALUES ('$id_about_me', '$title_about_me', '$text_about_me', '$img_about_me', '$pubdate_about_me', '$views_about_me', '$reading_about_me')");



   			echo '<span style="color:green; font-size: 20px; font-weight: bold;">Статья добавлена на сайт!</span>' . '</br>';


   		}else{
   			echo $errors_about_me['0'];
   		}

   		

   	}

   ?>