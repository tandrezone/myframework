<?php
/**
 * [$firstAppRouting Closure to internal routing, needed in all internal routes]
 * To create a internal routing use $NAMERouting = function($router, $prefix){$router->addRoutes(array(array('GET','/'.$prefix, 'start.index')));}
 */
$intRoute = function($router,$prefix){
  $router->addRoutes(array(
    array('GET','/', 'start.index'),
    array('GET','/nome/[a:nome]', 'start.ari')
  ));
  //routerIntern::runpackage('moonlight/backoffice','backoffice',$router);

}



 ?>
