<?php

require '../../_core/Autoload/ClassLoader.php';
$cl = new Core\Autoload\classLoader();
$cl->addNamespace('Core', '../../_core/');
$cl->addNamespace('App', '../../app/');
$cl->register();

$p = new Core\Control\PageAdmin();
$u = new App\Model\user();

var_dump($p);
var_dump($u);
