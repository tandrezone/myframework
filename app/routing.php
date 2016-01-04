<?php
/**
 * The local of this file is setted in the config file
 * This file can run route matches or can include another route file
 * For example i can run a route inside my app or inside packages
 */
//Run routing from app without prefix

//include the routing files
include_once '/app/firstApp/routing.php';
include_once '/packages/moonlight/auth/routing.php';
//init the closure with the prefix empty
$firstAppRouting($router,'');
//init the closure with the prefix auth
$AuthRouting($router,'auth');
