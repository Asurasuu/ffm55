<?php

$data = array(
	"server" => "localhost",
	"db" => "cu52444_ffm",
	"user" => "cu52444_ffm",
	"password" => "GodAsura535635"
);

$connection = mysqli_connect($data['server'], $data['user'], $data['password'], $data['db']);

if( !$connection ) {
	die("Ошибка подключения: " . mysqli_connect_error());
}

session_start();