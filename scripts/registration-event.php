<?php

require_once("../include/db.php");

if( isset($_POST['registration-on-event']) ) {

    $id_event = $_POST['id-event'];

    if( isset($_POST['fullname']) ) {
        $fullname = $_POST['fullname'];
    }

    if( isset($_POST['phone']) ) {
        $phone = $_POST['phone'];
    }

    if( isset($_POST['category']) ) {
        $category = $_POST['category'];
    }

    if( isset($_POST['shirt']) and strlen(trim($_POST['shirt-a'])) > 0) {
        $shirt = $_POST['shirt'];
    } elseif ( !isset($_POST['shirt']) and strlen(trim($_POST['shirt'])) > 0 ) {
        $shirt = trim($_POST['shirt-a']);
    } else {
        $shirt = 'Без футболки';
    }

    if( isset($_POST['club']) ) {
        $club = trim($_POST['club']);
    }

    $name_file = null;

    if($_FILES) {
        $error_array = [];
        $valid_format= ['jpg', 'jpeg', 'png', 'pdf'];
        $path = '../img/sales/';
        $name_file = md5(time() . mt_rand(0, 9999));

        // валидация формата файла
        $format = end(explode(".", $_FILES["sale"]["name"]));
        if(!in_array($format, $valid_format)){
            $error_array[] = "Формат файла не допустимый!";
        }
        // если не было ошибок
        if(empty($error_array)){
            // проверяем загружен ли файл
            if(is_uploaded_file($_FILES["sale"]["tmp_name"])){
                // сохраняем файл
                move_uploaded_file($_FILES["sale"]["tmp_name"], $path . $name_file . ".$format");
            }else{
                // Если файл не загрузился
                $error_array[] = "Ошибка загрузки!";
            }
        }
    }

    $query = mysqli_query($connection, "INSERT INTO reg_events (fullname, phone, category, shirt, club, id_event, name_file) VALUES ('$fullname', '$phone', '$category', '$shirt', '$club', '$id_event', '$name_file')");

    # В случаае успеха нужно пересылать человека на импровизированный лидерборд, но сейчас мне лень его делать
    if( $query ) { header("Location: /list-user.php?event=". $id_event); } else {
        header("Location: /reader.php?type=event&id=". $id_event);
    }

} else {
    header('Location: /');
}