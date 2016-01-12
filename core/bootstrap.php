<?php
session_start();

//Load Config Files
require_once "/config/configDB.php";
require_once "/config/configFolders.php";
include_once('config/configApps.php');
include_once '/config/configAccessViews.php';

//Load app
$serverName = $_SERVER['SERVER_NAME'];
foreach ($configApps as $app) {
  if($app->url == $serverName){
    define('APP_NAME', $app->name);
    define('APP_FOLDER', $app->folder);
  }
}
if(APP_NAME == "APP_NAME"){
  echo "APP not defined please add this app in the conf file in config/configApps.php";
  exit;
}
if(file_exists('packages/moonlight/utils/utils.php')){
  include_once 'packages/moonlight/utils/utils.php';
}

if(file_exists(PACKAGES_FOLDER."/autoload.php")){
  require_once PACKAGES_FOLDER."/autoload.php";
} else {
  print_r("Composer n&atilde;o encontrado</br></br>");
  print_r("Lista de Server packages a instalar:</br></br>");
  $x = file_get_contents("composer.json");
  $y = json_decode($x);
  $z = $y->require;
  foreach ($z as $name => $ver) {
    print_r("Name: <b>".$name."</b> version: <b>".$ver."</b></br>");
  }
  print_r("</br>Para editar a lista de server packages a instalar basta editar o ficheiro <b>composer.json</b> adicionando ou retirando pacotes na entrada <b>require</b></br>");
  exit;
}
include_once 'packages/moonlight/base/loadBase.php';
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("\packages\moonlight\auth\models","\app\firstApp\models");
$isDevMode = DEV_MODE;

// the connection configuration
$dbParams = array(
    'driver'   => DB_DRIVER,
    'user'     => DB_USER,
    'password' => DB_PASSWORD,
    'dbname'   => DB_NAME,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$router = new router();
include_once(ROUTEBASE);


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
if($match['package'] == ""){
  $pathForApp = APP_FOLDER."/".APP_NAME."";
} else {
  $pathForApp = PACKAGES_FOLDER."/".$match['package']."";
}


  if($controller != ''){
    $pathforcontroller = $pathForApp."/controllers/".$controller.".php";
    //echo $pathforcontroller;
    if(file_exists($pathforcontroller)){
      include_once($pathforcontroller);
      if(class_exists($controller) ) {
        $c = new $controller($entityManager, $pathForApp);
        if(method_exists($c,$function)){
          $midleware = $match['midleware'];
          if(method_exists($c,$midleware)){
            $midlewareVerification =$c->$midleware($function, $_SESSION['user']);
            if($midlewareVerification){
              echo $c->$function($match['params']);
            } else {
              echo "O midleware de acesso a esta route n&atilde;o autorizou o seu accesso";
            }
          }
        } else {
          print_r("Metodo <b>".$function. "</b> n&atilde;o existe, deve ser criado dentro da classe <b>".$controller."</b>");
        }
      } else{
        print_r("Classe do controlador ".$controller." n&atilde;o existe deve ser criada dentro do ficheiro ".$controller.".php");
      }
    } else {
      print_r("Ficheiro de controlador ".$controller." n&atilde;o existe por favor criar o ficheiro e colocar em /applications/controllers");
    }
  } else {
  print_r("ROUTE nao existe");
  }
