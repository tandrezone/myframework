<?php
use Doctrine\ORM\EntityManager;
class controller{
  protected $em;
  /**
 * @InjectParams({
 *    "em" = @Inject("doctrine.orm.entity_manager")
 * })
 */
  public function __construct(EntityManager $em)
  {
      $this->em = $em;
      $this->blade = $blade;
  }
}
