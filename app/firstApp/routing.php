<?php

/**
 * [$firstAppRouting Closure to internal routing, needed in all internal routes]
 * To create a internal routing use $NAMERouting = function($router, $prefix){$router->addRoutes(array(array('GET','/'.$prefix, 'start.index')));}
 */
$intRoute = function($router,$prefix){
  $router->addRoutes(array(
    array('GET','/'.$prefix, 'start.index')
  ));
}



 ?>
