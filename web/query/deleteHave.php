<?
    if(isset($_POST['id'])){
        $root = substr(dirname(__DIR__),0,count(dirname(__DIR__)) - 4);
        $loader = require $root . '/vendor/autoload.php';
        $loader->add('', $root.'/classes/');

        $pixie = new \App\Pixie;
        $pixie->bootstrap($root)->handle_http_request();

        $pixie->orm->get('roomhave')->where('id','=',$_POST['id'])->find()->delete();
        echo 'yes';
    }
?>