<?php
use Doctrine\ORM\EntityManager;
class controller{
  protected $em;
  protected $view;
  /**
 * @InjectParams({
 *    "em" = @Inject("doctrine.orm.entity_manager")
 * })
 */
  public function __construct(EntityManager $em)
  {
    $path = ['app/views'];         // your view file path, it's an array
    $cachePath = 'tmp/cache';     // compiled file path

    $compiler = new \Xiaoler\Blade\Compilers\BladeCompiler($cachePath);
    $engine = new \Xiaoler\Blade\Engines\CompilerEngine($compiler);
    $finder = new \Xiaoler\Blade\FileViewFinder($path);
    $factory = new \Xiaoler\Blade\Factory($engine, $finder);
    $this->view = $factory;

    $this->em = $em;
    $this->blade = $blade;
  }
}
