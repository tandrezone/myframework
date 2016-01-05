<?php

Interface routerInterface{
  /**
   * Run a internal router
   * @param  [String] $routfile [Ficheiro onde esta o ficheiro de routing a ser executado]
   * @param  [type] $prefix   [Prefixo para as routes deste ficheiro]
   * @param  [type] $router   [router object]
   * @return [type]           [description]
   */
  static function run($routfile, $prefix, $router);
  /**
   * [runpackage executa um ficheiro de routing existente dentro de uma package]
   * @param  [string] $packageName [Nome da package]
   * @param  [string] $prefix      [Nome do prefixo de routing base, exemplo o ficheiro routing tem as seguintes routes /user /user/new ao usar o prefixo backoffice estas routes ficam /backoffice/user e /backoffice/user/new]
   * @param  [type] $router      [Objecto de routing]
   * @return [type]              [description]
   */
  static function runpackage($packageName, $prefix, $router);
}
 ?>
