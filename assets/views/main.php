<?if(($subview == 'auth') || ($subview == 'landing')){
    include $subview.'.php';
    return;
}?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHPixie</title>

        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/photoViewer.css">

        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="/js/text.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/photoViewer.js"></script>
        <script type="text/javascript" src="/js/script.js"></script>
	</head>
	<body>

    <div class="header_all">
        <div class="header">
            <div class="site_name">
                <h1><a href='/welcome'>Салон краси Варна</a></h1>
            </div>
            <div class="user">
                <div class="username">
                    Вітаю, <?=$username.' '.$userlastname?>
                </div>
                <div class="userSettings">
                    <ul>
                        <li><a href="/profile">Мої налаштування</a></li>
                        <li><a href="/logout">Вийти</a></li>
                        <li><a href="/" target="_blank">Перейти на сайт</a></li>
                    </ul>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>

    <div class="menu">
        <ul>
                <li>
                    <a href="/questions">Питання і відповіді</a>
                </li>
                <li>
                    <a href="/news">Новини</a>
                </li>
                <li>
                    <a href="/services">Послуги</a>
                </li>
                <li>
                    <a href="/recalls">Відгуки</a>
                </li>
                <li>
                    <a href="/photogalery">Фотогалерея</a>
                </li>
            <div style="clear: both"></div>
        </ul>
    </div>

    <div class="content">
		<?php include($subview.'.php');?>
    </div>

    <div class="footer">
        <p>Мини отель &copy; 2015</p>
        <p>
            <a href="/error">Повідомити про помилку</a>
        </p>
    </div>
    <div class="back_to_top">
        <img src="/img/upp.png">
    </div>
	</body>
</html>