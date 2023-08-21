<?php

$data = array(
	"server" => "localhost",
	"db" => "",
	"user" => "",
	"password" => ""
);

$connection = mysqli_connect($data['server'], $data['user'], $data['password'], $data['db']);

if( !$connection ) {
	die("Ошибка подключения: " . mysqli_connect_error());
}

session_start();
