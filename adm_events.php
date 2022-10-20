<?
require_once("./include/db.php");
if( $_SESSION['id'] == "" ) {
    header("Location: ./registration.php");
} else {
    $user_id = $_SESSION['id'];
    $user_query = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$user_id'");
    $user = mysqli_fetch_array($user_query);

    if( $user['status'] != 10 ) {
        header("Location: ./user.php");
    } else {
        $events_query = mysqli_query($connection, "SELECT * FROM `events`");
    }
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
    <title>Омская Федерация Функционального Многоборья - Обзор новостей</title>

    <link href="img/default/FFM_logo.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="css/admin_style.min.css">

    <style>
        #edit {
            display: flex;
            flex-wrap: wrap;
        }
    </style>

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(87328901, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/87328901" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BH71453616"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-BH71453616');
    </script>
</head>
<body>
    <? require_once("./include/adm_header.php"); ?>

    <div class="content_wrapper">
        <h1 class="content_title">Соревнования</h1>
        <div class="user block">
            <div class="content_button">
                <a href="./adm_events_add.php">Добавить соревнование</a>
            </div>
            <div class="content_table">
                <div class="row">
                    <div class="date main-cell">Дата проведения</div>
                    <div class="title main-cell">Название</div>
                    <div class="edit main-cell">Добавить</div>
                    <div class="delete main-cell">Удалить</div>
                </div>
                
                <?
                    while( $event = mysqli_fetch_array($events_query) ) {
                        ?>
                        <div class="row">
                            <div class="date cell cell-center"><? echo $event['day'] . '.' . $event['month'] . '.' . $event['year']; ?></div>
                            <div class="title cell"><a href="./reader.php?type=event&id=<? echo $event['id'];?>"><? echo $event['title']; ?></a></div>
                            <div class="edit cell cell-center" id="edit">
                                <a href="./adm_events_protocols.php?type=protocol&id=<? echo $event['id'];?>">Протокол</a>
                                <a href="./adm_events_protocols.php?type=rules&id=<? echo $event['id'];?>">Положение</a>
                            </div>
                            <div class="delete cell cell-center"><a href="./scripts/delete_event.php?id=<? echo $event['id'];?>">Удалить</a></div>
                        </div>
                        <?
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>