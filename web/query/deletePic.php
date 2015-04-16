<?
if(isset($_POST['id'])){
    $root = substr(dirname(__DIR__),0,count(dirname(__DIR__)) - 4);
    $loader = require $root . '/vendor/autoload.php';
    $loader->add('', $root.'/classes/');

    $pixie = new \App\Pixie;
    $pixie->bootstrap($root)->handle_http_request();

    $a = $pixie->orm->get('photogalery')->where('id','=',$_POST['id'])->find();
    $ph = explode('.', $a->path);
    if(file_exists('../img/photos/' . $a->path)) {
        unlink('../img/photos/' . $a->path);
        $a->delete();
    }
    echo 'yes';
}
?>