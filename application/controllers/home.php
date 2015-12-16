<?php
use Doctrine\ORM\EntityManager;

require_once("application/models/Product.php");
class home{
  private $em;
  /**
 * @InjectParams({
 *    "em" = @Inject("doctrine.orm.entity_manager")
 * })
 */
  public function __construct(EntityManager $em)
  {
      $this->em = $em;
  }
  function index(){
    echo "PRODUCTO INDEX";
  }
}
