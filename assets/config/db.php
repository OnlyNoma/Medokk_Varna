<?php

return array(
    'default' => array(
        'user' => 'root',
        'password' => '1234',
        'driver' => 'PDO',

        //'Connection' is required if you use the PDO driver
        'connection' => 'mysql:host=192.168.112.102;dbname=varna',

        // 'db' and 'host' are required if you use Mysql driver
        'db'  => 'varna',
        'host' => 'localhost',
    )
);
