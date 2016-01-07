<?php
include_once 'controller.interface.php';
use Doctrine\ORM\EntityManager;
class controller implements controllerInterface{
  protected $em;
  protected $view;
  protected $accessList;
  /**
 * @InjectParams({
 *    "em" = @Inject("doctrine.orm.entity_manager")
 * })
 */
  public function __construct(EntityManager $em, $path)
  {
    $path = [$path.'/views'];         // your view file path, it's an array
    $cachePath = 'tmp/cache';     // compiled file path

    $compiler = new \Xiaoler\Blade\Compilers\BladeCompiler($cachePath);
    $engine = new \Xiaoler\Blade\Engines\CompilerEngine($compiler);
    $finder = new \Xiaoler\Blade\FileViewFinder($path);
    $factory = new \Xiaoler\Blade\Factory($engine, $finder);
    $this->view = $factory;

    $this->em = $em;
    $this->blade = $blade;
  }

  /**
   * Access is the default midleware
   * Midleware is a function that run before the controller, this function is used to verify if the user have permission to access the router
   * For edit the middleware you can set another name of the midleware on the routing call or overwrite this function in your controllers
   *
   * @param  [String] $functionName [The name of the function the route wants to run]
   * @param  [Array] $accessList [This is a associative array functionName => access level for each function in the class]
   * @param  [User] $me           [The object user for me, this object must have the method getLevel to check the level of the user]
   * @return [boolean]               [True for running the route, false for display error no permission]
   */
  public function access($functionName, $me){
    //Create the access list for each function in this controller you can attribute a level of access
    $this->accessList = array("index" => "11");
    return true;
  }
}
