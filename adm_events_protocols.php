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
        $event_id = $_GET['id'];
        $events_query = mysqli_query($connection, "SELECT * FROM `events` WHERE `id` = '$event_id'");
        $event = mysqli_fetch_array($events_query);

        switch ( $_GET['type'] ) {
            case 'rules':
                $text = "положение (правила соревнования)";
                $class = "add_rules";
                $file = "add_rules.php";
                break;

            case 'protocol':
                $text = "протокол (результаты соревнования)";
                $class = "add_protocol";
                $file = "add_protocol.php";
                break;
            
            default:
                header("Location: ./adm_events.php");
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  content="Омская Федерация Функционального Многоборья. Основная информация">
    <meta name="keywords" content="функциональное, многобье, ffm, ффм, федерация">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Омская Федерация Функционального Многоборья - <? echo $event['title']; ?></title>

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

<div class="add_container">
    <h1 class="title">Изменения "<? echo $event['title']; ?>"</h1>
    <div class="links"><a href="./adm_events.php">Назад</a></div>
    <form enctype="multipart/form-data" action="./scripts/<? echo $file;?>" method="post" id="form_editor">

        <input type="text" hidden name="event_id" value="<? echo $event_id; ?>">
        
        <div>
            <p>Добавить <? echo $text; ?></p>
            <input type="file" name="file">
        </div>

        <div>
            <input type="submit" name="<? echo $class; ?>" value="Сохранить" id="save">
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/wysiwyg.js"></script>
</body>
</html>