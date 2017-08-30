<?php
  require "../includes/config.php";
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Таблица размеров обуви</title>
 </head>
 <body>


 	<?php 

		require 'headeradmin.php';

	?>







	<form method="POST" style="padding-left: 200px;">
	   <p>Форма для добавления статьи</p>
	   <input name="id" placeholder="например: 1 "><a><- это поле для id (НЕ ОБЯЗАТЕЛЬНО)</a></br>
	   <input name="title"><a><- это поле для Заголовка</a></br>
	   <input name="image1"><a><- это поле для картинки 100x100</a></br>
	   <input name="image2"><a><- это поле для большой картинки в статье</a></br>
	   <input name="text" ><a><- это поле для текста статьи </a></br>
	   <input name="categories" ><a><- это поле для Категгорий (число)</a></br>
	   <input name="pubdate" ><a><- это поле для даты публикации (пример: 2017-08-23 10:23:13)</a></br>
	   <input name="views" ><a><- это поле для количества просмотров(по умолчанию 0)</a></br>
	   <input name="reading" placeholder="например: 13 минут"><a><- это поле для минут чтения статьи</a></br>

	   <p><input type="submit" name="send" value="Отправить"></p>
  </form>




  
   <?php 
   	if(isset($_POST['send'])){
   		
   		$errors = array();


   		if($_POST['title'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите заголовок статьи!</span>';
   		}

   		if($_POST['image1'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите картинку 100x100</span>';
   		}


   		if($_POST['text'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите текст статьи</span>';
   		}

   		if($_POST['categories'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите категорию статьи (цифра)</span>';
   		}

   		if($_POST['pubdate'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите дату публикации статьи</span>';
   		}


   		if($_POST['reading'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите время для прочтения статьи (например: 2 минуты)</span>';
   		}




   		if(empty($errors)){

   			mysqli_query($connect, "INSERT INTO `articles` (`id`, `title`, `image`, `image_article`, `text`, `categorie_id`, `pubdate`, `views`, `reading`) VALUES ('".$_POST['id']."', '".$_POST['title']."', '".$_POST['image1']."', '".$_POST['image2']."', '".$_POST['text']."', '".$_POST['categories']."', '".$_POST['pubdate']."', '".$_POST['views']."', '".$_POST['reading']."') ");

   			echo '<span style="color:green; font-size: 20px; font-weight: bold;">Статья добавлена на сайт!</span>' . '</br>';


   		}else{
   			echo $errors['0'];
   		}

   		

   	}

   ?>

   <p style="color:red; font-size: 20px;">Подсказки:</p>

   <?php 
   $art_cat = mysqli_query($connect, "SELECT * FROM `articles_categories`");


   while($caters = mysqli_fetch_assoc($art_cat)){

   	?>
   

   <div>Категории: <?php echo $caters['id'];?> - <?php echo $caters['title'];?></div>


	<?php
   }
   ?><hr></br></br></br>




<!--*******************************УДАЛЕНИЕ СТАТЬИ**************************************-->

   <!--DELETE FROM `articles` WHERE `id` = 2
   DELETE FROM `articles` WHERE `title` = "Как правильно выговорить букву 'р'"-->


   <form method="POST" style="padding-left: 200px;">
	   <p>Форма Удаления статей</p>
	   1)<input name="title_delete"><a><- это поле для Заголовка статьи</a></br>
	   </a></br>

	   <p><input type="submit" name="delete" value="Удалить"></p>
  </form>

  <?php 

  $title_delete_bd = $art['title'];

  $title_delete = $_POST['title_delete'];

  if(isset($_POST['delete'])){

  	$errors_delete = array();

  	if($POST['title_delete'] = ''){
  		$errors_delete[] = '<span style=" color:red; font-size:20px;">Введите заголовок статьи для удалеия это статьи!</span>';
  	}

  	if(empty($errors_delete)){
  		


  		if($title_delete_bd == $title_delete){
  			echo '<span style="color:red; font-size: 20px; padding-left: 200px; font-weight: bold;">Такой статьи нет</span>';

  		}else{
  			mysqli_query($connect, "DELETE FROM `articles` WHERE `title` = '$title_delete'");
  			echo '<span style="color:green; font-size: 20px; padding-left: 200px; font-weight: bold;">Статья успешно удалена!</span>';
  		}

  	}
  }
  ?>

  <p style="color:red; font-size: 20px;">Подсказки:</p>
   

   <div>В поле 1 нужно указать название статья которую собираешься удалить!</div>

	<hr></br></br></br>





	 <form method="POST" style="padding-left: 200px;">
	   <p>Форма Удаления Категорий</p>
	   2)<input name="category_delete"><a><- это поле для Заголовка категории</a></br>
	   </a></br>

	   <p><input type="submit" name="delete_category" value="Удалить"></p>
  </form>

  <?php 

  $category_delete_bd = $cate['title'];

  $ctategory_delete = $_POST['category_delete'];

  if(isset($_POST['delete_category'])){

  	$errors_delete_cate = array();

  	
  	if($POST['category_delete'] = ''){
  		$errors_delete_cate[] = '<span style=" color:red; font-size:20px;">Введите заголовок статьи для удалеия это статьи!</span>';
  	}

  	if(empty($errors_delete_cate)){
  		


  		if($category_delete_bd == $ctategory_delete){
  			echo '<span style="color:red; font-size: 20px; padding-left: 200px; font-weight: bold;">Такой статьи нет</span>';

  		}else{
  			mysqli_query($connect, "DELETE FROM `articles_categories` WHERE `title` = '$ctategory_delete'");
  			echo '<span style="color:green; font-size: 20px; padding-left: 200px; font-weight: bold;">Статья успешно удалена!</span>';
  		}

  	}
  }
  ?>

  <p style="color:red; font-size: 20px;">Подсказки:</p>
   

   <div>В поле 2 нужно указать название категории которую собираешься удалить!</div>

   <?php 
   $art_cat = mysqli_query($connect, "SELECT * FROM `articles_categories`");


   while($caters = mysqli_fetch_assoc($art_cat)){

   	?>
   

   <div>Категории: <?php echo $caters['id'];?> - <?php echo $caters['title'];?></div>


	<?php
   }
   ?>

	<hr></br></br></br>






	<form method="POST" style="padding-left: 200px;">
	   <p>Форма Добавления Категорий</p>
	   3)<input name="category_add"><a><- это поле для Заголовка категории</a></br>
	   </a></br>

	   <p><input type="submit" name="add_category" value="Добавить"></p>
  </form>

  <?php 
  	if(isset($_POST['add_category'])){
  		$add_errors = array();

  		if($_POST['category_add'] == ''){
  			$add_errors[] = '<span style=" color:red; font-size:20px;">Введите имя категории которую хотите добавить</span>';
  		}else{
  			mysqli_query($connect, "INSERT INTO `articles_categories` (`title`) VALUES ('".$_POST['category_add']."')");
  			echo '<span style="color:green; font-size: 20px; font-weight: bold;">Категория добавлена на сайт!</span>' . '</br>';
  		}

  	

  		
  	}
  ?>

  <p style="color:red; font-size: 20px;">Подсказки:</p>
   

   <div>В поле 3 нужно указать название категории которую собираешься добавить!</div>


	<hr></br></br></br>










	<!--<?php/*
   	$articles = mysqli_query($connect, "SELECT * FROM `articles`");


   	while($art = mysqli_fetch_assoc($articles)){

   		$bd_id = $art['id'];
   		$bd_title = $art['title'];
   		$bd_image1 = $art['image'];
   		$bd_image2 = $art['image_article'];
   		$bd_text = $art['text'];
   		$bd_categorie_id = $art['categorie_id'];
   		$bd_pubdate = $art['pubdate'];
   		$bd_views = $art['views'];
   		$bd_reading = $art['reading'];



   	?>


	<form method="POST" style="padding-left: 200px; ">
	   <p>ФОрма для редактирования статей №<?php echo $art['id'];?> с темой " <?php echo $art['title'];?> "</p>
	   <input name="id" value="<?php echo $art['id'];?>"><a><- это поле для id</a></br>
	   <input name="title" value="<?php echo $art['title'];?>"><a><- это поле для Заголовка</a></br>
	   <input name="image1" value="<?php echo $art['image'];?>"><a><- это поле для картинки 100x100</a></br>
	   <input name="image2" value="<?php echo $art['image_article'];?>"><a><- это поле для большой картинки в статье</a></br>
	   <input name="text" value="<?php echo $art['text'];?>"><a><- это поле для текста статьи</a></br>
	   <input name="categories" value="<?php echo $art['categorie_id'];?>"><a><- это поле для Категгорий (число)</a></br>
	   <input name="pubdate" value="<?php echo $art['pubdate'];?>"><a><- это поле для даты публикации (по умолчанию выставит текущую дату)</a></br>
	   <input name="views" value="<?php echo $art['views'];?>"><a><- это поле для количества просмотров(по умолчанию 0)</a></br>
	   <input name="reading" value="<?php echo $art['reading'];?>"><a><- это поле для минут чтения статьи</a></br>

	   <p><input type="submit" name="send" value="Отправить"></p></br>
  </form>

  	<?php
  	$post_id = $_POST['id'];
   	$post_title = $_POST['title'];
   	$post_image1 = $_POST['image1'];
   	$post_image2 = $_POST['image2'];
   	$post_text = $_POST['text'];
   	$post_categorie_id = $_POST['categories'];
   	$post_pubdate = $_POST['pubdate'];
   	$post_views = $_POST['views'];
   	$post_reading = $_POST['reading'];
  	?>




  
   <?php 
   	if(isset($_POST['send'])){
   		
   		$errors = array();

   		if($_POST['id'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите заголовок статьи!</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `id` = '$post_id' WHERE `id` = '$bd_id'");

   		}


   		if($_POST['title'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите заголовок статьи!</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `title` = '$post_title' WHERE `title` = '$bd_title'");

   		}


   		if($_POST['image1'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите картинку 100x100</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `image` = '$post_image1' WHERE `image` = '$bd_image1'");

   		}


   		if($_POST['image2'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите текст статьи</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `image_article` = '$post_image2' WHERE `image_article` = '$bd_image2'");

   		}

   		if($_POST['text'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите текст статьи</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `text` = '$post_text' WHERE `text` = '$bd_text'");

   		}


   		if($_POST['categories'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите категорию статьи (цифра)</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `categorie_id` = '$post_categories' WHERE `text` = '$bd_categories'");

   		}


   		if($_POST['pubdate'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите дату публикации статьи</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `pubdate` = '$post_pubdate' WHERE `pubdate` = '$bd_pubdate'");

   		}


   		if($_POST['reading'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите время для прочтения статьи (например: 2 минуты)</span>';
   		}else{
   			mysqli_query($connect, "UPDATE `articles` SET `reading` = '$post_reading' WHERE `reading` = '$bd_reading'");

   		}




   		/*if(empty($errors)){


   			
   			mysqli_query($connect, "UPDATE `articles` SET `id` = '$post_id' WHERE `id` = '$bd_id'");


   			echo '<span style="color:green; font-size: 20px; font-weight: bold;">Изменения добавлены</span>';


   		}else{
   			echo $errors['0'];
   		}*/

   	/*}
   ?>

   <?php
   }*/
   ?>-->
  </table>
 </body>
</html>