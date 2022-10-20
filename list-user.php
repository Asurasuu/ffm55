<?

require_once("./include/db.php");

if( !isset($_GET['event']) ) { header("Location: /"); }

$event_q = mysqli_query($connection, "SELECT * FROM `events` WHERE `id` = " . $_GET['event']);
if ( mysqli_num_rows($event_q) <= 0 ) {header("Location: /");}
$event = mysqli_fetch_array($event_q);

$user_event = mysqli_query($connection, "SELECT * FROM `reg_events` WHERE  `id_event` = " . $_GET['event']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  content="Омская Федерация Функционального Многоборья. Соревнования, проводящиеся под эгидой федерации">
    <meta name="keywords" conten="функциональное, многобье, ffm, ффм, федерация, календарь, соревнования">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Омская Федерация Функционального Многоборья - <? echo $event['title'];?> - Участники</title>

    <link href="img/default/FFM_logo.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(87328901, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/87328901" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BH71453616"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-BH71453616');
    </script>

    <style>
        .wrap {
            display: flex;
            justify-content: center;

            overflow-x: auto;
        }

        .wrap .calendar-table,
        .wrap .calendar-table .row {
            max-width: 600px;
        }

        .column:nth-child(1) {
            max-width: 80px !important;
            min-width: 80px !important;
            width: 100% !important;
        }

        .column:nth-child(2) {
            max-width: 520px !important;
            min-width: 520px !important;
            width: 100% !important;
            justify-content: start !important;
            padding: 10px !important;
        }

        @media screen and (max-width: 768px) {
            .wrap {
                display: flex;
                justify-content: start;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <?php require_once("./include/header.php");?>

    <div class="main">
        <div class="calendar-wrapper">
            <h1 class="title"><? echo $event['title'];?> - Участники</h1>

            <div class="wrap">
                <div class="calendar-table">
                    <div class="row">
                        <div class="column">№</div>
                        <div class="column">ФИО</div>
<!--                        <div class="column">Место</div>-->
<!--                        <div class="column">Результаты</div>-->
                    </div>

                    <?
                        $i = 1;
                        while($user = mysqli_fetch_array($user_event)) {
                            ?>
                            <div class="row">
                                <div class="column"><?php echo $i; ?></div>
                                <div class="column"><?php echo $user['fullname'];?></div>
                            </div>
                            <?php
                            $i++;
                        }

                    ?>

<!--                    --><?//
//                    while( $event = mysqli_fetch_array($events_query) ) {
//                        ?>
<!--                        <div class="row">-->
<!--                            <div class="column">--><?// echo $event['day'] . '.' . $event['month'] . '.' . $event['year']; ?><!--</div>-->
<!--                            <div class="column"><a href="./reader.php?type=event&id=--><?// echo $event['id'];?><!--">--><?// echo $event['title']; ?><!--</a></div>-->
<!--                            <div class="column">--><?// echo $event['palace']; ?><!--</div>-->
<!--                            <div class="column">-->
<!--                                --><?//
//                                if( $event['protocol'] != null ) {
//                                    ?>
<!--                                    <a href="./img/protocols/--><?// echo $event['protocol']; ?><!--" target="_blank" downloaded>Протокол</a>-->
<!--                                    --><?//
//                                }
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                        --><?//
//                    }
//                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("./include/footer.php");?>
</body>
</html>