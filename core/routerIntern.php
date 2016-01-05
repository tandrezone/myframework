<?php
/**
 * Run a routerIntern
 */
class routerIntern{
  /**
   * Run a internal router
   * @param  [String] $routfile [Ficheiro onde esta o ficheiro de routing a ser executado]
   * @param  [type] $prefix   [Prefixo para as routes deste ficheiro]
   * @param  [type] $router   [router object]
   * @return [type]           [description]
   */
  static function run($routfile, $prefix, $router){
    //$rp = explode("/", $routfile);
    //$appName = $rp[count($rp)-2].".";
    include_once($routfile);
    //no ficheiro tem de existir uma closure chamada $intRoute
    call_user_func_array($intRoute, array($router, $prefix));
  }
  static function runpackage($packageName, $prefix, $router) {
    include_once("/packages/".$packageName."/routing.php");
    $match['package'] = $packageName;
    call_user_func_array($intRoute, array($router, $prefix));
  }
}
 ?>
