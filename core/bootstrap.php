<?php
// bootstrap.php
require_once "/config/config.php";
require_once "errors.php";

require_once "/core/me.php";
$me = new me("10");
$me->setLevel("10");
if(file_exists("packages/autoload.php")){
  require_once "packages/autoload.php";
} else {
  error::set("Composer n&atilde;o encontrado</br></br>");
  error::set("Lista de Server packages a instalar:</br></br>");
  $x = file_get_contents("composer.json");
  $y = json_decode($x);
  $z = $y->require;
  foreach ($z as $name => $ver) {
    error::set("Name: <b>".$name."</b> version: <b>".$ver."</b></br>");
  }
  error::set("</br>Para editar a lista de server packages a instalar basta editar o ficheiro <b>composer.json</b> adicionando ou retirando pacotes na entrada <b>require</b></br>");
  error::set("</br></br>Lista de Client packages a instalar:</br></br>");
  $x = file_get_contents("automate.json");
  $y = json_decode($x);
  $z = $y->require;
  foreach ($z as $name => $ver) {
    error::set("Name: <b>".$name."</b> version: <b>".$ver."</b></br>");
  }
  error::set("</br>Para editar a lista de client packages a instalar basta editar o ficheiro <b>automate.json</b> adicionando ou retirando pacotes na entrada <b>require</b></br>");

  error::set("</br>Para instalar automaticamente os pacotes em falta basta correr a partir da linha de comandos <b>php init.php</b></br>");
  exit;
}


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


$paths = array("packages\moonlight\auth\models");
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
include_once(ROUTEBASE);
$match = $router->match();
if (strpos($match['target'], '.') !== FALSE)
{
    $parts = explode(".", $match['target']);
} else {
  $parts[0] = $match['target'];
  $parts[1] = "index";
}
//echo "<pre>";
//print_r($match);
//echo "</pre>";
$controller = $parts[0];
$function = $parts[1];
require "controller.php";
require "model.php";
if($match['package'] == ""){
  $pathForApp = "app/".APPNAME."/controllers/";
} else {
  $pathForApp = "packages/".$match['package']."/";
}
  if($controller != ''){
    $pathforcontroller = $pathForApp.$controller.".php";
    //echo $pathforcontroller;
    if(file_exists($pathforcontroller)){
      include_once($pathforcontroller);
      if(class_exists($controller) ) {
        $c = new $controller($entityManager, $blade);
        if(method_exists($c,$function)){
          $midleware = $match['midleware'];
          if(method_exists($c,$midleware)){
            $midlewareVerification =$c->$midleware($function, $me);
            if($midlewareVerification){
              echo $c->$function($match['params']);
            } else {
              echo "O midleware de acesso a esta route n&atilde;o autorizou o seu accesso";
            }
          }
        } else {
          error::set("Metodo <b>".$function. "</b> n&atilde;o existe, deve ser criado dentro da classe <b>".$controller."</b>");
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
