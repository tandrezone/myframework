<?php
include("/app/models/user.php");
/**
 * This is the controller {{name}}
 */
class users extends controller{

/**
 * [Run when we came to /{{name}}]
 * @return [View]
 */
  function index(){
    $userRep = $this->em->getRepository('user');
    $users = $userRep->findAll();

    foreach ($users as $user) {
        echo "Name: ".$user->getName()." password: ".$user->getPassword()."</br>";
    }
  }

/**
 * [Run when we came to /{{name}}/new]
 * @return [View]
 */
  function create(){
    $user = new user();
    $user->setName("Tiago");
    $user->setPassword("password");
    $this->em->persist($user);
    $this->em->flush();
    echo "Created Product with ID " . $user->getId() . "\n";
  }
/**
 * [Run when we came to /{{name}}/update/id]
 * @return [View]
 */
  function update($params){
    $id = $params['id'];
    $newName = "GET FROM POST";

    $user = $this->em->find('user', $id);

    if ($user === null) {
        echo "Product $id does not exist.\n";
        exit(1);
    }

    $user->setName($newName);

    $this->em->flush();
  }

  /**
   * [Run when we came to /{{name}}/delete/id]
   * @return [View]
   */
  function delete($params){
    $id = $params['id'];
    $user = $this->em->find('user', $id);

    if ($user === null) {
        echo "Product $id does not exist.\n";
        exit(1);
    }
    $this->em->remove($user);
    $this->em->flush();
  }

  function show($params){
    $id = $params['id'];
    $user = $this->em->find('user', $id);
    if ($user === null) {
        echo "User not found.\n";
        exit(1);
    }
    echo sprintf("-%s\n", $user->getName());
  }
}
