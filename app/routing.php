<?php
/**
 * The local of this file is setted in the config file
 * This file can run route matches or can include another route file
 * For example i can run a route inside my app or inside packages
 */
//Run routing from app without prefix
include_once("/core/routerIntern.php");
//init the closure with the prefix empty
routerIntern::run('/app/firstApp/routing.php','', $router);
//init the closure with the prefix auth
routerIntern::run('/packages/moonlight/auth/routing.php','auth', $router);
