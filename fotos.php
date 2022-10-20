<?
require_once("./include/db.php");

$fotos_query = mysqli_query($connection, "SELECT * FROM `fotos` ORDER BY id");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  content="Омская Федерация Функционального Многоборья. Фотогалерея. Снимки со всех соревнований">
    <meta name="keywords" conten="функциональное, многобье, ffm, ффм, федерация">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Омская Федерация Функционального Многоборья - Фотогалерея</title>

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
        <div class="block">
            <div class="container">
                <h2 class="title">Фотогалерея</h2>
                <div class="block-content fotos">
                    <?
                        while( $foto = mysqli_fetch_array($fotos_query) ) {
                            ?>
                            <div class="image">
                                <img src="img/covers/fotos/<?php echo $foto['cover'];?>" alt="Картинка сборки">
                                <div class="information">
                                    <span class="date"><? echo $foto['day'] . '.' . $foto['month'] . '.' . $foto['year']; ?></span>
                                    <h3 class="image-title"><? echo $foto['title']; ?></h3>
                                    <a href="<? echo $foto['link']; ?>" class="link">Смотреть</a>
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