<?php
/**
 * Init.php this file is a comand line method
 * It only need to run one time
 * This file config the system for the development
 */

class init{
  function __construct() {
    echo "Loading Config vars in /config/config.php\n";
    include_once("/config/config.php");
    echo "DEVELOPMENT MODE : ".DEVELOPMENT_ENVIRONMENT."\n";
    echo "DATABASE SERVER: ".DB_HOST."\n";
    echo "DATABASE USER: ".DB_USER."\n";
    echo "DATABASE PASS: ".DB_PASSWORD."\n";
    echo "DATABASE TABLE NAME: ".DB_NAME."\n";
    echo "\n\n";
    echo "Loading composer.json to get the server packages for this app:\n";
    $c = file_get_contents("composer.json");
    $x = json_decode($c);
    $req = $x->require;
    foreach ($req as $name => $version) {
      echo "Need ".$name." version: ".$version."\n";
    }
    echo "\n\n";
    echo "Loading automate.json to get the client packages for this app:\n";
    $c = file_get_contents("automate.json");
    $x = json_decode($c);
    $req = $x->require;
    foreach ($req as $name => $version) {
      echo "Need ".$name." version: ".$version."\n";
    }
    echo "\n\n";
    echo "Installing the packages\n";
    echo exec("php composer.phar update");
    echo exec("php packages/moonlight/automate/automate.php");
    echo "Packages installed with success.\n";
    echo "Framework ready for start\n";
  }
}
$i = new init();
