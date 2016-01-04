<?php
/**
 * This is the routing file, is the starting point of the app in this example we say that when the user go to the page / we load a controller called start.php that is in
 * /app/controllers/start.php and run a function called index
 */
$router->map('GET','/', 'start.index');
//This run's from app
//$router->mapFromPackage('GET','/','start.index','mypackage','access','start_index');

 ?>
