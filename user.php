<?
require_once("./include/db.php");

if( $_SESSION['id'] == "" ) {
    header("Location: ./login.php");
} else {
    $user_id = $_SESSION['id'];
    $user_query = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$user_id'");
    $user = mysqli_fetch_array($user_query);

    $cols_query = mysqli_query($connection, "SELECT * FROM `cols` WHERE `user_id` = '$user_id'");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  content="Омская Федерация Функционального Многоборья. Основная информация">
    <meta name="keywords" conten="функциональное, многобье, ffm, ффм, федерация">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Омская Федерация Функционального Многоборья - Данные пользователя</title>

    <link href="img/default/FFM_logo.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(87328901, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/87328901" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BH71453616"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-BH71453616');
    </script>
</head>
<body>

<div class="wrapper">
    <?php require_once("./include/header.php");?>

    <div class="main">
        <div class="block">
            <div class="container">
                <h2 class="title">Личный кабинет</h2>
                <div class="block-content user">
                    <div class="information">
                        <p><span>Имя: </span> <? echo $user['name']; ?></p>
                        <p><span>Фамилия: </span> <? echo $user['surname']; ?></p>
                        <p><span>Отчество: </span> <? echo $user['lastname']; ?></p>
                        <p><span>E-mail: </span> <? echo $user['email']; ?></p>
                    </div>

                    <h3 class="down-title">Ваши заявки</h3>

                    <div class="bid">
                        <?
                            while( $col = mysqli_fetch_array($cols_query) ) {
                                $event_id = $col['event_id'];
                                $events_query = mysqli_query($connection, "SELECT * FROM `events` WHERE `id` = '$event_id'");
                                $event = mysqli_fetch_array($events_query);
                                ?>
                                <a href="./reader.php?type=event&id=<? echo $event_id; ?>"><? echo $event['title']; ?></a>
                                <?
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once("./include/footer.php");?>
</body>
</html>