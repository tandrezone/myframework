<?php
/**
 * The local of this file is setted in the config file
 * This file can run route matches or can include another route file
 * For example i can run a route inside my app or inside packages
 */
//Run routing from app without prefix

//init the closure with the prefix fa
//This code is needed and you should not delete or modify
router::run('/app/'.APP_NAME.'/routing.php','', $router);
//all the routes that run in this file are the routes that will be needed for all apps
//for routes that only are used by one specific app must be declared in the routing file inside the app
//Why this file exists? I think most of the routes are app specific...
//This file exist because the goal is multiapp framework, because of that i think a nice approach would be for example use the same backoffice for all apps
//in this case of the backoffice the routes for the backoffice are inserted in this file
// you cant run routes from multiple apps from one app, this is not permited and only makes the code confuse
// if you need to access stuff from another app then that stuff is aproved to be a package
// in the app i canot access another apps
// in the app i have full access to packages
router::runpackage('moonlight/auth','',$router);
router::runpackage('moonlight/backoffice','bo',$router);
