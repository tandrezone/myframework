<?php
// bootstrap.php
require_once "/config/config.php";
require_once "packages/autoload.php";
require_once "errors.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;

$blade = new BladeInstance("app/views", "tmp/cache/views");

$paths = array("app\models");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => DB_USER,
    'password' => DB_PASSWORD,
    'dbname'   => DB_NAME,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$router = new Router();
include_once("app/routing.php");
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
require "controller.php";
if($controller != ''){
  if(file_exists("app/controllers/".$controller.".php")){
    include_once("app/controllers/".$controller.".php");
    if(class_exists($controller) ) {
      $c = new $controller($entityManager, $blade);
      if(method_exists($c,$function)){
        $c->$function($match['params']);
      } else {
        error::set("Metodo ".$function. "n&atilde;o existe, deve ser criado dentro da classe ".$controller);
      }
    } else{
      error::set("Classe do controlador ".$controller." n&atilde;o existe deve ser criada dentro do ficheiro ".$controller.".php");
    }
  } else {
    error::set("Ficheiro de controlador ".$controller." n&atilde;o existe por favor criar o ficheiro e colocar em /applications/controllers");
  }
} else {
  error::set("ROUTE nao existe");
}
