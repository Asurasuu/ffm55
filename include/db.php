<?php

$data = array(
	"server" => "localhost",
	"db" => "cu52444_ffm", // cn23945_ffm для тестового контура
	"user" => "cu52444_ffm", // cu52444_ffm у дб такое же значения
	"password" => "GodAsura535635"
);

$connection = mysqli_connect($data['server'], $data['user'], $data['password'], $data['db']);

if( !$connection ) {
	die("Ошибка подключения: " . mysqli_connect_error());
}

session_start();