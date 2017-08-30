<?php 

require 'headeradmin.php';

require "../includes/config.php";

?>

<p style="padding-top: 50px; padding-left: 200px;"></p>

<?php 
	$contacts = mysqli_query($connect, "SELECT * FROM `contacts`");

	while ($cont = mysqli_fetch_assoc($contacts)){
		?>

		Мобильный телефон: <?php echo $cont['mobile_phone'];?> <- это текущий телефон
		<form method="POST">
			1.<input name="phone_number" placeholder="введите новый номер">
			<p><input type="submit" name="send" value="Применить"></p></br>
		</form>

		<?php 

			$mobile_phone = $_POST['phone_number'];
			$mobile_phone_bd = $cont['mobile_phone'];

			if(isset($_POST['send'])){
				$errors_mobile = array();

				if($_POST['phone_number'] == ''){
					$errors_mobile[] = '<span style=" color:red; font-size:20px;">Введите новый номер телефона</span>';
					echo $errors_mobile[0];
				}else{
					mysqli_query($connect, "UPDATE `contacts` SET `mobile_phone` = '$mobile_phone' WHERE `mobile_phone` = '$mobile_phone_bd'");

				}
			}
		?>
		<br><br>


		email: <?php echo $cont['email'];?> <- это текущий email
		<form method="POST">
			2.<input name="email" placeholder="введите новый email">
			<p><input type="submit" name="send_email" value="Применить"></p></br>
		</form>

		<?php 

			$email_post = $_POST['email'];
			$email_bd = $cont['email'];

			if(isset($_POST['send_email'])){
				$errors_email = array();

				if($_POST['email'] == ''){
					$errors_email[] = '<span style=" color:red; font-size:20px;">Введите новый email</span>';
					echo $errors_email[0];
				}else{
					mysqli_query($connect, "UPDATE `contacts` SET `email` = '$email_post' WHERE `email` = '$email_bd'");

					echo '<span style="color:green; font-size: 20px; font-weight: bold;">Изменения добавлены</span>';
					
				}
			}
		?>



		<br><br>


		Адрес: <?php echo $cont['adress'];?> <- это текущий адрес
		<form method="POST">
			3.<input name="adress" placeholder="введите новый адрес">
			<p><input type="submit" name="send_adress" value="Применить"></p></br>
		</form>

		<?php 

			$adress_post = $_POST['adress'];
			$adress_bd = $cont['adress'];

			if(isset($_POST['adress'])){
				$errors_adress = array();

				if($_POST['adress'] == ''){
					$errors_adress[] = '<span style=" color:red; font-size:20px;">Введите новый email</span>';
					echo $errors_adress[0];
				}else{
					mysqli_query($connect, "UPDATE `contacts` SET `adress` = '$adress_post' WHERE `adress` = '$adress_bd'");

					echo '<span style="color:green; font-size: 20px; font-weight: bold;">Изменения добавлены</span>';
					
				}
			}
		?>


	<?php
	}
?>