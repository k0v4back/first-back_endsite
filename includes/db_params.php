<?php


$connect = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db']['password'],
	$config['db']['tablename']
);

if($connect){
	mysqli_set_charset($connect, 'utf8');
}



if($connect == false){
	echo 'Соединение не установлено!';
	echo mysqli_connect_error();
	die();
}
