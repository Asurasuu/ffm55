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
    <title>Омская Федерация Функционального Многоборья - Добавление фотографий</title>

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
    <h1 class="title">Добавить альбом</h1>
    <div class="links"><a href="./adm_fotos.php">Назад</a></div>
    <form enctype="multipart/form-data" action="./scripts/add_fotos.php" method="post" id="form_editor">
        <div>
            <input type="text" name="title" placeholder="Название">
        </div>

        <div>
            <p>Добавить обложку</p>
            <input type="file" name="cover">
        </div>

        <div>
            <input type="text" name="link" placeholder="Ссылка на альбом">
        </div>

        <div>
            <input type="submit" value="Сохранить" id="save" name="add_fotos">
        </div>
    </form>
</div>

</body>
</html>