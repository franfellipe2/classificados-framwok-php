<?php

require '../../_core/Autoload/ClassLoader.php';
$cl = new Core\Autoload\classLoader();
$cl->addNamespace('Core', '../../_core/');
$cl->addNamespace('App', '../../app/');
$cl->register();

new App\Control\Admin\UserForm;
