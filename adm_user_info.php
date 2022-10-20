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
        $person_id = $_GET['id'];
        $person_query = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$person_id'");
        $person = mysqli_fetch_array($person_query);
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
    <title>Омская Федерация Функционального Многоборья - Данные пользователя</title>

    <link href="img/default/FFM_logo.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="css/style.min.css">
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

<div class="wrapper">
    <? require_once("./include/adm_header.php"); ?>

    <div class="main">
        <div class="block bm min-block">
            <div class="container">
                <h2 class="title">Личный кабинет пользователя</h2>
                <h3 class="sub-title">Вы зашли как администратор</h3>
                <div class="block-content user">
                    <div class="information">
                        <p><span>Имя: </span> <? echo $person['name']; ?></p>
                        <p><span>Фамилия: </span> <? echo $person['surname']; ?></p>
                        <p><span>Отчество: </span> <? echo $person['lastname']; ?></p>
                        <p><span>E-mail: </span> <? echo $person['email']; ?></p>
                    </div>

                    <h3 class="down-title">Заявлен</h3>

                    <div class="bid">
                        <a href="#">Первенство Омской области по функциональному мнооборью</a>
                        <a href="#">Первенство Омской области по функциональному мнооборью</a>
                        <a href="#">Первенство Омской области по функциональному мнооборью</a>
                        <a href="#">Первенство Омской области по функциональному мнооборью</a>
                        <a href="#">Первенство Омской области по функциональному мнооборью</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>