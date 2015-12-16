<?php
// bootstrap.php
require_once "packages/autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("application\models");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'framework',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$router = new Router();
$router->map('GET|POST','/', 'home.index', 'home');
//style Controller / function
// match current request
$match = $router->match();

  $parts = explode(".", $match['target']);
  $controller = $parts[0];
  $function = $parts[1];
  //load controller
  include_once("/application/controllers/".$controller.".php");
  $c = new $controller($entityManager);
  $c->$function();
