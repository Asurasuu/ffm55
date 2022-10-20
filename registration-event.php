<?
require_once("./include/db.php");

if( empty($_GET['event']) ) {header("Location: /");}

$event_q = mysqli_query($connection, "SELECT * FROM `events` WHERE `id` = " . $_GET['event']);
if ( mysqli_num_rows($event_q) <= 0 ) {header("Location: /");}
$event = mysqli_fetch_array($event_q);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  content="Омская Федерация Функционального Многоборья. Основная информация">
    <meta name="keywords" conten="функциональное, многобье, ffm, ффм, федерация">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Омская Федерация Функционального Многоборья - Регистрация на <? echo $event['title'];?></title>

    <link href="img/default/FFM_logo.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="css/la.min.css">

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(87328901, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/87328901" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BH71453616"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-BH71453616');
    </script>

    <style>
        .wrapper .form-event {
            /*border: 1px solid red;*/
            width: 100%;
            max-width: 600px;
        }

        .wrapper .form-event .t h1{
            font-size: 24px;
            padding-bottom: 10px;
        }

        .wrapper .form-event .block-e {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .wrapper .form-event .block-e h2 {
            margin-bottom: 10px;
        }

        .wrapper .form-event .block-e p {
            font-size: 18px;
            padding: 5px 0;
        }

        .wrapper .form-event .block-e p a {
            color: #5e5e5e;
            transition: 0.3s ease all;
            outline: none;
            text-decoration: none;
            font-size: 14px;
        }

        .wrapper .form-event .block-e p a:hover {
            color: #e08a19;
        }

        .wrapper .form-event .block-e p input {
            border: none;
            border-bottom: 1px solid #5e5e5e;
            padding: 10px;
            font-size: 16px;
            outline: none;
        }

        .wrapper .form-event .block-e p input:focus {
            border-bottom: 1px solid #e08a19;
        }

        .wrapper .form-event .block-e p input[type="submit"] {
            background-color: #e08a19;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            color: #ffffff;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <form action="./scripts/registration-event.php" method="post" class="form-event">
        <div class="block-e t">
            <h1>Регистрация на <?php echo $event['title'];?></h1>
            <p><a href="./reader.php?type=event&id=<? echo $event['id'];?>" class="link">Вернуться назад</a></p>
        </div>

        <input type="hidden" name="id-event" value="<?php echo $event['id'];?>">

        <div class="block-e">
            <h2>ФИО участника</h2>
            <p><input type="text" name="fullname" placeholder="Мой ответ" required></p>
        </div>

        <div class="block-e">
            <h2>Номер телефона</h2>
            <p><input type="text" name="phone" placeholder="Мой ответ" required></p>
        </div>

        <div class="block-e">
            <h2>Категория участия</h2>
            <p><input type="radio" name="category" value="14-15" required> 14-15</p>
            <p><input type="radio" name="category" value="16-17" required> 16-17</p>
            <p><input type="radio" name="category" value="18-20" required> 18-20</p>
            <p><input type="radio" name="category" value="21-39" required> 21-39</p>
            <p><input type="radio" name="category" value="мастера 40+" required> мастера 40+</p>
            <p><input type="radio" name="category" value="scaled" required> scaled</p>
        </div>

        <div class="block-e">
            <h2>Регистрация с футболкой</h2>
            <p><input type="radio" name="shirt" value="S"> S</p>
            <p><input type="radio" name="shirt" value="M"> M</p>
            <p><input type="radio" name="shirt" value="L"> L</p>
            <p><input type="radio" name="shirt" value="XL"> XL</p>
            <p>Другое: <input type="text" name="shirt-a"></p> <!-- Другой ответ, не учитывается, если был выбрал радиобаттон -->
        </div>

        <div class="block-e">
            <h2>Название клуба, в котором занимаетесь</h2>
            <p><input type="text" name="club" placeholder="Мой ответ"></p>
        </div>

        <!-- Тут должно быть поле с реквизитами для оплаты, но что-то пошло не так -->

        <div class="block-e">
            <p><input type="submit" name="registration-on-event" value="Зарегистрироваться"></p>
        </div>

    </form>
</div>

</body>
</html>