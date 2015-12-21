<?php
/**
 * This is the controller {{name}}
 */
class {{name}} extends controller{

/**
 * [Run when we came to /{{name}}]
 * @return [View]
 */
  function index(){

  }

/**
 * [Run when we came to /{{name}}/new]
 * @return [View]
 */
  function create(){
    ${{name}} = new user();
    ${{name}}->setName("test");
    ${{name}}->em->persist($user);
    ${{name}}->em->flush();
    echo "Created Product with ID " . ${{name}}->getId() . "\n";
  }
/**
 * [Run when we came to /{{name}}/update/id]
 * @return [View]
 */
  function update($id){

  }

  /**
   * [Run when we came to /{{name}}/delete/id]
   * @return [View]
   */
  function delete($id){

  }
}
