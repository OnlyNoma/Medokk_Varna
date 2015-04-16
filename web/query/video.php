<?
if(isset($_POST['src'])){
    //preg_match_all('',);
    $string = $_POST['src'];
    if(($string[0] =='/')&&(($string[1] =='/'))){
        $url = 'http:'.$string;
    }else{
        if(($string[0]=='w')){
            $url = 'http://'.$string;
        }else{
            $url = $string;
        }
    }
    $html_content = @file_get_contents($url);
    preg_match_all("|<title>(.*)</title>|sUSi", $html_content, $titles);
    $titles = $titles[1][0];

    $url = $_POST['src'];

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

    $titles .= "|" . $match[1];
    echo $titles;
}
?>
