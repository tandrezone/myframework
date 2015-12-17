<?php
// bootstrap.php
require_once "packages/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;

$blade = new BladeInstance("application/views", "tmp/cache/views");

$paths = array("application\models");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => DB_USER,
    'password' => DB_PASS,
    'dbname'   => DB_HOST,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$router = new Router();
include_once("application/routing.php");
$match = $router->match();

if (strpos($match['target'], '.') !== FALSE)
{
    $parts = explode(".", $match['target']);
} else {
  $parts[0] = $match['target'];
  $parts[1] = "index";
}

$controller = $parts[0];
$function = $parts[1];

if(file_exists("application/controllers/".$controller.".php")){
  include_once("application/controllers/".$controller.".php");
  if(class_exists($controller) ) {
    $c = new $controller($entityManager, $blade);
    if(method_exists($c,$function)){
      $c->$function();
    } else {
      echo "Metodo ".$function. "não existe, deve ser criado dentro da classe ".$controller;
    }
  } else{
    echo "Classe do controlador ".$controller." não existe deve ser criada dentro do ficheiro ".$controller.".php";
  }
} else {
  echo "Ficheiro de controlador ".$controller." não existe por favor criar o ficheiro e colocar em /applications/controllers";
}
