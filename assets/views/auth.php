<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>ВарНа</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
<div class="header"></div>

<div class="content_login">
    <div class="login_header">
        <h1>ВарНа</h1>
    </div>
    <div class="error"></div>
    <form action="" method="post" id="form" autocomplete="off">
        <div class="container">
            <div class="user"><img src="/img/user-4.png" /></div>
            <input type="text" autocomplete="off" placeholder="Логин" name="mail" />
            <div style="clear: both"></div>
        </div>

        <div class="container">
            <div class="user"><img src="/img/key.png" /></div>
            <input type="password" autocomplete="off" placeholder="Пароль" name="pass" />
            <div style="clear: both"></div>
        </div>
        <div class="container">
            <input id="check" type="checkbox" checked name="remember">
            <label for="check">Запомнить меня</label>
        </div>
        <input type="submit" class="submit" name="submit" value="Вход">
        <div style="clear: both"></div>
    </form>
</div>
</body>
</html>