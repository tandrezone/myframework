<?php
use Doctrine\ORM\EntityManager;
use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;
class controller{
  protected $em;
  protected $blade;
  /**
 * @InjectParams({
 *    "em" = @Inject("doctrine.orm.entity_manager")
 *    "blade" = @Inject("duncan3dc.laravel.blade")
 * })
 */
  public function __construct(EntityManager $em, BladeInstance $blade)
  {
      $this->em = $em;
      $this->blade = $blade;
  }
}
