<?php

require_once('./controller/Autoload.php');

$autoload = new Autoload();
$route = isset($_GET['route']) ? $_GET['route'] : 'web';

if($route == 'api')
    $app = new ApiController($route);
else
    echo 'Estoy en la web';

