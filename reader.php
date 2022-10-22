<?
require_once("./include/db.php");

$id = $_GET['id'];
switch ( $_GET['type'] ) {
    case "event": // if championship event
        $art_query = mysqli_query($connection, "SELECT * FROM `events` WHERE `id` = '$id'");
        $art = mysqli_fetch_array($art_query);
        break;

    case "new": // if news article
        $art_query = mysqli_query($connection, "SELECT * FROM `news` WHERE `id` = '$id'");
        $art = mysqli_fetch_array($art_query);
        break;
}

$user_id = $_SESSION['id'];
$cols = true;
$qq = mysqli_query($connection, "SELECT * FROM `cols` WHERE `user_id` = $user_id AND `event_id` = '$id'");
if( mysqli_num_rows($qq) != 0 ) {
    $cols = false;
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
    <title>Омская Федерация Функционального Многоборья - <? echo $art['title'];?></title>

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
        <div class="reader">
            <div class="date"><? echo $art['day'] . '.' . $art['month'] . '.' . $art['year']; ?></div>

            <h1 class="title"><? echo $art['title'];?></h1>

            <div class="cover">
                <?
                if( $art['cover'] != null or $art['cover'] != "") {
                    switch ( $_GET['type'] ) {
                        case "event":
                            ?>
                            <img src="img/covers/events/<? echo $art['cover'];?>" alt="Cover of articles">
                            <?
                            break;

                        case "new":
                           ?>
                           <img src="img/covers/news/<? echo $art['cover'];?>" alt="Cover of articles">
                           <?
                            break;
                    }
                }
                ?>
            </div>

            <?
                if( $_GET['type'] == 'event' && $art['rules'] != null ) {
                    ?>
                    <h3 style="text-align: center; text-transform: uppercase;"><a href="./img/protocols/<?php echo $art['rules']; ?>" target="_blank" downloaded style="color: orange; text-decoration: none;">>> Положение соревнований <<</a></h3>
                    <?
                }
            ?>

            <div class="text">
                <p>
                    <a href="./registration-event.php?event=<?php echo $art['id']; ?>"
                       style="
                         padding: 20px 0;
                         display:block;
                         text-align: center;
                         font-size: 24px;
                       "
                    >Зарегистрироваться на старт</a>
                </p>
<!--                <p>-->
<!--                    --><?//
//                        if( $_GET['type'] == 'event' ) {
//                            if( $_SESSION['id'] != "" && $cols == true ) {
//                                ?>
<!--                                <a href="./scripts/add_cols.php?user=--><?// echo $_SESSION['id'];?><!--&event=--><?// echo $id;?><!--">Оставить заявку</a>-->
<!--                                --><?//
//                            } else if( $_SESSION['id'] == "" ) {
//                                ?>
<!--                                Вы не можете предварительно зарегестрироваться, так как вы не <a href="./login.php?event=--><?// echo $id;?><!--">авторизованы</a>-->
<!--                                --><?//
//                            } else {
//                                ?>
<!--                                Вы уже оставили заявку. Свои заявки вы можете посмотреть в <a href="./user.php">профиле</a>-->
<!--                                --><?//
//                            }
//                        }
//                    ?>
<!--                </p>  -->

                <? echo $art['text'];?>

                <p>
                    <a href="/list-user.php?event=<?php echo $art['id'];?>">Посмотреть список участников</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php require_once("./include/footer.php");?>
</body>
</html>