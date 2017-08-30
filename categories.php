<?php 
  require "includes/header.php";
?>


<?php
//Файл для вывода категорий шапки



//Вытаскиваем заголовки для шапки
$headers = mysqli_query($connect, "SELECT * FROM `header`");

while ($hea = mysqli_fetch_assoc($headers)) {
	
}




?>









  <!-- Блок footer-->
<?php require"/includes/footer.php";?>