<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once("application/models/Product.php");
class home{
  private $db;
  function __construct($db) {
    $this->$db = $db;
  }
  function index(){
    $newProductName = "Z";
    $product = new Product();
    $product->setName($newProductName);

    $this->db->persist($product);
    $this->db->flush();
    echo "Created Product with ID " . $product->getId() . "\n";
  }
}
