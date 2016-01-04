<?php
/**
 * The local of this file is setted in the config file
 * This file can run route matches or can include another route file
 * For example i can run a route inside my app or inside packages
 */
setRouteFile("auth","packages/moonlight/auth/routing.php", $router);

function setRouteFile($base, $link, $router) {
  include_once($link);
}
