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
        $news_query = mysqli_query($connection, "SELECT * FROM `news`");
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
        <h1 class="content_title">Новости</h1>
        <div class="news block">
            <div class="content_button">
                <a href="./adm_news_add.php">Добавить новость</a>
            </div>
            <div class="content_table">
                <div class="row">
                    <div class="date main-cell">Дата</div>
                    <div class="title main-cell">Название</div>
                    <div class="edit main-cell">Изменить</div>
                    <div class="delete main-cell">Удалить</div>
                </div>

                <?
                    while( $new = mysqli_fetch_array($news_query) ) {
                        ?>
                        <div class="row">
                            <div class="date cell cell-center"><? echo $new['day'] . '.' . $new['month'] . '.' . $new['year']; ?></div>
                            <div class="title cell cell-center"><a href="./reader.php?type=new&id=<? echo $new['id']; ?>"><? echo $new['title']; ?></a></div>
                            <div class="edit cell cell-center"><!-- <a href="#">Изменить</a> --></div>
                            <div class="delete cell cell-center"><a href="./scripts/delete_new.php?id=<? echo $new['id'];?> ">Удалить</a></div>
                        </div>
                        <?
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>