<?php
require __DIR__.'/vendor/autoload.php'; //Load composer autoload
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/");
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
   "driver" => "mysql",
   "host" => $_ENV["DB_HOST"],
   "database" => $_ENV["DB_DATABASE"],
   "username" => $_ENV["DB_USERNAME"],
   "password" => $_ENV["DB_PASSWORD"]

]);
$capsule->setAsGlobal();
$capsule->bootEloquent();