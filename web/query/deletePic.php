<?
if(isset($_POST['id'])){
    $root = substr(dirname(__DIR__),0,count(dirname(__DIR__)) - 4);
    $loader = require $root . '/vendor/autoload.php';
    $loader->add('', $root.'/classes/');

    $pixie = new \App\Pixie;
    $pixie->bootstrap($root)->handle_http_request();

    $a = $pixie->orm->get('roompic')->where('id','=',$_POST['id'])->find();
    $ph = explode('.', $a->image);
    if(file_exists('../img/uploads/room/' . ($ph[0] . '_mini.') . $ph[1])) {
        unlink('../img/uploads/room/' . ($ph[0] . '_mini.') . $ph[1]);
        unlink('../img/uploads/room/' . ($ph[0] . '_middle.') . $ph[1]);
        unlink('../img/uploads/room/' . ($ph[0] . '_big.') . $ph[1]);
    }
    $a->delete();
    echo 'yes';
}
?>