<?php
// use of namespaces
use Illuminate\Database\Capsule\Manager as Capsule;

// define current directory as basepath
define('BASEPATH', __DIR__);

// composer autoloading, to load libs
require BASEPATH . '/../vendor/autoload.php';

// register error handling
$whoops = new Whoops\Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
$whoops->register();

// database
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => '03-labo-1-todo-app',
    'username' => 'root',
    'password' => 'secret',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

include BASEPATH . "/Routes/web.php";