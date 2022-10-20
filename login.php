<?
require_once("./include/db.php");

if( $_SESSION['id'] != "" ) {
    header("Location: ./");
}

if( isset($_GET['event']) and $_GET['event'] != '' ) {
    $_SESSION['event'] = $_GET['event'];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  content="Омская Федерация Функционального Многоборья. Авторизация">
    <meta name="keywords" conten="функциональное, многобье, ffm, ффм, федерация">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Омская Федерация Функционального Многоборья - Авторизация</title>

    <link href="img/default/FFM_logo.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="css/la.min.css">

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(87328901, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/87328901" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
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
        <form action="./scripts/auth.php" method="post" class="form">
            <h3>Авторизация</h3>

            <div class="form-row">
                <input type="email" id="email" required autocomplete="on" name="email">
                <label for="email">E-mail</label>
            </div>

            <div class="form-row">
                <input type="password" id="password-one" required autocomplete="on" name="password">
                <label for="password-one">Введите пароль</label>
            </div>

            <div class="form-row-adm">
                <input type="submit" value="Войти" name="auth">
            </div>

            <div class="form-row-adm">
                <a href="/">На главную</a>
                <a href="./registration.php">Зарегистрироваться</a>
            </div>
        </form>
    </div>

</body>
</html>