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
        <div class="header_social">
            <ul>
                <li><a href="javascript:void(0)" id="twitter"></a></li>
                <li><a href="javascript:void(0)" id="rss"></a></li>
                <li><a href="javascript:void(0)" id="skype"></a></li>
                <li><a href="javascript:void(0)" id="fb"></a></li>
            </ul>
        </div>
        <div class="header">
            <a href="/" class="logo">
                <img src="img/logo.png">
            </a>
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/services">Услуги</a></li>
                <li><a href="/search">Посик объектов</a></li>
                <li><a href="/partners">Партнеры</a></li>
                <li><a href="/carrier">Карьера</a></li>
            </ul>
        </div>
		<?php include($subview.'.php');?>
	</body>
</html>