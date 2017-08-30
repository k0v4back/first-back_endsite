<?php
  require "includes/config.php";
  
  
  $password = mysqli_query($connect, "SELECT * FROM `admin`");
  
  while($pas = mysqli_fetch_assoc($password)){

  if($_COOKIE['password'] == $pas['password'] AND $_COOKIE['login'] == $pas['login']){
  

  	require 'admin/headeradmin.php';


  }else{
  	header("Location: /admin.php");
  }
  }
  

?>



	<form method="POST" style="padding-left: 200px;">
	   <p>Форма изменения пароля для доступа в админку</p>
	   <input name="login" ><a><- это поле для нового логина</a></br>
	    <input name="password" ><a><- это поле для нового пароля (после изменения пароль вас перебросит на страницу ввода пароля)</a></br>
	   <p><input type="submit" name="send" value="Отправить"></p>
  </form>




  
   <?php 
   	if(isset($_POST['send'])){
   		
   		$errors = array();


   		if($_POST['password'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите пароль</span>';
   		}
		
		if($_POST['login'] == ''){
   			$errors[] = '<span style=" color:red; font-size:20px;">Введите логин</span>';
   		}

   		
   		if(empty($errors)){
			
			$password = md5($_POST['password']);
			$login = $_POST['login'];
			
			mysqli_query($connect, "UPDATE `admin` SET `password` = '$password', `login` = '$login' WHERE `id` > '1'");

   			echo '<span style="color:green; font-size: 20px; font-weight: bold;">Пароль и логин изменены</span>' . '</br>';
			
			

   		}else{
   			echo $errors['0'];
   		}

   		

   	}

   ?>
   

   

 