<?
require_once("./include/db.php");

if( $_SESSION['id'] != "" ) {
    header("Location: ./");
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
    <title>Омская Федерация Функционального Многоборья - Регистрация</title>

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
</head>
<body>

    <div class="wrapper">
        <form action="./scripts/reg.php" method="post" class="form">
            <h3>Регистрация</h3>

            <div class="form-row">
                <input type="text" id="name" required autocomplete="on" name="name">
                <label for="name">Имя</label>
            </div>

            <div class="form-row">
                <input type="text" id="surname" required autocomplete="on" name="surname">
                <label for="surname">Фамилия</label>
            </div>

            <div class="form-row">
                <input type="text" id="lastname" required autocomplete="on" name="lastname">
                <label for="lastname">Отчество</label>
            </div>

            <div class="form-row">
                <input type="email" id="email" required autocomplete="on" name="email">
                <label for="email">E-mail</label>
            </div>

            <div class="form-row">
                <input type="password" id="password-one" required autocomplete="on" name="password-one">
                <label for="password-one">Пароль (не менее 8 символов)</label>
            </div>

            <div class="form-row">
                <input type="password" id="password-two" required autocomplete="on" name="password-two">
                <label for="password-two">Повторите пароль</label>
            </div>

            <div class="form-row-adm">
                <input type="submit" name="reg" value="Зарегистрироваться">
            </div>

            <div class="form-row-adm">
                <a href="./">На главную</a>
                <a href="./login.php">Войти в аккаунт</a>
            </div>
        </form>
    </div>

</body>
</html>