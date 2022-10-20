<?

require_once("./include/db.php");

$year = $_GET['year'];
$year_arr = [];

$events_query = mysqli_query($connection, "SELECT * FROM `events` WHERE `year` = '$year'");

$events_year_query = mysqli_query($connection, "SELECT `year` FROM `events`");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  content="Омская Федерация Функционального Многоборья. Соревнования, проводящиеся под эгидой федерации">
    <meta name="keywords" conten="функциональное, многобье, ffm, ффм, федерация, календарь, соревнования">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Омская Федерация Функционального Многоборья - Календарь соревнований</title>

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
</head>
<body>

<div class="wrapper">
    <?php require_once("./include/header.php");?>

    <div class="main">
        <div class="calendar-wrapper">
            <h1 class="title">Календарь соревнований</h1>

            <div class="years">
                <?
                    $i = 0;
                    while( $row = mysqli_fetch_array($events_year_query) ) {
                        $year_arr[$i] = $row['year'];
                        $i++;
                    }

                    for($i = 0; $i < count(array_unique($year_arr)); $i++) {
                        ?>
                        <a href="./calendar.php?year=<? echo $year_arr[$i]; ?>">20<? echo $year_arr[$i]; ?></a>
                        <?
                    }
                ?>
            </div>

            <div class="wrap">
                <div class="calendar-table">
                    <div class="row">
                        <div class="column">Дата</div>
                        <div class="column">Мероприятие</div>
                        <div class="column">Место</div>
                        <div class="column">Результаты</div>
                    </div>

                    <?
                        while( $event = mysqli_fetch_array($events_query) ) {
                            ?>
                            <div class="row">
                                <div class="column"><? echo $event['day'] . '.' . $event['month'] . '.' . $event['year']; ?></div>
                                <div class="column"><a href="./reader.php?type=event&id=<? echo $event['id'];?>"><? echo $event['title']; ?></a></div>
                                <div class="column"><? echo $event['palace']; ?></div>
                                <div class="column">
                                    <?
                                        if( $event['protocol'] != null ) {
                                            ?>
                                            <a href="./img/protocols/<? echo $event['protocol']; ?>" target="_blank" downloaded>Протокол</a>
                                            <?
                                        }
                                    ?>
                                </div>
                            </div>
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