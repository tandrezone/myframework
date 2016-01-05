<?php
include_once '/packages/moonlight/auth/models/users.php';
class start extends controller{
  function index() {
    return "This is the comand that runs when the route is / and you came to firstapp.dev ";
  }
  function access($functionName, $me){
    $this->accessList = array("index" => "11");
    $token  = $_SESSION['token'];
    $name = $_SESSION['name'];

    $users = $this->em->getRepository('user')->findBy(array('name' => $name));
    $user = $users[0];
    $tokenDb = $user->getToken();
  //  echo $tokenDb;
  //  echo "</br>";
  //  echo $token;
    if($token == $tokenDb){
      return true;
    } else {
      return false;
    }

  }
}
 ?>
