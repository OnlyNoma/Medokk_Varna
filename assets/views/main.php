<?if(($subview == 'auth')){
    include $subview.'.php';
    return;
}?>
<?if($subview[0] == '@'){
    $subview = substr($subview,1,strlen($subview));
    include "admin_header.php";
    include $subview.'.php';
    include "admin_footer.php";
    return;
}?>
<?if($subview == 'empty') return;?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>salon</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <div id="content">
        <div class="content">
            <div class="left">
                <div class="graphick">
                    Понедельник - Суббота<br> 10:00 - 21:00<br>
                    <span>обед 13:00 - 14:00</span><br>
                    Воскресенье выходной
                </div>

                <div id="sidebar">
                    <div class="sidebar">
                        <ul>
                            <li><a href="#">Сеть салонов</a></li>
                            <li><a href="#">Бонусные карты</a></li>
                            <li><a href="#">Услуги</a></li>
                            <li><a href="#">Цены</a></li>
                            <li><a href="#">Фотогалерея</a></li>
                            <li><a href="#">Продукция</a></li>
                            <li><a href="#">Акции</a></li>
                            <li><a href="#">Компания</a></li>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">Вопросы и ответы</a></li>
                            <li><a href="#">Отзывы</a></li>
                        </ul>
                    </div>
                </div>
		            <?php include($subview.'.php');?>
                </div>
            </div>
        </body>
</html>